<?php
/*
Plugin Name: Add Code to Header
Plugin URI: https://j-brownb.github.io/
Description: This is a plugin for adding custom code to the <head> tag of your WP site. For educational purposes only!
Version: 1.0
Author: Jonny Hodgson
Author URI: https://j-brownb.github.io/
License: GPL2
*/

// Add Plugin to menu
function addMenu()
{
    add_menu_page(
        'Header Code Settings', // Title 
        'Add Custom Header Code', // Menu title
        'manage_options',
        'custom-header-code', // Slug 
        'settings_page',
        'dashicons-editor-code' // Icon
    );
}

add_action('admin_menu', 'addMenu');

// Plugin page content 
function settings_page()
{
    ?>
    <div class="wrap">
        <h1>Custom Code Settings</h1>
        <p>Use the box below to add custom header code to your site. This field can be used to easily add tracking codes
            such as Google Analytics.</p>
        <p>If you are adding tracking codes, ensure they are wrapped in script tags to prevent your code being visible on
            the front end.</p>
            <!-- Checks for success -->
            <?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']) : ?>
            <div class="notice notice-success is-dismissible">
                <p>Settings saved successfully.</p>
            </div>
        <?php endif; ?>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_header_code_group');
            do_settings_sections('custom-header-code');
            $custom_header_code = get_option('custom_header_code', '');
            ?>
            <textarea id="custom_header_code" name="custom_header_code" rows="20" cols="50"><?php echo esc_textarea($custom_header_code); ?></textarea>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function custom_header_code_settings_init()
{
    register_setting('custom_header_code_group', 'custom_header_code');
}

add_action('admin_init', 'custom_header_code_settings_init');

// Function to add the code to the head
function add_custom_code_to_head()
{
    $custom_header_code = get_option('custom_header_code', '');
    echo $custom_header_code;

}
add_action('wp_head', 'add_custom_code_to_head');
?>