<?php

echo "hello";
error_log("start");

// POST���󂯎��
$postData = file_get_contents('php://input');
error_log($postData);

// jeson��
$json = json_decode($postData);