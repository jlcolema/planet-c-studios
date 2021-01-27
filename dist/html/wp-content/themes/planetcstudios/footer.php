<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */

?>

		</div>

	</main>

	<footer role="contentinfo" class="footer">

		<div class="wrap footer__wrap">

			<div class="secondary-logo">

				<a href="#top" title="Return to the top of the page." class="secondary-logo__link">

					<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo.png" srcset="<?php bloginfo( 'template_directory' ); ?>/assets/img/logo_2x.png 2x" width="120" height="65" alt="<?php bloginfo( 'name' ); ?>" decoding="async" loading="lazy" class="secondary-logo__img" />

				</a>

			</div>

			<p class="copyright">Copyright &copy; <?php the_field( 'about_founded', 'option' ); ?>-<?php echo date_i18n( _x( 'Y', 'copyright date format', 'planetcstudios' ) ); ?> <?php bloginfo( 'name' ); ?> &ndash; All Rights Reserved</p>

			<?php if ( have_rows( 'social_list', 'option' ) ) : ?>

				<div class="social">

					<ul class="social__list">

						<?php while ( have_rows( 'social_list', 'option' ) ) : the_row(); ?>

							<?php

								// Output value and label for the service.

								$social_service = get_sub_field( 'social_service', 'option' );

								$social_icon = get_sub_field( 'social_icon', 'option' );

							?>

							<li class="social__item social__item--<?php echo esc_attr( $social_service['value'] ); ?>">

								<a href="<?php the_sub_field( 'social_url', 'option' ); ?>" class="social__link">
								
									<?php echo file_get_contents( $social_icon ); ?>
									
								</a>

							</li>

						<?php endwhile; ?>

					</ul>

				</div>

			<?php endif; ?>

			<?php

				/* The background image for this section is considered part of overall look and feel for the theme. This image can be found in the root theme directory at `assets/img/name.png`. */

			?>

			<div class="footer__background">

				<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/moonrise.png" srcset="<?php bloginfo( 'template_directory' ); ?>/assets/img/moonrise_2x.png 2x" width="360" height="140" alt="<?php bloginfo( 'name' ); ?>" decoding="async" loading="lazy" class="footer__img" />

			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>

	<?php /* Intersection Observer */ ?>

	<script type="text/javascript">

		// const sections = document.querySelectorAll('.section');

		// const config = {

		// 	// root: document.body,
		// 	rootMargin: '0px',
		// 	threshold: 0.30

		// };

		// observer = new IntersectionObserver((entries) => {

		// 	entries.forEach(entry => {

		// 		if (entry.intersectionRatio > 0) {
					
		// 			entry.target.classList.add('section--is-visible');
	
		// 			observer.unobserve(entry.target);
	
		// 		} else {

		// 			entry.target.classList.remove('section--is-visible');

		// 		}
		// 	});

		// }, config);

		// sections.forEach(section => {

		// 	observer.observe(section);

		// });

	</script>

	<?php /* Animated Backgrounds */ ?>

	<?php

		// Examples that are close to what is needed...

		// Example 01: https://codepen.io/kevinhufnagl/pen/YzwBemd
		// Example 02: https://www.vantajs.com/?effect=fog
		// Example 03: https://sarcadass.github.io/granim.js/index.html

	?>

	<script type="text/javascript">

		/* Stripe */

		/* Vanta */

		// VANTA.FOG({

		// 	el: ".section__clients",
		// 	mouseControls: false,
		// 	touchControls: false,
		// 	gyroControls: false,
		// 	minHeight: 200.00,
		// 	minWidth: 200.00,
		// 	highlightColor: 0x9d222f, // pink
		// 	midtoneColor: 0xca9d2b, // yellow
		// 	lowlightColor: 0x2a0a36, // purple
		// 	baseColor: 0x205867, // blue
		// 	blurFactor: 0.79,
		// 	zoom: 0.50,
		// 	speed: 0.50

		// });

		/* Granim */

	</script>

	<?php /* Locomotive Scroll */ ?>

	<script type="text/javascript">

		(function () {

			var scroll = new LocomotiveScroll({

				el: document.querySelector('[data-scroll-container]'),
				// smooth: true

			});

		})();

	</script>

</body>

</html>
