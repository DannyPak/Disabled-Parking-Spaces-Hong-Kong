/* gobal mlpushmenu, mlPushMenu */

var map;
var marker;
var loc_c;
var loc_e;
var lat;
var lng;
var qty;

function trace(message) 
{
    if (typeof console != 'undefined') 
        {
        console.log(message);
        }
}



function initialize(){	
   // $('#gobutton').hide();    //$('#schbutton').hide();
    $('#mapbutton').hide();
    $('#strbutton').hide();


    var map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(22.3038046,114.1807333),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl:false,
        mapTypeControl:false,
        streetViewControl:false
    });
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
  

    
    var infoWindow = new google.maps.InfoWindow;
    

    downloadUrl("XMLDOM.php", function(data){
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
            var iwContent = '<div id="iw-container">\n\
                                    <div class = "iw-right-content">\n\
                                            <input type="image" src="img/direction-2.png" alt="View in Google Maps" onclick="goMap('+ lat + ',' + lng + ')">\n\
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
            var marker = new google.maps.Marker({
             map: map,
             position: point,
             icon: 'img/parking.png'  
             });   

         bindInfoWindow(marker, map, infoWindow, iwContent);
         }
    });
    }

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




function geocode(lat,lng,qty,loc_c,loc_e){
    $('#trigger').get(0).click();

	initialize();       
//	$('#gobutton').show();
	$('#strbutton').show();
	$('#mapbutton').hide();	
	window.lat = lat;
	window.lng = lng;
        window.qty = qty;
        window.loc_c = loc_c;
        window.loc_e = loc_e;

//	var lat = $('#lat').val();
//	var lng = $('#lng').val();	
	var address = new google.maps.LatLng(lat,lng); 	
	var map = document.getElementById("map_canvas");
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
            var iwContent = '<div id="iw-container">\n\
                                    <div class = "iw-right-content">\n\
                                            <input type="image" src="img/direction-2.png" alt="View in Google Maps" onclick="goMap('+ lat + ',' + lng + ')">\n\
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
            var infoWindow = new google.maps.InfoWindow({            
                content:iwContent

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
                document.getElementById("map_canvas"), {
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
    
    	//var zoom = map.getZoom();
	//var lat = $('#lat').val();
	//var lng = $('#lng').val();	

    window.open('http://maps.google.com/maps?q=loc:' + lat + '+' + lng);
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
        opacity: '1', // by default the close button has an opacity of 0.7
	right: '38px', 
	top: '15px', // button repositioning
	border: '1px solid #48b5e9', // increasing button border and new color
	'border-radius': '2px' // circular effect
	});

	// The API automatically applies 0.7 opacity to the button after the mouseout event.
	// This function reverses this event to the desired value.
	iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
	});
    }
    
// function gotomap(){
////var zoom = map.getZoom();
////
////    window.open('http://maps.google.com/maps?z='+ zoom +'&q=loc:' + lat + '+' + lng);
////    
////}   


		
		
		
		
		
		
		
		
