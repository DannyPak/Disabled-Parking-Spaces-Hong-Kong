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

                $("#mapViewButton").removeClass('hidden');
                $("#shw-checkbox").removeClass('hidden');
                $('#schButton').removeClass('hidden');
                $('#usrLocButton').removeClass('hidden');
                $('#usrLocButton').hide();
                $('#spacer').removeClass('hidden');
                $('#spacer').hide();
                $('#mapViewButton').hide();
                $('#strViewButton').hide();
                $('#schButton').hide();
                $('#shw-checkbox').hide();


                var latlng = new google.maps.LatLng(22.2926589, 114.1745586);
                var myOptions = {
                    center: latlng,
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: false,
                    mapTypeControl: false,
                    streetViewControl: false
                };

                map = new google.maps.Map(document.getElementById("map"), myOptions);
                window.map = map;
                map.setOptions({styles: remove_featureType});
                google.maps.event.addListener(map, 'idle', showAllMarker);
                window.map = map;
                getUsrLocation();



            }


            function getUsrLocation() {


                if (navigator.geolocation) {
                    browerSuppotFlag = true;

                    navigator.geolocation.getCurrentPosition(function (position) {

                        pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);



                        // Create a marker and center map on user location
                        usrMarker = new google.maps.Marker({
                            position: pos,
                            draggable: true,
                            icon: 'img/u_tc.svg',
                            title: "閣下在此",
                            map: map
                        });




//                        map.setCenter(pos);
//                        map.setZoom(16);
                    });
                } else {
                    browserSupportFlag = false;
                    alert("Your browser doesn't support geolocation.");

                }



            }

            function displayUsrLocation() {
                chkDrawMarker();
                map.setCenter(pos);
                map.setZoom(16);
                $("#shw-checkbox").show();
                
            }




        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript" ></script>
        <script src="js/pace.min.js" type="text/javascript" />
        <script async defer src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <script async defer src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="//maps.googleapis.com/maps/api/js?v=3.24&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript">
        </script>	
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
        <script async defer src="js/map.js" type="text/javascript" ></script>
        <script src="js/modernizr.custom.js" type="text/javascript"></script>

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
            body {

                background-color: #FFAC00;
                /*  background-color: #F1A80D;	*/

            }

            #map{
                position:relative;
                top:20px;
                z-index:1
            }


            @font-face {
                font-family: myFont;
                src: url(fonts/map-icons.woff);
            }

            @font-face {
                font-family: myFont;
                src: url(fonts/map-icons.ttf);
                font-weight: bold;
            }
            div {
                font-family: myFont;
            }


            /*                        @font-face {
                                        font-family: 'cwTeXHei';
                                        font-style: normal;
                                        font-weight: 500;      
                                        src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot);
                                        src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff2) format('woff2'),                                                            
                                            url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff) format('woff'),
                                            url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot?#iefix) format('embedded-opentype'),    
                                            url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.ttf) format('truetype');
                                        
                                    }  */



        </style>
        <title>Disabled Parking Spaces Hong Kong</title>            
        <link rel="stylesheet" type="text/css" href="css/style_m.css">	

        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/icons.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">     
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Cabin:400,500' >



        <script>
                function autocomplet() {
                var min_length = 1; // min caracters to display the autocomplete
                var keyword = $('#searchInput').val();
                if (keyword.length >= min_length) {
                    $.ajax({
                        url: 'search.php',
                        type: 'POST',
                        data: {keyword: keyword},
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
        <!--        <div class="se-pre-con">
                    <img src="img/Preloader_1.gif" alt="loading" />
                    Initializing...
                </div>-->
        <div class="container">
            <div class="mp-pusher" id="mp-pusher">
                <div class="scroller">

                    <div class="header block block-40 clearfix">
                        <a href="#" id="trigger" class="menu-trigger">                                        
                            <img class="hidden" id="spacer" src='img/menu-icon.svg'></a>
                    </div>  
                    <div class="logo">
                        <a href="index.php">
                            <img  id="logo" src="img/logo.svg"></a>
                    </div>    
                    <div id="map">

                    </div>                              
                </div><!-- /scroller -->
                <!-- mp-menu -->
                <nav id="mp-menu" class="mp-menu">
                    <div class="mp-level">
<?php require('menu.php'); ?>							
                    </div>
                </nav>

                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-wrapper">
                            <div class="search_container">
                                <img id="searchIcon" src="img/sc_white.svg" >                                              
                                <input type="text" id="searchInput" onkeyup="autocomplet()" placeholder="黃大仙, Wong Tai Sin...." onblur="if (this.placeholder === '') {
                                            this.placeholder = '黃大仙, Wong Tai Sin....';
                                        }" onfocus="if (this.placeholder === '黃大仙, Wong Tai Sin....') {
                                                    this.placeholder = '';
                                                }" >
                                <span class="clear btn"><img src="img/cb.svg" id="clearButton" title="Clear" alt="Clear"></span>                                         
                                <span class="close btn"><img src="img/upArrow.svg" id="upArrow" title="Close" alt="Close"></span>

                            </div>

                            <div class="modal-body">                                           

                                <form>                                                                                      
                                    <ul id="searchResult"></ul>
                                </form>

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div><!-- The Modal -->
                <div>
                    <span id="ul-btn" class="btn"><img src="img/ul.svg" class="hidden" id="usrLocButton" alt="Current Location" title="Current Location"></span>
                </div>
                <div> 
                    <span id="sch-btn" class="btn"><img src="img/sc.svg" class="imageBtn hidden" id="schButton" alt="Search" title="Search"></span>

                    <span id="map-btn" class="btn"><img src="img/mp.svg"  class="imageBtn hidden" id="mapViewButton" alt="Map View" title="Map View"></span>                   
                    <div id="shw-checkbox" class="hidden">
                        <div>
                            <input type="checkbox" value="None" id="drawMarkerChk" name="check" /><label id="ctext" for="drawMarkerChk" >顯示附近</label>
                        </div>

                    </div>



                </div>
                <div id="footer">(C)Copyright</div>

            </div><!-- /pusher -->
        </div><!-- /container -->

<!--        <script src="js/mostrar_nav.js"></script>-->
        <script src="js/classie.js"></script>
        <script src="js/mlpushmenu.js"></script>
        <script>
                                            new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));

        </script>
    </body>
</html>