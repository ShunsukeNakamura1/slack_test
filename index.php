<?php

echo "hello";
error_log("start");

// POSTを受け取る
if($_POST["user_name"] != "slackbot"){
  $text = $_POST["user_name"];
  error_log($text);
}