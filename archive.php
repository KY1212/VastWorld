
<?php /* postSingle：START */ ?>
<?php /* 注）表示投稿数はfunctions.phpで設定 */ ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>

            <?php /* ここにやりたいことを書く */ ?>

        <?php endwhile; ?>
    <?php else: ?>
        <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
<?php /* postSingle：END */ ?>
