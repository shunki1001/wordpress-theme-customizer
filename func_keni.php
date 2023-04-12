<?php

/*----------------------------------------
	賢威7.1
	賢威の動きを定義する

	株式会社 ウェブライダー
----------------------------------------*/

/**
 * 賢威 バージョン 設定
 */
if ( ! defined( 'KENI_VER' ) ) {
	define( "KENI_VER", "7.1" );
}

/********** PROCESS ***********/
require_once( locate_template( 'inc/Keni_DB.php' ) );             // 賢威データベースクラス
require_once( locate_template( 'inc/Keni_Setting.php' ) );        // 賢威セッティングクラス
require_once( locate_template( 'inc/Keni.php' ) );                // 賢威メソッドクラス
require_once( locate_template( 'inc/Keni_PV_Widget.php' ) );      // 賢威ウィジェットクラス
require_once( locate_template( 'inc/Keni_Widget_Recent_Posts.php' ) );    // 賢威

/**
 * 賢威 クラス 取得メソッド
 */
function get_keni( $keni_class = null ) {
	if ( ! $keni_class || 'Keni' != @get_class( $keni_class ) ) {
		$keni_class = new Keni();
	}

	return $keni_class;
}

// 賢威クラス インスタンス生成
$keni_class = get_keni();

//---------------------------------------------------------------------------
//	賢威の基本設定
//---------------------------------------------------------------------------
if ( get_option( 'WPLANG' ) == 'ja' ) {
	load_textdomain( 'keni', locate_template( 'language/keni.mo' ) );
}

if ( ! defined( 'KENI_SET' ) ) {
	global $wpdb;
	define( "KENI_SET", $wpdb->prefix . "keni_setting" );

	// ランディングページのディレクトリ名を取得
	if ( ! defined( 'LP_DIR' ) ) {
		define( 'LP_DIR', $keni_class->the_keni( 'lp_dir' ) );
	}

	// 賢威の更新情報ページURLを取得
	if ( ! defined( 'KENI_SUPPORT_NEWS_URL' ) ) {
		define( 'KENI_SUPPORT_NEWS_URL', 'https://support-keni.rider-store.jp/news.php' );
	}
}

/**
 * autoloading...
 * モジュール読み込み
 */
$includes = array(
	'/module',
	// 'apps',  // 追加ディレクトリ
);
foreach ( $includes as $include ) {
	$ret = glob( __DIR__ . $include . '/*.php' );
	if ( $ret != FALSE ) {
		foreach ( $ret as $file ) {
			require_once( $file );
		}
	}
}

// after_setup_theme に keni_setup()
add_action( 'after_setup_theme', 'keni_setup' );

// wp_enqueue_scripts に register_jquery()
add_action( 'wp_enqueue_scripts', 'register_jquery' );

// ウィジェット初期化
add_action( 'widgets_init', 'keni_widgets_init' );

//---------------------------------------------------------------------------
//	個別ページにタグを設定出来るようにする
//---------------------------------------------------------------------------
add_action( 'init', 'add_tag_to_page' );
add_action( 'pre_get_posts', 'add_page_to_tag_archive', 10, 1 );

//---------------------------------------------------------------------------
//	固定ページで「抜粋」を入力可に
//---------------------------------------------------------------------------
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( LP_DIR, 'excerpt' );


//---------------------------------------------------------------------------
//	「もっと見る」リンクの文字省略時のデザイン変更
//---------------------------------------------------------------------------
add_filter( 'excerpt_more', 'new_excerpt_more' );


//---------------------------------------------------------------------------
//	管理画面上での<h1>エリアの指定
//---------------------------------------------------------------------------
// 'admin_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_h1_box' );
//---------------------------------------------------------------------------
//	管理画面上でのcanonicalエリアの指定
//---------------------------------------------------------------------------
// 'admin_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_canonical_box' );

//---------------------------------------------------------------------------
//	管理画面上での関連記事エリアの指定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_relation_box' );

//---------------------------------------------------------------------------
//	管理画面上でのレイアウトの指定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_layout_custom_box' );

//---------------------------------------------------------------------------
//	ランディングページ用レイアウト設定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_lp_layout_custom_box' );

//---------------------------------------------------------------------------
//	管理画面上でのindex/followの指定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_index_area' );

//---------------------------------------------------------------------------
//	管理画面上にサイトタイトルを表示するかどうかのチェック項目を設ける
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_title_view_area' );

//---------------------------------------------------------------------------
//	管理画面上にPVランキングの対象にするかどうかのチェック項目を設ける
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_pv_disable_area' );

//---------------------------------------------------------------------------
//	管理画面上での個別タグエリアの指定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_tags_area' );

//---------------------------------------------------------------------------
//	賢威のSEOチェックファイルを読み込み
//---------------------------------------------------------------------------
add_action( 'admin_head', 'keni_seo_check' );


add_action( 'wp', 'redirect_404' );

//---------------------------------------------------------------------------
//	投稿画面からフォーマットの項目を非表示にする
//---------------------------------------------------------------------------
add_action( 'admin_menu', 'remove_post_metaboxes' );


//---------------------------------------------------------------------------
//	カテゴリ/タグにテキストエリアを設置
//---------------------------------------------------------------------------
add_action( 'category_add_form_fields', 'category_tag_add_form' );
add_action( 'post_tag_add_form_fields', 'category_tag_add_form' );

add_action( 'category_edit_form_fields', 'category_tag_edit_form' );
add_action( 'post_tag_edit_form_fields', 'category_tag_edit_form' );

add_action( 'created_term', 'insert_category_contents' );
add_action( 'edit_term', 'update_category_contents' );


//---------------------------------------------------------------------------
// 賢威サポートチームからのお知らせ表示
//---------------------------------------------------------------------------
add_action( 'do_meta_boxes', 'add_keni_support_message' );


//---------------------------------------------------------------------------
// 管理画面に、共通コンテンツエリアを作る
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_common_contents_button' );


//---------------------------------------------------------------------------
// ランディングページの投稿にサブキャッチコピーを追加する
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_lp_catch_box' );

//---------------------------------------------------------------------------
// ランディングページの投稿に画像アップロード機能を追加する
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_lp_image_box' );

//---------------------------------------------------------------------------
//	管理画面のみで読み込むファイル
//---------------------------------------------------------------------------
add_action( 'admin_menu', 'keni_admin_menu' );
add_action( 'template_redirect', 'keni_setting' );
add_action( 'init', 'keni_common_contents' );
add_action( 'init', 'keni_landingpage' );
add_action( 'admin_head', 'keni_admin' );


//---------------------------------------------------------------------------
//	エディタにボタンを追加
//---------------------------------------------------------------------------
add_action( 'admin_print_footer_scripts', 'add_keni_quicktags' );

if ( ! is_singular( LP_DIR ) ) {
	add_action( 'get_header', 'set_pv_cookie' );
}

add_action( 'widgets_init', function() { register_widget( 'Keni_PV_Widget' ); } );

//---------------------------------------------------------------------------
//	「最近の投稿」ウィジェット（サムネイル画像付き）　ver.7.0.7 更新
//---------------------------------------------------------------------------
add_action( 'widgets_init', 'new_posts_widget_register' );


//---------------------------------------------------------------------------
//	構造化マークアップ対応のためのhentryクラスの削除
//---------------------------------------------------------------------------
add_filter( 'post_class', 'remove_hentry' );


//---------------------------------------------------------------------------
//	予約投稿の際、既に登録されている内容を上書きしないようにする
//  7.0.7
//	 remove_action('save_post', 'save_primary_category');　追記
//   remove_action('save_post', 'save_metadata_string');　追記
//---------------------------------------------------------------------------
add_action( 'future_to_publish', 'future_to_publish_action' );


//---------------------------------------------------------------------------
//	一覧からの一括変更の際に、個別設定されている内容の上書きをしないようにする
//  7.0.7
// 	 add_action('save_post', 'save_primary_category'); 追記
//   add_action('save_post', 'save_metadata_string'); 追記
//---------------------------------------------------------------------------
add_action( 'admin_menu', 'save_post_action_check' );


//---------------------------------------------------------------------------
//	管理画面上での目次表示の指定
//---------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_toc_box' );

//------------------------------------------------------------------------------------
//  管理画面上にパンくずカテゴリの優先度を決めるエリアを設ける　ver.7.0.7 追加
//------------------------------------------------------------------------------------
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_primary_category_area' );
add_action( 'widgets_init', 'update_posts_widget_register' );


//------------------------------------------------------------------------------------------------------------

/**
 * 投稿ごとに、メタキーワード・メタディスクリプションを設定出来るエリアの追加
 * @since 7.0.7
 */
// 'add_menu'->'add_meta_boxes'
add_action( 'add_meta_boxes', 'add_metadata_box' );

/**
 *    PVランキングを集計するテーブルから、1ヶ月前以前のデータを削除する　ver.7.0.7 追加
 * @since 7.0.7
 */
add_action( 'pv_data_delete_cron', 'pv_one_month_delete' );

// cron登録処理
if ( ! wp_next_scheduled( 'pv_data_delete_cron' ) ) {
	wp_schedule_event( time(), 'daily', 'pv_data_delete_cron' );
}

add_action( 'switch_theme', 'disable_keni_cron' );


/**
 * keni_db実行タイミングの変更
 * @since 7.0.7.4
 */
add_action( 'after_switch_theme', 'createDataBase' );
