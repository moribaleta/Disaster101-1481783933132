var lat_1, lng_1;

function getData(){
    getLocation();
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

var text_data ="Data:\n";
function showPosition(position) {
    lat_1 = position.coords.latitude;
    lng_1 = position.coords.longitude;
    //map.setCenter(new google.maps.LatLng(lat, lng));
    console.log(lat_1,lng_1);
    $.ajax({
        type:'get',
        url:'http://172.16.65.235/weather.py?lat='+lat_1+'&lon='+lng_1+"",

        success:function(response){
            console.log(response);
            var text = response;
            var container = document.getElementById("data_content");
            var array = [ 'City: ','Country: ','Temperature: ','Rain: ','Clouds: ','Windspeed: ','Visibility: ','' ];
            var count = 0;
            text = text.substring(0,text.length-1);
            text.split("\n").forEach(function(item){
                var h1 = document.createElement("h1");
                h1.textContent = array[count]+item;
                text_data += array[count]+": "+item+"\n";
                container.appendChild(h1);
                count++;
            });
            sessionStorage.setItem('data',text_data);
        },
        error:function(response){
            console.log("error"+response);
        }
    });

    document.getElementById("location").value = lat_1+", "+lng_1;
}

function sendData(){
    var p = document.getElementById("p");
    p.textContent = sessionStorage.getItem('data');
    p.textContent += "Email: "+sessionStorage.getItem('email');
}


