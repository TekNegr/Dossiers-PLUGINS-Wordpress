<?php
// omnicontent-activation.php

require_once(plugin_dir_path(__FILE__) . 'class-deathstar-db-handler.php');

function omnicontent_activate() {
    // Activation tasks
    add_action('admin_notices', 'omnicontent_window_activation_notice');

    // 1. Create custom database tables, if needed
    // Example: my_custom_create_tables();

    // 2. Set up default options and settings
    // Example: my_custom_setup_default_options();

    // 3. Add capabilities and permissions
    // Example: my_custom_add_capabilities();

    // 4. Flush rewrite rules
    // Example: flush_rewrite_rules();

    // 5. Store the plugin version for future updates
    // Example: update_option('omnicontent_version', '1.0');

    // 6. Perform dependency checks
    // Example: my_custom_dependency_check();
    // Create a new instance of the Deathstar_DB_Handler class
    $db_handler = new Deathstar_DB_Handler();

    // Create the necessary tracking table
    $db_handler->create_tracking_table();


    // You can include other activation tasks as needed.
}

// Call the activation function when the plugin is activated
register_activation_hook(__FILE__, 'omnicontent_activate');

function omnicontent_window_activation_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e('Omnicontent Window plugin has been activated successfully!', 'omnicontent-window'); ?></p>
    </div>
    <?php
}