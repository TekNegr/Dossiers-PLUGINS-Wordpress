<?php

function omnicontent_deactivate() {
    // Add any deactivation tasks you need here

    // Remove custom database tables (if applicable)
    // Example: my_custom_remove_tables();

    // Clean up options (if applicable)
    // Example: delete_option('omnicontent_option_name');

    // Delete transients (if applicable)
    // Example: delete_transient('omnicontent_transient_data');

    // Unregister hooks (if applicable)
    // Example: remove_action('some_hook', 'my_custom_function');

    // Clear caches (if applicable)
    // Example: my_custom_clear_cache();

    // Remove custom post types and taxonomies (if applicable)
    // Example: unregister_post_type('my_custom_post_type');
    // Example: unregister_taxonomy('my_custom_taxonomy');

    // Remove temporary files or directories (if applicable)
    // Example: my_custom_remove_temp_files();
}

register_deactivation_hook(__FILE__, 'omnicontent_window_deactivate');
