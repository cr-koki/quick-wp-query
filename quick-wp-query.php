<?php
/*
Plugin Name: Quick WP Query 
Plugin URI: http:// www.example.com/plugin
Description: ショートコードを用いた、記事一覧表示用プラグイン。
Author: disk2048
Version: 0.1
*/
if (!is_admin()) {
	require_once 'qwpq-pairs.php';
	require_once 'qwpq-core.php';
	require_once 'qwpq-modules.php';
	require_once 'qwpq-shortcodes.php';
}

