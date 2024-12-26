<?php
session_start();

// リストのセッションをクリア
unset($_SESSION['list']);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>FruitsShop 新鮮果物市場 取り消し</title>
</head>

<body>
  <header>
    <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
  </header>
  <div id="contents">
    <h2>カートは空になりました。</h2>
    <p><a href="index.php">はじめの画面に戻る</a></p>
  </div>

</body>

</html>