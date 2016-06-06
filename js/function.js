var xmlhttp;
var reg_c;
var dis_c;
var are_c;
var searchFlat;



$(document).ready(function() {
        
         $("div#strbutton").removeClass("hidden");
         $("div#mapbutton").removeClass("hidden");
        

         $('#en').click(function() {
                 window.location.href = 'index_e.php';         
             });   
         $('#tc').click(function() {
                 window.location.href = 'index.php';           
             });   

             // Get the modal
             var modal = document.getElementById('myModal');
             // Get the button that opens the modal
             var btn = document.getElementById('schbutton');
             // When the user clicks on the button, open the modal 

             $(btn).click(function(){

                 if(searchFlat != 0){
                 modal.style.display="block";
                 searchFlat = 0;
             }else{
                 modal.style.display = "none";
                 searchFlat = 1;

             }
        
      
        });
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        $(span).click(function(){
            modal.style.display="none";
            searchFlat = 1;
        });
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
                 searchFlat = 1;
                 window.searchFlat = searchFlat;
                 }
            };
            
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        $('#clear').click(function() {
                $('#country_list_id').val('');
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
	

//function showDistrict(str,URL) {
//	$('#Cbo_Area').val('0');
//	$('#Cbo_Location').val('0');
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtDistrict",URL,str);   
//	document.getElementById("Cbo_Area").disabled = true;
//	document.getElementById("Cbo_Location").disabled = true;
//
//}
//
//function showArea(str, URL) {
//	$('#Cbo_Location').val('0');
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtArea",URL,str);
//    document.getElementById("Cbo_Location").disabled = true;
//}
//
//function showLocation(str,URL) {
//	$('#gobutton').hide();
//	$('#mapbutton').hide();
//	$('#strbutton').hide();
//	$('#schbutton').hide();
//	$('#txtQty').hide();
//	XMLConnect("txtLocation",URL,str);
//}
//
//
//function showQty(str,URL)
//{
//	XMLConnect("txtQty",URL,str);	
//	$('#txtQty').show();
//	$('#schbutton').show();
//	
//   
//}

function doNothing() {}



