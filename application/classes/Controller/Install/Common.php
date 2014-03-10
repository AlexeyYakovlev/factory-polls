<?php

defined('SYSPATH') or die('No direct script access');

/**
 * Базовый контроллер для панели управления
 */
abstract class Controller_Install_Common extends Controller_Template {

    public $template = 'install/main';

    public function before() {
        parent::before();
        // Получаем список директорий подключаемых медиафайлов из config/assets
        $this->template->assets = Assets::get();
        View::set_global('g_title', System::GetGlobalConfig('title'));
        View::set_global('g_menuitems', $this->getMenuItems());
        View::set_global('g_stepdesc', View::factory('install/stepdesc'));
        View::set_global('g_steps', View::factory('install/steps'));
        $this->template->menu = View::factory('install/menu');
        $this->template->content = '';
    }

    private function getMenuItems() {
        $menuitems = Kohana::$config->load('menuinstall');
        $tmpArr = $menuitems;
        $action = $this->request->current()->action();
        $step = $tmpArr[$action]['step'];
        foreach ($tmpArr as $index => $item) {
            $menuitems[$index]['progress'] = round(
                    (100 / count($menuitems)) * $menuitems[$index]['step']
            );
            if (($action != $index) && ($item['step'] > $step)) {
                $menuitems[$index]['liclass'] = 'disabled-link';
                $menuitems[$index]['aclass'] = 'disabled';
            } elseif ($item['step'] == $step)
                $menuitems[$index]['liclass'] = 'active';
        }
        return $menuitems;
    }

}

?>
