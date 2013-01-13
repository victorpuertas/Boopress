<?php

// Default options values
$sa_options = array(
    'social_buttons' => 0,
    'image_effect_class' => 'img-rounded' 
);

$sa_image_effect = array(
    'img-no-effect' => array(
        'value' => 'img-no-effect',
        'label' => 'No effect'
    ),
    'img-polaroid' => array(
        'value' => 'img-polaroid',
        'label' => 'Polaroid'
    ),
    'img-rounded' => array(
        'value' => 'img-rounded',
        'label' => 'Rounded corner'
    ),
    'img-circle' => array(
        'value' => 'img-circle',
        'label' => 'Circle'
    )
);



if ( is_admin() ) : // Load only if we are viewing an admin page

function sa_register_settings() {
    // Register settings and call sanitation functions
    register_setting( 'sa_theme_options', 'sa_options', 'sa_validate_options' );
}

add_action( 'admin_init', 'sa_register_settings' );

function sa_theme_options() {
    // Add theme options page to the addmin menu
    add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'sa_theme_options_page' );
}

add_action( 'admin_menu', 'sa_theme_options' );


// Function to generate options page
function sa_theme_options_page() {
    global $sa_options, $sa_image_effect;

    if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false; // This checks whether the form has just been submitted. ?>

    <div class="wrap">

    <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>";?>

    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
    <div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
    <?php endif; // If the form has just been submitted, this shows the notification ?>

    <form method="post" action="options.php">

        <?php $settings = get_option( 'sa_options', $sa_options ); ?>
        
        <?php settings_fields( 'sa_theme_options' );
        /* This function outputs some hidden fields required by the form,
        including a nonce, a unique number used to ensure the form has been submitted from the admin page
        and not somewhere else, very important for security */ ?>
    
        <table class="form-table">
    
            <tr valign="top">
                <th scope="row">Social Buttons</th>
                <td>
                    <p>
                        <input type="checkbox" id="social_buttons" name="sa_options[social_buttons]" value="1" <?php checked( true, $settings['social_buttons'] ); ?> />
                        <label for="social_buttons">Enable social buttons after each post (Facebook, Twitter and Google Plus).</label>
                    </p>
                </td>
            </tr>
            
            <tr valign="top"><th scope="row">General images effects</th>
                <td>
                    <?php foreach( $sa_image_effect as $val ) : ?>
                    <input type="radio" id="<?php echo $val['value']; ?>" name="sa_options[image_effect_class]" value="<?php esc_attr_e( $val['value'] ); ?>" <?php checked( $settings['image_effect_class'], $val['value'] ); ?> />
                    <label for="<?php echo $val['value']; ?>"><?php echo $val['label']; ?></label><br/>
                    <?php endforeach; ?>      
                </td>
            </tr>

        </table>
    
        <p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

    </form>

    </div>

    <?php
}

function sa_validate_options( $input ) {
    global $sa_options, $sa_image_effect;

    $settings = get_option( 'sa_options', $sa_options );
    
    // If the checkbox has not been checked, we void it
    if ( ! isset( $input['social_buttons'] ) )
        $input['social_buttons'] = null;

    $input['social_buttons'] = ( $input['social_buttons'] == 1 ? 1 : 0 );
    
    
    // Previous value of the field
    $prev = $settings['image_effect_class'];

    if ( !array_key_exists( $input['image_effect_class'], $sa_image_effect ) )
        $input['image_effect_class'] = $prev;
    
    return $input;
}

endif;  // EndIf is_admin()