<!DOCTYPE html>
<!---- English Index Page -->
<html lang="en" class="no-js">
    <head>
        <meta name="description" content="To search on-street parking spaces designated for drivers holding the Disabled Person's Parking Permit in Hong Kong">
        <meta name="keywords" content="disabled, parking, spaces, on-street, Permit, transport, department">
        <link rev="made" href="mailto:fan.danny@gmail.com">
        <META NAME="Author" CONTENT="DANNY FAN">
        <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
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
        <meta name="apple-mobile-web-app-status-bar-style" content="#ffac00">


        <script>


            function initialize() {

                /* lang = 1: Chinese, 2: English  */
                lang = 2;
                $("#mapViewButton").removeClass('hidden');
                $("#showChkBox").removeClass('hidden');
                $('#schButton').removeClass('hidden');
                $('#usrLocButton').removeClass('hidden');
                $('#usrLocButton').hide();
                $('#spacer').removeClass('hidden');
                $('#spacer').hide();
                $('#mapViewButton').hide();
                $('#strViewButton').hide();
                $('#schButton').hide();
                $('#showChkBox').hide();
                var latlng = new google.maps.LatLng(22.3113729, 114.1719263);
                var myOptions = {
                    center: latlng,
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: false,
                    mapTypeControl: false,
                    fullscreenControl: false,
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

                var ua = window.navigator.userAgent;
                var msie = ua.indexOf("MSIE ");
                if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
                {
                    icon = '../img/u_en.png';
                } else  // If another browser, return 0
                {
                    icon = '../img/u_en.svg';
                }
                pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                // Create a marker and center map on user location
                usrMarker = new google.maps.Marker({
                    position: pos,
                    draggable: false,
                    icon: icon,
                    title: "You are Here",
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
                alert("The current position could not be found! Please enable GPS.");
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
        <script src="../js/pace.min.js" type="text/javascript"></script>
        <script async defer src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <script async defer src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="//maps.googleapis.com/maps/api/js?v=3.25&key=AIzaSyCphX_SNu5HcrQAMHbkJlt-g7vJuX_MGo0" type="text/javascript">
        </script>	
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
        <script async defer src="../js/map.js" type="text/javascript" ></script>
        <script src="../js/modernizr.custom.js" type="text/javascript"></script>
        <link rel="apple-touch-icon" sizes="57x57" href="../img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../img/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" href="../img/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="../img/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="../manifest.json">
        <link rel="mask-icon" href="../img/safari-pinned-tab.svg" color="#5bbad5">
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
                font-family: sans-serif;      
                background-color: #FFAC00;
            }

            #map{
                position:relative;  
                top:20px;
                z-index:1;
                
            }


        </style>
        <title>Disabled Parking Spaces Hong Kong</title>            
        <link rel="stylesheet" type="text/css" href="../css/style_m.css">	
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/icons.css" />
        <link rel="stylesheet" type="text/css" href="../css/component.css" />
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">     
        <!--<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Cabin:400,500' >-->
        <script>
            function autocomplet() {
                var min_length = 1; // min caracters to display the autocomplete
                var keyword = $('#searchInput').val();
                if (keyword.length >= min_length) {
                    $.ajax({
                        url: '../search.php',
                        type: 'POST',
                        data: {keyword: keyword,
                            lang: lang},
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
        <?php include_once("../analyticstracking.php") ?>

        <div class="container">
            <div class="mp-pusher" id="mp-pusher">
                <div class="scroller">
                    <div class="header block block-40 clearfix">
                        <a href="#" id="trigger" class="menu-trigger">                                        
                            <img class="hidden" id="spacer" src='../img/menu-icon.svg'></a>
                    </div>  
                    <div class="logo">
                        <a href="index.php">
                            <img  id="logo" src="../img/disabled-parking-logo.svg" alt="Disabled Parking Spaces Hong Kong" title="Disabled Parking Spaces Hong Kong"></a>
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
                            <div class="search_container" style="padding:0px 5px 0px 5px;">
                                <img id="searchIcon" src="../img/sc_white.svg" style="color:white; float:left; margin: 2px 10px 0px 0px;">                                              
                                <input type="text" id="searchInput" onkeyup="autocomplet()" placeholder="尖沙咀, Tsim Sha Tsui...." onblur="if (this.placeholder === '') {
                                            this.placeholder = '尖沙咀, Tsim Sha Tsui....';
                                        }" onfocus="if (this.placeholder === '尖沙咀, Tsim Sha Tsui....') {
                                                    this.placeholder = '';
                                                }" >
                                <span class="clrSchBtn btn" style="border-style:none; padding: 0; margin-left: 10px;">
                                    <img src="../img/cb.svg" id="clearButton" title="Clear" alt="Clear">
                                </span>                                         
                                <span class="cloSchBtn btn" style="color: #fff; float: right; margin-top: 10px;">
                                    <img src="../img/upArrow.svg" id="upArrow" title="Close" alt="Close">
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
                    <span id="ul-btn" class="btn" style="bottom:50px;right:15px;position:absolute;z-index: 2;">
                        <img src="../img/ul.svg" class="imageBtn hidden" id="usrLocButton" alt="Current Location" title="Current Location"></span>
                </div>
                <div> 
                    <div id="sch-btn" class="btn" style="right:10px; ">
                        <img src="../img/sc_white.svg" class="imageBtn hidden" id="schButton" alt="Search" title="Search"></div>

                    <div id="map-btn" class="btn">
                        <img src="../img/mp.svg"  class="imageBtn hidden" id="mapViewButton" alt="Map View" title="Map View"></div>                   
                 
                        <div id="showChkBox" class="hidden">

                        <input type="checkbox" value="None" id="drawMarkerChk" name="check" checked="checked" style="display:inline-block; width:19px; height:19px; margin:0px 2px 10px; vertical-align: middle; float:left; cursor: pointer;transform: translateY(20%)"/>
                        <label id="ctext" for="drawMarkerChk" style="margin-top: 4px; margin-right:4px; margin-bottom:2px; color:white;font-size: 0.8em;font-family: sans-serif;font-weight: 900; float:left; transform: translateY(-10%)" ></label>

                    </div>
                </div>
                <div class="hidden" id="footer">
                    <div>
                         <img id="footerBtn" alt="Information" title="Information" src="../img/info.svg" >
                       
<!--                        <p id="footerText"><a href="index.htm" target="_self">Learn More</a></p>-->
                    </div>
                    <!-- The Modal -->
                    <div id="footerModal" class="footerModal">

                        <!-- Modal content -->
                        <div class="footerModal-content">
                            <div class="footerModal-body">
                                <span class="footerClose">&times;</span>
                                <div style="text-align:center">                                    

                                    <a href="mailto:fan.danny@gmail.com?Subject=About%20Disabled%20Parking%20Spaces%20Hong%20Kong" target="_top"><img class="footerIcon" src="../img/disabled-parking-mail.png" alt="Mail" title="Email to Me" ></a>       
                                    <a href="intent://send/85293771344#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end"><img  class="footerIcon" src="../img/disabled-parking-whatsapp.png" alt="WhatsApp" title="WhatsApp to Me" ></a>
                                    <a href="https://www.facebook.com/intel.centrino.92" target="_blank"><img  class="footerIcon" src="../img/disabled-parking-facebook.png" alt="Facebook" title="My Facebook" ></a>
                                    <p>Danny Fan &copy; 2016.</p>
                                    <p>Source: <a href="http://www.td.gov.hk/en/public_services/services_for_the_people_with_disabilities/" target="_blank"><u>Transport Department</u></a>.</p>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div><!-- /pusher -->
        </div><!-- /container -->
        <script src="../js/classie.js" type="text/javascript"></script>
        <script src="../js/mlpushmenu.js" type="text/javascript"></script>
        <script>
                                            // Get the modal
                                            var footerModal = document.getElementById('footerModal');

// Get the button that opens the modal
                                            var footerBtn = document.getElementById("footerBtn");

// Get the <span> element that closes the modal
                                            var FooterSpan = document.getElementsByClassName("footerClose")[0];

// When the user clicks the button, open the modal
                                            footerBtn.onclick = function () {
                                                footerModal.style.display = "block";
                                            };

// When the user clicks on <span> (x), close the modal
                                            FooterSpan.onclick = function () {
                                                footerModal.style.display = "none";
                                            };

// When the user clicks anywhere outside of the modal, close it
                                            window.onclick = function (event) {
                                                if (event.target === footerModal) {
                                                    footerModal.style.display = "none";
                                                }
                                            };

                                            document.getElementById("ctext").innerHTML = "nearby";
                                            new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));

        </script>

    </body>
</html>