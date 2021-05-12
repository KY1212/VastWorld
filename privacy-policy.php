<?php
/*
Template Name: privacy-policy
*/
?>
<?php get_header(); ?>
<main class="l-main">
  <div class="p-container__inner">
    <div class="p-container">
      <p class="headingTop">
				プライバシーポリシー
			</p>
      <div class="p-container__postWrap single margin">
        <div class="p-single__post">
          <div class="p-container__discription"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
  </div>
</main>
<?php get_footer(); ?>