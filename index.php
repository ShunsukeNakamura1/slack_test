<?php

echo "hello";
error_log("start");

// POST���󂯎��
if($_POST["user_name"] != "slackbot"){
  $text = $_POST["user_name"];
  error_log($text);
}