<?php

add_shortcode('shortcode_name','shortcode_callback');
add_action('rest_api_init', 'create_rest_endpoint');

function shortocode_callback(){
    //C'est ici que ce trouvera le code du shortcode 
    
    //Include du template HTML dans templates
    include PLUGIN_PATH . '/includes/templates/template.php';
};
