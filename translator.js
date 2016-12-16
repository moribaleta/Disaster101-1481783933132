function translateData(text){
    var data_return;
    $.post('translator.php',{text: text},function(data){
        console.log(data);
        /*data = data.substr(1,data.length-2);
                data +"&#x2103;";*/
        //data = JSON.parse(data);
        data_return = data;
        /*data_content.innerHTML = data[0]+"</br>"+data[1]+"</br>"+data[2];
        data_content.innerHTML += "<br><a href='forecast.php'>view forecast</a>";
        document.getElementById('data_content').appendChild(data_content);*/
        //document.getElementById('forecast_data').src = 'forecast.php';
    });
    console.log(data_return);
    return data_return;
}
