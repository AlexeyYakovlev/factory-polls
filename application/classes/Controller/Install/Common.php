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
        $menu = View::factory('install/menu')
                ->set('menuitems', $this->getMenuItems());
        $this->template->menu = $menu;
        $this->template->content = '';
    }

    private function getMenuItems() {
        $steps = array(
            'index' => 1,
            'systemcheck' => 2,
            'database' => 3,
            'install' => 4
        );
        $menuitems = Kohana::$config->load('menuinstall');
        $tmpArr = $menuitems;
        $action = $this->request->current()->action();
        $step = $steps[$action];
        foreach ($tmpArr as $index => $item) {
            if (($action != $index) && ($steps[$index] > $step))
                $menuitems[$index]['class'] = 'disabled-link';
            elseif($steps[$index] == $step)
                $menuitems[$index]['class'] = 'active';
        }
        return $menuitems;
    }

}

?>
