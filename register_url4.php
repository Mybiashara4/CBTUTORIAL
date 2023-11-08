<?php

    $consumerKey = 'hTQe4Ac9vj1y0SACcGyzyDylQo3cQFpT';
    $consumerSecret = 'Jyafb0g8RNgg1oLp';

$curl = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);
$result=json_decode($result);
curl_close($curl);


    


    $url =' https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer caPwyXbJGjwBSBGqAgRoYSH5WqI7')); //setting custom header
        
    $curl_post_data = array(
        //fill in the request parameters with valid values
        'ShortCode' => '600982',
        'ResponseType' => 'Completed',
        'ConfirmationURL' => 'https://703a-105-160-107-66.ngrok-free.app/confirmation_url2.php',
        'ValidationURL' => 'https://703a-105-160-107-66.ngrok-free.app/validation3.php',

    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$data_string);

    $curl_response= curl_exec($curl);
    print_r($curl_response);
    
   echo $curl_response;
