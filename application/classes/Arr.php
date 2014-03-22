<?php

defined('SYSPATH') or die('No direct script access');

class Arr extends Kohana_Arr {

    /**
     * Подготавливает массив данных в формат для Flot графика. 
     * @return array Возвращает массив подготовленных данных.
     * @param array $data - это массив, который необходимо обработать
     */
    public static function ArrayInFlot($data) {
        // Инициализируем пустые массивы
        $array = $tmpArray = array();
        // Обходим циклом полученный массив данных
        foreach ($data as $datakey => $dataval) {
            // Внутренним циклом обходим второй уровень массива
            foreach ($dataval as $key => $val) {
                // Формируем Flot строку данных
                $tmpArray[$datakey][$key] = "[{$key}, {$val}]";
            }
        }
        // Обходим циклом получившийся массив Flot данных
        foreach ($tmpArray as $key => $val) {
            // Сериализуем данные и помещаем их в новый массив
            $array[$key] = implode(',', $val);
        }
        // Уничтожаем старый массив за ненадобностью
        unset($tmpArray);
        // Возвращаем массив сериализованных данных Flot
        return $array;
    }

    /**
     * Возвращает значение из массива по ключу
     * @param array $array
     * @param string|int $key
     * @param mixed $default
     * @return mixed
     * @throws Kohana_Exception
     */
    public static function get($array, $key, $default = NULL) {
        /*
         *  Если ключ существует помещаем его значение, иначе помещаем значение
         *  по умолчанию
         */
        $result = isset($array[$key]) ? $array[$key] : $default;
        // Если ключ не найден и значение по умолчанию error
        if ($result == 'error')
        // Генерируем исключение
           throw new Kohana_Exception('Ключ :key не найден в массиве', array(
        ':key' => $key,
            ), 'KeyNotFoundInArray');
        // Возвращаем рузельтат
        return $result;
    }

}

?>
