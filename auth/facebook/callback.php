<?php
//session_start();

define('APP_ID', '603088119870390');
define('APP_SECRET', 'eb8b7fe9febc97dbebbb9e87346e9b73');

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
//$user_id = $user->id;
//$name    = $user->name;

//$_SESSION['UserID'] = $user->id;
//echo "<script type='text/javascript'> windows.sessionStorage.setItem(['UserID'],['".$user->id."']);</script>";
echo "<script type='text/javascript'> windows.sessionStorage.setItem(['UserID'],['a']);</script>";


// 初回ユーザかチェックするロジック
exit();
if(){

    // 初回ユーザならDatabaseへの登録処理・・・などなど

}
