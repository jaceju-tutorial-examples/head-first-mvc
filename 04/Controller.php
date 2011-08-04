<?php

class Controller {

    private $_action = 'index';

    private $_newsModel = null;

    private $_view = null;

    public function __construct() {
        if (isset($_GET['action'])) {
            $action = strtolower($_GET['action']);
            if (method_exists($this, $action)) {
                $this->_action = $action;
            }
        }
        $this->_init();
        call_user_func(array($this, $this->_action));
    }

    protected function _init() {
        require_once 'News.php';
        $this->_newsModel = new News();

        require_once 'View.php';
        $this->_view = new View();
    }

    public function index() {
        $this->_view->newsList = $this->_newsModel->findAll();
        $this->_view->display('index.tpl');
    }

    public function detail() {
        $id = (int) $_GET['id'];
        $this->_view->row = $this->_newsModel->find($id);
        $this->_view->display('detail.tpl');
    }
}

