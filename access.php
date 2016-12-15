<?php
$service_url = "https://gateway.watsonplatform.net/language-translator/api/v2/translate?source=en&target=es&text=hello";
$curl = curl_init($service_url);
$username = "8d29fbf7-9469-4b34-9e34-daa211c2a8df";
$password = "KNhawABNU6Ic";
$headers = array(
    'Content-Type:application/json'       
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl,CURLOPT_USERPWD,"$username:$password");
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$postResult = curl_exec($curl);     
if(!$postResult){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}else{
    $result = file_get_contents($curl);
    echo var_dump(json_decode($result, true));
}

// Will dump a beauty json :3


curl_close($curl);

//execute the session                
//finish off the session                
//echo "<script>console.log("..");</script>";
?>