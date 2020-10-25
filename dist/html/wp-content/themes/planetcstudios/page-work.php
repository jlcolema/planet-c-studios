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

		<?php /* Projects Filter */ ?>

		<div class="projects__nav">

			<h1 class="projects__header">Projects</h1>

			<select name="projects-filter" id="" class="projects__filter">

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

			</select>

		</div>

		<?php /* List of Projects */ ?>

		<ul class="projects__list">

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

			<?php foreach ( $projects as $project ) : ?>

				<?php
				
					/* Fields */

					// Link

					$project_link = get_permalink( $project->ID );

					// Category

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

				?>

				<li class="project__item project__item--category-animation">

					<a href="<?php echo $project_link; ?>" class="project__link">

						<div class="project__cover">

							<?php if ( ! $project_cover_small ) : ?>

								<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img project__img--is-placeholder" />

							<?php else : ?>

								<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php echo $project_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="project__img" />

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

		</ul>

	</div>

<?php get_footer(); ?>