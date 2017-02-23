<?php
require_once __DIR__ . '/vendor/autoload.php';
$access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
  foreach($op as $httpClient->longPoll())
  {
    $sender  = op[0];
    $receiver = op[1];
    $message  = op[2];
  }
print_r($sender);
?>
