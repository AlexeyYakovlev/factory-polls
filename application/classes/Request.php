<?php

defined('SYSPATH') OR die('No direct script access.');

/**
 * Расширяет Request из Kohana
 */
class Request extends Kohana_Request {

    /**
     * Проверяем тип запроса на POST
     * @return boolean  - в случае если тип запроса POST вернет true
     */
    public function isPost() {
        if ($this->method() == HTTP_Request::POST)
            return true;
        return false;
    }

}
