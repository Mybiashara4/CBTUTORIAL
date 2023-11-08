<?php

    $consumerKey = 'hTQe4Ac9vj1y0SACcGyzyDylQo3cQFpT';
    $consumerSecret = 'Jyafb0g8RNgg1oLp';

$curl = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
curl_close($curl);
echo $response;

?>