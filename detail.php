<?php

// ①require_onceを使ってみよう！
require_once('dbc.php');

$result = Blog\Dbc\getBlog($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?php echo $result['title']; ?></h3>
    <h3>投稿日時<?php echo $result['post_at']; ?></h3>
    <h3>カテゴリ：<?php echo Blog\Dbc\setCategoryName($result['category']); ?></h3>
    <hr>
    <p>本文：<?php echo $result['content']; ?></p>
</body>
</html>