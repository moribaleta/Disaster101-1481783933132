<?php

$username = "8d29fbf7-9469-4b34-9e34-daa211c2a8df";
$password = "KNhawABNU6Ic";
$params = ['source'=>'en','target'=>'es','text'=>'hello'];
$defaults = array(
    CURLOPT_URL => 'https://gateway.watsonplatform.net/language-translator/api/v2/translate',
    CURLOPT_USERPWD => "$username:$password",
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
if( ($postResult = curl_exec($ch))!=null){
    $result = file_get_contents($ch);
    //echo var_dump(json_decode($result, true));
}else{
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);

$username = "0f238640-ff03-422d-a2d4-14d1302f97fa";
$password = "fNyPJsUe4S";
$params = ['units'=>'m','language'=>'en-US'];
$defaults = array(
    CURLOPT_URL => "https://twcservice.mybluemix.net/api/weather/v1/geocode/33.40/-83.42/alerts.json?language=en-US",
    CURLOPT_USERPWD => "$username:$password",
    CURLOPT_GET => true
    #CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
if( ($postResult = curl_exec($ch))!=null){
    $result = file_get_contents($ch);
    echo "<script>console.log('".var_dump(json_decode($result, true))."');</script>";

}else{
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);
?>