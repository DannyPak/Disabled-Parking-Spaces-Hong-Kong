<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Disabled Parking Spaces Hong Kong</title>
	
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript">
		var map;
		
		function showAll(lat,lng)
		{
		
			document.getElementById("test").innerHTML="this is loader";
			var address = new google.maps.LatLng(lat,lng); 	
			var mapDiv = document.getElementById("map");
			var myOptions = {
				zoom: 12,
				
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			
			map = new google.maps.Map(mapDiv, myOptions);
			
			var marker=new google.maps.Marker({
			  position:address,
			  });
			
			marker.setMap(map);
			 
		}
		
		</script>
	</head>
	<body>
		<div id="test"></div>
		<div id="map" style="width:100%;height:100%"></div>
		
		
<?php 
		include ('dbconfig.php');
				$sql = 'SELECT lat, lng FROM location where are_id=93';
				$result = mysqli_query($link,$sql);
				
				if (!$result) {
				    echo "DB Error, could not query the database\n";
				    echo 'MySQL Error: ' . mysqli_error();
				    exit;
				}
				while ($row = mysqli_fetch_assoc($result)) {
				
				//<script type="text/javascript">showAll(22.3808923,114.1607059);</script>
				echo '<script type="text/javascript">showAll('. $row["lat"]. "," . $row["lng"].');</script>';
				   	
				    }
		
				mysqli_free_result($result);
				mysqli_close($link);
								
		?>
	
	
	</body>

</html>

