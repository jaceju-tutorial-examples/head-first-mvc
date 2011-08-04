<?php
// 明細頁 (detail.php)

require_once 'News.php';


$id = (int) $_GET['id'];
$newsModel = new News();
$row = $newsModel->find($id);

require_once 'View.php';
$view = new View();
$view->row = $row;
$view->display('detail.tpl');
?>