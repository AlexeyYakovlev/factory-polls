<?php

defined('SYSPATH') or die('No direct script access');

/**
 * Абстрактный класс для инициализиции каталогов содержащих медиа данные.
 */
abstract class Controller_Assets extends Controller_Template {

    // Корневой массив каталогов для медиа данных
    private $_assets;

    public function before() {
        parent::before();
        $this->setAssets(Kohana::$config->load('assets'), APPDIR);
    }

    public function setAssets($config, $directory = '', $level = '') {
        foreach ($config as $dir => $val) {
            $this->_assets[$dir] = '';
            if (is_array($val)) {
                $level .= '.' . $dir;
                $directory .= $dir . DS;
                $this->_assets[$dir] .= $directory;
                $this->setAssets(
                        Kohana::$config->load(
                                'assets' . $level
                        ), $directory, $level
                );
                $this->LevelUp($level, '.');
                $this->LevelUp($directory, DS);
            } else {
                $this->_assets[$dir] = $directory . $val . DS;
            }
        }
    }

    private function LevelUp(&$level, $separator) {
        $levelUp = explode($separator, $level);
        if ($separator == DS)
            array_pop($levelUp);
        array_pop($levelUp);
        $level = implode($separator, $levelUp);
        if ($separator == DS)
            $level .= DS;
        unset($levelUp);
    }

    public function getAssets() {
        foreach ($this->_assets as $asset)
            File::ChekDir($asset, DOCROOT);
        return $this->_assets;
    }

}

?>
