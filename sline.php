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
        $file = "user.json";
        $fr = file_get_contents($file);
        $arr = json_decode($fr, TRUE);
        if(count($arr) > 0){
                 foreach($file as $key => $value){
                       if($value == $event->getUserId()){
                            break;
                       }
                       else{
                            $check = true;
                       }
                  }
                if($check){
                    array_push($arr,$event->getUserId());
                    file_put_contents('user.json',json_encode($arr, TRUE), FILE_APPEND);
                    $bot->replyText($reply_token,'save');
                }else{
                    $bot->replyText($reply_token,'break'); 
                }
         }else{
             $bot->replyText($reply_token,'save new user');
             file_put_contents('user.json',json_encode('{0:'.$event->getUserId().'}', TRUE), FILE_APPEND);
         }
            
        /*foreach($val as $arr)
        {
            if($val == $event->getUserId())
            {
                $bot->replyText($reply_token,'break');
                break;
            }
            else
            {
                file_put_contents('user.json',$event->getUserId()."\n", FILE_APPEND);
                $bot->replyText($reply_token,'save');
            }
        } */
    }
}
?>
