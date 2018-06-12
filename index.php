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

$data = $json->event->text;
$replymessage="";
$patern = '/'.getenv('BotID').'/';
error_log('patern : '.$patern);
if(preg_match($patern, $data)){
    if(preg_match('/Hello/', $data)){
        $replymessage = "Hello!\nHello";
    }else if(preg_match('/Hirayama/', $data)){
        $replyamessage = ":hrym0::hrym1::hrym2::hrym3::hrym4::hrym5::hrym6::hrym7::hrym8::hrym9::hrym10::hrym11:";
        //$replymessage = ":hrym0::hrym1::hrym2::hrym3::hrym4::hrym5::hrym6::hrym7::hrym8::hrym9::hrym10::hrym11:\n:hrym12::hrym13::hrym14::hrym15::hrym16::hrym17::hrym18::hrym19::hrym20::hrym21::hrym22::hrym23:\n:hrym24::hrym25::hrym26::hrym27::hrym28::hrym29::hrym30::hrym31::hrym32::hrym33::hrym34::hrym35:\n:hrym36::hrym37::hrym38::hrym39::hrym40::hrym41::hrym42::hrym43::hrym44::hrym45::hrym46::hrym47:\n:hrym48::hrym49::hrym50::hrym51::hrym52::hrym53::hrym54::hrym55::hrym56::hrym57::hrym58::hrym59:\n:hrym60::hrym61::hrym62::hrym63::hrym64::hrym65::hrym66::hrym67::hrym68::hrym69::hrym70::hrym71:\n:hrym72::hrym73::hrym74::hrym75::hrym76::hrym77::hrym78::hrym79::hrym80::hrym81::hrym82::hrym83:\n:hrym84::hrym85::hrym86::hrym87::hrym88::hrym89::hrym90::hrym91::hrym92::hrym93::hrym94::hrym95:\n:hrym96::hrym97::hrym98::hrym99::hrym100::hrym101::hrym102::hrym103::hrym104::hrym105::hrym106::hrym107:\n:hrym108::hrym109::hrym110::hrym111::hrym112::hrym113::hrym114::hrym115::hrym116::hrym117::hrym118::hrym119:\n:hrym120::hrym121::hrym122::hrym123::hrym124::hrym125::hrym126::hrym127::hrym128::hrym129::hrym130::hrym131:\n:hrym132::hrym133::hrym134::hrym135::hrym136::hrym137::hrym138::hrym139::hrym140::hrym141::hrym142::hrym143:";
    }
}else{
    return;
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_escape ($ch , $replymessage );
$url = 'https://slack.com/api/chat.postMessage?token='.getenv('OAuthAccessToken').'&channel='.$json->event->channel.'&text='.$replymessage;
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
error_log("--------");
error_log($result);
error_log("--------");
curl_close($ch);
