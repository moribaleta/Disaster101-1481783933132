<?php
/*session_start();
$text = $_POST['text'];
$lang = $_SESSION['lang'];
$prevlang = $_SESSION['prevlang'];*/
$text = 'Hello';
$lang = 'es';
$prevlang = 'en';

$username = "8b46b904-d994-436c-adef-f9b12c0e78e8";
$password = "yWgLha3QEkZM";
$params = ['source'=>$prevlang,'target'=>$lang,'text'=>$text];
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

?>
