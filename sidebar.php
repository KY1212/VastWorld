<aside class="l-sidebar">
	<div class="p-sidebar__inner">
	<?php dynamic_sidebar('main-sidebar'); ?><!-- サイドバーを出力 -->

		<section class="p-sidebar__profile">
			<div class="p-sidebar__profileImg">
				<?php echo get_avatar( get_the_author_id() ); ?>
			</div>
			<p class="p-sidebar__name">
				<?php the_author_nickname(); ?>
			</p>
			<p class="p-sidebar__discription">
				<?php the_author_meta('user_description'); ?>
			</p>
		</section>
		<section class="p-sidebar__pickup">
			<div class="p-pickup__postWrap">
        <h3 class="c-heading">こんな記事もあります</h3>
        <?php
					query_posts(array('orderby' => 'rand', 'showposts' => 3));
					if (have_posts()) :
					while (have_posts()) : the_post();
        ?>
        <div class="p-pickup__post">
          <?php
            $article_url = wp_get_attachment_url(get_post_thumbnail_id());
            $article_bg = "style='background-image:url(".$article_url.");'";
          ?>
          <a href="<?php the_permalink(); ?>">
            <p class="p-pickup__image__sumbnails1" <?php echo $article_bg; ?>></p>
            <p class="p-pickup__discription"><?php echo mb_substr( $post->post_title, 0, 20) . '...'; ?></p>
          </a>
        </div>
        <?php endwhile; endif;
          wp_reset_postdata();
        ?>
      </div>
    </section>
		<section class="p-sidebar__archive">
			<h3 class="c-heading">アーカイブ</h3>
			<ul class="p-sidebar__archiveList">
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="p-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
			</ul>
		</section>
	</div>
</aside>
