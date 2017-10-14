<?php

session_start();

require_once __DIR__ . '/vendors/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1739302699657439', 
  'app_secret' => '690bb1b885eb888dfcd1c46435b6d1a9',
  'default_graph_version' => 'v2.7',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
echo'logged in';
  $_SESSION['facebook_access_token'] = (string)$accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}

// OAuth 2.0 client handler
$oAuth2Client = $fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one
$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);


$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

 $userNode->getName();


?>