<?php
    $headers = [
        'Authorization: Bearer mxoBWE02IJTAAEiP7UKe5CFHU5YS',
        'Content-Type: application/json'];

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

    //DATA
        $mpesaResponse = file_get_contents('php://input');

        // log the response
        $logFile = "validationResponse.json";
        $jsonMpesaResponse = json_decode($mpesaResponse,true);

        //write to file
        $log = fopen($logFile, "a");

        fwrite($log, $mpesaResponse);
        fclose($log);
        var_dump($jsonMpesaResponse);
       

        echo $response;

?>