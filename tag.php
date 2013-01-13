<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */

get_header(); ?>

<h2><?php printf( __( 'Tag Archives: %s', 'boopress' ), '' . single_tag_title( '', false ) . '' );?></h2>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

<?php get_footer(); ?>