<?php
// アプリケーション設定
define('CONSUMER_KEY', '580811002788-3as05vpski0tqibi9v96skii4r4n6udn.apps.googleusercontent.com');
//サーバにおいてるcallback.phpを指定する。
//またgoogle側も設定を変更する必要がある。
define('CALLBACK_URL', 'https://pr4.wjg.jp/PR4/test/auth/google/callback.php');
// URL
define('AUTH_URL', 'https://accounts.google.com/o/oauth2/auth');
//--------------------------------------
// 認証ページにリダイレクト
//--------------------------------------
$params = array(
	'client_id' => CONSUMER_KEY,
	'redirect_uri' => CALLBACK_URL,
	'scope' => 'openid profile email',
	'response_type' => 'code',
);

// リダイレクト
header("Location: " . AUTH_URL . '?' . http_build_query($params));
