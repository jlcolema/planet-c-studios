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

			<div class="logo logo--secondary">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo__link">

					<?php bloginfo( 'name' ); ?>

				</a>

			</div>

			<p class="copyright">Copyright &copy; 2001-<?php echo date_i18n( _x( 'Y', 'copyright date format', 'planetcstudios' ) ); ?> <?php bloginfo( 'name' ); ?> &ndash; All Rights Reserved</p>

		</div>

	</footer>

	<!-- <script src="js/vencor/modernizr-3.5.0.min.js"></script> -->
	<!-- <script src="js/functions.js"></script> -->

	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->

	<!-- <script>

		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')

	</script> -->

	<!-- <script src="https://www.google-analytics.com/analytics.js" async></script> -->

	<?php wp_footer(); ?>

</body>

</html>
