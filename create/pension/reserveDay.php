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
          <h2>空席検索</h2>
          <h3>宿泊予定日入力</h3>
          <form method="post" action="reserveRoomList.php">
            <table>
              <tr>
                <th>宿泊予定日</th>
                <td><input type="date" name="reserveDay" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required></td>
              </tr>
              <tr>
                <th>宿泊日数</th>
                <td><select name="daycount">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>泊</td>
              </tr>
            </table>
            <input class="submit_a" type="submit" value="空席検索">
          </form>
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