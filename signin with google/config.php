
<?php 
require_once("../vendor/autoload.php");

$google_client= new Google_Client();
$google_client->setClientId("77400067352-sslv59c2d2p6mpdnivbbc7nsestliq4a.apps.googleusercontent.com");
$google_client->setClientSecret("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");
$google_client->setRedirectUri("http://localhost:82/2301C2%20php/signin%20with%20google/index.php");

$google_client->addScope("profile");
$google_client->addScope("email");

session_start();

?>