<aside class="l-sidebar">
	<div class="p-sidebar__inner">
		<section class="p-sidebar__profile">
			<div class="c-sidebar__profileImg">
				<img src="" alt="" />
			</div>
			<p class="c-sidebar__name">UserName</p>
			<p class="c-sidebar__discription">
				hello!!Wellcometo my theme!!
			</p>
		</section>
		<section class="p-sidebar__pickup">
			<div class="p-pickup__postWrap">
        <h3 class="c-heading">おすすめ記事</h3>
        <?php
          $the_query = sub_loop(3);
          $counter = '';
          if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
            ++$counter;
        ?>
        <div class="p-pickup__post">
          <?php
            $article_url = wp_get_attachment_url(get_post_thumbnail_id());
            $article_bg = "style='background-image:url(".$article_url.");'";
          ?>
          <a href="<?php the_permalink(); ?>">
            <p class="c-pickup__image__sumbnails1" <?php echo $article_bg; ?>></p>
            <p class="c-pickup__discription"><?php echo mb_substr( $post->post_title, 0, 20) . '...'; ?></p>
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
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
				<li class="c-sidebar__month">
					<a href=""> 2021年1月 (31) </a>
				</li>
			</ul>
		</section>
	</div>
</aside>
