<?php
// 列表頁 (index.php)
$link = mysql_connect('127.0.0.1', 'username', 'password');
mysql_query('SET NAMES utf8');
mysql_select_db('mvc', $link);

$sql = "SELECT * FROM news "
     . "WHERE onlineDateTime <= NOW() "
     . "AND NOW() < offlineDateTime ORDER BY id";
$result = mysql_query($sql, $link);

$newsList = array();
while ($row = mysql_fetch_assoc($result)) {
    $newsList[] = $row;
}

require_once 'View.php';
$view = new View();
$view->newsList = $newsList;
$view->display('index.tpl');

mysql_close($link);
?>