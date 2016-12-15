<!DOCTYPE html>
<html>
    <head>
        <title>PHP Starter Application</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <table>
            <tr>
                <td style='width: 30%;'>
                    <img class = 'newappIcon' src='images/newapp-icon.png'>
                </td>
                <td>
                    <h1 id = "message">                        
                    </h1>
                    <p id='description'>
                    </p> Thanks for creating a <span class="blue">PHP Starter Application</span>.
                </td>

            </tr>
        </table>
        <script>
            function displayLocation(latitude,longitude){
                var request = new XMLHttpRequest();

                var method = 'GET';
                var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
                var async = true;

                request.open(method, url, async);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        var data = JSON.parse(request.responseText);
                        var address = data.results[0];
                        //document.write(address.formatted_address);
                        var adr = address.formatted_address.split(',');
                        adr = adr[1].substr(1,adr[1].length);
                        console.log(adr);
                        //window.open("weatherapi.php?city='"+adr[1]+"'",'_blank');
                        /*$.ajax({
                                            url: "weatherapi.php?city="+adr+"",
                                            success: function(data){
                                                console.log(data);
                                            }
                                        });*/

                        $.post('weatherapi.php',{city: adr},function(data){
                            console.log(data);
                            $('#description').text(data);
                        });

                    }
                };
                request.send();
            };

            var successCallback = function(position){
                var x = position.coords.latitude;
                var y = position.coords.longitude;
                displayLocation(x,y);
            };

            var errorCallback = function(error){
                var errorMessage = 'Unknown error';
                switch(error.code) {
                    case 1:
                        errorMessage = 'Permission denied';
                        break;
                    case 2:
                        errorMessage = 'Position unavailable';
                        break;
                    case 3:
                        errorMessage = 'Timeout';
                        break;
                }
                document.write(errorMessage);
            };

            var options = {
                enableHighAccuracy: true,
                timeout: 1000,
                maximumAge: 0
            };

            navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);

        </script>
    </body>
</html>

