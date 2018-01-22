<?php
//ユーザ名を保持するためにセッションを利用
//session_start();
// アプリケーション設定
define('CONSUMER_KEY', '580811002788-3as05vpski0tqibi9v96skii4r4n6udn.apps.googleusercontent.com');
define('CONSUMER_SECRET', 'fUJ5BdVqKZxR6guKpDnbh_GR');
//サーバにあるgoogle用のcallback.phpのURLを設定(今はローカル)
define('CALLBACK_URL', '../auth/google/callback.php');
// URL
define('TOKEN_URL', 'https://accounts.google.com/o/oauth2/token');
define('INFO_URL', 'https://www.googleapis.com/oauth2/v1/userinfo');

// アクセストークンの取得
$params = array(
	'code' => $_GET['code'],
	'grant_type' => 'authorization_code',
	'redirect_uri' => CALLBACK_URL,
	'client_id' => CONSUMER_KEY,
	'client_secret' => CONSUMER_SECRET,
);
// POST送信
$options = array('http' => array(
	'method' => 'POST',
	'content' => http_build_query($params)
));

$res = file_get_contents(TOKEN_URL, false, stream_context_create($options));

// レスポンス取得
$token = json_decode($res, true);
if(isset($token['error'])){
	echo 'エラー発生';
	exit;
}
$access_token = $token['access_token'];

// ユーザー情報を取得する。
$params = array('access_token' => $access_token);
$res = file_get_contents(INFO_URL . '?' . http_build_query($params));
//echo "<pre>" . print_r(json_decode($res, true), true) . "</pre>";

//取得したユーザデータからユーザ名を取得する。
$UserData= json_decode($res,true);

//$_SESSION['UserID'] =$UserData['id'];

echo "
			<script>
			window.sessionStorage.setItem('UserID','".$UserData['id']."');
			alert('a');
			</script>
		 ";

//urlにリダイレクト(レビューページに飛ばせばいいと思う)
//header('location: ../../test.html');
//処理を終了させる
exit();
