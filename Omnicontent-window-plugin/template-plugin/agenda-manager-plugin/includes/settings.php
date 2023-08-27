<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

//Hooks
add_action( 'after_setup_theme', 'crb_load' );

add_action('carbon_fields_register_fields','create_options_page');

//load Carbon fields 
function crb_load() {
    \Carbon_Fields\Carbon_Fields::boot();
}

//Settings Page

function create_options_page(){
    //Page d'options d'admin
    Container::make( 'theme_options', __( 'Agenda Manager' ) )
    ->set_icon('dashicons-hourglass')
    ->add_fields( array(
        Field::make( 'text', 'agenda_link_key', __( 'URL AGENDA' ) ),
        Field::make( 'text', 'agenda_apt_message', __( 'Message de confirmation' ) ),
    ) );
}