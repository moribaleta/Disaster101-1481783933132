<?php
// just for testing

if(isset ($_GET["w1"])) {

    $hello = $_GET["w1"];

    echo "<script language = 'text/javascript'>function sayHiFromPHP() { alert('Just wanted to say $hello!'); }</script>";
}

else
    echo "wtf";


?>
