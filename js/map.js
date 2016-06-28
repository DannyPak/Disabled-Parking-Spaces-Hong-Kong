var searchFlat;
var markers = [];
var mapOptions = [];
var infoWindow = new google.maps.InfoWindow;
var remove_featureType = [
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {"visibility": "off"}
        ]
    }, {
        "featureType": "transit.station.bus",
        "elementType": "all",
        "stylers": [
            {"visibility": "off"}
        ]
    }, {
        "featureType": "transit.station.rail",
        "elementType": "labels",
        "stylers": [
            {"visibility": "off"}
        ]
    }
];

$(document).ready(function () {



    $('#en').click(function () {
        window.location.href = 'index_e.php';
    });
    $('#tc').click(function () {
        window.location.href = 'index.php';
    });

    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById('schbutton');
    // When the user clicks on the button, open the modal 

    $(btn).click(function () {

        if (searchFlat !== 0) {
            modal.style.display = "block";
            searchFlat = 0;
        } else {
            modal.style.display = "none";
            searchFlat = 1;

        }

    });

    var clear = document.getElementsByClassName("clear")[0];
    $(clear).click(function () {
        $('#searchInput').val('');
        $('#searchResult').hide();
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    $(span).click(function () {
        modal.style.display = "none";
        searchFlat = 1;
    });


    var ul = document.getElementById("usrLocButton");
    $(ul).click(function () {
        getUsrLocation();
    });
    var mp = document.getElementById("mapbutton");
    $(mp).click(function () {
        geocode(id, lat, lng, qty, loc_c, loc_e);
    });

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
            searchFlat = 1;
            window.searchFlat = searchFlat;
        }
    };

    $(window).keydown(function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            return false;
        }
    });


});


function showAllMarker() {


if (document.getElementById("drawMarkerChk").checked === true) {
        drawMarker(map);
    } 
}
;

function drawMarker(map) {

    bounds = map.getBounds();
    downloadUrl("xmldom.php", function (data) {
        var xml = data.responseXML;
        var m = xml.documentElement.getElementsByTagName("marker");

        for (var i = 0; i < m.length; i++) {
            var id = m[i].getAttribute("id");
            var loc_c = m[i].getAttribute("loc_c");
            var loc_e = m[i].getAttribute("loc_e");
            var qty = m[i].getAttribute("qty");
            var lat = m[i].getAttribute("lat");
            var lng = m[i].getAttribute("lng");
            var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));


            loc_e = checkLoc_e(loc_e);


            if (bounds.contains(new google.maps.LatLng(lat, lng)) === true) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: 'img/parking.svg'
                });

                bindInfoWindow(infoWindow, marker, map, iwContent(id, lat, lng, loc_c, loc_e, qty));

                marker.setMap(map);
                markers.push(marker);

            }
            ;
        }
        ;
    });

}


function downloadUrl(url, callback) {
    var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };
    request.open('GET', url, true);
    request.send(null);
}
;
function bindInfoWindow(infoWindow, marker, map, html) {
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
        iwStyle();
    });
}

function iwContent(id, lat, lng, loc_c, loc_e, qty) {

    return '<div id="iw-container">\n\
                <div class = "iw-right-content">\n\
                    <input type="image" alt="Direction" title="Direction" src="img/direction.svg" alt="View in Google Maps" onclick="goMap(' + lat + ',' + lng + ')">\n\
    <input type="image" src="img/sv.svg" alt="Street View" title="Street View" id="strButton" onclick="panoview(' + id + ',' + lat + ',' + lng + ',' + qty + ',\'' + loc_c + '\',\'' + loc_e + '\')">\n\
</div>\n\
                <div class = "iw-title" >\n\
                    <p class ="iw-title-p1">' +
            loc_c +
            '<br>' + loc_e +
            '<br>車位數量 : ' +
            qty +
            '<br><span>  *非實時</span>\n\
                    </p>\n\n\
                </div>\n\
            </div>';

}

function geocode(id, lat, lng, qty, loc_c, loc_e) {
    document.getElementById("drawMarkerChk").checked = true;
    myPushMenu = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));
    myPushMenu._resetMenu();
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
    searchFlat = 1;
    $('#strbutton').show();
    $('#mapbutton').hide();
    $("#shw-checkbox").show();
    $("#usrLocButton").show();
    window.lat = lat;
    window.lng = lng;
    window.qty = qty;
    window.id = id;
    window.loc_c = loc_c;
    loc_e = checkLoc_e(loc_e);
    window.loc_e = loc_e;
    setMap();
}

function setMap() {

    var address = new google.maps.LatLng(lat, lng);
    var map = document.getElementById("map");
    var mapOption = {
        zoom: 16,
        center: address,
        animation: google.maps.Animation.DROP,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: false,
        mapTypeControl: false,
        streetViewControl: false

    };
    mapOptions.push(mapOption);
    map = new google.maps.Map(map, mapOption);
    map.setOptions({styles: remove_featureType});
    google.maps.event.addListener(map, 'idle', showAllMarker);
    marker = new google.maps.Marker({
        position: address,
        icon: 'img/parking.svg'
    });
    marker.setMap(map);
    var infoWindow = new google.maps.InfoWindow({
        content: iwContent(id, lat, lng, loc_c, loc_e, qty)
    });
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.open(map, marker);
    });
    infoWindow.open(map, marker);
    google.maps.event.addListener(infoWindow, 'domready', function () {
        iwStyle();
    });
    window.infoWindow = infoWindow;
    document.getElementById("drawMarkerChk").addEventListener("click", function () {
        if ($(this).is(':checked')) {

            drawMarker(map);

        } else {
            for (i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }

    });
    window.map = map;
}

function getUsrLocation() {
     

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            // Create a marker and center map on user location
            google.maps.event.trigger(map, 'resize');
            marker = new google.maps.Marker({
                position: pos,
                draggable: true,
                icon: 'img/u_tc.svg',
                title: "閣下在此",
                map: map
            });


            map.setCenter(pos);
            map.setZoom(16);
        });
    }
    document.getElementById("drawMarkerChk").addEventListener("click", function () {
        if ($(this).is(':checked')) {

            drawMarker(map);

        } else {
            for (i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }

    });
    document.getElementById("drawMarkerChk").checked = true;
    $("#shw-checkbox").show();
}

function panoview(id, lat, lng, qty, loc_c, loc_e) {
    $("#shw-checkbox").hide();
    $("#usrLocButton").hide();

    var address = new google.maps.LatLng(lat, lng);
    var panorama = new google.maps.StreetViewPanorama(
            document.getElementById("map"), {
        position: address,
        pov: {
            heading: 90,
            pitch: -20

        }
    });


    map.setStreetView(panorama);
    $('#strbutton').hide();
    $('#mapbutton').show();
    $("#shw-checkbox").hide();

    window.id = id;
    window.lat = lat;
    window.lng = lng;
    window.loc_c = loc_c;
    window.loc_e = loc_e;
    window.qty = qty;


}


function goMap(lat, lng) {

    window.open('https://maps.google.com/?q=' + lat + ',' + lng + '&ll=' + lat + ',' + lng + '&z=18');
}


function checkLoc_e(loc_e) {

    if (loc_e === "Lower Albert Rd near St. Johns Building") {
        var loc_e = "Lower Albert Rd near St. John's Building";
        return loc_e;
    } else if (loc_e === "Plunketts Rd") {
        var loc_e = "Plunkett's Rd";
        return loc_e;
    } else if (loc_e === "Lockhart Rd w/o OBrien Rd") {
        var loc_e = "Lockhart Rd w/o O'Brien Rd";
        return loc_e;
    } else if (loc_e === "Thomson Rd e/o OBrien Rd") {
        var loc_e = "Thomson Rd e/o O'Brien Rd";
        return loc_e;
    } else if (loc_e === "Tung Lo Wan Rd near Queens College") {
        var loc_e = "Tung Lo Wan Rd near Queen's College";
        return loc_e;
    } else {
        return loc_e;
    }

}


function iwStyle() {

    var iwOuter = $('.gm-style-iw');
    var iwBackground = iwOuter.prev();
    iwBackground.children(':nth-child(2)').css({'display': 'none'});
    iwBackground.children(':nth-child(4)').css({'display': 'none'});
    iwOuter.parent().parent().css({left: '0px'});
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 60px', 'z-index': '1'});
    var iwCloseBtn = iwOuter.next();
    iwCloseBtn.css({
//        display:'none'
        opacity: '1', // by default the close button has an opacity of 0.7
        right: '32px',
        top: '16px', // button repositioning
        border: '2px solid #48b5e9', // increasing button border and new color
        width: '17px',
        height: '17px',
        'border-radius': '5px', // circular effect
        'box-shadow': '0 0 2px #fff'
    });
    iwCloseBtn.mouseout(function () {
        $(this).css({opacity: '1'});
    });
}



function doNothing() {}

function trace(message)
{
    if (typeof console !== 'undefined')
    {
        console.log(message);
    }
}
