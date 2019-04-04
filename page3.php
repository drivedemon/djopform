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
	echo "<script type='text/javascript'>alert('ข้อมูลไม่ตรงกัน');javascript:history.go(-1);</script>" ;
	exit(require 'login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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

		if (!empty($n_name)) {
			$sqlQ = "SELECT * FROM network_detail WHERE user_id=$user and network_name=\"$n_name\"";
			$resultQ = mysqli_query($conn,$sqlQ) or die(mysqli_error());
			$rowQ = mysqli_fetch_array($resultQ);

			$c12Q = unserialize($rowQ['ministry']);
			$c13Q = unserialize($rowQ['institution']);
			$c14Q = $rowQ['network_result'];
			// print_r($c13Q);

			// if (!empty($c13Q)) {
			// 	$i = 0;
			// 	$dp = "dp";
			// 	foreach ($c13Q as $key => $value) {
			// 		echo "$key===$value";
			// 		echo "<br>";
			// 		if ($key == $i) {
			// 			$key = $key + 2;
			// 			// $w = $i + 2;
			// 			$qq = $dp.$i;
			// 		}
			// 		$i++;
			//
			// 		echo "$qq---";
			// 	}
			// }
		}

		?>
		<?php echo "หน่วยงาน : ".$data_receiver['name']; ?>
	</div>
	<fieldset>
		<legend>
			กรุณากรอกข้อมูล:
			<button type="button" id="home" onclick="home(<?=$user?>);">Back to home page</button>
		</legend>
		<form action="p3" method="post"enctype="multipart/form-data" >
			<input type="hidden" name="user_id" value="<?=$user?>"/>
			<input type="hidden" name="menu" value="<?=$menu?>"/>
			<input type="hidden" name="n_name" value="<?=$n_name?>" />
			<!-- <input type="text" name="page" value="<?=$pageURL?>" /> -->
			<div>
				๑๒.การดำเนินงานดังกล่าวนี้เกี่ยวข้องกับบันทึกข้อตกลงใด<br><br>
				<div style="padding-left:30px">
					๑๒.๑ ระดับกระทรวง<br>
					<div style="padding-left:30px">
						<input name="mnt" id='mnt1'type="radio"  <?php if ($c12Q[0]==1){echo "checked";} ?> value='1'>
						<label for="mnt1">ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชนกระทรวงยุติธรรม ระหว่าง กระทรวงยุติธรรมกับ ๑.นายกรัฐมนตรี ๒.กระทรวงเกษตรและสหกรณ์
							๓.กระทรวงแรงงานและสวัสดิการสังคม ๔.กระทรวงศึกษาธิการ ๕.กระทรวงสาธารณสุข ๖.องค์การยูนิเซฟประจำประเทศไทย ๗.ประธานมูลนิธิส่งเสริมการพัฒนาบุคคล</label>
							<br><br>
							<input id='mnt2' type="radio" name="mnt" <?php if ($c12Q[0]==2){echo "checked";} ?> value='2'>
							<label for="mnt2">ข้อตกลงความร่วมมือระหว่างกระทรวงวัฒนธรรมและกระทรวงยุติธรรมในการช่วยเหลือเด็กและเยาวชนในสถานพินิจคุ้มครองเด็กและเยาวชน
								กรมพินิจคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรมระหว่างกระทรวงยุติธรรมกับกระทรวงวัฒนธรรม</label>
								<br><br>
								<input id='mnt3'type="radio" name="mnt" <?php if ($c12Q[0]==3){echo "checked";} ?> value='3'>
								<label for="mnt3">ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชนและศูนย์ฝึกและอบรมเด็กและเยาวชน กรมพินิจและคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรม ระหว่างกระทรวงยุติธรรมกับกระทรวงศึกษาธิการ ระหว่าง กระทรวงยุติธรรมกับ ๑.กระทรวงศึกษาธิการ ๒.ชมรมผู้สื่อข่าวในการพิทักษ์สิทธิเด็กและเยาวชนในกระบวนการยุติธรรม</label>
								<br><br>
								<input id='mnt4'type="radio" name="mnt" <?php if ($c12Q[0]==4){echo "checked";} ?> value='4'>
								<label for="mnt4">ข้อตกลงว่าด้วยความร่วมมือในการส่งเสริมศักยภาพผู้กระทำความผิดและบูรณการแผนงานที่เกี่ยวข้องระหว่างกรุงเทพมหานครกับกระทรวงยุติธรรม ระหว่างกระทรวงยุติธรรมกับกรุงเทพมหานคร</label>
								<br><br>
								<input id='mnt5' type="radio" name="mnt" <?php if ($c12Q[0]==5){echo "checked";} ?> value='5'>
								<label for="mnt5">ข้อตกลงว่าด้วยความร่วมมือในการช่วยเหลือและเตรียมความพร้อมผู้กระทำผิดและผู้ที่ถูกคุมประพฤติที่เป็นเด็กเยาวชน และผู้ใหญ่ในกระบวนการยุติธรรม เพื่อคืนคนดีสู่สังคม ระหว่างกระทรวงยุติธรรมกับคอมมูนิต้าอินคอนโทร</label>
								<br><br>
								<input id='mnt6'type="radio" name="mnt" <?php if ($c12Q[0]==6){echo "checked";} ?> value='6'>
								<label for="mnt6">ข้อตกลงความร่วมมือการให้ความช่วยเหลือบรรเทาทุกข์ในกระบวนการยุติธรรมให้แก่ประชาชน ระหว่าง กระทรวงยุติธรรมกับ มูลนิธิปวีณาหงสกุลเพื่อเด็กและสตรี</label>
								<br><br>
								<input id='mnt7'type="radio" name="mnt" <?php if ($c12Q[0]==7){echo "checked";} ?> value='7'>
								<label for="mnt7">ข้อตกลงความร่วมมือในการปกป้องคุ้มครองเด็กติดขัดผู้ต้องขัง ผู้ถูกควบคุม และเด็กซึ่งคลอดในระหว่างที่มารดาถูกคุมขังอยู่ในเรือนจำ สังกัดกรมราชทัณฑ์ หรือถูกควบคุมอยู่ในสถานที่ควบคุม สังกัดกรมพินิจและคุ้มครองเด็กและเยาวชน ระหว่างกระทรวงยุติธรรมกับกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</label>
								<br><br>
							</div >
							๑๒.๒ ระดับกรม<br>
							<div style="padding-left:30px">
								<input type="radio" name="dpm" value='8' <?php if ($c12Q[1]==8){echo "checked";} ?>  id ="myCheck0" onclick="myFunction('0')">ข้อตกลงว่าด้วยการเชื่อมโยงคอมพิวเตอร์เพื่อใช้ประโยชน์จากฐานข้อมูลเชื่อมคอมพิวเตอร์ระหว่างกรมการปกครองกับกรมพินิจและคุ้มครองเด็กและเยาวชน
								<br><br>
								<input type="radio" name="dpm" value='9' <?php if ($c12Q[1]==9){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชน ในสถานพินิจและคุ้มครองเด็กและเยาวชน กรมพินิจและคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรม ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน กับคณะสังคมสงเคราะห์ศาสตร์ มหาวิทยาลัยธรรมศาสตร์
								<br><br>
								<input type="radio" name="dpm" value='10' <?php if ($c12Q[1]==10){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงความร่วมมือในการช่วยเหลือและคุ้มครองเด็กและเยาวชนในสถานพินิจคุ้มครองเด็กและเยาวชน ระหว่างกรมพัฒนาสังคมและสวัสดิการ กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์ คณะทำงานด้านเด็ก และชมรมผู้สื่อข่าวในการพิทักษ์สิทธิเด็กและเยาวชนในกระบวนการยุติธรรม ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน ๑.กรมพัฒนาสังคมและสวัสดิการ <br> ๒.คณะทำงานด้านเด็ก ๓.ชมรมผู้สื่อข่าวในการพิทักษ์สิทธิเด็กและเยาวชนในกระบวนการยุติธรรม
								<br><br>
								<input type="radio" name="dpm" value='11' <?php if ($c12Q[1]==11){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงความร่วมมือระหว่างองค์กรเครือข่ายความร่วมมือในการช่วยเหลือเด็กและเยาวชนในกระบวนการยุติธรรม ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน ๑.ศาลเยาวชนและครอบครัวกลาง ๒.กรมพัฒนาสังคมและสวัสดิการ ๓.กรมควบคุมประพฤติ ๔.มูลนิธิดวงประทีป ๕.มูลนิธิป้องกันและปราบปรามยาเสพติด ๖.มูลนิธิบ้านนกขมิ้น ๗.มูลนิธิส่งเสริมการพัฒนาบุคคล ๘.มูลนิธิสร้างสรรค์เด็ก
								<br><br>
								<input type="radio" name="dpm" value='12' <?php if ($c12Q[1]==12){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">สัญญาว่าจะให้การสนับสนุนค่าใช้จ่ายในการประกันความเสียหายตามโครงการ “ประกันความเสียหายที่เกิดจากการทำงานของเด็กและเยาวชน” ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน กับสมาคมไทยเชื้อสายจีน
								<br><br>
								<input type="radio" name="dpm" value='13' <?php if ($c12Q[1]==13){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยการประสานความร่วมมือในการปฎิบัติงานป้องกันและปราบปรามการกระทำผิดเกี่ยวกับคดีพิเศษระหว่างกรมสอบสวนคดีพิเศษกับกรมพินิจคุ้มครองเด็กและเยาวชน
								<br><br>
								<input type="radio" name="dpm" value='14' <?php if ($c12Q[1]==14){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยการปฎิบัติและประสานงานการให้ความคุ้มครองพยานในคดีอาญา ระหว่างกรมคุ้มครองสิทธิและเสรีภาพกับกรมพินิจคุ้มครองเด็กและเยาวชน
								<br><br>
								<input type="radio" name="dpm" value='15' <?php if ($c12Q[1]==15){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงความร่วมมือในการรณรงค์ห้ามขายสารระเหยแก่เด็กและเยาวชนอายุไม่เกิน ๑๗ ปี และผู้ติดสารระเหย ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับ ๑.บริษัทสยามแม็คโคร <br> ๒.กรมโรงงานอุตสาหกรรม ๓.บริษัทซีเมนต์ไทยโฮมาร์ท ๔.กระทรวงศึกษาธิการ ๕.บริษัทโฮมโปรดักส์ ๖.กองบัญชาการตำรวจปราบปรามยาเสพติด ๗.บริษัท บุญถาวรเซรามิค ๘. กรมคุมประพฤติ
								<br> ๙.บริษัทห้างสรรพสินค้าโรบินสัน ๑๐.สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด ๑๑.บริษัท บิ๊กซี ซุปเปอร์เซนเตอร์  ๑๒.บริษัท เดอะมอลล์ กรุ๊ป ๑๓.กรมพัฒนาสังคม ๑๔.บริษัทเซ็นคาร์ ๑๕.สำนักงานส่งเสริมสวัสดิภาพและพิทักษ์เด็กและเยาวชน  ๑๖.บริษัทเอกชัย ดิสบริบิวชั่น  ๑๗. บริษัทแกรนด์โฮมมาร์ท  ๑๙.สำนักงานคณะกรรมการอาหารและยา ๑๙.บริษัทซีอาร์ซีเพาวเวอร์รีเทล
								<br><br>
								<input type="radio" name="dpm" value='16' <?php if ($c12Q[1]==16){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยประสานงานความร่วมมือในการดำเนินงานระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน และกรมสุขภาพจิต ด้านการช่วยเหลือ บำบัด แก้ไข ฟื้นฟูเด็กและเยาวชนในกระบวนยุติธรร
								<br><br>
								<input type="radio" name="dpm" value='17' <?php if ($c12Q[1]==17){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงว่าด้วย การประสานความร่วมมือด้านการพัฒนาและรับรองคุณภาพสถานบำบัดรักษายาเสพติดทุกระบบ(ระบบสมัครใจ ระบบบังคับ ระบบต้องโทษ) ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับ ๑.สำนักงานปลัดกระทรวงสาธารณสุข ๒.กรมการแพทย์ ๓.กรมสุขภาพจิต ๔.กรุงเทพ ๕.กรมการปกครอง ๖.กรมคุมประพฤติ ๗.กรมราชทัณฑ์ ๘.สถาบันรับรองคุณภาพสถานพยาบาล ๙.สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด
								<br><br>
								<input type="radio" name="dpm" value='18' <?php if ($c12Q[1]==18){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงว่าด้วยความร่วมมือในการพัฒนาฝีมือแรงงานให้แก่เด็กและเยาวชนระหว่างกรมพัฒนาฝีมือแรงงานกับกรมพินิจและคุ้มครองเด็กและเยาวชน
								<br><br>
								<input type="radio" name="dpm" value='19' <?php if ($c12Q[1]==19){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ข้อตกลงว่าด้วยการประสานความร่วมมือด้านการพัฒนาระบบการดูแลผู้ป่วยและระบบข้อมูลการบำบัดฟื้นฟู ผู้เสพ/ผู้ติดยาเสพติดของประเทศ ระหว่างกระทรวงสาธารณสุข กระทรวงยุติธรรมและสำนักงานคณะกรรมการป้องกันปราบปรามยาเสพติด
								<br><br>
								<input type="radio" name="dpm" value='20' <?php if ($c12Q[1]==20){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือในการดำเนินงานโครงการนำร่องระบบเทคโนโลยีสารสนเทศกระบวนการยุติธรรมต้นแบบ ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับ ๑.กรมการปกครอง ๒.กรมคุมประพฤติ ๓.กรมราชทัณฑ์ ๔.สำนักงานกิจการยุติธรรม ๕.สำนักงาน ป.ป.ส. ๖.สำนักงานตำรวจแห่งชาติ ๗.สำนักงานอัยการสูงสุด
								<br><br>
								<input type="radio" name="dpm" value='21' <?php if ($c12Q[1]==21){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือการดำเนินงาน “สร้างสรรค์และส่งเสริมโอกาสเพื่อคุณภาพชีวิตของเด็กและเยาวชน” ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับมูลนิธิหัวใจอาสา
								<br><br>
								<input type="radio" name="dpm" value='22' <?php if ($c12Q[1]==22){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือสนับสนุนทางวิชาการเพื่อการพิทักษ์คุ้มครองสิทธิมนุษยชนด้านเด็ก เยาวชนและครอบครัว ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับคณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขต ปัตตานี
								<br><br>
								<input type="radio" name="dpm" value='23' <?php if ($c12Q[1]==23){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือเพื่อพัฒนาการจัดการอาชีวศึกษาและขยายโอกาสทางการศึกษา ระหว่างกรมพินิจคุ้มครองเด็กและเยาวชนกับสำนักงานคณะกรรมการอาชีวศึกษา
								<br><br>
								<input type="radio" name="dpm" value='24' <?php if ($c12Q[1]==24){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชนและศูนย์ฝึกอบรมเด็กและเยาวชน ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับสำนักงานส่งเสริมการศึกษานอกระบบและการศึกษาตามอัธยาศัย
								<br><br>
								<input type="radio" name="dpm" value='25' <?php if ($c12Q[1]==25){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงการผลิตช่างชำนาญงานพิเศษด้านเทคนิค ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับวิทยาลัยเทคโนโลยีชื่นชม ไทย-เยอรมัน สระบุรี
								<br><br>
								<input type="radio" name="dpm" value='26' <?php if ($c12Q[1]==26){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชน ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับมหาวิทยาลัยรามคำแหง
								<br><br>
								<input type="radio" name="dpm" value='27' <?php if ($c12Q[1]==27){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าความร่วมมือโดยที่ทำการสมาธิเป็นการสร้างและสะสมพลังจิตซึ่งก่อให้เกิดผลดีนานัปการต่อผู้ปฎิบัติโดยสม่ำเสมอ ระกว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับ มูลนิธิสถาบันพลังจิตตานุภาพ หลวงพ่อวิริยังค์สิรินธโร
								<br><br>
								<input type="radio" name="dpm" value='28' <?php if ($c12Q[1]==28){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือในการป้องกันปัญหาพฤติกรรมและการกระทำความผิดของเด็กและเยาวชนระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับสำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน กระทรวงศึกษาธิการ
								<br><br>
								<input type="radio" name="dpm"value='29' <?php if ($c12Q[1]==29){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชนระหว่างมหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์ กับ กรมพินิจคุ้มครองเด็กและเยาวชน
								<br><br>
								<input type="radio" name="dpm"value='30' <?php if ($c12Q[1]==30){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือเพื่อสนับสนุนการแก้ไขบำบัดฟื้นฟูและเด็กและเยาวชนที่เข้าสู่กระบวนการยุติธรรมผ่านการใช้กีฬาและการเล่น ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับมูลนิธิ ไรท์ ทู เพลย์ ประจำประเทศไทย
								<br><br>
								<input type="radio" name="dpm"value='31' <?php if ($c12Q[1]==31){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">บันทึกข้อตกลงความร่วมมือ โครงการพัฒนาทักษะการประกอบอาชีพบาริสต้า ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชนกับมูลนิธิปั้นเด็กดี วิทยาลัยอาชีวศึกษา เพชรบุรี ร้านอินเนอร์ คาเฟ่ ร้านกาแฟชาวดอย สาขา มหาวิทยาลัยศิลปากร จังหวัด นครปฐม
								<br><br>
								<input type="radio" name="dpm" value='32' <?php if ($c12Q[1]==32){echo "checked";} ?> id ="myCheck0" onclick="myFunction('0')">ไม่มีที่กล่าวไปข้างต้น
								<br><br>
								<input type="radio" name="dpm" value='33' <?php if ($c12Q[1]==33){echo "checked";} ?> id ="myCheck1" onchange="myFunction('1')">เกี่ยวข้องกับบันทึกข้อตกลงที่นอกเหนือจากที่กล่าวข้างต้น ระบุ:
									<input type="text" name="other12" id ="text1" <?php if ($c12Q[2]!=""){echo "";}else{echo "disabled";} ?> value="<?=$c12Q[2]?>" required>
									<br><br>


								</div>
							</div>
							๑๓.หน่วยงาน(ในการบันทึกข้อตกลง)ร่วมการดำเนินการ ได้แก่:
							<div class="ara" id="input-txtDepartment" style ="padding-left:30px">
								<textarea  type="text" id="txtDepartment1" name="txtDepartment[]" placeholder="หน่วยงานที่ 1" rows="5" cols="50" required><?=$c13Q[0]?></textarea>
								<?php
								// print_r($c13Q);
								if (!empty($c13Q)) {
									$i = 1;
									foreach ($c13Q as $key => $value) {
										if ($key == $i) {
											$dp = $i + 1;
											echo "<textarea type=\"text\" id=\"txtDepartment$dp\" name=\"txtDepartment[]\" placeholder=\"หน่วยงานที่ $dp\" rows=\"5\" cols=\"50\" required>$value</textarea>&nbsp;";
											$i++;
										}
									}
								}
								?>
							</div>
							<div class="add-more-cont" style ="padding-left:30px">
								<input type="button" style="border:1px solid gray;" value="+ เพิ่มหน่วยงาน" id="AddMore">
								<div id="remove-cont" style ="margin-top: 5px">
									<?php
									if (!empty($c13Q)) {
										$countnum = count($c13Q);
										if ($countnum > 1) {
											echo "<input type=\"button\" id =\"removeMore\" onClick=\"rmve('$countnum')\" style=\"border:1px solid gray;\" value=\"- ลบหน่วยงาน\">";
										}
									}
									?>
								</div>
							</div>

						</div>

						<br><br>
						๑๔.ผลการดำเนินงานร่วมกับเครือข่าย
						<table style="padding-left:30px;">
							<tr>
								<td><input type="radio" name="result" value='1' <?php if ($c14Q==1){echo "checked";} ?>>บรรลุวัตถุประสงค์ของการดำเนินงาน</td>
								<td><input type="radio" name="result" value='2' <?php if ($c14Q==2){echo "checked";} ?>>บรรลุวัตถุประสงค์ของการดำเนินงานแต่ไม่ครบทุกวัตถุประสงค์</td>
							</tr>
							<tr>
								<td><input type="radio" name="result" value='3' <?php if ($c14Q==3){echo "checked";} ?>>ผลการดำเนินงานไม่เป็นไปตามวัตถุประสงค์ </td>
							</tr>
						</table>
						<center>
							<?php
							if (!empty($n_name)) {
								echo "<a href=\"/djopform/page2/".$user."/n=".$n_name."/menu=".$menu."\" class=\"previous\">&laquo; Previous</a>";
							} else {
								echo "<a href=\"/djopform/page2/".$user."/menu=".$menu."\" class=\"previous\">&laquo; Previous</a>";
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
				<p><font color="red">*</font> หมายเหตุ : กรุณากรอกข้อมูลให้เรียบร้อยแล้วกดบันทึก</P>
					<select id="indarea" size="5" style="display :none;">
					<?php
						foreach ($c13Q as $key => $value) {
							if ($key != 0) {
								$n = $key+1;
								echo "<option>$n</option>";
							}
						}
					?>
					</select>
					<!-- style="display :none;" -->
					<!--scripts-->
					<script type="text/javascript" src="/djopform/scripts.js"></script>
					<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					<script>

					function home(i) {
						window.open('/djopform/home/'+i,"_self");
					}
					function rmve(i) {
						var o = i;
						var x2 = document.getElementById("txtDepartment"+o);
						var indar = document.getElementById("indarea");
						// alert(indar.length);
						if (indar.length == 1) {
							var txtar2 = document.getElementById("txtDepartment2");
							txtar2.remove();
							indar.remove(indar.length-1);
							$("#remove-cont").empty();
						} else {
							x2.remove();
							indar.remove(indar.length-1);
							var lastind = (indar.length) + 1;
							// alert(lastind);
							$("#remove-cont").empty();
							$("#remove-cont").append('<input type="button" id ="removeMore" onClick="rmve(\''+lastind+'\')" style="border:1px solid gray;" value="- ลบหน่วยงาน">');
						}
					}

					$(document).ready(function(){
						// var id = 1;
						$("#AddMore").click(function(){
							// var showId = ++id;
							var indad = document.getElementById("indarea").length;
							indad = indad+2;
							// alert(indad);
							var dd = $("#removeMore").val();
							$("#input-txtDepartment").append('<textarea type="text" id="txtDepartment'+indad+'" name="txtDepartment[]" placeholder="หน่วยงานที่ '+indad+'" rows="5" cols="50" required></textarea>&nbsp;');
							$("#indarea").append('<option>'+indad+'</option>');
							if (typeof dd === "undefined") {
								$("#remove-cont").append('<input type="button" id ="removeMore" onClick="rmve(\''+indad+'\')" style="border:1px solid gray;" value="- ลบหน่วยงาน">');
							} else {
								$("#remove-cont").empty();
								$("#remove-cont").append('<input type="button" id ="removeMore" onClick="rmve(\''+indad+'\')" style="border:1px solid gray;" value="- ลบหน่วยงาน">');
							}
						});
					});

					//disabled textbox อื่นๆโปรดระบุ
					function myFunction(i) {
						var checkBox = document.getElementById("myCheck"+i);
						var text = document.getElementById("text"+i);
						if (checkBox.checked == true && i == 1) {
							text.disabled = false;
						} else {
							var text1 = document.getElementById("text1");
							text1.disabled = true;
							text1.value = "";
						}
					}
					</script>
				</body>
				</html>
