<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */

get_header(); ?>

    <?php if ( have_posts() ) : ?>
        
        <h2><?php printf( __( 'Category Archives: %s', 'boopress' ), '' . single_cat_title( '', false ) . '' ); ?></h2>
        
        <?php $category = category_description() ?>
        <?php if(strlen($category) > 0): ?>
            <div class="alert alert-info"><?php echo $category ?></div>
        <?php endif; ?>
             
        
        <?php
        /* Run the loop for the category page to output the posts.
         * If you want to overload this in a child theme then include a file
         * called loop-category.php and that will be used instead.
         */
        get_template_part( 'loop', 'category' );
        ?>
        
    <?php else: ?>
        
        <?php get_template_part( 'content', 'none' ); ?>
        
    <?php endif; ?>

<?php get_footer(); ?>