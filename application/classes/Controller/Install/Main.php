<?php

defined('SYSPATH') or die('No direct script access');

class Controller_Install_Main extends Controller_Install_Common {

    /**
     * Данный метод выполняется раньше прочих
     * @uses Assets::get() список директорий подключаемых медиафайлов
     */
    public function before() {
        parent::before();
    }

    public function action_systemcheck() {
        System::ClearStateCach();
        $content = View::factory('install/system');
        $this->template->content = $content;
    }

    public function action_database() {
        if (!$this->request->isPost())
            $this->redirect();
        $content = View::factory('install/database');
        $this->template->content = $content;
    }

    public function action_admin() {
        System::ClearStateCach();
        $content = View::factory('install/admin');
        $this->template->content = $content;
    }

    public function action_project() {
        if (!$this->request->isPost())
            $this->redirect();
        $post = $this->request->post();
        $username = Arr::get($post, 'username', 'error');
        $password = Arr::get($post, 'password', 'error');
        Cookie::set('username', $username);
        Cookie::set('password', $password);
        $content = View::factory('install/project');
        $this->template->content = $content;
    }

    public function action_install() {
        $config = new View('install/config');
        $config->type = function_exists('mysqli_query') ? 'mysqli' : 'mysql';
        $config->user = $username;
        $config->password = $password;
        $config->host = $hostname;
        $config->dbname = $database;
        $config->prefix = $table_prefix;
        $config->port = '';
        return file_put_contents(
                        APPPATH . 'config/database.php', $config
                ) !== false;
    }

}

?>
