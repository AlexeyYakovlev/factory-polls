<?php

defined('SYSPATH') or die('No direct script access');

class Controller_Install_Main extends Controller_Template {

    // Шаблон по умолчанию
    public $template = 'install/main';

    /**
     * Данный метод выполняется раньше прочих
     * @uses Assets::get() список директорий подключаемых медиафайлов
     */
    public function before() {
        parent::before();
        // Получаем список директорий подключаемых медиафайлов из config/assets
        $this->template->assets = Assets::get();
    }

    public function action_index() {
        
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
