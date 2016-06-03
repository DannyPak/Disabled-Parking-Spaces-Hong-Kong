<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>

            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">

            <title>Disabled Parking Spaces Hong Kong</title>

            <link rel="icon" type="image/png" href="img/disabled_disable_wheelchair-512.png">
            <link rel="stylesheet" type="text/css" href="css/style_m.css">	
            <link rel="stylesheet" type="text/css" href="css/estilos.css">
            <link rel="stylesheet" type="text/css" href="css/map-icons.css">
            <link rel="stylesheet" type="text/css" href="css/map-icons.min.css">
            <link rel="stylesheet" type="text/css" href="css/normalize.css" />
            <link rel="stylesheet" type="text/css" href="css/demo.css" />
            <link rel="stylesheet" type="text/css" href="css/icons.css" />
            <link rel="stylesheet" type="text/css" href="css/component.css" />
            <link href='https://fonts.googleapis.com/css?family=Cabin:400,500' rel='stylesheet' type='text/css'>

    <!-- Google Maps and Places API -->
            <script async defer src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript"></script>		
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script type="text/javascript" language="JavaScript" src="js/function.js"></script>
            <script type="text/javascript" language="javascript" src="js/map.js"></script>
            <script src="js/modernizr.custom.js"></script>
            <script type="text/javascript" src="js/map-icons.js"></script>

            <script>				
                $('#sch-btn').click(function(event) {
                $('nav2').toggleClass('active');
                });
            </script>
            
            <style> 
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
            
            
            @font-face {
                    font-family: 'cwTeXHei';
                    font-style: normal;
                    font-weight: 500;
                    src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot);
                    src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot?#iefix) format('embedded-opentype'),
                         url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff2) format('woff2'),
                         url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff) format('woff'),
                         url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.ttf) format('truetype');
                  }
            
            
            
            </style>

    </head>

    <body onload="initialize()">
            <div class="container">
                    <!-- Push Wrapper -->
                    <div class="mp-pusher" id="mp-pusher">

                            <!-- mp-menu -->
                            <nav id="mp-menu" class="mp-menu">
                                    <div class="mp-level">
                                            <?php require('menu.php'); ?>							
                                    </div>
                            </nav>
                        
                            <!-- /mp-menu -->

                            <div class="scroller"><!-- this is for emulating position fixed of the nav -->
                                    <div class="header block block-40 clearfix">
                                        <a href="#" id="trigger" class="menu-trigger"><img id="logo" src="img/logo.png"></a> 
                                    </div>              
                                    <div id="map_canvas"></div>
                           
                            </div><!-- /scroller -->
                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                      <!-- Modal content -->
                                  <div class="modal-content">
                                      <div class="modal-header">
                                            <span class="close">×</span>
                                            <h2>Modal Header</h2>
                                      </div>
                                      <div class="modal-body">
                                            <p>Some text in the Modal Body</p>
                                            <p>Some other text...</p>
                                      </div>
                                      <div class="modal-footer">
                                            <h3>Modal Footer</h3>
                                      </div>
                                </div>
                            </div><!-- The Modal -->
                            <div> 
                                <div id="sch-btn">
                                    <button id="schbutton" type="button" class="btn">
                                        <img id="logo" src="img/search.png" title="Search" width="40px">
                                    </button>
                                </div>
                                <div id="str-btn">
                                    <button id="strbutton" type="button" class="hidden btn" onclick="panoview()">
                                        <img src="img/sv.png" title="Street View" width="40px">
                                    </button>
                                </div>
                                <div id="map-btn">
<!--                                    <button id="mapbutton" type="button" class="hidden btn" onclick="geocode(id,lat,lng,qty)">-->
                                    <button id="mapbutton" type="button" class="hidden btn" onclick="geocode(id,lat,lng,qty,loc_c,loc_e)">
                                        <img src="img/mp.png" title="Map Marker" width="40px">
                                    </button>
                                </div>
                            </div>
                            <div id="footer">(C)Copyright</div>
                            <a href="https://icons8.com"></a>
                    </div><!-- /pusher -->
            </div><!-- /container -->
            <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="js/mostrar_nav.js"></script>
            <script src="js/classie.js"></script>
            <script src="js/mlpushmenu.js"></script>
            <script>
            new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger') );
            </script>
    </body>
</html>