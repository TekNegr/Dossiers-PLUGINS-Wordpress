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

//Backlink plugin
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/omnicontent-activation.php');
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/omnicontent-deactivation.php');
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/class-deathstar-omnicontent-ui.php');
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/class-deathstar-data-processing.php');
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/class-deathstar-db-handler.php');
require_once(plugin_dir_path(__FILE__) . 'omnicontent_includes/omnicontent-admin-settings.php');