<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) ) : ?>
    <div class="widget-area row" role="complementary">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
        <div class="span4">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
        <?php endif; ?>
        
        <?php if ( is_active_sidebar( 'sidebar-2' ) ): ?>
        <div class="span4">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>