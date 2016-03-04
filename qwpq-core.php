<?php
/**
 * 投稿一覧生成
 * @param  (array)  $atts    ショートコードの属性値
 * @param  (string) $content ショートコードの要素内容
 * @return (string)
 */
function qwpq_gen( $atts, $content = null )
{

	extract( shortcode_atts( array( 
		'before'        => '<ul>',
		'after'         => '</ul>',
		'inner_before'  => '<li>',
		'inner_after'   => '</li>',
		'msg_empty'     => __( '該当する記事がありません。' ),
	 ), $atts ) );
	$content = html_entity_decode ( $content );
	global $qwpq_pairs;
	$qwpq_pairs['cat'] = (is_category()) ? get_query_var('cat') : 0;//カテゴリーアーカイブの場合、現在のカテゴリIDにオーバーライド
	//var_dump(
	//	get_query_var('cat'),
	//	'is_category:',is_category(),'<br>',
	//	'is_date',is_date(),'<br>',
	//	'is_404',is_404(),'<br>',
	//	'is_page:',is_page(),'<br>',
	//	'is_search',is_search(),'<br>',
	//	'is_singular:',is_singular(),'<br>'
	//	);


	$qwpq_args = shortcode_atts( $qwpq_pairs, $atts );
	$qwpq_args = array_filter_recursive( $qwpq_args );
	$qwpq_args = array_json_decode_recursive( $qwpq_args );

	$posts_body = '';
	$post_body = $msg_empty;

	$content = preg_replace( '/<\/?p>|^[ \t]+?<br ?\/?>[ \t]+?$/', '', $content );
	$content = preg_replace( '/( ^[ \t]+?<br ?\/?>[ \t]+?$ )+/', '\1', $content );
	$before  = preg_replace( '/<br ?\/?>|<\/?p>/', '', $before );
	$after   = preg_replace( '/<br ?\/?>|<\/?p>/', '', $after );
	$inner_before  = preg_replace( '/<br ?\/?>|<\/?p>/', '', $inner_before );
	$inner_after   = preg_replace( '/<br ?\/?>|<\/?p>/', '', $inner_after );

	//オフセットとページングが両立できるおまじない。
	if (!empty($qwpq_args['paged']) && $qwpq_args['paged'] == 'true') {
		$page = get_query_var( 'paged' );
		if ( $page < 1 ) $page = 1;
		if(empty($qwpq_args['offset'])) $qwpq_args['offset'] = 0;
		$offset_base = $qwpq_args['offset'];
		$offset = intval(( $page-1 ) * $qwpq_args['posts_per_page'] + $qwpq_args['offset']);
		$qwpq_args['paged'] = $page;
	}

	$qwpq_query = new WP_Query( $qwpq_args );
	/** 入れ子内で実行したいショートコードを呼び出す */
	do_action( 'qwpq_add_shortcodes' );
	if ( $qwpq_query->have_posts() ){
		$post_body = "";
		while ( $qwpq_query->have_posts() ){
			$qwpq_query->the_post();
			$post_body .= html_entity_decode ( $inner_before ) . do_shortcode( $content ) . html_entity_decode ( $inner_after );
		}
	}
	wp_reset_postdata();

	$posts_body .= html_entity_decode ( $before ) . $post_body . html_entity_decode ( $after );
	$posts_body = preg_replace( '/\[qwpq_.*?\]/', '', $posts_body );

	return $posts_body;

}
add_shortcode( "quick_wp_query", "qwpq_gen" );
