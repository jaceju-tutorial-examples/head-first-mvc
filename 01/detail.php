<?php
// 明細頁 (detail.php)
$link = mysql_connect('127.0.0.1', 'username', 'password');echo mysql_error();
mysql_query('SET NAMES utf8');
mysql_select_db('mvc', $link);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8" /><title>News</title></head>
<body>
<?php
$id = (int) $_GET['id'];
$sql = "SELECT * FROM news "
     . "WHERE onlineDateTime <= NOW() "
     . "AND NOW() < offlineDateTime AND id = $id";
$result = mysql_query($sql, $link);
?>
<div class="post">
<?php if ($row = mysql_fetch_assoc($result)): ?>
<h1><?php echo htmlspecialchars($row['title']); ?></h1>
<div><?php echo nl2br(htmlspecialchars($row['content'])); ?></div>
<?php endif; ?>
</div>
</body>
</html>
<?php
mysql_close($link);
?>