<?php

require 'facebook.php';

$facebook = new Facebook(array(
  'appId'  => '876274572459160',
  'secret' => 'c44768470ff9f9d7a52784f6f5fbfd9a',
));
Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;

$user = $facebook->getUser();

if ($user) {
  try {
    
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

if ($user):
  echo "<a href=" . $logoutUr . ">Logout</a>";
else:
  echo "<a href=" . $loginUrl .">Login with Facebook</a>";
endif

print_r($_SESSION);

if ($user):
  echo "<img src='https://graph.facebook.com/'". $user. "/picture'>";
  print_r($user_profile);
else:
  echo "<strong><em>You are not Connected.</em></strong>";
endif

?>