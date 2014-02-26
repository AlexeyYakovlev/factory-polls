<?php

defined('SYSPATH') or die('No direct script access');

abstract class Controller_Assets extends Controller_Template {

    private $_media;
    private $_css;
    private $_systemTheme;
    private $_plugins;
    private $_fontAwesome;
    private $_bootstrap;
    private $_uniform;
    private $_select2;
    private $_img;

    private function setMedia() {
        $this->_media = File::ChekDir(URL::base() . APPDIR . 'media' . DS);
        return $this;
    }

    private function setCss() {
        $this->_css = File::ChekDir($this->_media . 'css' . DS);
        return $this;
    }

    private function setSystemTheme() {
        $this->_systemTheme = File::ChekDir($this->_css . 'themes' . DS);
        return $this;
    }

    private function setPlugins() {
        $this->_plugins = File::ChekDir($this->_media . 'plugins' . DS);
        return $this;
    }

    private function setFontAwesome() {
        $this->_fontAwesome = File::ChekDir($this->_plugins
                        . 'font-awesome' . DS . 'css' . DS);
        return $this;
    }

    private function setBootstrap() {
        $this->_bootstrap = File::ChekDir($this->_plugins
                        . 'bootstrap' . DS . 'css' . DS);
        return $this;
    }

    private function setUniform() {
        $this->_uniform = File::ChekDir($this->_plugins
                        . 'uniform' . DS . 'css' . DS);
        return $this;
    }

    private function setSelect2() {
        $this->_select2 = File::ChekDir($this->_plugins . 'select2' . DS);
        return $this;
    }

    private function setImg() {
        $this->_img = File::ChekDir($this->_media . 'img' . DS);
        return $this;
    }

    public function before() {
        parent::before();
        $this->
                setMedia()
                ->setCss()
                ->setSystemTheme()
                ->setPlugins()
                ->setFontAwesome()
                ->setBootstrap()
                ->setUniform()
                ->setSelect2()
                ->setImg();
    }

    public function getAssets() {
        return array(
            'media' => $this->_media,
            'css' => $this->_css,
            'system_theme' => $this->_systemTheme,
            'plugins' => $this->_plugins,
            'font_awesome' => $this->_fontAwesome,
            'bootstrap' => $this->_bootstrap,
            'uniform' => $this->_uniform,
            'select2' => $this->_select2,
            'img' => $this->_img
        );
    }

}

?>
