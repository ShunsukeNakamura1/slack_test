<?php

echo "hello";
error_log("start");

// POST‚ðŽó‚¯Žæ‚é
$postData = file_get_contents('php://input');
error_log($postData);

// jeson‰»
$json = json_decode($postData);

/*”FØ‚Ä‚·‚Æ—p
$token = $json->token;
$challenge = $json->challenge;
$type = $json->type;
echo "HTTP 200 OK";
echo "Content-type: text/plain";
echo $challenge;*/
$url = 'https://slack.com/api/chat.postMessage'.'?token='.$json->token;

$data = array(
  'ok' => 'true',
  'channel' => $json->event->channel,
  'text' => $json->event->text
);

$result = file_get_contents($url.'&'.http_build_query($data));
error_log("--------");
error_log($result);
error_log("--------");
error_log($url.'&'.http_build_query($data));
error_log("--------");
