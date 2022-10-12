<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

    public $settings;
    public $pages;
    public $subpages;

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = [
            [
                'page_title' => 'Kashmu Plugin',
                'menu_title' => 'Kashmu',
                'capability' => 'manage_options',
                'menu_slug' => 'kashmu_plugin',
                'callback' => function () {
                    echo "<h1>Test Plugin of Kashmu</h1>";
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];

        $this->subpages = [
            [
                'parent_slug' => 'kashmu_plugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'kashmu_cpt',
                'callback' => function () {
                    echo "<h1>CPT Manager</h1>";
                }
            ],
            [
                'parent_slug' => 'kashmu_plugin',
                'page_title' => 'Custom Taxonomy',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'kashmu_taxonomies',
                'callback' => function () {
                    echo "<h1>Taxonomies Manager</h1>";
                }
            ],
            [
                'parent_slug' => 'kashmu_plugin',
                'page_title' => 'Custom Widget',
                'menu_title' => 'CW',
                'capability' => 'manage_options',
                'menu_slug' => 'kashmu_widget',
                'callback' => function () {
                    echo "<h1>Custom Widget Manager</h1>";
                }
            ],
        ];
    }

    public function register()
    {
        $this->settings->addPages($this->pages)->wuthSubPages('Dashboard')->addSubPages($this->subpages)->register();
    }
}
