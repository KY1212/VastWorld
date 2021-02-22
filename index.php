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
							<p class="c-container__date"><?php the_time('Y.m.d'); ?></p>
							<p class="c-container__postTitle"><?php the_title(); ?></p>
							<p class="c-pickup__image__sumbnails3" <?php echo $article_bg; ?>></p>
							<p class="c-container__discription">
								<?php
									if(mb_strlen($post->post_content, 'UTF-8')>36){
										$content= mb_substr($post->post_content, 0, 36, 'UTF-8');
										echo $content.'…';
									}else{
										echo $post->post_content;
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
</main>
	<?php get_footer(); ?>
