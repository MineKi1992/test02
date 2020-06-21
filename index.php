<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>レシピ一覧</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <h1 style="text-align:center">レシピ一覧</h1>
        <img src="main.jpg" class="img-fluid" alt="レスポンス画像"><br>
        <a href="add.php" style="text-align:left">レシピの新規登録</a>
    </body>
<?php
try {
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM recipes";
$stmt = $dbh->query($sql);
$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
echo "<table>\n";
echo "<tr>\n";
echo "<th>料理名</th><th>予算</th><th>難易度</th>\n";
echo "</tr>\n";
foreach ($result as $row) {
    echo "<tr>\n";
    echo "<td>" . htmlspecialchars($row['recipe_name'],ENT_QUOTES,'UTF-8') . "</td>\n";
    echo "<td>" . htmlspecialchars($row['budget'],ENT_QUOTES,'UTF-8') . "</td>\n";
    echo "<td>" . htmlspecialchars($row['difficulty'],ENT_QUOTES,'UTF-8') . "</td>\n";
    echo "<td>\n";
    echo "<a href=detail.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">詳細</a>\n";
    echo "|<a href=edit.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">変更</a>\n";
    echo "|<a href=delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">削除</a>\n";
    echo "</td>\n";
    echo "</tr>\n";
    
}

$dbh = null;
} catch (Exeption $e) {
echo "エラー発生: " . htmlspecialchars($e->getMessage(),
ENT_QUOTES, 'UTF-8') . "<br>";
die();
}
?>
    </body>
</html>