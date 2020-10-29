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

	<?php

		// Cover

		$project_cover_attachment_id = get_field( 'project_cover', $project->ID );

		// Size Labels

		$project_cover_size_large = 'cover-large';
		$project_cover_size_small = 'cover-small';

		// Image Sizes

		$project_cover_large = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_large );
		$project_cover_small = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_small );

		// Clients

		$project_clients = get_field( 'project_client' );

	?>

	<div class="project">

		<div class="project__inner-wrap">

			<div class="project__overview">

				<h1 class="project__s-title"><?php the_title(); ?></h1>

				<div class="project__return">

					<a href="<?php echo esc_url( home_url( '/work', 'relative' ) ); ?>" title="Return to all Projects" class="project__return-link">&larr; Return to Work</a>

				</div>

				<div class="project__meta">

					<!-- 
						
						Two sizes are available:
							
						1. cover-large, 380 x 560, for higher density screens.
						2. cover-small, 190 x 288, the default output.

					-->

					<div class="project__s-cover">

						<?php if ( ! $project_cover_small ) : ?>

							<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__s-img project__s-img--is-placeholder" />

						<?php else : ?>

							<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__s-img" />

						<?php endif; ?>

					</div>

					<div class="project__details">

						<?php if ( get_field( 'project_description' ) ) : ?>

							<div class="project__description">

								<?php the_field( 'project_description' ); ?>

							</div>

						<?php endif; ?>

						<div class="project__extra">

							<?php if ( get_field( 'project_date' ) ) : ?>

								<div class="project__date"><?php the_field( 'project_date' ); ?></div>

							<?php endif; ?>

							<?php if ( get_field( 'project_location' ) ) : ?>

								<div class="project__location"><?php the_field( 'project_location' ); ?></div>

							<?php endif; ?>

							<?php if ( $project_clients ) : ?>

								<div class="project__client">

									<span class="client__label">Client:</span>
									
									<ul class="client__list">

										<?php foreach ( $project_clients as $project_client ) : ?>
										
											<?php

												// Title

												$client_title = get_the_title( $project_client->ID );

											?>

											<li class="client__item"><?php echo esc_html( $client_title ); ?></li>

										<?php endforeach; ?>

									</ul>

								</div>

							<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

			<div class="project__samples">

				<div class="samples__title">

					<div class="samples__list">

						<!-- Example still image -->

						<div class="sample__item sample__item--still">

							<img src="https://via.placeholder.com/720x400.png?text=Still+(720x400)" alt="A project sample image still" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example YouTube video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example Vimeo video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example still image -->

						<div class="sample__item sample__item--still">

							<img src="https://via.placeholder.com/720x400.png?text=Still+(720x400)" alt="A project sample image still" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example YouTube video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example Vimeo video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example still image -->

						<div class="sample__item sample__item--still">

							<img src="https://via.placeholder.com/720x400.png?text=Still+(720x400)" alt="A project sample image still" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example YouTube video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

						<!-- Example Vimeo video. -->

						<div class="sample__item sample__item--video">

							<img src="https://via.placeholder.com/720x400.png?text=Video+(720x400)" alt="A project sample video" width="720" height="400" decoding="async" loading="lazy" class="sample__img" />

						</div>

					</div>

					<div class="sample__previous">&larr; Previous Sample</div>

					<div class="sample__next">Next Sample &rarr;</div>

				</div>

				<div class="samples__nav">

					<div class="thumbnails__list">

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample image still" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample YouTube video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample Vimeo video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample image still" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample YouTube video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample Vimeo video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample image still" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample YouTube video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

						<div class="thumbnail__item">

							<img src="https://via.placeholder.com/110x60.png?text=Thumbnail+(110x60)" alt="The thumbnail image for sample Vimeo video" width="110" height="60" decoding="async" loading="lazy" class="thumbnail__img" />

						</div>

					</div>

				</div>

			</div>
	
		</div>

	</div>

<?php get_footer(); ?>