<?php
/*
Plugin Name: Window Content Plugin
Plugin URI: https://github.com/TekNegr?tab=repositories
Description: This plugin displays dynamic content based on user input.
Version: 1.0
Author: Henintsoa "DeathStar, ratShtaeD, TekNegr" RAMAKAVELO 
Author URI: https://github.com/TekNegr?tab=repositories
License: GPL2 or later
*/

// Plugin code will be added here in the subsequent steps.

if (!defined('ABSPATH')) {
    exit; // Prevent direct access to the plugin file.
}

// Activation hook
register_activation_hook(__FILE__, 'window_content_plugin_activate');

// Deactivation hook
register_deactivation_hook(__FILE__, 'window_content_plugin_deactivate');

function window_content_plugin_activate() {
    // Add activation tasks here if needed.
}

function window_content_plugin_deactivate() {
    // Add deactivation tasks here if needed.
}

// Add the Elementor widget file
require_once plugin_dir_path(__FILE__) . 'class-window-content-widget.php';

// Register the Elementor widget
add_action('elementor/widgets/widgets_registered', function () {
    // Make sure to replace 'Your_Widget_Class_Name' with the appropriate class name.
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Your_Widget_Class_Name());
});

class Window_Content_Class extends \Elementor\Widget_Base {
    public function get_name() {
        return 'window-content'; // The unique name of your widget (all lowercase, no spaces)
    }

    public function get_title() {
        return __('Window Content', 'your-text-domain'); // The title of your widget as displayed in Elementor
    }

    public function get_icon() {
        return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                </svg>';
    }

    public function get_categories() {
        return ['general']; // Choose the category where your widget should appear in Elementor's widget panel
    }

    // Other methods and widget code will be added here.
    protected function _register_controls() {
        // Define the settings and options for your widget using the Elementor API.

        //Add Color
        $this->add_control(
            'window_color',
            [
                'label' => __('Window Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR, // Use COLOR type for a color picker
                'default' => '#FF0000', // Default color
                'selectors' => [
                    '{{WRAPPER}} .window-content' => 'background-color: {{VALUE}};', // Apply the color to the window
                ],
            ]
        );
    }

    protected function render() {
        // Generate and display the dynamic content for your widget.
    }

    protected function _content_template() {
        // The template for your widget's dynamic content using Elementor tags.
    }

}
