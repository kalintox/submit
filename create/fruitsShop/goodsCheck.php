<?php
session_start();

// 商品コード、数量の値を受け取る
$syocd = htmlspecialchars($_POST['syocd']);
$suryo = htmlspecialchars($_POST['suryo']);

$errMsg = "";

// 数量の値をチェック
if (empty($suryo)) {
    $errMsg = '※数量が未入力です';
} else if (is_numeric($suryo) != true) {
    $errMsg = '※数値で入力してください';
} else if ($suryo <= 0) {
    $errMsg = '※1以上を指定してください';
}
// エラーがなかった場合
if ($errMsg == "") {
    require_once('./dbConfig.php');
    $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if ($link == null) {
        die("接続に失敗しました：" . mysqli_connect_error());
    }
    mysqli_set_charset($link, "utf8");
    $sql = "SELECT scd,sname,stanka FROM syohin WHERE scd = {$syocd}";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $list = [$syocd, $row['sname'], $suryo, $row['stanka'], $suryo * $row['stanka']];

    // 二次元配列にすることで、複数行の配列を取得することができる
    $_SESSION['list'][] = $list;

    // // 'counter' がセッションに設定されていない場合、初期化
    // if (!isset($_SESSION['list']['counter'])) {
    //     $_SESSION['list']['counter'] = 0;
    // }

    // // 配列のカウンタを取得
    // $count = $_SESSION['list']['counter'];
    // $_SESSION['list'][$count][0] = $count;
    // $_SESSION['list'][$count][1] = $syocd;
    // $_SESSION['list'][$count][2] = $row['sname'];
    // $_SESSION['list'][$count][3] = $suryo;
    // $_SESSION['list'][$count][4] = $row['stanka'];
    // $_SESSION['list'][$count][5] = $row['stanka'] * $suryo;

    // $_SESSION['list']['counter']++;

    mysqli_free_result($result);
    mysqli_close($link);
    header("location: ./list.php");

    // 入力エラーがあった場合
} else {
    // エラー内容をセッションに格納する                                     
    $_SESSION['errMsg'] = $errMsg;
    header("location: ./index.php?syocd={$syocd}&suryo={$suryo}");
}
exit();
