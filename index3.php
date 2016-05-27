<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
   		<meta name="description" content="">
    			
		<title>Disabled Parking Spaces Hong Kong</title>
		
		<link rel="icon" type="image/png" href="img/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/style_m.css">	
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/map-icons.css">
		<link rel="stylesheet" type="text/css" href="css/map-icons.min.css">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		
	<!-- Google Maps and Places API -->
	  	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript"></script>		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	 	<script type="text/javascript" language="JavaScript" src="js/function.js"></script>
		<script type="text/javascript" language="javascript" src="js/map.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="js/map-icons.js"></script>

		<script>
				$('#mobile-nav').click(function(event) {
					$('nav').toggleClass('active');
				});
		
				$('#sch-btn').click(function(event) {
					$('nav').toggleClass('active');
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
					<div class="block block-40 clearfix">
						<p><a href="#" id="trigger" class="menu-trigger"><img id="logo" alt="logo" src="img/logo.png" ></a></p>
					</div>														
				<div id="map_canvas"></div>
				</div><!-- /scroller -->
				<div>					
<!--					<div id="sch-btn"><button type="button" id="schbutton" class="hidden schbtn" onclick="geocode()">搜尋</button></div>-->
					<div id="go-btn"><button type="button" id="gobutton" class="hidden btn" onclick="gotomap()">在 GOOGLE MAPS 開啓</button></div>
					<div id="str-btn"><button type="button" id="strbutton" class="hidden btn" onclick="panoview()">街景服務</button></div>
					<div id="map-btn"><button type="button" id="mapbutton" class="hidden btn" onclick="geocode()">返回地圖</button></div>
				</div>
				<div id="footer">(C)Copyright</div>
			</div><!-- /pusher -->
		</div><!-- /container -->
		
		
		
		
		
		
		<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>
	</body>
</html>