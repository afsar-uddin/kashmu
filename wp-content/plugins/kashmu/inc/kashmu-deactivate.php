<?php

/**
 * @package kashmu
 */

class kashmuDeactivate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
