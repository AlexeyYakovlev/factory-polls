<?php

defined('SYSPATH') or die('No direct script access');

class Controller_Admin_Main extends Controller_Admin_Common {

    public function action_index() {
        $content = View::factory('/admin/index');
        $this->template->content = $content;
    }

}

?>
