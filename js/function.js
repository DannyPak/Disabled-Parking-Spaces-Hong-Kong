var xmlhttp;


$(document).ready(function() {
    $("div#schbutton").removeClass("hidden");
    $("div#strbutton").removeClass("hidden");
    $("div#mapbutton").removeClass("hidden");
    $("div#gobutton").removeClass("hidden");
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
	XMLConnect("txtQty",URL,str);	
	$('#txtQty').show();
	$('#schbutton').show();
	
   
}

function doNothing() {}