<?php

/**
 * [$qqp_pairs - shortcode_attsで取得した配列をWP_Queryに反映する]
 * @var array
 */
$pairs_cat = (is_category()) ? get_query_var('cat') : 0;
$qwpq_pairs = array(
/**
 * [著者パラメーター - 特定の著者に関連付けられた投稿を表示する。]
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E6.8A.95.E7.A8.BF.E8.80.85.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (int)    [author]         [著者ID [マイナス(-)を使用することで特定の著者を省くことができる 例: 'author'   => '-1,-2,-3,']
 * @param (string) [author_name]    ['user_nicename'を指定する（名前ではない）。]
 * @param (array)  [author__in]     [著者ID（バージョン3.7以降）。]
 * @param (array)  [author__not_in] [著者ID（バージョン3.7以降）。]
 */
	'author'               => null,
	'author_name'          => null,
	'author__in'           => null,
	'author__not_in'       => null,



/**
 * カテゴリーパラメーター - 特定のカテゴリーに関連付けられた投稿を表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.AB.E3.83.86.E3.82.B4.E3.83.AA.E3.83.BC.E3.81.AE.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (int)    [cat]              [use category id.]
 * @param (string) [category_name]    [指定したカテゴリーのいずれかに属する投稿を表示する。カテゴリースラッグで指定する。]
 * @param (string) [category_name]    [指定したカテゴリーの「全て」を持つ投稿を表示する。カテゴリースラッグで指定する。]
 * @param (array)  [category__and]    [カテゴリーIDを指定する。]
 * @param (array)  [category__in]     [カテゴリーIDを指定する。]
 * @param (array)  [category__not_in] [カテゴリーIDを指定する。]
 */
	'cat'                  => null,
	'category_name'        => null,
	'category_name'        => null,
	'category__and'        => null,
	'category__in'         => null,
	'category__not_in'     => null,



/**
 * タグパラメーター - 特定のタグに関連付けられた投稿を表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.BF.E3.82.B0.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (string) [tag]           [タグスラッグを指定する。]
 * @param (int)    [tag_id]        [タグIDを指定する。]
 * @param (array)  [tag__and]      [タグIDを指定する。]
 * @param (array)  [tag__in]       [タグIDを指定する。]
 * @param (array)  [tag__not_in]   [タグIDを指定する。]
 * @param (array)  [tag_slug__and] [タグスラッグを指定する。]
 * @param (array)  [tag_slug__in]  [タグスラッグを指定する。]
 */
	'tag'                  => null,//trigger
	'tag_id'               => null,
	'tag__and'             => null,
	'tag__in'              => null,
	'tag__not_in'          => null,
	'tag_slug__and'        => null,
	'tag_slug__in'         => null,



/**
 * タクソノミーパラメーター - 特定のタクソノミーに関連付けられた投稿を表示する。
 * 重要: tax_queryはタクソノミークエリー引数の配列（入れ子の配列）をとる
 * この設定はリレーションパラメーターによって複数のタクソノミークエリーを指定している。配列の先頭でタクソノミークエリー間の関連を指定している。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.BF.E3.82.AF.E3.82.BD.E3.83.8E.E3.83.9F.E3.83.BC.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (array)            [tax_query]                     [タクソノミーパラメーターを指定する（バージョン3.1以降で有効）。]
 * @param (string)           [tax_query][relation]           [それぞれのタクソノミーを指定するのに'AND'か'OR'が使用できる。]
 * @param (string)           [tax_query][][taxonomy]         [タクソノミー。]
 * @param (string)           [tax_query][][field]            [IDかスラッグのどちらでタクソノミー項を選択するか]
 * @param (int/string/array) [tax_query][][terms]            [タクソノミー項]
 * @param (bool)             [tax_query][][include_children] [階層構造を持ったタクソノミーの場合に、子タクソノミー項を含めるかどうか。デフォルトはtrue]
 * @param (string)           [tax_query][][operator]         [テスト用の演算子。'IN' 'NOT IN' 'AND'のいずれかが使用できる]
 */
	'tax_query'            => array(
		'relation'           => null,
		array(
			'taxonomy'         => null,//trigger
			'field'            => null,
			'terms'            => null,
			'include_children' => null,
			'operator'         => null
		),
	),



/**
 * 投稿＆固定ページパラメーター - 投稿または固定ページのパタメーターをもとにコンテンツを表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E6.8A.95.E7.A8.BF.EF.BC.86.E5.9B.BA.E5.AE.9A.E3.83.9A.E3.83.BC.E3.82.B8.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (int)    [p]                   [投稿のIDを指定する。]
 * @param (string) [name]                [投稿のスラッグを指定する。]
 * @param (int)    [page_id]             [固定ページのIDを使用する。]
 * @param (string) [pagename]            [ページのスラッグを指定する。]
 *                                       [子ページを表示するには、スラッシュで区切られた親と子のスラッグを指定する。]
 * @param (int)    [post_parent]         [ページIDを指定して子ページを表示する。（階層構造の投稿タイプでのみ有効）]
 * @param (array)  [post_parent__in]     [投稿のIDの配列を使用する。投稿が持つべき親を配列で指定する。注意：3.6以降]
 * @param (array)  [post_parent__not_in] [投稿のIDの配列を使用する。投稿が持つべきでない親を配列で指定する。]
 * @param (array)  [post__in]            [投稿のIDで表示に含めるものを指定する。注意：先頭固定投稿をしている場合、意図するかどうかに関わらずそれらの投稿も条件に合致する投稿の前に追加される。先頭固定投稿を隠すには、ignore_sticky_postsを使う]
 * @param (array)  [post__not_in]        [投稿のIDで表示に含めないものを指定する。]
 *                                       [注意: 'post__in'と'post__not_in'を同じクエリーで同時に使うことはできない]
 */
//	'p'                   => null,
//	'name'                => null,
//	'page_id'             => null,
//	'pagename'            => null,
//	'post_parent'         => null,
//	'post_parent__in'     => null,
//	'post_parent__not_in' => null,
//	'post__in'            => null,
//	'post__not_in'        => null,



/**
 * パスワードパラメーター
 * @link http://codex.wordpress.org/Class_Reference/WP_Query#Password_Parameters
 * @param (bool / null)   [has_password]  [バージョン3.9以降で利用可能]
 *                                        [(bool) true  パスワード付きの投稿]
 *                                        [(bool) false パスワードが付いていない投稿 ]
 *                                        [(null) null  パスワードの有無にかかわらず全ての投稿]
 * @param (string)        [post_password] [特定のパスワードが付いた投稿（バージョン3.9以降で利用可能）]
 */
//	'has_password' => false,
//	'post_password' => null,



/**
 * タイプ＆ステータスパラメーター - 特定のタイプやステータスに関連付けられた投稿を表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.BF.E3.82.A4.E3.83.97.EF.BC.86.E3.82.B9.E3.83.86.E3.83.BC.E3.82.BF.E3.82.B9.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (string / array) [post_type] [投稿タイプを指定する。デフォルト値は'post'で、投稿が表示される。]
 *                                     [(array) 'post',        投稿。]
 *                                     [(array) 'page',        固定ページ]
 *                                     [(array) 'revision',    リビジョン。]
 *                                     [(array) 'attachment',  添付ファイル。デフォルトのWP_Queryでは'post_status'=>'published'となっているが、添付ファイルは'post_status'=>'inherit'なので、'inherit'または'any'を指定する必要がある。]
 *                                     [(array) 'my-post-type' カスタム投稿タイプ (例: movies)]
 *                                     [(string) 'any'         リビジョンと'exclude_from_search'がtrueにセットされたものを除いて、すべてのタイプを含める。]
 *                                     [注意：'any'キーワードは投稿タイプ、投稿ステータスの両方のクエリーで利用可能だが、配列の中に含めることはできない。]
 */
	'post_type' => null,



/**
 * タイプ＆ステータスパラメーター - 特定のタイプやステータスに関連付けられた投稿を表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.BF.E3.82.A4.E3.83.97.EF.BC.86.E3.82.B9.E3.83.86.E3.83.BC.E3.82.BF.E3.82.B9.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (string / array) [post_status] [投稿ステータスを指定する。デフォルトのは'publish'。]
 *                                       [(string / array) 'publish'    公開された投稿または固定ページ。]
 *                                       [(string / array) 'pending'    レビュー待ちの投稿。]
 *                                       [(string / array) 'draft'      下書きの投稿。]
 *                                       [(string / array) 'auto-draft' コンテンツのない、新しく作成された投稿。]
 *                                       [(string / array) 'future'     予約公開設定された投稿。]
 *                                       [(string / array) 'private'    ログインしていないユーザーには見えない投稿。]
 *                                       [(string / array) 'inherit'    リビジョン。get_childrenを参照。]
 *                                       [(string / array) 'trash'      ゴミ箱に入った投稿（バージョン2.9以降で有効）。]
 *                                       [(string)         'any'        投稿タイプで'exclude_from_search'がtrueにセットされているものを除いて、すべてのステータスの投稿を取得する。]
 *                                       [注意：'any'キーワードは投稿タイプ、投稿ステータスの両方のクエリーで利用可能だが、配列の中に含めることはできない。]
 */
//	'post_status' => null,



/**
 * ページ送りパラメーター
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.83.9A.E3.83.BC.E3.82.B8.E9.80.81.E3.82.8A.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * 注意：このpaging関連はトリッキーである。いくつかの参考リンク：
 * @link http://codex.wordpress.org/Function_Reference/next_posts_link#Usage_when_querying_the_loop_with_WP_Query
 * @link http://codex.wordpress.org/Pagination#Troubleshooting_Broken_Pagination
 * @param (int)     [posts_per_page]         [1ページあたりに表示する投稿数（バージョン2.1以降で有効）。'posts_per_page'=1を指定するとすべての投稿を表示する。フィード中のクエリーの場合、WordPressは'posts_per_rss'の値でこのオプションを上書きするので注意する。'post_limits'フィルターで最設定するか、'pre_option_posts_per_rss'フィルターで-1を返す。]
 * @param (int)     [posts_per_archive_page] [1ページあたりに表示する投稿数 - アーカイブページのみ。showpostsとposts_per_pageを、is_archive()かis_search()が有効の時に上書きする。]
 * @param (bool)    [nopaging]               [すべての投稿を表示するか、ページ送りを使用するか。デフォルト値は'false'で、ページ送りを使用する。]
 * @param (int)     [paged]                  [ページ数。通常"Older Entries"リンクで送ったページの数にしたがってそのページで表示される投稿が決まる。]
 *                                           [注意: クエリーでページ送りを有効にするには、get_query_var( 'page' )を指定するべきだ。WordPress3.0.2以降ではget_query_var( 'paged' )からget_query_var( 'page' )に変更になった。ページ送りパラメータの'paged'はWP_Query()は互換性のために残されている。]
 * @param (boolean) [nopaging]               [全ての投稿を表示するか、ページネーションを使用するか。デフォルト値は'false'で、ページ送りを使用する。]
 * @param (int)     [posts_per_page]         [1ページあたりに表示する投稿数（バージョン2.1以降で利用可能、showpostsパラメーターと置き換え）。'posts_per_page'=>-1を使うと全ての投稿を表示（'offset'パラメーターは値が-1の時は無視される）。このパラメーターが使われたあとページネーションが無効の場合、'paged'パラメーターを設定する。]
 *                                           [注意：フィード中のクエリーでは、wordpressは保存された'posts_per_rss'オプション値でこのパラメーターを上書きする。新たに制限を設定したい場合は、'post_limits'フィルターを使うか、'pre_option_posts_per_rss'フィルターを使い-1を返す]
 * @param (int)     [posts_per_archive_page] [1ページあたりに表示する投稿数 - アーカイブページのみ。is_archive()またはis_search()がtrueの際に、posts_per_pageとshowpostsを上書きする。]
 * @param (int)     [offset]                 [ずらして除外する投稿数。]
 *                                           [警告：offsetパラメーターを設定すると、pagedパラメーターを上書き、または無視し、ページネーションを壊す。詳細はこちらを参照： http://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination]
 *                                           ['offset'パラメーターは'posts_per_page'=>-1（全ての投稿を表示）の際に無視される。]
 * @param (int)     [paged]                  [ページ数。「過去の投稿」リンクで辿って何ページ目に表示されるべき投稿を表示するかを指定できる。]
 * @param (int)     [page]                   [固定フロントページの場合のページ数。固定フロントページで何ページ目に表示されるべき投稿を表示するかを指定できる。]
 *                                           [注意：'page'クエリー変数は、本文内で<!--nextpage-->クイックタグを含むページ分割された投稿や固定ページの場合のページ数を保持する。]
 * @param (boolean) [ignore_sticky_posts]    [先頭固定表示投稿を無視するかどうか（バージョン3.1から利用可能、caller_get_postsパラメーターと置き換え）。デフォルト値は0 - 先頭固定表示投稿を無視しない。注意：返された投稿の最初に含まれている先頭固定表示の投稿を無視／除外するが、先頭固定表示投稿は依然返された投稿のリストの自然な並び順で返される。]
 */
	'posts_per_page'            => get_option('posts_per_page'),
	'posts_per_archive_page'    => null,
	'nopaging'                  => false,
	'offset'                    => 0,
	'paged'                     => null,//get_query_var('page'),
	'page'                      => null,//get_query_var('page'),
	'ignore_sticky_posts'       => false,



/**
 * オーダー＆オーダーバイパラメーター - 投稿の並びを指定する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E9.A0.86.E5.BA.8F.EF.BC.86.E9.A0.86.E5.BA.8F.E3.83.99.E3.83.BC.E3.82.B9.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * 
 * @param (string) [order]   ['orderby'パラメーターで昇順・降順のどちらで並び替えるかを指定する。デフォルト値は'DESC'。]           
 *                           [(string) 'ASC'              最低から最高に昇順 values (1, 2, 3; a, b, c).]        
 *                           [(string) 'DESC'             最高から最低に降順 values (3, 2, 1; c, b, a).]         
 * @param (string) [orderby] [どのパラメータ値で投稿を並び替えるかの指定。デフォルト値は'date'。 ひとつまたはそれ以上のオプションを渡すことが可能。例：'orderby' => 'menu_order title']           
 *                           [(string) 'none'             並び替えない（バージョン2.8以降で有効）。]         
 *                           [(string) 'ID'               投稿IDで並び替える。Note the captialization.]       
 *                           [(string) 'author'           著者で並び替える。]           
 *                           [(string) 'title'            タイトルで並び替える。]          
 *                           [(string) 'name'             Order by post name (post slug).]         
 *                           [(string) 'date'             日付で並び替える。]         
 *                           [(string) 'modified'         更新日で並び替える。]             
 *                           [(string) 'parent'           親ページのIDで並び替える。]           
 *                           [(string) 'rand'             ランダム順。]         
 *                           [(string) 'comment_count'    コメント数で並び替える（バージョン2.9以降で有効）。]                  
 *                           [(string) 'menu_order'       ページの表示順で並び替える。よく使われるのは固定ページ（編集画面で順序欄がある）または添付ファイル（メディアの挿入/アップロード画面のギャラリーページに順序欄がある）だが、どの投稿タイプでも'menu_order'の値を指定することはできる（デフォルト値は0）。]               
 *                           [(string) 'meta_value'       'meta_key=keyname'がクエリーに存在しなければならないので注意。アルファベット順でソートされるため文字列ではうまくいくが、数値では期待した順序にならないので注意（例: 1, 3, 4, 6, 34, 56とは並ばず、1, 3, 34, 4, 56, 6とソートされる）。]               
 *                           [(string) 'meta_value_num'   数値として並び替える（バージョン2.8以降で有効）。こちらも'meta_key=keyname'がクエリーに存在しなければならないので注意。]                   
 *                           [(string) 'title menu_order' 表示順とタイトルで同時に並び替える。詳細はこちらを参照： http://wordpress.stackexchange.com/questions/2969/order-by-menu-order-and-title]                     
 *                           [(string) 'post__in'         post__inで配列で指定された投稿IDの並び順を維持する（バージョン3.5以降で利用可能）]             
 */
	'order'     => 'DESC',
	'orderby'   => 'date',



/**
 * 日付パラメーター - 特定の時間や日付の期間に基づいて投稿を表示する。
 * @link http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E6.99.82.E9.96.93.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
 * @param (int)          [year]                      [4桁の年 (例 2011)。]
 * @param (int)          [monthnum]                  [月を数字で指定（1から12）。]
 * @param (int)          [w]                         [年内の週（0から53）。MySQLのWEEKコマンドを使う。このモードは"start_of_week"オプションに依存する。]
 * @param (int)          [day]                       [月内の日（1から31）。]
 * @param (int)          [hour]                      [時間（0から23）。]
 * @param (int)          [minute]                    [分（0から60）。]
 * @param (int)          [second]                    [秒（0から60）。]
 * @param (int)          [m]                         [YearMonth (For e.g.: 201307).]
 * @param (array)        [date_query]                [日付パラメーター（バージョン3.7以降で利用可能）。]
 *                                                   [これは超強力。Codexでより分かりやすいコードサンプルをチェックせよ。 http://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters]
 * @param (int)          [date_query][year]          [4桁の年 (例 2011)。]
 * @param (int)          [date_query][month]         [月を数字で指定（1から12）。]
 * @param (int)          [date_query][week]          [年内の週（0から53）。]
 * @param (int)          [date_query][day]           [月内の日（1から31）。]
 * @param (int)          [date_query][hour]          [時間（0から23）。]
 * @param (int)          [date_query][minute]        [分（0から59）。]
 * @param (int)          [date_query][second]        [秒（0から59）。]
 * @param (string/array) [date_query][after]         [指定した日付以降の投稿を取得する。strtotime()と互換性のある文字列、または'year'、'month'、'day'の配列]
 * @param (string/array) [date_query][before]        [指定した日付以前の投稿を取得する。strtotime()と互換性のある文字列、または'year'、'month'、'day'の配列]
 * @param (string)       [date_query][before][year]  [4桁の年。デフォルトは空]
 * @param (string)       [date_query][before][month] [年内の月。数字の1から12。デフォルトは12]
 * @param (string)       [date_query][before][day]   [月内の日。数字の1から31。デフォルトは月内の末日]
 * @param (boolean)      [inclusive]                 [afterまたはbeforeパラメーターで指定された値を含むかどうか。]
 * @param (string)       [compare]                   [使用可能な値は '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'EXISTS' (WP3.5以降), and 'NOT EXISTS' (同じくWP3.5以降). Default value is '=']
 * @param (string)       [column]                    [照会するカラム。デフォルト： 'post_date'.]
 * @param (string)       [relation]                  [OR または AND、サブ配列をどう比較するか。デフォルト：AND]
 */
	'year'                      => null,
	'monthnum'                  => null,
	'w'                         => null,
	'day'                       => null,
	'hour'                      => null,
	'minute'                    => null,
	'second'                    => null,
	'm'                         => null,
	'date_query'                => array(
		array(
			'year'              => null,
			'month'             => null,
			'week'              => null,
			'day'               => null,
			'hour'              => null,
			'minute'            => null,
			'second'            => null,
			'after'             => null,
			'before'            => null,
			'inclusive'         => null,
			'compare'           => null,
			'column'            => null,
			'relation'          => null,
		),
	),



//////カスタムフィールドパラメーター - 特定のカスタムフィールドに関連付けられた投稿を表示する。
//	//http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.82.AB.E3.82.B9.E3.82.BF.E3.83.A0.E3.83.95.E3.82.A3.E3.83.BC.E3.83.AB.E3.83.89.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
//	'meta_key' => 'key',                    //(string) - カスタムフィールドのキー。
//	'meta_value' => 'value',                //(string) - カスタムフィールドの値。
//	'meta_value_num' => 10,                 //(number) - カスタムフィールドの値。
//	'meta_compare' => '=',                  //(string) - 'meta_value'をテストする演算子。使える値は'!='、'>'、'>='、'<'、'='で、デフォルト値は'='。
//	'meta_query' => array(                  //(array) - カスタムフィールドパラメーター（バージョン3.1以降で有効）。
//		 'relation' => 'AND',                 //(string) - 使用可能な値は'AND'または'OR'。meta_query内の配列が2つ以上ある場合に、それぞれを比較する論理関係。1つのmeta_query配列では使用しないこと。
//		 array(
//			'key' => 'color',                  //(string) - カスタムフィールドのキー。
//			'value' => 'blue',                  //(string/array) - カスタムフィールドの値（注意: compareの値が'IN'、'NOT IN'、'BETWEEN'、'NOT BETWEEN'の際のみ配列をサポート）。WP3.9以前を使用している場合はこのページを確認すること： http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters
//			'type' => 'CHAR',                  //(string) - カスタムフィールドタイプ。使える値は'NUMERIC'（数値）、'BINARY'（バイナリ）、'CHAR'（文字列）、'DATE'（日付）、'DATETIME'（日時）、'DECIMAL'（少数）、'SIGNED'（符号付き整数）、'TIME'（時間）、'UNSIGNED'（符号なし整数）。デフォルト値は'CHAR'。 The 'type' DATE works with the 'compare' value BETWEEN only if the date is stored at the format YYYYMMDD and tested with this format.
//			                                   //注意：'type'のDATEは'compare'の値がBETWEENで、日付はYYYYMMDDの書式で比較されるためその書式で保存されている場合のみ使用可能。
//			'compare' => '='                   //(string) - テストする演算子。使える値は'='、'!='、'>'、'>='、'<'、'<='、'LIKE'、'NOT LIKE'、'IN'、'NOT IN'、'BETWEEN'、'NOT BETWEEN', 'EXISTS' (WP3.5以降), and 'NOT EXISTS' (同じくWP3.5以降)。デフォルト値は'='。
//		),
//		 array(
//			 'key' => 'price',
//			 'value' => array( 1,200 ),
//			 'compare' => 'NOT LIKE'
//		)
//	),



//////権限パラメーター - 公開された投稿、または非公開の投稿。ユーザーが持つ権限に従う。
//	//http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E6.A8.A9.E9.99.90.E3.83.91.E3.83.A9.E3.83.A1.E3.83.BC.E3.82.BF
//	'perm' => 'readable',                    //(string) 使用可能な値は'readable'または'editable'



//////キャッシュパラメーター
//	//http://codex.wordpress.org/Class_Reference/WP_Query#Caching_Parameters
//	//注意 キャッシュは良いもの。これらをfalseにすることは通常推奨されない。
//	'cache_results' => true,                //(bool) デフォルトはtrue - 投稿の情報のキャッシュ。
//	'update_post_term_cache' => true,       //(bool) デフォルトはtrue - 投稿のメタ情報のキャッシュ。
//	'update_post_meta_cache' => true,       //(bool) デフォルトはtrue - 投稿のターム情報のキャッシュ。
//	
//	'no_found_rows' => false,               //(bool) デフォルトはfalse。WordPressはSQL_CALC_FOUND_ROWSを多くのクエリーでページネーションのために使用する。ページネーションを必要としない場合でも同様である。このパラメーターをtrueに設定することでWordPressに累計の行数を数える必要がないことを伝えDB負荷を下げることができる。このパラメーターがtrueに設定された場合はページネーションは動作しない。詳細はこちらを参照： http://flavio.tordini.org/speed-up-wordpress-get_posts-and-query_posts-functions



//////検索パラメーター
//	//http://codex.wordpress.org/Class_Reference/WP_Query#Search_Parameter
//	's' => $s,                              //(string) - 検索からクエリーストリング値を渡す。詳細な使い方は： http://www.wprecipes.com/how-to-display-the-number-of-results-in-wordpress-search
//	'exact' => true,                        //(bool) - タイトル／投稿の全体と合致するかどうかのフラグ - デフォルト値はfalse。詳細は： https://gist.github.com/luetkemj/2023628#comment-285118
//	'sentence' => true,                     //(bool) - フレーズ検索を行なうかどうかのフラグ - デフォルト値はfalse。詳細情報は： https://gist.github.com/2023628#comment-285118



//////投稿フィールドパラメーター
//	//詳細は: http://codex.wordpress.org/Class_Reference/WP_Query#Return_Fields_Parameter
//	//または https://gist.github.com/luetkemj/2023628/#comment-1003542
//	'fields' => 'ids'                       //(string) - どのフィールドを返すか。デフォルトでは全てのフィールドが返される。
//			                                //使用可能な値：
//			                                //'ids'        - 投稿のIDの配列を返す。
//			                                //'id=>parent' - 連想配列を返す。 [ parent => ID, … ]
//			                                //その他が渡されると全てのフィールドを返す（デフォルト） - 投稿オブジェクトの配列。
//////Filters
	//利用可能なフィルターについての詳細は： http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/WP_Query#.E3.83.95.E3.82.A3.E3.83.AB.E3.82.BF.E3.83.BC
);
