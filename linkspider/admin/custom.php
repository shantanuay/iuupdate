<?php
if ($_SERVER['PHP_SELF'] == "/linkspider/admin/custom.php") {
    echo "<center><font size='4' face='Verdana, Arial, Helvetica, sans-serif' color='#FF0000'>ERROR: Sorry, You cannot access this file directly...<br />\n</font></center>"; 
	exit; 
}

// custom below this line //////////
$mode = 1; // 0 = automaticaly include submited sites in data.php and redirect 
           // client on your links page
           // 1 = include submited site to admin data.txt then 
           // redirect on your link page and display message for client
		   
// type here your full link - a href must to have first position
$fullLink = '<a href="http://indiauntravelled.com">Set off the beaten track in rural India - India Untravelled</a>'; 

// your site name
$mySiteName = "Indiauntravelled.com"; 

// page where linkspider will display exchanged links - don't change if you use iframe (HTML instalation)
$display = '/linkspider/links.php';
	   
?>