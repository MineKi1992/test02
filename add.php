

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
    レシピの投稿<br>
    <form action="insert.php" method="post">
        料理名：<input type="text" name="recipe_name" value="<?php 
        echo htmlspecialchars($result['recipe_name'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        カテゴリ：
        <select name="category">
            <option value="">選択してください</option>
            <option value="1"<?php if($result['category'] ===1)
            echo "selected" ?>>和食</option>
            <option value="2"<?php if($result['category'] ===2)
            echo "selected" ?>>中華</option>
            <option value="3"<?php if($result['category'] ===3)
            echo "selected" ?>>洋食</option>
        </select>
        難易度：
        <input type="radio" name="difficulty" value="1" <?php if($result['difficulty'] ===1)
        echo "checked" ?>>簡単
        <input type="radio" name="difficulty" value="2" <?php if($result['difficulty'] ===2)
        echo "checked" ?>>普通
        <input type="radio" name="difficulty" value="3" <?php if($result['difficulty'] ===3)
        echo "checked" ?>>難しい
        <br>
        予算：<input type="number" name="budget" value="<?php
        echo htmlspecialchars($result['budget'], ENT_QUOTES, 'UTF-8'); ?>">円
        <br>
        作り方：
        <textarea name="howto" cols="0" rows="4" maxlength="150">
            <?php echo htmlspecialchars($result['howto'], ENT_QUOTES, 'UTF-8');?>
        </textarea>
        <br>
        <input type="hidden" name="id" value="<?php
        echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8');?>">
        <input type="submit" value="送信">
    </form>
    <br>
    <a href=index.php>トップに戻る</a>
    </body>
</html>