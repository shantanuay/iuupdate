<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/custom.php";
$dataFile  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/data.txt";
$adminFile  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/admin.txt";
$black  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/black.txt";
$loc  = @$_SERVER['DOC_ROOT'] . $display;
$file = file($dataFile);
$afile = file($adminFile);
$bfile = file($black);
		 		 
// get submited data
$site1 = $_POST['ourlink'];
$site2 = strtolower($site1);
$ourlink = trim($site2);

$site3 = $_POST['sitelink'];
$site4 = strtolower($site3);
$sitelink = trim($site4);

$sitename0 = $_POST['sitename'];
$sitename = strip_tags($sitename0);
$linkExist = FALSE; // assume link is false

// explode posted data
list($r, $d, $t) = explode("/", $ourlink);
list($w, $x, $h) = explode("/", $sitelink);

// if is submited data empty or submited domains are not same or level is too deep
if($h == "" || $t == "" || $t != $h) {
	header("Location:$display?host=host");
	exit;
}

// check if domain exist in data.txt, admin.txt or black.txt
foreach($file as $lines) {
    if(strpos($lines, $h) > 0) {
	header("Location:$display?same=same");
	exit;
    }
  }
  
foreach($afile as $lines1) {
    if(strpos($lines1, $h) > 0) {
	header("Location:$display?same=same");
	exit;
    }
  }
foreach($bfile as $lines2) {
    if(strpos($lines2, $h) > 0) {
	header("Location:$display?same=same");
	exit;
    }
  }

// first check is it link text presented on submited page
list($befText, $text) = explode(">", $fullLink);
list($clearText, $restText) = explode("<", $text);
$urlText = file_get_contents($ourlink);
    $strip = strip_tags($urlText);

$posText = strpos($strip, $clearText);  
      if($posText === FALSE) {
         header("Location:$display?host=host"); 
	     exit; 
	  }
		 
// if everything is OK check is it link hidden
     list($control, $restLink) = explode('>', $fullLink);

$url0 = file_get_contents($ourlink);
$url1 = strtolower($url0);
$url2 = str_replace("/head", "|", $url1);
$url3 = str_replace("head", "|continue ", $url2);
$url4 = str_replace("java", "|continue ", $url3);
$url5 = str_replace("vbscript", "|continue ", $url4);
$url6 = str_replace("/script", "|", $url5);
$url7 = str_replace("<!--", "|continue", $url6);
$url8 = str_replace("-->", "|", $url7);
$url9 = str_replace("/form", "|", $url8);
$url10 = str_replace("form", "|continue ", $url9);
$url11 = str_replace("/applet", "|", $url10);
$url12 = str_replace("applet", "|continue ", $url11);

$clean = explode("|", $url12);
$count = count($clean);

for($i=0; $i<$count; $i++) {
    $word = $clean[$i];
	$firstWord = str_word_count($word, 1);

       if($firstWord[0] == "continue") {
	       continue;
	   } else {
           $pos = strpos($clean[$i], $control);

               if($pos > 0) {
			        $q = "?";
				    $pos2 = strpos($clean[$i], $q);
					      if($pos2 > 0) {
					           $pos3 = strpos($clean[$i], $q, $pos2+1);
					       }
						   
					 $p = "%";
				     $pos4 = strpos($clean[$i], $p);
					       if($pos4 > 0) {
					           $pos5 = strpos($clean[$i], $p, $pos4+1);
					       }
					
					if($pos2 < $pos && $pos3 > $pos || $pos4 < $pos && $pos5 > $pos) {
					     break;
					} else {
			             $linkExist = TRUE;
					     break;
					}
              }  else {
                    $linkExist = FALSE;
              }
	   }
} 

$admin = "<a href='$sitelink' target='_blank'>$sitename</a>|$ourlink\n"; 

// if our link exist chose mode	 
if($linkExist === TRUE && $mode == 1) {  
	$admindata = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/admin.txt";
	$fileadmin = fopen($admindata, "ab");
    fwrite($fileadmin, $admin);  // Extend data content
    fclose($fileadmin); 
	$a = str_replace("&", "|", $sitename);
	$b = str_replace("#", "-", $a);
    header("Location:$loc?message=TRUE&link=$sitelink&site=$b");

} elseif($linkExist === TRUE && $mode == 0) { 
    $data = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/data.txt";
    $fileNew = fopen($data, "ab");
    fwrite($fileNew, $admin);  // Extend data content
    fclose($fileNew); 
		
    header("Location:$loc?message=TRUE");

// if cheching result with any error
} else {
    header("Location:$loc?host=host");
	exit;
}
?>