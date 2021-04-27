<?php
// ini_set('display_errors',1);
session_start();
header('Content-Type: application/html; charset=utf-8');
//このページに直接アクセスした場合は拒否する
if(!isset($_POST['token'])) {
  echo '不正なアクセスの可能性があります';
  exit;
}
//フォームに入力された値のエスケープ処理
function e($str) {
  return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, 'UTF-8');
}

//キーとトークンが一致したら管理者に入力内容がメールで送られる
if($_SESSION['key'] === $_POST['token']) {
  echo "token一致";

  $name = $_POST['name'];
  echo $name;
  echo "a";


  $email = $_POST['email'];
  $comment = $_POST['comment'];

  $from = "lilium74u@gmail.com";
  //メールの送り先
  $to = $_POST['email'];
  //メールの件名
  $subject = $name . 'さんからの入力フォームでの送信です';
  //メール本文
  $content = '名前:' . $name . "\r\n\r\n" . 'メールアドレス:' . $email . "\r\n\r\n" . '内容:' . $comment;
  //メールヘッダー
  $header = 'From: ' . mb_encode_mimeheader($name). ' <' . $email. '>';

  //文字化け対策
  mb_language('ja');
  mb_internal_encoding('UTF-8');

  if(mb_send_mail($to, $subject, $content, $header)) {
    //メールが送信出来たら$_SESSIONの値をクリア
    $_SESSION = array();
    //メールが送信出来たらセッションを破棄
    session_destroy();
    echo '送信しました';
  } else {
    echo  '送信に失敗しました';
  }
} else {
  echo 'キーとトークンが一致しません';
}

  mb_send_mail('lilium74u@gmail.com', 'お客様よりお問い合わせがありました', $comment, $name);