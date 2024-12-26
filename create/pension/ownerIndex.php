<?php
session_start();
$loginerr = "";
if (isset($_SESSION["loginerr"])) {
  $loginerr = "<p style='color: red;'>" . $_SESSION["loginerr"] . "</p>";
  unset($_SESSION["loginerr"]);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link href="./css/style.css" rel="stylesheet">
  <title>JIKKYO PENSION</title>
</head>

<body>
  <!-- ヘッダー：開始 -->
  <header id="header">
    <div id="pr">
      <p>部活・サークルなどのグループ利用に最適！アットホームなペンション！</p>
    </div>
    <h1><img src="./images/logo.png" alt=""></h1>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <h2>オーナーログイン画面</h2>
    <p>オーナーのIDとパスワードを入力してください。</p>
    <form method="post" action="./ownerCheck.php">
      <table class="host">
        <tr>
          <th>オーナーID</th>
          <td><input type="text" name="id"></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type="password" name="pass"></td>
        </tr>
      </table>
      <?php echo $loginerr; ?>
      <input class="submit_a" type="submit" value="ログイン">
    </form>
  </div>
  <!-- コンテンツ：終了 -->
  <!-- フッター：開始 -->
  <footer id="footer">
    <p>Copyright c 2016 Jikkyo Pension All Rights Reserved.</p>
  </footer>
  <!-- フッター：終了 -->
</body>

</html>