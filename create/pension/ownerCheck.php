<?php
session_start();
unset($_SESSION["loginStatus"]);
require_once('./dbConfig.php');

$id = htmlspecialchars($_POST["id"]);
$pass = htmlspecialchars($_POST["pass"]);

if ($id == OWNER_ID && $pass == OWNER_PASS) {
    //echo "ログイン成功";
    $_SESSION["loginStatus"] = "loginOk";
    header("location: ./ownerReserveList.php");
} else {
    //echo "IDまたはパスワードが違います";
    $_SESSION["loginerr"] = "IDまたはパスワードが違います";
    header("location: ./ownerIndex.php");
}
