<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */

get_header(); ?>

<?php 
    if ( ! have_posts() ) :
        get_template_part( 'content', 'none' ); 
    endif;
?>

<?php 
    $firstPost = true;
    
    while (have_posts()) : 
        the_post();
        
        if($firstPost)
            get_template_part( 'content', 'post-first' );
        else
            get_template_part( 'content', 'post' );
         
        $firstPost = false;
    endwhile;
?>
    
<?php 
    if (  $wp_query->max_num_pages > 1 ) : 
        get_template_part( 'content','pagination' );
    endif;
?>


<?php get_footer(); ?>