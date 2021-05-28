<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700;900&display=swap" rel="stylesheet">
  <title>
    <?php bloginfo('name'); wp_title('|',true,'left'); ?>
</title>
  <?php wp_head(); ?>
</head>
<body>
  <ul class="p-header__spList">
    <?php
			wp_nav_menu(array(
			'theme_location' => 'global',
				'menu_class' => 'p-header__list',
				'container' => false
			));
		?>
  </ul>
  <div class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <header class="l-header">
    <div class="p-header__inner">
      <div class="p-header__title">
        <a href="<?php echo home_url(); ?>">
          <h1 class="p-header__logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/header10.png" alt="title画像挿入" />
						</h1>
          <p>テーマ改修中につきレイアウト崩れを起こしています。</p>
          <!-- <p>記事が見にくくてすみません。。<br>もう少しで終わりますので少々お待ちください。。</p> -->
        </a>
      </div>
      <nav class="p-header__nav">
        <ul class="p-header__list">
          <?php
							wp_nav_menu(array(
								'theme_location' => 'global',
								'menu_class' => 'p-header__list',
								'container' => false
							));
						?>
        </ul>
        <div class="p-header__spTitle">
          <a href="<?php echo home_url(); ?>">
            <h1>
              Vast World
            </h1>
          </a>
        </div>

      </nav>
    </div>
  </header>