<?php
/*
Template Name: article
*/
?>
<?php get_header(); ?>
<main class="l-main">
  <div class="p-container__inner">
    <div class="p-container">
      <p class="headingTop">
				記事一覧
			</p>
      <div class="p-container__postWrap margin">
        <?php
      $the_query = sub_loop(8,$paged);
      $counter = '';
      if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
        ++$counter;
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
      </div>
      <div class="pagination">
        <?php pagination($the_query->max_num_pages);?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
  </div>
</main>
<?php get_footer(); ?>