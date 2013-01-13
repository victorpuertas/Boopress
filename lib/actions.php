<?php
/**
 * Wordpress actions
 * 
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */
 
 /**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Boopress 1.0
 */
function boopress_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'boopress' ),
        'id' => 'sidebar-1',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'boopress' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'boopress' ),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'boopress' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'boopress_widgets_init' );
 
?>