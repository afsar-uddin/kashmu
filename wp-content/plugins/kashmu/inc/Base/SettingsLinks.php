<?php

/**
 * @package kashmu
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class SettingsLinks extends BaseController
{

    public function register()
    {
        add_filter("plugin_action_links_" . $this->plugin, array($this, 'setting_link'));
    }


    public function setting_link($links)
    {
        $settings_link = '<a href="admin.php?page=kashmu_plugin">Settings</a>';
        array_push($links, $settings_link);

        return $links;
    }
}
