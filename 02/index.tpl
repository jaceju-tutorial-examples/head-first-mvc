<!DOCTYPE html>
<html>
<head><meta charset="UTF-8" /><title>News</title></head>
<body>
<ul class="posts">
<?php foreach ($this->newsList as $row): ?>
<li><a href="detail.php?id=<?php echo intval($row['id']); ?>">
<?php echo htmlspecialchars($row['title']); ?>
</a></li>
<?php endforeach; ?>
</ul>
</body>