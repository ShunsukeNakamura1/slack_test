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
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch,CURLOPT_POST, true);
$data = array(
  'ok' => 'true',
  'channel' => $json->event->channel,
  'message' => array(
    'text' => $json->event->text
  )
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$result =  curl_exec($ch);
error_log($result);
curl_close($ch);