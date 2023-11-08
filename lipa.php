<?php

//access token1
    $consumerKey = 'hTQe4Ac9vj1y0SACcGyzyDylQo3cQFpT';
    $consumerSecret = 'Jyafb0g8RNgg1oLp';

    $access_token_url ='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER,False);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result =json_decode($result);
    $access_token = $result;  
    
    curl_close($curl);
    

//initiating transaction2
    $initiate_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

        $BusinessShortCode = '174379'; //business short code
        $Timestamp = date('YmdHis');
        $partyA = '254713527077'; //This is your phone number,
        $partyB = '174379';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; //live passkey
        $CallBackURL='https://703a-105-160-107-66.ngrok-free.app/callback_url.php';
        $AccountReference= 'CART098';
        $TransactionDesc = 'pay order'; //Insert your own description
        $Amount='1';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; //live passkey
        #Get the base64 encoded string -> $password. The passkey is the M-pesa password
        $password = base64_encode ($BusinessShortCode.$Passkey.$Timestamp);
    
        $stkheader = ['Content-Type:application/json','Authorization:Basic  '.$access_token];
       
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Basic  $access_token')); //setting custom header

        $curl_post_data = array(

            //fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'customerBuyGoodsOnline',// customerBuyGoodsOnline
            'Amount' => $Amount,
            'PartyA' => $partyA,
            'PartyB' => $partyB,
            'PhoneNumber' => $partyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc,
            );

        $data_string = json_encode($curl_post_data);
        echo $data_string;

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($curl,CURLOPT_HEADER,false);

        $curl_response = curl_exec($curl);
        print_r($curl_response);
        
        echo $curl_response;









?>