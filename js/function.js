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
	
	
function XMLConnect(placeHolder,URL,str){

	if (str.length == 0) {
        document.getElementById(placeHolder).innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(placeHolder).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", URL + str, true);
        xmlhttp.send();
    }	
}
	

function showDistrict(str,URL) {
	$('#Cbo_Area').val('0');
	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtDistrict",URL,str);   
	document.getElementById("Cbo_Area").disabled = true;
	document.getElementById("Cbo_Location").disabled = true;

}

function showArea(str, URL) {
	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtArea",URL,str);
    document.getElementById("Cbo_Location").disabled = true;
}

function showLocation(str,URL) {
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtLocation",URL,str);
}


function showQty(str,URL)
{
	$('#schbutton').show();
	$('#txtQty').show();
	XMLConnect("txtQty",URL,str);
   
}

function doNothing() {}








/*function showDistrictC(str) {

	$('#Cbo_Area').val('0');
	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();	
	XMLConnect("txtDistrict","districtC.php?q=",str);   
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
	XMLConnect("txtDistrict","districtE.php?q=",str);   
	document.getElementById("Cbo_Area").disabled = true;
	document.getElementById("Cbo_Location").disabled = true;

}
*/







/*function showAreaC(str) {

	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtArea","areaC.php?q=",str);
    document.getElementById("Cbo_Location").disabled = true;
}


function showAreaE(str) {

	$('#Cbo_Location').val('0');
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtArea","areaE.php?q=",str);
   document.getElementById("Cbo_Location").disabled = true;
}
*/

/*
function showLocationC(str) {

	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtLocation","locationC.php?q=",str);
}





function showLocationE(str) {
	$('#gobutton').hide();
	$('#mapbutton').hide();
	$('#strbutton').hide();
	$('#schbutton').hide();
	$('#txtQty').hide();
	XMLConnect("txtLocation","locationE.php?q=",str);
}
*/



/*function showQtyC(str)
{
	$('#schbutton').show();
	$('#txtQty').show();
	XMLConnect("txtQty","parkingC.php?q=",str);
   
}

function showQtyE(str)
{
	$('#schbutton').show();
	$('#txtQty').show();
	XMLConnect("txtQty","parkingE.php?q=",str);
  
}
*/









