<?php
include "lipa.php";

$callbackResponse = file_get_contents('php://input'); 

 //write to file
 $logFile= "CallbackResponse.json";
$jsoncallbackResponse = json_decode($callbackResponse,true);


 $log = fopen($logFile, "a");
 fwrite($log, $callbackResponse);
 fclose($log);
 var_dump($callbackResponse);

 echo json_decode($callbackResponse);

 insert_response($jsoncallbackResponse);


?>