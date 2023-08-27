<?php 

/*
Plugin Name: Custom Agenda Manager
Plugin URI: https://github.com/TekNegr?tab=repositories
Description: Petit plugin pour pouvoir ajouter son propre agenda et le manager depuis un site tiers
Version: 1.2
Author: Henintsoa "DeathStar, ratShtaeD, TekNegr" RAMAKAVELO 
Author URI: https://github.com/TekNegr?tab=repositories
License: GPL2 or later
*/


if (!defined('ABSPATH')){

    die('\',:/ #Awkward');

}



require_once __DIR__ .'/includes/AgendaManager.class.php';
require_once __DIR__ . '/vendor/autoload.php';

\Carbon_Fields\Carbon_Fields::boot();

define('PLUGINPATH_DIR',__DIR__);

if(!class_exists('AgendaManager')){

    $agenda_manager = new AgendaManager;
    $agenda_manager->initialize(PLUGINPATH_DIR);
}