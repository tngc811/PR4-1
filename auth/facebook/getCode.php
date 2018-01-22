<?php

define('APP_ID', '352757345171404');
define('APP_SECRET', '370f4df37193e27706956004277edcfa');
define('CALLBACK', '../auth/facebook/callback.php');

$authURL = 'http://www.facebook.com/dialog/oauth?client_id=' .
    APP_ID . '&redirect_uri=' . urlencode(CALLBACK);

header("Location: " . $authURL);
