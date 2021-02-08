<?php
/*
*
* Template Name: contact-complete
*
*/
?>
<?php get_header(); ?>
<div class="contact_complete">
  <h3 class="headingTop">
    お問い合わせ
  </h3>
    <p class="done">
      お問い合わせの送信が完了しました。<br>
      後日担当者よりご返信いたしますので、しばらくお待ちください。
    </p>
  <div class="contents">
    <?php the_content(); ?>
  </div>
  <p class="topPageBtn">
    <a class="btn" href="<?php echo content_url(); ?>/index">
      トップページへ戻る
    </a>
  </p>
</div>
<?php	get_footer(); ?>
