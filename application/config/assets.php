<?php

defined('SYSPATH') or die('No direct script access');

return array(
    'application' => array(
        'media' => array(
            'css' => array(
                'themes_css' => 'themes',
            ),
            'plugins' => array(
                'font-awesome' => array(
                    'font-awesome_css' => 'css'
                ),
                'bootstrap' => array(
                    'bootstrap_css' => 'css',
                    'bootstrap_js' => 'js',
                ),
                'uniform' => array(
                    'uniform_css' => 'css'
                ),
                'select2' => 'select2',
                'bootstrap-hover-dropdown' => 'bootstrap-hover-dropdown',
                'jquery-slimscroll' => 'jquery-slimscroll',
                'jquery-validation' => array(
                    'jquery-validation_dist' => 'dist'
                ),
                'bootstrap-wizard' => 'bootstrap-wizard'
            ),
            'scripts' => 'scripts',
            'img' => 'img'
        )
    )
);
?>
