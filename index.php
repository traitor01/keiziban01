<?php
$fp = fopen('data.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fputcsv($fp, [$_POST['name'], $_POST['comment']]);
    rewind($fp);
}
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>市川生徒専用チャット</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <div class="header">
      <div class="header-logo">市川茶っと</div>
      <div class="header-list">
        <ul>
          <li class="maker">製作者:ハリポタ</li>
        </ul>
      </div>
    </div>
    <h1>掲示板</h1>
    <div class="main">
      <div class="copy-container">
        <section class="toukou">
<?php
 if (!empty($rows)):
 ?>
          <ul class="box">
<?php 
foreach ($rows as $row): 
?>
            <li>名前:<?=$row[0]?> </li>
            <li>><?=$row[1]?></li>
<?php 
endforeach; 
?>
          </ul>
<?php 
endif;
?>
        </section>
        <section>
          <form action="" method="post">
            <ul>
              <li>
                <p class="name">名前:<input placeholder="必須" class="in-name" type="text" name="name" size="10" maxlength="20" required></p>
              </li>
              <li>
                <p class="honbun">本文:<textarea name="comment" id="in_massage" rows="6" class="string-text" placeholder="入力してください"></textarea>
                </p>
              </li>
              <li>
                <input class="bottom" type="submit" value="送信する">
              </li>
            </ul>
          </form>
        </section>
      </div>
      <div class="contents">
      </div>
      <div class="contact-form">
      </div>
    </div>
    <div class="footer">
      <div class="footer-logo">
        <a title="再起動" href="https://traitor01.github.io/keiziban01/">
        市川茶っと
        </a>
      </div>
      <div class="footer-list">
        <ul>
          <li title="もし学校でみんなに何かを伝えたいとき「LINE」
で伝えることもできますが学校で「LINE」をして
ると一目瞭然でばれてしまうのでどうにかいい案
はないかと考えていた時「そうだ！プログラミン
グが少しできるから勉強してwebを作ろう！」と
思ったからです。">製作動機</li>
          <li title="名前に苗字だけを書いてください。
その後本文を書き、書き終えたら送信するを押してください。
そうすると、左側にある掲示板に反映されます。
PC専用です。スマートフォンやタブレットで利用しようとする
と正しく表示されない可能性があります。また、ブラウザは
Microsoft Edge専用です。それ以外で見ると正しく表示され
ない可能性があります。">電子説明書</li>
          <li title="2205:製作者までお越しください。">お問い合わせ</li>
        </ul>
      </div>
    </div>
  </body>
</html>
