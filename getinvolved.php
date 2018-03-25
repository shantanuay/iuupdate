<?php







session_start();



error_reporting(0);



ini_set("display_error", "off");







if(isset($_POST['submit'])) {



	extract($_POST);



	



			 $userip = $_SERVER["HTTP_X_FORWARDED_FOR"];



			 $proxy = $_SERVER["REMOTE_ADDR"];



			 $host = @gethostbyaddr($_SERVER["HTTP_X_FORWARDED_FOR"]);







			$ipaddress_trace = "<strong>From IP Adress: </strong>".$userip. $proxy. $host;



			



	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['volunteer_role'])  && !empty($_POST['relevant']) && !empty($_POST['commitment']) &&!empty($_POST['want_to_volunteer']) &&!empty($_POST['comments']) && !empty($_POST['code'])) {



		



		if($_POST['code'] == $_SESSION['rand_code']) {



		 	// send email



			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";



			$message = "<br><strong>New Query Submitted - </strong>".$ipaddress_trace;



			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br> <strong>Full Name:</strong> ".$name;



			$message .= "<br><br> <strong>Email ID:</strong> ".$email;



			$message .= "<br><br> <strong>Contact Number:</strong> ".$contact;



			$message .= "<br><br> <strong>Role to volunteer for:</strong> ".$volunteer_role;



			$message .= "<br><br> <strong>Relevant skills / experience:</strong> ".$relevant;



			$message .= "<br><br> <strong>Period of commitment:</strong> ".$commitment;



			$message .= "<br><br> <strong>Why want to volunteer:</strong> ".$want_to_volunteer;



			$message .= "<br><br> <strong>Messsage Entered:</strong> ".$comments;



			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";







			



			$to      = ' untravel@indiauntravelled.com';





			$subject = 'India Untravelled - Volunteer';



			



			$headers .= 'MIME-Version: 1.0' . "\r\n";



			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



			



			 			 



			// Additional headers



			//$headers .= 'To: untravel@indiauntravelled.com' . "\r\n";



			$headers .= "From: $name <$email>" . "\r\n";

			

			$headers .= 'CC:siftidhillon@gmail.com' . "\r\n";





			$headers .= 'BCC:informshantanu@gmail.com' . "\r\n";



			



			mail($to, $subject, $message, $headers);







			$accept = "Thank you! Your query submitted.<br> We will contact you shortly.";



		



		} else {



		



			$error = "*Please verify that you typed in the code.";



		



		}



		



	} else {



	



		$error = "*Please fill the form, so that we can serve you better.";



	



	}







}







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
<title>Get involved with India Untravelled</title>
<meta name="description" content="India Untravelled invites you to travel on the countryside of India, experience life in homestays & Indian villages, and discover the impact of ecotourism & responsible travel. Solo travel is highly encouraged">
<meta name="keywords" content="travellers to India,Holidays in India, Rural Tourism India, Ecotourism holiday India, Incredible India,Incredible holidays india, Eco Travel Companies India, Homestays India, Sustainable Tourism India,  North Kerala, Homestays in the Himalayas, Spiti">
    <meta content="width=device-width, initial-scale =1, maximum-scale = 1" name="viewport">
<meta name="robots" content="index, follow">
<meta http-equiv="content-language" content="en">
<meta name="author" content="Axisfusion.in" >
<meta name="DC.title" content="India Untravelled | Solo travel India | Rural Travel Destinations">
<meta name="DC.subject" content="Eco Travel Companies India, Homestays India, Sustainable Tourism India,  North Kerala, Homestays in the Himalayas">
<meta name="DC.creator" content="Axisfusion.in">
<meta name="rating" CONTENT="general">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="_/css/style.css" type="text/css" >
<script type="text/javascript" src="_/js/modernizr-1.7.min.js"></script>
</head>

<body class="fixfooter"  >

<div class="topbar"></div>
<div class="wrapper">
	<header>
		<h1><a href="index.html" title="India Untravelled">&nbsp;</a></h1>
		<nav>
			<ul id="nav">
				<li><a href="index.html">HOME</a></li>
				<li><a href="aboutus.html">About</a></li>
				<li><a href="itineraries.html" >Experiences</a></li>
				<li><a href="destinations.html">ACCOMMODATIONS</a></li>
				<li><a href="trips.html">FIXED TRIPS</a></li>
				<li><a href="media.html" >MEDIA</a></li>
				<li><a href="http://indiauntravelled.blogspot.in/" target="_blank">Blog</a></li>
				<li><a href="contactus.php">Contact</a></li>
			</ul>
		</nav>
            <div class="nav-mobile"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
        </header>
        <section>
          <div class="getinvolved"><a href="getinvolved.php">Get Involved</a></div>
		<div class="section share_inner"> <a  class="facebookShare" href="http://www.facebook.com/IndiaUntravelled" target="_blank">&nbsp;</a> <a class="twitterShare" href="https://twitter.com/#!/IndiaUntraveled" target="_blank">&nbsp;</a> <a class="googleplusShare" href="https://plus.google.com/112811195932802629258/posts"  target="_blank">&nbsp;</a> <a target="_blank" class="blogSocial_header" href="http://indiauntravelled.blogspot.in"></a> </div>
		<div class="headerImg headerimgIteneries">
			<div class="parabgItenraries">Volunteer your time and skills to support the cause of India Untravelled.</div>
			<h1><img src="images/header_getinvolved.jpg" alt="Volunteer your time and skills to support the cause of India Untravelled." ></h1>
			<div class="clearfix"></div>
		</div>
	</section>
	<section>
		<div class="tabsContent" id="tabsContent">
			<div class="contentbg pad0">
				<div id="tripstab" class="tabs_content_bgtop padT20">
					<h2><strong>Get involved with India Untravelled</strong></h2>
					<div class="padT20 itenrariesDiv">
						<p>At India Untravelled, we are always on the lookout for volunteers who are passionate about travel and interested in contributing their skills and creativity to further the cause of rural and responsible travel in India. You can browse through our on-going and upcoming projects below, and use the Volunteer Form (at the bottom of this page) to submit your application.</p>
						<h3 class="marb10 padT20">CREATIVE GENIUS:</h3>
						<p>Our enterprise is reliant on our ability to take offline travel experiences and showcase them online. There is no end to the creativity we can use to inspire travellers to travel responsibly, set off the beaten path, and discover the spirit of India. If you want to experiment with your creative juices, you can volunteer in the following ways:</p>
						<ul class="listing marb10 clearfix">
							<li><strong>Making videos / short films:</strong>We'll provide photographs,  written material and testimonials of past travellers to help you conceptualize  and create destination-specific videos as well as thought provoking and  interesting short films and campaigns on responsible travel to share on our  YouTube and Facebook channels.</li>
							<li><strong>Designing marketing material:</strong>If Photoshop is your thing,  you can help us design postcards, posters and other marketing material that can  be used in our online and offline campaigns, as well as on our&nbsp;<a href="https://www.facebook.com/IndiaUntravelled" target="_blank">Facebook page</a>&nbsp;and&nbsp;<a href="http://pinterest.com/indiauntraveled/" target="_blank">Pinterest boards</a>.</li>
							<li><strong>Online Campaigns:</strong>You can help us brainstorm  for new low-budget campaign ideas (on Facebook, Twitter, Pinterest) to expand  our outreach and build awareness for rural and responsible travel.</li>
						</ul>
						<br>
						<div class="sep"></div>
						<h3 class="marb10 padT20">TWITTER AMBASSADOR:</h3>
						<p>We seek to take our  responsible travel message to the Twitterverse more actively, as well as  showcase our partner destinations to potential travellers. If you're a Twitter  addict, you can help by tweeting and interacting as <a href="https://twitter.com/IndiaUntraveled" target="_blank">@IndiaUntraveled</a> for a few hours each week, on topics related to responsible  travel. Gradually, we want you to help us shape a Twitter Ambassador program.</p>
						<br>
						<div class="sep"></div>
						<h3 class="marb10 padT20">RESIDENT BLOGGER / TRAVEL RESEARCHER:</h3>
						<p>The&nbsp;<a href="http://indiauntravelled.blogspot.in/" target="_blank">India Untravelled blog</a>&nbsp;is a platform for amateur bloggers and writers to share travel  experiences from around India. You can take the lead and create content for us,  as well as help us source guest bloggers who would like to contribute their  stories. We would love a new perspective and innovative ideas on the evolution  of the travel space in India. You can also propose blogging-centered campaigns  and curate travel lists to further the message of responsible travel and create  helpful India-specific resources online.</p>
						<br>
						<div class="sep"></div>
						<h3 class="marb10 padT20">SOCIAL MEDIA ADDICT:</h3>
						<p>In an attempt to grow our online reach, we have set up our  accounts on&nbsp;<a href="http://www.flickr.com/people/indiauntravelled/" target="_blank">Flickr</a>,&nbsp;<a href="http://pinterest.com/indiauntraveled/" target="_blank">Pinterest</a>,&nbsp;<a href="http://www.slideshare.net/IndiaUntravelled" target="_blank">Slideshare</a>&nbsp;and&nbsp;<a href="http://www.youtube.com/user/IndiaUntravelled" target="_blank">YouTube</a>. You can assist us in managing one or  more of these channels, by sourcing and adding content, making it searchable,  and interacting on our behalf with active users and influencers. It's all fun  if social media is your thing!</p>
						Please be as specific  as possible in your volunteer application, so as to help make our volunteer  program more efficient. <br>
						<br>
						<div class="sep"></div>
						<br>
						<h3 class="marb10 padT10">Due to the overwhelming number of volunteers in 2014, we have temporarily stopped accepting new applications. Please check back again in March 2018. </h3>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			
			<!--Content BG Ends --> 
			
		</div>
		<div class="clearfix"></div>
		<div class="contentfooter">&nbsp;</div>
	</section>
	<div class="clearfix"></div>
	<footer>
		<div class="footer">
			<div class="nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="aboutus.html">About</a></li>
					<li><a href="destinations.html">ACCOMMODATIONS</a></li>
					<li><a href="trips.html">FIXED TRIPS</a></li>
					<li><a href="itineraries.html" >Experiences</a></li>
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
<script type="text/javascript" src="_/js/shadowbox.js"></script> 
<script type="text/javascript" src="_/js/functions.js"></script> 
<script type="text/javascript">



	Shadowbox.init({



		handleOversize:     "drag",



		displayNav:         true,



		handleUnsupported:  "remove",		



		handleOversize: "resize",



		autoplayMovies:     false



	});



</script> 
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