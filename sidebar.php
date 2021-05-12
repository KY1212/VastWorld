<aside class="l-sidebar">
  <div class="p-sidebar__inner">
    <?php dynamic_sidebar('main-sidebar'); ?>
    <!-- サイドバーを出力 -->

    <section class="p-sidebar__search">
      <form class="p-search__container" role="search" method="get" action="#">
        <input type="text" value="" name="s" class="s" placeholder="Search" />
        <input type="submit" value="&#xf002;">
      </form>
    </section>

    <section class="p-sidebar__profile">
      <div class="p-sidebar__profileImg">
        <?php echo get_avatar( get_the_author_id() ); ?>
        <?php
					if( !have_posts() ) { //投稿がない場合以下を実行
					}
				?>
      </div>
      <p class="p-sidebar__name">
				<?php the_author_nickname(); ?>
			</p>
      <p class="p-sidebar__discription">
				<?php the_author_meta('user_description'); ?>
			</p>
    </section>
    <section class="p-sidebar__pickup">
      <div class="p-sidebar__postWrap">
        <h3 class="c-heading">こんな記事もあります</h3>
        <?php
					query_posts(array('orderby' => 'rand', 'showposts' => 3));
					if (have_posts()) :
					while (have_posts()) : the_post();
        ?>
        <div class="p-sidebar__post">
          <?php
            $article_url = wp_get_attachment_url(get_post_thumbnail_id());
            $article_bg = "style='background-image:url(".$article_url.");'";
          ?>
          <a href="<?php the_permalink(); ?>">
            <p class="p-sidebar__image__sumbnails" <?php echo $article_bg; ?>></p>
            <p class="p-sidebar__discription"><?php the_title(); ?></p>
          </a>
        </div>
        <?php endwhile; endif;
          wp_reset_postdata();
        ?>
      </div>
    </section>
    <section class="p-sidebar__archive">
      <h3 class="c-heading">過去の投稿</h3>
      <?php
			$year_prev = null;
			$postType = get_post_type( );
			$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
				YEAR( post_date ) AS year,
				COUNT( id ) as post_count FROM $wpdb->posts
				WHERE post_status = 'publish' and post_date <= now( )
				and post_type = '$postType'
				GROUP BY month , year
				ORDER BY post_date DESC");
			foreach($months as $month):
				$year_current = $month->year;
			if ($year_current != $year_prev) { ?>
      <?php if($year_prev != null): ?>
      </ul>
      <?php endif; ?>
      <ul class="p-sidebar__archiveList">
        <?php } ?>
        <li class="p-sidebar__month">
          <a href="<?php echo esc_url(home_url()); ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
            <?php echo $month->year; ?>年<?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月 (<?php echo $month->post_count; ?>)
          </a>
        </li>
        <?php $year_prev = $year_current; ?>
        <?php endforeach; ?>
      </ul>
  </div>
  </section>
</aside>