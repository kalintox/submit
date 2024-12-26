<?php
session_start();

$syocd = "";
$suryo = "";
// 商品コード、数量の値を受け取る
if (isset($_GET['syocd'])) {
  $syocd = htmlspecialchars($_GET['syocd']);
}
if (isset($_GET['suryo'])) {
  $suryo = htmlspecialchars($_GET['suryo']);
}

$errMsg = "";
if (isset($_SESSION['errMsg'])) {
  $errMsg = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']}</span>";
}

// 全てのエラーメッセージをクリア
unset($_SESSION['errMsg']);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>FruitsShop 新鮮果物市場</title>
</head>

<body>
  <header>
    <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
  </header>
  <div id="contents">
    <h2>新鮮果物市場</h2>
    <form action="./goodsCheck.php" method="post" name="fshop">
      <p>購入商品
        <select name="syocd">
          <option value="1" <?php if ($syocd == '1') {
                              echo 'selected';
                            } ?>>ばなな</option>
          <option value="2" <?php if ($syocd == '2') {
                              echo 'selected';
                            } ?>>パイン</option>
          <option value="3" <?php if ($syocd == '3') {
                              echo 'selected';
                            } ?>>レモン</option>
          <option value="4" <?php if ($syocd == '4') {
                              echo 'selected';
                            } ?>>いちご</option>
        </select>
        数量
        <input type="text" name="suryo" value="<?php echo $suryo; ?>"><?php echo $errMsg; ?>
        <input type="submit" name="btn" value="購入">
        <?php
        if (isset($_SESSION['list'])) {
          echo "<input type='button' value='カートの中身を見る' onclick='window.location.href=\"./list.php\";'>";
        }
        ?>
      </p>
    </form>

    <figure>
      <figcaption>ばなな</figcaption>
      <img src="images/banana.jpg" alt="ばななの写真">
      <ul>
        <li>品番：1</li>
        <li>商品：ばなな</li>
        <li>金額：300円</li>
      </ul>
    </figure>
    <figure>
      <figcaption>パイン</figcaption>
      <img src="images/pain.jpg" alt="パインの写真">
      <ul>
        <li>品番：2</li>
        <li>商品：パイン</li>
        <li>金額：600円</li>
      </ul>
    </figure>
    <figure>
      <figcaption>レモン</figcaption>
      <img src="images/lemon.jpg" alt="レモンの写真">
      <ul>
        <li>品番：3</li>
        <li>商品：レモン</li>
        <li>金額：160円</li>
      </ul>
    </figure>
    <figure>
      <figcaption>いちご</figcaption>
      <img src="images/strawberry.png" alt="いちごの写真">
      <ul>
        <li>品番：4</li>
        <li>商品：いちご</li>
        <li>金額：1500円</li>
      </ul>
    </figure>

  </div>

</body>

</html>