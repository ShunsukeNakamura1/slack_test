<?php

echo "hello";
error_log("start");

// POST���󂯎��
$postData = file_get_contents('php://input');
error_log($postData);

$json = json_decode($postData);

