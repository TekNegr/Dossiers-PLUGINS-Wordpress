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

// Security check to prevent direct access to the plugin file
defined('ABSPATH') or die('AH! AH! AAAAH! You did not say the magic word :)');

// Plugin activation and deactivation hooks
register_activation_hook(__FILE__, 'omnicontent_window_activate');
register_deactivation_hook(__FILE__, 'omnicontent_window_deactivate');
require_once plugin_dir_path( __FILE__ ) . 'omnicontent-activation.php';
require_once plugin_dir_path( __FILE__ ) . 'omnicontent.deactivation.php';

// Function to run when the plugin is activated
function omnicontent_window_activate() {
    // Add any activation tasks you need here
    omnicontent_activate()
    // Show activation notice
}

// Function to run when the plugin is deactivated
function omnicontent_window_deactivate() {
    // Add any deactivation tasks you need here
    omnicontent_deactivate()
    // Show deactivation notice

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
add_action('init', 'omnicontent_window_init');

// Add the following code in your main plugin file (omnicontent-window.php) or a separate file included from it.

// Step 1: Register Admin Menu
function omnicontent_settings_page() {
    add_menu_page(
        'Omnicontent Settings',        // Page title
        'Omnicontent',                 // Menu title
        'manage_options',              // Capability required to access the page
        'omnicontent-settings',        // Menu slug (unique identifier)
        'omnicontent_render_settings', // Callback function to render the settings page
        'dashicons-admin-generic'      // Icon for the menu item (you can choose any Dashicon)
    );
}
add_action('admin_menu', 'omnicontent_settings_page');

// Step 2: Create Admin Settings Sections
function omnicontent_settings_sections() {
    // Add sections for your settings
    add_settings_section(
        'omnicontent_general_section', // Section ID
        'General Settings',            // Section title
        'omnicontent_general_section_callback', // Callback function to render the section description (optional)
        'omnicontent-settings'         // Page slug where the section will be displayed
    );

    // Add more sections as needed
}
add_action('admin_init', 'omnicontent_settings_sections');

// Step 3: Add Settings Fields
function omnicontent_settings_fields() {
    // Add settings fields for each section
    add_settings_field(
        'omnicontent_option_name',    // Field ID
        'Omnicontent Option',         // Field label
        'omnicontent_option_callback', // Callback function to render the field input
        'omnicontent-settings',       // Page slug where the field will be displayed
        'omnicontent_general_section' // Section ID to associate the field with
    );

    // Add more fields as needed
}
add_action('admin_init', 'omnicontent_settings_fields');

// Step 4: Sanitize and Validate Input (optional)
function omnicontent_sanitize_input($input) {
    // Implement sanitization and validation for each setting
    return $input;
}
register_setting('omnicontent_options_group', 'omnicontent_option_name', 'omnicontent_sanitize_input');

// Step 5: Save Settings
// No explicit save function is required since the 'register_setting' function handles it for you.

// Step 6: Render the Settings Page
function omnicontent_render_settings() {
    ?>
    <div class="wrap">
        <h1>Omnicontent Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('omnicontent_options_group');
            do_settings_sections('omnicontent-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Step 2 (continued): Render Section Description (optional)
function omnicontent_general_section_callback() {
    echo 'General settings for Omnicontent plugin.';
}

// Step 3 (continued): Render Field Input
function omnicontent_option_callback() {
    $value = get_option('omnicontent_option_name');
    ?>
    <input type="text" name="omnicontent_option_name" value="<?php echo esc_attr($value); ?>" />
    <?php
}

