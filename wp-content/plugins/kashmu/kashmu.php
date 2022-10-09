<?php

/**
 * @package kashmu
 */

/*
  Plugin Name: Kashmu
  Plugin URI: http://www.afsarbd.com/plugins
  Description: This is first attempt on writing a custom plugin
  Version: 1.0.0
  Author: Afsar Uddin
  Author URI: http://www.afsarbd.com
  License: GPLv2 or later
  Text Domain: kashmu
  */

/*
  This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundtion; either version 2 of the License, or (at your option) any later version.

  This is distributed in the hope that it will be usefull, 
  but WITHOUT ANY WARANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. 
  
  You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, INC., 51 Franklin street, Fifth Floor, Boston, MA 02110-1301, USA.

  Copyright 2005-2015 Automatic, Inc.
  */

/* Note: The following defined all are same work */

//   if(!defined('ABSPATH')) {
//     die;
//   }

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

//   if(!function_exists('add_action')) {
//     echo 'Hey, you can\t access this file, you silly human!';
//     exit;
//   }

// CLASS
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if (!class_exists('kashmuPlugin')) {
    class kashmuPlugin
    {
        public $plugin;

        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));

            // echo $this->plugin;
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=kashmu_plugin">Settings</a>';
            array_push($links, $settings_link);

            return $links;
        }

        public function add_admin_pages()
        {
            add_menu_page('Kashmu Plugin', 'Kashmu', 'manage_options', 'kashmu_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }


        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        // register custom post type
        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        // enqueue 
        function enqueue()
        {
            wp_enqueue_style('kashmu-style', plugins_url('/assets/css/style.css', __FILE__));
            wp_enqueue_script('kashmu-script', plugins_url('/assets/js/script.js', __FILE__));
        }

        function activate()
        {
            Activate::activate();
        }
    }


    // INSTANCE 
    $kashmuPlugin = new kashmuPlugin();
    $kashmuPlugin->register();

    // Activation
    register_activation_hook(__FILE__, [$kashmuPlugin, 'activate']);

    // Deactivation
    register_deactivation_hook(__FILE__, ['Deactivate', 'deactivate']);
}
