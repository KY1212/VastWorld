<?php get_header(); ?>
<main class="l-main">
  <div class="p-pickup">
    <ul class="p-pickup__inner">
      <?php
			$the_query = sub_loop(3);
			$counter = '';
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post();
					++$counter;
			?>
      <?php
				wp_nav_menu(array(
					'theme_location' => 'pickup',
					'walker' => new Walker_Nav_Menu_Custom,
					'container' => '',
					'menu_class' => '',
					'items_wrap' => '<ul class="archiveWrap">%3$s</ul>'
				));
			?>
      <?php endwhile; endif; wp_reset_postdata(); ?>

    </ul>
  </div>

  <div class="p-container__inner">
    <div class="p-container">
      <div class="p-container__postWrap">
        <?php
						$the_query = sub_loop(4,$paged);
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
            <div class="p-container__discription">
              <?php
									if(mb_strlen($post->post_content, 'UTF-8')>50){
										$content= mb_substr($post->post_content, 0, 50, 'UTF-8');
										echo $content.'…';
									}else{
										echo $post->post_content;
									}
								?>
            </div>
          </a>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="pagination">
        <a href="<?php echo home_url(); ?>/article" class="btn">
          Read More
        </a>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</main>
<?php get_footer(); ?>