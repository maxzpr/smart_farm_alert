<?php
    if(!empty($_POST["header"])&&!empty($_POST["msg"])){
    require_once __DIR__ . '/vendor/autoload.php';
    $header = $_POST["header"];
    if($header=='w'){
        require "./weather.php";
        $w = new Weather;
        $data = $w->getWeather("Chiangmai,th");
        $weather = $data["item"]["forecast"];
        //$msg = $weather[0]["date"]."Weather today is ".$weather[0]["text"];
        foreach($weather as $key=>$value){
            $msg.=$key."".$value["date"]."Weather today is ".$value["text"];
        }
        //$msg = print_r($weather,true);
    }
    if($header=='m'){
        $msg = $_POST['msg'];
    }
    $access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
    $file = "user.json";
    $fr = file_get_contents($file);
    $arr = json_decode($fr, TRUE);
     foreach($arr as $a){
           $response = $bot->pushMessage($a,$textMessageBuilder);
        }
        if($response->getHTTPStatus() == '200'){
          echo '1';
        }else{
          echo '0';
        }
  }

?>
