<?php
session_start();
$namaeErr = "";
$emailErr = "";
$telErr = "";
$zipErr = "";
$addrErr = "";

if (isset($_SESSION['errMsg']['namae'])) {
  $namaeErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['namae']}</span>";
}
if (isset($_SESSION['errMsg']['email'])) {
  $emailErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['email']}</span>";
}
if (isset($_SESSION['errMsg']['tel'])) {
  $telErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['tel']}</span>";
}
if (isset($_SESSION['errMsg']['zip'])) {
  $zipErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['zip']}</span>";
}
if (isset($_SESSION['errMsg']['addr'])) {
  $addrErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['addr']}</span>";
}

// 全てのエラーメッセージをクリア
unset($_SESSION['errMsg']);

// 前回入力値を初期表示するための処理
$pay = "銀行振込";
$namae = "";
$email = "";
$tel = "";
$zip = "";
$addr = "";
$memo = "";

if (isset($_SESSION['customer']['pay'])) {
  $pay = $_SESSION['customer']['pay'];
}
if (isset($_SESSION['customer']['namae'])) {
  $namae = $_SESSION['customer']['namae'];
}
if (isset($_SESSION['customer']['email'])) {
  $email = $_SESSION['customer']['email'];
}
if (isset($_SESSION['customer']['tel'])) {
  $tel = $_SESSION['customer']['tel'];
}
if (isset($_SESSION['customer']['zip'])) {
  $zip = $_SESSION['customer']['zip'];
}
if (isset($_SESSION['customer']['addr'])) {
  $addr = $_SESSION['customer']['addr'];
}
if (isset($_SESSION['customer']['memo'])) {
  $memo = $_SESSION['customer']['memo'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>FruitsShop 新鮮果物市場 フォーム</title>
</head>

<body>
  <header>
    <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
  </header>
  <div id="contents">
    <h2>ショッピングカート (2/4)</h2>
    <p>▼支払方法及び住所を入力してください。</p>
    <form method="post" action="UriageInsert.php">
      <table class="customer">
        <tr>
          <th>支払方法</th>
          <td>
            <label><input type="radio" name="pay" value="銀行振込" <?php if ($pay == '銀行振込') {
                                                                  echo 'checked';
                                                                } ?>>銀行振込</label>
            <label><input type="radio" name="pay" value="代金引換" <?php if ($pay == '代金引換') {
                                                                  echo 'checked';
                                                                } ?>>代金引換</label>
          </td>
        </tr>
        <tr>
          <th>お名前<span class="required">必須</span></th>
          <td>
            <input type="text" name="namae" size="35" value="<?php echo $namae; ?>"> <?php echo $namaeErr; ?>
          </td>
        </tr>
        <tr>
          <th>E-Mail<span class="required">必須</span></th>
          <td>
            <input type="text" name="email" size="35" value="<?php echo $email; ?>"> <?php echo $emailErr; ?>
          </td>
        </tr>
        <tr>
          <th>電話番号<span class="required">必須</span></th>
          <td>
            <input type="text" name="tel" size="35" value="<?php echo $tel; ?>"> <?php echo $telErr; ?>
          </td>
        </tr>
        <tr>
          <th>郵便番号<span class="required">必須</span></th>
          <td>〒&nbsp;
            <input type="text" name="zip" size="20" value="<?php echo $zip; ?>"> <?php echo $zipErr; ?>
          </td>
        </tr>
        <tr>
          <th>住所<span class="required">必須</span></th>
          <td><input type="text" name="addr" size="50" value="<?php echo $addr; ?>"> <?php echo $addrErr; ?>
          </td>
        </tr>
        <tr>
          <th>備考</th>
          <td>
            <input type="text" name="memo" size="50" value="<?php echo $memo; ?>">
          </td>
        </tr>
      </table>
      <p><a href="index.php">買い物を続ける</a></p>
      <p>▼購入確認画面に移動する場合は以下のボタンを押してください。<br>
        <input type="submit" name="btn" value="確認画面 &gt;&gt;">
      </p>
    </form>
  </div>

</body>

</html>