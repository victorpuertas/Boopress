<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */

get_header(); ?>

<?php 
    global $sa_options;
    $sa_settings = get_option( 'sa_options', $sa_options );
?>

<?php
    $firstPost = true;
     
    while (have_posts()) : 
        the_post(); 
        get_template_part( 'content','post-first' );
    endwhile;
?>
   
<?php get_footer(); ?>