<?php /* Section: Work */ ?>

<section role="" id="work" class="section section__work work">

	<div class="inner-wrap section__inner-wrap work__inner-wrap">

		<!-- Header -->

		<h2 class="header section__header work__header"><?php the_field( 's_work_header' ); ?></h2>

		<!-- Featured Projects -->

		<?php

			$featured_projects = get_field( 's_work_featured_projects' );

		?>

		<?php if ( $featured_projects ) : ?>

			<ul class="work__list">

				<?php foreach ( $featured_projects as $post ) : ?>

					<?php setup_postdata( $post ); ?>

					<?php

						// Cover

						$project_cover_attachment_id = get_field( 'project_cover', $project->ID );

						// Size Labels

						$project_cover_size_large = 'cover-large';
						$project_cover_size_small = 'cover-small';

						// Image Sizes

						$project_cover_large = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_large );
						$project_cover_small = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_small );

						$project_cover = get_field( 'project_cover' );

					?>

					<li class="work__item">

						<a href="<?php the_permalink(); ?>" class="work__link">

							<!-- 
								
								Two sizes are available:
									
								1. cover-large, 380 x 560, for higher density screens.
								2. cover-small, 190 x 288, the default output.

							-->

							<div class="work__cover">

								<?php if ( $project_cover ) : ?>

									<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="project__s-img" />

								<?php else : ?>

									<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="project__s-img project__s-img--is-placeholder" />

								<?php endif; ?>
			
							</div>

							<h3 class="work__title"><?php the_title(); ?></h3>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<!-- CTA -->

		<div class="work__cta">

			<a href="/work/" title="View all of our work" class="work-cta__link">Projects</a>

		</div>

	</div>

</section>