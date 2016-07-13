<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">      
        <!-- Chrome, Firefox OS, Opera and Vivaldi -->
        <meta name="theme-color" content="#ffac00">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#ffac00">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#48b5e9">
        <script>



            function initialize() {

                /* lang = 1: Chinese, 2: English  */
                lang = 1;
                $("#mapViewButton").removeClass('hidden');
                $("#showChkBox").removeClass('hidden');
                $('#schButton').removeClass('hidden');
                $('#usrLocButton').removeClass('hidden');
                $('#usrLocButton').hide();
                $('#spacer').removeClass('hidden');
                $('#footer').removeClass('hidden');
                $('#spacer').hide();
                $('#mapViewButton').hide();
                $('#strViewButton').hide();
                $('#schButton').hide();
                $('#showChkBox').hide();
                $('#footer').hide();
                var latlng = new google.maps.LatLng(22.2926589, 114.1745586);
                var myOptions = {
                    center: latlng,
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: false,
                    mapTypeControl: false,
                    streetViewControl: false
                };
                map = new google.maps.Map(document.getElementById("map"), myOptions);
                window.map = map;
                map.setOptions({styles: remove_featureType});
                google.maps.event.addListener(map, 'idle', chkDrawMarker);
                window.map = map;
                init = 1;
                getUsrLocation();
            }

            function getUsrLocation() {
                n = navigator.geolocation;
                n ? n.getCurrentPosition(locPosition, locError, locProp) : alert("Your brower doesn't support geolocation.");
            }

            function locPosition(position) {

                icon = (lang === 1) ? 'img/u_tc.svg' : 'img/u_en.svg';
                title = (lang === 1) ? "閣下在此" : "You are Here";
                pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                // Create a marker and center map on user location
                usrMarker = new google.maps.Marker({
                    position: pos,
                    draggable: false,
                    icon: icon,
                    title: title,
                    map: map
                });
                if (init === 1) {
                    map.panTo(pos);
                    init = 0;
                }
            }
            ;
            function locError(error) {
                // the current position could not be located
                alert("The current position could not be found!");
            }
            var locProp = {
                enableHighAccuracy: true,
                timeout: 60000,
                maximumAge: 0
            };
            function displayUsrLocation() {
                chkDrawMarker();
                map.setCenter(pos);
                map.setZoom(16);
                $("#showChkBox").show();
            }

        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript" ></script>
        <script async defer src="js/pace.min.js" type="text/javascript" ></script>
        <script async defer src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"  ></script>
        <script async defer  src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript" ></script>
        <script src="//maps.googleapis.com/maps/api/js?v=3.24&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript"></script>        	
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js" ></script>
        <script async defer src="js/map.js" type="text/javascript"  ></script>
        <script src="js/modernizr.custom.js" type="text/javascript"  ></script>
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <style>                 
            html, body, #map{
                margin: 0;
                padding:0;
                width: 100%;
                height: 100%;
                overflow-x: hidden;
                overflow-y: hidden;
            }
            /*@font-face {
                            font-family: 'Noto Sans TC';
                            font-style: normal;
                            font-weight: 400;
                            src:local('Noto Sans TC'), 
                                url(//fonts.gstatic.com/ea/notosanstc/v1/NotoSansTC-Regular.woff2) format('woff2'),
                                url(//fonts.gstatic.com/ea/notosanstc/v1/NotoSansTC-Regular.woff) format('woff'),
                                url(//fonts.gstatic.com/ea/notosanstc/v1/NotoSansTC-Regular.otf) format('opentype');
                        }*/
            body {
                font-family: sans-serif;      
                background-color: #FFAC00;
            }
            
            #map{
                position:relative;
                top:20px;
                z-index:1
            }

            /*            @font-face {
                            font-family: myFont;
                            src: url(fonts/map-icons.woff);
                        }*/

            /*            @font-face {
                            font-family: myFont;
                            src: url(fonts/map-icons.ttf);
                            font-weight: bold;
                        }*/
            div {
                font-weight: bold;
            }

        </style>
        <title>Disabled Parking Spaces Hong Kong</title>            
        <link rel="stylesheet" type="text/css" href="css/style_m.css">	
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/icons.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">     
        <script>
            function autocomplet() {
                var min_length = 1; // min caracters to display the autocomplete
                var keyword = $('#searchInput').val();
                if (keyword.length >= min_length) {
                    $.ajax({
                        url: 'search.php',
                        type: 'POST',
                        data: {keyword: keyword, lang: lang},
                        success: function (data) {
                            $('#searchResult').show();
                            $('#searchResult').html(data);
                        }
                    });
                } else {
                    $('#searchResult').hide();
                }
            }
            // set_item : this function will be executed when we select an item
            function set_item(item) {
                // change input value
                $('#searchInput').val(item);
                // hide proposition list
                $('#searchResult').hide();
            }
        </script>
    </head>
    <body onload="initialize()">
        <div class="container">
            <div class="mp-pusher" id="mp-pusher">
                <div class="scroller">
                    <div class="header block block-40 clearfix">
                        <a href="#" id="trigger" class="menu-trigger">                                        
                            <img class="hidden" id="spacer" src='img/menu-icon.svg'></a>
                    </div>  
                    <div class="logo">
                        <a>
                            <img  id="logo" src="img/logo.svg"></a>
                    </div>    
                    <div id="map">
                    </div>                              
                </div><!-- /scroller -->
                <!-- mp-menu -->
                <nav id="mp-menu" class="mp-menu"> 
                    <div class="mp-level" id="mainMenu" >  
               


                        <?php 
                             require 'menu.php'; 
                        ?>          

                    </div>
                </nav>
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-wrapper">
                            <div class="search_container" style="padding:0px 5px 0px 5px;">
                                <img id="searchIcon" src="img/sc_white.svg" style="color:white; float:left; margin: 2px 10px 0px 0px;">                                              
                                <input type="text" id="searchInput" onkeyup="autocomplet()" placeholder="黃大仙, Wong Tai Sin...." onblur="if (this.placeholder === '') {
                                            this.placeholder = '黃大仙, Wong Tai Sin....';
                                        }" onfocus="if (this.placeholder === '黃大仙, Wong Tai Sin....') {
                                                    this.placeholder = '';
                    }" >
                                <span class="clrSchBtn btn" style="border-style:none; padding: 0; margin-left: -5px;">
                                    <img src="img/cb.svg" id="clearButton" title="Clear" alt="Clear">
                                </span>                                         
                                <span class="cloSchBtn btn" style="color: #fff; float: right; margin-top: 10px;">
                                    <img src="img/upArrow.svg" id="upArrow" title="Close" alt="Close">
                                </span>
                </div>
                            <div class="modal-body">                                      
                                <form>                                                                                      
                                    <ul id="searchResult" style="background-color:#48b5e9; color: white"></ul>
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
            </div><!-- The Modal -->
            <div>
                <span id="ul-btn" class="btn" style="bottom:50px;right:10px;position:absolute;z-index: 2;"><img src="img/ul.svg" class="image Btn hidden" id="usrLocButton" alt="Current Location" title="Current Location"></span>
            </div>
            <div> 
                <span id="sch-btn" class="btn" style="right:10px; "><img src="img/sc.svg" class="imageBtn hidden" id="schButton" alt="Search" title="Search"></span>

                <span id="map-btn" class="btn"><img src="img/mp.svg"  class="imageBtn hidden" id="mapViewButton" alt="Map View" title="Map View"></span>                   
                <div id="showChkBox" class="hidden">

                    <input type="checkbox" value="None" id="drawMarkerChk" name="check" checked="checked" style="display:inline-block; width:19px; height:19px; margin:0px 2px 10px; vertical-align: middle; cursor: pointer;"/>

                    <label id="ctext" for="drawMarkerChk" style="color:white;font-size: 0.8em;font-family: sans-serif;font-weight: 500;" ></label>


                </div>
            </div>
            <div class="hidden" id="footer">
                <span>&copy; 2016 </span>
                <span style="float:right; margin-right: 20px;" id="aboutText">ABOUT</span>
            </div>

        </div><!-- /pusher -->
    </div><!-- /container -->
    <script src="js/classie.js" type="text/javascript"></script>
    <script src="js/mlpushmenu.js" type="text/javascript"></script>
    <script>



                            document.getElementById("ctext").innerHTML = "顯示附近";                                                      
                            new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));

    </script>

</body>
</html>