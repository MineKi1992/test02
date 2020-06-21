<?php
try {
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost:8889;dbname=db1;charset=utf8', $user, $pass);
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
    echo "</tr>\n";
}
echo "</table>\n";
print_r($result);
$dbh = null;
} catch (Exeption $e) {
echo "エラー発生: " . htmlspecialchars($e->getMessage(),
ENT_QUOTES, 'UTF-8') . "<br>";
die();
}
?>