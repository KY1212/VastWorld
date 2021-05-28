<?php
/*
single
*/
get_header(); ?>
<main class="l-main">

  <div class="p-container__inner">
    <div class="p-container__postWrap single">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <div class="p-single__post">
        <a>
          <?php
            $article_url = wp_get_attachment_url(get_post_thumbnail_id());
            $article_bg = "style='background-image:url(" . $article_url . ");'";
          ?>
          <p class="p-container__date"><?php the_time('Y.m.d'); ?></p>
          <h1 class="p-container__postTitle"><?php the_title(); ?></h1>
          <p class="p-pickup__image__sumbnails" <?php echo $article_bg; ?>></p>
          <div class="p-toc__tocWrap"></div>
          <div class="p-container__discription"><?php the_content(); ?></div>
        </a>
        <div>
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- Vastworld.org -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9103834502093898" data-ad-slot="7710276318" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>
      </div>
    </div>
    <?php endwhile; endif; ?>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>
</main>