<?php
require_once __DIR__ . '/vendor/autoload.php';
$access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
$content = file_get_contents('php://input');
$events = json_decode($content, true);
$ReplyToken = LINE\LINEBot\Event\MessageEvent($events)->getReplyToken();
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($ReplyToken, $textMessageBuilder);
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
