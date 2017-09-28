<?php
session_start();

require('util.php');

// サーバー側で変更する必要がある。
define('CONSUMER_KEY', 'vGlvQhfPt0n0DWSkFGEndjZUp');
define('CONSUMER_SECRET', 'PuP4apQZJbdRc11GF4kPle48DRvabLJHzJzE6H9X6d6fGe87tJ');
// ↓は変更しなくてもいいと思う。
define('TOKEN_URL', 'https://api.twitter.com/oauth/access_token');
define('INFO_URL', 'https://api.twitter.com/1.1/account/settings.json');


$params = array(
	"oauth_consumer_key" => CONSUMER_KEY,
	"oauth_nonce" => md5(microtime() . mt_rand()),
	"oauth_timestamp" => time(),
	"oauth_verifier" => $_GET['oauth_verifier'],
	"oauth_version" => "1.0",
	"oauth_signature_method" => "HMAC-SHA1",
	"oauth_token" => $_GET['oauth_token'],
);

//文字化けしてて説明の意味わからなかった
$params['oauth_signature'] = build_signature('POST', TOKEN_URL, $params, CONSUMER_SECRET);

//文字化けしてて説明の意味わからなかった
$options = array('http' => array(
	'method' => 'POST',
	'content' => http_build_query($params)
));
$res = file_get_contents(TOKEN_URL, false, stream_context_create($options));

//文字化けしてて説明の意味わからなかった
parse_str($res, $token);
$access_token = $token['oauth_token'];
$access_token_secret = $token['oauth_token_secret'];

//twitterのユーザid取得
$user_id= $token['user_id'];
$user_name= $token['screen_name'];

//--------------------------------------
// ユーザ情報取得
//--------------------------------------
$params = array(
	"oauth_consumer_key" => CONSUMER_KEY,
	"oauth_nonce" => md5(microtime() . mt_rand()),
	"oauth_timestamp" => time(),
	"oauth_verifier" => $_GET['oauth_verifier'],
	"oauth_version" => "1.0",
	"oauth_signature_method" => "HMAC-SHA1",
	"oauth_token" => $access_token,
);

$params['oauth_signature'] = build_signature('GET', INFO_URL, $params, CONSUMER_SECRET, $access_token_secret);
$res = file_get_contents(INFO_URL . '?' . http_build_query($params));


//sessionにユーザidを保存
$_SESSION['UserID'] = $user_id;
echo $_SESSION['UserID'];


//↓リダイレクト処理、(レビューページに飛ばせばいいと思う)
header('location:../../PR4/login.html');
//処理を終了させる
exit();
