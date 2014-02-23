<?php

/**
 * Статический класс для работы с файлами
 * @version 1.0
 * @author Yakovlev
 */
class File extends Kohana_File {
    /*
     * В этой переменной будет храниться имя файла.
     * На случай, если имя загружаемого файла совпадает с имнем файла уже
     * находящегося на сервере, то к имени нового файла будет добавлен
     * постфикс методом File::CreateNewFileName()
     */

    public static $filename;
    /* Путь к папке содержащей файл */
    public static $filedir;

    /**
     * Метод загружает файл на сервер
     * @param array $file - это массив служебных данных загружаемого файла $_FILE
     */
    public static function Upload($file) {
        if (is_array($file)) {
            $tmp_name = $file['excel']['tmp_name']; // файл во временной папке
            /*
             * Постобработка имени файла на случай если файл с таким именем уже 
             * существует на сервере. Для постобработки используется 
             * File::GetFileName(). На случай, если имя файла содержит символы
             * русского языка применяется метод траслитерации String::Translit()
             */
            self::$filename = self::GetFileName(
                            String::Translit($file['excel']['name'])
            );
            self::$filedir = self::GetDir(); // Получаем путь для загрузки файла
            /* Если удалось скопировать файл из временной папки в папку для 
             * загрузки
             */
            if (move_uploaded_file(
                            $tmp_name, self::$filedir . "/" . self::$filename)
            ) {
                return true; // Возращаем истину. Файл загружен.
            } else // В противном случае
            // Генерируем ошибку
                throw new Exception('
                    Ошибка! Файл не загружен. 
                    Вероятно проблема в правах на папку uploads?
                    ');
        } else // В противном случае
        // Генерируем ошибку
            throw new Exception('Ошибка! Файл на сервер не был передан.');
    }

    /**
     * Метод возвращает имя загруженного файла с постфиксом
     * @param string $name - это имя загруженного файла
     * @param integer $postfix - это постфикс
     */
    public static function GetNewFileName($name, $postfix) {
        /* Собираем массив из имени, разделитель точка. 
         * Этот массив нам нужн для того, чтобы отделить имя от расширения файла
         */
        $nameStruct = explode(".", $name);
        /* Исключаем последний элемент из массива и присваиваем его переменной
         * Это и есть расширение загруженного файла.
         */
        $ext = array_pop($nameStruct);
        /* То, что осталось от массива собираем обратно в строку с тем-же 
         * разделителем. Теперь у нас получится то же имя, но без расширения
         */
        $name = implode(".", $nameStruct);
        // Уничтожаем массив, он нам больше не нужен
        unset($nameStruct);
        return "{$name}({$postfix}).{$ext}"; // Возвращаем новое имя
    }

    /**
     * Метод возвращает имя загруженного файла.
     * Для определения пути к загружаемому файлу используется метод 
     * File::GetDir()
     * @param string $name - это имя загруженного файла
     */
    public static function GetFileName($name) {
        // Если файл с таким именем уже существует на сервере...
        if (file_exists(self::GetDir() . "/" . $name)) {
            /* Инициализируем итератор, он играет роль постфикса для конечного 
             * имени
             */
            $i = 0;
            /* Запускаем цикл, который выполняется до тех пор, пока имя файла 
             * не станет уникальным.
             */
            do {
                $i++; // Увеличиваем итератор
                /* Формируем новое имя типа name(1), name(2) ... name(999).
                 * Формирование происходит в методе File::CreateNewFileName()
                 */
                $newName = self::CreateNewFileName($name, $i);
                // Условие цикла
            } while (file_exists(self::GetDir() . "/" . $newName));
            return $newName; // Возвращаем сформированное имя
        } else // В противном случае
            return $name; // Возвращаем оригинальное имя
    }

    /**
     * Метод возвращает имя папки для загрузки файла
     */
    public static function GetDir() {
        // В качестве имени каталога используем текущую дату
        $dirName = "uploads/" . date("Y-m-d");
        // Если папки ещё не существует на сервере
        if (!file_exists($dirName))
        // Создаем ее с правами на запись
            mkdir($dirName, 0777);
        // Возвращаем имя папки
        return $dirName;
    }

    /**
     * Метод проверяет является ли разширение файла типом $ext
     * @param string $filename
     * @param string $ext
     * @throws Exception
     */
    public static function CheckExtension($filename, $ext) {
        $filenameArr = explode(".", $filename);
        $extenstion = array_pop($filenameArr);
        if ($extenstion != $ext) {
            throw new Exception('Неверный тип файла. Необходимо, загружать файлы только XLSX формата!');
        }
    }

}

?>
