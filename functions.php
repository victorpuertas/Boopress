<?php
/**
 * Boopress functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, boopress_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'boopress_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */

/** Tell WordPress to run boopress_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'boopress_setup' );

if ( ! function_exists( 'boopress_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override boopress_setup() in a child theme, add your own boopress_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Boopress 1.0
 */
function boopress_setup() {

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    register_nav_menus( array(
        'top' => __( 'Top Navigation', 'boopress' ),
        'bottom' => __( 'Bottom Navigation', 'boopress' ),
    ) );
    
    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'boopress', get_template_directory() . '/languages' );
}
endif;



if ( ! function_exists( 'boopress_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own boopress_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Boopress 1.0
 */
 
function boopress_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
    <li <?php comment_class('media'); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
        
        <a class="pull-left" href="<?php echo comment_author_url() ?>">
            <?php echo get_avatar( $comment, 40 ); ?>
        </a>

        <div class="media-body">

            <h4 class="media-heading">
                <?php printf( __( '%s <span class="says">says:</span>', 'boopress' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </h4>
            
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <br/>
                <em class="media alert"><?php _e( 'Your comment is awaiting moderation.', 'boopress' ); ?></em>
                <br/>
            <?php endif; ?>
                
            <div class="media">
                <?php comment_text(); ?>
            </div>

            <p class="comment-meta commentmetadata muted">
                <small>
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s at %2$s', 'boopress' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'boopress' ), ' ' );
                ?>
                </small>
            </p><!-- .comment-meta .commentmetadata -->
            
            <div class="reply small">
                <?php comment_reply_link( array_merge( $args, array( 
                    'depth' => $depth, 
                    'max_depth' => $args['max_depth'],
                    'before' => '<span class="btn">',
                    'after' => '</span>'
                    ) ) ); ?>
            </div><!-- .reply -->
            
            <hr/>
 
        </div> <!-- .comment-container -->
    </div><!-- #comment-##  -->
    
    <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'boopress' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'boopress'), ' ' ); ?></p>
    <?php
            break;
    endswitch;
}
endif;



// filters
require_once ( get_stylesheet_directory() . '/lib/filters.php' );

// actions
require_once ( get_stylesheet_directory() . '/lib/actions.php' );

// add theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
?>