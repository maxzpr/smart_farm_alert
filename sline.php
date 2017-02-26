<?php
require_once __DIR__ . '/vendor/autoload.php';
$access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");
$events = $bot->parseEventRequest($body, $signature);
foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        file_put_contents('user.json',$body."\n", FILE_WRITE);
        $id = $bot->getProfile($event->getUserId())->getJSONDecodedBody();
        $text = $event->getText();
        $bot->replyText($reply_token,"u name : ".$id["displayName"]);
    }
}
?>
