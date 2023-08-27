<?php 

/**
* Plugin Name: Agenda Manager
* Plugin URI: https://github.com/TekNegr?tab=repositories
* Description: Plugin pour ajouter et gérer un agenda dynamique
* Version: 1.0
* Author: Henintsoa "DeathStar, ratShtaeD, TekNegr" RAMAKAVELO 
* Author URI: https://github.com/TekNegr?tab=repositories
* License: GPL2 or later
*/

if(!defined('ABSPATH')){

    die('Tu fous quoi ici?');

};

if(!class_exists('AgendaManager')){
class AgendaManager{

    public function __construct(){
        define ('MY_PLUGIN_PATH' , plugin_dir_path( __FILE__ ));

        require_once( MY_PLUGIN_PATH . '/vendor/autoload.php');
    }

    public function initialize(){

        include_once MY_PLUGIN_PATH . 'includes/utilities.php';

        include_once MY_PLUGIN_PATH . 'includes/settings.php';

        include_once MY_PLUGIN_PATH . 'includes/shortcode.php';

    }

    


}

$agendaManager = new AgendaManager;

$agendaManager->initialize();

}