<?php

defined('SYSPATH') or die('No direct script access');

class Controller_Install_Main extends Controller_Install_Common {

    public function action_index() {
        $content = View::factory('/install/index');
        $this->template->content = $content;
    }

}

?>
