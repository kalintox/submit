<!DOCTYPE html>
<html lang="ja">

<head>
    <META NAME="GOOGLEBOT" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
    <META NAME="ROBOTS" CONTENT="NOARCHIVE,NOINDEX,NOFOLLOW">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <meta http-equiv="cache-control" content="no-cache">
    <meta charset="UTF-8">
    <title>ポートフォリオ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/design.css" media="screen">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>
    <div class="allWrap">

        <!-- メイン -->
        <main class="mainWrap">
            <div id="navTrigger" class="navTrigger">
                <a></a>
            </div><!-- /navTrigger -->

            <?php include("./menu.php"); ?>

            <section id="link_info" class="box">
                <h2>自己紹介</h2>
                <h3><span>前職</span></h3>
                <p>客先の常駐システムエンジニアを9年間担当。<br><br> </p>
                <h3><span>どんな業務か</span></h3>
                <p>社内システムの運用保守を主に担当。<br>
                    Javaを使用してアプリケーション機能の実装および詳細設計の作成やHTML、CSSを使ったユーザーインターフェース（UI）の設計・開発を担当。
                </p>
                <h3><span>開発能力</span></h3>
                <p>競技プログラミングAtcoder灰色コーダー<br>
                    日々鍛錬中。
                </p>
                <a href="img/item/Atcoder1.png" onClick="window.open(href,'Atcoder1','left=50,top=0,width=800,height=640'); return false;">
                    <p>戦績</p>
                </a>
                <a href="img/item/Atcoder2.png" onClick="window.open(href,'Atcoder2','left=50,top=0,width=800,height=640'); return false;">
                    <p>順位分布</p>
                </a>
            </section>


        </main><!-- /mainWrap -->
        <!-- /メイン -->

        <!-- フッター（削除OK※デフォルト非表示） -->
        <footer class="mainFooter">
            designed by <a href="https://ragusnon.wwww.jp" rel="noopener">無糖</a>
        </footer>

    </div><!-- /allWrap -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/design.js"></script>
</body>

</html>