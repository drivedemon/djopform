<!--login session-->
<?php

error_reporting(~E_NOTICE);
require 'dbconnect.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<img src="/djopform/img/network-1.jpg" width="100%" height="125">
	<h2>การรายงานผลการดำเนินงานร่วมกับเครือข่ายและการรายงานมูลค่า(เงินสด/วัสดุ)ที่เครืออข่ายนำมาสนับสนุนภารกิจหน่วยงาน(ต่อ)</h2>
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
		$c_date = $_SESSION['create_da'];
		// echo "$c_date";
		// add func - query with crate date for check condi in page2
		if ($menu == "add") {
			$sqlA = "SELECT * FROM network_detail WHERE user_id=$user and create_date="."\"$c_date\"";
			$resultA = mysqli_query($conn,$sqlA) or die(mysqli_error());
			$rowA = mysqli_fetch_array($resultA);
		}
		$n_name_query = $rowA['network_name'];
		$his2 = $rowA["history"];

		// edit func - query data for display
		if (!empty($n_name)) {
			$sqlQ = "SELECT * FROM network_detail WHERE user_id=$user and network_name=\"$n_name\"";
			$resultQ = mysqli_query($conn,$sqlQ) or die(mysqli_error());
			$rowQ = mysqli_fetch_array($resultQ);

			$his2Q = $rowQ['history'];

			// add data to variable for display
			// 7.1-1.5
			if ($his2 != 2 && $his2Q != 2) {
				$c7Q = unserialize($rowQ['valuation']);
			}
			// print_r($c7Q);
			if (!empty($c7Q)) {
				foreach ($c7Q as $key => $value) {
					// list all value 7.1
					if ($value[0]==1) {
						$c71 = $value[0];
						$c71_am = $value['amount'];
						$c71_ref = $value['reference'];
						$c71_oth = $value['other'];
						$c71_ed = $value['evaluation_details'];
						if (!empty($c71_ref)) {
							foreach ($c71_ref as $valueref) {
								if ($valueref==1) {
									$c71_ref1 = $valueref;
								} elseif ($valueref==2) {
									$c71_ref2 = $valueref;
								} elseif ($valueref==3) {
									$c71_ref3 = $valueref;
								} elseif ($valueref==4) {
									$c71_ref4 = $valueref;
								} elseif ($valueref==5) {
									$c71_ref5 = $valueref;
								} elseif ($valueref==6) {
									$c71_ref6 = $valueref;
								}}
							}
							// list all value 7.2
					} elseif ($value[0]==2) {
						$c72 = $value[0];
						$c72_artist = $value['artist'];
						$c72_supdepart = $value['supdepart'];
						$c72_lec = $value['lecturer'];
						if (!empty($c72_lec)) {
						foreach ($c72_lec as $keylec => $valuelec) {
							if ($keylec == "amount") {
								$c72l_am = $valuelec;
							} elseif ($keylec == "value") {
								$c72l_val = $valuelec;
							} elseif ($keylec == "time") {
								$c72l_t = $valuelec;
							} elseif ($keylec == "child_num") {
								$c72l_cn = $valuelec;
							}}}
						$c72_act = $value['stu_act'];
						if (!empty($c72_act)) {
						foreach ($c72_act as $keyact => $valueact) {
							if ($keyact == "amount") {
								$c72ac_am = $valueact;
							} elseif ($keyact == "time") {
								$c72ac_t = $valueact;
							} elseif ($keyact == "child_num") {
								$c72ac_cn = $valueact;
							}}}
						$c72_aprt = $value['stu_aprt'];
						if (!empty($c72_aprt)) {
						foreach ($c72_aprt as $keyaprt => $valueaprt) {
							if ($keyaprt == "amount") {
								$c72aprt_am = $valueaprt;
							} elseif ($keyaprt == "time") {
								$c72aprt_t = $valueaprt;
							} elseif ($keyaprt == "child_num") {
								$c72aprt_cn = $valueaprt;
							}}}
						$c72_out = $value['out_act'];
						if (!empty($c72_out)) {
						foreach ($c72_out as $keyout => $valueout) {
							if ($keyout == "amount") {
								$c72out_am = $valueout;
							} elseif ($keyout == "time") {
								$c72out_t = $valueout;
							} elseif ($keyout == "child_num") {
								$c72out_cn = $valueout;
							}}}
						$c724_oth = $value['other'];
						if (!empty($c724_oth)) {
						foreach ($c724_oth as $keyoth => $valueoth) {
							if ($keyoth == "specify") {
								$c72oth_sp = $valueoth;
							} elseif ($keyoth == "value") {
								$c72oth_val = $valueoth;
							}}}
							$c72_ref = $value['reference'];
							if (!empty($c72_ref)) {
							foreach ($c72_ref as $valueref2) {
								if ($valueref2==1) {
									$c72_ref1 = $valueref2;
								} elseif ($valueref2==2) {
									$c72_ref2 = $valueref2;
								} elseif ($valueref2==3) {
									$c72_ref3 = $valueref2;
								} elseif ($valueref2==4) {
									$c72_ref4 = $valueref2;
								} elseif ($valueref2==5) {
									$c72_ref5 = $valueref2;
								} elseif ($valueref2==6) {
									$c72_ref6 = $valueref2;
								}}}
						$c72_oth = $value['other7_2'];
						$c72_ed = $value['evaluation_details'];
					// list all value 7.3
					} elseif ($value[0]==3) {
						$c73 = $value[0];
						$c73_mt = $value['material'];
						if (!empty($c73_mt)) {
						foreach ($c73_mt as $keymt => $valuemt) {
							if ($keymt == "material_name") {
								$c73mt_mn = $valuemt;
							} elseif ($keymt == "amount") {
								$c73mt_am = $valuemt;
							} elseif ($keymt == "value") {
								$c73mt_val = $valuemt;
							}}}
						$c732_food = $value['food'];
						if (!empty($c732_food)) {
						foreach ($c732_food as $keymt_food => $valuemt_food) {
							if ($keymt_food == "food_name") {
								$c732mt_fn = $valuemt_food;
							} elseif ($keymt_food == "child_num") {
								$c732mt_cn = $valuemt_food;
							} elseif ($keymt_food == "officer_num") {
								$c732mt_on = $valuemt_food;
							} elseif ($keymt_food == "value") {
								$c732mt_val = $valuemt_food;
							}}}
						$c733_rw = $value['rewards'];
						if (!empty($c733_rw)) {
						foreach ($c733_rw as $keymt_rw => $valuemt_rw) {
							if ($keymt_rw == "amount") {
								$c733mt_am = $valuemt_rw;
							} elseif ($keymt_rw == "value") {
								$c733mt_val = $valuemt_rw;
							}}}
						$c734_p = $value['place'];
						if (!empty($c734_p)) {
						foreach ($c734_p as $keymt_p => $valuemt_p) {
							if ($keymt_p == "hour") {
								$c734mt_h = $valuemt_p;
							} elseif ($keymt_p == "day") {
								$c734mt_d = $valuemt_p;
							} elseif ($keymt_p == "participants") {
								$c734mt_pp = $valuemt_p;
							} elseif ($keymt_p == "value") {
								$c734mt_val = $valuemt_p;
							}}}
						$c735_vh = $value['vehicle'];
						if (!empty($c735_vh)) {
						foreach ($c735_vh as $keymt_vh => $valuemt_vh) {
							if ($keymt_vh == "amount") {
								$c735mt_am = $valuemt_vh;
							} elseif ($keymt_vh == "value1") {
								$c735mt_val1 = $valuemt_vh;
							} elseif ($keymt_vh == "participants") {
								$c735mt_pp = $valuemt_vh;
							} elseif ($keymt_vh == "value2") {
								$c735mt_val2 = $valuemt_vh;
							}}}
						$c736_sad = $value['substance_abuse_detection'];
						if (!empty($c736_sad)) {
						foreach ($c736_sad as $keymt_sad => $valuemt_sad) {
							if ($keymt_sad == "child_num") {
								$c736mt_sad = $valuemt_sad;
							} elseif ($keymt_sad == "value") {
								$c736mt_val = $valuemt_sad;
							}}}
						$c737_bm = $value['banned_materials'];
						if (!empty($c737_bm)) {
						foreach ($c737_bm as $keymt_bm => $valuemt_bm) {
							if ($keymt_bm == "amount") {
								$c737mt_am = $valuemt_bm;
							} elseif ($keymt_bm == "value") {
								$c737mt_val = $valuemt_bm;
							}}}
						$c73_med = $value['medical_services'];
						if (!empty($c73_med)) {
						foreach ($c73_med as $keymt_med => $valuemt_med) {
							if ($keymt_med == "child_num") {
								$c73med_cn = $valuemt_med;
							} elseif ($keymt_med == "value") {
								$c73med_val = $valuemt_med;
							}}}
						$c73_objmed = $value['obj_medical'];
						if (!empty($c73_objmed)) {
						foreach ($c73_objmed as $keymt_objmed => $valuemt_objmed) {
							if ($keymt_objmed == "object") {
								$c73objmed_obj = $valuemt_objmed;
							} elseif ($keymt_objmed == "child_num") {
								$c73objmed_cn = $valuemt_objmed;
							} elseif ($keymt_objmed == "value") {
								$c73objmed_val = $valuemt_objmed;
							}}}
						$c738_oth = $value['other'];
						if (!empty($c738_oth)) {
						foreach ($c738_oth as $keymt_oth => $valuemt_oth) {
							if ($keymt_oth == "other") {
								$c738mt_oth = $valuemt_oth;
							} elseif ($keymt_oth == "child_num") {
								$c738mt_cn = $valuemt_oth;
							} elseif ($keymt_oth == "value") {
								$c738mt_val = $valuemt_oth;
							}}}
						$c73_ref = $value['reference'];
						if (!empty($c73_ref)) {
						foreach ($c73_ref as $valueref3) {
							if ($valueref3==1) {
								$c73_ref1 = $valueref3;
							} elseif ($valueref3==2) {
								$c73_ref2 = $valueref3;
							} elseif ($valueref3==3) {
								$c73_ref3 = $valueref3;
							} elseif ($valueref3==4) {
								$c73_ref4 = $valueref3;
							} elseif ($valueref3==5) {
								$c73_ref5 = $valueref3;
							} elseif ($valueref3==6) {
								$c73_ref6 = $valueref3;
							}}}
							$c73_oth = $value['other7_3'];
							$c73_ed = $value['evaluation_details'];
						// list all value 7.4
					} elseif ($value[0]==4) {
						$c74 = $value[0];
						$c74_res = $value['residence'];
						if (!empty($c74_res)) {
						foreach ($c74_res as $keyres => $valueres) {
							if ($keyres == "child_num") {
								$c741res_cn = $valueres;
							} elseif ($keyres == "value") {
								$c741res_val = $valueres;
							}}}
						// $c74_ms = $value['medical_services'];
						// if (!empty($c74_ms)) {
						// foreach ($c74_ms as $keyms => $valuems) {
						// 	if ($keyms == "child_num") {
						// 		$c742res_cn = $valuems;
						// 	} elseif ($keyms == "value") {
						// 		$c742res_val = $valuems;
						// 	}}}
						$c74_ff = $value['foster_family'];
						if (!empty($c74_ff)) {
						foreach ($c74_ff as $keyff => $valueff) {
							if ($keyff == "child_num") {
								$c743res_cn = $valueff;
							} elseif ($keyff == "value") {
								$c743res_val = $valueff;
							}}}
						$c74_fp = $value['foster_parents'];
						if (!empty($c74_fp)) {
						foreach ($c74_fp as $keyfp => $valuefp) {
							if ($keyfp == "child_num") {
								$c744res_cn = $valuefp;
							} elseif ($keyfp == "value") {
								$c744res_val = $valuefp;
							}}}
						$c74_emp = $value['employment'];
						if (!empty($c74_emp)) {
						foreach ($c74_emp as $keyemp => $valueemp) {
							if ($keyemp == "child_num") {
								$c745res_cn = $valueemp;
							} elseif ($keyemp == "value") {
								$c745res_val = $valueemp;
							}}}
						$c74_grt = $value['guarantee'];
						if (!empty($c74_grt)) {
						foreach ($c74_grt as $keygrt => $valuegrt) {
							if ($keygrt == "child_num") {
								$c746res_cn = $valuegrt;
							} elseif ($keygrt == "value") {
								$c746res_val = $valuegrt;
							}}}
						$c74_ap = $value['apprentice'];
						if (!empty($c74_ap)) {
						foreach ($c74_ap as $keyap => $valueap) {
							if ($keyap == "child_num") {
								$c747res_cn = $valueap;
							} elseif ($keyap == "time") {
								$c747res_t = $valueap;
							} elseif ($keyap == "value") {
								$c747res_val = $valueap;
							}}}
						$c74_am = $value['admission'];
						if (!empty($c74_am)) {
						foreach ($c74_am as $keyam => $valueam) {
							if ($keyam == "child_num") {
								$c748res_cn = $valueam;
							} elseif ($keyam == "value") {
								$c748res_val = $valueam;
							}}}
						// $c74_cs = $value['coordinate_study'];
						// if (!empty($c74_cs)) {
						// foreach ($c74_cs as $keycs => $valuecs) {
						// 	if ($keycs == "child_num") {
						// 		$c749res_cn = $valuecs;
						// 	} elseif ($keycs == "value") {
						// 		$c749res_val = $valuecs;
						// 	}}}
						$c74_ss = $value['scholarship'];
						if (!empty($c74_ss)) {
						foreach ($c74_ss as $keyss => $valuess) {
							if ($keyss == "child_num") {
								$c7410res_cn = $valuess;
							} elseif ($keyss == "value") {
								$c7410res_val = $valuess;
							}}}
						$c74_sc = $value['supcareer'];
						if (!empty($c74_sc)) {
						foreach ($c74_sc as $keysc => $valuesc) {
							if ($keysc == "child_num") {
								$c74sc_cn = $valuesc;
							} elseif ($keysc == "value") {
								$c74sc_val = $valuesc;
							}}}
						$c7411_oth = $value['other'];
						if (!empty($c7411_oth)) {
						foreach ($c7411_oth as $keyres_oth => $valueres_oth) {
							if ($keyres_oth == "other") {
								$c7411res_oth = $valueres_oth;
							} elseif ($keyres_oth == "child_num") {
								$c7411res_cn = $valueres_oth;
							} elseif ($keyres_oth == "value") {
								$c7411res_val = $valueres_oth;
							}}}
						$c74_ref = $value['reference'];
						if (!empty($c74_ref)) {
						foreach ($c74_ref as $valueref4) {
							if ($valueref4==1) {
								$c74_ref1 = $valueref4;
							} elseif ($valueref4==2) {
								$c74_ref2 = $valueref4;
							} elseif ($valueref4==3) {
								$c74_ref3 = $valueref4;
							} elseif ($valueref4==4) {
								$c74_ref4 = $valueref4;
							} elseif ($valueref4==5) {
								$c74_ref5 = $valueref4;
							} elseif ($valueref4==6) {
								$c74_ref6 = $valueref4;
							}}}
						$c74_oth = $value['other7_4'];
						$c74_ed = $value['evaluation_details'];
						// list all value 7.5
					} elseif ($value[0]==5) {
						$c75 = $value[0];
						$c75_rel = $value['release'];
						if (!empty($c75_rel)) {
						foreach ($c75_rel as $keyrel => $valuerel) {
							if ($keyrel == "center_name") {
								$c751rel_ctn = $valuerel;
							} elseif ($keyrel == "child_num") {
								$c751rel_cn = $valuerel;
							} elseif ($keyrel == "time") {
								$c751rel_t = $valuerel;
							} elseif ($keyrel == "value") {
								$c751rel_val = $valuerel;
							} elseif ($keyrel == "reference") {
								$c751rel_ref = $valuerel;
								if (!empty($c751rel_ref)) {
									foreach ($c751rel_ref as $valueref751) {
										if ($valueref751==1) {
											$r751_1 = $valueref751;
										} elseif ($valueref751==7) {
											$r751_2 = $valueref751;
										} elseif ($valueref751==6) {
											$r751_3 = $valueref751;
										}}}
							} elseif ($keyrel == "other7_5_1") {
								$c751rel_oth = $valuerel;
							}}
						}
						$c75_st = $value['statute'];
						if (!empty($c75_st)) {
							foreach ($c75_st as $keyst => $valuest) {
								if ($keyst == "child_num") {
									$c752st_cn = $valuest;
								} elseif ($keyst == "time") {
									$c752st_t = $valuest;
								} elseif ($keyst == "value") {
									$c752st_val = $valuest;
								} elseif ($keyst == "reference") {
									$c752st_ref = $valuest;
									foreach ($c752st_ref as $valueref752) {
										if ($valueref752==1) {
											$r752_1 = $valueref752;
										} elseif ($valueref752==7) {
											$r752_2 = $valueref752;
										} elseif ($valueref752==6) {
											$r752_3 = $valueref752;
										}}
									} elseif ($keyst == "other7_5_2") {
										$c752st_oth = $valuest;
									}}}
							}
						}
							// print_r($c72_lec);
							// echo "$c72l_val";
							// echo "<br>";
							// print_r($c7Q[1]);
							// echo "<br>";
							// echo "<br>";
							// echo "<br>";
						}
						// 8 9 10
						$probQ = unserialize($rowQ['problem']);
						$staQ = unserialize($rowQ['status_juvenile']);
						$netdescQ = $rowQ['network_role_description'];
						$rec_agre = $rowQ['recording_agreement'];
					}

					if ($his2 == 2 || $his2Q == 2) {
						$dis = "disabled";
					}
				?>
				<?php echo "หน่วยงาน : ".$data_receiver['name']; ?>
</div>
<fieldset>
<legend>
กรุณากรอกข้อมูล:
</legend>
<!--Form-->
<form action="p2" method="post"enctype="multipart/form-data">
<input type="hidden" name="user_id" value="<?=$user?>"/>
<input type="hidden" name="menu" value="<?=$menu?>"/>
<input type="hidden" name="n_name" value="<?=$n_name?>" />
<input type="hidden" name="network_name" value="<?=$n_name_query?>"/>
<input type="hidden" name="filenameget" value="<?=$rec_agre?>"/>
<input type="hidden" name="oph2" value="<?=$dis?>"/>
๗.การประเมินมูลค่า
<p style="padding-left:30px">รูปแบบการสนับสนุนของเครือข่าย มีดังนี้ (สามารถเลือกได้มากว่า ๑ ข้อ)</p>
<div style="padding-left:30px" >
	๗.๑ <input  id="hide1" onClick="hide_frm('1');"  type="checkbox" name="sup[]" value="1" <?=$dis?> <?php if ($c71==1){echo "checked";} ?>> สนับสนุนด้วยการบริจาคเงินสด

	จำนวน:<input id="amount" name="amount" <?php if ($c71_am!=""){echo "";} else {echo "disabled";}?> type="text" id="txt1" onkeypress="keyintdot('1')" maxlength="7" value="<?=$c71_am?>" required/> บาท
	<div id="frm_hide1" style="<?php if ($c71==1){echo "";}else {echo "display:none;";} ?>">
		<br>
		<text style="padding-left:30px">โดยมีเอกสารอ้างอิงได้แก่:</text>
		<input type="checkbox" id="r7_1_1" name="ref7_1[]" value="1" <?php if ($c71_ref1!=""){echo "checked";} ?>> รูปภาพ
		<input type="checkbox" id="r7_1_2" name="ref7_1[]" value="2" <?php if ($c71_ref2!=""){echo "checked";} ?>> หนังสือประเมินราคา
		<input type="checkbox" id="r7_1_3" name="ref7_1[]" value="3" <?php if ($c71_ref3!=""){echo "checked";} ?>> ใบเซ็นชื่อวิทยากร
		<input type="checkbox" id="r7_1_4" name="ref7_1[]" value="4" <?php if ($c71_ref4!=""){echo "checked";} ?>> ใบเสร็จรับเงิน
		<input type="checkbox" id="r7_1_5" name="ref7_1[]" value="5" <?php if ($c71_ref5!=""){echo "checked";} ?>> หนังสือขอบคุณ

		<input id ="myCheck1" onClick="myFunction('1')" type="checkbox" name="ref7_1[]" value="6"
		<?php if ($c71_ref6!=""){echo "checked";} ?>>อื่นๆ โปรดระบุ:
			<input  id="text1" <?php if ($c71_oth!=""){echo "";} else {echo "disabled";}?> type="text" name='other7_1' value="<?=$c71_oth?>" required>
			<br><br>
			<div style="padding-left:30px">
				รายละเอียดการประเมิน(กรอกรายละเอียด):
				<br>
				<textarea id="vde7_1" name="val_detail7_1" <?php if ($c71_ed!=""){echo "";} else {echo "disabled";}?> rows="10" cols="100" required><?=$c71_ed?></textarea>
			</div>
		</div>
		<br>

		๗.๒ <input id="hide2" onClick="hide_frm('2');" type="checkbox" name="sup[]" value="2" <?=$dis?> <?php if ($c72==2){echo "checked";} ?>> สนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงาน (สามารถเลือกได้มากว่า ๑ ข้อ)
		<div id="frm_hide2" style="<?php if ($c72==2){echo "";}else {echo "display:none;";} ?>">
			<div style="padding-left:60px">
				<input onClick='enableinput(1)' id="discheck1" type="checkbox" name="7_2[]" value = "lecturer" <?php if ($c72_lec!=""){echo "checked";} ?>>  วิทยากร
				<label id="dis1">
					จำนวน: <input  type="text" id="lec7_2_1" name='txt7_2_1[]' onkeypress="keyintdot()" maxlength="3" require <?php if ($c72l_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72l_am?>" required> คน
					คิดเป็นมูลค่า: <input type="text" id="lec7_2_2" name='txt7_2_1[]' onkeypress="keyintdot()" maxlength="7" <?php if ($c72l_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72l_val?>" required> บาท
					ระยะเวลาในการดำเนินการ: <input type="text" id="lec7_2_3" name='txt7_2_1[]' onkeypress="keyintdot()" maxlength="3" <?php if ($c72l_t!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72l_t?>" required> ชม. <br>
					จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม: <input type="text" id="lec7_2_4" name='txt7_2_1[]' onkeypress="keyintdot()" maxlength="5" <?php if ($c72l_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72l_cn?>" required> ราย
					<br><br>
				</label>

				<input id="discheck0" type="checkbox" name="7_2[]" value = "artist" <?php if (isset($c72_artist)){echo "checked";} ?>>  ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)
				<br><br>

				<input id="discheck00" type="checkbox" name="7_2[]" value = "supdepart" <?php if (isset($c72_supdepart)){echo "checked";} ?>>  เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน
				<br><br>

				<input onClick='enableinput(2)' id= 'discheck2'type="checkbox" name="7_2[]" value="stu_act" <?php if ($c72_act!=""){echo "checked";} ?>> นศ.เข้าทำกิจกรรม
				<label id ="dis2">
					จำนวน: <input type="text" name='txt7_2_2[]' id="act7_2_1" onkeypress="keyintdot()" maxlength="4" <?php if ($c72ac_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72ac_am?>" required> คน
					ระยะเวลา: <input type="text" name='txt7_2_2[]' id="act7_2_2" onkeypress="keyintdot()" maxlength="3" <?php if ($c72ac_t!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72ac_t?>" required> วัน
					คิดเป็นมูลค่า: <input type="text" name='txt7_2_2[]' id="act7_2_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c72ac_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72ac_cn?>" required> บาท
					<br><br>
				</label>

				<input onClick='enableinput(3)' id= 'discheck3'type="checkbox" name="7_2[]" value="stu_aprt" <?php if ($c72_aprt!=""){echo "checked";} ?>> นศ.ฝึกงาน
				<label id ="dis3">
					จำนวน: <input type="text" name='txt7_2_3[]' id="aprt7_2_1" onkeypress="keyintdot()" maxlength="4" <?php if ($c72aprt_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72aprt_am?>" required> คน
					ระยะเวลาในการดำเนินการ:
					 <select style="width: 120px" id="aprt7_2_2" name="txt7_2_3[]" onchange='appendText("1")' <?php if ($c72_aprt!=""){echo "";} else {echo "disabled";} ?> >
						 <option value="">- ระยะเวลา -</option>
						 <option value="1" <?php if ($c72aprt_t==1){echo "selected";} ?>>ระยะสั้น</option>
						 <option value="2" <?php if ($c72aprt_t==2){echo "selected";} ?>>ภาคเรียน</option>
					</select>
					คิดเป็นมูลค่า: <input type="text" name='txt7_2_3[]' id="aprt7_2_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c72aprt_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72aprt_cn?>" required> บาท
					<a id="appText1" style="color:red;"></a>
					<br><br>
				</label>

				<input onClick='enableinput("01")' id= 'discheck01' type="checkbox" name="7_2[]" value="out_act" <?php if ($c72_out!=""){echo "checked";} ?>> การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก
				<label id ="dis01">
					จำนวน: <input type="text" name='txt7_2_01[]' id="out7_2_1" onkeypress="keyintdot()" maxlength="4" <?php if ($c72out_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72out_am?>" required> คน
					ระยะเวลา: <input type="text" name='txt7_2_01[]' id="out7_2_2" onkeypress="keyintdot()" maxlength="3" <?php if ($c72out_t!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72out_t?>" required> วัน <br>
					คิดเป็นมูลค่า: <input type="text" name='txt7_2_01[]' id="out7_2_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c72out_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72out_cn?>" required> บาท
					<br><br>
				</label>

				<input onClick='enableinput(4)' id= 'discheck4' type="checkbox" name="7_2[]" value="other" <?php if ($c724_oth!=""){echo "checked";} ?> > อื่นๆ โปรดระบุ:
					<label id ="dis4">
						<input type="text" name='txt7_2_4[]' id="oth_7_2_1" <?php if ($c72oth_sp!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72oth_sp?>" required> คิดเป็นมูลค่า:
							<input type="text" name='txt7_2_4[]' id="oth_7_2_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c72oth_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c72oth_val?>" required> บาท
						</label>

					</div>
					<br>
					<text style="padding-left:30px"> โดยมีเอกสารอ้างอิงได้แก่</text>
					<input type="checkbox" id="r7_2_1" name="ref7_2[]" value="1" <?php if ($c72_ref1!=""){echo "checked";} ?>>รูปภาพ
					<input type="checkbox" id="r7_2_2" name="ref7_2[]" value="2" <?php if ($c72_ref2!=""){echo "checked";} ?>>หนังสือประเมินราคา
					<input type="checkbox" id="r7_2_3" name="ref7_2[]" value="3" <?php if ($c72_ref3!=""){echo "checked";} ?>>ใบเซ็นชื่อวิทยากร
					<input type="checkbox" id="r7_2_4" name="ref7_2[]" value="5" <?php if ($c72_ref5!=""){echo "checked";} ?>>หนังสือตอบขอบคุณ
					<input id ="myCheck2" onClick="myFunction('2')" type="checkbox" name="ref7_2[]" value="6"
					<?php if ($c72_ref6!=""){echo "checked";} ?>>อื่นๆ โปรดระบุ:
						<input id="text2" type="text"  name='oth7_2' <?php if ($c72_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c72_oth?>" required>
						<br><br>
						<div style="padding-left:30px">
							รายละเอียดการประเมิน(กรอกรายละเอียด)
							<br>
							<textarea id="vde7_2" name="val_detail7_2" <?php if ($c72_ed!=""){echo "";} else {echo "disabled";}?> rows="10" cols="100" required><?=$c72_ed?></textarea>
						</div>
					</div>
					<br>
					๗.๓ <input id="hide3" onClick="hide_frm('3');" type="checkbox" name="sup[]" value="3" <?=$dis?> <?php if ($c73==3){echo "checked";} ?>>การสนับสนุนด้วยวัสดุ-อุปกรณ์/สิ่งของ/สถานที่/พาหนะ/บริการบริการทางการแพทย์
					<div id="frm_hide3" style="<?php if ($c73==3){echo "";}else {echo "display:none;";} ?>">
						<div style="padding-left:60px">
							<input onClick='enableinput(5)' id= 'discheck5' type="checkbox" name="7_3[]" value="material"  <?php if ($c73mt_mn!=""){echo "checked";} ?>> วัสดุ-อุปกรณ์ ได้แก่:
								<label id ="dis5">
									<input type="text" name='txt7_3_1[]' id="mt_7_3_1" <?php if ($c73mt_mn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c73mt_mn?>">
									จำนวน:<input type="text" name='txt7_3_1[]' id="mt_7_3_2"  onkeypress="keyintdot()" maxlength="4" <?php if ($c73mt_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c73mt_am?>" required> ชิ้น/อัน
									คิดเป็นมูลค่า:<input type="text"name='txt7_3_1[]' id="mt_7_3_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c73mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c73mt_val?>" required> บาท
									<br>
									<br>
								</label>

								<input onClick='enableinput(6)' id= 'discheck6'type="checkbox" name="7_3[]" value="food" <?php if ($c732_food!=""){echo "checked";} ?>> อาหารและเครื่องดื่ม ได้แก่:
									<label id ="dis6">
										<input type="text" name='txt7_3_2[]' id="food_7_3_1" <?php if ($c732mt_fn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c732mt_fn?>" required>
										จำนวนเด็กและเยาวชนที่ได้รับ: <input type="text" name='txt7_3_2[]' id="food_7_3_2" onkeypress="keyintdot()" maxlength="5" <?php if ($c732mt_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c732mt_cn?>" required> คน
										<br>
										จำนวนเจ้าหน้าที่ที่ได้รับ:<input type="text" name='txt7_3_2[]' id="food_7_3_3" onkeypress="keyintdot()" maxlength="5" <?php if ($c732mt_on!=""){echo "";} else {echo "disabled";} ?> value="<?=$c732mt_on?>" required> คน
										คิดเป็นมูลค่า:<input type="text" name='txt7_3_2[]' id="food_7_3_4" onkeypress="keyintdot()" maxlength="7" <?php if ($c732mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c732mt_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput(7)' id= 'discheck7' type="checkbox" name="7_3[]" value="rewards" <?php if ($c733_rw!=""){echo "checked";} ?>> ของรางวัล
									<label id="dis7">
										จำนวน: <input type="text" name='txt7_3_3[]' id="rw_7_3_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c733mt_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c733mt_am?>" required> ชิ้น
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_3[]' id="rw_7_3_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c733mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c733mt_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput(8)' id= 'discheck8'type="checkbox" name="7_3[]" value="place" <?php if ($c734_p!=""){echo "checked";} ?>> สถานที่
									<label id ="dis8">
										ระยะเวลาในการใช้สถานที่: <input type="text" name='txt7_3_4[]' id="p_7_3_1" onkeypress="keyintdot()" maxlength="2" <?php if ($c734mt_h!=""){echo "";} else {echo "disabled";} ?> value="<?=$c734mt_h?>" required> ชม./วัน
										จำนวน: <input type="text" name='txt7_3_4[]' id="p_7_3_2" onkeypress="keyintdot()" maxlength="3" <?php if ($c734mt_d!=""){echo "";} else {echo "disabled";} ?> value="<?=$c734mt_d?>" required> วัน <br>
										จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม และ/หรือ จำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม: <input type="text" name='txt7_3_4[]' onkeypress="keyintdot()" maxlength="5" <?php if ($c734mt_pp!=""){echo "";} else {echo "disabled";} ?> value="<?=$c734mt_pp?>" required> ราย
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_4[]' id="p_7_3_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c734mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c734mt_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput(9)' id='discheck9'type="checkbox" name="7_3[]" value="vehicle" <?php if ($c735_vh!=""){echo "checked";} ?>> พาหนะ
									<label id="dis9">
										จำนวน: <input type="text" name='txt7_3_5[]' id="vh_7_3_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c735mt_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c735mt_am?>" required> คัน
										คิดเป็นมูลค่า <input type="text" name='txt7_3_5[]' id="vh_7_3_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c735mt_val1!=""){echo "";} else {echo "disabled";} ?> value="<?=$c735mt_val1?>" required> บาท<br>
										จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม และ/หรือ จำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม: <input type="text" name='txt7_3_5[]'onkeypress="keyintdot()" maxlength="5" <?php if ($c735mt_pp!=""){echo "";} else {echo "disabled";} ?> value="<?=$c735mt_pp?>" required> ราย
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_5[]' id="vh_7_3_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c735mt_val2!=""){echo "";} else {echo "disabled";} ?> value="<?=$c735mt_val2?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput(10)' id='discheck10' type="checkbox" name="7_3[]" value="substance_abuse_detection" <?php if ($c736_sad!=""){echo "checked";} ?>>การตรวจหาสารเสพติด
									<label id="dis10">
										จำนวนเด็ก/เยาวชนที่ได้รับ: <input type="text" name='txt7_3_6[]' id="sad_7_3_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c736mt_sad!=""){echo "";} else {echo "disabled";} ?> value="<?=$c736mt_sad?>" required> ราย
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_6[]' id="sad_7_3_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c736mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c736mt_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput(11)' id='discheck11' type="checkbox" name="7_3[]" value="banned_materials" <?php if ($c737_bm!=""){echo "checked";} ?>>วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี
									<label id="dis11">
										จำนวน: <input type="text" name='txt7_3_7[]' id="bm_7_3_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c737mt_am!=""){echo "";} else {echo "disabled";} ?> value="<?=$c737mt_am?>" required> ชิ้น
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_7[]' id="bm_7_3_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c737mt_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c737mt_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput("02")' id='discheck02' type="checkbox" name="7_3[]" value="medical_services" <?php if ($c73_med!=""){echo "checked";} ?>>การบริการทางแพทย์
									<label id="dis02">
										จำนวนเด็ก/เยาวชนที่ได้รับ: <input type="text" name='txt7_3_01[]' id="me_7_3_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c73med_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c73med_cn?>" required> ราย
										คิดเป็นมูลค่า: <input type="text" name='txt7_3_01[]' id="me_7_3_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c73med_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c73med_val?>" required> บาท
										<br>
										<br>
									</label>

									<input onClick='enableinput("03")' id='discheck03' type="checkbox" name="7_3[]" value="obj_medical" <?php if ($c73_objmed!=""){echo "checked";} ?>>การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่:
										<label id="dis03">
											<input type="text" name='txt7_3_02[]' id="objme_7_3_1" <?php if ($c73objmed_obj!=""){echo "";} else {echo "disabled";}?> value="<?=$c73objmed_obj?>" required>
											จำนวน: <input type="text" name='txt7_3_02[]' id="objme_7_3_2" onkeypress="keyintdot()" maxlength="5" <?php if ($c73objmed_cn!=""){echo "";} else {echo "disabled";}?> value="<?=$c73objmed_cn?>" required> ชิ้น
											คิดเป็นมูลค่า :<input type="text" name='txt7_3_02[]' id="objme_7_3_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c73objmed_val!=""){echo "";} else {echo "disabled";}?> value="<?=$c73objmed_val?>" required> บาท
											<br>
											<br>
										</label>

									<input onClick='enableinput(12)' id='discheck12' type="checkbox" name="7_3[]" value="other" <?php if ($c738_oth!=""){echo "checked";} ?>>อื่นๆโปรดระบุ:
										<label id="dis12">
											<input type="text" name='txt7_3_8[]' id="oth_7_3_1" <?php if ($c738mt_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c738mt_oth?>" required>
											จำนวนเด็ก/เยาวชนที่ได้รับ:<input type="text" name='txt7_3_8[]' id="oth_7_3_2" onkeypress="keyintdot()" maxlength="5" <?php if ($c738mt_cn!=""){echo "";} else {echo "disabled";}?> value="<?=$c738mt_cn?>" required>  ราย
											คิดเป็นมูลค่า :<input type="text" name='txt7_3_8[]' id="oth_7_3_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c738mt_val!=""){echo "";} else {echo "disabled";}?> value="<?=$c738mt_val?>" required> บาท
										</label>
									</div>
									<br>
									<text style="padding-left:30px"> โดยมีเอกสารอ้างอิงได้แก่</text>
									<input type="checkbox" id="r7_3_1" name="ref7_3[]" value="1" <?php if ($c73_ref1!=""){echo "checked";} ?>>รูปภาพ
									<input type="checkbox" id="r7_3_2" name="ref7_3[]" value="2" <?php if ($c73_ref2!=""){echo "checked";} ?>>หนังสือประเมินราคา
									<input type="checkbox" id="r7_3_3" name="ref7_3[]" value="4" <?php if ($c73_ref4!=""){echo "checked";} ?>>ใบเสร็จรับเงิน
									<input type="checkbox" id="r7_3_4" name="ref7_3[]" value="5" <?php if ($c73_ref5!=""){echo "checked";} ?>>หนังสือตอบขอบคุณ
									<input id="myCheck3" onClick="myFunction('3')" type="checkbox" name="ref7_3[]" value="6"
									<?php if ($c73_ref6!=""){echo "checked";} ?>>อื่นๆ โปรดระบุ:
										<input id="text3" type="text" name='oth7_3' <?php if ($c73_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c73_oth?>" required>
										<br>
										<br>
										<div style="padding-left:30px">
											รายละเอียดการประเมิน(กรอกรายละเอียด)
											<br>
											<textarea id="vde7_3" name="val_detail7_3" <?php if ($c73_ed!=""){echo "";} else {echo "disabled";}?> rows="10" cols="100" required><?=$c73_ed?></textarea>
										</div>
									</div>
									<br>
									๗.๔ <input id="hide4" onClick="hide_frm('4');" type="checkbox" name="sup[]" value="4" <?=$dis?> <?php if ($c74==4){echo "checked";} ?>>การสงเคราะห์เด็กและเยาวชน
									<div id="frm_hide4" style="<?php if ($c74==4){echo "";}else {echo "display:none;";} ?>">
										<div style="padding-left:60px">
											<input onClick='enableinput(13)' id='discheck13'type="checkbox" name="7_4[]" value="residence" <?php if ($c74_res!=""){echo "checked";} ?>> ที่อยู่อาศัย
											<label id="dis13">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_1[]" id="res_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c741res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c741res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_1[]" id="res_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c741res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c741res_val?>" required> บาท
												<br>
												<br>
											</label>

											<!-- <input onClick='enableinput(14)' id='discheck14'type="checkbox" name="7_4[]" value="medical_services" <?php if ($c74_ms!=""){echo "checked";} ?>>การบริการทางการแพทย์
											<label id="dis14">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_2[]" id="ms_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c742res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c742res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_2[]" id="ms_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c742res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c742res_val?>" required> บาท
												<br>
												<br>
											</label> -->

											<input onClick='enableinput(15)' id='discheck15'type="checkbox" name="7_4[]" value="foster_family" <?php if ($c74_ff!=""){echo "checked";} ?>>ครอบครัวอุปถัมภ์
											<label id="dis15">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_3[]" id="ff_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c743res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c743res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_3[]" id="ff_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c743res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c743res_val?>" required> บาท
												<br>
												<br>
											</label>

											<input onClick='enableinput(16)' id='discheck16'type="checkbox" name="7_4[]" value="foster_parents" <?php if ($c74_fp!=""){echo "checked";} ?>>พ่อแม่อุปถัมภ์
											<label id="dis16">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_4[]" id="fp_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c744res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c744res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_4[]" id="fp_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c744res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c744res_val?>" required> บาท
												<br>
												<br>
											</label>

											<input onClick='enableinput(17)' id='discheck17'type="checkbox" name="7_4[]" value="employment" <?php if ($c74_emp!=""){echo "checked";} ?>>การจ้างงาน
											<label id ="dis17">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_5[]" id="emp_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c745res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c745res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_5[]" id="emp_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c745res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c745res_val?>" required> บาท
												<br>
												<br>
											</label>

											<input onClick='enableinput(18)' id='discheck18'type="checkbox" name="7_4[]" value="guarantee" <?php if ($c74_grt!=""){echo "checked";} ?>>การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน
											<label id="dis18">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_6[]" id="grt_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c746res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c746res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_6[]" id="grt_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c746res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c746res_val?>" required> บาท
												<br>
												<br>
											</label>

											<input onClick='enableinput(19)' id='discheck19' type="checkbox" name="7_4[]" value="apprentice" <?php if ($c74_ap!=""){echo "checked";} ?>>การรับเด็ก/เยาวชนเข้าฝึกงาน
											<label id="dis19">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_7[]" id="ap_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c747res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c747res_cn?>" required> ราย
												เดือนที่รับเข้าทำงาน:
												 <select style="width: 130px" id="app_7_4_2" name="txt7_4_7[]" onchange='appendText("2")' <?php if ($c74_ap!=""){echo "";} else {echo "disabled";} ?> >
													 <option value=""> - เลือก -&nbsp;&nbsp;&nbsp;</option>
													 <option value="1"  <?php if ($c747res_t==1){echo "selected";} ?>>เดือนแรก</option>
													 <option value="2" <?php if ($c747res_t==2){echo "selected";} ?>>หลังจากเดือนแรก</option>
												</select>
												<br>
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_7[]" id="ap_7_4_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c747res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c747res_val?>" required> บาท
												<a id="appText2" style="color:red;"></a>
												<br>
												<br>
											</label>
											<input onClick='enableinput(20)' id='discheck20'type="checkbox" name="7_4[]" value="admission" <?php if ($c74_am!=""){echo "checked";} ?>>การรับเด็ก/เยาวชนเข้าศึกษาต่อ
											<label id="dis20">
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_8[]" id="am_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c748res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c748res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_8[]" id="am_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c748res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c748res_val?>" required> บาท
												<br>
												<br>
											</label>
											<!-- <input onClick='enableinput(21)'id='discheck21' type="checkbox" name="7_4[]" value="coordinate_study" <?php if ($c74_cs!=""){echo "checked";} ?>>ประสานงานเพื่อให้เด็ก/ยาวชน ได้ศึกษาต่อ
											<label id = 'dis21'>
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_9[]" id="cs_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c749res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c749res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_9[]" id="cs_7_4_2" onkeypress="keyintdot()" maxlength="7"  <?php if ($c749res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c749res_val?>" required> บาท
												<br>
												<br>
											</label> -->
											<input onClick='enableinput(22)'id='discheck22' type="checkbox" name="7_4[]" value="scholarship" <?php if ($c74_ss!=""){echo "checked";} ?>>ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา
											<label id='dis22'>
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_10[]" id="ss_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c7410res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c7410res_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_10[]" id="ss_7_4_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c7410res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c7410res_val?>" required> บาท
												<br>
												<br>
											</label>
											<input onClick='enableinput("04")'id='discheck04' type="checkbox" name="7_4[]" value="supcareer" <?php if ($c74_sc!=""){echo "checked";} ?>>ให้ทุนการประกอบอาชีพ
											<label id = 'dis04'>
												จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_01[]" id="cs_7_4_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c74sc_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c74sc_cn?>" required> ราย
												คิดเป็นมูลค่า: <input type="text" name="txt7_4_01[]" id="cs_7_4_2" onkeypress="keyintdot()" maxlength="7"  <?php if ($c74sc_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c74sc_val?>" required> บาท
												<br>
												<br>
											</label>
											<input onClick='enableinput(23)' id='discheck23' type="checkbox" name="7_4[]" value="other" <?php if ($c7411_oth!=""){echo "checked";} ?>>อื่นๆโปรดระบุ:
												<label id ="dis23">
													<input type="text" name="txt7_4_11[]"  id="oth_7_4_1" <?php if ($c7411res_oth!=""){echo "";} else {echo "disabled";} ?> value="<?=$c7411res_oth?>" required>
													จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์: <input type="text" name="txt7_4_11[]" id="oth_7_4_2" onkeypress="keyintdot()" maxlength="5" <?php if ($c7411res_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c7411res_cn?>" required> ราย
													คิดเป็นมูลค่า: <input type="text" name='txt7_4_11[]' id="oth_7_4_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c7411res_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c7411res_val?>" required> บาท
												</div>
												<br>
												<text style="padding-left:30px">โดยมีเอกสารอ้างอิงได้แก่</text>
												<input type="checkbox" id="r7_4_1" name="ref7_4[]" value="1" <?php if ($c74_ref1!=""){echo "checked";} ?>>รูปภาพ
												<input type="checkbox" id="r7_4_2" name="ref7_4[]" value="2" <?php if ($c74_ref2!=""){echo "checked";} ?>>หนังสือประเมินราคา

												<input type="checkbox" id="r7_4_3" name="ref7_4[]" value="4" <?php if ($c74_ref4!=""){echo "checked";} ?>>ใบเสร็จรับเงิน
												<input type="checkbox" id="r7_4_4" name="ref7_4[]" value="5" <?php if ($c74_ref5!=""){echo "checked";} ?>>หนังสือขอบคุณ
												<input id="myCheck4" onClick="myFunction('4')" type="checkbox" name="ref7_4[]" value="6" <?php if ($c74_ref6!=""){echo "checked";} ?>>อื่นๆ โปรดระบุ
												<input id="text4" type="text"  name='oth7_4' <?php if ($c74_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c74_oth?>" required>
												<br>
												<br>
												<div style="padding-left:30px">
													รายละเอียดการประเมิน(กรอกรายละเอียด)
													<br>
													<textarea id="vde7_4" name="val_detail7_4" <?php if ($c74_ed!=""){echo "";} else {echo "disabled";}?> rows="10" cols="100" required><?=$c74_ed?></textarea>
												</div>
											</div>
											<br>
											<!--7.5-->
											๗.๕ <input id="hide5" onClick="hide_frm('5');" type="checkbox" name="sup[]" value="5" <?=$dis?> <?php if ($c75==5){echo "checked";} ?>>การติดตามเด็กและเยาวชน
											<div id="frm_hide5" style="<?php if ($c75==5){echo "";}else {echo "display:none;";} ?>">
												<!--7.5.1-->
												<div style="padding-left:60px">
													<input  onClick='enableinput(24)' id='discheck24'type="checkbox" name="7_5[]" value='release' <?php if ($c75_rel!=""){echo "checked";} ?>>
													<label id ='dis24'>
														ติดตามเด็กและเยาวชนหลังได้รับการปล่อยตัวจากศูนย์ฝึก:
														 <select id="rel_7_5_1" name="txt7_5_1[]" <?php if ($c751rel_ctn!=""){echo "";} else {echo "disabled";} ?> >
															 <option value="">- ศูนย์ฝึก -&nbsp;</option>
														</select>
														จำนวนเด็ก/เยาวชน:<input type="text" name='txt7_5_1[]' id="rel_7_5_2" onkeypress="keyintdot()" maxlength="5" <?php if ($c751rel_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c751rel_cn?>" required>ราย
														เดือนละ:
														 <select style="width: 120px" id="rel_7_5_01" name="txt7_5_1[]" <?php if ($c75_rel!=""){echo "";} else {echo "disabled";} ?> >
															 <option value="">- จำนวน -</option>
															 <option value="1" <?php if ($c751rel_t==1){echo "selected";} ?>>1 ครั้ง</option>
															 <option value="2" <?php if ($c751rel_t==2){echo "selected";} ?>>2 ครั้ง</option>
														</select>
														<br>
														คิดเป็นมูลค่า:<input type="text" name='txt7_5_1[]'  id="rel_7_5_3" onkeypress="keyintdot()" maxlength="7" <?php if ($c751rel_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c751rel_val?>" required> บาท
													</label>
												</div>
												<label style="padding-left:30px">โดยมีเอกสารอ้างอิง ได้แก่</label>
												<input type="checkbox" id="r7_5_1_1" name="ref7_5_1[]" value="1" <?php if ($r751_1!=""){echo "checked";} ?>>รูปภาพ
												<input type="checkbox" id="r7_5_1_2" name="ref7_5_1[]" value="7" <?php if ($r751_2!=""){echo "checked";} ?>>แบบรายงานการติดตามฯ
												<input id="myCheck5" onClick="myFunction('5')" type="checkbox" name="ref7_5_1[]" value="6" <?php if ($r751_3!=""){echo "checked";} ?>>อื่นๆโปรดระบุ:
													<input id="text5" type="text" name='oth7_5_1' <?php if ($c751rel_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c751rel_oth?>" required>
													<br><br>
													<!--7.5.2-->
													<div style="padding-left:60px">
														<input onClick='enableinput(25)' id='discheck25'type="checkbox" name="7_5[]" value="statute" <?php if ($c75_st!=""){echo "checked";} ?>>
														<label id ="dis25">
															ติดตามเด็กและเยาวชนตาม ม.๘๖
															จำนวนเด็ก/เยาวชน: <input type="text" name="txt7_5_2[]" id="st_7_5_1" onkeypress="keyintdot()" maxlength="5" <?php if ($c752st_cn!=""){echo "";} else {echo "disabled";} ?> value="<?=$c752st_cn?>" required>  ราย
															เดือนละ:
															 <select style="width: 120px" id="st_7_5_01" name="txt7_5_2[]" <?php if ($c75_st!=""){echo "";} else {echo "disabled";} ?> >
																 <option value="">- จำนวน -</option>
																 <option value="1" <?php if ($c752st_t==1){echo "selected";} ?>>1 ครั้ง</option>
																 <option value="2" <?php if ($c752st_t==2){echo "selected";} ?>>2 ครั้ง</option>
																 <option value="3" <?php if ($c752st_t==3){echo "selected";} ?>>3 ครั้ง</option>
															</select>
															คิดเป็นมูลค่า: <input type="text" name="txt7_5_2[]" id="st_7_5_2" onkeypress="keyintdot()" maxlength="7" <?php if ($c752st_val!=""){echo "";} else {echo "disabled";} ?> value="<?=$c752st_val?>" required> บาท
														</label>
													</div>
													<text style="padding-left:30px">โดยมีเอกสารอ้างอิง ได้แก่ </text>
													<input type="checkbox" id="r7_5_2_1" name="ref7_5_2[]" value="1" <?php if ($r752_1!=""){echo "checked";} ?>>รูปภาพ
													<input type="checkbox" id="r7_5_2_2" name="ref7_5_2[]" value="7" <?php if ($r752_2!=""){echo "checked";} ?>>แบบรายงานการติดตามฯ
													<input id="myCheck6" onClick="myFunction('6')" type="checkbox" name="ref7_5_2[]" value="6" <?php if ($r752_3!=""){echo "checked";} ?>>อื่นๆโปรดระบุ:
														<input id="text6"  type="text" name='oth7_5_2' <?php if ($c752st_oth!=""){echo "";} else {echo "disabled";}?> value="<?=$c752st_oth?>" required>
													</div>
													<br><br>
													๘.สถานะของเด็กและเยาวชนที่เครือข่ายสนับสนุน(สามารถเลือกได้มากว่า ๑ ข้อ)
													<br>
													<div style="padding-left:30px">
														<table>
															<tr>
																<td><input type="checkbox" name="sta[]" value="1" <?php if ($staQ[0][0]==1){echo "checked";} ?>>เด็ก/เยาวชนในสถานแรกรับ </td>
																<td><input type="checkbox" name="sta[]" value="2" <?php if ($staQ[0][0]==2||$staQ[0][1]==2){echo "checked";} ?>>เด็ก/เยาวชนระยะฝึกอบรม </td>
																<td><input type="checkbox" name="sta[]" value="3" <?php if ($staQ[0][0]==3||$staQ[0][1]==3||$staQ[0][2]==3){echo "checked";} ?>>เด็ก/เยาวชนตาม ม.๘๖ </td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sta[]" value="4" <?php if ($staQ[0][0]==4||$staQ[0][1]==4||$staQ[0][2]==4||$staQ[0][3]==4){echo "checked";} ?>>เด็ก/เยาวชนที่ได้รับการปล่อยตัวชั่วคราว</td>
																<td><input type="checkbox" name="sta[]" value="5" <?php if ($staQ[0][0]==5||$staQ[0][1]==5||$staQ[0][2]==5||$staQ[0][3]==5||$staQ[0][4]==5){echo "checked";} ?>>เด็ก/เยาวชนที่ได้รับการปล่อยตัว</td>
																<td><input type="checkbox" name="sta[]" value="6" <?php if ($staQ[0][0]==6||$staQ[0][1]==6||$staQ[0][2]==6||$staQ[0][3]==6||$staQ[0][4]==6){echo "checked";} ?>>เด็ก/เยาวชนในสถานศึกษา</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sta[]" value="7" <?php if ($staQ[0][0]==7||$staQ[0][1]==7||$staQ[0][2]==7||$staQ[0][3]==7||$staQ[0][4]==7){echo "checked";} ?>>เด็ก/เยาวชนระยะเตรียมความพร้อมก่อนปล่อยตัว</td>
																<td colspan="2"> <input id="myCheck7" onClick="myFunction('7')" type="checkbox" name="sta[]" value="8"
																	<?php if ($staQ[0][0]==8||$staQ[0][1]==8||$staQ[0][2]==8||$staQ[0][3]==8||$staQ[0][4]==8){echo "checked";} ?>>อื่นๆ โปรดระบุ
																	<input id="text7" type="text" <?php if ($staQ[1]!=""){echo "";} else {echo "disabled";}?> name='other8' value="<?=$staQ[1]?>" required></td>
																</tr>
															</table>
														</div>
														<br>
														๙.สภาพปัญหาพิเศษของเด็กและเยาวชนที่เป็นกลุ่มเป้าหมายของเครือ(หากมี)(สามารถเลือกได้มากว่า ๑ ข้อ)
														<br>
														<div style="padding-left:30px">
															<table>
																<tr>
																	<td><input type="checkbox" name="cond[]" value="1" <?php if ($probQ[0][0]==1){echo "checked";} ?>>เด็ก/เยาวชนยากจน &nbsp;</td>
																	<td><input type="checkbox" name="cond[]" value="2" <?php if ($probQ[0][0]==2||$probQ[0][1]==2){echo "checked";} ?>>เด็ก/เยาวต่างชาติ &nbsp;</td>
																	<td><input type="checkbox" name="cond[]" value="3" <?php if ($probQ[0][0]==3||$probQ[0][1]==3||$probQ[0][2]==3){echo "checked";} ?>>เด็ก/เยาวชน เร่ร่อน/ไม่มีที่อยู่อาศัย&nbsp;</td>
																</tr>
																<tr>
																	<td><input type="checkbox" name="cond[]" value="4" <?php if ($probQ[0][0]==4||$probQ[0][1]==4||$probQ[0][2]==4||$probQ[0][3]==4){echo "checked";} ?>>เด็ก/เยาวชนพิการ &nbsp;</td>
																	<td><input type="checkbox" name="cond[]" value="5" <?php if ($probQ[0][0]==5||$probQ[0][1]==5||$probQ[0][2]==5||$probQ[0][3]==5||$probQ[0][4]==5){echo "checked";} ?>>เด็ก/เยาวชนตั้งครรภ์ &nbsp; <br></td>
																	<td><input type="checkbox" name="cond[]" value="6" <?php if ($probQ[0][0]==6||$probQ[0][1]==6||$probQ[0][2]==6||$probQ[0][3]==6||$probQ[0][4]==6){echo "checked";} ?>>เด็ก/เยาวชนที่ได้รับผลกระทบจาการใช้ความรุนแรง</td>
																</tr>
																<tr>
																	<td><input type="checkbox" name="cond[]" value="7" <?php if ($probQ[0][0]==7||$probQ[0][1]==7||$probQ[0][2]==7||$probQ[0][3]==7||$probQ[0][4]==7){echo "checked";} ?>>เด็ก/เยาวชนที่มีปัญหาสุขภาพกาย</td>
																	<td><input type="checkbox" name="cond[]" value="8" <?php if ($probQ[0][0]==8||$probQ[0][1]==8||$probQ[0][2]==8||$probQ[0][3]==8||$probQ[0][4]==8){echo "checked";} ?>>เด็ก/เยาวชนที่มีปัญหาสุขภาพจิต</td>
																	<td><input type="checkbox" name="cond[]" value="9" <?php if ($probQ[0][0]==9||$probQ[0][1]==9||$probQ[0][2]==9||$probQ[0][3]==9||$probQ[0][4]==9){echo "checked";} ?>>เด็ก/เยาวชนกลุ่มเสี่ยง</td>
																</tr>
																<tr>
																	<td><input id="myCheck8" onClick="myFunction('8')" type="checkbox" name="cond[]" value="10"
																		<?php if ($probQ[0][0]==10||$probQ[0][1]==10||$probQ[0][2]==10||$probQ[0][3]==10||$probQ[0][4]==10){echo "checked";} ?>>อื่นๆ โปรดระบุ
																		<input id="text8" type="text" <?php if ($probQ[1]!=""){echo "";} else {echo "disabled";}?> name='other9' value="<?=$probQ[1]?>" required></td>
																	</tr>
																</table>
															</div>
															<br>
															๑๐.รายละเอียดบทบาทหรือศักยาภาพของเครือข่ายที่สามารถสนับสนุนการดำเนินงานของหน่วยงานได้เพิ่มเติมหรือนอกเหนือจากที่กำหนด
															<br>
															<textarea style="margin-left:30px" name="description" cols="100" rows="7" required><?=$netdescQ?></textarea>
															<br><br>

															๑๑.หน่วยงานมีการทำบันทึกข้อตกลงร่วมกับเครือข่ายนี้หรือไม่
															<br>
															<?php
															if (empty($rec_agre)) {
																	echo "<input type=\"radio\" name=\"record\" onClick =\"hide_upload()\" checked value='none'>ไม่มี";
																	echo "<br>";
																	echo "<input type=\"radio\" name=\"record\" onClick=\"show_upload();\" value='have'>มี ชือบันทึกข้อตกลง <font size=\"2px\" color=\"grey\">(ความจุสูงสุด 5Mb)</font> ";
																	echo "<input name ='file' type=\"file\" id=\"myFile\" disabled ='true' >";
															} else {
																echo "<a href=\"/djopform/file-upload/".$rec_agre."\">".$rec_agre."</a>";
																echo "<br>";
															}
															?>
														</div>
														<center>
															<?php
															if ($n_name == "") {
																if (empty($n_name_query)) {
																	echo "<a href=\"/djopform/page1/".$user."/menu=".$menu."\" class=\"previous\">&laquo; Previous</a>";
																	echo "&nbsp;&nbsp;";
																		echo "<a href=\"/djopform/page3/".$user."/menu=".$menu."\" class=\"next\">Next &raquo;</a>";
																} else {
																	echo "<a href=\"/djopform/page1/".$user."/n=".$n_name_query."/menu=".$menu."\" class=\"previous\">&laquo; Previous</a>";
																	echo "&nbsp;&nbsp;";
																		echo "<a href=\"/djopform/page3/".$user."/n=".$n_name_query."/menu=".$menu."\" class=\"next\">Next &raquo;</a>";
																}
															} else {
																echo "<a href=\"/djopform/page1/".$user."/n=".$n_name."/menu=".$menu."\" class=\"previous\">&laquo; Previous</a>";
																echo "&nbsp;&nbsp;";
																	echo "<a href=\"/djopform/page3/".$user."/n=".$n_name."/menu=".$menu."\" class=\"next\">Next &raquo;</a>";
															}
															?>
														</center>
														<div style="display :flex; justify-content: space-between">
															<button type="submit">Save</button>
															&nbsp;&nbsp;&nbsp;&nbsp;
															<a href="/djopform/logout" >Logout</a>
														</div>
													</form>
												</fieldset>
												<?php
												if ($his2 == 2 || $his2Q == 2) {
													echo "<p><font color=\"red\">*</font> หมายเหตุ : กรุณากรอกข้อมูลให้เรียบร้อยแล้วกดบันทึก</P>";
												} else {
													echo "<p><font color=\"red\">*</font> หมายเหตุ : กรุณากรอกข้อมูลให้เรียบร้อยแล้วกดบันทึก ก่อนไปหน้าถัดไป</P>";
												}
												?>
													<!--scripts-->
													<script type="text/javascript" src="/djopform/scripts.js"></script>
													<script type="text/javascript" src="/djopform/jquery-1.3.2.min.js"></script>
													<!-- <script type="text/javascript" src="/djopform/jquery-3.3.1.slim.min.js"></script> -->
													<!--Input disable/enable in row-->
													<script>
													// append text innerhtml
													function appendText(a) {
														if (a == 1) {
															// alert(a);
															var x = document.getElementById("aprt7_2_2").selectedIndex;
															var appText1 = document.getElementById("appText1");
															if (x == 1) {
																appText1.innerHTML = "(คิดมูลค่าคนละ 1,000 บาทต่อครั้ง)";
															} else if (x == 2) {
																appText1.innerHTML = "(คิดมูลค่าคนละ 3,000 บาทต่อภาคเรียน)";
															} else {
																appText1.innerHTML = "";
															}
														} else if (a == 2) {
															var x = document.getElementById("app_7_4_2").selectedIndex;
															var appText2 = document.getElementById("appText2");
															if (x == 1) {
																appText2.innerHTML = "(คิดมูลค่าไม่เกิน 3,000 บาทต่อเด็ก/เยาวชน 1 ราย)";
															} else if (x == 2) {
																appText2.innerHTML = "(คิดมูลค่าตามอัตราค่าตอบแทนที่เด็ก/เยาวชนได้รับจริง)";
															} else {
																appText2.innerHTML = "";
															}
														}
													}

													// enable or disable many input tag
													function enableinput(j) {
														// alert(j);
														var nodes = document.getElementById("dis"+j).getElementsByTagName('*');
														var dis = document.getElementById("discheck"+j);
														var x = document.getElementById("aprt7_2_2").selectedIndex;
														var y = document.getElementById("app_7_4_2").selectedIndex;
														var x71 = document.getElementById("rel_7_5_01").selectedIndex;
														var x72 = document.getElementById("st_7_5_01").selectedIndex;
														// alert(x71);
														for(var i = 0; i < nodes.length; i++){
															if(dis.checked == true) {
																nodes[i].disabled = false;
																nodes[i].required= true;
																if (j == 3) {
																	// alert(x);
																	appendText("1");
																	$('#aprt7_2_2').empty();
																	$('#aprt7_2_2').append('<option value="">- ระยะเวลา -</option>');
																	if (x == 1) {
																		$('#aprt7_2_2').append('<option value="1" selected>ระยะสั้น</option>');
																		$('#aprt7_2_2').append('<option value="2">ภาคเรียน</option>');
																	} else if (x == 2) {
																		$('#aprt7_2_2').append('<option value="1" >ระยะสั้น</option>');
																		$('#aprt7_2_2').append('<option value="2" selected>ภาคเรียน</option>');
																	} else {
																		$('#aprt7_2_2').append('<option value="1" >ระยะสั้น</option>');
																		$('#aprt7_2_2').append('<option value="2" >ภาคเรียน</option>');
																	}
																}
																if (j == 19) {
																	// alert(y);
																	appendText("2");
																	$('#app_7_4_2').empty();
																	$('#app_7_4_2').append('<option value="">- เลือก -</option>');
																	if (y == 1) {
																		$('#app_7_4_2').append('<option value="1" selected>เดือนแรก</option>');
																		$('#app_7_4_2').append('<option value="2">หลังจากเดือนแรก</option>');
																	} else if (y == 2) {
																		$('#app_7_4_2').append('<option value="1" >เดือนแรก</option>');
																		$('#app_7_4_2').append('<option value="2" selected>หลังจากเดือนแรก</option>');
																	} else {
																		$('#app_7_4_2').append('<option value="1" >เดือนแรก</option>');
																		$('#app_7_4_2').append('<option value="2" >หลังจากเดือนแรก</option>');
																	}
																}
																if (j == 24) {
																	// alert(x71);
																	var rel7 = document.getElementById("rel_7_5_2");
																	var rel7_01 = document.getElementById("rel_7_5_01");
																	var rel73 = document.getElementById("rel_7_5_3");
																	rel7.disabled = false;
																	rel7.required = true;
																	rel73.disabled = false;
																	rel73.required = true;
																	rel7_01.disabled = false;
																	rel7_01.required = true;
																	$('#rel_7_5_1').empty();
																	$('#rel_7_5_1').append('<option value="">- ศูนย์ฝึก - </option>');
																	changeDivision();
																	$('#rel_7_5_01').empty();
																	$('#rel_7_5_01').append('<option value="">- จำนวน -</option>');
																	if (x71 == 1) {
																		$('#rel_7_5_01').append('<option value="1" selected>1 ครั้ง</option>');
																		$('#rel_7_5_01').append('<option value="2">2 ครั้ง</option>');
																	} else if (x71 == 2) {
																		$('#rel_7_5_01').append('<option value="1" >1 ครั้ง</option>');
																		$('#rel_7_5_01').append('<option value="2" selected>2 ครั้ง</option>');
																	} else {
																		$('#rel_7_5_01').append('<option value="1" >1 ครั้ง</option>');
																		$('#rel_7_5_01').append('<option value="2" >2 ครั้ง</option>');
																	}
																	break;
																}
																if (j == 25) {
																	$('#st_7_5_01').empty();
																	$('#st_7_5_01').append('<option value="">- จำนวน -</option>');
																	if (x72 == 1) {
																		$('#st_7_5_01').append('<option value="1" selected>1 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="2">2 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="3">3 ครั้ง</option>');
																	} else if (x72 == 2) {
																		$('#st_7_5_01').append('<option value="1" >1 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="2" selected>2 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="3">3 ครั้ง</option>');
																	} else if (x72 == 3) {
																		$('#st_7_5_01').append('<option value="1" >1 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="2" >2 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="3" selected>3 ครั้ง</option>');
																	} else {
																		$('#st_7_5_01').append('<option value="1" >1 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="2" >2 ครั้ง</option>');
																		$('#st_7_5_01').append('<option value="3" >3 ครั้ง</option>');
																	}
																}
															} else {
																if (j ==3) {
																	appendText("1");
																} else if (j ==19) {
																	appendText("2");
																}
																	nodes[i].disabled = true;
																	nodes[i].required= false;
																	nodes[i].value = "";
																}
															}
														}

													function changeDivision() {
														var checktxt1 = document.getElementById("rel_7_5_2").value;
														if (checktxt1 != "") { var list = "dpid=<?=$c751rel_ctn?>"; } else { var list = ""; }
														$.ajax({
																url: "/djopform/ajax_get_section.php",
																data: list,
																type: "POST",
																async:false,
																success: function(data, status) {
																		$("#rel_7_5_1").append(data);
																	},
																error: function(xhr, status, exception) { alert(status); }
																});
													}

													function hide_frm(i) {
														var ind = i;
														var ck = document.getElementById('hide'+i);
														if (ck.checked == true && ind == 1) {
															document.getElementById('frm_hide'+i).style.display = "";
															document.getElementById("amount").disabled = false;
															document.getElementById("vde7_1").disabled = false;
														} else if (ck.checked == false && ind == 1) {
															document.getElementById('frm_hide'+i).style.display = "none";
															document.getElementById("amount").disabled = true;
															document.getElementById("amount").value = "";
															document.getElementById("r7_1_1").checked = false;
															document.getElementById("r7_1_2").checked = false;
															document.getElementById("r7_1_3").checked = false;
															document.getElementById("r7_1_4").checked = false;
															document.getElementById("r7_1_5").checked = false;
															document.getElementById("myCheck1").checked = false;
															document.getElementById("text1").value = "";
															document.getElementById("text1").disabled = true;
															document.getElementById("vde7_1").disabled = true;
															document.getElementById("vde7_1").value = "";
														} else if (ck.checked == true && ind == 2) {
															document.getElementById('frm_hide'+i).style.display = "";
															document.getElementById("vde7_2").disabled = false;
														} else if (ck.checked == false && ind == 2) {
															document.getElementById('frm_hide'+i).style.display = "none";
															document.getElementById("discheck0").checked = false;
															document.getElementById("discheck00").checked = false;
															document.getElementById("discheck01").checked = false;
															enableinput("01");
															document.getElementById("discheck1").checked = false;
															enableinput("1");
															document.getElementById("discheck2").checked = false;
															enableinput("2");
															document.getElementById("discheck3").checked = false;
															enableinput("3");
															document.getElementById("discheck4").checked = false;
															enableinput("4");
															document.getElementById("r7_2_1").checked = false;
															document.getElementById("r7_2_2").checked = false;
															document.getElementById("r7_2_3").checked = false;
															document.getElementById("r7_2_4").checked = false;
															document.getElementById("myCheck2").checked = false;
															document.getElementById("text2").value = "";
															document.getElementById("text2").disabled = true;
															document.getElementById("vde7_2").disabled = true;
															document.getElementById("vde7_2").value = "";
														} else if (ck.checked == true && ind == 3) {
															document.getElementById('frm_hide'+i).style.display = "";
															document.getElementById("vde7_3").disabled = false;
														} else if (ck.checked == false && ind == 3) {
															document.getElementById('frm_hide'+i).style.display = "none";
															document.getElementById("discheck02").checked = false;
															enableinput("02");
															document.getElementById("discheck03").checked = false;
															enableinput("03");
															document.getElementById("discheck5").checked = false;
															enableinput("5");
															document.getElementById("discheck6").checked = false;
															enableinput("6");
															document.getElementById("discheck7").checked = false;
															enableinput("7");
															document.getElementById("discheck8").checked = false;
															enableinput("8");
															document.getElementById("discheck9").checked = false;
															enableinput("9");
															document.getElementById("discheck10").checked = false;
															enableinput("10");
															document.getElementById("discheck11").checked = false;
															enableinput("11");
															document.getElementById("discheck12").checked = false;
															enableinput("12");
															document.getElementById("r7_3_1").checked = false;
															document.getElementById("r7_3_2").checked = false;
															document.getElementById("r7_3_3").checked = false;
															document.getElementById("r7_3_4").checked = false;
															document.getElementById("myCheck3").checked = false;
															document.getElementById("text3").value = "";
															document.getElementById("text3").disabled = true;
															document.getElementById("vde7_3").disabled = true;
															document.getElementById("vde7_3").value = "";
														} else if (ck.checked == true && ind == 4) {
															document.getElementById('frm_hide'+i).style.display = "";
															document.getElementById("vde7_4").disabled = false;
														} else if (ck.checked == false && ind == 4) {
															document.getElementById('frm_hide'+i).style.display = "none";
															document.getElementById("discheck04").checked = false;
															enableinput("04");
															document.getElementById("discheck13").checked = false;
															enableinput("13");
															// document.getElementById("discheck14").checked = false;
															// enableinput("14");
															document.getElementById("discheck15").checked = false;
															enableinput("15");
															document.getElementById("discheck16").checked = false;
															enableinput("16");
															document.getElementById("discheck17").checked = false;
															enableinput("17");
															document.getElementById("discheck18").checked = false;
															enableinput("18");
															document.getElementById("discheck19").checked = false;
															enableinput("19");
															document.getElementById("discheck20").checked = false;
															enableinput("20");
															// document.getElementById("discheck21").checked = false;
															// enableinput("21");
															document.getElementById("discheck22").checked = false;
															enableinput("22");
															document.getElementById("discheck23").checked = false;
															enableinput("23");
															document.getElementById("r7_4_1").checked = false;
															document.getElementById("r7_4_2").checked = false;
															document.getElementById("r7_4_3").checked = false;
															document.getElementById("r7_4_4").checked = false;
															document.getElementById("myCheck4").checked = false;
															document.getElementById("text4").value = "";
															document.getElementById("text4").disabled = true;
															document.getElementById("vde7_4").disabled = true;
															document.getElementById("vde7_4").value = "";
														} else if (ck.checked == true && ind == 5) {
															document.getElementById('frm_hide'+i).style.display = "";
														} else if (ck.checked == false && ind == 5) {
															document.getElementById('frm_hide'+i).style.display = "none";
															document.getElementById("discheck24").checked = false;
															enableinput("24");
															document.getElementById("discheck25").checked = false;
															enableinput("25");
															document.getElementById("r7_5_1_1").checked = false;
															document.getElementById("r7_5_1_2").checked = false;
															document.getElementById("r7_5_2_1").checked = false;
															document.getElementById("r7_5_2_2").checked = false;
															document.getElementById("myCheck5").checked = false;
															document.getElementById("text5").value = "";
															document.getElementById("text5").disabled = true;
															document.getElementById("myCheck6").checked = false;
															document.getElementById("text6").value = "";
															document.getElementById("text6").disabled = true;
														} else {
															document.getElementById('frm_hide'+i).style.display = "none";
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

													function refresh() {
														var h1 = document.getElementById("hide1");
														var h2 = document.getElementById("hide2");
														var h3 = document.getElementById("hide3");
														var h4 = document.getElementById("hide4");
														var h5 = document.getElementById("hide5");
														if (h1.checked == true) {
															document.getElementById('frm_hide1').style.display = "";
															document.getElementById("amount").disabled = false;
															document.getElementById("vde7_1").disabled = false;
															myFunction("1");
														} else {
															document.getElementById('frm_hide1').style.display = "none";
															document.getElementById("amount").disabled = true;
															document.getElementById("vde7_1").disabled = true;
															myFunction("1");
														}
														if (h2.checked == true) {
															document.getElementById('frm_hide2').style.display = "";
															document.getElementById("vde7_2").disabled = false;
															myFunction("2");
															enableinput("01");
															enableinput("1");
															enableinput("2");
															enableinput("3");
															enableinput("4");
														} else {
															document.getElementById('frm_hide2').style.display = "none";
															document.getElementById("vde7_2").disabled = true;
															myFunction("2");
															enableinput("01");
															enableinput("1");
															enableinput("2");
															enableinput("3");
															enableinput("4");
														}
														if (h3.checked == true) {
															document.getElementById('frm_hide3').style.display = "";
															document.getElementById("vde7_3").disabled = false;
															myFunction("3");
															enableinput("02");
															enableinput("03");
															enableinput("5");
															enableinput("6");
															enableinput("7");
															enableinput("8");
															enableinput("9");
															enableinput("10");
															enableinput("11");
															enableinput("12");
														} else {
															document.getElementById('frm_hide3').style.display = "none";
															document.getElementById("vde7_3").disabled = true;
															myFunction("3");
															enableinput("02");
															enableinput("03");
															enableinput("5");
															enableinput("6");
															enableinput("7");
															enableinput("8");
															enableinput("9");
															enableinput("10");
															enableinput("11");
															enableinput("12");
														}
														if (h4.checked == true) {
															document.getElementById('frm_hide4').style.display = "";
															document.getElementById("vde7_4").disabled = false;
															myFunction("4");
															enableinput("04");
															enableinput("13");
															// enableinput("14");
															enableinput("15");
															enableinput("16");
															enableinput("17");
															enableinput("18");
															enableinput("19");
															enableinput("20");
															// enableinput("21");
															enableinput("22");
															enableinput("23");
														} else {
															document.getElementById('frm_hide4').style.display = "none";
															document.getElementById("vde7_4").disabled = true;
															myFunction("4");
															enableinput("04");
															enableinput("13");
															// enableinput("14");
															enableinput("15");
															enableinput("16");
															enableinput("17");
															enableinput("18");
															enableinput("19");
															enableinput("20");
															// enableinput("21");
															enableinput("22");
															enableinput("23");
														}
														if (h5.checked == true) {
															document.getElementById('frm_hide5').style.display = "";
															myFunction("5");
															enableinput("24");
															enableinput("25");
														} else {
															document.getElementById('frm_hide5').style.display = "none";
															myFunction("5");
															enableinput("24");
															enableinput("25");
														}
													 }
													window.onload = refresh;



													</script>
												</body>
												</html>
