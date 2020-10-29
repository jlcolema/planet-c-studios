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

			<p class="copyright">Copyright &copy; 2001-<?php echo date_i18n( _x( 'Y', 'copyright date format', 'planetcstudios' ) ); ?> <?php bloginfo( 'name' ); ?> &ndash; All Rights Reserved</p>

			<div class="social">

				<ul class="social__list">

					<li class="social__item social__item--facebook">

						<a href="#" class="social__link">Facebook</a>

					</li>

					<li class="social__item social__item--twitter">

						<a href="#" class="social__link">Twitter</a>

					</li>

					<li class="social__item social__item--youtube">

						<a href="#" class="social__link">YouTube</a>

					</li>

				</ul>

			</div>

			<!-- Background -->

			<div class="footer__background">

				<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/moonrise.png" srcset="<?php bloginfo( 'template_directory' ); ?>/assets/img/moonrise_2x.png 2x" width="360" height="140" alt="<?php bloginfo( 'name' ); ?>" decoding="async" loading="lazy" class="footer__img" />

			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>

</body>

</html>
