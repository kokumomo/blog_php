<?php

$dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
$user = 'root';
$pass = 'root';

try {
    $dbh = new PDO($dsn,$user,$pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // ①SQLの準備
    $sql = 'SELECT * FROM blog';
    // ②SQLの実行(queryでSQLステートメントを実行し、結果セットをPDOStatementオブジェクトとして返す)
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    $dbh = null;
} catch(PDOException $e) {
    echo '接続失敗'. $e->getMessage();
    exit();
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <table>
        <tr>
            <th>No</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach($result as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo $column['category'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>