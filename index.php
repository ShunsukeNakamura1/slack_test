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
/*
$url = 'https://slack.com/api/chat.postMessage';

$data = array(
  'token' => $json->token,
  'channel' => $json->event->channel,
  'text' => $json->event->text
);
$content = http_build_query($data);
$options = array('http' => array(
    'method' => 'POST',
    'content' => $content
));
$result = file_get_contents($url, false, stream_context_create($options));
error_log("--------");
error_log($result);
error_log("--------");
*/

$data = array(
  'token' => $json->token,
  'channel' => $json->event->channel,
  'text' => $json->event->text
);
$data_json = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://slack.com/api/chat.postMessage');
$result=curl_exec($ch);
error_log("--------");
error_log($result);
error_log("--------");
curl_close($ch);