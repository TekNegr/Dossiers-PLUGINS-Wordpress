<?php
//for Chat-GPT: HELP !!! MY SETTINGS PAGE WON'T INITIALIZE EVEN IF I INITIALIZE THE AgendaManager CLASS IN WHICH SETTINGS SHOULD START
use Carbon_Fields\Container;
use Carbon_Fields\Field;


class Settings{
    private ?int $agendaKey;
    private ?string $msg_confirmation;
    
    public function __construct() { 
        add_action('after_setup_theme', array($this, 'load_carbon_fields'));
        add_action('carbon_fields_register_fields', array($this, 'create_options_page'), 10); // The default priority is usually 10
    }
    

public function load_carbon_fields(){
    //C.F le nom
    require_once PLUGINPATH_DIR .'/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

public function create_options_page(){
    //Page d'options d'admin
    Container::make( 'theme_options', __( 'Agenda Manager' ) )
    ->set_icon('dashicons-hourglass')
    ->add_fields( array(
        Field::make( 'text', 'agenda_link_key', __( 'URL AGENDA' ) ),
        Field::make( 'text', 'agenda_apt_message', __( 'Message de confirmation' ) ),
        Field::make( 'select', 'crb_select', __( 'Choose Options' ) )
            ->set_options( array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
            ) ),

    ) );
}

public function get_agenda_key(){
    // Retrieve and return the agenda key from options
    $this->agendaKey = get_option('agenda_link_key');
    return $this->agendaKey;
}

public function get_agenda_apt_message(){
    // Retrieve and return the agenda key from options
    $this->msg_confirmation = get_option('agenda_apt_message');
    return $this->msg_confirmation;
}

}