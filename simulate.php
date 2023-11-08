<?php
$url ='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

$accesstoken ='8SrEbtheNGhDGenGI7MG185fG9UY';

$ShortCode = '600982';
$Amount = '1';
$Msisdn = '254708374149';
$BillRefNumber ='invoice90'; 

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer 8SrEbtheNGhDGenGI7MG185fG9UY')); //setting custom header
    
    $curl_post_data = array(
         //fill in the request parameters with valid values
         'ShortCode'     => $ShortCode,
         'CommandID'     => 'CustomerPayBillOnline',
         'Amount'        => $Amount,
         'Msisdn'        => $Msisdn,
         'BillRefNumber' => $BillRefNumber

    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS, $data_string);

    $response = curl_exec($curl);
    print_r($response);

    echo $response;





?>