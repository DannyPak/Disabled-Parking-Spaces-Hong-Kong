var xmlhttp;


$(document).ready(function() {
    $("div#schbutton").removeClass("hidden");
    $("div#strbutton").removeClass("hidden");
    $("div#mapbutton").removeClass("hidden");
    $("div#gobutton").removeClass("hidden");
    $("div#labelQty").removeClass("hidden");
 	$('#en').click(function() {
            window.location.href = 'index_e.php';         
        });    
    
    $('#tc').click(function() {
            window.location.href = 'index.php';
           
        });
     
	});

function showDistrictC(str) {

	$('#Cbo_Area').val('0');
	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
    if (str.length == 0) {
        document.getElementById("txtDistrict").innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtDistrict").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "districtC.php?q=" + str, true);
        xmlhttp.send();
    }
    
	document.getElementById("Cbo_Area").disabled = true;
	document.getElementById("Cbo_Location").disabled = true;

}

function showDistrictE(str) {


	$('#Cbo_Area').val('0');
	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();




    if (str.length == 0) {
        document.getElementById("txtDistrict").innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtDistrict").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "districtE.php?q=" + str, true);
        xmlhttp.send();
    }
    
	document.getElementById("Cbo_Area").disabled = true;
	document.getElementById("Cbo_Location").disabled = true;

}



function showAreaC(str) {

	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();


    if (str.length == 0) {
        document.getElementById("txtArea").innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtArea").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "areaC.php?q=" + str, true);
        xmlhttp.send();
    }
    document.getElementById("Cbo_Location").disabled = true;
}


function showAreaE(str) {

	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();


    if (str.length == 0) {
        document.getElementById("txtArea").innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtArea").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "areaE.php?q=" + str, true);
        xmlhttp.send();
    }
    document.getElementById("Cbo_Location").disabled = true;
}


function showLocationC(str) {

	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();

    if (str.length == 0) 
    {
        document.getElementById("txtLocation").innerHTML = "";
        return;
   	} else
   	{
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                document.getElementById("txtLocation").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET", "locationC.php?q=" + str, true);
        xmlhttp.send();
    }
}





function showLocationE(str) {
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();

    if (str.length == 0) 
    {
        document.getElementById("txtLocation").innerHTML = "";
        return;
   	} else
   	{
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                document.getElementById("txtLocation").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET", "locationE.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showQtyC(str)
{
	$('#schbutton').show();
	$('#txtQty').show();
	
	
 	if (str.length == 0) 
  {
        document.getElementById("txtQty").innerHTML = "";
        return;
  } else 
  {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                document.getElementById("txtQty").innerHTML = xmlhttp.responseText;
	            }
	        };

	 	xmlhttp.open("GET", "parkingC.php?q=" + str, true);
	  	xmlhttp.send();
    };
   
}

function showQtyE(str)
{
	$('#schbutton').show();
	$('#txtQty').show();
 	if (str.length == 0) 
  {
        document.getElementById("txtQty").innerHTML = "";
        return;
  } else 
  {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                document.getElementById("txtQty").innerHTML = xmlhttp.responseText;
	            }
	        };

	 	xmlhttp.open("GET", "parkingE.php?q=" + str, true);
	  	xmlhttp.send();
    };
   
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

function doNothing() {}







