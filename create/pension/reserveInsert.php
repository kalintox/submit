<?php
session_start();
require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link == null) {
    die('接続に失敗しました：' . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');

// トランザクションを開始
mysqli_begin_transaction($link);

try {
    // 新しいCustomerIDを取得 **********************************************
    $maxsql = "SELECT MAX(customer_id) AS maxid FROM customer";
    $result = mysqli_query($link, $maxsql);
    if (!$result) {
        throw new Exception('Customer ID取得エラー');
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $newid = $row['maxid'] + 1;

    // Customerテーブルに挿入 **********************************************
    $dname = $_SESSION['reserve']['dname'];
    $dtelno = $_SESSION['reserve']['dtelno'];
    $dmail = $_SESSION['reserve']['dmail'];
    $sql = "INSERT INTO customer (customer_id, customer_name, customer_telno, customer_address) VALUES (?,?,?,?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "isss", $newid, $dname, $dtelno, $dmail);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Customer挿入エラー');
        }
        mysqli_stmt_close($stmt);
    } else {
        throw new Exception('Customer挿入準備エラー');
    }

    // 新しいreserve_noを取得 **********************************************
    $reserveDay = $_SESSION['reserve']['day'];
    $newsql = "SELECT MAX(reserve_no) AS maxno FROM reserve WHERE date(reserve_date) = '" . $reserveDay . "'";
    $result = mysqli_query($link, $newsql);
    if (!$result) {
        throw new Exception('Reserve No取得エラー');
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $maxno = $row['maxno'];
    if (empty($maxno)) {
        $reserve = date('Ymd', strtotime($reserveDay));
        $reserveNo = $reserve . "01";
    } else {
        $reserveNo = $maxno + 1;
    }

    // Reserveテーブルに挿入 **********************************************
    $reserveNumber = $_SESSION['reserve']['reserveNumber'];
    $checkin = $_SESSION['reserve']['checkin'];
    $message = $_SESSION['reserve']['message'];
    $roomNo = $_SESSION['reserve']['roomno'];
    $sql = "INSERT INTO reserve (reserve_no, reserve_date, room_no, customer_id, numbers, checkin_time, message) VALUES (?,?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "isiiiss", $reserveNo, $reserveDay, $roomNo, $newid, $reserveNumber, $checkin, $message);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Reserve挿入エラー');
        }
        mysqli_stmt_close($stmt);
    } else {
        throw new Exception('Reserve挿入準備エラー');
    }

    // トランザクションをコミット
    mysqli_commit($link);

    // 結果をセッションに保存
    mysqli_free_result($result);
    mysqli_close($link);
    unset($_SESSION['reserve']);
    $_SESSION['reserveNo'] = $reserveNo;

    // 完了ページへリダイレクト
    header("location: ./reserveFinish.php");
    exit;
} catch (Exception $e) {
    // エラーが発生した場合はロールバック
    mysqli_rollBack($link);

    mysqli_close($link);
    unset($_SESSION['reserve']);

    header("location: ./reserveError.php");
    exit;
}
