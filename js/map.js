var searchFlat, markers = [], mapOptions = [], browerSupportFlag = new Boolean();
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

    document.getElementById("drawMarkerChk").addEventListener("click", function () {
        if ($(this).is(':checked')) {
            drawMarker(map);
        } else {
            for (i in markers) {
                markers[i].setMap(null);
            }
        }
    });
    $('#en').click(function () {
        window.location.href = 'index_e.php';
        lang = 2;
    });
    $('#tc').click(function () {
        window.location.href = 'index.php';
        lang = 1;
    });

    $('#logo').click(function () {
        if (lang === 1) {
            window.location.href = 'index.php';
            lang = 1;

        } else {
            window.location.href = 'index_e.php';
            lang = 2;


        }
    });


    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById('schButton');
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
//search clear button
    var clear = document.getElementsByClassName("clrSchBtn")[0];
    $(clear).click(function () {
        $('#searchInput').val('');
        $('#searchResult').hide();
    });
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("cloSchBtn")[0];
    // When the user clicks on <span> (x), close the modal
    $(span).click(function () {
        modal.style.display = "none";
        searchFlat = 1;
    });
//user location button
    var ul = document.getElementById("usrLocButton");
    $(ul).click(function () {
        document.getElementById("drawMarkerChk").checked = true;
        displayUsrLocation();
    });
    var mp = document.getElementById("mapViewButton");
    $(mp).click(function () {
//        goToLocation(id, lat, lng, qty, loc);
        goLocation(id);
    });
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
            searchFlat = 1;
            window.searchFlat = searchFlat;
        }
    };
});
function showAllMarker() {
    drawMarker(map);
}
function chkDrawMarker() {
    if ($(document.getElementById("drawMarkerChk")).is(':checked')) {
        drawMarker(map);
    } else {
        for (i in markers) {
            markers[i].setMap(null);
        }
    }
}
;
function drawMarker(map) {
    bounds = map.getBounds();
    var url = (lang === 1) ? "xmldom.php" : "xmldom_e.php";
    downloadUrl(url, function (data) {
        var xml = data.responseXML;
        var m = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < m.length; i++) {
            var id = m[i].getAttribute("id");
            var loc = m[i].getAttribute("loc");
            var qty = m[i].getAttribute("qty");
            var lat = m[i].getAttribute("lat");
            var lng = m[i].getAttribute("lng");
            var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
            var loc_iw = (lang === 2) ? checkLoc_e(loc) : loc;
            if (bounds.contains(new google.maps.LatLng(lat, lng)) === true) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: 'img/parking.svg'
                });
                bindInfoWindow(infoWindow, marker, map, iwContent(id, lat, lng, loc, loc_iw, qty));
                marker.setMap(map);
                markers.push(marker);
            }
            ;
        }
        $('#schButton').show();
        $('#usrLocButton').show();
        $('#spacer').show();
        $('#showChkBox').show();
        $('#footer').show();

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
function iwContent(id, lat, lng, loc, loc_iw, qty) {
    return (lang === 1) ? iwHTML(id, lat, lng, loc, loc_iw, qty, "車位數量", "*非實時") : iwHTML(id, lat, lng, loc, loc_iw, qty, "Quantity", "  *Non-Real Time");
}
function iwHTML(id, lat, lng, loc, loc_iw, qty, qtext1, qtext2) {
    return '<div id="iw-container" style="background-color: #48b5e9; width:246px;">\n\
                <div class = "iw-right-content">\n\
                    <input type="image" alt="Direction" title="Direction" src="img/direction.svg" alt="View in Google Maps" onclick="goMap(' + lat + ',' + lng + ')">\n\
<input type="image" src="img/sv.svg" alt="Street View" title="Street View" id="strButton" onclick="panoview(' + id + ',' + lat + ',' + lng + ',' + qty + ',\'' + loc + '\')">\n\
</div>\n\
                <div class = "iw-title" >\n\
                    <p class ="iw-title-p1">' + loc_iw +
            '<br>' + qtext1 + ': ' + qty +
            '<br><span style="font-size:0.9em;">  ' + qtext2 + '</span>\n\
                    </p>\n\n\
                </div>\n\
            </div>';
}
//    <input type="image" src="img/sv.svg" alt="Street View" title="Street View" id="strButton" onclick="panoView(' + id + ')">\n\
//function goToLocation(id, lat, lng, qty, loc) {
//    myPushMenu = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));
//    myPushMenu._resetMenu();
//    var modal = document.getElementById('myModal');
//    modal.style.display = "none";
//    searchFlat = 1;
//    $('#strViewButton').show();
//    $('#mapViewButton').hide();
//    $("#showChkBox").show();
//    $("#usrLocButton").show();
//    window.lat = lat;
//    window.lng = lng;
//    window.qty = qty;
//    window.id = id;
//    var loc_iw = (lang === 2) ? checkLoc_e(loc) : loc;
//    window.loc_iw = loc_iw;
//    window.loc = loc;
//    mapSetting();
//}



function goLocation(id) {
    myPushMenu = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));
    myPushMenu._resetMenu();
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
    searchFlat = 1;
    $('#strViewButton').show();
    $('#mapViewButton').hide();
    $("#showChkBox").show();
    $("#usrLocButton").show();

    $.ajax({
        url: 'getlocation.php',
        type: 'GET',
        dataType: 'json',
        data: {lang: lang, id: id},
        success: function (data) {
            lat = data[0];
            lng = data[1];
            qty = data[2];
            loc = data[3];
            var loc_iw = (lang === 2) ? checkLoc_e(loc) : loc;
            window.lat = lat;
            window.lng = lng;
            window.qty = qty;
            window.loc_iw = loc_iw;
            window.loc = loc;
            window.id = id;
            mapSetting();
        }
    });
}


//function panoView(id) {
//    $("#showChkBox").hide();
//    $("#usrLocButton").hide();
//    $.ajax({
//        url: 'getlocation.php',
//        type: 'GET',
//        dataType: 'json',
//        data: {lang: lang, id: id},
//        success: function (data) {
//            lat = data[0];
//            lng = data[1];
//            qty = data[2];
//            loc = data[3];
//            window.lat = lat;
//            window.lng = lng;
//            window.qty = qty;
//            window.id = id;
//            window.loc = loc;
//        }
//    });
//
//    var address = new google.maps.LatLng(lat, lng);
//    var panorama = new google.maps.StreetViewPanorama(
//            document.getElementById("map"), {
//        position: address,
//        pov: {
//            heading: 90,
//            pitch: -20
//        }
//    });
//
//    map.setStreetView(panorama);
//    $('#strViewButton').hide();
//    $('#mapViewButton').show();
//    $("#showChkBox").hide();
//    $("#usrLocButton").hide();
//
//}

function panoview(id, lat, lng, qty, loc) {
    $("#showChkBox").hide();
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
    $('#strViewButton').hide();
    $('#mapViewButton').show();
    $("#showChkBox").hide();
    $("#usrLocButton").hide();
    window.id = id;
    window.lat = lat;
    window.lng = lng;
    window.loc = loc;
    window.qty = qty;



}


function mapSetting() {
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
    google.maps.event.addListener(map, 'idle', chkDrawMarker);
    marker = new google.maps.Marker({
        position: address,
        icon: 'img/parking.svg'
    });
    marker.setMap(map);
    var infoWindow = new google.maps.InfoWindow({
        content: iwContent(id, lat, lng, loc, loc_iw, qty)
    });
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.open(map, marker);
    });
    infoWindow.open(map, marker);
    google.maps.event.addListener(infoWindow, 'domready', function () {
        iwStyle();
    });
    window.infoWindow = infoWindow;
    window.map = map;
    getUsrLocation();
    document.getElementById("drawMarkerChk").checked = false;
}



function goMap(lat, lng) {
    window.open('https://maps.google.com/?q=' + lat + ',' + lng + '&ll=' + lat + ',' + lng + '&z=18');
}
function checkLoc_e(loc_iw) {
    switch (loc_iw) {
        case "Lower Albert Rd near St. Johns Building":
            return  "Lower Albert Rd near St. John's Building";
            break;
        case "Plunketts Rd":
            return "Plunkett's Rd";
            break;
        case "Lockhart Rd w/o OBrien Rd":
            return "Lockhart Rd w/o O'Brien Rd";
            break;
        case "Thomson Rd e/o OBrien Rd":
            return "Thomson Rd e/o O'Brien Rd";
            break;
        case "Tung Lo Wan Rd near Queens College":
            return "Tung Lo Wan Rd near Queen's College";
            break;
        default:
            return loc_iw;
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
function trace(message) {
    if (typeof console !== 'undefined') {
        console.log(message);
    }
}
