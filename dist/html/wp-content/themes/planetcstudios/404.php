<?php
/**
 * The template for displaying the 404 template in the Planet C Studios theme.
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */
?>

<?php get_header(); ?>

	<div class="error">

		<div class="error__inner-wrap">

			<h1 class="error__header">404: Page not Found</h1>

			<div class="error__message">

				<?php the_field( '404_message', 'option' ); ?>

			</div>

		</div>

	</div>

<?php get_footer(); ?>