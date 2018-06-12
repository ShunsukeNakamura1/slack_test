<?php

echo "hello";
error_log("start");

// POST‚ðŽó‚¯Žæ‚é
if($_POST["user_name"] != "slackbot"){
  $text = $_POST["user_name"];
  error_log($text);
}