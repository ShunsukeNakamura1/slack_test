<?php

echo "hello";
error_log("start");

// POSTを受け取る
$postData = file_get_contents('php://input');
error_log($postData);

// jeson化
$json = json_decode($postData);

$token = $json->token;
$challenge = $json->challenge;
$type = $json->type;

echo "HTTP 200 OK";
echo "Content-type: text/plain";
//echo $challenge;