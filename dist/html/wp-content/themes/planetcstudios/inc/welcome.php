<?php /* Section: Welcome */ ?>

<section role="" id="welcome" class="section section__welcome welcome">

	<div class="inner-wrap section__inner-wrap welcome__inner-wrap">

		<!-- Header -->

		<h1 class="header section__header welcome__header"><?php the_field( 'about_tagline', 'option' ); ?></h1>

		<!-- List of Services -->

		<?php

			$featured_services = get_field( 's_welcome_featured_services' );

		?>

		<?php if ( $featured_services ) : ?>

			<ul class="services__list">

				<?php foreach ( $featured_services as $post ) : ?>

					<?php setup_postdata( $post ); ?>

					<li class="service__item">

						<!-- Title -->

						<h2 class="service__title"><?php the_title(); ?></h2>

						<!-- Description -->

						<div class="service__description">

							<?php the_field( 'service_description' ); ?>

						</div>

						<!-- Samples -->

						<?php if ( have_rows( 'service_samples' ) ) : ?>

							<?php

								$number_of_samples = count( get_field( 'service_samples' ) );

							?>

							<div class="service__samples service__samples--<?php echo $number_of_samples; ?>-up">

								<?php while ( have_rows( 'service_samples' ) ) : the_row(); ?>

									<div class="service__sample service__sample--<?php echo get_row_index(); ?>">

										<div class="service__img"></div>

										<?php /*

											<img src="https://via.placeholder.com/2000x2000.png?text=Sample" alt="A placeholder sample image" class="service__img" />

										*/ ?>

										<?php /*

											<img src="<?php the_sub_field( 'sample_image' ); ?>" alt="A sample title image" class="service__img" />

										*/ ?>

									</div>

								<?php endwhile; ?>

							</div>

						<?php endif; ?>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<?php

			/* The background image for this section is considered part of overall look and feel for the theme. This image can be found in the root theme directory at `assets/img/name.png`. */

		?>

		<div class="welcome__background">

			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/earthrise.png" srcset="<?php bloginfo( 'template_directory' ); ?>/assets/img/earthrise.png 2x" width="1730" height="400" alt="A photo of a rising planet earth" decoding="async" loading="lazy" class="welcome__img" />

		</div>

	</div>

</section>