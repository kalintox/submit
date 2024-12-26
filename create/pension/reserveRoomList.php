<?php
session_start();
if (isset($_SESSION['reserve'])) {
  unset($_SESSION['reserve']);
}
require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link == null) {
  die("接続に失敗しました：" . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
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
        <section>
          <h2>空室検索</h2>
          <h3>
            <!-- 各ページスクリプト挿入場所 -->
            <?php
            $reserveDt = $_POST['reserveDay'];
            $_SESSION['reserve']['day'] = $reserveDt;
            $daycount = $_POST['daycount'];
            $_SESSION['reserve']['daycount'] = $daycount;

            $array = [];
            $array2 = [];
            for ($i = 0; $i <= $daycount - 1; $i++) {
              $newDate = date('Y-m-d', strtotime($reserveDt . "+{$i}day"));
              if ($i == 0 || $i == $daycount - 1) {
                $newDate2 = date('Y/m/d', strtotime($reserveDt . "+{$i}day"));
                $array2[$i] = $newDate2;
              }
              $array[$i] = $newDate;
            }

            // 日付リストをカンマ区切りで文字列化
            $dateList = implode("', '", $array);
            if ($daycount != 0) {
              $dateList2 = implode("～", $array2);
            }
            $_SESSION['reserve']['dateList2'] = $dateList2;

            $sql = "SELECT room_name, type_name, dayfee, main_image, room_no FROM room, room_type WHERE room.type_id = room_type.type_id AND room.room_no NOT IN ( SELECT room_no FROM reserve WHERE date(reserve_date) IN ('$dateList'))";
            //$sql = "SELECT room_name, type_name, dayfee, main_image, room_no FROM room, room_type WHERE room.type_id = room_type.type_id AND room.room_no NOT IN ( SELECT room_no FROM reserve WHERE date(reserve_date) = '{$reserveDt}')";
            //$sql = "SELECT room_name, type_name, dayfee, main_image, room_no FROM room, room_type WHERE room.type_id = room_type.type_id AND room.room_no IN ( SELECT room_no FROM reserve WHERE date(reserve_date) = '{$reserveDt}')";
            $result = mysqli_query($link, $sql);
            //echo date('Y/m/d', strtotime($reserveDt));
            echo $dateList2;
            ?>
            の空室一覧
          </h3>

          <?php
          if (mysqli_num_rows($result) == 0) {
            echo "<p>申し訳ありません。指定の日付は満室です。<br></p>"; ?>
            <a class="submit_a" href="./reserveDay.php">前の画面へ戻る</a>
          <?php
          } else {
            echo "<p>";
            echo mysqli_num_rows($result);
            echo "部屋の空室があります</p>"
          ?>
            <table>
              <th>お部屋名称</th>
              <th>お部屋タイプ</th>
              <th>一泊料金<br>（部屋単位）</th>
              <th colspan="2">お部屋イメージ</th>

            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<tr>\n";
              echo "<td>{$row['room_name']}</td>\n";
              echo "<td>{$row['type_name']}</td>\n";
              $roomfee = number_format($row['dayfee']);
              echo "<td class='number'>&yen;{$roomfee}</td>\n";
              echo "<td><img class='small' src='./images/{$row['main_image']}'></td>\n";
              echo "<td><a href='./reserveDetail.php?rno={$row['room_no']}'>選択</a></td>\n";
              echo "</tr>\n";
            }
          }
            ?>
            </table>
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
  <?php
  mysqli_free_result($result);
  mysqli_close($link);
  ?>
</body>

</html>