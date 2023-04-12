<?php
/**
 * header.php
 */
global $post;
$pid = "";
if ( isset( $post ) ) $pid = $post->ID;
?><!DOCTYPE html>
<html lang="ja"
      class="<?php echo getPageLayout( $pid ); ?>"<?php if ( the_keni( 'gp_view' ) == "y" ) { ?> itemscope itemtype="http://schema.org/<?php echo getMicroCodeType(); ?>"<?php } ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

    <title><?php title_keni(); ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if ( the_keni( 'mobile_layout' ) == "y" ) { ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><?php } ?>

	<?php if ( ! the_keni( 'view_meta' ) ) { ?>
		<?php if ( the_keni( 'view_meta_keyword' ) && the_keni( 'view_meta_keyword' ) == "y" ) { ?>
            <meta name="keywords" content="<?php keyword_keni(); ?>">
		<?php } ?>
		<?php if ( the_keni( 'view_meta_description' ) && the_keni( 'view_meta_description' ) == "y" ) { ?>
            <meta name="description" content="<?php description_keni(); ?>">
		<?php }
	} elseif ( the_keni( 'view_meta' ) == "y" ) { ?>
        <meta name="keywords" content="<?php keyword_keni(); ?>">
        <meta name="description" content="<?php description_keni(); ?>">
	<?php }
	wp_enqueue_script( 'jquery' );
	if ( get_option( 'blog_public' ) != false ) {
		echo getIndexFollow();
	}
	canonical_keni();
	pageRelNext();

    wp_deregister_script('jquery');
	wp_head();

	facebook_keni();
	tw_cards_keni();
	microdata_keni();

	if ( function_exists( "get_site_icon_url" ) && get_site_icon_url() == "" ) { ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
        <link rel="apple-touch-icon-precomposed"
              href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<?php } ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
	<?php echo do_shortcode( the_keni( 'meta_text' ) ) . "\n";
	if ( is_single() || is_page() ) {
		echo get_post_meta( $pid, 'page_tags', true ) . "\n";
	}
    ?>
    
    <!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/themify-icons.css">
	<!-- Bootstrap  -->
	<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css"> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

	<!-- Modernizr JS -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
    
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->

    <!-- フォント -->
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
</head>
<?php
$gnav = ( ( get_globalmenu_keni( 'top_menu' ) == "" ) || ( is_singular() && get_post_meta( $pid, 'menu_view', true ) == "n" ) ) ? "no-gn" : "";    // メニューを表示しない場合は、classにno-gnを設定する
// ランディングページで画像をフルサイズで表示する
if ( is_singular( LP_DIR ) && get_post_meta( $pid, 'fullscreen_view', true ) == "y" ) {
$gnav .= ( $gnav != "" ) ? " lp" : "lp"; ?>
<body <?php body_class( $gnav ); ?>>
<?php echo do_shortcode( the_keni( 'body_text' ) ) . "\n"; ?>

<!--▼container-->
<div class="container">
    <header id="top" class="site-header full-screen"<?php if ( get_post_meta( $pid, 'header_image', true ) != "" ) { ?> style="background-image: url(<?php echo get_post_meta( $pid, 'header_image', true ); ?>)"<?php } ?>>
        <div class="site-header-in">
            <div class="site-header-conts">
                <h1 class="site-title"><?php echo ( get_post_meta( $pid, 'page_h1', true ) ) ? esc_html( get_post_meta( $pid, 'page_h1', true ) ) : get_h1_keni(); ?></h1>
				<?php echo get_post_meta( $pid, 'catch_text', true ) ? "<p class=\"lp-catch\">" . esc_html( get_post_meta( $pid, 'catch_text', true ) ) . "</p>" : ""; ?>
                <p><a href="#main"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-arw-full-screen.png" alt="メインへ" width="48" height="48"></a></p>
            </div>
        </div>
    </header>
	<?php
	if ( strpos( $gnav, "no-gn" ) === false ) { ?>
        <!--▼グローバルナビ-->
        <nav class="global-nav">
            <div class="global-nav-in">
                <div class="global-nav-panel"><span class="btn-global-nav icon-gn-menu">メニュー</span></div>
                <ul id="menu">
					<?php echo get_globalmenu_keni( 'top_menu' ); ?>
                </ul>
            </div>
        </nav>
        <!--▲グローバルナビ-->
	<?php }

// それ以外の場合
} else { ?>
    
<body <?php body_class( $gnav ); ?>>
<?php echo do_shortcode( the_keni( 'body_text' ) ) . "\n"; ?>

<!-- <div id="header_area" class="clearfix">
    <div id="header_innner" class="clearfix">
    <div class="top_bar">
      <div class="h1_item">
        <p class="block-pc">
          エステ業務用・イルチ
        </p>
      </div>
      <div class="logo_item">
        <h2 id="logo">
          <a href="#"
            ><img
              src="https://ilcsi.co.jp/wordpress/wp-content/themes/keni71_wp_corp_blue_201807081220/images/logo-pro.png"
              alt="ドクターイルチコスメティックス・ジャパン株式会社"
          /></a>
        </h2>
      </div>
      <div class="icon_group">
        <div>
          <img
            src="https://www.fruitsroots.com/wp-content/themes/frwebwp/img/common/icon02.png"
            alt=""
          />
        </div>
      </div>
    </div>

        <div id="gNavi" class="block-pc">
            <dl class="clearfix">
                <dd id="gNavipc" class="gtco-nav">
                    <ul>
                        <li class="has-dropdown"><a href="brandstory">イルチとは？</a>
                            <ul class="dropdown" style="display:none">
                                <li><a href="antiilcsi">イルチおばさんについて</a></li>
                                <li><a href="https://ilcsi.co.jp/app">世界的な評価</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="services.html">製品について</a>
                            <ul class="dropdown" style="display: none;">
                                <li><a href="https://ilcsi.co.jp/char">製品の特徴</a></li>
                                <li><a href="https://ilcsi.co.jp/archives/17">植物由来の効果について</a></li>
                                <li><a href="https://ilcsi.co.jp/archives/6">最も大切な「洗顔」</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="#">イルチのコスメ</a>
                            <ul class="dropdown" style="display: none;">
                                <li><a href="https://ilcsi.co.jp/ilcsiitem">商品一覧</a></li>
                                <li><a href="https://ilcsi.co.jp/howto">コスメの使用方法</a></li>
                                <li><a href="https://ilcsi.co.jp/ilcsiitem/blacksorp">洗顔料ブラックソープ</a></li>
                                <li><a href="https://ilcsi.co.jp/ilcsiitem/rose">美容水液ロージイ</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="#">お客様の声</a>
                            <ul class="dropdown" style="display: none;">
                                <li><a href="https://ilcsi.co.jp/archives/321">実際に使用した感想</a></li>
                                <li><a href="https://ilcsi.co.jp/archives/71">アンケート調査結果</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown"><a href="#">お客様の声</a>
                            <ul class="dropdown" style="display: none;">
                                <li><a href="https://ilcsi.co.jp/archives/321">実際に使用した感想</a></li>
                                <li><a href="https://ilcsi.co.jp/archives/71">アンケート調査結果</a></li>
                            </ul>
                        </li>
					    <li class="has-dropdown"><a href="#">お客様の声</a>
                            <ul class="dropdown" style="display: none;">
                                <li><a href="https://ilcsi.co.jp/archives/321">実際に使用した感想</a></li>
                                <li><a href="https://ilcsi.co.jp/archives/71">アンケート調査結果</a></li>
                            </ul>
                        </li>
						</dd>
                <dd id="gNavimb">
                    <ul>
                        <li><a href="about.html">ブランド紹介</a></li>
                        <li><a href="services.html">製品について</a></li>
                        <li><a href="#">イルチのコスメ</a></li>
                        <li><a href="#">お客様の声</a></a></li>
                        <li><a href="https://ilcsi.co.jp/pressrelease">メディア掲載</a></li>
                        <li><a href="https://salon.ilcsi.co.jp/">卸ショップ</a></li>
                    </ul>
                </dd>
            </dl>
        </div>

        <div class="hana_drawer_menu block-sp">
            <div class="hana_drawer_bg" style="display: none;"></div>
            <button type="button" class="hana_drawer_button">
                <span class="hana_drawer_bar hana_drawer_bar1"></span>
                <span class="hana_drawer_bar hana_drawer_bar2"></span>
                <span class="hana_drawer_bar hana_drawer_bar3"></span>
                <span class="hana_drawer_menu_text hana_drawer_text">MENU</span>
                <span class="hana_drawer_close hana_drawer_text">CLOSE</span>
            </button>
            <nav class="hana_drawer_nav_wrapper">
                <ul class="hana_drawer_nav">
                    <li class="drawer-bold"><a href="about.html">イルチとは？<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/irusi">イルチおばさんについて<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/app">世界的な評価<i class="text-banner__link-arrow"></i></a></li>
                       <li class="drawer-bold"><a href="services.html">製品について<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/char">製品の特徴<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/archives/17">植物由来の効果について<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/archives/6">最も大切な「洗顔」<i class="text-banner__link-arrow"></i></a></li>
                       <li class="drawer-bold"><a href="#">イルチのコスメ<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/ilcsiitem">商品一覧<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/howto">コスメの使用方法<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/ilcsiitem/blacksorp">洗顔料ブラックソープ<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/ilcsiitem/rose">美容水液ロージイ<i class="text-banner__link-arrow"></i></a></li>
                       <li class="drawer-bold"><a href="#">お客様の声<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/archives/321">実際に使用した感想<i class="text-banner__link-arrow"></i></a></li>
                        <li><a href="https://ilcsi.co.jp/archives/71">アンケート調査結果<i class="text-banner__link-arrow"></i></a></li>
                    <li><a href="https://ilcsi.co.jp/pressrelease">報道発表<i class="text-banner__link-arrow"></i></a></li>
                                     <li class="drawer-bold"><a href="https://ilcsi.co.jp/company">会社概要<i class="text-banner__link-arrow"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div> -->
<div class="top_bar">
    <div class="h1_item">
    <p class="block-pc">
        エステ業務用・イルチ
    </p>
    </div>
    <div class="logo_item">
    <h2 id="logo">
        <a href="#"
        ><img
            src="https://ilcsi.co.jp/wordpress/wp-content/themes/keni71_wp_corp_blue_201807081220/images/logo-pro.png"
            alt="ドクターイルチコスメティックス・ジャパン株式会社"
        /></a>
    </h2>
    </div>
    <div class="icon_group">
    <div>
        <img
        src="https://www.fruitsroots.com/wp-content/themes/frwebwp/img/common/icon02.png"
        alt=""
        />
    </div>
    </div>
</div>
<div class="nav-container">
<nav class="navbar navbar-expand-lg navbar-light nav-color">
    <div class="container-fluid">
    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-customize" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-customize">
            <li class="nav-item">
                <?php 
                    $menu_text1 = get_theme_mod('menu_text1', 'MENU1');
                    $menu_link1 = get_theme_mod('menu_link1', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link1; ?>"
                id="first_menu"
                >
                <?php echo $menu_text1;?>
                </a>
            </li>
            <li class="nav-item">
                <?php 
                    $menu_text2 = get_theme_mod('menu_text2', 'MENU2');
                    $menu_link2 = get_theme_mod('menu_link2', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link2; ?>"
                id="first_menu"
                >
                <?php echo $menu_text2;?>
                </a>
            </li>
            <li class="nav-item">
                <?php 
                    $menu_text3 = get_theme_mod('menu_text3', 'MENU3');
                    $menu_link3 = get_theme_mod('menu_link3', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link3; ?>"
                id="first_menu"
                >
                <?php echo $menu_text3;?>
                </a>
            </li>
            <li class="nav-item">
                <?php 
                    $menu_text4 = get_theme_mod('menu_text4', 'MENU4');
                    $menu_link4 = get_theme_mod('menu_link4', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link4; ?>"
                id="first_menu"
                >
                <?php echo $menu_text4;?>
                </a>
            </li>
            <li class="nav-item">
                <?php 
                    $menu_text5 = get_theme_mod('menu_text5', 'MENU5');
                    $menu_link5 = get_theme_mod('menu_link5', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link5; ?>"
                id="first_menu"
                >
                <?php echo $menu_text5;?>
                </a>
            </li>
            <li class="nav-item">
                <?php 
                    $menu_text6 = get_theme_mod('menu_text6', 'MENU6');
                    $menu_link6 = get_theme_mod('menu_link6', '#');
                ?>
                <a
                class="nav-link"
                href="<?php echo $menu_link6; ?>"
                id="first_menu"
                >
                <?php echo $menu_text6;?>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
</div>

<!--▼container-->
<div class="container">
    <header id="top" class="site-header <?php if ( is_singular( LP_DIR ) ) { echo 'normal-screen'; } ?>">
        <?php if ( $gnav == "" ) { ?>
        <?php }
        if ( is_front_page() && ( ! isset( $_GET['post_type'] ) || $_GET['post_type'] == "" ) ) {
            $mainimage = the_keni( "mainimage" );
            if ( ! empty( $mainimage ) ) {
        ?>            
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php if (get_the_carousel_img_url_1()) { ?>
                                        <img src="<?php echo get_the_carousel_img_url_1(); ?>" class="d-block w-100" alt="" />
                                    <?php } else { ?>
                                        <img src="https://salon.ilcsi-beauty.com/wp-content/uploads/2022/12/bnr01-2.jpg" alt="default_carousel" />
                                    <?php } ?>
                                </div>
                                <?php if (get_the_carousel_img_url_2()) { ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo get_the_carousel_img_url_2(); ?>" class="d-block w-100" alt="" />
                                    </div>
                                <?php } ?>
                                <?php if (get_the_carousel_img_url_3()) { ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo get_the_carousel_img_url_3(); ?>" class="d-block w-100" alt="" />
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <?php } ?>
    </header>
    <!--▲サイトヘッダー-->