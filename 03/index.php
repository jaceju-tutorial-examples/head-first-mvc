<?php
// 列表頁 (index.php)

require_once 'News.php';

$newsModel = new News();
$newsList = $newsModel->findAll();

require_once 'View.php';
$view = new View();
$view->newsList = $newsList;
$view->display('index.tpl');
?>