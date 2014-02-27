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
        View::set_global('title', 'Установка');
        $this->template->content = '';
        $this->template->styles = '';
        $this->template->scripts = '';
    }

}

?>
