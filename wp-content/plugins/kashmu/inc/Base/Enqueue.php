<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('kashmu-style', $this->plugin_url . 'assets/css/style.css');
        wp_enqueue_script('kashmu-script', $this->plugin_url . 'assets/js/script.js');
    }
}
