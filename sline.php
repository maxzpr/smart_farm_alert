<?php
$access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
$httpClient = new __DIR__\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new __DIR__\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello test');
$response = $bot->pushMessage('<to>', $textMessageBuilder);
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
