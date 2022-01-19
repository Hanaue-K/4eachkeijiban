<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php

  mb_internal_encoding("utf8");
  $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "root");
  $stmt = $pdo->query("select * from 4each_keijiban");
  ?>

  <header>
    <img class="logo" src="4eachblog_logo.jpg">

    <div class="header_menu">
      <ul>
        <li>トップ</li>
        <li>プロフィール</li>
        <li>4eachについて</li>
        <li>登録フォーム</li>
        <li>お問い合わせ</li>
        <li>その他</li>
      </ul>
    </div>
  </header>

  <main>
    <div class="main_container">
      <div class="left">
        <h1>プログラミングに役立つ掲示板</h1>
        <form class="form" method="post" action="insert.php">
          <div>
            <h2>入力フォーム</h2>
          </div>
          <div>
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="40" name="handlename">
          </div>
          <div>
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="40" name="title">
          </div>
          <div>
            <label>コメント</label>
            <br>
            <textarea cols="60" rows="5" class="text" name="comments"></textarea>
          </div>
          <div>
            <input type="submit" class="button" value="送信する">
          </div>
        </form>

        <?php
        while ($row = $stmt->fetch()) {
          echo "<div class='comments'>";
          echo "<h2>" . $row['title'] . "</h2>";
          echo "<div class='honbun'>";
          echo $row['comments'];
          echo "<div class='posted'>posted by " . $row['handlename'] . "</div>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>

      <div class="right">
        <h2>人気の記事</h2>
        <ul>
          <li>PHPオススメ本</li>
          <li>PHP MyAdminの使い方</li>
          <li>いま人気のエディタTop5</li>
          <li>HTMLの基礎</li>
        </ul>

        <h2>オススメリンク</h2>
        <ul>
          <li>インターノウス株式会社</li>
          <li>XAMPPのダウンロード</li>
          <li>Eclipceのダウンロード</li>
          <li>Braketsのダウンロード</li>
        </ul>

        <h2>カテゴリ</h2>
        <ul>
          <li>HTML</li>
          <li>PHP</li>
          <li>MySQL</li>
          <li>Javascript</li>
        </ul>
      </div>
    </div>

    <footer>
      <p>copyright internous | 4each blog is the one which provides A to Z about programming</p>
    </footer>
  </main>
</body>

</html>
