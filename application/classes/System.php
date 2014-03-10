<?php

defined('SYSPATH') OR die('No direct script access.');

/**
 * Ядро системы
 */
class System {

    // Определяет установлена ли система
    private static $_installed = false;
    // Определяет была ли произведена инициализация системы или нет
    private static $_init = false;

    /**
     * Инициализация системы
     * @return void
     */
    public static function ready() {
        // Инициализация куки
        self::CookieInit();
        /**
         * Если система уже проинициализирована нет надобности делать это ещё
         * раз 
         */
        if (self::$_init)
            return;
        /**
         * Проверяем установлена ли система. Осуществляется путем проверки на 
         * существовании файла database.php который создается во время установки
         */
        self::$_installed = file_exists(APPPATH . 'config/database.php');
        // Если система не установлена
        if (!self::$_installed) {
            // Сессию будем харнить в куки
            Session::$default = 'cookie';
            // Устанавливаем роут инсталятора
            Route::set('install', '(install(/<action>))', array(
                        'action' => 'index|systemcheck|database|project|install'
                    ))
                    ->defaults(array(
                        'controller' => 'main',
                        'directory' => 'install'
                    ));
            return;
        }
        // Система проинициализирована
        self::$_init = true;
    }

    /**
     * Инициализация куки (соль и время жизни)
     */
    private static function CookieInit() {
        // Если соль куки не установлена, устанавливаем ее из конфигурации
        if (empty(Cookie::$salt)) {
            // Соль
            Cookie::$salt = Kohana::$config->load('cookie.salt');
            // Время жизни
            Cookie::$expiration = Kohana::$config->load('cookie.lifetime');
        }
    }

    /**
     * Получение глобального конфига
     * @param string $key значение необходимо, если из конфига требуется 
     * получить конкретное значение, в противно случае метод вернет массив 
     * данных всего конфига.
     * @return string | array
     * @throws Exception
     */
    public static function GetGlobalConfig($key = false) {
        // Загружаем конфиг
        $config = Kohana::$config->load('global');
        // Если требуется получить конкретное значение конфига
        if ($key !== false) {
            // Проверка существует ли ключ по которому ведется запрос значения
            if (array_key_exists($key, $config))
            // Возвращаем значение
                return $config[$key];
            else
            //Генерируем исключение
                throw new Exception("Невозможно получить {$val} из конфига global");
        } else
        // Возвращаем весь кофиг в виде массива
            return $config;
    }

}

?>
