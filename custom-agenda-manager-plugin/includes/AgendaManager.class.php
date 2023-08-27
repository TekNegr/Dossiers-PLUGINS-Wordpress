<?php

class AgendaManager{
    private $agenda_key;
    

    public function initialize($PLUGINPATH_DIR){
        require_once __DIR__ .'/settings.class.php';
        require_once __DIR__ .'/shortcode.class.php';
        require_once __DIR__ .'/Template.class.php';
        require_once __DIR__ .'/google_api.class.php';
        require_once __DIR__ .'/google_api_credentials.json';
        require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
        require_once $PLUGINPATH_DIR .'/vendor/autoload.php';
        

        define($CREDENTIALS_PATH, __DIR__ .'/google_api_credentials.json');
        $settings = new Settings();
        $settings->create_options_page;
        $this->agenda_key = $settings->get_agenda_key;
        if (defined($this->agenda_key)){$google_api = new Google_API($this->agenda_key, $CREDENTIALS_PATH);
        $shortcode = new Shortcode();}

    }
}