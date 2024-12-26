<?php
session_start();
$dnameErr = "";
$dtelnoErr = "";
$reserveNumErr = "";
$checkinErr = "";
if (isset($_SESSION['errMsg']['dname'])) {
   $dnameErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['dname']}</span>";
}
if (isset($_SESSION['errMsg']['dtelno'])) {
   $dtelnoErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['dtelno']}</span>";
}
if (isset($_SESSION['errMsg']['reserveNumber'])) {
   $reserveNumErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['reserveNumber']}</span>";
}
if (isset($_SESSION['errMsg']['checkin'])) {
   $checkinErr = "<span style='font-weight:bold; color:red;'>\t{$_SESSION['errMsg']['checkin']}</span>";
}
unset($_SESSION['errMsg']);   // 全てのエラーメッセージをクリア

require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link == null) {
   die('接続に失敗しました：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
$roomNo = $_GET['rno'];
$sql = "SELECT room_name,capacity FROM room WHERE room_no = {$roomNo}";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$roomName = $row['room_name'];
$capa = $row['capacity'];
$_SESSION['reserve']['roomno'] = $roomNo;
$_SESSION['reserve']['capacity'] = $capa;
$reserveDays = $_SESSION['reserve']['dateList2'];
$reserveDay = $_SESSION['reserve']['day'];
$week = ['日', '月', '火', '水', '木', '金', '土'];
$dow = date('w');
$reserveDayStr = date("Y年n月j日({$week[$dow]})", strtotime($reserveDay));

$dname = "";
if (isset($_SESSION['reserve']['dname'])) {
   $dname = $_SESSION['reserve']['dname'];
}
$dtelno = "";
if (isset($_SESSION['reserve']['dtelno'])) {
   $dtelno = $_SESSION['reserve']['dtelno'];
}
$dmail = "";
if (isset($_SESSION['reserve']['dmail'])) {
   $dmail = $_SESSION['reserve']['dmail'];
}
$reserveNum = "";
if (isset($_SESSION['reserve']['reserveNumber'])) {
   $reserveNum = $_SESSION['reserve']['reserveNumber'];
}
$checkin = "";
if (isset($_SESSION['reserve']['checkin'])) {
   $checkin = $_SESSION['reserve']['checkin'];
}
$message = "";
if (isset($_SESSION['reserve']['message'])) {
   $message = $_SESSION['reserve']['message'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="./css/style.css" type="text/css">
   <title>JIKKYO PENSION</title>
</head>

<body>
   <!-- ヘッダー：開始 -->
   <header id="header">
      <div id="pr">
         <p>部活・サークルのグループ利用に最適！アットホームなペンション！</p>
      </div>
      <h1><a href="./index.php"><img src="./images/logo.png" alt=""></a></h1>
      <div id="contact">
         <h2>ご予約/お問い合わせ</h2>
         <span class="tel">☎0120-000-000</span>
      </div>
   </header>
   <!-- ヘッダー：終了 -->
   <!-- メニュー：開始 -->
   <?php include('./topmenu.php'); ?>
   <!-- メニュー：終了 -->
   <!-- コンテンツ：開始 -->
   <div id="contents">
      <!-- メイン：開始 -->
      <main id="main">
         <article>
            <!-- 各ページ　スクリプト挿入場所 -->
            <section>
               <h2>ご予約（詳細情報の入力）</h2>
               <p>詳細情報を入力後、予約確認ボタンをおしてください。<br>
                  （※がついている項目は入力必須項目です）</p>
               <h3>予約情報</h3>
               <table class="input">
                  <tr>
                     <th>お部屋名称</th>
                     <td><?php echo $roomName . "<span style=opacity:0.8;>（定数{$capa}名）</span>"; ?></td>
                  </tr>
                  <tr>
                     <th>宿泊日</th>
                     <td><?php echo $reserveDays; ?></td>
                  </tr>
               </table><br>
               <h3>代表者情報</h3>
               <form action="reserveCheck.php" method="post">
                  <table class="input">
                     <tr>
                        <th>代表者氏名（※）</th>
                        <td><input type="text" name="dname" value="<?php echo $dname; ?>"><?php echo $dnameErr; ?></td>
                     </tr>
                     <tr>
                        <th>連絡先電話番号（※）</th>
                        <td><input type="text" name="dtelno" value="<?php echo $dtelno; ?>"><?php echo $dtelnoErr; ?></td>
                     </tr>
                     <tr>
                        <th>メールアドレス</th>
                        <td><input type="text" name="dmail" value="<?php echo $dmail; ?>"></td>
                     </tr>
                  </table><br>
                  <h3>予約詳細情報</h3>
                  <table class="input">
                     <tr>
                        <th>宿泊人数（※）</th>
                        <td><input type="text" name="reserveNumber" value="<?php echo $reserveNum; ?>"><?php echo $reserveNumErr; ?></td>
                     </tr>
                     <tr>
                        <th>チェックイン予定時間（※）</th>
                        <td><select name="checkin">
                              <option value="">時間を選択</option>
                              <option value="15:00" <?php if ($checkin == '15:00') {
                                                         echo 'selected';
                                                      } ?>>15:00</option>
                              <option value="16:00" <?php if ($checkin == '16:00') {
                                                         echo 'selected';
                                                      } ?>>16:00</option>
                              <option value="17:00" <?php if ($checkin == '17:00') {
                                                         echo 'selected';
                                                      } ?>>17:00</option>
                              <option value="18:00" <?php if ($checkin == '18:00') {
                                                         echo 'selected';
                                                      } ?>>18:00</option>
                              <option value="19:00" <?php if ($checkin == '19:00') {
                                                         echo 'selected';
                                                      } ?>>19:00</option>
                           </select><?php echo $checkinErr; ?></td>
                     </tr>
                     <tr>
                        <th>連絡事項</th>
                        <td><textarea name="message" cols="40" rows="4"><?php echo $message; ?></textarea></td>
                     </tr>
                  </table><br>
                  <p>まだ予約は確定しておりません。次の画面で確定させてください。</p>
                  <input class="submit_a" type="submit" value="予約確認">
                  <input class="submit_a" type="button" value="宿泊予定日入力に戻る" onclick="location.href='./reserveDay.php';">
                  <!--<input class="submit_a" type="button" value="前の画面に戻る" onclick="history.back();">-->
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
            <?php include('./sideList.php'); ?>
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
      <p>Copyright &copy; 2016 Jikkyo Pension All Rights Reserved.</p>
   </footer>
   <!-- フッター：終了 -->
   <?php
   mysqli_free_result($result);
   mysqli_close($link);
   ?>
</body>

</html>