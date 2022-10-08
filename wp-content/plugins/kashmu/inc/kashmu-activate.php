<?php

/**
 * @package kashmu
 */

 class kashmuActivate {
    public static function activate() {
        flush_rewrite_rules();
    }
 }