<?php
/*$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/


$username = "30f5453d-df6d-40a9-ac3a-221669095b64";
$password = "zY4IBYDmV7zr";
$header = ["Content-Type: audio/flac"];
$filename = $_FILES['file']['name'];
$postfields = array("filedata" => "@$filedata", "filename" => $filename);
//$params = ['version'=>'2016-05-19','text'=>'A%20word%20is%20dead%20when%20it%20is%20said,%20some%20say.%20Emily%20Dickinson'];
$defaults = array(
    CURLOPT_URL => "https://stream.watsonplatform.net/speech-to-text/api/v1/recognize?timestamps=true&word_alternatives_threshold=0.9&keywords=%22colorado%22%2C%22tornado%22%2C%22tornadoes%22&keywords_threshold=0.5&continuous=true",
    CURLOPT_USERPWD => "$username:$password",
    CURLOPT_GET => true,
  //  CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch,$defaults);
if( ($postResult = curl_exec($ch))!=null){
    $result = file_get_contents($ch);

    $anger = $result["document_tone"]["tone_categories"];
    echo "<br><br>THIS<br><br>";
    echo $anger;

}else{
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
curl_close($ch);

?>
