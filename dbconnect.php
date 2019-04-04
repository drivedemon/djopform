<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "formproject";
	$db2 = "login";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	$conn->query("set names utf8");
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$cond = new mysqli($servername, $username, $password, $db2);
	$cond->query("set names utf8");
	// Check connection
	if ($cond->connect_error) {
	die("Connection failed: " . $cond->connect_error);
	}

	function thainumDigit($num){
	  return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
	  array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
	  $num);
	};

	function arabicnumDigit($num){
	  return str_replace(array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
	  array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
	  $num);
	};

	function monthnumDigit($num){
	  return str_replace(array( '01' , '02' , '03' , '04' , '05' , '06' ,'07' , '08' , '09' , '10' , '11' , '12' ),
	  array( "ม.ค." , "ก.พ." , "มี.ค." , "เม.ย." , "พ.ค." , "มิ.ย." , "ก.ค." , "ส.ค." , "ก.ย." , "ต.ค." , "พ.ย." , "ธ.ค." ),
	  $num);
	};

	function thainamedepartFull($name){
	  return str_replace(array( 'ศฝฯ' , 'สพฯ'),
	  array( "ศูนย์ฝึก" , "สถานพินิจและคุ้มครองเด็กและเยาวชนจังหวัด"),
	  $name);
	};

	function floatInt($int){
	    $ex_br = explode("<br>", $int);
	    $count = count($ex_br);
	    // ex[0] > br || ex[1] > number
	    $i = 1;
	    while ($i <= $count) {
	      $ind = $i-1;
	      $point = strpos($ex_br[$ind], ".");
	      if ($point == true) {
	        if ($ind == 0) {
	          $arr = explode(".", $ex_br[$ind]);
	          $num = number_format($arr[0]);
	          $decimal = substr($arr[1], 0, 2);
	          $int = thainumDigit($num).".".thainumDigit($decimal);
	        } else {
	          $arr = explode(".", $ex_br[$ind]);
	          $num = number_format($arr[0]);
	          $decimal = substr($arr[1], 0, 2);
	          $int .= "<br>".thainumDigit($num).".".thainumDigit($decimal);
	        }
	      } else {
	        if ($ind == 0) {
	          $decimal = ".๐๐";
	          $num = number_format($ex_br[$ind]);
	          $int = thainumDigit($num).$decimal;
	        } else {
	          $decimal = ".๐๐";
	          $num = number_format($ex_br[$ind]);
	          $int .= "<br>".thainumDigit($num).$decimal;
	        }
	      }
	      $i++;
	    }
	    return $int;
	};
?>
