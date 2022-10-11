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


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// define('PLUGIN_PATH', plugin_dir_path(__FILE__));
// define('PLUGIN_URL', plugin_dir_url(__FILE__));
// define('PLUGIN', plugin_basename(__FILE__));

function activate_kashmu_plugin()
{
  Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_kashmu_plugin');

function deactivate_kashmu_plugin()
{
  Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_kashmu_plugin');

if (class_exists('Inc\\Init')) {
  Inc\Init::register_services();
}
