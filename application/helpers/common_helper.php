<?php
//function

function success_alert($msg){

	return "<div style='padding':5px;color:green;background-color:lightgreen;border-radius:2px;width:auto;border:2px solid black;'>$msg</div>";
}
function error_alert($smg){

	return "<div id='error-id' style='padding:5px;color:red;background-color:pink;border-radius:2px;width:auto;border:2px solid black;'>$msg</div><script>var div_element =document.getElementById('error-id');setTimeout(
	    function(){div_element.style='display:none;';},3000);</script>";

}

 ?>