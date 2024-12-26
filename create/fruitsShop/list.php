<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>FruitsShop 新鮮果物市場 買物カゴ</title>
</head>

<body>
  <header>
    <h1><img src="images/fruitshop_logo.gif" alt="FruitShopタイトル"></h1>
  </header>
  <div id="contents">
    <h2>ショッピングカート (1/4)</h2>
    <p>▼買物カゴの中身は以下のとおりです。</p>
    <form method="post" action="delete.php">
      <table>
        <tr>
          <th class="col1">No</th>
          <th class="col2">コード</th>
          <th class="col3">品名</th>
          <th class="col2">数量</th>
          <th class="col2">単価</th>
          <th class="col2">金額</th>
          <th class="col2">削除</th>
        </tr>
        <?php
        session_start();
        $list = $_SESSION['list'];
        $count = 0;

        foreach ($list as $value) {
          echo "<tr>";
          echo "<td>{$count}</td>";
          echo "<td>{$value[0]}</td>";
          echo "<td>{$value[1]}</td>";
          echo "<td>{$value[2]}</td>";
          echo "<td>{$value[3]}</td>";
          echo "<td>{$value[4]}</td>";
          // echo "<td><input type='submit' name='delete_{$count}' value='削除 ' onclick='return confirm(\"削除します。よろしいですか？\");'>";
          echo "<td><input type='submit' name='{$count}' value='削除 ' onclick='return confirm(\"削除します。よろしいですか？\");'>";
          echo "</tr>";
          $count++;
        }

        // for ($i = 0; $i < $_SESSION['list']; $i++) {
        //   echo "<tr>";
        //   echo "<th>" . $_SESSION['list'][$i] . "</th>";
        //   echo "</tr>";
        // }
        // if ($_SESSION['list']['counter'] > 0) {
        //   for ($i = 0; $i < $_SESSION['list']['counter']; $i++) {
        //     echo "<tr>";
        //     echo "<th>" . $_SESSION['list'][$i][0] . "</th>";
        //     echo "<th>" . $_SESSION['list'][$i][1] . "</th>";
        //     echo "<th>" . $_SESSION['list'][$i][2] . "</th>";
        //     echo "<th>" . $_SESSION['list'][$i][3] . "</th>";
        //     echo "<th>" . $_SESSION['list'][$i][4] . "</th>";
        //     echo "<th>" . $_SESSION['list'][$i][5] . "</th>";
        //     echo "</tr>";
        //   }
        // }
        ?>
      </table>
    </form>
    <p><a href="index.php">買い物を続ける</a></p>
    <p><a href="del.php">買い物をやめる</a></p>
    <?php
    if (isset($_SESSION['list'][0])) {
    ?>
      <form action="customer.php" method="post">
        <p>▼購入画面へ進む場合は以下のボタンを押してください。<br>
          <input type="submit" name="btn" value="購入画面へ &gt;&gt;">
        </p>
      </form>
    <?php
    }
    ?>
  </div>

</body>

</html>