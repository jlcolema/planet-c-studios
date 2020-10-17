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

					<!-- If possible, use embedded SVG markup. -->

					<?php bloginfo( 'name' ); ?>

				</a>

			</div>

			<p class="copyright">Copyright &copy; 2001-<?php echo date_i18n( _x( 'Y', 'copyright date format', 'planetcstudios' ) ); ?> <?php bloginfo( 'name' ); ?> &ndash; All Rights Reserved</p>

			<!-- Background -->

			<div class="footer__background">

				<img src="https://via.placeholder.com/300x200.png?text=Background+(300x200)" alt="A photo of a rising planet moon" class="footer__img" />

			</div>

		</div>

	</footer>

	<!-- <script src="js/vencor/modernizr-3.5.0.min.js"></script> -->
	<!-- <script src="js/functions.js"></script> -->

	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->

	<!-- <script>

		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-3409719-1', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')

	</script> -->

	<!-- <script src="https://www.google-analytics.com/analytics.js" async></script> -->

	<?php wp_footer(); ?>

</body>

</html>
