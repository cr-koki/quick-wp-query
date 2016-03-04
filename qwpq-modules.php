<?php
/**
 * 配列から空の要素を削除
 * @param any $val 要素の値
 * @return ( any )
 */
function array_filter_recursive( $input )
{
	foreach ( $input as &$value ) {
		if ( is_array( $value ) ) $value = array_filter_recursive( $value );
	}
	return array_filter( $input );
}



/**
 * JSONを配列に書き換える
 * @param any $val 要素の値
 * @return ( any )
 */
function array_json_decode_recursive( $input )
{
	foreach ( $input as &$value ) {
		if ( is_array( $value ) )          $value = array_json_decode_recursive( $value );
		if ( json_decode( $value, true ) ) $value = json_decode( $value, true );
	}
	return array_filter( $input );
}



/**
 * リンク用タグを出力
 * @return array
 */
function qwpq_set_anchor( $bool )
{
	$anchor = array( 'before' => '', 'after'  => '' );
	if ($bool == ( 'true' ) ) {
		$anchor['before'] = '<a href="' . get_the_permalink() . '">';
		$anchor['after'] = '</a>';
	}
	return $anchor;
}
