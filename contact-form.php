<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>
<div class="p-container__inner">
  <div class="contact">
    <h1 class="headingTop">問い合わせフォーム</h1>
    <?php
      echo do_shortcode('[contact-form-7 id="453" title="コンタクトフォーム 1"]');
    ?>
  </div>
</div>
<?php get_footer(); ?>