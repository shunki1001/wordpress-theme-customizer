<?php get_header(); ?>

</div>
<!--▲container-->

<div id="front-page">
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-6">
					<a href="https://salon.ilcsi.co.jp/" target="_blank"><img src="<?php print get_template_directory_uri(); ?>/images/banner_member.jpg" alt="取扱い店用ページ"></a>
				</div>
				<div class="col-sm-6">
					<a href="https://salon.ilcsi.co.jp/"><img src="<?php print get_template_directory_uri(); ?>/images/banner_salon.jpg" alt="イルチのサロン"></a>
				</div>
			</div>
			<!-- news -->
			<div class="row" id="news-section">
				<h3 class="h3-title">News</h3>
				<h4 class="h4-subtitle">ニュース</h4>
				<?php
					$paged = (int) get_query_var('paged');
					$args = array(
						'posts_per_page' => 4,
						'paged' => $paged,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish'
					);
					$the_query = new WP_Query($args);
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<div class="col-4 col-customize"><?php echo get_the_date(); ?></div>
				<div class="col-8"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
				<?php endwhile; endif; ?>
			</div>
			<!-- menu -->
			<div class="row" id="menu-list">
				<h3 class="h3-title">Menu</h3>
				<h4 class="h4-subtitle">メニュー</h4>
				<div class="col-sm-4 col-6">
					<div class="menu-item">
					<?php 
						$menu_text1 = get_theme_mod('menu_text1', 'MENU1');
						$menu_link1 = get_theme_mod('menu_link1', '#');
					?>
						<a href="<?php echo $menu_link1; ?>">
							<?php if (get_the_logo_img_url_1()) : ?>
								<img src="<?php echo get_the_logo_img_url_1(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu1" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text1;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
				<div class="menu-item">
					<?php 
						$menu_text2 = get_theme_mod('menu_text2', 'MENU2');
						$menu_link2 = get_theme_mod('menu_link2', '#');
					?>
						<a href="<?php echo $menu_link2; ?>">
							<?php if (get_the_logo_img_url_2()) : ?>
								<img src="<?php echo get_the_logo_img_url_2(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu2" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text2;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
				<div class="menu-item">
					<?php 
						$menu_text3 = get_theme_mod('menu_text3', 'MENU3');
						$menu_link3 = get_theme_mod('menu_link3', '#');
					?>
						<a href="<?php echo $menu_link3; ?>">
							<?php if (get_the_logo_img_url_3()) : ?>
								<img src="<?php echo get_the_logo_img_url_3(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu3" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text3;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
				<div class="menu-item">
					<?php 
						$menu_text4 = get_theme_mod('menu_text4', 'MENU4');
						$menu_link4 = get_theme_mod('menu_link4', '#');
					?>
						<a href="<?php echo $menu_link4; ?>">
							<?php if (get_the_logo_img_url_4()) : ?>
								<img src="<?php echo get_the_logo_img_url_4(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu4" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text4;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
				<div class="menu-item">
					<?php 
						$menu_text5 = get_theme_mod('menu_text5', 'MENU5');
						$menu_link5 = get_theme_mod('menu_link5', '#');
					?>
						<a href="<?php echo $menu_link5; ?>">
							<?php if (get_the_logo_img_url_5()) : ?>
								<img src="<?php echo get_the_logo_img_url_5(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu5" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text5;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
				<div class="menu-item">
					<?php 
						$menu_text6 = get_theme_mod('menu_text6', 'MENU6');
						$menu_link6 = get_theme_mod('menu_link6', '#');
					?>
						<a href="<?php echo $menu_link6; ?>">
							<?php if (get_the_logo_img_url_6()) : ?>
								<img src="<?php echo get_the_logo_img_url_6(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="menu6" />' ?>
							<?php endif ?>	
							<p><?php echo $menu_text6;?></p>
						</a>
					</div>
				</div>
			</div>
			<!-- products -->
			<div class="row" id="products-list">
				<h3 class="h3-title">Products</h3>
				<h4 class="h4-subtitle">プロダクト</h4>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text1 = get_theme_mod('product_text1', 'クレンジング、洗顔');
						$product_link1 = get_theme_mod('product_link1', '#');
					?>
						<a href="<?php echo $product_link1; ?>">
							<?php if (get_the_product_img_url_1()) : ?>
								<img src="<?php echo get_the_product_img_url_1(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text1;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text2 = get_theme_mod('product_text2', '角質除去、ピーリング');
						$product_link2 = get_theme_mod('product_link2', '#');
					?>
						<a href="<?php echo $product_link2; ?>">
							<?php if (get_the_product_img_url_2()) : ?>
								<img src="<?php echo get_the_product_img_url_2(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text2;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text3 = get_theme_mod('product_text3', 'マッサージ');
						$product_link3 = get_theme_mod('product_link3', '#');
					?>
						<a href="<?php echo $product_link3; ?>">
							<?php if (get_the_product_img_url_3()) : ?>
								<img src="<?php echo get_the_product_img_url_3(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text3;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text4 = get_theme_mod('product_text4', '美容パック');
						$product_link4 = get_theme_mod('product_link4', '#');
					?>
						<a href="<?php echo $product_link4; ?>">
							<?php if (get_the_product_img_url_4()) : ?>
								<img src="<?php echo get_the_product_img_url_4(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text4;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text5 = get_theme_mod('product_text5', '化粧水、美容液');
						$product_link5 = get_theme_mod('product_link5', '#');
					?>
						<a href="<?php echo $product_link5; ?>">
							<?php if (get_the_product_img_url_5()) : ?>
								<img src="<?php echo get_the_product_img_url_5(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text5;?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-6">
					<div class="product-item">
					<?php 
						$product_text6 = get_theme_mod('product_text6', 'クリーム');
						$product_link6 = get_theme_mod('product_link6', '#');
					?>
						<a href="<?php echo $product_link6; ?>">
							<?php if (get_the_product_img_url_6()) : ?>
								<img src="<?php echo get_the_product_img_url_6(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/photo-dummy.png" alt="product" />' ?>
							<?php endif ?>	
							<p><?php echo $product_text6;?></p>
						</a>
					</div>
				</div>
			</div>
			<div class="row" id="popular-post-list">
				<h3 class="h3-title">Popular Post</h3>
				<h4 class="h4-subtitle">人気のある記事</h4>
			</div>
			<div class="row" id="banner-list">
				<h3 class="h3-title">Related Link</h3>
				<h4 class="h4-subtitle">関連のあるページ</h4>
				<div class="col-12">
					<div class="banner-item">
						<a href="<?php echo $banner_link1; ?>">
							<?php if (get_the_banner_img_url_1()) : ?>
								<img src="<?php echo get_the_banner_img_url_1(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/bnr-sample.jpg" alt="banner" />' ?>
							<?php endif ?>
						</a>
					</div>
				</div>
				<div class="col-12">
					<div class="banner-item">
					<a href="<?php echo $banner_link2; ?>">
							<?php if (get_the_banner_img_url_2()) : ?>
								<img src="<?php echo get_the_banner_img_url_2(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/bnr-sample.jpg" alt="banner" />' ?>
							<?php endif ?>
						</a>
					</div>
				</div>
				<div class="col-12">
					<div class="banner-item">
					<a href="<?php echo $banner_link3; ?>">
							<?php if (get_the_banner_img_url_3()) : ?>
								<img src="<?php echo get_the_banner_img_url_3(); ?>" alt="" />
							<?php else : ?>
								<?php echo '<img src="'.get_template_directory_uri().'/images/bnr-sample.jpg" alt="banner" />' ?>
							<?php endif ?>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="gtco-section">
	<div class="gtco-container">
		<header class="main-title">
			<h2>ドクターイルチコスメティックス・ジャパン株式会社について</h2>
			<p>結果を出せるオーガニック化粧品</p>
			<div class="tri-border"><span></span></div>
		</header>
		<div class="gtco-container space-tb-container">
			<div class="row">
				<div class="col-md-6">
					<div class="dl-box">
						<dl>
							<dt><span>会社名</span></dt>
							<dd><span>ドクターイルチコスメティックス・ジャパン株式会社</span>
							</dd>
						</dl>
						<dl>
							<dt><span>所在地</span></dt>
							<dd><span>東京都品川区上大崎2-24-18</span>
							</dd>
						</dl>
						<dl>
							<dt><span>事業内容</span></dt>
							<dd><span>ハンガリー国イルチ化粧品の販売(正規販売店) エステティックサロン向けのマーケティング指導 その他</span>
							</dd>
						</dl>
					</div>
				</div>
				<div class="col-md-6">
					<div class="map-box">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3242.703570174845!2d139.71424059999998!3d35.6350336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b1904c43011%3A0xcbc9d89ca5f79bfa!2z44CSMTQxLTAwMjEg5p2x5Lqs6YO95ZOB5bed5Yy65LiK5aSn5bSO77yS5LiB55uu77yS77yU4oiS77yR77yY!5e0!3m2!1sja!2sjp!4v1649416850041!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

<?php get_footer(); ?>