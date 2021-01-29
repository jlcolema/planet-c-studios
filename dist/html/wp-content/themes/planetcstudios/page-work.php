<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */

?>

<?php get_header(); ?>

	<div class="projects">

		<div class="inner-wrap projects__inner-wrap">

			<?php /* Projects Navigation */ ?>

			<?php /*

			<div class="projects__nav">

				<h1 class="projects__header">Projects</h1>

				<div class="projects__categories">

					<!-- Move example markup to this location. -->
				
				</div>

				<!-- <select name="projects-filter" id="" class="projects__filter">

					<option value="">See All</option>
					<option value="animation">Animation</option>
					<option value="branding">Branding</option>
					<option value="comedy">Comedy</option>
					<option value="concept">Concept</option>
					<option value="documentary">Documentary</option>
					<option value="educational">Educational</option>
					<option value="graphics">Graphics</option>
					<option value="horror">Horror</option>
					<option value="montage">Montage</option>
					<option value="music-video">Music Video</option>
					<option value="production">Production</option>
					<option value="projection-mapping">Projection Mapping</option>
					<option value="promo">Promo</option>
					<option value="scripted">Scripted</option>
					<option value="short">Short</option>
					<option value="special-venue">Special Venue</option>
					<option value="star-talent">Star Talent</option>
					<option value="television">Television</option>
					<option value="visual-effects">Visual Effects</option>

				</select> -->

			</div>

			*/ ?>

			<!-- Need to Organize into `projects__nav` section above. -->

			<input type="radio" id="all" class="filter__input filter__input--radio" name="project-categories" value="See All" checked="checked" />
			<input type="radio" id="animation" class="filter__input filter__input--radio" name="project-categories" value="Animation" />
			<input type="radio" id="branding" class="filter__input filter__input--radio" name="project-categories" value="Branding" />
			<input type="radio" id="comedy" class="filter__input filter__input--radio" name="project-categories" value="Comedy" />
			<input type="radio" id="concept" class="filter__input filter__input--radio" name="project-categories" value="Concept" />
			<input type="radio" id="documentary" class="filter__input filter__input--radio" name="project-categories" value="Documentary" />
			<input type="radio" id="educational" class="filter__input filter__input--radio" name="project-categories" value="Educational" />
			<input type="radio" id="graphics" class="filter__input filter__input--radio" name="project-categories" value="Graphics" />
			<input type="radio" id="horror" class="filter__input filter__input--radio" name="project-categories" value="Horror" />
			<input type="radio" id="montage" class="filter__input filter__input--radio" name="project-categories" value="Montage" />
			<input type="radio" id="music-video" class="filter__input filter__input--radio" name="project-categories" value="Music Video" />
			<input type="radio" id="production" class="filter__input filter__input--radio" name="project-categories" value="Production" />
			<input type="radio" id="projection-mapping" class="filter__input filter__input--radio" name="project-categories" value="Projection Mapping" />
			<input type="radio" id="promo" class="filter__input filter__input--radio" name="project-categories" value="Promo" />
			<input type="radio" id="scripted" class="filter__input filter__input--radio" name="project-categories" value="Scripted" />
			<input type="radio" id="short" class="filter__input filter__input--radio" name="project-categories" value="Short" />
			<input type="radio" id="special-venue" class="filter__input filter__input--radio" name="project-categories" value="Special Venue" />
			<input type="radio" id="star-talent" class="filter__input filter__input--radio" name="project-categories" value="Star Talent" />
			<input type="radio" id="television" class="filter__input filter__input--radio" name="project-categories" value="Television" />
			<input type="radio" id="visual-effects" class="filter__input filter__input--radio" name="project-categories" value="Visual Effects" />

			<div class="projects__nav">

				<h1 class="projects__header">Projects</h1>

				<ol class="projects__filter filter__list">
					
					<li class="filter__item">
				
						<label for="all" aria-label="See All" class="filter__label">See All</label>
			
					</li>

					<li class="filter__item">
					
						<label for="animation" aria-label="Animation" class="filter__label">Animation</label>
					
					</li>

					<li class="filter__item">
					
						<label for="branding" aria-label="Branding" class="filter__label">Branding</label>
					
					</li>

					<li class="filter__item">
					
						<label for="comedy" aria-label="Comedy" class="filter__label">Comedy</label>
					
					</li>

					<li class="filter__item">
					
						<label for="concept" aria-label="Concept" class="filter__label">Concept</label>
					
					</li>

					<li class="filter__item">
					
						<label for="documentary" aria-label="Documentary" class="filter__label">Documentary</label>
					
					</li>

					<li class="filter__item">
					
						<label for="educational" aria-label="Educational" class="filter__label">Educational</label>
					
					</li>

					<li class="filter__item">
					
						<label for="graphics" aria-label="Graphics" class="filter__label">Graphics</label>
					
					</li>

					<li class="filter__item">
					
						<label for="horror" aria-label="Horror" class="filter__label">Horror</label>
					
					</li>

					<li class="filter__item">
					
						<label for="montage" aria-label="Montage" class="filter__label">Montage</label>
					
					</li>

					<li class="filter__item">
					
						<label for="music-video" aria-label="Music Video" class="filter__label">Music Video</label>
					
					</li>

					<li class="filter__item">
					
						<label for="production" aria-label="Production" class="filter__label">Production</label>
					
					</li>

					<li class="filter__item">
					
						<label for="projection-mapping" aria-label="Projection Mapping" class="filter__label">Projection Mapping</label>
					
					</li>

					<li class="filter__item">
					
						<label for="promo" aria-label="Promo" class="filter__label">Promo</label>
					
					</li>

					<li class="filter__item">
					
						<label for="scripted" aria-label="Scripted" class="filter__label">Scripted</label>
					
					</li>

					<li class="filter__item">
					
						<label for="short" aria-label="Short" class="filter__label">Short</label>
					
					</li>

					<li class="filter__item">
					
						<label for="special-venue" aria-label="Special Venue" class="filter__label">Special Venue</label>
					
					</li>

					<li class="filter__item">
					
						<label for="star-talent" aria-label="Star Talent" class="filter__label">Star Talent</label>
					
					</li>

					<li class="filter__item">
					
						<label for="television" aria-label="Television" class="filter__label">Television</label>
					
					</li>

					<li class="filter__item">
					
						<label for="visual-effects" aria-label="Visual Effects" class="filter__label">Visual Effects</label>

					</li>
					
				</ol>

			</div>

			<?php /* List of Projects */ ?>

			<?php

				$projects_list_options = array(

					'post_type'	  => 'project',
					'post_status' => 'publish',
					'numberposts' => -1,
					'orderby'	  => 'title',
					'order'		  => 'ASC'

				);

				$projects = get_posts( $projects_list_options );

			?>

			<ul class="projects__list">

				<?php

					$featured_projects = get_field( 'work_featured_projects' );

				?>

				<?php if ( $featured_projects ) : ?>

					<?php foreach( $featured_projects as $post ) : ?>

						<?php

							/* Fields */

							// Category

							$project_categories = get_field( 'project_category', $project->ID );

							// Tag

							// Cover

							$project_cover_attachment_id = get_field( 'project_cover', $project->ID );

							// Size Labels

							$project_cover_size_large = 'cover-large';
							$project_cover_size_small = 'cover-small';

							// Image Sizes

							$project_cover_large = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_large );
							$project_cover_small = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_small );

							// Title

							$project_cover = get_field( 'project_cover', $project->ID );

						?>

						<li class="project__item project__item--is-featured" data-category="<?php if ( $project_categories ) : ?><?php foreach ( $project_categories as $project_category ) : ?><?php echo esc_html( $project_category->slug ); ?> <?php endforeach; ?><?php endif; ?>">

							<a href="<?php the_permalink(); ?>" class="project__link">

								<div class="project__cover">

									<?php if ( $project_cover ) : ?>

										<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img" />

									<?php else : ?>

										<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img project__img--is-placeholder" />

									<?php endif; ?>

								</div>

								<h3 class="project__title">

									<?php if ( get_field( 'project_short_title' ) ) : ?>

										<?php the_field( 'project_short_title' ); ?>

									<?php else : ?>

										<?php the_title(); ?>
									
									<?php endif; ?>

								</h3>

							</a>

						</li>

					<?php endforeach; ?>

					<?php
					
						// Reset the global post object so that the rest of the page works correctly.

						wp_reset_postdata();
						
					?>

				<?php endif; ?>

				<?php foreach ( $projects as $project ) : ?>

					<?php

						/* Fields */

						// Link

						$project_link = get_permalink( $project->ID );

						// Category

						$project_categories = get_field( 'project_category', $project->ID );

						// Tag

						// Cover

						$project_cover_attachment_id = get_field( 'project_cover', $project->ID );

						// Size Labels

						$project_cover_size_large = 'cover-large';
						$project_cover_size_small = 'cover-small';

						// Image Sizes

						$project_cover_large = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_large );
						$project_cover_small = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_small );

						// Title

						$project_title = get_the_title( $project->ID );

						// Short Title

						$project_short_title = get_field( 'project_short_title', $project->ID );

						// Title

						$project_cover = get_field( 'project_cover', $project->ID );

					?>

					<li class="project__item" data-category="<?php if ( $project_categories ) : ?><?php foreach ( $project_categories as $project_category ) : ?><?php echo esc_html( $project_category->slug ); ?> <?php endforeach; ?><?php endif; ?>">

						<a href="<?php echo $project_link; ?>" class="project__link">

							<div class="project__cover">

								<?php if ( $project_cover ) : ?>

									<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img" />

								<?php else : ?>

									<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img project__img--is-placeholder" />

								<?php endif; ?>

							</div>

							<h3 class="project__title">

								<?php if ( $project_short_title ) : ?>

									<?php echo $project_short_title; ?>

								<?php else : ?>

									<?php echo $project_title; ?>
								
								<?php endif; ?>

							</h3>

						</a>

					</li>

				<?php endforeach; ?>
				
				<li class="project__item project__item--gap"></li>

				<li class="project__item project__item--gap"></li>

				<li class="project__item project__item--gap"></li>

			</ul>

		</div>

	</div>

<?php get_footer(); ?>