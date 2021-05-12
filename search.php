<?php get_header(); ?>
<main class="l-main">
  <div class="p-container__inner">
    <div class="p-container">
      <p class="headingTop">
        <?php
          global $wp_query;
          $total_results = $wp_query->found_posts;
          $search_query = get_search_query();
        ?>
        <?php echo $search_query; ?>の検索結果<span>（<?php echo $total_results; ?>件）</span>
			</p>
      <div class="p-container__postWrap margin">
        <?php if( $total_results >0 ): ?>
        <?php
          if (have_posts()):
          while (have_posts()):the_post();
        ?>
        <div class="p-container__post">
          <a href="<?php the_permalink(); ?>">
            <?php
              $article_url = wp_get_attachment_url(get_post_thumbnail_id());
              $article_bg = "style='background-image:url(" . $article_url . ");'";
            ?>
            <p class="p-container__date"><?php the_time('Y.m.d'); ?></p>
            <p class="p-container__postTitle"><?php the_title(); ?></p>
            <p class="p-pickup__image__sumbnails" <?php echo $article_bg; ?>></p>
            <p class="p-container__discription">
              <?php
                if(mb_strlen($post->post_title, 'UTF-8')>36){
                  $title= mb_substr($post->post_title, 0, 36, 'UTF-8');
                  echo $title.'…';
                }else{
                  echo $post->post_title;
                }
              ?>
            </p>
          </a>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <?php else: ?>
        <div class="p-container__post--none">
          "<?php echo $search_query; ?>" に一致する情報は見つかりませんでした。
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>