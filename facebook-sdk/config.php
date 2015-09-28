<?php

require_once 'facebook.php';

class Config extends Facebook {

  public $facebook;

  function __construct() {
      $this->facebook = new Facebook(array(
        'appId'  => '876274572459160',
        'secret' => 'c44768470ff9f9d7a52784f6f5fbfd9a',
      ));
      Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
      Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
  }

  function getUser() {
      $user = $this->facebook->getUser();
      return $user;
  }
}

?>
