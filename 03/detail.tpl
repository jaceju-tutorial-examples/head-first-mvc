<!DOCTYPE html>
<html>
<head><meta charset="UTF-8" /><title>News</title></head>
<body>
<?php

?>
<div class="post">
<?php if ($this->row): ?>
<h1><?php echo htmlspecialchars($this->row['title']); ?></h1>
<div><?php echo nl2br(htmlspecialchars($this->row['content'])); ?></div>
<?php endif; ?>
</div>
</body>
</html>