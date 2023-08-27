<?php

/*
Plugin Name: Template Plugin
Plugin URI: https://github.com/TekNegr?tab=repositories
Description: Ceci est un fichier blanc pour créer un plugin
Version: 1.0
Author: Henintsoa "DeathStar, ratShtaeD, TekNegr" RAMAKAVELO 
Author URI: https://github.com/TekNegr?tab=repositories
License: GPL2 or later
*/

//Empeche les acces non autorisés
if(!defined('ABSPATH')){
    die('Acces illegal');
}

//Definition de la class du plugin
if(!class_exists('ClassPlugin')){

class ClassPlugin{ 

     public function __construct(){
        define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));

        require_once( PLUGIN_PATH .'/vendor/autoload.php' );

    }

    public function initialize(){
        include_once PLUGIN_PATH . 'includes/utilities.php';

        include_once PLUGIN_PATH . 'includes/settings.php';

        include_once PLUGIN_PATH . 'includes/shortcode.php';
    }

}

//Instance du Plugin
$plugin = new ClassPlugin;

$plugin->initialize();

}