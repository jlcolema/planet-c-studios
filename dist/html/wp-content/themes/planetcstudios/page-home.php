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
	
		/* Sections have been moved to individual include files to makes things easier to work on. The can be found within the `inc` directory, which is located in the root directory of the theme being used. */

	?>

	<?php get_template_part( 'inc/welcome' ); ?>

	<?php get_template_part( 'inc/clients' ); ?>

	<?php get_template_part( 'inc/work' ); ?>

	<?php get_template_part( 'inc/about' ); ?>

	<?php get_template_part( 'inc/contact' ); ?>

<?php get_footer(); ?>