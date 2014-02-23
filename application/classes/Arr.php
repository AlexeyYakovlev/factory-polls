<?php

defined('SYSPATH') or die('No direct script access');

class Arr extends Kohana_Arr {

    /**
     * Метод подготавливает массив данных в формат для Flot графика. 
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

}

?>
