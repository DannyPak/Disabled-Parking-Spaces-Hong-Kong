var xmlhttp;
var reg_c;
var dis_c;
var are_c;



$(document).ready(function() {
   // $("div#schbutton").removeClass("hidden");
    $("div#strbutton").removeClass("hidden");
    $("div#mapbutton").removeClass("hidden");
    //$("div#gobutton").removeClass("hidden");
    
    $('#en').click(function() {
            window.location.href = 'index_e.php';         
        });   
    $('#tc').click(function() {
            window.location.href = 'index.php';           
        });   
        
        
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('schbutton');
        $(btn).click(function(){
            modal.style.display="block";
        });
        
        var span = document.getElementsByClassName("close")[0];
        $(span).click(function(){
            modal.style.display="none";
        });
        
        window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
                 }
            };
            

        
    });
    
    
    function disTitle(reg_c){        
        document.getElementById("disTitle").innerHTML = reg_c;
        
    }
    
        function areTitle(dis_c){        
        document.getElementById("areTitle").innerHTML = dis_c;
        
    }
    
        function locTitle(are_c){        
        document.getElementById("locTitle").innerHTML = are_c;
        
    }
    
    
// Get the modal


// Get the button that opens the modal
//var schButton = document.getElementById('schbutton');
//
//// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
//schButton.onclick = function() {
//    modal.style.display = "block";
//}

// When the user clicks on <span> (x), close the modal
//span.onclick = function() {
//    modal.style.display = "none";
//}

// When the user clicks anywhere outside of the modal, close it


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