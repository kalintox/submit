<?php
session_start();

// 前画面より値を受け取り、変数に格納
$pay = htmlspecialchars($_POST['pay']);
$namae = htmlspecialchars($_POST['namae']);
$email = htmlspecialchars($_POST['email']);
$tel = htmlspecialchars($_POST['tel']);
$zip = htmlspecialchars($_POST['zip']);
$addr = htmlspecialchars($_POST['addr']);
$memo = htmlspecialchars($_POST['memo']);

// 入力地をセッションに格納する
$_SESSION['customer']['pay'] = $pay;
$_SESSION['customer']['namae'] = $namae;
$_SESSION['customer']['email'] = $email;
$_SESSION['customer']['tel'] = $tel;
$_SESSION['customer']['zip'] = $zip;
$_SESSION['customer']['addr'] = $addr;
$_SESSION['customer']['memo'] = $memo;

// エラーメッセージを格納する
$errMsg = array();

// 未入力チェック -------------------------------------
if (empty($namae)) {
    $errMsg['namae'] = '※名前が未入力です';
}
if (empty($email)) {
    $errMsg['email'] = '※E-Mailが未入力です';
}
if (empty($tel)) {
    $errMsg['tel'] = '※電話番号が未入力です';
}
if (empty($zip)) {
    $errMsg['zip'] = '※郵便番号が未入力です';
}
if (empty($addr)) {
    $errMsg['addr'] = '※住所が未入力です';
}

if (count($errMsg) == 0) {
    // エラーがなかった場合
    header("location: ./customerConfirm.php");
} else {
    // 入力エラーがあった場合   
    // エラー内容をセッションに格納する                                           
    $_SESSION['errMsg'] = $errMsg;
    header("location: ./customer.php");
}
exit();
