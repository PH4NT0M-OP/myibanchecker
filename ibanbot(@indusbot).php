<?php
/*
SOURCE CODE BY:- @Benchamxd
CHANNEL:- @INDUSBOTS
PLEASE DONT REMOVE THE CREDIT
*/
ob_start();
define('API_KEY','1349313734:AAF9xAS1aw4C_vhgdXR3-3TPGZtwHaA3T3k');
ini_set("log_errors","off");
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function indusbots($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$log = -1001220959484;
$kanal = "indusbots";
$msg = isset($update->message->text)?$update->message->text:'';

if(strpos($msg,"/iban") !== false){ 
$Domain = trim(str_replace("/iban ","",$msg)); 

$GetInfo = json_decode(file_get_contents("https://openiban.com/validate/$Domain?getBIC=true&validateBankCode=true"),true);{
$value = $GetInfo['valid'];
$indusbots1 = $GetInfo['iban'];
$indusbots2 = $GetInfo['bankData']['bankCode'];
$indusbots3 = $GetInfo['bankData']['name'];
$indusbots4 = $GetInfo['bankData']['bic'];
$indusbots5 = $GetInfo['messages'][0];
}

if($GetInfo['valid'] == 'true')
indusbots('sendMessage',[
'chat_id'=>$from_id,
'text'=> "***VALID IBAN✅****

***IBAN*** :- `$indusbots1`

***BANK CODE*** :- `$indusbots2`

***BANK NAME*** :- `$indusbots3`

***BIC*** :- `$indusbots4`

***RESPONCE*** :- `$indusbots5`

***THANKS TO @BENCHAMXD FOR THIS SOURCE***
",
'parse_mode'=>"MarkDown"
  ]);
Else{
indusbots('sendMessage',[
'chat_id'=>$from_id,
'text'=> "INVALID IBAN❌

***IBAN*** :- `$indusbots1`

***BANK CODE*** :- `$indusbots2`

***BANK NAME*** :- `$indusbots3`

***BIC*** :- `$indusbots4`

***RESPONCE*** :- `$indusbots5`

***THANKS TO @BENCHAMXD FOR THIS CODE***",
'parse_mode'=>"MarkDown"
]);
}
}else{
 indusbots('sendMessage',[
'chat_id'=>$from_id,
'text'=> "***Hello $name,

Im a Iban checker bot

use*** `/iban xxxxxxxx`


***JOIN @INDUSBOTS FOR MORE FREE BOT SOURCES***",
'parse_mode'=>"MarkDown"
]);
/*
SOURCE CODE BY:- @Benchamxd
CHANNEL:- @INDUSBOTS
PLEASE DONT REMOVE THE CREDIT
*/
}