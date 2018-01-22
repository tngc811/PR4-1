<?php
require('util.php');

// localhostでの設定
//↓実際に使うサーバ側でまた変更する必要がある。
define('CONSUMER_KEY', 'vGlvQhfPt0n0DWSkFGEndjZUp');
define('CONSUMER_SECRET', 'PuP4apQZJbdRc11GF4kPle48DRvabLJHzJzE6H9X6d6fGe87tJ');
define('CALLBACK_URL', 'https://160.16.52.117/PR4/test/auth/twitter/callback.php');

// (このままで大丈夫)
define('RTOKEN_URL', 'https://api.twitter.com/oauth/request_token');
define('AUTH_URL', 'https://api.twitter.com/oauth/authenticate');


//リクエストトークンを取得
$params = array(
	"oauth_callback" => CALLBACK_URL,
	"oauth_consumer_key" => CONSUMER_KEY,
	"oauth_nonce" => md5(microtime() . mt_rand()),
	"oauth_timestamp" => time(),
	"oauth_version" => "1.0",
	"oauth_signature_method" => "HMAC-SHA1",
);

$params['oauth_signature'] = build_signature('GET', RTOKEN_URL, $params, CONSUMER_SECRET);

// GET
$res = file_get_contents(RTOKEN_URL . '?' . http_build_query($params));

//トークンが取れたか確認
parse_str($res, $token);
if(!isset($token['oauth_token'])){

	exit;
}
$request_token = $token['oauth_token'];

//取得したトークンを配列に格納
$params = array(
	'oauth_token' => $request_token,
);

// リダイレクトする
header("Location: " . AUTH_URL . '?' . http_build_query($params));
