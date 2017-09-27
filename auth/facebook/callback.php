<?php
//認証キー変更しなくてよい
define('APP_ID', '352757345171404');
define('APP_SECRET', '370f4df37193e27706956004277edcfa');

$code = $_REQUEST['code'];

$token_url = 'https://graph.facebook.com/oauth/access_token?client_id='.
    APP_ID . '&redirect_uri=' . urlencode(CALLBACK) . '&client_secret='.
    APP_SECRET . '&code=' . $code;

// access token 取得
$access_token = file_get_contents($token_url);

// ユーザ情報json取得してdecode
$user_json = file_get_contents('https://graph.facebook.com/me?' . $access_token);
$user = json_decode($user_json);

// facebook の user_id + name(表示名)をセット
$user_id = $user->id;
$name    = $user->name;

header('location:aaaaaaaa');
}
