<?php

defined('SYSPATH') or die('No direct script access');

return array(
    'systemcheck' => array(
        'aclass' => '',
        'href' => URL::base() . 'install/systemcheck',
        'liclass' => '',
        'progress' => '',
        'step' => 1,
        'text' => 'Проверка системы'
    ),
    'database' => array(
        'aclass' => '',
        'href' => URL::base() . 'install/database',
        'liclass' => '',
        'progress' => '',
        'step' => 2,
        'text' => 'Настройки базы данных'
    ),
    'admin' => array(
        'href' => URL::base() . 'install/admin',
        'aclass' => '',
        'liclass' => '',
        'progress' => '',
        'step' => 3,
        'text' => 'Учетная запись',
    ),
    'project' => array(
        'aclass' => '',
        'href' => URL::base() . 'install/project',
        'liclass' => '',
        'progress' => '',
        'step' => 4,
        'text' => 'Настройки проекта'
    )
);
?>
