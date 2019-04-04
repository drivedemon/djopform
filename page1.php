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
	echo "<script type='text/javascript'>alert('ข้อมูลไม่ตรงกัน');javascript:history.go(-1);</script>" ;
	exit(require 'login.php');
}


?>
<!-- <?php
if (empty($_SESSION["year"])) {
session_start();
$year_data = $_POST['year'];
$_SESSION["year"] = $year_data;
session_write_close();
}
?> -->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
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

		$user = $_GET['user'];
		$menu = $_GET['menu'];
		$n_name = $_GET['nname'];
		$result_add = $_SESSION['create_da'];

		// edit func - query data for display
		if (!empty($n_name)) {
			$sql = "SELECT * FROM network_detail WHERE user_id=$user and network_name=\"$n_name\"";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			$row = mysqli_fetch_assoc($result);
			// print_r($row);

			// add data to variable for display
			$yQ = $row['year'];
			$mQ = $row['month'];
			$addQ = $row['address'];
			$hisQ = $row['history'];
			$date_exQ = $row['date_activity'];
			$net_typeQ = unserialize($row['network_type']);
			$net_acQ = unserialize($row['network_activity']);
		}
		if (empty($n_name) && !empty($result_add)) {
			$sql = "SELECT * FROM network_detail WHERE user_id=$user and create_date=\"$result_add\"";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			$row = mysqli_fetch_assoc($result);
			// print_r($row);

			// add data to variable for display
			$result_name = $row['network_name'];
			$yQ = $row['year'];
			$mQ = $row['month'];
			$addQ = $row['address'];
			$hisQ = $row['history'];
			$date_exQ = $row['date_activity'];
			$net_typeQ = unserialize($row['network_type']);
			$net_acQ = unserialize($row['network_activity']);
		}

		// add flag for check choice 6 disable & enable
		// if ($menu == "add") {
		// 	if ($hisQ == 2) {
		// 		$flag = 0;
		// 	} else {
		// 		$flag = 1;
		// 	}
		// }

		?>
		<?php echo "หน่วยงาน : ".$data_receiver['name']; ?>
	</div> <hr>
	<fieldset>
		<legend>
			กรุณากรอกข้อมูล:
		</legend>

		<form name="form"action="p1" method="post"enctype="multipart/form-data" >
			<input type="hidden" name="user_id" value="<?=$user?>" />
			<input type="hidden" name="n_name" value="<?=$n_name?>" />
			<input type="hidden" name="menu" value="<?=$menu?>"/>
			<div>

				<label for="month">รายงานประจำเดือน : </label>
				<select id="month" name="txtDate_month">
					<option <?php if ($mQ=="มกราคม"){echo "selected";} ?>>มกราคม</option>
					<option <?php if ($mQ=="กุมภาพันธ์"){echo "selected";} ?>>กุมภาพันธ์</option>
					<option <?php if ($mQ=="มีนาคม"){echo "selected";} ?>>มีนาคม</option>
					<option <?php if ($mQ=="เมษายน"){echo "selected";} ?>>เมษายน</option>
					<option <?php if ($mQ=="พฤษภาคม"){echo "selected";} ?>>พฤษภาคม</option>
					<option <?php if ($mQ=="มิถุนายน"){echo "selected";} ?>>มิถุนายน</option>
					<option <?php if ($mQ=="กรกฏาคม"){echo "selected";} ?>>กรกฏาคม</option>
					<option <?php if ($mQ=="สิงหาคม"){echo "selected";} ?>>สิงหาคม</option>
					<option <?php if ($mQ=="กันยายน"){echo "selected";} ?>>กันยายน</option>
					<option <?php if ($mQ=="ตุลาคม"){echo "selected";} ?>>ตุลาคม</option>
					<option <?php if ($mQ=="พฤศจิกายน"){echo "selected";} ?>>พฤศจิกายน</option>
					<option <?php if ($mQ=="ธันวาคม"){echo "selected";} ?>>ธันวาคม</option>
				</select>

				<label for="years">ปี : </label>
				<select  id="years" name="txtDate_year">
					<?php $current = date("Y")+543;
					for($y=2558;$y<=$current+1;$y++){ ?>
						<option value="<?php echo $y; ?>" <?php if ($yQ==$y){echo "selected";} ?>><?php echo $y; ?></option>
					<?php } ?>
				</select>
			</div>
			<br>
			๑.ชื่อเครือข่าย: <input type="text" name="network-name" value="<?php if(!empty($n_name)){echo "$n_name";}else{echo "$result_name";}?>" <?php if ($menu=="edit"||$n_name!=""||$result_name!=""){echo "disabled";} ?> required>
			<br><br>
			๒.ที่อยู่: <br>
			<textarea rows="10" cols="50" style="margin-left: 30px" name="address" required><?=$addQ?></textarea>
			<br><br>

			๓.ประวัติการดำเนินงานร่วมกัน:
			<br>
			<div style="padding-left: 30px">
				<input type="radio" name="operation-history" value="1" <?php if ($hisQ==1){echo "checked";} ?>> เคยมีการดำเนินงานร่วมกับหน่วยงานอื่นแล้ว
				<br>
				<input type="radio" name="operation-history" value="2" <?php if ($hisQ==2){echo "checked";} ?>> มีการประสานงานแล้วแต่ยังไม่มีการดำเนินงานร่วมกัน (หากตอบข้อนี้ ไม่ต้องตอบข้อ ๗)
				<br>
				<input type="radio" name="operation-history" value="3" <?php if ($hisQ==3){echo "checked";} ?>> ยังไม่เคยดำเนินงานร่วมกันมาก่อน (ไม่นับการดำเนินงานร่วมกันในครั้งนี้)
			</div>

			<br><br>
			๔.วัน/เดือน/ปี ที่เข้ามาทำกิจกรรม
			<br>
			<div style="margin-left: 30px">
				<input type="date" name="date" value="<?=$date_exQ?>">
				<span>(วัน-เดือน-ปี)</span>
			</div>
			<br><br>

			๕.ประเภทของเครือข่าย:
			<br>
			<div style="margin-left: 30px">
				<input type="radio" name="category" id="hide1" onClick="hide_frm('1');" value="1" <?php if ($net_typeQ[0]==1){echo "checked";} ?>/>ภาครัฐ

				<br/>
				<div id="frm_hide1" style=" padding-left:50px; <?php if ($net_typeQ[0]==1){echo "";}else{echo "display:none;";} ?>">
					<input type="radio" onClick="Checked('1')" id="t1" name="type[]" value="1" <?php if ($net_typeQ[1][0]==1){echo "checked";} ?>/>อปท
					<input type="radio" onClick="Checked('2')" id="t2" name="type[]" value="2" <?php if ($net_typeQ[1][0]==2||$net_typeQ[1][1]==2){echo "checked";} ?>/>กพย
					<input type="radio" onClick="Checked('3')" id="t3" name="type[]" value="3" <?php if ($net_typeQ[1][0]==3||$net_typeQ[1][1]==3||$net_typeQ[1][2]==3||$net_typeQ[1][3]==3||$net_typeQ[1][4]==3||$net_typeQ[1][5]==3){echo "checked";} ?>/>ยุติธรรมชุมชน
					<input type="radio" onClick="Checked('4')" id="t4" name="type[]" value="4" <?php if ($net_typeQ[1][0]==4||$net_typeQ[1][1]==4||$net_typeQ[1][2]==4||$net_typeQ[1][3]==4||$net_typeQ[1][4]==4||$net_typeQ[1][5]==4){echo "checked";} ?>/>ยุติธรรมจังหวัด
					<input type="radio" onClick="Checked('5')" id="t5" name="type[]" value="5" <?php if ($net_typeQ[1][0]==5||$net_typeQ[1][1]==5||$net_typeQ[1][2]==5||$net_typeQ[1][3]==5||$net_typeQ[1][4]==5||$net_typeQ[1][5]==5){echo "checked";} ?>/>กระทรวงศึกษาธิการ
					<input type="radio" onClick="Checked('6')" id="t6" name="type[]" value="6" <?php if ($net_typeQ[1][0]==6||$net_typeQ[1][1]==6||$net_typeQ[1][2]==6||$net_typeQ[1][3]==6||$net_typeQ[1][4]==6||$net_typeQ[1][5]==6){echo "checked";} ?>/>กระทรวงแรงงาน
					<input type="radio" onClick="Checked('7')" id="t7" name="type[]" value="7" <?php if ($net_typeQ[1][0]==7||$net_typeQ[1][1]==7||$net_typeQ[1][2]==7||$net_typeQ[1][3]==7||$net_typeQ[1][4]==7||$net_typeQ[1][5]==7){echo "checked";} ?>/>กระทรวงยุติธรรม
					<input type="radio" onClick="Checked('8')" id="t8" name="type[]" value="8" <?php if ($net_typeQ[1][0]==8||$net_typeQ[1][1]==8||$net_typeQ[1][2]==8||$net_typeQ[1][3]==8||$net_typeQ[1][4]==8||$net_typeQ[1][5]==8){echo "checked";} ?>/>กระทรวงมหาดไทย(ไม่รวม อปท)<br>
					<input type="radio" onClick="Checked('9')" id="t9" name="type[]" value="9" <?php if ($net_typeQ[1][0]==9||$net_typeQ[1][1]==9||$net_typeQ[1][2]==9||$net_typeQ[1][3]==9||$net_typeQ[1][4]==9||$net_typeQ[1][5]==9){echo "checked";} ?>/>กระทรวงพัฒนาสังคมและความมั่นคงของมนุษย์
					<input type="radio" onClick="Checked('10')" id="t10" name="type[]" value="10" <?php if ($net_typeQ[1][0]==10||$net_typeQ[1][1]==10||$net_typeQ[1][2]==10||$net_typeQ[1][3]==10||$net_typeQ[1][4]==10||$net_typeQ[1][5]==10){echo "checked";} ?>/>กระทรวงสาธารณสุข
					<input type="radio" onClick="Checked('11')" id="t11" name="type[]" value="11" <?php if ($net_typeQ[1][0]==11||$net_typeQ[1][1]==11||$net_typeQ[1][2]==11||$net_typeQ[1][3]==11||$net_typeQ[1][4]==11||$net_typeQ[1][5]==11){echo "checked";} ?>/>หน่วยงานทางศาสนา
					<input id ="myCheck1" onClick="myFunction('1')" type="radio" name="type[]" value="16"
					<?php if ($net_typeQ[1][0]==16||$net_typeQ[1][1]==16||$net_typeQ[1][2]==16||$net_typeQ[1][3]==16||$net_typeQ[1][4]==16||$net_typeQ[1][5]==16){echo "checked";} ?>/>อื่นๆ โปรดระบุ
					<input id="text1" type="text" <?php if ($net_typeQ[2]!=""){echo "";} else {echo "disabled";}?> name="other5" value="<?=$net_typeQ[2]?>" required>
				</div>


				<input type="radio" name="category" id="hide2" onClick="hide_frm('2');" value="2" <?php if ($net_typeQ[0]==2){echo "checked";} ?>/>ภาคเอกชน
				<br/>
				<div id="frm_hide2" style=" padding-left:50px; <?php if ($net_typeQ[0]==2){echo "";}else{echo "display:none;";} ?>">
					<input type="radio" name="type[]" onClick="Checked('12')" id="t12" value="12" <?php if ($net_typeQ[1][0]==12||$net_typeQ[1][1]==12||$net_typeQ[1][2]==12||$net_typeQ[1][3]==12||$net_typeQ[1][4]==12||$net_typeQ[1][5]==12){echo "checked";} ?>/>บุคคล
					<input type="radio" name="type[]" onClick="Checked('13')" id="t13" value="13" <?php if ($net_typeQ[1][0]==13||$net_typeQ[1][1]==13||$net_typeQ[1][2]==13||$net_typeQ[1][3]==13||$net_typeQ[1][4]==13||$net_typeQ[1][5]==13){echo "checked";} ?>/>กรมการสงเคราะห์
					<input type="radio" name="type[]" onClick="Checked('14')" id="t14" value="14" <?php if ($net_typeQ[1][0]==14||$net_typeQ[1][1]==14||$net_typeQ[1][2]==14||$net_typeQ[1][3]==14||$net_typeQ[1][4]==14||$net_typeQ[1][5]==14){echo "checked";} ?>/>สถานประกอบการณ์ฝห้างร้าน
					<input type="radio" name="type[]" onClick="Checked('15')" id="t15" value="15" <?php if ($net_typeQ[1][0]==15||$net_typeQ[1][1]==15||$net_typeQ[1][2]==15||$net_typeQ[1][3]==15||$net_typeQ[1][4]==15||$net_typeQ[1][5]==15){echo "checked";} ?>/>มูลนิธิ องค์กรเอกชน(NGO)
					<input id ="myCheck2" onClick="myFunction('2')" type="radio" name="type[]" value="17"
					<?php if ($net_typeQ[1][0]==17||$net_typeQ[1][1]==17||$net_typeQ[1][2]==17||$net_typeQ[1][3]==17||$net_typeQ[1][4]==17||$net_typeQ[1][5]==17){echo "checked";} ?>/>อื่นๆ โปรดระบุ
					<input id="text2"type="text" <?php if ($net_typeQ[2]!=""){echo "";} else {echo "disabled";}?> name="other5" value="<?=$net_typeQ[2]?>" required>
				</div>
			</div>
			<br>

			๖.ด้านของกิจกรรมที่เครือข่ายสนับสนุนการดำเนินงานของสถานพินิจฯและศูนย์ฝึกฯ (สามารถเลือกได้มากว่า ๑ ข้อ)
			<br>
			<div style=" padding-left:30px;" >
				<table>
					<tr>
						<td><input type="checkbox" name="act[]" id="ac1" value="1" <?php if ($net_acQ[0][0]==1){echo "checked";}  ?>/>ด้านการศึกษาสามัญ</td>
						<td><input type="checkbox" name="act[]" id="ac2" value="2" <?php if ($net_acQ[0][0]==2||$net_acQ[0][1]==2){echo "checked";}  ?>/>ด้านการเรียนวิชาชีพหรือฝึกอาชีพ</td>
						<td><input type="checkbox" name="act[]" id="ac3" value="3" <?php if ($net_acQ[0][0]==3||$net_acQ[0][1]==3||$net_acQ[0][2]==3){echo "checked";}  ?>/>ด้านการจ้างงาน</td>
						<td><input type="checkbox" name="act[]" id="ac4" value="4" <?php if ($net_acQ[0][0]==4||$net_acQ[0][1]==4||$net_acQ[0][2]==4||$net_acQ[0][3]==4){echo "checked";}  ?>/>ด้านการฝึกงาน</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="act[]" id="ac5" value="5"
							<?php if ($net_acQ[0][0]==5||$net_acQ[0][1]==5||$net_acQ[0][2]==5||$net_acQ[0][3]==5||$net_acQ[0][4]==5){echo "checked";}  ?>/>ด้านการแก้ไขบำบัดฟื้นฟู</td>
							<td><input type="checkbox" name="act[]" id="ac6" value="6"
								<?php if ($net_acQ[0][0]==6||$net_acQ[0][1]==6||$net_acQ[0][2]==6||$net_acQ[0][3]==6||$net_acQ[0][4]==6){echo "checked";}  ?>/>ด้านที่อยู่อาศัย</td>
								<td><input type="checkbox" name="act[]" id="ac7" value="7"
									<?php if ($net_acQ[0][0]==7||$net_acQ[0][1]==7||$net_acQ[0][2]==7||$net_acQ[0][3]==7||$net_acQ[0][4]==7){echo "checked";}  ?>/>ด้านสุขภาพกาย</td>
									<td><input type="checkbox" name="act[]" id="ac8" value="8"
										<?php if ($net_acQ[0][0]==8||$net_acQ[0][1]==8||$net_acQ[0][2]==8||$net_acQ[0][3]==8||$net_acQ[0][4]==8){echo "checked";}  ?>/>ด้านสุขภาพจิต</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="act[]" id="ac9" value="9"
											<?php if ($net_acQ[0][0]==9||$net_acQ[0][1]==9||$net_acQ[0][2]==9||$net_acQ[0][3]==9||$net_acQ[0][4]==9){echo "checked";}  ?>/>ด้านการติดตามหลังปล่อย/ติดตามตาม ม.๘๖</td>
											<td><input type="checkbox" name="act[]" id="ac10" value="10"
												<?php if ($net_acQ[0][0]==10||$net_acQ[0][1]==10||$net_acQ[0][2]==10||$net_acQ[0][3]==10||$net_acQ[0][4]==10){echo "checked";}  ?>/>ด้านการป้องกันการกระทำผิดกฎหมาย</td>
												<td><input type="checkbox" name="act[]" id="ac11" value="11"
													<?php if ($net_acQ[0][0]==11||$net_acQ[0][1]==11||$net_acQ[0][2]==11||$net_acQ[0][3]==11||$net_acQ[0][4]==11){echo "checked";}  ?>/>ด้านการสงเคราะห์ช่วยเหลือ</td>
												<td><input id ="myCheck3" onClick="myFunction('3')" type="checkbox" name="act[]" value="12"
													<?php if ($net_acQ[0][0]==12||$net_acQ[0][1]==12||$net_acQ[0][2]==12||$net_acQ[0][3]==12||$net_acQ[0][4]==12){echo "checked";}  ?>/>อื่นๆ โปรดระบุ:</td>
														<td><input id="text3"type="text" <?php if ($net_acQ[1]!=""){echo "";} else {echo "disabled";}?> name="other6" value="<?=$net_acQ[1]?>" required></td>
													</tr>
												</table>
											</div>
											<br>
											<center>
												<?php
												if ($menu == "add" && $n_name == "") {
													echo "<a href=\"/djopform/page2/".$user."/menu=".$menu."\" class=\"next\">Next &raquo;";
												} else {
													echo "<a href=\"/djopform/page2/".$user."/n=".$n_name."/menu=".$menu."\" class=\"next\">Next &raquo;";
												}
												?>
											</a>
										</center>
										<div style="display :flex; justify-content: space-between">
											<button type="submit">Save</button>
											&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="/djopform/logout" >Logout</a>
										</div>
									</form>
								</fieldset>
								<p><font color="red">*</font> หมายเหตุ : กรุณากรอกข้อมูลให้เรียบร้อยแล้วกดบันทึก ก่อนไปหน้าถัดไป</P>
									<!--scripts-->
									<script src="/djopform/scripts.js" ></script>
									<script>
									function hide_frm(i) {
										var ind = i;
										var ck = document.getElementById('hide'+i);
										if (ind == 1) {
											document.getElementById('frm_hide'+i).style.display = "";
											document.getElementById('frm_hide2').style.display = "none";
											document.getElementById("t1").disabled = false;
											document.getElementById("t2").disabled = false;
											document.getElementById("t3").disabled = false;
											document.getElementById("t4").disabled = false;
											document.getElementById("t5").disabled = false;
											document.getElementById("t6").disabled = false;
											document.getElementById("t7").disabled = false;
											document.getElementById("t8").disabled = false;
											document.getElementById("t9").disabled = false;
											document.getElementById("t10").disabled = false;
											document.getElementById("t11").disabled = false;
											document.getElementById("t12").checked = false;
											document.getElementById("t13").checked = false;
											document.getElementById("t14").checked = false;
											document.getElementById("t15").checked = false;
											document.getElementById("t12").disabled = true;
											document.getElementById("t13").disabled = true;
											document.getElementById("t14").disabled = true;
											document.getElementById("t15").disabled = true;
											document.getElementById("myCheck1").disabled = false;
											document.getElementById("myCheck2").disabled = true;
											document.getElementById("myCheck2").checked = false;
											document.getElementById("text1").value = "";
											document.getElementById("text1").disabled = true;
											document.getElementById("text2").value = "";
											document.getElementById("text2").disabled = true;
										} else {
											document.getElementById('frm_hide'+i).style.display = "";
											document.getElementById('frm_hide1').style.display = "none";
											document.getElementById("t1").checked = false;
											document.getElementById("t2").checked = false;
											document.getElementById("t3").checked = false;
											document.getElementById("t4").checked = false;
											document.getElementById("t5").checked = false;
											document.getElementById("t6").checked = false;
											document.getElementById("t7").checked = false;
											document.getElementById("t8").checked = false;
											document.getElementById("t9").checked = false;
											document.getElementById("t10").checked = false;
											document.getElementById("t11").checked = false;
											document.getElementById("t1").disabled = true;
											document.getElementById("t2").disabled = true;
											document.getElementById("t3").disabled = true;
											document.getElementById("t4").disabled = true;
											document.getElementById("t5").disabled = true;
											document.getElementById("t6").disabled = true;
											document.getElementById("t7").disabled = true;
											document.getElementById("t8").disabled = true;
											document.getElementById("t9").disabled = true;
											document.getElementById("t10").disabled = true;
											document.getElementById("t11").disabled = true;
											document.getElementById("t12").disabled = false;
											document.getElementById("t13").disabled = false;
											document.getElementById("t14").disabled = false;
											document.getElementById("t15").disabled = false;
											document.getElementById("myCheck1").disabled = true;
											document.getElementById("myCheck1").checked = false;
											document.getElementById("myCheck2").disabled = false;
											document.getElementById("text1").value = "";
											document.getElementById("text1").disabled = true;
											document.getElementById("text2").value = "";
											document.getElementById("text2").disabled = true;
										}
									}

									function myFunction(i) {
										var checkBox = document.getElementById("myCheck"+i);
										var text = document.getElementById("text"+i);
										if (checkBox.checked == true){
											text.disabled = false;
										} else {
											text.value = "";
											text.disabled = true;
										}
									}

									function Checked(i) {
										var t = document.getElementById("t"+i);
										var h1 = document.getElementById("hide1");
										var h2 = document.getElementById("hide2");
										var text = document.getElementById("text1");
										var text2 = document.getElementById("text2");
										if (t.checked == true && h1.checked == true) {
											text.value = "";
											text.disabled = true;
										} else if (t.checked == true && h2.checked == true) {
												text2.value = "";
												text2.disabled = true;
										}
									}

									function refresh() {
										var h1 = document.getElementById("hide1");
										var h2 = document.getElementById("hide2");
										if (h1.checked == true) {
											document.getElementById('frm_hide1').style.display = "";
										} else if (h2.checked == true) {
											document.getElementById('frm_hide2').style.display = "";
										}
									 }
									window.onload = refresh;
									// function check choice 3
									// function Choice(i) {
									// 	var ac1 = document.getElementById("ac1");
									// 	var ac2 = document.getElementById("ac2");
									// 	var ac3 = document.getElementById("ac3");
									// 	var ac4 = document.getElementById("ac4");
									// 	var ac5 = document.getElementById("ac5");
									// 	var ac6 = document.getElementById("ac6");
									// 	var ac7 = document.getElementById("ac7");
									// 	var ac8 = document.getElementById("ac8");
									// 	var ac9 = document.getElementById("ac9");
									// 	var ac10 = document.getElementById("ac10");
									// 	var my3 = document.getElementById("myCheck3");
									// 	var t3 = document.getElementById("text3");
									// 	if (i == 2) {
									// 		ac1.checked = false;
									// 		ac2.checked = false;
									// 		ac3.checked = false;
									// 		ac4.checked = false;
									// 		ac5.checked = false;
									// 		ac6.checked = false;
									// 		ac7.checked = false;
									// 		ac8.checked = false;
									// 		ac9.checked = false;
									// 		ac10.checked = false;
									// 		ac1.disabled = true;
									// 		ac2.disabled = true;
									// 		ac3.disabled = true;
									// 		ac4.disabled = true;
									// 		ac5.disabled = true;
									// 		ac6.disabled = true;
									// 		ac7.disabled = true;
									// 		ac8.disabled = true;
									// 		ac9.disabled = true;
									// 		ac10.disabled = true;
									// 		my3.disabled = true;
									// 		my3.checked = false;
									// 		t3.value = "";
									// 		t3.disabled = true;
									// 	} else {
									// 		ac1.disabled = false;
									// 		ac2.disabled = false;
									// 		ac3.disabled = false;
									// 		ac4.disabled = false;
									// 		ac5.disabled = false;
									// 		ac6.disabled = false;
									// 		ac7.disabled = false;
									// 		ac8.disabled = false;
									// 		ac9.disabled = false;
									// 		ac10.disabled = false;
									// 		my3.disabled = false;
									// 		t3.value = "";
									// 		t3.disabled = true;
									// 	}
									// }

									</script>
								</body>
								</html>
