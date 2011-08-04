<?php
// 列表頁 (index.php)
$link = mysql_connect('127.0.0.1', 'username', 'password');
mysql_query('SET NAMES utf8');
mysql_select_db('mvc', $link);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8" /><title>News</title></head>
<body>
<?php
$sql = "SELECT * FROM news "
     . "WHERE onlineDateTime <= NOW() "
     . "AND NOW() < offlineDateTime ORDER BY id";
$result = mysql_query($sql, $link);
?>
<ul class="posts">
<?php while ($row = mysql_fetch_assoc($result)): ?>
<li><a href="detail.php?id=<?php echo intval($row['id']); ?>">
<?php echo htmlspecialchars($row['title']); ?>
</a></li>
<?php endwhile; ?>
</ul>
</body>
</html>
<?php
mysql_close($link);
?>