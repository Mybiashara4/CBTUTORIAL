<?php
    

function insert_response($jsonMpesaResponse){
    try{
        $con= new PDO("mysqli:dbhost=localhost;dbnamne=payments", 'root','');
        echo "Connection was successful";
    }
    catch(PDOException $e){
        die("Error Connecting" .$e->getMessage());
    }

    try{
        $insert = $con->prepare("INSERT INTO `mobile_payments`(`TransactionType`, `TransID`, `TransTime`,`TransAmount`, `BusinessShortCode`, 
        `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`)
        VALUES ( :TransactionType, :TransID, :TransTime, :TransAmount, :BusinessShortCode, :BillRefNumber,
        :InvoiceNumber, :OrgAccountBalance, :ThirdPartyTransID, :MSISDN, :FirstName, :MiddleName, :LastName)");
        $insert->execute((array)($jsonMpesaResponse));

        $transaction = fopen('transaction.json', "a");
        fwrite($transaction, json_encode($jsonMpesaResponse));
        fclose($transaction);
    }
    catch(PDOException $e){
        $errlog= fopen('error.txt', 'a');
        fwrite($errlog, $e->getMessage());
        fclose($errlog);

        $logfailedtransaction = fopen('failedTransaction.json', 'a');
        fwrite($logfailedtransaction, json_encode($jsonMpesaResponse));
        fclose($logfailedtransaction);
    }
}
?>