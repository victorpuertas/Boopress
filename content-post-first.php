<?php
    global $sa_options;
    $sa_settings = get_option( 'sa_options', $sa_options );
?>

<article>
    
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>        
    
    <?php the_content(); ?>

    <section class="post-metadata">
        <p>
            <?php _e('Published by', 'boopress')?> <strong><?php the_author_posts_link() ?></strong> | <?php the_time(__('F jS, Y')) ?>
            <?php edit_post_link( __( 'Edit', 'boopress' ), '| ', '' ); ?>
        </p>
        <p class="muted">
            
            <?php if ( count( get_the_category() ) ) : ?>
                <?php printf( __( 'Posted in %2$s', 'boopress' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
            <?php endif; ?>
        </p>
        
        <?php
            $tags_list = get_the_tag_list( '', ', ' );
            if ( $tags_list ):
        ?>
           <p class="muted">
                <?php printf( __( 'Tagged %2$s', 'boopress' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
            </p>
        <?php endif; ?>

        <?php
            if( $sa_settings['social_buttons'] == '1' ) : 
                get_template_part( 'content-shareit' ); 
            endif;
        ?>
    </section>
    
    <?php comments_template( '', true ); ?>
    
</article>  