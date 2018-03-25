<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/custom.php");
$admin = @$_SERVER['DOC_ROOT'] . "/linkspider/admin/index.php";
$adminFile = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/admin.txt";
$dataFile  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/data.txt";
$blackFile  = $_SERVER['DOCUMENT_ROOT'] . "/linkspider/admin/black.txt";
// prepare link for control
   list($control, $restLink) = explode('>', $fullLink);
   
// include new link in data file 
   $del = $_GET['del'];
   $include = $_GET['include']; 
   $delinc = "del";
   
   if($include == "yes") {
        $af = file($adminFile);
        foreach($af as $val) {
		    if(strpos($val, $del) !== FALSE) {
			    $inc = $val;
				$delinc = "href";
				break;
			}
		}
    $rec3 = fopen($dataFile, "ab");
	fwrite($rec3, $inc); 
    fclose($rec3); 
}

// include site in black list
   $black = $_GET['black'];
   if($black == "yes") {
	  $kick = "$del\n";	
      $recBlack = fopen($blackFile, "ab");
	  fwrite($recBlack, $kick); 
      fclose($recBlack); 
  }	
   
// delete links from admin.txt 	   
   $delnew = $_GET['delnew'];
  
if($delnew == "yes") {
   $fileArray2 = file($adminFile); // Create an array from admin data file
   if (!$fileArray2) { 
      echo "ERROR: Unable to open data file!<br />\n";
      exit;
  } else {
   for($i2 = 0; $i2 < count($fileArray2); $i2++) { // Count the elements in the array
       $tmp2 = explode("|", $fileArray2[$i2]); // Explode each elements in the tmp array
       if(strpos($tmp2[1], $del) !== FALSE) {
           break; // Stop the loops when find id in the tmp array
  } 
} 
   $newLine2 = ""; // Create empty line
   $fileArray2[$i2] = $newLine2; // Replace old line in the array with new line
   $lines2 = count($fileArray2); // Count the lines in the array

   $fileNew2 = fopen($adminFile, "wb"); // Open the admin data file for writing
   for($f=0; $f<$lines2; $f++) {
      fwrite($fileNew2, $fileArray2[$f]); // Overwrite the existing content
   }
   fclose($fileNew2); // Close the file
   }
header("Location:$admin?$delinc=$del&included=yes#999");
exit;
}

// delete links from data.txt
   $delold = $_GET['delold'];
   
if($delold == "yes") {
   $fileArray = file($dataFile); // Create an array from data file
   if (!$fileArray) { 
      echo "ERROR: Unable to open data file!<br />\n";
      exit;
  } else {
   for($i = 0; $i < count($fileArray); $i++) { // Count the elements in the array
       $tmp = explode("|", $fileArray[$i]); // Explode each elements in the tmp array
       if(strpos($tmp[1], $del) !== FALSE) {
           break; // Stop the loops when find id in the tmp array
    } 
} 
   $newLine = ""; // Create empty line
   $fileArray[$i] = $newLine; // Replace old line in the array with new line
   $lines = count($fileArray); // Count the lines in the array

   $fileNew = fopen($dataFile, "wb"); // Open the admin data file for writing
   for($a=0; $a<$lines; $a++) {
      fwrite($fileNew, $fileArray[$a]); // Overwrite the existing content
   }
   fclose($fileNew); // Close the file
   }
   
header("Location:$admin");
exit;
}

// check if link exist
    $checking = $_GET['check'];
	
if($checking != "") {
    $url0 = file_get_contents($checking);
    $url1 = strtolower($url0);
    $pos = strpos($url1, $control);
       if($pos > 0) {
           header("Location:$admin?href=$checking&check=OK#333");
       } else {
           header("Location:$admin?href=$checking&check=NOT_OK#333");
       }
}

?>