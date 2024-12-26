<?php
session_start();

// リストのセッションをクリア
unset($_SESSION['list']);
unset($_SESSION['customer']);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>FruitsShop 新鮮果物市場 お買い上げ</title>
</head>

<body>
  <header>
    <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
  </header>
  <div id="contents">
    <h2>ショッピングカート(4/4)</h2>
    <p>お買い上げありがとうございます。</p>
    <p><a href="index.php">はじめの画面に戻る</a></p>
  </div>

</body>

</html>