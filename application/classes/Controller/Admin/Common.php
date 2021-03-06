<?php

defined('SYSPATH') or die('No direct script access');

/**
 * Базовый контроллер для панели управления
 */
abstract class Controller_Admin_Common extends Controller_Template {

    public $template = '/admin/main';

    public function before() {
        parent::before();
        View::set_global('title', 'Панель управления');
        $this->template->content = '';
        $this->template->styles = '';
        $this->template->scripts = '';
    }

}

?>
