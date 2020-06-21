<?php
$user = "root";
$pass = "root";
try{
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost; dbname=db1; charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM recipes WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();  //sql実行
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($result);
    //if($result['category'] ===1) {echo "<img src="jibie.png">"};
    //if($result['category'] ===2) {echo "<img src="kebabu.png">"};
    //if($result['category'] ===3) {echo "<img src="toruco.png">"};
    echo "料理名：" . htmlspecialchars($result['recipe_name'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "カテゴリ：" . htmlspecialchars($result['category'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "予算：" . htmlspecialchars($result['budget'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "難易度：" . htmlspecialchars($result['difficulty'], ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo "作り方：<br>" . nl2br(htmlspecialchars($result['howto'], ENT_QUOTES, 'UTF-8')) . "<br>\n";
    $dbh = null;
    echo "<a href=index.php>トップに戻る</a>\n";
} catch (Exception $e) {
    echo "エラー発生:" . htmlspecialchars($e->getMessage(),
    ENT_QUOTES, 'UTF-8') . "<br>";
    die; 
}
?>