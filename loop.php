<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */
?>

<?php 
    if ( ! have_posts() ) :
        get_template_part( 'content','none' ); 
    endif;
?>

<?php 
    $firstPost = true;
    
    while (have_posts()) : 
        the_post();
        
        if($firstPost)
            get_template_part( 'content','post-first' );
        else
            get_template_part( 'content','post' );
         
        $firstPost = false;
    endwhile;
?>
    
<?php 
    if (  $wp_query->max_num_pages > 1 ) : 
        get_template_part( 'content','pagination' );
    endif;
?>
