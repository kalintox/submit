<?php
session_start();
//  セッションから値を受け取り、変数に格納

$pay = $_SESSION['customer']['pay'];
$namae = $_SESSION['customer']['namae'];
$email = $_SESSION['customer']['email'];
$tel = $_SESSION['customer']['tel'];
$zip = $_SESSION['customer']['zip'];
$addr = $_SESSION['customer']['addr'];
$memo = $_SESSION['customer']['memo'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>FruitsShop 新鮮果物市場 確認画面</title>
</head>

<body>
    <!-- ヘッダー：開始 -->
    <header>
        <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
    </header>
    <!-- ヘッダー：終了 -->
    <!-- コンテンツ：開始 -->
    <div id="contents">
        <h2>ショッピングカート (3/4)</h2>
        <p>▼内容に間違いがないか確認してください。</p>
        <form action="./UriageInsert2.php" method="post">
            <table class="input">
                <tr>
                    <th>支払方法</th>
                    <td><?php echo $pay; ?></td>
                </tr>
                <tr>
                    <th>お名前</th>
                    <td><?php echo $namae; ?></td>
                </tr>
                <tr>
                    <th>E-Mail</th>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><?php echo $tel; ?></td>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <td><?php echo $zip; ?></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td><?php echo $addr; ?></td>
                </tr>
                <tr>
                    <th>備考</th>
                    <td><?php echo $memo; ?></td>
                </tr>
            </table>
            <p><a href="customer.php">前の画面に戻る</a></p>
            <p>▼購入する場合は以下のボタンを押してください。<br>
                <input type="submit" name="btn" value="購入">
        </form>
    </div>
    <!-- コンテンツ：終了 -->
</body>

</html>