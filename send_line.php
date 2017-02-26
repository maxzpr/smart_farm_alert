<?php
    if(!empty($_POST["msg"])&& is_string ($_POST["msg"])){
    require_once __DIR__ . '/vendor/autoload.php';
    $msg = $_POST["msg"];
    
    $access_token = 'VPIFT2PSZgYu3m787JdL+UrikOJLempDam0gLNe2yBt5YmsA8Sz0tFjfr+jZx6Xivxk4NDqXmVFPhIARIjA43RES6H/Twv2AkRCzJ0BwlQMUNUJfmPHeFITKEHPGHXqE/J9ea2FfEXMmchv00nwfKAdB04t89/1O/w1cDnyilFU=';
    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '75584d370097584887a2b1e843de141c']);
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_POST["msg"]);
    $file = "user.json";
    $fr = file_get_contents($file);
    $arr = json_decode($fr, TRUE);
    if($msg=='w'){
        require "./weather.php";
        $w = new Weather;
        $data = $w->getWeather("Chiangmai,th");
        $weather = $data["item"]["forecast"];
        $msg = "Weather today is ".var_dump($weather);
    }
    foreach($arr as $a){
       $response = $bot->pushMessage($a,$msg);
    }
    if($response->getHTTPStatus() == '200'){
      echo '1';
    }else{
      echo '0';
    }
  }
?>
