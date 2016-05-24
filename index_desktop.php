<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Disabled Parking Spaces Hong Kong</title>
		<link rel="icon" type="image/png" href="img/favicon.png">
		<link rel="stylesheet" href="style.css">	
	
	<!-- Google Maps and Places API -->
	
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	 	<script type="text/javascript" language="JavaScript" src="function.js"></script>
		<script type="text/javascript" language="javascript" src="map.js"></script>
	
	</head>
	
	<body onload="initialize()">
	
	
	
	<div id="wrapper">
		<div id="header">
			<img alt="Home" src="img/banner.jpg">
		</div> 
		
		<div id="content">
			<div id="map_canvas"></div>	
				
			<div id="container">
			    <div id="txtRegion" class="leftContent"><?php include('regionE.php'); ?></div>
				<div id="txtDistrict" class="leftContent"></div>									
				<div id="txtArea" class="leftContent"></div>							
				<div id="txtLocation" class="leftContent"></div>	
						
				<div id="txtBtn" class="leftContent">
					<button type="button" id="schbutton" class="hidden btn" onclick="geocode()">Search</button>
					<button type="button" id="strbutton" class="hidden btn" onclick="panoview()">Street View</button>
					<button type="button" id="mapbutton" class="hidden btn" onclick="geocode()">Map View</button>
					<button type="button" id="gobutton" class="hidden btn" onclick="gotomap()">Open in Google Map</button>
				</div>
				<div id="txtQty" class="txtQty"></div>
			</div>
		</div>
		
		<div id="footer">
			<div id="txtFooter"> (C) Copyright</div>
		</div>

			
	</div>	
	
	</body>
</html>