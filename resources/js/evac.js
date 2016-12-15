
var arr_evac;

function evac_place(lat_1,lng_1,val_name){
    this.lat =lat_1;
    this.lng =lng_1;
    this.name = val_name;
}

function getEvac(){
     var text = null;
    $.ajax({
        url:'http://172.16.65.235/sqlite_helper.py',
        success: function(response){
            response.split("\n").forEach(function(value){
                value = value.split(';');
                var infowindow = new google.maps.InfoWindow({map:map});
                var currlocation = {lat: value[1], lng: value[2]}
                infowindow.setPosition(currlocation);    infowindow.setContent(value[3]);
            });
        },
        error: function(response){
            console.log("error"+response)
        }
    });

}

function getWeather(){



}
