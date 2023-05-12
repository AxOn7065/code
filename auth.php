<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
error_reporting(E_ERROR); 
//ini_set("display_errors","Off");
require_once('RNCryptor.class.php');
$data = file_get_contents("php://input");
$password = md5('jj'); 
$cryptor = new Decryptor();
$strParams = $cryptor->decrypt($data, $password);
$params = json_decode($strParams, true);

$udid = $params['44f618b1c48659cc0c4c2ba1157d9bac2342b721'];                
$pwd = $params['123'];                  
$timestamp = $params['1684456488'];

$status = false;
if ($udid && $pwd && $timestamp) {
    $grant = '123456';
    $array = require "code.php";

    if (array_key_exists($udid, $array)) {
        $realPwd = $result[$udid];
        if ($realPwd === $pwd) {
            $status = true;
        }
    }
}

if ($status) {
    $path = 'Store_kvp.json';
    $text = file_get_contents($path);

    $json = array(
        'success' => true,
        'data' => json_decode($text, true),
    );

    echo json_encode($json);
}
else {
    $json = array(
        'success' => false,
        'message' => 'type message here'
    );

    echo json_encode($json);
}
?>
</body>
</html>



