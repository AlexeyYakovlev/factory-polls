<?php

defined('SYSPATH') or die('No direct script access');

return array(
    'index' => array(
        'href' => URL::base() . 'install/index',
        'class' => '',
        'text' => 'Учетная запись'
    ),
    'systemcheck' => array(
        'href' => URL::base() . 'install/systemcheck',
        'class' => '',
        'text' => 'Проверка системы'
    ),
    'database' => array(
        'href' => URL::base() . 'install/database',
        'class' => '',
        'text' => 'Настройки базы данных'
    ),
    'install' => array(
        'href' => URL::base() . 'install/project',
        'class' => '',
        'text' => 'Настройки проекта'
    )
);
?>
