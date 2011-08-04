<?php
class View {
    private $_vars = array();

    public function __set($name, $val) {
        $this->_vars[$name] = $val;
    }

    public function __get($name) {
        return isset($this->_vars[$name])
             ? $this->_vars[$name]
             : null;
    }

    public function display($tpl) {
        include $tpl;
    }
}
