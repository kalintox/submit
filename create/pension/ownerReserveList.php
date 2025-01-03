<?php
session_start();
if (!isset($_SESSION["loginStatus"]) || $_SESSION["loginStatus"] != "loginOk") {
  header("location: ./ownerIndex.php");
  exit();
}
require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link == null) {
  die('接続に失敗しました：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');

$mode = "today";
if (isset($_GET["disp"]) == true) {
  $mode = htmlspecialchars($_GET["disp"]);
}

$sql = "SELECT reserve_no, reserve_date, room_no, numbers, checkin_time, message, customer_name, customer_telno, customer_address FROM reserve, customer WHERE reserve.customer_id = customer.customer_id";

$today = date('Y-m-d');
switch ($mode) {
  case 'after':
    $modeStr = "（本日以降）";
    $sql = $sql . " AND date(reserve_date) >= '{$today}' ORDER BY reserve_date ASC";
    break;
  case 'before':
    $modeStr = "（過去）";
    $sql = $sql . " AND date(reserve_date) < '{$today}' ORDER BY reserve_date DESC";
    break;
  case 'today':
  default:
    $modeStr = "（本日）";
    $sql = $sql . " AND date(reserve_date) = '{$today}'";
    break;
}

// 過去か現在か現在以降である変数をセッションに格納する
$_SESSION["mode"] = $mode;

$result = mysqli_query($link, $sql);


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
  <nav id="menu">
    <ul>
      <li><a href="./ownerReserveList.php?disp=today">本日</a></li>
      <li><a href="./ownerReserveList.php?disp=after">本日以降</a></li>
      <li><a href="./ownerReserveList.php?disp=before">過去</a></li>
    </ul>
  </nav>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <h2>予約管理画面<?php echo $modeStr; ?></h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
      echo "<p>各行の削除ボタンを押すことで、予約情報を削除することができます。</p>";
      echo "<table class=\"host\">";
      echo "<tr>";
      echo "<th>宿泊日付</th>";
      echo "<th>チェックイン<br>予約時間</th>";
      echo "<th>部屋番号</th>";
      echo "<th>顧　客　名</th>";
      echo "<th>代表者連絡先</th>";
      echo "<th>利用人数</th>";
      echo "<th>メッセージ</th>";
      if ($mode != "before") {
        echo "<th></th>";
      }
      echo "</tr>";
    } else {
      echo "<p>指定された期間に予約はありません。</p>";
    }

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<tr>\n";
      $rdate = date('Y-m-d', strtotime($row['reserve_date']));
      echo "<td>{$rdate}</td>\n";
      echo "<td>{$row['checkin_time']}</td>\n";
      echo "<td>{$row['room_no']}</td>\n";
      echo "<td>{$row['customer_name']}</td>\n";
      echo "<td>{$row['customer_telno']}<br><a href=\"mailto:{$row['customer_address']}\">{$row['customer_address']}</a></td>\n";
      echo "<td>{$row['numbers']}人</td>\n";
      echo "<td>{$row['message']}</td>\n";
      if ($mode != "before") {
        echo "<td><a class='submit_a' onclick='return confirm(\"{$row['customer_name']}様の予約を削除します。よろしいですか？\");' href='./ownerReserveDelete.php?rno={$row['reserve_no']}'>削除</a></td>\n";
      }
      echo "</tr>\n";
    }
    ?>
    <!--  
      <tr>
        <td>2016-07-15</td>
        <td>19:00</td>
        <td>301</td>
        <td>実教太郎</td>
        <td>0312345678</td>
        <td>4人</td>
        <td>よろしくお願いいたします。（テスト）</td>
        <td><a href="" class="submit_a">削除</a></td>
      </tr>
      <tr>
        <td>2016-07-15</td>
        <td>19:00</td>
        <td>101</td>
        <td>実教太郎</td>
        <td>0312345678</td>
        <td>4人</td>
        <td>よろしくお願いいたします。（テスト）</td>
        <td><a href="" class="submit_a">削除</a></td>
      </tr>
      -->
    </table>
    <br>
    <a class="submit_a" href="./ownerLogout.php">ログアウトする</a>
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