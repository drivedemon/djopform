<!--login session-->
<?php

error_reporting(~E_NOTICE);
require 'dbconnect.php';
//Time Zone Set
date_default_timezone_set('Asia/Bangkok');
session_start();
if($_SESSION["user"] == ''){
	echo "<script type='text/javascript'>alert('กรุณาลงชื่อเข้าใช้');javascript:history.go(-1);</script>" ;
	exit(require 'login.php');

}
if($_SESSION["userID"] != $_GET['user']){
	echo "<script type='text/javascript'>alert('ข้อมูลไม่ตรงกัน');javascript:history.go(1);</script>";
	exit(require 'login.php');
}
unset($_SESSION["create_da"]);

function replacepoint($num){
	return str_replace(array( '.php' ),
	array( "" ),
	$num);
};
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
  <img src="/djopform/img/network-1.jpg" width="100%" height="125">
	<link rel="stylesheet" href="/djopform/css/style.css" type="text/css">
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<h2 style ="text-align: center">การรายงานผลการดำเนินงานร่วมกับเครือข่ายและการรายงานมูลค่า(เงินสด/วัสดุ)ที่เครือข่ายนำมาสนับสนุนภารกิจหน่วยงาน</h2>
	<title>รายงานผลการดำเนินงาน</title>
</head>
<body>
	<div style="font-size: 25px">
		<?php
		$sql_receiver = "SELECT name FROM userlogin WHERE id=".$_GET['user']."";
		$query_receiver = mysqli_query($conn,$sql_receiver);
		$data_receiver = mysqli_fetch_array($query_receiver);

		$current = date("Y");
		$userid = $_GET['user'];

		// $sql = "SELECT * FROM network_detail WHERE user_id=".$_GET['user']." ORDER BY create_date DESC";
		// $result = mysqli_query($conn,$sql);
		?>
		<?php echo "หน่วยงาน : ".$data_receiver['name']; ?>
	</div> <hr>
	<fieldset>
		<legend>
			หน้าแรก :
		</legend>

		<?php
		$strSQL = 'SELECT * FROM network_detail WHERE user_id = "'.$_GET['user'].'" and YEAR(create_date) = "'.$current.'"';
		$objQuery = mysqli_query($conn,$strSQL);
		$Num_Rows = mysqli_num_rows($objQuery);
		$Per_Page = 12;   // Per Page = แสดง 10 รายการต่อหน้าตามที่คุณต้องการ

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" order by update_date DESC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysqli_query($conn,$strSQL);
		// echo "$strSQL";
		?>
		<div style=" padding-left:30px;" >
			<table border = "1" style="width:90%">
				<tr>
					<td style="width:50%"><b><center> ชื่อเครือข่าย </center></b></td>
					<td style="width:40%"><b><center> รอบเดือน </center></b></td>
				</tr>
				<?php
				while($row = $objQuery->fetch_assoc()) {
					echo "<tr>";
					echo "<td style=\"padding-left: 20px;\">";
					echo "<a href=\"/djopform/page1/".$row['user_id']."/n=".$row['network_name']."/menu=edit\" class=\"next\">";
					echo "ชื่อเครือข่าย : " .$row["network_name"];
					echo "</a>";
					echo "</td>";
					echo "<td style=\"padding-left: 20px;\">";
					// echo "รอบเดือน ".$row["month"]." - ".$row["year"];
					// echo "<a href=\"excel.php?user=".$row['user_id']."&nname=".$row['network_name']."\">";
					echo "รายงานรอบเดือน : " .$row["month"]." - ".$row["year"];;
					// echo "</a>";
					echo "<br>";
					echo "</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
		<br>
		<div style="display :flex; justify-content: space-between">
			<a href="/djopform/page1/<?php echo $_GET['user']?>/menu=add">Add </a>
			<center>
				<!-- <button type="submit" name="export">Report</button> -->
				<input type="button" style="border:1px solid gray;" value="Report" onclick="javascript:window.open('/djopform/report/<?php echo $_GET['user'];?>/')";>
			</center>
			<a href="/djopform/logout" >Logout</a>
		</div>
	</fieldset>
	<br>
	<div class="center">
		<div class="pagination">
			<?php
			if($Prev_Page)
			{
				echo " <a href='".replacepoint($_SERVER['SCRIPT_NAME'])."/$userid/page=$Prev_Page'>&laquo; </a> ";
			}

			for($i=1; $i<=$Num_Pages; $i++){
				if($i != $Page)
				{
					echo " <a href='".replacepoint($_SERVER['SCRIPT_NAME'])."/$userid/page=$i'>$i</a> ";
				}
				else
				{
					// active class
					echo " <a class=\"active\">$i</a> ";
				}
			}
			if($Page!=$Num_Pages)
			{
				echo " <a href ='".replacepoint($_SERVER['SCRIPT_NAME'])."/$userid/page=$Next_Page'> &raquo;</a> ";
			}
			?>
		</div>
	</div>
	Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page
	<!--scripts-->
	<script src="/djopform/scripts.js" ></script>
</body>
</html>
