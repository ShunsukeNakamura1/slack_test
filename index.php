<?php

echo "hello";
error_log("start");

// POSTを受け取る
$postData = file_get_contents('php://input');
error_log($postData);

// jeson化
$json = json_decode($postData);

/*認証てすと用
$token = $json->token;
$challenge = $json->challenge;
$type = $json->type;
echo "HTTP 200 OK";
echo "Content-type: text/plain";
echo $challenge;*/
$url = 'https://slack.com/api/chat.postMessage';

$data = array(
  'ok' => 'true',
  'token' => $json->token,
  'channel' => $json->event->channel,
  'text' => $json->event->text
);

$result = file_get_contents($url.http_build_query($data));
error_log("--------");
error_log($result);
error_log("--------");
error_log($url.http_build_query($data));
error_log("--------");
