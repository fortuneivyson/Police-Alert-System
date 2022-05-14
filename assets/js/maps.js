
getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    // localStorage.setItem('lat',position.coords.latitude);
    // localStorage.setItem('lng',position.coords.longitude);

}

var id, options;

function success(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;

    localStorage.setItem('lat',lat);
    localStorage.setItem('lng',lng);
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: '../verify.php',
    //         data: {
    //             update_now: id,
    //             lat: lat,
    //             lng: lng
    //         },
    //         dataType: 'json',
    //         success: function (response) {
    //
    //             console.log('updated');geocode/json?latlng=-27.0000,133.0000
    //
    //         }});
    // }

    $('#mapsFrame').attr('src',"https://www.google.com/maps/embed/v1/place?q="+lat+","+lng+"&key=AIzaSyAQi5jU-qYbiD4LwyrOrJllLCGaZyRBSUM");

}

function error(err) {
    console.warn('ERROR(' + err.code + '): ' + err.message);
}

options = {
    enableHighAccuracy: false,
    timeout: 100000,
    maximumAge: 0
};

navigator.geolocation.watchPosition(success, error, options);
