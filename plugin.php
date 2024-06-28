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

function addMenu()
{
    add_options_page(
        'Header Code Settings',
        'Add Customer Header Code',
        'manage_options',
        'custom-header-code',
        'settings_page'
    );

}

add_action('admin_menu', 'addMenu'); 

function settings_page() {
    echo '<div><h1>Custom Code Settings</h1><p>Use the box below to add custom header code to your site.</p></div>';
}
