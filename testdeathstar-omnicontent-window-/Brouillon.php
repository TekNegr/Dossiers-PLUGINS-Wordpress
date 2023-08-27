//Main plugin file 
<?php
/*
Plugin Name: Omnicontent Window
Plugin URI: https://github.com/TekNegr?tab=repositories
Description: This plugin displays dynamic content based on user input.
Version: 1.0
Author: Henintsoa "DeathStar, ratShtaeD, TekNegr" RAMAKAVELO 
Author URI: https://github.com/TekNegr?tab=repositories
License: GPL2 or later
*/

// Plugin activation and deactivation hooks

defined('ABSPATH') or die('AH! AH! AAAAH! Tu as pas dis le mot magique :)')

register_activation_hook(__FILE__, 'omnicontent_window_activate');
register_deactivation_hook(__FILE__, 'omnicontent_window_deactivate');

// Function to run when the plugin is activated
function omnicontent_window_activate() {
// Add any activation tasks you need here
}

// Function to run when the plugin is deactivated
function omnicontent_window_deactivate() {
    // Add any deactivation tasks you need here
}

// Function to initialize the plugin
function omnicontent_window_init() {
    // Add your plugin's initialization code here

    // Include necessary files
    require_once(plugin_dir_path(__FILE__) . 'class-deathstar-omnicontent-ui.php');
    require_once(plugin_dir_path(__FILE__) . 'class-deathstar-data-processing.php');

    // Initialize your controller
    $omnicontent_ui = new Deathstar_Omnicontent_UI();
}

// Hook into WordPress initialization to initialize the plugin
add_action('init', 'my_custom_plugin_init');
