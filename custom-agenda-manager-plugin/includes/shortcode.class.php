<?php

class Shortcode{
    public function __construct(){
        add_shortcode('display_agenda', array($this,'render_agenda'));
    }

    public function render_agenda($atts) {
        // For ChatGPT : I want to have a google api function to be able to show a calendar
    }
}