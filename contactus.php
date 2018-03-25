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

			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contact']) &&!empty($_POST['comments']) && !empty($_POST['code'])) {

		if($_POST['code'] == $_SESSION['rand_code']) {

		 	// send email

			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";

			$message = "<br><strong>New Query Submitted - </strong>".$ipaddress_trace;

			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br> <strong>Full Name:</strong> ".$name;

			$message .= "<br><br> <strong>Email ID:</strong> ".$email;

			$message .= "<br><br> <strong>Contact Number:</strong> ".$contact;

			$message .= "<br><br> <strong>Destination:</strong> ".$destination;

			$message .= "<br><br> <strong>Messsage Entered:</strong> ".$comments;

			$message .= "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";

			$to      = 'untravel@indiauntravelled.com';

			$subject = 'India Untravelled - Query';

			$headers .= 'MIME-Version: 1.0' . "\r\n";

			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			$headers .= "From: $name <$email>" . "\r\n";

			$headers .= 'CC:siftidhillon@gmail.com' . "\r\n";

			$headers .= 'BCC:informshantanu@gmail.com' . "\r\n";



			mail($to, $subject, $message, $headers);

			$accept = "Thank you! Your query submitted.<br> We will contact you shortly.";

		} else {

			$error = "*Please verify that you typed in the code.";

			}

		} else {

			$error = "*Please complete the form, so that we can serve you better.";

			}

	}



?>

<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js" lang="en">

<!--<![endif]-->

<head id="www-indiauntravelled-com" data-template-set="html5-reset">
<meta charset="utf-8">
<title>Set out on roads less travelled in rural India – India Untravelled</title>
<meta name="description" content="India Untravelled helps you locate offbeat experiences in rural India and connect with your hosts at homestays and farmstays that offer unique experiences.">
<meta name="keywords" content="Explore with India Untravelled new rural or offbeat destination">
<meta name="robots" content="index, follow">
    <meta content="width=device-width, initial-scale =1, maximum-scale = 1" name="viewport">
    <meta content="NOODP" name="GOOGLEBOT">

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
        <li><a href="index.html">HOME</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="itineraries.html" >Experiences</a></li>
        <li><a href="destinations.html">ACCOMMODATIONS</a></li>
        <li><a href="trips.html" title="TRIPS">FIXED TRIPS</a></li>
        <li><a href="media.html" >MEDIA</a></li>
        <li><a href="http://indiauntravelled.blogspot.in/" target="_blank">Blog</a></li>
        <li class="cur"><strong>CONTACT</strong></li>
      </ul>
    </nav>
    
            <div class="nav-mobile"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
        </header>
  <div class="clearfix"></div>
  <section>
      <div class="getinvolved"><a href="getinvolved.php">Get Involved</a></div>
    <div class="section share_inner"> <a  class="facebookShare" href="http://www.facebook.com/IndiaUntravelled" target="_blank">&nbsp;</a> <a class="twitterShare" href="https://twitter.com/#!/IndiaUntraveled" target="_blank">&nbsp;</a> <a class="googleplusShare" href="https://plus.google.com/112811195932802629258/posts"  target="_blank">&nbsp;</a> <a target="_blank" class="blogSocial_header" href="http://indiauntravelled.blogspot.in"></a> </div>
    <div class="headerImg">
      <h1><img src="images/contact-Header.jpg" alt="" ></h1>
      <div class="parabg1">Get in touch with us to book your stay at one of our destinations.</div>
    </div>
  </section>
  <section>
    <div class="content marT20">
      <div class="contentright contactpg" id="thanks">
	  <p class="justified"><strong>Make Payment For Your Travel Booking Only After Confirming Availability.</strong> </p>
	  <a href="https://www.instamojo.com/indiauntravelled/book-your-travel/" rel="im-checkout" data-behaviour="remote" data-style="dark" data-text="Pay Now" data-token="af633e21611e5ba01b8bdeb2a30162b4"></a>
<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>
        <p class="justified">Contact us via  email or the form below to book your stay at one of our destinations. </p>
        <div class="floatLeft formbox1 mrgtop25 mrgbottom30 width270" id="contactdiv">
          <?php if(!empty($error)) echo '<div class="error">'.$error.'</div>'; ?>
          <?php if(!empty($accept)) echo '<div class="accept">'.$accept.'</div>'; ?>
          <form name="contactform" id="contactform" action="<?php echo $_SERVER['PHP_SELF']; ?>#thanks" method="post" enctype="multipart/form-data"  onsubmit="return checkContact()">
            <div class="row">
              <div class="errmsg">please enter your name</div>
              <input name="name" type="text" class="inputname" id="name" tabindex="1"  value="enter name*" onFocus="if(this.value=='enter name*'){this.value=''};" onBlur="if(this.value==''){this.value='enter name*'};" />
            </div>
            <div  class="row">
              <div class="errmsg">please enter your email address</div>
              <input id="email" class="inputname"   maxlength="40" name="email"  type="text" tabindex="2" value="enter email*" onFocus="if(this.value=='enter email*'){this.value=''};" onBlur="if(this.value==''){this.value='enter email*'};" />
            </div>
            <div  class="row">
              <div class="errmsg">please enter your contact number</div>
              <input name="contact" type="text" class="inputname" id="contact" tabindex="3" value="contact no with country code*" onFocus="if(this.value=='contact no with country code*'){this.value=''};" onBlur="if(this.value==''){this.value='contact no with country code*'};" />
            </div>
            <div  class="row">
              <div class="errmsg">please enter destination</div>
              <input name="destination" type="text" class="inputname" id="destination" tabindex="3" value="enter destination*" onFocus="if(this.value=='enter destination*'){this.value=''};" onBlur="if(this.value==''){this.value='enter destination*'};" />
            </div>
            <div class="row">
              <div class="clearB"></div>
              <div class="errmsg">please enter the correct code</div>
              <div class="captcha_div">
                <div  class="codeimg"><img src="captcha.php" /></div>
                <input type="text" name="code" class="ccode" />
                <label class="human">Are you human?</label>
              </div>
              <div class="clearB"></div>
            </div>
            <div class="clearB"></div>
            <div class="row">
              <div class="errmsg">please enter your requirement</div>
              <textarea name="comments" id="comments" tabindex="7" class="txtarea" onFocus="if(this.value=='enter your requirement*'){this.value=''};" onBlur="if(this.value==''){this.value='enter your requirement*'};" >enter your requirement*</textarea>
              <input type="submit" name="submit"  value="" tabindex="8" class="btncontact" />
            </div>
            <div class="clearB"></div>
          </form>
        </div>
        <div class="row padT20  width270">
          <p class="justified"> Subscribe to our mailing list &amp; join us on social media to keep exploring new destinations with us. </p>
          
        <p class="justified"> For partnerships please write to <a href="mailto:param@indiauntravelled.com" target="_blank">param@indiauntravelled.com</a><br>
        For any other queries please write to <a href="mailto:sifti@indiauntravelled.com" target="_blank">sifti@indiauntravelled.com</a></p> 
        <br><br>
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