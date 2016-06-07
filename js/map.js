var xmlhttp;
var reg_c;
var dis_c;
var are_c;
var searchFlat;



$(document).ready(function() {
        
         $("div#strbutton").removeClass("hidden");
         $("div#mapbutton").removeClass("hidden");
        

         $('#en').click(function() {
                 window.location.href = 'index_e.php';         
             });   
         $('#tc').click(function() {
                 window.location.href = 'index.php';           
             });   

             // Get the modal
             var modal = document.getElementById('myModal');
             // Get the button that opens the modal
             var btn = document.getElementById('schbutton');
             // When the user clicks on the button, open the modal 

             $(btn).click(function(){

                 if(searchFlat != 0){
                 modal.style.display="block";
                 searchFlat = 0;
             }else{
                 modal.style.display = "none";
                 searchFlat = 1;

             }
        
      
        });
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        $(span).click(function(){
            modal.style.display="none";
            searchFlat = 1;
        });
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
                 searchFlat = 1;
                 window.searchFlat = searchFlat;
                 }
            };
            
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        $('#clear').click(function() {
                $('#country_list_id').val('');
});
    });
    
    
function XMLConnect(placeHolder,URL,str){

	if (str.length == 0) {
        document.getElementById(placeHolder).innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(placeHolder).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", URL + str, true);
        xmlhttp.send();
    }	
}
	

//function showDistrict(str,URL) {
//	$('#Cbo_Area').val('0');
//	$('#Cbo_Location').val('0');
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtDistrict",URL,str);   
//	document.getElementById("Cbo_Area").disabled = true;
//	document.getElementById("Cbo_Location").disabled = true;
//
//}
//
//function showArea(str, URL) {
//	$('#Cbo_Location').val('0');
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtArea",URL,str);
//    document.getElementById("Cbo_Location").disabled = true;
//}
//
//function showLocation(str,URL) {
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtLocation",URL,str);
//}
//
//
//function showQty(str,URL)
//{
//	XMLConnect("txtQty",URL,str);	
//	$('#txtQty').show();
//	$('#schbutton').show();
//	
//   
//}

function doNothing() {}


var map;
var marker;
var loc_c;
var loc_e;
var id;
var lat;
var lng;
var qty;
var infoWindow;



function trace(message) 
{
    if (typeof console != 'undefined') 
        {
        console.log(message);
        }
}



function initialize(){	
    


    $('#mapbutton').hide();
    $('#strbutton').hide();

    var latlng= new google.maps.LatLng(22.2926589,114.1745586);
    var myOptions = {
        center: latlng,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl:false,
        mapTypeControl:false,
        streetViewControl:false
    };
    
    map = new google.maps.Map(document.getElementById("map"),myOptions); 
    window.map = map;
    
    var remove_featureType = [
        {
          "featureType": "poi",
          "elementType":"labels",
          "stylers": [
            { "visibility": "off" }
          ]
        },{
          "featureType": "transit.station.bus",     
          "elementType":"all",
          "stylers": [
            { "visibility": "off" }
          ]
      },{
          "featureType": "transit.station.rail",     
          "elementType":"labels",
          "stylers": [
            { "visibility": "off" }
          ]
      }
    ]; 
  
    map.setOptions({styles: remove_featureType});
   
    showAllMarker();
 }
  



//function userLocation()
//{
//var map = new google.maps.Map(document.getElementById('map'), {
//    center: {lat: -34.397, lng: 150.644},
//    zoom: 18
//});
//    infoWindow = new google.maps.InfoWindow({map: map});
//var options = { enableHighAccuracy: true };
//
//
//// Try HTML5 geolocation.
//if (navigator.geolocation) {
//    navigator.geolocation.getCurrentPosition(function(position) {
//        var pos = {
//            lat: position.coords.latitude,
//            lng: position.coords.longitude
//        };
//
//        infoWindow.setPosition(pos);
//        infoWindow.setContent('you are here.');
//        map.setCenter(pos);
//    }, function() {
//        handleLocationError(true, infoWindow, map.getCenter());
//    },options);
//} else {
//    // Browser doesn't support Geolocation
//    handleLocationError(false, infoWindow, map.getCenter());
//}
//iwStyle();
//function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//    infoWindow.setPosition(pos);
//    infoWindow.setContent(browserHasGeolocation ?
//                          'Error: The Geolocation service failed.' :
//                          'Error: Your browser doesn\'t support geolocation.');
//}
//}



function showAllMarker(){
    var infoWindow = new google.maps.InfoWindow;
    downloadUrl("xmldom.php", function(data){
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
            var id = markers[i].getAttribute("id");
            var loc_c = markers[i].getAttribute("loc_c");
            var loc_e = markers[i].getAttribute("loc_e");
            var qty = markers[i].getAttribute("qty");
            var lat = markers[i].getAttribute("lat");
            var lng = markers[i].getAttribute("lng");
            var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));  
            
             loc_e = checkLoc_e(loc_e);              
            

            var marker = new google.maps.Marker({
             map: map,
             position: point,
             icon: 'img/parking.svg' 
             
             });   

         bindInfoWindow(marker, map, infoWindow, iwContent(lat,lng,loc_c,loc_e,qty));
         }
    });
    
};

function downloadUrl(url,callback) {
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;
	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request, request.status);
			}
	};

	request.open('GET', url, true);
	request.send(null);
};

function bindInfoWindow(marker, map, infoWindow, html) {
    google.maps.event.addListener(marker, 'click', function() {

    infoWindow.setContent(html);
    infoWindow.open(map, marker);

    iwStyle();    
  });
 
 
}
function iwContent(lat,lng,loc_c,loc_e,qty){
            
    return '<div id="iw-container">\n\
                <div class = "iw-right-content">\n\
                    <input type="image" src="img/direction.svg" alt="View in Google Maps" onclick="goMap('+ lat + ',' + lng + ')">\n\
                </div>\n\
                <div class = "iw-title">\n\
                    <p class ="iw-title-p1">'+ 
                    loc_c + 
                    '<br>'+ loc_e + 
                    '<br>車位數量 : '+ 
                    qty + 
                    '<br><span>  *非實時</span>\n\
                    </p>\n\
                </div>\n\
            </div>'; 
}




function geocode(id, lat, lng, qty, loc_c, loc_e){

            myPushMenu = new mlPushMenu(document.getElementById( 'mp-menu' ), document.getElementById( 'trigger'));
            myPushMenu._resetMenu();

 

            var modal = document.getElementById('myModal');
             modal.style.display = "none";
             searchFlat = 1;


	initialize();       
	$('#strbutton').show();
	$('#mapbutton').hide(); 
    
	window.lat = lat;
	window.lng = lng;
             window.qty = qty;
             window.id = id;
             window.loc_c = loc_c;
             //window.loc_e = loc_e;

             loc_e = checkLoc_e(loc_e);     
             window.loc_e = loc_e;
               
     
	var address = new google.maps.LatLng(lat,lng); 	
	var map = document.getElementById("map");
	var myOptions = {
		zoom: 18,
		center: address,
		animation:google.maps.Animation.DROP,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoomControl:false,
		mapTypeControl:false,
		streetViewControl:false

	};
	
	map = new google.maps.Map(map, myOptions);
              var remove_featureType = [
               {
                 "featureType": "poi",
                 "elementType":"labels",
                 "stylers": [
                   { "visibility": "off" }
                 ]
               },{
                 "featureType": "transit.station.bus",     
                 "elementType":"all",
                 "stylers": [
                   { "visibility": "off" }
                 ]
             },{
                 "featureType": "transit.station.rail",     
                 "elementType":"labels",
                 "stylers": [
                   { "visibility": "off" }
                 ]
             }
            ]; 

             map.setOptions({styles: remove_featureType});
        

        
	marker =new google.maps.Marker({
		position:address,
		animation:google.maps.Animation.BOUNCE,
	});
	
	

	
            marker.setMap(map);     

           var infoWindow = new google.maps.InfoWindow({            
                content:iwContent(lat,lng,loc_c,loc_e,qty),
                closeBoxMargin: "10px 20px 2px 2px",
                closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",

  	});

	google.maps.event.addListener(marker, 'click', function() {
 		infoWindow.open(map,marker);
                
  	});	
  	infoWindow.open(map,marker);  	
        
        
  	google.maps.event.addListener(infoWindow, 'domready', function() {   
                iwStyle();
	});
        
        }

//

function panoview(){
	var address = new google.maps.LatLng(lat,lng); 
	var panorama = new google.maps.StreetViewPanorama(
                document.getElementById("map"), {
		        position:address,
		          pov: {
		          heading: 90,
		          pitch: -20
		        }
		      });
	map.setStreetView(panorama);
	$('#strbutton').hide();
	$('#mapbutton').show();
	
}



function goMap(lat,lng){
    
    window.open('http://maps.google.com/maps?q=loc:' + lat + '+' + lng);
}


function checkLoc_e(loc_e){
    
    if(loc_e === "Lower Albert Rd near St. Johns Building"){
       var loc_e = "Lower Albert Rd near St. John's Building";
       return loc_e;                
       }else if(loc_e === "Plunketts Rd"){
           var loc_e = "Plunkett's Rd";
           return loc_e;                  
       }else if(loc_e === "Lockhart Rd w/o OBrien Rd"){
               var loc_e = "Lockhart Rd w/o O'Brien Rd";
               return loc_e; 
       }else if(loc_e==="Thomson Rd e/o OBrien Rd"){
               var loc_e = "Thomson Rd e/o O'Brien Rd";
               return loc_e; 
       }else if(loc_e==="Tung Lo Wan Rd near Queens College"){
               var loc_e = "Tung Lo Wan Rd near Queen's College";
               return loc_e; 
       }else{
           return loc_e;
       }
    
}


function iwStyle(){
            
    // Reference to the DIV which receives the contents of the infowindow using jQuery
   var iwOuter = $('.gm-style-iw');

   /* The DIV we want to change is above the .gm-style-iw DIV.
    * So, we use jQuery and create a iwBackground variable,
    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
    */
    var iwBackground = iwOuter.prev();
    
    // Remove the background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Remove the white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
	   
    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '0px'});
		
		
    // Changes the desired color for the tail outline.
    // The outline of the tail is composed of two descendants of div which contains the tail.
    // The .find('div').children() method refers to all the div which are direct descendants of the previous div. 
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
		
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({
        
        display:'none'
//        opacity: '1', // by default the close button has an opacity of 0.7
//	right: '30px', 
//	top: '16px', // button repositioning
//      	border: '2px solid #48b5e9', // increasing button border and new color
//        'border-radius': '2px', // circular effect
//        'box-shadow': '0 0 5px #3990B9'
	});

	// The API automatically applies 0.7 opacity to the button after the mouseout event.
	// This function reverses this event to the desired value.
	iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
	});
    }
    



		
		
		
		
		
		
		
		
