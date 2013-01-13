<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Boopress
 * @since Boopress 1.0
 */
?>

<?php if ( post_password_required() ) : ?>
        <p class="alert alert-error margin-top-10"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'boopress' ); ?></p>
<?php
        /* Stop the rest of comments.php from being processed,
         * but don't kill the script entirely -- we still have
         * to fully load the template.
         */
        return;
    endif;
?>

<?php
    // You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
            <!-- STARKERS NOTE: The following h3 id is left intact so that comments can be referenced on the page -->
            <h3 id="comments-title"><?php
            printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'boopress' ),
            number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
            ?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                <?php previous_comments_link( __( '&larr; Older Comments', 'boopress' ) ); ?>
                <?php next_comments_link( __( 'Newer Comments &rarr;', 'boopress' ) ); ?>
<?php endif; // check for comment navigation ?>

            <ul class="media-list">
                <?php
                    /* Loop through and list the comments. Tell wp_list_comments()
                     * to use twentyten_comment() to format the comments.
                     * If you want to overload this in a child theme then you can
                     * define twentyten_comment() and that will be used instead.
                     * See boopress_comment() in boopress/functions.php for more.
                     */
                    wp_list_comments( array( 'callback' => 'boopress_comment' ) );
                ?>
            </ul>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                <?php previous_comments_link( __( '&larr; Older Comments', 'boopress' ) ); ?>
                <?php next_comments_link( __( 'Newer Comments &rarr;', 'boopress' ) ); ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

    /* If there are no comments and comments are closed,
     * let's leave a little note, shall we?
     */
    if ( ! comments_open() ) :
?>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php 
    $fields =  array(
        'author' => '<p class="comment-form-author">' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" placeholder="'.__('Your name', 'boopress').'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
        'email' => '<p class="comment-form-email">' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="email" placeholder="'.__('Your email', 'boopress').'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
        'url' => '<p class="comment-form-url"><input id="url" name="url" class="span5" type="url" placeholder="http://" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
    );
    
    $comment_notes_after = '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <pre>' . allowed_tags() . '</pre>' ) . '</p>';

    comment_form( array(
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" class="span5" rows="4" placeholder="'.__('Type something…', 'boopress').'" name="comment" aria-required="true"></textarea></p>',
        'fields' => $fields,
        'comment_notes_after' =>$comment_notes_after,
    ));
?>