<?php

/**
 * Статический класс для работы с файлами
 * @version 1.1
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
    public static $filedir = UPLOADDIR;

    /**
     * Метод загружает файл на сервер
     * @param array $file - это массив служебных данных загружаемого файла $_FILE
     */
    public static function Upload($file) {
        if (is_array($file)) {
            $tmp_name = $file['tmp_name']; // файл во временной папке
            /*
             * Постобработка имени файла на случай если файл с таким именем уже 
             * существует на сервере. Для постобработки используется 
             * File::GetFileName(). На случай, если имя файла содержит символы
             * русского языка применяется метод траслитерации Text::Translit()
             */
            self::$filename = self::GetFileName(
                            Text::Translit($file['name'])
            );
            // Получаем путь для загрузки файла
            self::$filedir = self::GetDir();

            /* Если удалось скопировать файл из временной папки в папку для 
             * загрузки
             */
            if (move_uploaded_file(
                            $tmp_name, self::$filedir . DS . self::$filename)
            ) {
                return true; // Возращаем истину. Файл загружен.
            } else // В противном случае
            // Генерируем ошибку
                throw new Exception("
                    Ошибка! Файл не загружен. 
                    Вероятно проблема в правах на папку :dir?
                    ", array(":dir" => self::$filedir));
        } else // В противном случае
        // Генерируем ошибку
            throw new Exception('Ошибка! Файл на сервер не был передан.');
    }

    /**
     * Метод возвращает имя загруженного файла с постфиксом
     * @param string $name - это имя загруженного файла
     * @param integer $postfix - это счетчик одноименных файлов
     */
    public static function GetNewFileName($name, $postfix) {
        // Возвращаем новое имя
        return pathinfo($name, PATHINFO_FILENAME)
                . "({$postfix})"
                . pathinfo($name, PATHINFO_EXTENSION);
    }

    /**
     * Метод возвращает имя загруженного файла.
     * Для определения пути к загружаемому файлу используется метод 
     * File::GetDir()
     * @param string $name - это имя загруженного файла
     */
    public static function GetFileName($name) {
        // Если файл с таким именем уже существует на сервере...
        if (file_exists(self::GetDir() . DS . $name)) {
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
            } while (file_exists(self::GetDir() . DS . $newName));
            return $newName; // Возвращаем сформированное имя
        } else // В противном случае
            return $name; // Возвращаем оригинальное имя
    }

    /**
     * Метод возвращает имя папки для загрузки файла
     */
    public static function GetDir() {
        // В качестве имени каталога используем текущую дату
        $dirName = self::$filedir . Text::DateToDir();
        /**
         * Создаем каталог с правами на запись если его ещё не существует на 
         * сервере.
         */
        if (!self::mkdir($dirName))
            throw new Kohana_Exception('Директория :dir недоступна для записи',
                    array(':dir' => Debug::path($dirName)));
        // Возвращаем имя папки
        return $dirName;
    }

    /**
     * Метод проверяет существование каталога, и доступность его на чтение. Если
     * каталога не существует или он не доступен для чтения, в лог пишется 
     * соответствующая ошибка.
     * @param string $dir каталог
     * @param string $path абсолютный путь к приложению на сервере
     */
    public static function ChekDir($dir, $path = '') {
        // Если каталог не существует или не доступен для чтения
        if (!is_readable($path . $dir))
        // Записываем в лог ошибку
            Kohana::$log->add(Log::ERROR, "Директория :dir недоступна для чтения", array(':dir' => $dir));
        return;
    }

    /**
     * Метод проверяет является ли разширение файла типом $ext
     * @param string $filename - это имя файла
     * @param string $ext - это расширение с которым сравнивается расширение 
     * файла
     * @throws Exception - возвращаемое исключение, на случай, если в результате
     * проверки имя файла не содержит требуемый тип.
     */
    public static function CheckExtension($filename, $ext) {
        if (strtolower(
                        pathinfo($filename, PATHINFO_EXTENSION)
                ) != strtolower($ext)) {
            throw new Exception("
                Неверный тип файла. Необходимо, загружать файлы только :ext 
                формата!", array(":ext" => $ext));
        }
    }

    /**
     * @copyright (c) 2013, Sergey Yakovlev (klay)
     * Attempts to create the directory specified by `$path`
     *
     * To create the nested structure, the `$recursive` parameter
     * to mkdir() must be specified.
     *
     * @param   string  $path       The directory path
     * @param   integer $mode       Set permission mode (as in chmod) [Optional]
     * @param   boolean $recursive  Create directories recursively if necessary [Optional]
     * @return  boolean             Returns TRUE on success or FALSE on failure
     *
     * @link    http://php.net/manual/en/function.mkdir.php mkdir()
     */
    public static function mkdir($path, $mode = 0777, $recursive = TRUE) {
        $out = FALSE;
        $oldumask = umask(0);
        if (!is_dir($path)) {
            $out = @mkdir($path, $mode, $recursive);
        }
        umask($oldumask);

        return $out;
    }

}

?>
