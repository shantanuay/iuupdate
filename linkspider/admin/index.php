<?php 
session_start();
$log = $_GET['log'];
include_once ($_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/apc.php");
 
if($log != "" ) {
unset($_SESSION['key']);
session_destroy();
} 

if(isset($_POST['password'])) {
      if($password != $_POST['pass'] || $_POST['pass'] == "") {
         echo "<br>&nbsp;&nbsp;<form name='pass' method='POST' action='index.php'>
	<input type='text' name='pass'><input type='submit' name='password'  value='Password'>
	</form>"; exit;   } else { $_SESSION['key'] = $admin_key;      
} 
}
if($_SESSION['key'] != "" || $_SESSION['key'] == "$admin_key" ) { 

echo "
<html>
<head>
<title>ADMIN</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<STYLE type='text/css'> 
input, textarea {
	background-color:#FFFFDD; border:1px solid #6F8D9D;
	}
input, button {
	background-color:#FFFFDD; border:1px solid #6F8D9D;
	}
.bottom {  border: #6F8D9D; border-style: dashed; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
form { margin-top: 0px; margin-bottom: 0px; font-face: Verdana, Ariel}
a { text-decoration: none; color: #006699; }
A:hover { color: #CC0000; background-color:#B9C8D0; } 

</STYLE>
</head>

<body bgcolor='#FFEBBD' text='#000000' >
<table width='750' border='0' cellpadding='0' cellspacing='0' align='center'>
  <tr> 
    <td valign='top' height='40' colspan='5'> 
      <p><center>Indiauntravelled Linkspider</center>
        <center><font face='Verdana, Arial, Helvetica, sans-serif' size='4'><a href='index.php'><b>ADMIN</b></a></font><br><br><form name='log' method='post' action='index.php?log=yes'><input type='submit' name='logout' value='Logout'></form></center>	

        </p>
      <hr color='#6F8D9D'>
    </td>
  </tr>
  <tr> 
    <td width='245' valign='top' height='19'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>&nbsp;&nbsp;Client site:</font> </td>
    <td width='160' valign='top' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Check my link:</font> 
    </td>
    <td width='120' valign='top' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Check results:</font></td>
    <td width='115' valign='top' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Visit link page:</font></td>
    <td width='110' valign='top' align='center'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Delete:</font> 
    </td>
  </tr>
  <tr> 
    <td height='39' colspan='5' valign='top'> 
      <hr color='#6F8D9D'>";
include_once ($_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/custom.php");

$adminFile = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/admin.txt";
$dataFile  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/data.txt";	
  
$af = file($adminFile);
$df = file($dataFile);
$check = $_GET['check'];
$href = $_GET['href'];
$recover = $_GET['recover'];
$included = $_GET['included'];
$del = $_GET['del'];

// send warning if is exchanged link deleted
if($recover == "yes" ) {
         foreach($df as $linije) {
              list($clients, $myLinks) = explode('|', $linije);

             if(strpos($myLinks, $del) !== FALSE) {
                  $site = $clients;  
			      $link = $myLinks;
			      break;
	
             } 
		 }
 
echo "<hr width='85%' align='center' size='2' color='#FF0000'><center><h4><font face='Verdana, Arial, Helvetica, sans-serif'  color='#FF0000'>WARNING:</font></h4> <font face='Verdana, Arial, Helvetica, sans-serif' size='2'>You are ready to delete site $site with your link on:<br><a href='$link' target='_blank'> $link</a></font></center><br>";

echo "<center><form name='form1' method='post' action=\"index.php\"><input type='submit' name='Submit1' value='Cancel '></form><br><form name='any' method='post' action=\"adminspider.php?delold=yes&del=$del\"><input type='submit' name='any' value=' Delete '></form><br><form name='black' method='post' action=\"adminspider.php?black=yes&delold=yes&del=$del\"><input type='submit' name='black' value='Blacklist & Delete'></form></center>"; 

echo "<hr width='85%' align='center' size='2' color='#FF0000'><hr color='#6F8D9D'>";
}

// display new submited sites from admin.txt if is mode preset on 1
if($mode == 1) {
    foreach($af as $lines2) {
       list($clientSite2, $myLink2) = explode('|', $lines2);

          if(strpos($myLink2, $href) !== FALSE) {
               $results = $check;    
	           $a = '<a name="333"></a>';
	   
          }else {
               $results = "";
	           $a = "";
          }

    echo  "&nbsp;&nbsp;<font  face='Verdana, Arial, Helvetica, sans-serif' color='#FF0000' size='2'><b>New site:</b></font><table width='750' border='0' cellpadding='0' cellspacing='0'>
  <tr> 
    $a <td width='260' height='30' valign='middle' ><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>&nbsp;&nbsp;$clientSite2</font></td>
    <td width='130' valign='middle'>
<form name='form2' method='post' action=\"adminspider.php?check=$myLink2\"><input type='submit' name='Submit2' value='Check my link'></form></td>
	<td width='120' valign='middle' align='center' ><font  face='Verdana, Arial, Helvetica, sans-serif' color='#FF0000' size='2'><b>$results</b></font></td>
    <td width='115' valign='middle' align='center' ><a href=$myLink2 target='_blank'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Go there!</font></a></td>
	<td width='110' valign='middle' align='center'>
<form name='form4' method='post' action=\"adminspider.php?include=yes&delnew=yes&del=$myLink2\"><input type='submit' name='Submit4' value='Include'></form><br>
<form name='form3' method='post' action=\"adminspider.php?delnew=yes&del=$myLink2\"><input type='submit' name='Submit3' value='Delete'></form><br>
<form name='black' method='post' action=\"adminspider.php?black=yes&delnew=yes&del=$myLink2\"><input type='submit' name='Submit3' value='Blacklist'></form></td>
  </tr>
</table>"; 

      echo "<br><hr color='#6F8D9D'>";
   }
}

// display all exchanged links
foreach($df as $lines) {
    list($clientSite, $myLink) = explode('|', $lines);

         if(strpos($myLink, $href) !== FALSE && $included == "yes") {
            $results = "<font color='#FF0000'><b>INCLUDED</b></font>";  
	
         } elseif(strpos($myLink, $href) !== FALSE) {
            $results = $check;    
	        $a = '<a name="333"></a>';
	   
         }else {
            $results = "";
	        $a = "";
      }

    echo  "<table width='750' border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFDEC' class='bottom'>
  <tr> 
    $a <td width='260' height='30' valign='middle'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>&nbsp;&nbsp;$clientSite</font></td>
    <td width='130' valign='middle'>
<form name='form5' method='post' action=\"adminspider.php?check=$myLink\"><input type='submit' name='Submit5' value='Check my link'></form></td>
	<td width='120' valign='middle' align='center' ><font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#FF0000' ><b>$results</b></font></td>
    <td width='115' valign='middle' align='center' ><a href=$myLink target='_blank'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>Go there!</font></a></td>
	<td width='110' valign='middle'  align='center' >
<form name='form6' method='post' action=\"index.php?recover=yes&del=$myLink\"><input type='submit' name='Submit6' value='Delete'></form></td>
  </tr>
</table>"; 
}
echo "
      </td>
  </tr>
</table>
<a name='999'></a> 
</body>
</html>"; } else {  echo "<br>&nbsp;&nbsp;<form name='pass' method='POST' action='index.php'>
	<input type='text' name='pass'><input type='submit' name='password'  value='Password'>
	</form>"; 
} 

