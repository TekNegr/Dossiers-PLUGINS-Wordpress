<?php
// Define a constant for the plugin's base directory path
define('OMNICONTENT_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include necessary files
require_once OMNICONTENT_PLUGIN_DIR . 'omnicontent-activation.php';
require_once OMNICONTENT_PLUGIN_DIR . 'omnicontent-deactivation.php';
require_once OMNICONTENT_PLUGIN_DIR . 'class-deathstar-omnicontent-ui.php';
require_once OMNICONTENT_PLUGIN_DIR . 'class-deathstar-data-processing.php';
require_once OMNICONTENT_PLUGIN_DIR . 'class-deathstar-db-handler.php';
require_once OMNICONTENT_PLUGIN_DIR . 'omnicontent-admin-settings.php';
