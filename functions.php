<?php
/*----------------------------------------
	賢威7.1
	賢威テンプレート　functions.php

	株式会社 ウェブライダー
----------------------------------------*/

/*****
 * func_keni.php => 賢威の処理プロセスを記載したもの
 * func_proc.php => 賢威の処理を関数化したもの
 * 
 * func_keni.php、func_proc.phpは基本的に変更する必要はありません。
 * 賢威独自の処理をカスタムする場合のみfunc_proc.phpの関数を子テーマでオーバーライドしてください。
 */
include_once( 'func_keni.php' );
include_once( 'func_proc.php' );
/******************************************************************************/

if (function_exists('register_sidebar')){
    register_sidebar(array(
        'before_title' => '<h2><a href="#">',
        'after_title' => '</h2></a>',
        'name' => 'トップメイン',
        'id' => 'top_main_widget'
    ));
}

if (function_exists('register_sidebar')){
    register_sidebar(array(
        'before_title' => '<h2><a href="#">',
        'after_title' => '</h2></a>',
        'name' => 'フッターリンク',
        'id' => 'top_main_widget'
    ));
}

function custom_single_popular_post( $content, $p, $instance ){
    $thumb_id = get_post_thumbnail_id( $post->ID );
    $img = wp_get_attachment_image_src( $thumb_id, 'full' );

    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $p->post_content, $matches);
    $first_img = $matches [1] [0];
 
    if(empty($first_img)){ //Defines a default image
        $first_img = "/wp-content/themes/keni71_wp_corp_blue_201807081220/images/noimage.gif";
    }
    
    $output = '<div class="item"><a href="' . get_the_permalink($p->id) . '" title="' . esc_attr($p->title) . '"><span class="img"><img src="' . $first_img . '" title="' . esc_attr($p->title) . '"></span><p class="title">' . $p->title . '</p></a></div>';
    return $output;
}
add_filter( 'wpp_post', 'custom_single_popular_post', 10, 3 );


/* テーマカスタマイザーを追加する
---------------------------------------------------------- */
add_action( 'customize_register', 'theme_customize' );
function theme_customize($wp_customize){
	//メニューの追加
	$wp_customize->add_section( 'menu-list', array(
		'title' => 'カスタムメニュー', //セクションのタイトル
		'priority' => 60, //セクションの位置
		'description' => '推奨サイズは640×480', //セクションの説明
	));

    //１つ目の画像追加
    $wp_customize->add_setting( 'menu_image1'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image1', array(
        'label' => 'メニュー画像1', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image1', //設定項目のID
        'description' => 'メニュー1の画像を設定してください。', //設定項目の説明
    )));
    //１つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text1',[
      'default' => 'MENU 1'
    ]);
    $wp_customize->add_control('menu_text1', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //１つ目のリンクを追加
    $wp_customize->add_setting('menu_link1',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link1', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);

    //２つ目の画像追加
    $wp_customize->add_setting( 'menu_image2'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image2', array(
        'label' => 'メニュー画像2', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image2', //設定項目のID
        'description' => 'メニュー2の画像を設定してください。', //設定項目の説明
    )));
    //２つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text2',[
      'default' => 'MENU 2'
    ]);
    $wp_customize->add_control('menu_text2', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //２つ目のリンクを追加
    $wp_customize->add_setting('menu_link2',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link2', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);

    //３つ目の画像追加
    $wp_customize->add_setting( 'menu_image3'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image3', array(
        'label' => 'メニュー画像3', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image3', //設定項目のID
        'description' => 'メニュー3の画像を設定してください。', //設定項目の説明
    )));
    //３つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text3',[
      'default' => 'MENU 3'
    ]);
    $wp_customize->add_control('menu_text3', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //３つ目のリンクを追加
    $wp_customize->add_setting('menu_link3',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link3', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);

    //４つ目の画像追加
    $wp_customize->add_setting( 'menu_image4'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image4', array(
        'label' => 'メニュー画像4', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image4', //設定項目のID
        'description' => 'メニュー4の画像を設定してください。', //設定項目の説明
    )));
    //４つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text4',[
      'default' => 'MENU 4'
    ]);
    $wp_customize->add_control('menu_text4', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //４つ目のリンクを追加
    $wp_customize->add_setting('menu_link4',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link4', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);

    //５つ目の画像追加
    $wp_customize->add_setting( 'menu_image5'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image5', array(
        'label' => 'メニュー画像5', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image5', //設定項目のID
        'description' => 'メニュー5の画像を設定してください。', //設定項目の説明
    )));
    //５つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text5',[
      'default' => 'MENU 5'
    ]);
    $wp_customize->add_control('menu_text5', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //５つ目のリンクを追加
    $wp_customize->add_setting('menu_link5',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link5', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);

    //６つ目の画像追加
    $wp_customize->add_setting( 'menu_image6'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_image6', array(
        'label' => 'メニュー画像6', //設定項目のタイトル
        'section' => 'menu-list', //セクションのID
        'settings' => 'menu_image6', //設定項目のID
        'description' => 'メニュー6の画像を設定してください。', //設定項目の説明
    )));
    //６つ目の画像のテキストを追加
    $wp_customize->add_setting('menu_text6',[
      'default' => 'MENU 6'
    ]);
    $wp_customize->add_control('menu_text6', [
      'label' => 'メニューの文字列',
      'section' => 'menu-list'
    ]);
    //６つ目のリンクを追加
    $wp_customize->add_setting('menu_link6',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('menu_link6', [
        'label' => 'メニューのリンク',
        'section' => 'menu-list'
    ]);



    //Productsの追加
	$wp_customize->add_section( 'product-list', array(
		'title' => 'カスタムプロダクト', //セクションのタイトル
		'priority' => 65, //セクションの位置
		'description' => '推奨サイズは640×480', //セクションの説明
	));

    //１つ目の画像追加
    $wp_customize->add_setting( 'product_image1'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image1', array(
        'label' => 'プロダクト画像1', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image1', //設定項目のID
        'description' => 'プロダクト1の画像を設定してください。', //設定項目の説明
    )));
    //１つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text1',[
      'default' => 'クレンジング、洗顔'
    ]);
    $wp_customize->add_control('product_text1', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //１つ目のリンクを追加
    $wp_customize->add_setting('product_link1',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link1', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //２つ目の画像追加
    $wp_customize->add_setting( 'product_image2'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image2', array(
        'label' => 'プロダクト画像2', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image2', //設定項目のID
        'description' => 'プロダクト2の画像を設定してください。', //設定項目の説明
    )));
    //２つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text2',[
      'default' => '角質除去、ピーリング'
    ]);
    $wp_customize->add_control('product_text2', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //２つ目のリンクを追加
    $wp_customize->add_setting('product_link2',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link2', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //３つ目の画像追加
    $wp_customize->add_setting( 'product_image3'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image3', array(
        'label' => 'プロダクト画像3', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image3', //設定項目のID
        'description' => 'プロダクト3の画像を設定してください。', //設定項目の説明
    )));
    //３つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text3',[
      'default' => 'マッサージ'
    ]);
    $wp_customize->add_control('product_text3', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //３つ目のリンクを追加
    $wp_customize->add_setting('product_link3',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link3', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //４つ目の画像追加
    $wp_customize->add_setting( 'product_image4'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image4', array(
        'label' => 'プロダクト画像4', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image4', //設定項目のID
        'description' => 'プロダクト4の画像を設定してください。', //設定項目の説明
    )));
    //４つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text4',[
      'default' => '美容パック'
    ]);
    $wp_customize->add_control('product_text4', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //４つ目のリンクを追加
    $wp_customize->add_setting('product_link4',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link4', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //５つ目の画像追加
    $wp_customize->add_setting( 'product_image5'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image5', array(
        'label' => 'プロダクト画像5', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image5', //設定項目のID
        'description' => 'プロダクト5の画像を設定してください。', //設定項目の説明
    )));
    //５つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text5',[
      'default' => '化粧水、美容液'
    ]);
    $wp_customize->add_control('product_text5', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //５つ目のリンクを追加
    $wp_customize->add_setting('product_link5',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link5', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //６つ目の画像追加
    $wp_customize->add_setting( 'product_image6'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_image6', array(
        'label' => 'プロダクト画像6', //設定項目のタイトル
        'section' => 'product-list', //セクションのID
        'settings' => 'product_image6', //設定項目のID
        'description' => 'プロダクト6の画像を設定してください。', //設定項目の説明
    )));
    //６つ目の画像のテキストを追加
    $wp_customize->add_setting('product_text6',[
      'default' => 'クリーム'
    ]);
    $wp_customize->add_control('product_text6', [
      'label' => 'プロダクトの文字列',
      'section' => 'product-list'
    ]);
    //６つ目のリンクを追加
    $wp_customize->add_setting('product_link6',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('product_link6', [
        'label' => 'プロダクトのリンク',
        'section' => 'product-list'
    ]);

    //バナーの追加
	$wp_customize->add_section( 'banner-list', array(
		'title' => 'カスタムバナー', //セクションのタイトル
		'priority' => 70, //セクションの位置
		'description' => '推奨サイズは1200×628', //セクションの説明
	));
    //１つ目の画像追加
    $wp_customize->add_setting( 'banner_image1'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image1', array(
        'label' => 'バナー画像1', //設定項目のタイトル
        'section' => 'banner-list', //セクションのID
        'settings' => 'banner_image1', //設定項目のID
        'description' => 'バナー1の画像を設定してください。', //設定項目の説明
    )));
    //１つ目のリンクを追加
    $wp_customize->add_setting('banner_link1',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('banner_link1', [
        'label' => 'バナーのリンク',
        'section' => 'banner-list'
    ]);
    //２つ目の画像追加
    $wp_customize->add_setting( 'banner_image2'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image2', array(
        'label' => 'バナー画像2', //設定項目のタイトル
        'section' => 'banner-list', //セクションのID
        'settings' => 'banner_image2', //設定項目のID
        'description' => 'バナー2の画像を設定してください。', //設定項目の説明
    )));
    //２つ目のリンクを追加
    $wp_customize->add_setting('banner_link2',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('banner_link2', [
        'label' => 'バナーのリンク',
        'section' => 'banner-list'
    ]);
    //３つ目の画像追加
    $wp_customize->add_setting( 'banner_image3'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image3', array(
        'label' => 'バナー画像3', //設定項目のタイトル
        'section' => 'banner-list', //セクションのID
        'settings' => 'banner_image3', //設定項目のID
        'description' => 'バナー3の画像を設定してください。', //設定項目の説明
    )));
    //３つ目のリンクを追加
    $wp_customize->add_setting('banner_link3',[
        'default' => 'https://ilcsi.co.jp'
    ]);
    $wp_customize->add_control('banner_link3', [
        'label' => 'バナーのリンク',
        'section' => 'banner-list'
    ]);


    // カルーセルの追加
	$wp_customize->add_section( 'carousel-list', array(
		'title' => 'カルーセル画像', //セクションのタイトル
		'priority' => 60, //セクションの位置
		'description' => '推奨サイズは1500×900', //セクションの説明
	));

    //１つ目の画像追加
    $wp_customize->add_setting( 'carousel_image1'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image1', array(
        'label' => 'カルーセル画像1', //設定項目のタイトル
        'section' => 'carousel-list', //セクションのID
        'settings' => 'carousel_image1', //設定項目のID
        'description' => 'カルーセル1の画像を設定してください。', //設定項目の説明
    )));
    //２つ目の画像追加
    $wp_customize->add_setting( 'carousel_image2'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image2', array(
        'label' => 'カルーセル画像2', //設定項目のタイトル
        'section' => 'carousel-list', //セクションのID
        'settings' => 'carousel_image2', //設定項目のID
        'description' => 'カルーセル2の画像を設定してください。', //設定項目の説明
    )));
    //３つ目の画像追加
    $wp_customize->add_setting( 'carousel_image3'); //設定項目を追加
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image3', array(
        'label' => 'カルーセル画像3', //設定項目のタイトル
        'section' => 'carousel-list', //セクションのID
        'settings' => 'carousel_image3', //設定項目のID
        'description' => 'カルーセル3の画像を設定してください。', //設定項目の説明
    )));
}
/* テーマカスタマイザーで設定された画像のURLを取得する関数
// ---------------------------------------------------------- */
function get_the_logo_img_url_1(){
	return esc_url( get_theme_mod( 'menu_image1' ) );
}
function get_the_logo_img_url_2(){
	return esc_url( get_theme_mod( 'menu_image2' ) );
}
function get_the_logo_img_url_3(){
	return esc_url( get_theme_mod( 'menu_image3' ) );
}
function get_the_logo_img_url_4(){
	return esc_url( get_theme_mod( 'menu_image4' ) );
}
function get_the_logo_img_url_5(){
	return esc_url( get_theme_mod( 'menu_image5' ) );
}
function get_the_logo_img_url_6(){
	return esc_url( get_theme_mod( 'menu_image6' ) );
}

function get_the_product_img_url_1(){
	return esc_url( get_theme_mod( 'product_image1' ) );
}
function get_the_product_img_url_2(){
	return esc_url( get_theme_mod( 'product_image2' ) );
}
function get_the_product_img_url_3(){
	return esc_url( get_theme_mod( 'product_image3' ) );
}
function get_the_product_img_url_4(){
	return esc_url( get_theme_mod( 'product_image4' ) );
}
function get_the_product_img_url_5(){
	return esc_url( get_theme_mod( 'product_image5' ) );
}
function get_the_product_img_url_6(){
	return esc_url( get_theme_mod( 'product_image6' ) );
}

function get_the_banner_img_url_1(){
	return esc_url( get_theme_mod( 'banner_image1' ) );
}
function get_the_banner_img_url_2(){
	return esc_url( get_theme_mod( 'banner_image2' ) );
}
function get_the_banner_img_url_3(){
	return esc_url( get_theme_mod( 'banner_image3' ) );
}

function get_the_carousel_img_url_1(){
	return esc_url( get_theme_mod( 'carousel_image1' ) );
}
function get_the_carousel_img_url_2(){
	return esc_url( get_theme_mod( 'carousel_image2' ) );
}
function get_the_carousel_img_url_3(){
	return esc_url( get_theme_mod( 'carousel_image3' ) );
}