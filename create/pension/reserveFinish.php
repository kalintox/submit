<?php
session_start();
if (isset($_SESSION['reserveNo']) == false) {
  header("location: ./index.php");
  exit();
}
$reserveNo = $_SESSION['reserveNo'];
unset($_SESSION['reserveNo']);
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
    <h1><a href="./index.php"><img src="./images/logo.png" alt=""></a></h1>
    <div id="contact">
      <h2>ご予約／お問い合わせ</h2>
      <span class="tel">☎0120-000-000</span>
    </div>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- メニュー：開始 -->
  <?php include("./topmenu.php"); ?>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
        <!-- 各ページスクリプト挿入場所 -->
        <section>
          <h2>予約完了</h2>
          <p>予約が完了しました。以下の予約番号を控えておいてください。</p>
          <h3>予約情報</h3>
          <table class="input">
            <tr>
              <th>予約番号</th>
              <td><?php echo $reserveNo; ?></td>
            </tr>
          </table>
          <br>
          <p>当日はお気をつけてお出かけください。心よりお待ちいたしております。</p>
          <a class="submit_a" href="./index.php">トップページへ</a>
        </section>
      </article>
    </main>
    <!-- メイン：終了 -->
    <!-- サイド：開始 -->
    <aside id="side">
      <section>
        <h2>ご予約</h2>
        <ul>
          <li><a href="./reserveDay.php">宿泊日入力</a></li>
        </ul>
      </section>
      <section>
        <h2>お部屋紹介</h2>
        <?php include("./sideList.php"); ?>
      </section>
    </aside>
    <!-- サイド：終了 -->
    <!-- ページトップ：開始 -->
    <div id="pageTop">
      <a href="#top">ページのトップへ戻る</a>
    </div>
    <!-- ページトップ：終了 -->
  </div>
  <!-- コンテンツ：終了 -->
  <!-- フッター：開始 -->
  <footer id="footer">
    <p>Copyright c 2016 Jikkyo Pension All Rights Reserved.</p>
  </footer>
  <!-- フッター：終了 -->
</body>

</html>