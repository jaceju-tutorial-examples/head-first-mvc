<?php
// 明細頁 (detail.php)
$link = mysql_connect('127.0.0.1', 'username', 'password');
mysql_query('SET NAMES utf8');
mysql_select_db('mvc', $link);

$id = (int) $_GET['id'];
$sql = "SELECT * FROM news "
     . "WHERE onlineDateTime <= NOW() "
     . "AND NOW() < offlineDateTime AND id = $id";
$result = mysql_query($sql, $link);

$row = mysql_fetch_assoc($result);

require_once 'View.php';
$view = new View();
$view->row = $row;
$view->display('detail.tpl');

mysql_close($link);
?>