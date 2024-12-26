<?php
session_start();

// $keyだけにすると、value値の”削除”が取り出され、インデックスは取り出されないため、削除されない。
// $var = $_POST['']だと、name属性が可変のため、値が取り出せない。そもそもインデックスが取り出せない。
// $_POST
foreach ($_POST as $key => $value) {
    unset($_SESSION['list'][$key]);
    // 配列のインデックスを再調整
    $_SESSION['list'] = array_values($_SESSION['list']);
}
header("location: ./list.php");
exit();
