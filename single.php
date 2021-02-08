<?php
/*
single
*/
get_header(); ?>
<main class="l-main">
  <div class="l-container">

    <div class="p-inner">
      <div class="p-container__postWrap">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <div class="p-container__post p-single__post">
          <a href="<?php the_permalink(); ?>">
            <?php
            $article_url = wp_get_attachment_url(get_post_thumbnail_id());
            $article_bg = "style='background-image:url(" . $article_url . ");'";
            ?>
            <p class="c-container__date"><?php the_time('Y.m.d'); ?></p>
            <p class="c-container__postTitle"><?php the_title(); ?></p>
            <p class="c-pickup__image__sumbnails3" <?php echo $article_bg; ?>></p>
            <p class="c-container__discription"><?php the_title(); ?></p>
          </a>
        </div>
      </div>
      <?php endwhile; endif; ?>
      <?php get_sidebar(); ?>
    </div>
  <?php get_footer(); ?>
  </div>
</main>
