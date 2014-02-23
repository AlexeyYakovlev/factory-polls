<?php

defined('SYSPATH') OR die('No direct script access.');

class System {

    // Определяет установлена ли система
    private static $_installed = false;
    // Определяет была ли инициализация или нет (singletone)
    private static $_init = false;

    public static function ready() {
        self::CookieInit();
        if (self::$_init)
            return;
        self::$_installed = file_exists(APPPATH . 'config/database.php');
        if (!self::$_installed) {
            Session::$default = 'cookie';
            Route::set('install', '(install(/<action>))', array(
                        'action' => 'index|systemchek|database|install'
                    ))
                    ->defaults(array(
                        'controller' => 'main',
                        'directory' => 'install'
                    ));
            return;
        }
        self::$_init = true;
    }

    /**
     * Инициализация куки (соль и время жизни)
     */
    private static function CookieInit() {
        if (empty(Cookie::$salt)) {
            Cookie::$salt = Kohana::$config->load('cookie.salt');
            Cookie::$expiration = Kohana::$config->load('cookie.lifetime');
        }
    }

}

?>
