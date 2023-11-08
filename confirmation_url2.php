<?php
require 'config.php';
    $headers = [
        'Authorization: Bearer o3k4k1LAepNIZ34QmFUIuPzBAnnV',
        'Content-Type: application/json'];

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

    //DATA
        $mpesaResponse = file_get_contents('php://input'); 

        // log the response
        $logFile = "M_PESAConfirmationResponse.json";

        $jsonMpesaResponse = json_decode($mpesaResponse,true);

        $transaction = array(
            ":TransactionType"     => 'TransactionType',
            ":TransID"             =>'TransID',
            ":TransTime"           =>'TransactionTime',
            ":TransAmount"         =>'TransAmount', 
            ":BusinessShortCode"   =>'BusinessShortCode', 
            ":BillRefNumber"       =>'BillRefNumber',
            ":InvoiceNumber"       =>'InvoiceNumber', 
            ":OrgAccountBalance"   =>'OrgAccountBalance',
            ":ThirdPartyTransID"   =>'ThirdPartyTransID',
            ":MSISDN"              =>'MSISDN', 
            ":FirstName"           =>'FirstName', 
            ":MiddleName"          =>'MiddleName', 
            ":LastName"            =>'LastName'
        );
        


        //write to file
        $log = fopen($logFile, "a");
        fwrite($log, $mpesaResponse);
        fclose($log);
        
        echo $response;

        insert_response($transaction);
?>