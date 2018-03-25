<?php

error_reporting(0);

ini_set("display_error", "off");

extract($_POST);

$message = "Full Name: ".$name;

$message .= "<br> Email ID: ".$email;

$message .= "<br> Contact Number: ".$contact;

$message .= "<br> Messsage: ".$comments;





$to      = 'untravel@indiauntravelled.com';

$subject = 'India Untravelled - Query';



$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Additional headers

$headers .= 'To: untravel@indiauntravelled.com' . "\r\n";

$headers .= "From: $email" . "\r\n";

$headers .= 'BCC:informshantanu@gmail.com' . "\r\n";





mail($to, $subject, $message, $headers);

/*echo '<script language="javascript">alert("Thank You! Your message has been sent. We will contact you very shortly.")</script>';

echo '<script language="javascript">window.location = "http://indiauntravelled.com/"</script>';*/



?>

<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->

<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->

<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head id="www-indiauntravelled-com" data-template-set="html5-reset">
<meta charset="utf-8">
<title>Set out on roads less travelled in rural India – India Untravelled</title>
<meta name="description" content="India Untravelled helps you locate offbeat experiences in rural India and connect with your hosts at homestays and farmstays that offer unique experiences.">
<meta name="keywords" content="Explore with India Untravelled new rural or offbeat destination">
<meta http-equiv="refresh" content="2;url=http://indiauntravelled.com/">
<meta content="width=device-width, initial-scale =1, maximum-scale = 1" name="viewport">
<meta name="robots" content="index, follow">
<meta http-equiv="content-language" content="en">
<meta name="author" content="Axisfusion.in" >
<meta name="DC.title" content="India Untravelled">
<meta name="DC.subject" content="Explore with India Untravelled new rural or offbeat destination">
<meta name="DC.creator" content="Axisfusion.in">
<meta name="rating" CONTENT="general">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="_/css/style.css" type="text/css" >
<script type="text/javascript" src="_/js/modernizr-1.7.min.js"></script>
</head>

<body>
<div class="topbar"></div>
<div class="wrapper">
	<header>
		<h1><a href="index.html" title="India Untravelled">&nbsp;</a></h1>
		<nav>
			<ul id="nav">
				<li><a href="index.html" title="Home">HOME</a></li>
				<li><a href="aboutus.html" title="ABOUT US">About</a></li>
				<li><a href="itineraries.html" >Experiences</a></li>
				<li><a href="destinations.html" title="ACCOMMODATIONS">ACCOMMODATIONS</a></li>
				<li><a href="trips.html" title="TRIPS">FIXED TRIPS</a></li>
				<li><a href="media.html" >MEDIA</a></li>
				<li><a href="http://indiauntravelled.blogspot.in/" target="_blank">Blog</a></li>
				<li><a href="contactus.php" title="CONTACT US"><nobr>CONTACT</nobr></a></li>
			</ul>
		</nav>
		<div class="getinvolved"><a href="getinvolved.php">Get Involved</a></div>
	</header>
	<div class="clearfix"></div>
	<section>
		<div class="section share_inner"> <a  class="facebookShare" href="http://www.facebook.com/IndiaUntravelled" target="_blank">&nbsp;</a> <a class="twitterShare" href="https://twitter.com/#!/IndiaUntraveled" target="_blank">&nbsp;</a> <a class="googleplusShare" href="https://plus.google.com/112811195932802629258/posts"  target="_blank">&nbsp;</a> <a target="_blank" class="blogSocial_header" href="http://indiauntravelled.blogspot.in"></a> </div>
		<div class="headerImg">
			<h1><img src="images/contact-Header.jpg" alt="" ></h1>
			<div class="parabg1">Get in touch with us to book your stay at one of our destinations.</div>
		</div>
	</section>
	<section>
		<div class="content marT20">
			<div class="contentLeft contact">
				<p class="padT20"><strong>Phone:</strong> <br>
					+91 8527 141 626 <br>
					+91 9899 807 846</p>
				<p class="padT20"><strong>Email:</strong><br>
					<a href="mailto:untravel@indiauntravelled.com" target="_blank">untravel@indiauntravelled.com</a><br>
					<a href="mailto: untravel@indiauntravelled.com" target="_blank"> untravel@indiauntravelled.com</a> </p>
			</div>
			<div class="contentright thanks">
				<h1>Thank You! <br>
					<span>Your message has been sent. We will contact you very shortly.</span></h1>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class="row padT20  width270">
					<p class="justified">We also look forward to hearing from you if you'd like to explore a partnership with India Untravelled, recommend a new rural or offbeat destination, or give us feedback on our initiative and website.</p>
					<p class="justified"> Subscribe to our mailing list &amp; join us on social media to keep exploring new destinations with us. </p>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
	<footer>
		<div class="footer">
			<div class="nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="aboutus.html">About</a></li>
					<li><a href="destinations.html">ACCOMMODATIONS</a></li>
					<li><a href="trips.html">TRIPS</a></li>
					<li><a href="itineraries.html" >Itineraries</a></li>
					<li><a href="media.html" >Media</a></li>
					<li><a href="contactus.php">Contact</a></li>
					<li><a href="terms.html">T&amp;Cs</a></li>
					<li><a href="links.html">Links</a></li>
				</ul>
			</div>
		</div>
	</footer>
</div>
<div class="copywarp">
	<div class="copyright">
		<p class="pLeft"><small>&copy; Copyright <strong><a href="http://indiauntravelled.com">India Untravelled</a></strong> 2015. All Rights Reserved.</small></p>
		<p class="pRight"><small>Maintained by <strong><a href="http://www.axisfusion.in" target="_blank">Axisfusion.in</a></strong></small></p>
	</div>
</div>

<!-- Grab Google CDN's jQuery. fall back to local if necessary --> 

<script>window.jQuery || document.write("<script type='text/javascript' src='_/js/jquery.min.js'>\x3C/script>")</script> 
<script type="text/javascript" src="_/js/functions.js"></script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63226016-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>