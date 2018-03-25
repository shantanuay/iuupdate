<?php

error_reporting(0);

ini_set("display_error", "off");

extract($_POST);

$message = "Full Name: ".$name;

$message .= "<br> Email ID: ".$email;

$message .= "<br> Contact Number: ".$contact;

$message .= "<br> Role to volunteer for: ".$volunteer_role;

$message .= "<br> Relevant skills / experience: ".$commitment;

$message .= "<br> Period of commitment: ".$commitment;

$message .= "<br> Why want to volunteer: ".$want_to_volunteer;

$message .= "<br> Messsage: ".$comments;



$to      = 'untravel@indiauntravelled.com';

$subject = 'India Untravelled - Volunteer';



$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Additional headers

$headers .= 'To: untravel@indiauntravelled.com' . "\r\n";

$headers .= "From: $email" . "\r\n";

$headers .= 'BCC:informshantanu@gmail.com' . "\r\n";



mail($to, $subject, $message, $headers);

echo '<script language="javascript">alert("Thank You! Your message has been sent. We will contact you very shortly.")</script>';



echo '<script language="javascript">window.location = "http://www.indiauntravelled.com"</script>';

?>
