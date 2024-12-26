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
                <h2>作成物</h2>
                <h3><span>どんな作成物か</span></h3>
                <p>HTML/CSSのサイトからPHPのサイトまで</p>
            </section>

            <section id="link_main" class="box">
                <h2>作成物一覧</h2>

                <h3><span>HTML/CSS</span></h3>

                <ul class="longList space">
                    <li>
                        <a href="./create/cafe_hp/index.html">
                            <img src="img/item/SampleCafe.png" alt="">
                            <div class="longTitle">Sample Cafe</div>
                            <div class="longInfo">カフェのサンプルサイト<br>
                                「Microsoft Expression Web4」を使用して作成している。</div>
                        </a>
                    </li>
                    <li>
                        <a href="./create/hana_hp/index.html">
                            <img src="img/item/PetitFleur.png" alt="">
                            <div class="longTitle">Petit Fleur</div>
                            <div class="longInfo">フラワーショップサイト<br>
                                テーブルや画像を挿入して作成している。</div>
                        </a>
                    </li>
                </ul>

                <h3><span>JavaScript</span></h3>

                <ul class="longList space">
                    <li>
                        <a href="./create/flower_html/index.html">
                            <img src="img/item/SeasonFlower.png" alt="">
                            <div class="longTitle">季節の花</div>
                            <div class="longInfo">季節ごとの花の紹介サイト<br>
                                JavaScriptを使用して、スクロール・カウントダウン・スライドショーなどの機能を追加した。</div>
                        </a>
                    </li>
                    <li>
                        <a href="./create/osero/osero.html">
                            <img src="img/item/osero.png" alt="">
                            <div class="longTitle">オセロ</div>
                            <div class="longInfo">オセロゲーム<br>
                                JavaScriptを使用して、簡易的なオセロゲームを作成した。<br>
                                参考サイト：https://magazine.techacademy.jp/magazine/22767</div>
                        </a>
                    </li>
                    <li>
                        <a href="./create/tax/index.html">
                            <img src="img/item/tax.png" alt="">
                            <div class="longTitle">消費税計算</div>
                            <div class="longInfo">お買い物の消費税計算<br>
                                JavaScriptを使用して、お買い物商品に対して消費税をプラスするサイトを作成した。<br></div>
                        </a>
                    </li>
                </ul>

                <h3><span>PHP</span></h3>

                <ul class="longList space">
                    <li>
                        <a href="./create/pension/index.php">
                            <img src="img/item/JikkyoPension.png" alt="">
                            <div class="longTitle">ホテル</div>
                            <div class="longInfo">ホテル予約サイト<br>
                                PHPを使用してホテルサイトから客室を予約するサイトを作成した。</div>
                        </a>
                    </li>
                    <li>
                        <a href="./create/fruitsShop/index.php">
                            <img src="img/item/FruitsShop.png" alt="">
                            <div class="longTitle">フルーツショップ</div>
                            <div class="longInfo">フルーツショップのサイト<br>
                                PHPを使用して、フルーツの購入者の住所や電話番号をデータベースに登録するサイトを作成した。</div>
                        </a>
                    </li>
                </ul>

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