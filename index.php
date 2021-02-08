<?php get_header(); ?>
<main class="l-main">
	<!-- pickup -->
	<div class="p-pickup">
		<div class="p-inner">
			<div class="p-pickup__post">
				<a href="./single.html">
					<p class="c-pickup__image__sumbnails1"></p>
					<p class="c-pickup__discription">ピックアップされた投稿記事</p>
				</a>
			</div>
			<div class="p-pickup__post">
				<a href="./single.html">
					<p class="c-pickup__image__sumbnails2"></p>
					<p class="c-pickup__discription">ピックアップされた投稿記事</p>
				</a>
			</div>
			<div class="p-pickup__post">
				<a href="./single.html">
					<p class="c-pickup__image__sumbnails3"></p>
					<p class="c-pickup__discription">ピックアップされた投稿記事</p>
				</a>
			</div>
		</div>
	</div>
	<div class="l-container">
		<div class="p-inner">
			<div class="p-container__postWrap">
				<?php
					$the_query = sub_loop(9,$paged);
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
						<p class="c-container__date"><?php the_time('Y.m.d'); ?></p>
						<p class="c-container__postTitle"><?php the_title(); ?></p>
						<p class="c-pickup__image__sumbnails3" <?php echo $article_bg; ?>></p>
						<p class="c-container__discription">
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
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
	<?php get_footer(); ?>
