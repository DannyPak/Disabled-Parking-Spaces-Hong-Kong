<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>

            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">
            
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

                    background-color: #FFAC00
                    /*  background-color: #F1A80D;	*/

                }

            #map{
	position:relative;
	top: 20px;
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

            <title>Disabled Parking Spaces Hong Kong</title>


            
            <link rel="stylesheet" type="text/css" href="css/style_m.css">	
            <link rel="stylesheet" type="text/css" href="css/estilos.css">
            <link rel="stylesheet" type="text/css" href="css/demo.css" />
            <link rel="stylesheet" type="text/css" href="css/icons.css" />
            <link rel="stylesheet" type="text/css" href="css/component.css" />
            <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">        
            <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Cabin:400,500' >

    <!-- Google Maps and Places API -->
            <script async defer src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript"></script>	
<!--            <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
            <script async defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
            <script async defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js" type="text/javascript" ></script>
            <script src="js/map.js" type="text/javascript" ></script>
            <script src="js/modernizr.custom.js"></script>
<!--            <script type="text/javascript" src="js/map-icons.js"></script>-->


            <script>
                               
                   
            
            function autocomplet() {
	var min_length = 1; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'search.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
                    $('#country_list_id').hide();
	}
}
 
                // set_item : this function will be executed when we select an item
             function set_item(item) {
                        // change input value
                        $('#country_id').val(item);
                        // hide proposition list
                        $('#country_list_id').hide();
                }
            
            
            </script>
            
            

    </head>
    <body onload="initialize()">

            <div class="container">
                    <!-- Push Wrapper -->
                    <div class="mp-pusher" id="mp-pusher">
                        <div class="scroller"><!-- this is for emulating position fixed of the nav -->
                                <div class="header block block-40 clearfix">
                                    <a href="#" id="trigger" class="menu-trigger">                                        
                                        <img id="spacer" src='img/menu-icon.svg'></a>
                                </div>  
                            <div class="logo">
                                <a href="index.php">
                                    <img  id="logo" src="img/logo.svg"></a>
                            </div>
                                <div id="map">
                                    <div class="loader"><img src="img/loader.gif">
                                    </div>
                                </div>
                        </div><!-- /scroller -->
                            <!-- mp-menu -->
                            <nav id="mp-menu" class="mp-menu">
                                    <div class="mp-level">
                                            <?php require('menu.php'); ?>							
                                    </div>
                            </nav>
                        
                            <!-- /mp-menu -->


                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                      <!-- Modal content -->
                                  <div class="modal-content">
                                      <div class="modal-wrapper">
                                          <div class="search_container">
                                              <img id="searchIcon" src="img/sc_white.svg" >
                                              
                                                  <input type="text" id="country_id" onkeyup="autocomplet()" placeholder="黃大仙, Wong Tai Sin...." onblur="if (this.placeholder == '') {this.placeholder = '黃大仙, Wong Tai Sin....';}" onfocus="if (this.placeholder == '黃大仙, Wong Tai Sin....') {this.placeholder = '';}" >
                                                
                                              
                                              <span class="close"><img src="img/upArrow.svg" id="upArrow"></span>
                                              
                                            </div>
                                      
                                      <div class="modal-body">                                           
<!--                                       <div class="input_container">   -->
                                          <form>                                                                                      
                                                <ul id="country_list_id"></ul>
                                        </form>
<!--                                       </div>-->
                                      </div>
                                        <div class="modal-footer">
                                     
                                      </div>
                                    </div>
                                </div>
                            </div><!-- The Modal -->
                            <div> 
                                <div id="sch-btn">
                                    <button id="schbutton" type="button" class="btn">
                                        <img src="img/sc.svg" title="Search" class="imageBtn">
                                    </button>
                                </div>
                                <div id="str-btn">
                                    <button id="strbutton" type="button" class="hidden btn" onclick="panoview()">
                                        <img src="img/sv.svg" title="Street View" class="imageBtn">
                                    </button>
                                </div>
                                <div id="map-btn">
<!--                                    <button id="mapbutton" type="button" class="hidden btn" onclick="geocode(id,lat,lng,qty)">-->
                                    <button id="mapbutton" type="button" class="hidden btn" onclick="geocode(id,lat,lng,qty,loc_c,loc_e)">
                                        <img src="img/mp.svg" title="Map Marker" class="imageBtn">
                                    </button>
                                </div>
<!--                                <div id="all-btn">
                                    <button id="allbutton" type="button"  onclick="userLocation()">
                                        <img src="img/map.png" title="Show All" >
                                    </button>
                                </div>-->
                            </div>
                            <div id="footer">(C)Copyright</div>
                            
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