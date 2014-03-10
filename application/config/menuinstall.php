<?php

defined('SYSPATH') or die('No direct script access');

return array(
    'index' => array(
        'href' => URL::base() . 'install/index',
        'aclass' => '',
        'liclass' => '',
        'progress' => '',
        'step' => 1,
        'text' => 'Учетная запись',
    ),
    'systemcheck' => array(
        'aclass' => '',
        'href' => URL::base() . 'install/systemcheck',
        'liclass' => '',
        'progress' => '',
        'step' => 2,
        'text' => 'Проверка системы'
    ),
    'database' => array(
        'aclass' => '',
        'href' => URL::base() . 'install/database',
        'liclass' => '',
        'progress' => '',
        'step' => 3,
        'text' => 'Настройки базы данных'
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
