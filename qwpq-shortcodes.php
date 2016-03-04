<?php 

/**
 * 記事タイトルを挿入するショートコード用関数
 * @param  string $before 返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after  返り値の後方に任意のテキスト・タグを挿入する
 * @return string
 */
function qwpq_set_title( $atts )
{
	extract( shortcode_atts( array( 
		'set_anchor' => 'false',
	 ), $atts ) );
	$anchor_tag = qwpq_set_anchor($set_anchor);
	return $anchor_tag['before'] . get_the_title() . $anchor_tag['after'] ;
}



/**
 * 記事の投稿日を挿入するショートコード用関数
 * @param  string $before 返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after  返り値の後方に任意のテキスト・タグを挿入する
 * @param  string $format 日付のフォーマットを指定する
 * @return string
 * @link   https://wpdocs.osdn.jp/%E6%97%A5%E4%BB%98%E3%81%A8%E6%99%82%E5%88%BB%E3%81%AE%E6%9B%B8%E5%BC%8F
 */
function qwpq_set_date( $atts )
{
	extract( shortcode_atts( array( 
		'format' => 'Y-m-d',
	 ), $atts ) );
	return get_the_date( $format );
}

/**
 * 記事のURLを挿入するショートコード用関数
 * @param  string $before 返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after  返り値の後方に任意のテキスト・タグを挿入する
 * @param  string $format 日付のフォーマットを指定する
 * @return string
 * @link   https://wpdocs.osdn.jp/%E6%97%A5%E4%BB%98%E3%81%A8%E6%99%82%E5%88%BB%E3%81%AE%E6%9B%B8%E5%BC%8F
 */
function qwpq_set_parmalink()
{
	return get_the_permalink();
}



/**
 * 記事のカテゴリー名を挿入するショートコード用関数
 * @param  string $before       返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after        返り値の後方に任意のテキスト・タグを挿入する
 * @param  string $inner_before 各カテゴリー名の前方に任意のテキスト・タグを挿入する
 * @param  string $inner_after  各カテゴリー名の後方に任意のテキスト・タグを挿入する
 * @return string
 */
function qwpq_set_category( $atts )
{
	extract( shortcode_atts( array( 
		'before'            => '<ul>',
		'after'             => '</ul>',
		'inner_before'      => '<li>',
		'inner_after'       => '</li>',
		'class'             => '',
		'set_slug'          => 'false',
	 ), $atts ) );
	$categories = get_the_category();
	$css_class = $class;

	$output = '';
	foreach( $categories as $category ) {
		$slug = $set_slug == 'true' ? ' '. $category->slug : '';
		$output .= $inner_before . '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" class="'.$css_class.$slug.'">' . $category->cat_name . '</a>' . $inner_after;
	}
	return $before . $output . $after;
}



/**
 * 記事の概要文を挿入するショートコード用関数
 * @param  string $before 返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after  返り値の後方に任意のテキスト・タグを挿入する
 * @return string
 */
function qwpq_set_excerpt()
{
	return get_the_excerpt() ;
}



/**
 * 記事の本文を挿入するショートコード用関数
 * @param  string $before 返り値の前方に任意のテキスト・タグを挿入する
 * @param  string $after  返り値の後方に任意のテキスト・タグを挿入する
 * @return string
 */
function qwpq_set_content()
{
	return get_the_content();
}



/**
 * 記事の概要文を挿入するショートコード用関数
 * @param  string  $before      返り値の前方に任意のテキスト・タグを挿入する
 * @param  string  $after       返り値の後方に任意のテキスト・タグを挿入する
 * @param  boolean $anchor      画像にリンク付与の可否
 * @param  string  $link_to     リンク先の指定
 * @param  string  $target      リンク先ウィンドウのターゲットを指定
 * @return string  $msg_not_img 画像がなかった場合代わりのテキストを挿入する
 */
function qwpq_set_post_thumbnail( $atts )
{
	extract( shortcode_atts( array( 
		'before'      => '<figure>',
		'after'       => '</figure>',
		'set_anchor'  => 'false',
		'link_to'     => 'post',
		'target'      => '',
		'size'        => 'medium',
		'msg_empty'   => __( '<span class="error img-empty">画像が見つかりませんでした</span>' ),
	 ), $atts ) );
	$thumbnail = $msg_empty;
	$anchor_tag = qwpq_set_anchor($set_anchor);
	if ( has_post_thumbnail() ) $thumbnail = get_the_post_thumbnail( get_the_ID() , $size );
	return $before . $anchor_tag['before'] . $thumbnail . $anchor_tag['after'] . $after;
}



/**
 * 入れ子内でのみ実行したいショートコードを定義
 * @return 
 */
function qwpq_add_shortcodes(){
	add_shortcode( 'qwpq_title',     'qwpq_set_title' );
	add_shortcode( 'qwpq_date',      'qwpq_set_date' );
	add_shortcode( 'qwpq_parmalink', 'qwpq_set_parmalink' );
	add_shortcode( 'qwpq_category',  'qwpq_set_category' );
	add_shortcode( 'qwpq_excerpt',   'qwpq_set_excerpt' );
	add_shortcode( 'qwpq_content',   'qwpq_set_content' );
	add_shortcode( 'qwpq_thumbnail', 'qwpq_set_post_thumbnail' );
}
add_action( 'qwpq_add_shortcodes', 'qwpq_add_shortcodes', 10, 1 );
