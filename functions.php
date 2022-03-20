<?php

//サムネイル表示
add_theme_support('post-thumbnails');

//メニューバー表示

add_theme_support('menus');

register_nav_menus(
	array(
		'place_global' => 'グローバル'
	)
	);

	//パンくずリスト
	function mytheme_breadcrumb() {
		$sep = ' > ';
		echo '<a href="'.get_bloginfo('url').'" >HOME</a>';
		echo $sep;

		if( is_singular() ) {
			if ( is_single() ) {
				$cat = get_the_category();
				echo get_category_parents($cat[0], true, $sep);
			}
			the_title();
		}
	
		if ( !is_front_page() && !is_home() ) :
	
		endif;
	}

//投稿記事カスタムCSS
function custom_inline_style(){
	if(is_single()){
		//CSSスタイルファイルにキューを追加
		wp_register_style('style',false);
		wp_enqueue_style('style');

		//追加するCSS
		$css = 
		"h2{
			color:red;
		}";

		//インラインにCSSの内容を出力
		wp_add_inline_style('style',$css);
	}
}
add_action('wp_enqueue_script','custom_inline_style');

//ウィジェットエリア表示

register_sidebar(
	array(
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget">',
		'after_title' => '</div>'
	)
	);

//アーカイヴ機能
function post_has_archive($args, $post_type)
{
	if ('post' == $post_type){
		$args['rewrite'] = true;
		$args['has_archive'] = 'blog';
	}
	return $args;
}
add_filter('register_post_type_args','post_has_archive',10,2);

function my_acf_init() { if (function_exists('acf_update_setting')) { acf_update_setting('remove_wp_meta_box', false); } } add_action('acf/init', 'my_acf_init');

//投稿一覧にカスタムフィールドを表示する
function add_new_post_columns($post_columns){
	$post_columns = array(
		"cb" => '<input type="checkbox"/>',
		"title" => __('TItle','mono-lab'),
		"cb" => '<input type="checkbox"/>',
		"cb" => '<input type="checkbox"/>',
		"cb" => '<input type="checkbox"/>',
		"cb" => '<input type="checkbox"/>',
	);
	return $post_columns;
}
add_filter("manage_edit-post_columns","add_new_post_columns");

// カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'news', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '更新情報', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'news',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
				'supports' => array('title','editor','excerpt','thumbnail','author','custom-fields'),
    ]);
}

function add_custom_fields(){
	add_meta_box(
		'custom_setting',
		'カスタム情報',
		'insert_custom_fields',
		'custom_post',
		'normal'
	);
}
add_action('admin_menu','add_custom_fields');

function custom_metabox_edit_form_tag(){
	echo 'enctype = "multipart/form-data"';
}
add_action('post_edit_form_tag','custom_metabox_edit_form_tag');

function insert_custom_fields(){
	global $post;
	$hoge_name = get_post_meta(
		$post->ID,
		'hoge_name',
		true
	);
	$hoge_thumbnail = get_post_meta($post->ID,'hoge_thumbnail',true);
	echo '名前: <input type="text" name="hoge_name" value="'.$hoge_name.'" /><br>';
	echo '画像: <input type="file" name="hoge_thumbnail" accept="image/*" /><br>';
	if(isset($hoge_thumbnail) && strlen($hoge_thumbnail) > 0){
		echo '<img style="width: 200px; display: block; margin: 1em;" src="'.wp_get_attachment_url($hoge_thumbnail).'">';
	}
}