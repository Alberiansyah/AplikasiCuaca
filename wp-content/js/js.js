$(document).ready(function(){

});


var lat = -6.176396;
var lon = 106.826591;


function getWilayah() {
    $.getJSON('https://ibnux.github.io/BMKG-importer/cuaca/wilayah.json', function (data) {
        var items = [];
        var jml = data.length;

        //hitung jarak
        for (n = 0; n < jml; n++) {
            data[n].jarak = distance(lat, lon, data[n].lat, data[n].lon, 'K');
        }

        //urutkan berdasarkan jarak
        data.sort(urutkanJarak);

        //setelah dapat jarak,  ambil 5 terdekat
        for (n = 0; n < jml; n++) {
            items.push('<li class="list-group-item d-flex justify-content-between align-items-center">' + data[n].propinsi +
                ', ' + data[n].kota + ', ' + data[n].kecamatan + '<span class="badge badge-primary badge-pill">' + data[n].jarak.toFixed(2) + ' km</span></li>');
            if (n > 4) break
        };
        $('#judulTerdekat').html("Jarak terdekat dari " + lat + "," + lon);
        $('.provinsi').html(data[0].kota);
        $('#wilayahTerdekat').html(items.join(""));
        $('.lokasiWilayah').html(data[0].propinsi +
                ', ' + data[0].kota + ', ' + data[0].kecamatan + ' ' + data[0].jarak.toFixed(2)+" km");
        getCuaca(data[0].id);
    });
}

function getCuaca(idWilayah) {
    $.getJSON('https://ibnux.github.io/BMKG-importer/cuaca/'+idWilayah+'.json', function (data) {
        var items = [];
        var jml = data.length;    
        var timestamp = Date.now()/1000;  
        var datetime = new Date(timestamp * 1000);
        // moment(data[n].jamCuaca).format('LLL')
        

        // setelah dapat jarak,  ambil 5 terdekat
        for (n = 0; n < jml; n++) {
            $(".sekarang").html('<div class="card text-center">'+
            '<img src="wp-content/images/icons/'+
            data[n].kodeCuaca+
            '.svg" class="card-img-top">'+
            '</div>')
            $('.tempC').html(`${data[n].tempC}<sup>o</sup>C`);
            $('.tglHari').html(datetime.toTimeString(data[n].jamCuaca));

            if (n < 4) break
        };

        // setelah dapat jarak,  ambil 5 terdekat
        // for (n = 0; n < jml; n++) {
        //     items.push(`
        //                     <div class="forecast-header">
        //                     <div class="day provinsi"></div>
        //                     <div class="date tglHari">`${datetime.toTimeString(data[n].jamCuaca}`</div>
        //                 </div>
        //                 <div class="forecast-content">
        //                     <div class="lokasiWilayah"></div>
        //                     <div class="degree">
        //                         <div class="num tempC"></div>
        //                         <div class="forecast-icon sekarang">
        //                             <img src="">
        //                         </div>
        //                     </div>
        //                     <span><img src="images/icon-umberella.png" alt="">20%</span>
        //                     <span><img src="images/icon-wind.png" alt="">18km/h</span>
        //                     <span><img src="images/icon-compass.png" alt="">East</span>
        //                 </div>
        //     `);

        //     if (n < 4) break
        // };                   

        // $('.bungkus').html(items.join(""));
    });
}

// https://www.htmlgoodies.com/beyond/javascript/calculate-the-distance-between-two-points-in-your-web-apps.html
function distance(lat1, lon1, lat2, lon2) {
    var radlat1 = Math.PI * lat1 / 180
    var radlat2 = Math.PI * lat2 / 180
    var theta = lon1 - lon2
    var radtheta = Math.PI * theta / 180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180 / Math.PI
    dist = dist * 60 * 1.1515
    return Math.round((dist * 1.609344) * 1000) / 1000;
}

function urutkanJarak(a, b) {
    if (a['jarak'] === b['jarak']) {
        return 0;
    }
    else {
        return (a['jarak'] < b['jarak']) ? -1 : 1;
    }
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, onErrorGPS);
    } else {
        //ga bisa dapat GPS, pake default aja
        getWilayah();
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    getWilayah();
}

function onErrorGPS(error) {
    //ake default aja
    getWilayah();
}

function convertTZ(date, tzString) {
    return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
}

getLocation();
