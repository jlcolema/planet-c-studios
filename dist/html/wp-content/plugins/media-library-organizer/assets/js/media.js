var mediaLibraryOrganizerUploader = false;

jQuery( document ).ready( function( $ ) {

	/**
	 * Initialize Selectize Instances
	 */
	if ( typeof mediaLibraryOrganizerSelectizeInit !== 'undefined' ) {
		mediaLibraryOrganizerSelectizeInit();
	}

	/**
	 * Category Tabs
	 */
	$( 'body' ).on( 'click', '#mlo-category-tabs a', function( e ) {

		// Prevent default action (would jump down the page)
		e.preventDefault();

		var t = $( this ).attr( 'href' );

		// Remove the tabs class from all tabs
		$( this ).parent().addClass( 'tabs' ).siblings( 'li' ).removeClass( 'tabs' );

		// Hide the tab panels
		$( '.tabs-panel' ).hide();

		// Show the selected tab panel
		$( t ).show();

	} );

} );

/**
 * Fetches the uploader instance, and fires events for the life cycle of an attachment being uploaded and deleted
 *
 * @since 	1.2.3
 */
( function( $, _ ) {

	if ( typeof wp.Uploader !== 'undefined' ) {

		_.extend( wp.Uploader.prototype, {
			init: function() {
				//console.log( 'mlo:grid:attachment:upload:init');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:init' );
			},
			added: function( file_attachment ) {
				//console.log( 'mlo:grid:attachment:upload:added');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:added', file_attachment );
			},
			progress: function( file_attachment ) {
				//console.log( 'mlo:grid:attachment:upload:progress');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:progress', file_attachment );
			},
			success: function( file_attachment ) {
				//console.log( 'mlo:grid:attachment:upload:success');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:success', file_attachment );
			},
			error: function( error_message ) {
				//console.log( 'mlo:grid:attachment:upload:error');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:error', error_message );
			},
			complete: function() {
				//console.log( 'mlo:grid:attachment:upload:complete');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:complete' );
			},
			refresh: function() {
				//console.log( 'mlo:grid:attachment:upload:refresh');
				wp.media.events.trigger( 'mlo:grid:attachment:upload:refresh' );
			}
		} );

	}

} )( jQuery, _ );

/**
 * Adds Filters to wp.media.view.AttachmentFilters, for Backbone views
 *
 * @since 	1.0.0
 */
( function() {

	/**
	 * Adds the Taxonomy Filter to wp.media.view.AttachmentFilters, for Backbone views
	 * @TODO Add support for selectize autocomplete version, if enabled
	 */
	if ( media_library_organizer_media.settings.taxonomy_enabled == 1 ) {
		var MediaLibraryOrganizerTaxonomyFilter = wp.media.view.AttachmentFilters.extend( {
			id: 'media-attachment-taxonomy-filter',

			/**
			 * Create Filter
			 *
			 * @since 	1.0.0
			 */
			createFilters: function() {

				var filters = {};

				// Build an array of filters based on the Terms supplied in media_library_organizer_media.terms,
				// set by wp_localize_script()
				_.each( media_library_organizer_media.terms || {}, function( term, index ) {
					filters[ index ] = {
						text: term.name + ' (' + term.count + ')',

						// Key = WP_Query taxonomy name, which ensures that mlo-category=1 is sent
						// as part of the search query when the filter is used.
						props: {
							'mlo-category': term.slug,
						}
					};
				});

				// Define the 'All' filter
				filters.all = {
					// Change this: use whatever default label you'd like
					text:  'All Media Categories',
					props: {
						// Key = WP_Query taxonomy name, which ensures that mlo-category=1 is sent
						// as part of the search query when the filter is used.
						'mlo-category': ''
					},
					priority: 10
				};

				// Define the 'Unassigned' filter
				filters.unassigned = {
					// Change this: use whatever default label you'd like
					text:  '(Unassigned)',
					props: {
						// Key = WP_Query taxonomy name, which ensures that mlo-category=1 is sent
						// as part of the search query when the filter is used.
						'mlo-category': "-1"
					},
					priority: 10
				};

				// Set this filter's data to the terms we've just built
				this.filters = filters;

			},

			/**
			 * When the selected filter changes, update the Attachment Query properties to match.
			 */
			change: function() {
				var filter = this.filters[ this.el.value ];
				
				if ( filter ) {
					this.model.set( filter.props );

					// Fire the grid:filter event that Addons can hook into and listen
					wp.media.events.trigger( 'mlo:grid:filter:change:mlo-category', {
						slug: filter.props['mlo-category']
					} );
				}
			},

			/**
			 * Required for the Media Category selected option to be defined
			 * when mlo-category is in the $_REQUEST via e.g. Tree View
			 */
			select: function() {
				var model = this.model,
					value = 'all',
					props = model.toJSON();

				// Fire the grid:select event that Addons can hook into and listen
				wp.media.events.trigger( 'mlo:grid:filter:select', {
					props: props
				} );

				_.find( this.filters, function( filter, id ) {
					var equal = _.all( filter.props, function( prop, key ) {
						return prop === ( _.isUndefined( props[ key ] ) ? null : props[ key ] );
					});

					if ( equal ) {
						return value = id;
					}
				});

				this.$el.val( value );
			}

		} );
	}

	/**
	 * Adds the Order By Filter to wp.media.view.AttachmentFilters, for Backbone views
	 */
	if ( media_library_organizer_media.settings.orderby_enabled == 1 ) {
		var MediaLibraryOrganizerTaxonomyOrderBy = wp.media.view.AttachmentFilters.extend( {
			id: 'media-attachment-taxonomy-orderby',

			/**
			 * Create Filters
			 *
			 * @since 	1.0.0
			 */
			createFilters: function() {

				var filters = {};

				// Build an array of filters based on the Sorting options supplied in media_library_organizer_media.sorting,
				// set by wp_localize_script()
				_.each( media_library_organizer_media.orderby || {}, function( value, key ) {
					filters[ key ] = {
						text: value,

						// Key = WP_Query taxonomy name, which ensures that mlo-category=1 is sent
						// as part of the search query when the filter is used.
						props: {
							'orderby': key,
						}
					};
				});

				// Set this filter's data to the terms we've just built
				this.filters = filters;

				// If no orderby is defined, set one now from either the User Options (if enabled),
				// or the Plugin's default
				if ( ! this.model.get( 'orderby' ) ) {
					// Set orderby using User Options, if they're enabled to persist for the User
					if ( media_library_organizer_media.user_options.order_enabled == 1 ) {
						this.model.set( 'orderby', media_library_organizer_media.user_options.orderby );
					} else {
						// Set orderby using plugin default
						this.model.set( 'orderby', media_library_organizer_media.defaults.orderby );
					}
				}

			}

		} );
	}

	/**
	 * Adds the Order Filter to wp.media.view.AttachmentFilters, for Backbone views
	 */
	if ( media_library_organizer_media.settings.order_enabled == 1 ) {
		var MediaLibraryOrganizerTaxonomyOrder = wp.media.view.AttachmentFilters.extend( {
			id: 'media-attachment-taxonomy-order',

			/**
			 * Create Filter
			 *
			 * @since 	1.0.0
			 */
			createFilters: function() {

				var filters = {};

				// Build an array of filters based on the Sorting options supplied in media_library_organizer_media.sorting,
				// set by wp_localize_script()
				_.each( media_library_organizer_media.order || {}, function( value, key ) {
					filters[ key ] = {
						text: value,

						// Key = asc|desc
						props: {
							'order': key,
						}
					};
				});

				// Set this filter's data to the terms we've just built
				this.filters = filters;

				// If no order is defined, set one now from either the User Options (if enabled),
				// or the Plugin's default
				if ( ! this.model.get( 'order' ) ) {
					// Set order using User Options, if they're enabled to persist for the User
					if ( media_library_organizer_media.user_options.order_enabled == 1 ) {
						this.model.set( 'order', media_library_organizer_media.user_options.order );
					} else {
						// Set order using plugin default
						this.model.set( 'order', media_library_organizer_media.defaults.order );
					}
				}
			}

		} );
	}

	/**
	 * Extend and override wp.media.view.AttachmentsBrowser to include our custom filters
	 */
	var AttachmentsBrowser = wp.media.view.AttachmentsBrowser;
	wp.media.view.AttachmentsBrowser = wp.media.view.AttachmentsBrowser.extend( {

		/**
		 * When initializing the Attachments Browser, hook into the attachments:received
		 * event and broadcast it to wp.media.events, so Addons can hook globally
		 * and perform actions when the Grid View is reloaded in any way
		 *
		 * @since 	1.2.3
		 */
		initialize: function() {

			// Make sure to load the original toolbar
			AttachmentsBrowser.prototype.initialize.call( this );

			// Fire the grid:attachments:received event that Addons can hook into and listen
			this.collection.on( 'attachments:received', function( e ) {
				wp.media.events.trigger( 'mlo:grid:attachments:received', e );
			} );

			// Fire the grid:attachments:bulk_actions:done event that Addons can hook into and listen
			this.controller.on( 'selection:action:done', function() {
				wp.media.events.trigger( 'mlo:grid:attachments:bulk_actions:done' );
			} );

		},

		/**
		 * When the toolbar is created, add our custom filters to it, which
		 * are rendered as select dropdowns
		 *
		 * @since 	1.0.0
		 */ 
		createToolbar: function() {

			// Make sure to load the original toolbar
			AttachmentsBrowser.prototype.createToolbar.call( this );

			// Add the taxonomy filter to the toolbar
			if ( media_library_organizer_media.settings.taxonomy_enabled == 1 ) {
				this.toolbar.set( 'MediaLibraryOrganizerTaxonomyFilter', new MediaLibraryOrganizerTaxonomyFilter( {
					controller: this.controller,
					model:      this.collection.props,
					priority: 	-75
				} ).render() );
			}

			// Add the orderby filter to the toolbar
			if ( media_library_organizer_media.settings.orderby_enabled == 1 ) {
				this.toolbar.set( 'MediaLibraryOrganizerTaxonomyOrderBy', new MediaLibraryOrganizerTaxonomyOrderBy( {
					controller: this.controller,
					model:      this.collection.props,
					priority: 	-75
				} ).render() );
			}

			// Add the order filter to the toolbar
			if ( media_library_organizer_media.settings.order_enabled == 1 ) {
				this.toolbar.set( 'MediaLibraryOrganizerTaxonomyOrder', new MediaLibraryOrganizerTaxonomyOrder( {
					controller: this.controller,
					model:      this.collection.props,
					priority: 	-75
				} ).render() );
			}

		}

	} );

	/**
	 * Extend and override wp.media.model.Query to disable query caching, which prevents
	 * sparodic instances where 'No items found' appears when adding media within Gutenberg.
	 */
	var Query = wp.media.model.Query;
	_.extend( Query, {

		get: (function(){
			/**
			 * @static
			 * @type Array
			 */
			var queries = [];

			/**
			 * @returns {Query}
			 */
			return function( props, options ) {

				var args     = {},
					orderby  = Query.orderby,
					defaults = Query.defaultProps,
					query,
					cache    = false; // Always disable query

				// Remove the `query` property. This isn't linked to a query,
				// this *is* the query.
				delete props.query;
				delete props.cache;

				// Fill default args.
				_.defaults( props, defaults );

				// Normalize the order.
				props.order = props.order.toUpperCase();
				if ( 'DESC' !== props.order && 'ASC' !== props.order ) {
					props.order = defaults.order.toUpperCase();
				}

				// Ensure we have a valid orderby value.
				if ( ! _.contains( orderby.allowed, props.orderby ) ) {
					props.orderby = defaults.orderby;
				}

				_.each( [ 'include', 'exclude' ], function( prop ) {
					if ( props[ prop ] && ! _.isArray( props[ prop ] ) ) {
						props[ prop ] = [ props[ prop ] ];
					}
				} );

				// Generate the query `args` object.
				// Correct any differing property names.
				_.each( props, function( value, prop ) {
					if ( _.isNull( value ) ) {
						return;
					}

					args[ Query.propmap[ prop ] || prop ] = value;
				});

				// Fill any other default query args.
				_.defaults( args, Query.defaultArgs );

				// `props.orderby` does not always map directly to `args.orderby`.
				// Substitute exceptions specified in orderby.keymap.
				args.orderby = orderby.valuemap[ props.orderby ] || props.orderby;

				// Disable query caching
				cache = false;

				// Search the query cache for a matching query.
				if ( cache ) {
					query = _.find( queries, function( query ) {
						return _.isEqual( query.args, args );
					});
				} else {
					queries = [];
				}

				// Otherwise, create a new query and add it to the cache.
				if ( ! query ) {
					query = new Query( [], _.extend( options || {}, {
						props: props,
						args:  args
					} ) );
					queries.push( query );
				}

				// Fire the grid:query event that Addons can hook into and listen
				wp.media.events.trigger( 'mlo:grid:query', {
					query: query
				} );

				return query;
			};
		}())

        
    } );

} ) ( jQuery, _ );

/**
 * Update multipart_params when the uploader is first initialized
 *
 * @since 	1.2.3
 */
wp.media.events.on( 'mlo:grid:attachment:upload:init', function() {

	// Fetch wp.media.frame.uploader, so we persist it when the user switches
	// between grid view and inline editing in grid view.
	if ( ! mediaLibraryOrganizerUploader && typeof wp.media.frame.uploader !== 'undefined' ) {
		mediaLibraryOrganizerUploader = wp.media.frame.uploader;
	}

	if ( mediaLibraryOrganizerUploader ) {
		mediaLibraryOrganizerUploader.uploader.uploader.settings.multipart_params.media_library_organizer = {
			'mlo-category': media_library_organizer_media.selected_term
		}
	}

} );


/**
 * Update multipart_params when a Category filter is changed
 *
 * @since 	1.2.3
 *
 * @param 	obj 	atts 	Attributes
 */
wp.media.events.on( 'mlo:grid:filter:change:mlo-category', function( atts ) { 

	if ( mediaLibraryOrganizerUploader ) {
		mediaLibraryOrganizerUploader.uploader.uploader.settings.multipart_params.media_library_organizer = {
			'mlo-category': atts.slug
		}
	}

} );

/**
 * Grid View: When an attachment completes successful upload to the Grid View, refresh the Grid View
 *
 * @since   1.2.3
 *
 * @param   obj   attachment  Uploaded Attachment
 */
wp.media.events.on( 'mlo:grid:attachment:upload:success', function( attachment ) { 

	// Reload
	if ( typeof wp.media.frame.library !== 'undefined' ) {
		wp.media.frame.library.props.set ({ignore: (+ new Date())});
	} else {
		wp.media.frame.content.get().collection.props.set({ignore: (+ new Date())});
		wp.media.frame.content.get().options.selection.reset();
	}

} );