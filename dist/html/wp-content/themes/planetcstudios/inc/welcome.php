<?php /* Section: Welcome */ ?>

<section role="" id="welcome" class="section section__welcome welcome">

	<div class="inner-wrap section__inner-wrap welcome__inner-wrap">

		<?php /* Header */ ?>

		<h1 class="section__header welcome__header"><?php the_field( 'about_tagline', 'option' ); ?></h1>

		<?php /* List of Services */ ?>

		<?php

			$featured_services = get_field( 's_welcome_featured_services' );

		?>

		<?php if ( $featured_services ) : ?>

			<ul class="services__list">

				<?php foreach ( $featured_services as $post ) : ?>

					<?php setup_postdata( $post ); ?>

					<li class="service__item">

						<?php /* Title */ ?>

						<h2 class="service__title"><?php the_title(); ?></h2>

						<?php /* Description */ ?>

						<div class="service__description">

							<?php the_field( 'service_description' ); ?>

						</div>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<?php /* CTA */ ?>

		<div class="welcome__cta">

			<a href="/work/" title="View all of our work" class="welcome__cta-link">Projects</a>

		</div>

	</div>

	<?php /* Service Samples */ ?>

	<?php

		$featured_service_samples = get_field( 's_welcome_featured_services' );

	?>

	<?php if ( $featured_service_samples ) : ?>

		<div class="services__samples">

			<?php foreach ( $featured_service_samples as $post ) : ?>

				<?php setup_postdata( $post ); ?>

				<?php /* Samples */ ?>

				<?php if ( have_rows( 'service_samples' ) ) : ?>

					<?php

						$service_featured_project = get_field( 'service_featured_project' );

						$service_featured_project_url = get_permalink( $service_featured_project->ID );

						$service_featured_project_title = get_the_title( $service_featured_project->ID );

						$number_of_samples = count( get_field( 'service_samples' ) );

					?>

					<div class="service__samples service__samples--<?php echo $number_of_samples; ?>-up">

						<?php while ( have_rows( 'service_samples' ) ) : the_row(); ?>

							<div class="service__sample service__sample--<?php echo get_row_index(); ?>">

								<div class="service__img service__img--<?php echo get_row_index(); ?>" style="background-image: url(<?php the_sub_field( 'sample_image' ); ?>);"></div>

								<?php /*

									<img src="https://via.placeholder.com/2000x2000.png?text=Sample" alt="A placeholder sample image" class="service__img" />

								*/ ?>

								<?php /*

									<img src="<?php the_sub_field( 'sample_image' ); ?>" alt="A sample title image" class="service__img" />

								*/ ?>

							</div>

						<?php endwhile; ?>

						<p class="service__highlighted-project">Highlighted Project: <a href="<?php echo esc_html( $service_featured_project_url ); ?>" class="service__highlighted-project-link"><?php echo esc_html( $service_featured_project_title ); ?></a></p>

					</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>

	<?php /* Background Image */ ?>

	<?php

		$s_welcome_background_image = get_field( 's_welcome_background_image' );

		// Image Attachment

		$s_welcome_background_image_attachment_id = get_field( 's_welcome_background_image' );

		// Size Options

		$s_welcome_background_image_size_x_large = 's-welcome-background-image-x-large';
		$s_welcome_background_image_size_large = 's-welcome-background-image-large';
		$s_welcome_background_image_size_small = 's-welcome-background-image-small';

		// Image Sizes

		$s_welcome_background_image_x_large = wp_get_attachment_image_src( $s_welcome_background_image_attachment_id, $s_welcome_background_image_size_x_large );
		$s_welcome_background_image_large = wp_get_attachment_image_src( $s_welcome_background_image_attachment_id, $s_welcome_background_image_size_large );
		$s_welcome_background_image_small = wp_get_attachment_image_src( $s_welcome_background_image_attachment_id, $s_welcome_background_image_size_small );

	?>

	<div class="welcome__background">

		<?php if ( $s_welcome_background_image ) : ?>

			<img src="<?php echo $s_welcome_background_image_small[0]; ?>" srcset="<?php echo $s_welcome_background_image_large[0]; ?> 2x, <?php echo $s_welcome_background_image_x_large[0]; ?> 3x" width="1644" height="644" alt="A photo of a rising planet earth" decoding="async" loading="lazy" class="welcome__img" />

		<?php else : ?>

			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/earthrise.png" srcset="<?php bloginfo( 'template_directory' ); ?>/assets/img/earthrise.png 2x, <?php bloginfo( 'template_directory' ); ?>/assets/img/earthrise.png 3x" width="1644" height="644" alt="A placeholder background image" decoding="async" loading="lazy" class="welcome__img welcome__img--is-placeholder" />

		<?php endif; ?>

	</div>

</section>