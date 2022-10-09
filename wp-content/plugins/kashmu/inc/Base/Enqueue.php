<?php

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('kashmu-style', PLUGIN_URL . 'assets/css/style.css');
        wp_enqueue_script('kashmu-script', PLUGIN_URL . 'assets/js/script.js');
    }
}
