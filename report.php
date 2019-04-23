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
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
	<link rel="stylesheet" href="/djopform/css/style.css" type="text/css">
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<img src="/djopform/img/network-1.jpg" width="100%" height="125">
	<h2 style ="text-align: center">การรายงานผลการดำเนินงานร่วมกับเครือข่ายและการรายงานมูลค่า(เงินสด/วัสดุ)ที่เครือข่ายนำมาสนับสนุนภารกิจหน่วยงาน</h2>
	<title>รายงานผลการดำเนินงาน</title>
</head>
<body>
	<div style="font-size: 25px; display :flex; justify-content: space-between">
		<?php
		$sql_receiver = "SELECT name FROM userlogin WHERE id=".$_GET['user']."";
		$query_receiver = mysqli_query($conn,$sql_receiver);
		$data_receiver = mysqli_fetch_array($query_receiver);

		// $sql = "SELECT * FROM network_detail WHERE user_id=".$_GET['user']." ORDER BY create_date DESC";
		// $result = mysqli_query($conn,$sql);
		?>
		<?php echo "หน่วยงาน : ".$data_receiver['name']; ?>
		<button class="button button5" style="<?php if ($_GET['user']==111||$_GET['user']==999){echo "";}else{echo "display:none;";} ?>" onclick="<?php if ($_GET['user']==111||$_GET['user']==999){echo "javascript:window.open('admin_excel');";}else{echo "";} ?>">Admin report</button>
	</div> <hr>
	<fieldset>
		<form name="form" action="excel" method="post"enctype="multipart/form-data" target="report.php" >
			<input type="hidden" name="user_id" value="<?php echo $_GET['user'];?>"/>
			<input type="hidden" name="user" value="<?php echo $data_receiver['name']?>"/>
			<br>
			<div align="center" class="centercolor">
				<h3>การพิมพ์รายงานรอบเดือน</h3>
				<label for="month">เดือน : </label>
				<select id="month" name="dateMonth">
					<option>มกราคม</option>
					<option>กุมภาพันธ์</option>
					<option>มีนาคม</option>
					<option>เมษายน</option>
					<option>พฤษภาคม</option>
					<option>มิถุนายน</option>
					<option>กรกฏาคม</option>
					<option>สิงหาคม</option>
					<option>กันยายน</option>
					<option>ตุลาคม</option>
					<option>พฤศจิกายน</option>
					<option>ธันวาคม</option>
				</select>

				<label for="years">&nbsp; ปี : </label>
				<select  id="years" name="dateYear">
					<?php $current = date("Y")+543;
					for($y=2558;$y<=$current+1;$y++){ ?>
						<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
					<?php } ?>
				</select>
				<br><br>
				<input type="checkbox" id="all" onClick="clickChange()" name="selectAll" value="0"> ทั้งหมดในหน่วยงาน
			</div>
			<br>
				<div style="display :flex; justify-content: space-between">
					<button type="button" name="export" style="visibility:hidden;">Export</button>
					<button type="submit" name="export">Export</button>
				<input type="button" style="border:1px solid gray;" value="Close" onclick="javascript:window.close();">
			</div>
		</form>
	</fieldset>
	<!--scripts-->
	<script src="/djopform/scripts.js" ></script>
	<script>
	function clickChange () {
	    var checkBox = document.getElementById("all");
	    var year = document.getElementById("years");
	    var month = document.getElementById("month");
	    if (checkBox.checked == true) {
	        year.disabled = true;
			    month.disabled = true;
	    } else {
				year.disabled = false;
				month.disabled = false;
	    }
	}
	</script>
</body>
</html>
