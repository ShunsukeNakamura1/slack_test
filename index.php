<?php

echo "hello";
error_log("start");

// POST���󂯎��
$postData = file_get_contents('php://input');
error_log($postData);

// jeson��
$json = json_decode($postData);

/*�F�؂Ă��Ɨp
$token = $json->token;
$challenge = $json->challenge;
$type = $json->type;
echo "HTTP 200 OK";
echo "Content-type: text/plain";
echo $challenge;*/

$data = $json->event->text;
$replymessage="";
if(preg_match('/*@Test*/', $data)){
    if(preg_match('/*Hello*/', $data)){
        $replymessage = "Hello!\nHello";
    }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$url = 'https://slack.com/api/chat.postMessage?token='.getenv('OAuthAccessToken').'&channel='.$json->event->channel.'&text='.$replymessage;
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
error_log("--------");
error_log($result);
error_log("--------");
curl_close($ch);
