<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
   		<meta name="description" content="">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Disabled Parking Spaces Hong Kong</title>
		<link rel="icon" type="image/png" href="img/favicon.png">
		<link rel="stylesheet" href="css/style_m.css">	
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="css/map-icons.css">
		<link rel="stylesheet" href="css/map-icons.min.css">		
		<script type="text/javascript" src="js/map-icons.js"></script>

	
	<!-- Google Maps and Places API -->
	  	<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyAtIgD391Vv6rhDJJ_56AWADgTHXqcZNG4" type="text/javascript"></script>		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	 	<script type="text/javascript" language="JavaScript" src="js/function.js"></script>
		<script type="text/javascript" language="javascript" src="js/map.js"></script>
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
	
	
	<nav>
		<div id="txtRegion" class="leftContent"><?php require('regionC.php'); ?></div>
		<div id="txtDistrict" class="leftContent"></div>									
		<div id="txtArea" class="leftContent"></div>							
		<div id="txtLocation" class="leftContent"></div>						
			
		<div id="txtBtn" class="leftContent">
			<div id="sch-btn"><button type="button" id="schbutton" class="hidden schbtn" onclick="geocode()">搜尋</button></div>
		</div>
		<div id="txtQty" class="leftContent"></div>
	</nav>
			
	<div id="splash">					
		<div id="masthead">
			<div id="inner">
				<div id="header">
					&nbsp;<img id="logo" alt="logo" src="img/logo.png" >
					<img id="en" alt="EN" src="img/en.png" >
					
				</div>	
			</div>
		</div>
		</div>
		<div>
		
		
			<div id="map_canvas"></div>	
			<div id="mobile-nav" ></div>	
			<div id="go-btn"><button type="button" id="gobutton" class="hidden btn" onclick="gotomap()">在 GOOGLE MAPS 開啓</button></div>
			<div id="str-btn"><button type="button" id="strbutton" class="hidden btn" onclick="panoview()">街景服務</button></div>
			<div id="map-btn"><button type="button" id="mapbutton" class="hidden btn" onclick="geocode()">返回地圖</button></div>
		</div>
		<div id="footer">(C)Copyright</div>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  		<script src="js/mostrar_nav.js"></script>
  		

	</body>
</html>