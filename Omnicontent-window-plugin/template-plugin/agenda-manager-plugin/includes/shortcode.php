<?php

add_shortcode('getCalendarManager', 'show_calendar');
add_action('rest_api_init','create_rest_endpoint');

function show_calendar(){

    include_once MY_PLUGIN_PATH . 'includes/templates/AgendaManager.php';

}

function create_rest_endpoint(){
    register_rest_route('v1/AgendaManager','submit', array(
        
    ));
}