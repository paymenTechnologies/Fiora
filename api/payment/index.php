<?php

include_once 'card.php';
include_once 'payment.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // important
    // please change the credentials to your own credentials
    $data['secret_key'] = '5e181e41ebb8d0.80799555';
    $data['authenticate_id'] = '3616055c9aef906320afd0621cb309bb';
    $data['authenticate_pw'] = '0cf86254452d38e1513dcc7e36267fdd';
    $data['transaction_hash'] = 'zqT5fqc3V1yIrFeE0rPjkaF2wSmldT6p5AXD8Qho5ONTINGw6nUiji79HEq4iI70n4gczl8fbusXhz5r8rmTRg==';

    // card information
    $cardInfo = array (
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'card_number' => $data['card_number'],
        'expiration_month' => $data['expiration_month'],
        'expiration_year' => $data['expiration_year'],
        'cvc' => $data['cvc'],
        'secret_key' => $data['secret_key']
    );

    $card = new Card($cardInfo);

    $data['card_info'] = $card->encryptCardInfo();

    // signature segment information
    $payment = array(
        'authenticate_id' => $data['authenticate_id'],
        'authenticate_pw' => $data['authenticate_pw'],
        'orderid' => $data['orderid'],
        'transaction_type' => $data['transaction_type'],
        'amount' => $data['amount'],
        'currency' => $data['currency'],
        'card_info' => $data['card_info'],
        'email' => $data['email'],
        'street' => $data['street'],
        'city' => $data['city'],
        'zip' => $data['zip'],
        'state' => $data['state'],
        'country' => $data['country'],
        'phone' => $data['phone'],
        'transaction_hash' => $data['transaction_hash'],
        'customerip' => $data['customerip']
    );
    // end signature segment information
    // only the above list need to calculate signature

    // additional fields,  3dsv
    if(isset($data['type']) && $data['type'] == '3DSV') {
        $payment['dob'] = $data['dob'];
        $payment['success_url'] = $data['success_url'];
        $payment['fail_url'] = $data['fail_url'];
        $payment['notify_url'] = $data['notify_url'];
    }

    // add the signature to list
    $signature = $card->calculateSignature($payment);

    $payment['signature'] = $signature;

    // integration type
    $payment['type'] = $data['type'] ?? 'API';
    
    if($payment['type'] == 'API') {
        $result = new Payment($payment);
    } elseif ($payment['type'] == '3DSV') {
        $result = new Payment($payment, "3DSV");
    }
    
    echo $result->Pay();


} else {
    // set response code - 504 Not found
    http_response_code(504);
  
    echo json_encode(
        array("message" => "Invalid Request.")
    );
}
