<?php
/*----------------------------------------
	賢威7.1
	賢威の処理を関数化
	独自の処理に変更する場合は子テーマでオーバーライド

	株式会社 ウェブライダー
----------------------------------------*/
global $keni_class;
$keni_class = get_keni( $keni_class );

if ( ! function_exists( 'the_keni' ) ) {
	/**
	 * the_keni
	 *
	 * @param string $val
	 *
	 * @return string
	 */
	function the_keni( $val = "" ) {
		global $keni_class;

		return $keni_class->the_keni( $val );
	}
}

if ( ! function_exists( 'getKeniSetting' ) ) {
	/**
	 * getKeniSetting
	 * @return array
	 */
	function getKeniSetting() {
		global $keni_class;

		return $keni_class->getKeniSetting();
	}
}

if ( ! function_exists( 'keni_setting' ) ) {

	/**
	 * モジュールロード /module/keni_setting.php
	 */
	function keni_setting() {

		global $keni_class;


		$keni_class->getKeniSetting();
	}
}

if ( ! function_exists( 'keni_setup' ) ) {

	/**
	 * セットアップメソッド
	 */
	function keni_setup() {
		global $keni_class;

		$keni_class->keni_setup();
	}
}

if ( ! function_exists( 'register_jquery' ) ) {

	/**
	 * register_jquery()
	 * 賢威用各種モジュールの読み込み
	 */
	function register_jquery() {
		global $keni_class;

		$keni_class->register_jquery();
	}
}

if ( ! function_exists( 'keni_widgets_init' ) ) {

	/**
	 * keni_widgets_init()
	 * ウィジェット追加メソッド
	 */
	function keni_widgets_init() {
		global $keni_class;

		$keni_class->keni_widgets_init();
	}
}

if ( ! function_exists( 'get_globalmenu_keni' ) ) {

	/**
	 * メニューのカスタマイズ
	 *
	 * @param $position
	 *
	 * @return bool
	 */
	function get_globalmenu_keni( $position ) {
		global $keni_class;

		return $keni_class->get_globalmenu_keni( $position );
	}
}

if ( ! function_exists( 'archive_title_keni' ) ) {

	/**
	 * アーカイブのタイトルの表示する関数
	 * archive_title_keni()
	 *
	 * @param bool $disp_flg
	 *
	 * @return string
	 */
	function archive_title_keni() {
		global $keni_class;
		echo $keni_class->get_archive_title_keni();
	}
}

if ( ! function_exists( 'get_archive_title_keni' ) ) {

	/**
	 * get_archive_title_keni
	 *
	 * @param string $page
	 *
	 * @return string
	 */
	function get_archive_title_keni( $page = "y" ) {
		global $keni_class;

		return $keni_class->get_archive_title_keni( $page );
	}
}

if ( ! function_exists( 'newposts_keni' ) ) {

	/**
	 * 最新情報リスト
	 *
	 * @param string $target
	 * @param int $num_of_posts
	 * @param int $excerpt
	 * @param string $show_date
	 * @param int $catid
	 * @param string $show_cat
	 *
	 * @return string
	 */
	function newposts_keni( $target = "new", $num_of_posts = 5, $excerpt = 1, $show_date = "default", $catid = 0, $show_cat = "true" ) {
		global $keni_class;

		return $keni_class->newposts_keni( $target, $num_of_posts, $excerpt, $show_date, $catid, $show_cat );
	}
}

if ( ! function_exists( 'posts_list_keni' ) ) {

	/**
	 * 記事一覧表示
	 * @param string $target
	 * @param int $num_of_posts
	 * @param int $excerpt
	 * @param string $show_date
	 * @param string $kind
	 * @param int $var_id
	 * @param string $show_tag
	 * @param string $title_str
	 *
	 * @return string
	 */
	function posts_list_keni( $target = "new", $num_of_posts = 5, $excerpt = 1, $show_date = "default", $kind = "", $var_id = 0, $show_tag = "true", $title_str = "" ) {
		global $keni_class;

		return $keni_class->posts_list_keni( $target, $num_of_posts, $excerpt, $show_date, $kind, $var_id, $show_tag, $title_str );
	}
}

if ( ! function_exists( 'add_tag_to_page' ) ) {

	/**
	 * 個別ページにタグを設定出来るようにする
	 */
	function add_tag_to_page() {
		global $keni_class;

		$keni_class->add_tag_to_page();
	}
}

if ( ! function_exists( 'add_page_to_tag_archive' ) ) {

	/**
	 * @param $obj
	 */
	function add_page_to_tag_archive( $obj ) {
		global $keni_class;

		$keni_class->add_page_to_tag_archive( $obj );
	}
}

if ( ! function_exists( 'new_excerpt_more' ) ) {

	/**
	 * 「もっと見る」リンクの文字省略時のデザイン変更
	 *
	 * @param $more
	 *
	 * @return string
	 */
	function new_excerpt_more( $more = null ) {
		global $keni_class;

		return $keni_class->new_excerpt_more( $more );
	}
}

if ( ! function_exists( 'add_h1_box' ) ) {

	/**
	 * 管理画面上での<h1>エリアの指定
	 */
	function add_h1_box() {
		global $keni_class;

		$keni_class->add_h1_box();
	}
}

if ( ! function_exists( 'h1_setting' ) ) {

	function h1_setting() {
		global $keni_class;

		$keni_class->h1_setting();
	}
}

if ( ! function_exists( 'save_h1_string' ) ) {

	/**
	 * save_h1_string
	 *
	 * @param $post_id
	 */
	function save_h1_string( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_h1_string( $post_id );
	}
}

if ( ! function_exists( 'get_h1_keni' ) ) {

	function get_h1_keni( $post_id = 0 ) {
		global $keni_class;


		return $keni_class->get_h1_keni( $post_id );
	}
}

if ( ! function_exists( 'h1_keni' ) ) {

	/**
	 * <h1>の表示する関数
	 */
	function h1_keni() {
		global $keni_class;


		$keni_class->h1_keni();
	}
}

if ( ! function_exists( 'canonical_keni' ) ) {

	/**
	 * canonicalを表示する関数
	 */
	function canonical_keni() {
		global $keni_class;


		$keni_class->canonical_keni();
	}
}

if ( ! function_exists( 'get_canonical_keni' ) ) {

	/**
	 * @param bool $tag
	 * @param bool $pass
	 *
	 * @return false|mixed|string
	 */
	function get_canonical_keni( $tag = true, $pass = false ) {
		global $keni_class;


		return $keni_class->get_canonical_keni( $tag, $pass );
	}
}

//---------------------------------------------------------------------------

if ( ! function_exists( 'add_canonical_box' ) ) {
	/**
	 * 管理画面上でのcanonicalエリアの指定
	 */
	function add_canonical_box() {
		global $keni_class;


		$keni_class->add_canonical_box();
	}
}

if ( ! function_exists( 'canonical_setting' ) ) {

	/**
	 *
	 */
	function canonical_setting() {
		global $keni_class;


		$keni_class->canonical_setting();
	}
}

if ( ! function_exists( 'save_canonical_string' ) ) {

	/**
	 * @param $post_id
	 */
	function save_canonical_string( $post_id = "" ) {
		global $keni_class;


		$keni_class->save_canonical_string( $post_id );
	}
}

//---------------------------------------

if ( ! function_exists( 'add_relation_box' ) ) {
	/**
	 * 管理画面上での関連記事エリアの指定
	 */
	function add_relation_box() {
		global $keni_class;


		$keni_class->add_relation_box();
	}
}

if ( ! function_exists( 'relation_setting' ) ) {
	/**
	 * 「投稿ページ」用の関連記事設定
	 *
	 * @param bool $disp_flg
	 *
	 * @return string/NULL
	 */
	function relation_setting( $disp_flg = false ) {
		global $keni_class;


		if ( $disp_flg == false ) {
			return $keni_class->relation_setting( $disp_flg );
		}
		$keni_class->relation_setting( $disp_flg );
	}
}

if ( ! function_exists( 'relation_page_setting' ) ) {
	/**
	 * 「固定ページ」用の関連記事設定
	 */
	function relation_page_setting() {
		global $keni_class;


		$keni_class->relation_page_setting();
	}
}

if ( ! function_exists( 'save_relation_string' ) ) {
	/**
	 * save_relation_string
	 *
	 * @param string $post_id
	 */
	function save_relation_string( $post_id = "" ) {
		global $keni_class;


		$keni_class->save_relation_string( $post_id );
	}
}

if ( ! function_exists( 'relation_keni' ) ) {
	/**
	 * 関連記事を表示する関数　ver.7.0.7 更新
	 */
	function relation_keni() {
		global $keni_class;


		$keni_class->relation_keni();
	}
}

if ( ! function_exists( 'get_relation_keni' ) ) {
	/**
	 * 関連記事を返却する関数
	 * @return string
	 */
	function get_relation_keni() {
		global $keni_class;


		return $keni_class->get_relation_keni();
	}
}

if ( ! function_exists( 'add_layout_custom_box' ) ) {
	/**
	 * add_layout_custom_box
	 */
	function add_layout_custom_box() {
		global $keni_class;

		$keni_class->add_layout_custom_box();
	}
}

if ( ! function_exists( 'layout_setting' ) ) {
	/**
	 * layout_setting
	 */
	function layout_setting() {
		global $keni_class;
		
		$keni_class->layout_setting();
	}
}

if ( ! function_exists( 'save_custom_field_postdata' ) ) {
	/**
	 * レイアウト設定の保存
	 *
	 * @param $post_id
	 */
	function save_custom_field_postdata( $post_id = "" ) {
		global $keni_class;
		
		$keni_class->save_custom_field_postdata( $post_id );
	}
}

if ( ! function_exists( 'add_lp_layout_custom_box' ) ) {
	/**
	 * add_lp_layout_custom_box
	 */
	function add_lp_layout_custom_box() {
		global $keni_class;
		
		$keni_class->add_lp_layout_custom_box();
	}
}

if ( ! function_exists( 'lp_layout_setting' ) ) {
	/**
	 * lp_layout_setting
	 */
	function lp_layout_setting() {
		global $keni_class;
		
		$keni_class->lp_layout_setting();
	}
}

if ( ! function_exists( 'add_index_area' ) ) {
	/**
	 * add_index_area
	 */
	function add_index_area() {
		global $keni_class;

		$keni_class->add_index_area();
	}
}

if ( ! function_exists( 'index_setting' ) ) {
	/**
	 * index_setting
	 */
	function index_setting() {
		global $keni_class;


		$keni_class->index_setting();
	}
}

if ( ! function_exists( 'save_index_postdata' ) ) {
	/**
	 * save_index_postdata
	 *
	 * @param $post_id
	 */
	function save_index_postdata( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_index_postdata( $post_id );
	}
}

if ( ! function_exists( 'add_title_view_area' ) ) {
	/**
	 * 管理画面上にサイトタイトルを表示するかどうかのチェック項目を設ける
	 */
	function add_title_view_area() {
		global $keni_class;

		$keni_class->add_title_view_area();
	}
}

if ( ! function_exists( 'view_title_setting' ) ) {
	/**
	 * @param bool $disp_flg
	 *
	 * @return string $res
	 */
	function view_title_setting( $disp_flg = false ) {
		global $keni_class;

		$keni_class->view_title_setting( $disp_flg );
	}
}

if ( ! function_exists( 'save_title_view' ) ) {
	/**
	 * save_title_view
	 *
	 * @param string $post_id
	 */
	function save_title_view( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_title_view( $post_id );
	}
}

if ( ! function_exists( 'add_pv_disable_area' ) ) {
	/**
	 *    管理画面上にPVランキングの対象にするかどうかのチェック項目を設ける
	 */
	function add_pv_disable_area() {
		global $keni_class;

		$keni_class->add_pv_disable_area();
	}
}

if ( ! function_exists( 'view_pv_setting' ) ) {
	/**
	 * view_pv_setting
	 *
	 * @param bool $disp_flg
	 *
	 * @return string $res
	 */
	function view_pv_setting( $disp_flg = false ) {
		global $keni_class;

		if ( $disp_flg == false ) {
			return $keni_class->view_pv_setting( $disp_flg );
		}
		$keni_class->view_pv_setting( $disp_flg );
	}
}

if ( ! function_exists( 'save_pv_disable' ) ) {
	/**
	 * save_pv_disable
	 *
	 * @param string $post_id
	 */
	function save_pv_disable( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_pv_disable( $post_id );
	}
}

if ( ! function_exists( 'add_tags_area' ) ) {
	/**
	 *    管理画面上での個別タグエリアの指定
	 */
	function add_tags_area() {
		global $keni_class;

		$keni_class->add_tags_area();
	}
}

if ( ! function_exists( 'tags_setting' ) ) {
	/**
	 *  tags_setting
	 *
	 * @param bool $disp_flg
	 *
	 * @return string|void
	 */
	function tags_setting( $disp_flg = false ) {
		global $keni_class;

		if ( $disp_flg == false ) {
			return $keni_class->tags_setting( $disp_flg );
		}
		$keni_class->tags_setting( $disp_flg );
	}
}

if ( ! function_exists( 'save_tags_string' ) ) {
	/**
	 * save_tags_string
	 *
	 * @param $post_id
	 */
	function save_tags_string( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_tags_string( $post_id );
	}
}

if ( ! function_exists( 'getPageLayout' ) ) {
	/**
	 * ポストIDに設定したレイアウトを取得
	 *
	 * @param $post_id
	 *
	 * @return mixed|string
	 */
	function getPageLayout( $post_id = "" ) {
		global $keni_class;

		return $keni_class->getPageLayout( $post_id );
	}
}

if ( ! function_exists( 'pageLayoutView' ) ) {
	/**
	 * ポストIDに設定したレイアウトを表示する
	 *
	 * @param $post_id
	 */
	function pageLayoutView( $post_id ) {
		global $keni_class;

		$keni_class->pageLayoutView( $post_id );
	}
}

if ( ! function_exists( 'keni_layout' ) ) {
	/**
	 * 対象ページに設定されているレイアウトを返却
	 *
	 * @param $post_id
	 *
	 * @return array
	 */
	function keni_layout( $post_id ) {
		global $keni_class;

		return $keni_class->keni_layout( $post_id );
	}
}

if ( ! function_exists( 'redirect_404' ) ) {
	/**
	 * 検索をした際に、対象の投稿が存在しなかった場合、404を返すようにする
	 */
	function redirect_404() {
		global $keni_class;

		$keni_class->redirect_404();
	}
}

if ( ! function_exists( 'getKeniMenuSetting' ) ) {
	/**
	 * データベースに登録されている特定メニューの内容を取得
	 *
	 * @param $key
	 *
	 * @return array
	 */
	function getKeniMenuSetting( $key ) {
		global $keni_class;

		return $keni_class->getKeniMenuSetting( $key );
	}
}

if ( ! function_exists( 'get_category_dir' ) ) {
	/**
	 * カテゴリディレクトリの取得
	 *
	 * @return mixed|string|void
	 */
	function get_category_dir() {
		global $keni_class;

		return $keni_class->get_category_dir();
	}
}

if ( ! function_exists( 'get_tag_dir' ) ) {
	/**
	 * タグディレクトリの取得
	 * @return mixed|string|void
	 */
	function get_tag_dir() {
		global $keni_class;

		return $keni_class->get_tag_dir();
	}
}

if ( ! function_exists( 'manage_posts_columns' ) ) {
	/**
	 * 投稿一覧に、項目を追加する
	 *
	 * @param $columns
	 *
	 * @return mixed
	 */
	function manage_posts_columns( $columns = "" ) {
		global $keni_class;

		return $keni_class->manage_posts_columns( $columns );
	}
}

if ( ! function_exists( 'add_column' ) ) {
	/**
	 * add_column
	 *
	 * @param string $column_name
	 * @param string $post_id
	 */
	function add_column( $column_name = "", $post_id = "" ) {
		global $keni_class;

		$keni_class->add_column( $column_name, $post_id );
	}
}

if ( ! function_exists( 'remove_post_metaboxes' ) ) {
	/**
	 * 投稿画面からフォーマットの項目を非表示にする
	 */
	function remove_post_metaboxes() {
		global $keni_class;

		$keni_class->remove_post_metaboxes();
	}
}

if ( ! function_exists( 'pager_keni' ) ) {
	/**
	 * ページャーを表示する
	 */
	function pager_keni() {
		global $keni_class;

		$keni_class->pager_keni();
	}
}

if ( ! function_exists( 'get_category_keni' ) ) {
	/**
	 *    カテゴリ名を取得
	 *
	 * @param string $id
	 *
	 * @return string
	 */
	function get_category_keni( $id = "" ) {
		global $keni_class;

		return $keni_class->get_category_keni( $id );
	}
}

if ( ! function_exists( 'getIndexFollow' ) ) {
	/**
	 * index/followを取得
	 * @return string
	 */
	function getIndexFollow() {
		global $keni_class;

		return $keni_class->getIndexFollow();
	}
}

if ( ! function_exists( 'category_tag_add_form' ) ) {

	/**
	 * カテゴリ/タグにテキストエリアを設置
	 */
	function category_tag_add_form() {
		global $keni_class;

		$keni_class->category_tag_add_form();
	}
}

if ( ! function_exists( 'category_tag_edit_form' ) ) {

	/**
	 * カテゴリのコンテンツ保持方法を変更　ver.7.0.7.4（postmeta →　options）
	 */
	function category_tag_edit_form() {
		global $keni_class;

		$keni_class->category_tag_edit_form();
	}
}

if ( ! function_exists( 'keni_rte_css' ) ) {

	function keni_rte_css() {
		global $keni_class;

		return $keni_class->keni_rte_css();
	}
}

if ( ! function_exists( 'insert_category_contents' ) ) {
	/**
	 * カテゴリのコンテンツ保持方法を変更　ver.7.0.7.4（postmeta →　options）
	 *
	 * @param $term_id
	 */
	function insert_category_contents( $term_id = "" ) {
		global $keni_class;

		$keni_class->insert_category_contents( $term_id );
	}
}

if ( ! function_exists( 'update_category_contents' ) ) {

	/**
	 * カテゴリのコンテンツ保持方法を変更　ver.7.0.7.4（postmeta →　options）
	 */
	function update_category_contents() {
		global $keni_class;

		$keni_class->update_category_contents();
	}
}

if ( ! function_exists( 'keni_admin_menu' ) ) {

	/**
	 * 賢威メニューの表示　ver.7.0.7 権限の変更（edit_themes →　administrator）
	 */
	function keni_admin_menu() {
		global $keni_class;

		$keni_class->keni_admin_menu();
	}
}

if ( ! function_exists( 'add_keni_support_message' ) ) {

	/**
	 * 賢威サポートチームからのお知らせ表示
	 *
	 * @param string $screen_id
	 */
	function add_keni_support_message( $screen_id = "" ) {
		global $keni_class;

		$keni_class->add_keni_support_message( $screen_id );
	}
}

if ( ! function_exists( 'view_message' ) ) {

	function view_message() {
		global $keni_class;

		$keni_class->view_message();
	}
}

if ( ! function_exists( 'keni_common_contents' ) ) {

	/**
	 * 管理画面に、共通コンテンツエリアを作る
	 */
	function keni_common_contents() {
		global $keni_class;

		$keni_class->keni_common_contents();
	}
}

if ( ! function_exists( 'add_common_contents_button' ) ) {

	/**
	 *
	 */
	function add_common_contents_button() {
		global $keni_class;

		$keni_class->add_common_contents_button();
	}
}

if ( ! function_exists( 'common_contents_button' ) ) {

	/**
	 * common_contents_button
	 */
	function common_contents_button() {
		global $keni_class;

		$keni_class->common_contents_button();
	}
}

if ( ! function_exists( 'common_contents_code' ) ) {

	/**
	 * common_contents_code
	 */
	function common_contents_code() {
		global $keni_class;

		$keni_class->common_contents_code();
	}
}

if ( ! function_exists( 'save_common_contents_button' ) ) {

	/**
	 * save_common_contents_button
	 *
	 * @param string $post_id
	 */
	function save_common_contents_button( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_common_contents_button( $post_id );
	}
}

if ( ! function_exists( 'add_lp_catch_box' ) ) {

	/**
	 * ランディングページの投稿にサブキャッチコピーを追加する
	 */
	function add_lp_catch_box() {
		global $keni_class;

		$keni_class->add_lp_catch_box();
	}
}

if ( ! function_exists( 'lp_catch_box' ) ) {

	function lp_catch_box() {
		global $keni_class;

		$keni_class->lp_catch_box();
	}
}

if ( ! function_exists( 'save_lp_catch' ) ) {

	/**
	 * save_lp_catch
	 *
	 * @param string $post_id
	 */
	function save_lp_catch( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_lp_catch( $post_id );
	}
}

//---------------------------------------------------------------------------

if ( ! function_exists( 'keni_landingpage' ) ) {

	/**
	 * 管理画面に、ランディングページエリアを作る
	 *
	 * @param string $dir
	 */
	function keni_landingpage( $dir = "" ) {
		global $keni_class;

		$keni_class->keni_landingpage( $dir );
	}
}

if ( ! function_exists( 'add_lp_image_box' ) ) {

	/**
	 * ランディングページの投稿に画像アップロード機能を追加する
	 */
	function add_lp_image_box() {
		global $keni_class;

		$keni_class->add_lp_image_box();
	}
}

if ( ! function_exists( 'lp_image_box' ) ) {

	/**
	 *
	 *
	 *
	 */
	function lp_image_box() {
		global $keni_class;

		$keni_class->lp_image_box();
	}
}

if ( ! function_exists( 'save_lp_image' ) ) {

	/**
	 * save_lp_image
	 *
	 * @param $post_id
	 */
	function save_lp_image( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_lp_image( $post_id );
	}
}

//-------------------------------------

if ( ! function_exists( 'keni_admin' ) ) {

	/**
	 *    管理画面のみで読み込むファイル
	 */
	function keni_admin() {
		global $keni_class;

		$keni_class->keni_admin();
	}
}

if ( ! function_exists( 'add_keni_quicktags' ) ) {

	/**
	 *    エディタにボタンを追加
	 */
	function add_keni_quicktags() {
		global $keni_class;

		$keni_class->add_keni_quicktags();
	}
}

if ( ! function_exists( 'pageNumber' ) ) {

	/**
	 *    表示をしているページやアーカイブ等の、現在のページ数と、最大ページ数を取得する
	 *
	 * @return bool
	 */
	function pageNumber() {
		global $keni_class;

		return $keni_class->pageNumber();
	}
}

if ( ! function_exists( 'pageRelNext' ) ) {

	/**
	 * meta ページネーションタグの出力
	 * @return string
	 */
	function pageRelNext() {
		global $keni_class;

		$keni_class->pageRelNext();
	}
}

if ( ! function_exists( 'set_pv_cookie' ) ) {

	/**
	 * ページの閲覧をしたかどうかを判断するcookieをセットする
	 */
	function set_pv_cookie() {
		global $keni_class;

		$keni_class->set_pv_cookie();
	}
}

if ( ! function_exists( 'countUpView' ) ) {

	/**
	 * ページのPV数をカウントする
	 */
	function countUpView() {
		global $keni_class;

		$keni_class->countUpView();
	}
}

if ( ! function_exists( 'viewPV' ) ) {

	/**
	 * ページのPV数を表示する
	 */
	function viewPV() {
		global $keni_class;

		$keni_class->viewPV();
	}
}

if ( ! function_exists( 'getViewPV' ) ) {

	/**
	 * @param string $pid
	 *
	 * @return mixed
	 */
	function getViewPV( $pid = "" ) {
		global $keni_class;

		return $keni_class->getViewPV( $pid );
	}
}

if ( ! function_exists( 'new_posts_widget_register' ) ) {

	/**
	 *
	 */
	function new_posts_widget_register() {
		global $keni_class;

		$keni_class->new_posts_widget_register();
	}
}

if ( ! function_exists( 'remove_hentry' ) ) {

	/**
	 *    構造化マークアップ対応のためのhentryクラスの削除
	 *
	 * @param $this_class
	 *
	 * @return array
	 */
	function remove_hentry( $this_class = array() ) {
		global $keni_class;

		return $keni_class->remove_hentry( $this_class );
	}
}

if ( ! function_exists( 'future_to_publish_action' ) ) {

	/**
	 * 予約投稿の際、既に登録されている内容を上書きしないようにする
	 * 7.0.7
	 * remove_action('save_post', 'save_primary_category');　追記
	 * remove_action('save_post', 'save_metadata_string');　追記
	 */
	function future_to_publish_action() {
		global $keni_class;

		$keni_class->future_to_publish_action();
	}
}

if ( ! function_exists( 'add_toc_box' ) ) {

	/**
	 *
	 */
	function add_toc_box() {
		global $keni_class;

		$keni_class->add_toc_box();
	}
}

if ( ! function_exists( 'toc_setting' ) ) {

	/**
	 *
	 */
	function toc_setting() {
		global $keni_class;

		$keni_class->toc_setting();
	}
}

if ( ! function_exists( 'save_toc_postdata' ) ) {

	/**
	 * 目次表示の保存
	 *
	 * @param $post_id
	 */
	function save_toc_postdata( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_toc_postdata( $post_id );
	}
}

if ( ! function_exists( 'richtext_formats' ) ) {

	/**
	 * 共通コンテンツ・フッタのリッチテキストを本文扱いにならないようにする
	 */
	function richtext_formats( $content = "" ) {
		global $keni_class;

		return $keni_class->richtext_formats( $content );
	}
}

if ( ! function_exists( 'add_primary_category_area' ) ) {

	/**
	 *
	 */
	function add_primary_category_area() {
		global $keni_class;

		$keni_class->add_primary_category_area();
	}
}

if ( ! function_exists( 'view_primary_category_setting' ) ) {

	/**
	 *
	 */
	function view_primary_category_setting() {
		global $keni_class;

		$keni_class->view_primary_category_setting();
	}
}

if ( ! function_exists( 'save_primary_category' ) ) {

	/**
	 * save_primary_category
	 *
	 * @param string $post_id
	 */
	function save_primary_category( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_primary_category( $post_id );
	}
}

if ( ! function_exists( 'update_posts_widget_register' ) ) {

	/**
	 * update_posts_widget_register
	 */
	function update_posts_widget_register() {
		global $keni_class;

		$keni_class->update_posts_widget_register();
	}
}

if ( ! function_exists( 'add_metadata_box' ) ) {

	/**
	 * add_metadata_box
	 */
	function add_metadata_box() {
		global $keni_class;

		$keni_class->add_metadata_box();
	}
}

if ( ! function_exists( 'metadata_setting' ) ) {

	/**
	 * metadata_setting
	 */
	function metadata_setting() {
		global $keni_class;

		$keni_class->metadata_setting();
	}
}

if ( ! function_exists( 'save_metadata_string' ) ) {

	/**
	 * save_metadata_string
	 *
	 * @param $post_id
	 */
	function save_metadata_string( $post_id = "" ) {
		global $keni_class;

		$keni_class->save_metadata_string( $post_id );
	}
}

if ( ! function_exists( 'pv_one_month_delete' ) ) {

	/**
	 * PVランキングを集計するテーブルから、1ヶ月前以前のデータを削除する　ver.7.0.7 追加
	 */
	function pv_one_month_delete() {
		global $keni_class;

		$keni_class->pv_one_month_delete();
	}
}

if ( ! function_exists( 'disable_keni_cron' ) ) {

	/**
	 * テンプレートを変更した場合は、登録したcronを除外する
	 */
	function disable_keni_cron() {
		global $keni_class;

		$keni_class->disable_keni_cron();
	}
}

if ( ! function_exists( 'archive_contents_keni' ) ) {

	/**
	 *    カテゴリ・タグのコンテンツ　ver.7.0.7.4 追加
	 */
	function archive_contents_keni() {
		global $keni_class;

		$keni_class->archive_contents_keni();
	}
}

if ( ! function_exists( 'get_archive_contents_keni' ) ) {

	function get_archive_contents_keni() {
		global $keni_class;

		return $keni_class->get_archive_contents_keni();
	}
}

if ( ! function_exists( 'replaceKeniCategoryContents' ) ) {

	/**
	 * カテゴリ・タグのコンテンツのDB内置換処理　ver.7.0.7.4 追加
	 */
	function replaceKeniCategoryContents() {
		global $keni_class;

		$keni_class->replaceKeniCategoryContents();
	}
}

if ( ! function_exists( 'createDataBase' ) ) {

	/**
	 * createDataBase
	 */
	function createDataBase() {
		global $keni_class;

		$keni_class->createDataBase();
	}
}


//--------------------------------


if ( ! function_exists( 'keni_seo_check' ) ) {
	/**
	 * Template表示
	 */
	function keni_seo_check() {
		global $keni_class;

		$keni_class->keni_seo_check();
	}
}

//-----------------------------------------

if ( ! function_exists( 'save_post_action_check' ) ) {
	/**
	 * 一覧からの一括変更の際に、個別設定されている内容の上書きをしないようにする
	 * 7.0.7
	 * add_action('save_post', 'save_primary_category'); 追記
	 *   add_action('save_post', 'save_metadata_string'); 追記
	 */
	function save_post_action_check() {
		global $keni_class;

		$keni_class->save_post_action_check();
	}
}

if ( ! function_exists( 'array_get_value' ) ) {
	/**
	 * array_get_value
	 * 設定値がない場合は空文字返却
	 *
	 * @param $string
	 *
	 * @return ''|$string
	 */
	function array_get_value( $array, $key, $default = null ) {
		return isset( $array[ $key ] ) ? $array[ $key ] : $default;
	}
}

if ( ! function_exists( 'get_installed_year' ) ) {
	/**
	 * インストール年を取得
	 * @return $year_string
	 */
	function get_installed_year() {
		global $wpdb;
		$year_string = "";

		$result = $wpdb->get_var( "select post_date from {$wpdb->posts} ORDER BY ID ASC LIMIT 1" );
		if ( isset( $result ) ) {
			$year_string = date( 'Y', strtotime( $result ) );
		}

		return $year_string;
	}
}