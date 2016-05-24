
function getDistrict(str) {



    if (str.length == 0) {
        document.getElementById("txtDist").innerHTML = "";
        return;
   		} else {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtDist").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "getDistrict.php?str=" + str, true);
        xmlhttp.send();
    }
    

}
