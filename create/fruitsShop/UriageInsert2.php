<?php
session_start();

//セッションの値を変数に格納する
$pay = $_SESSION['customer']['pay'];
$namae = $_SESSION['customer']['namae'];
$email = $_SESSION['customer']['email'];
$tel = $_SESSION['customer']['tel'];
$zip = $_SESSION['customer']['zip'];
$addr = $_SESSION['customer']['addr'];
$memo = $_SESSION['customer']['memo'];

require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link == null) {
    die('接続に失敗しました：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');

$list = $_SESSION['list'];
$sql = "INSERT INTO uriage (date, scd, sname, suryo, tanka, kingaku, pay, namae, email, tel, zip, addr, memo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
$date = date('Y-m-d h:i:s');

foreach ($list as $value) {
    $scd = $value[0];
    $sname = $value[1];
    $suryo = $value[2];
    $tanka = $value[3];
    $kingaku = $value[4];

    // テーブルに挿入 **********************************************
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssisssssss", $date, $scd, $sname, $suryo, $tanka, $kingaku, $pay, $namae, $email, $tel, $zip, $addr, $memo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// 結果をセッションに保存
mysqli_close($link);

header("location: ./finish.php");
exit();
