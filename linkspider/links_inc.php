<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/custom.php");	
$linkspider = @$_SERVER['DOC_ROOT'] . "/linkspider/admin/linkspider.php";
      $message = $_GET['message'];
	  $host = $_GET['host'];
	  $same = $_GET['same'];   
	  $submit = $_GET['submit'];
	  $sitename2 = $_GET['site']; 
	  $sitelink = $_GET['link'];
	  $sitename3 = str_replace("|", "&", $sitename2);
	  $sitename = str_replace("-", "#", $sitename3);
 	  	  
if($message == TRUE && $mode == 0) {
    $message = "<center>Thank you for trade link with us.<br><hr width='70%' size='1'><br></center>";
	  	  	  
} elseif($message == TRUE && $mode == 1) {
    $message = "Thank you for trade link with us. We will include your site as soon as possible.<br>
     Your site name: $sitename <br>
     Your site link: $sitelink <br><hr width='70%' size='1'><br>";

} elseif($host != "") {
    $message = "Sorry, but Linkspider can't detect <b>$mySiteName</b> link on your submitted page. Please try again or contact us directly. Thank you.<br><hr width='70%' size='1'><br>";

} elseif($same != "") {
    $message = "<center>Sorry, this domain allready exist in our database. Thank you.<br><hr width='70%' size='1'><br></center>";
		
} else {
    $message = "";  
}

$data = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/data.txt";	 
$sites = file($data);
$myTXT1 = str_replace('<', '&lt;', $fullLink);

if($submit == "" && $message == "") {
 $subb = "<center>Click <a href = $display?submit=submit>here</a> and submit your site:</center><br>";
}
?>


<table width="550" border="0" cellpadding="0" cellspacing="0" align="center" >
  <tr> 
    <td width="550" valign="top"> 
      <?php 
	  echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF0000'>$subb $message</font>";
	
?>
    </td>
  </tr>
  <tr> <td valign='top'>
<?php 
if($submit != "" || $host != "" || $same != "") {   
    echo "<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>SUBMIT YOUR SITE:</b> </font></p>
      <p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>1. Exactly copy/paste this link below in code of your page. </font></p>
      <p ><font face='Verdana, Arial, Helvetica, sans-serif' size='2'> 
       $myTXT1
        </font></p>
      <p ><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>2. Fill this form below. </font> </p>
      <form name='form1' method='post' action='$linkspider'>
        <p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Where we can find our link?<br>
          <input type='text' name='ourlink' size='40' value='http://'>
          <br>
          <br>
          Your site name (max 50 chars): <br>
          <input type='text' name='sitename' size='40' maxlength='50'>
          </font></p>
        <p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>&nbsp;Your site link: <br>
          <input type='text' name='sitelink' size='40' value='http://'>
          <br>
          <br>
          <input type='submit' name='Submit' value='Submit'>
          </font></p> </form>"; 
  }
?>
<p align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='-2'>
		<!------ This link is part of copyright------->
		Powered with Indiauntravelled Linkspider
		<!------ End of copyrighted link ------->
		</font></p>
     <hr width='70%' size='1'>
      <p align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>OUR LINK PARTNERS:</b></font></p>
    </td> 
  </tr>
  <tr> 
    <td height="32" valign="top">
      <?php 
	foreach($sites as $lines) {
list($sites, $myLink) = explode("|", $lines);
echo "<font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='red'>$sites</font><br>";
}
?>
    </td>
  </tr>
</table>