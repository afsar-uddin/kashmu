<?php

/**
 * @package kashmu
 */

namespace Inc\Base;

class SettingsLinks
{
    public function register()
    {
        add_filter("plugin_action_links_" . PLUGIN, array($this, 'setting_link'));
    }

    public function setting_link($links)
    {
        $settings_link = '<a href="admin.php?page=kashmu_plugin">Settings</a>';
        array_push($links, $settings_link);

        return $links;
    }
}
