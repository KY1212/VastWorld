<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"rel="stylesheet"/>
		<title><?php bloginfo('name'); wp_title('|',true,'left'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<header class="l-header">
			<div class="p-header__inner">
				<div class="p-header__title">
					<a href="<?php echo home_url(); ?>">
						<h1 class="p-header__logo">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/header2.png" alt="Vastworld" />
						</h1>
					</a>
				</div>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'global',
							'container_class' => 'p-header__nav',
              'menu_class' => 'p-header__list',
            ));
          ?>

						<!-- <ul class="p-header__spList">
							<li class="p-header__item"><a>MENU</a></li>
							<div class="hamburger">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</ul> -->
					<!-- <ul class="p-header__list">
						<li class="p-header__item">
							<a href="./category.html">Programing</a>
						</li>
						<li class="p-header__item"><a href="./category.html">Diary</a></li>
						<li class="p-header__item">
							<a href="./category.html">Thought</a>
						</li>
						<li class="p-header__item"><a href="">Contact</a></li>
					</ul> -->

				<!-- </nav> -->
				<div class="menu">
					<ul>
						<li class="p-header__item"><a href="">Prrograming</a></li>
						<li class="p-header__item"><a href="">Diary</a></li>
						<li class="p-header__item"><a href="">Thought</a></li>
						<li class="p-header__item"><a href="">Contact</a></li>
					</ul>
				</div>
			</div>
		</header>
