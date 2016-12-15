
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
                var data_content = document.createElement("h3");
                /*data = data.substr(1,data.length-2);
                data +"&#x2103;";*/
                data = JSON.parse(data);
                data_content.innerHTML = "condition: "+data[0]+" "+data[1]+"</br>temperature: "+
                    data[2]+"</br>windspeed: "+data[3];
                document.getElementById('data_content').appendChild(data_content);
                document.getElementById('forecast_data').src = 'forecast.php';
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
