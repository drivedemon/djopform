<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
// error_reporting(0); // close all error
// set html to excel format
// header("Content-Type: application/vnd.ms-excel");
// header('Content-Disposition: attachment; filename="MyXls.xls"');

$user = (isset($_POST['user_id']))? $_POST["user_id"]:'';
$n_name = (isset($_POST['user']))? thainamedepartFull($_POST["user"]):'';
$month = (isset($_POST['dateMonth']))? $_POST["dateMonth"]:'';
$year = (isset($_POST['dateYear']))? $_POST["dateYear"]:'';
$all = (isset($_POST['selectAll']))? $_POST["selectAll"]:'1';

if($all == 0) {
  $query = "SELECT * FROM network_detail where user_id='$user' order by update_date ASC";
  $cyear = thainumDigit(date("Y")+543);
} else {
  $query = "SELECT * FROM network_detail where user_id='$user' and month='$month' and year='$year' order by update_date ASC";
  $year = thainumDigit($year);
  // echo "$query";
}
$result = mysqli_query($conn, $query);
?>
<!-- <html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40"> -->
<HTML>
  <HEAD>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <style>
    td {
      vertical-align: middle;
    }
    </style>
  </HEAD>
  <BODY>
    <TABLE x:str BORDER="1" style="font-family: TH SarabunPSK; font-size: 20px; height: 40px;">
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="10" align="center">แบบรายงานการสนับสนุนของเครือข่ายภารกิจของหน่วยงาน</th>
      </TR>
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="10" align="center"><?php if($all==0){echo "ทั้งหมด";}else{echo "ประจำเดือน$month พ.ศ. $year";}?> </th>
      </TR>
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="10" align="center"><?=$n_name?></th>
      </TR>

      <tr style="height: 50px;" align="center">
        <th>ลำดับที่</th>
        <th>วัน/เดือน/ปี</th>
        <th>ประเภทเครือข่าย</th>
        <th colspan="1">ด้านของการสนับสนุน</th>
        <th colspan="1">กลุ่มเป้าหมาย</th>
        <th colspan="1">รูปแบบการสนับสนุน</th>
        <th colspan="2">รายละเอียด</th>
        <th colspan="1">คิดมูลค่าเงิน</th>
        <th colspan="1">เอกสารประกอบ</th>
      </tr>
      <!-- <TR> -->
      <?php

      // while($rowd = mysqli_fetch_assoc($result)) {
      //   print_r($rowd);
      //   echo "<br>";
      //   echo "<br>";
      //   echo "<br>";
      //   echo "<br>";
      // }
      $item = 1;
      while($row = mysqli_fetch_assoc($result))
      {
      // echo "<br>";
      // echo "<br>";
      // echo "<br>";
      // echo "<br>";
      //   print_r($row);
        // format date arabic to thai
        $acdate = $row['date_activity'];
        $acdate = explode("-",$acdate);
        $fdate = thainumDigit($acdate[2]);
        $fmonth = monthnumDigit($acdate[1]);
        $fyear = $acdate[0]+543;
        $fyear = substr($fyear, 2);
        $fyear = thainumDigit($fyear);
        $newfdate = $fdate." ".$fmonth." ".$fyear;
        // convert nettype
        $nettype = unserialize($row['network_type']);
        $nt = $nettype[0]==1?"ภาครัฐ":"ภาคเอกชน";
        //convert network_name
        $netname = $row['network_name'];
        //convert network_activity
        $netact = unserialize($row['network_activity']);
        // print_r($netact);
        foreach ($netact[0] as $val) {
          if ($val == 1) {
            $fnetact = "ด้านการศึกษาสามัญ";
          } elseif ($val == 2) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการเรียนวิชาชีพหรือฝึกอาชีพ"; } else { $fnetact = "ด้านการเรียนวิชาชีพหรือฝึกอาชีพ"; }
          } elseif ($val == 3) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการจ้างงาน"; } else { $fnetact = "ด้านการจ้างงาน"; }
          } elseif ($val == 4) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการฝึกงาน"; } else { $fnetact = "ด้านการฝึกงาน"; }
          } elseif ($val == 5) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการแก้ไขบำบัดฟื้นฟู"; } else { $fnetact = "ด้านการแก้ไขบำบัดฟื้นฟู"; }
          } elseif ($val == 6) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านที่อยู่อาศัย"; } else { $fnetact = "ด้านที่อยู่อาศัย"; }
          } elseif ($val == 7) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านสุขภาพกาย"; } else { $fnetact = "ด้านสุขภาพกาย"; }
          } elseif ($val == 8) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านสุขภาพจิต"; } else { $fnetact = "ด้านสุขภาพจิต"; }
          } elseif ($val == 9) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการติดตามหลังปล่อย/ติดตามตาม ม.๘๖"; } else { $fnetact = "ด้านการติดตามหลังปล่อย/ติดตามตาม ม.๘๖"; }
          } elseif ($val == 10) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการป้องกันการกระทำผิดกฎหมาย"; } else { $fnetact = "ด้านการป้องกันการกระทำผิดกฎหมาย"; }
          } elseif ($val == 11) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= "ด้านการสงเคราะห์ช่วยเหลือ"; } else { $fnetact = "ด้านการสงเคราะห์ช่วยเหลือ"; }
          } elseif ($val == 12) {
            if (!empty($fnetact)) { $fnetact .= ", "; }
            if (!empty($fnetact)) { $fnetact .= $netact[1]; } else { $fnetact = $netact[1]; }
          }
        }
        // convert status_juvenile
        $stajuv = unserialize($row['status_juvenile']);
        // print_r($stajuv);
        if (!empty($stajuv)) {
          foreach ($stajuv[0] as $val) {
            if ($val == 1) {
              $fstajuv = "เด็ก/เยาวชนในสถานแรกรับ";
            } elseif ($val == 2) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนระยะฝึกอบรม"; } else { $fstajuv = "เด็ก/เยาวชนระยะฝึกอบรม"; }
            } elseif ($val == 3) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนตาม ม.๘๖"; } else { $fstajuv = "เด็ก/เยาวชนตาม ม.๘๖"; }
            } elseif ($val == 4) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนที่ได้รับการปล่อยตัวชั่วคราว"; } else { $fstajuv = "เด็ก/เยาวชนที่ได้รับการปล่อยตัวชั่วคราว"; }
            } elseif ($val == 5) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนที่ได้รับการปล่อยตัว"; } else { $fstajuv = "เด็ก/เยาวชนที่ได้รับการปล่อยตัว"; }
            } elseif ($val == 6) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนในสถานศึกษา"; } else { $fstajuv = "เด็ก/เยาวชนในสถานศึกษา"; }
            } elseif ($val == 7) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= "เด็ก/เยาวชนระยะเตรียมความพร้อมก่อนปล่อยตัว"; } else { $fstajuv = "เด็ก/เยาวชนระยะเตรียมความพร้อมก่อนปล่อยตัว"; }
            } elseif ($val == 8) {
              if (!empty($fstajuv)) { $fstajuv .= ", "; }
              if (!empty($fstajuv)) { $fstajuv .= $stajuv[1]; } else { $fstajuv = $stajuv[1]; }
              $fstajuv .= $stajuv[1];
            }
          }
        } else {
          $fstajuv = "";
        }

        // convert valuation
        $valu = unserialize($row['valuation']);
        if (!empty($valu)) {
          foreach ($valu as $value) {
            // set value choice 7-1
            if ($value[0] == 1) {
              $title7 = "สนับสนุนด้วยการบริจาคเงินสด";
              $amount71 = floatInt($value['amount']);
              $desc71 = thainumDigit($value['evaluation_details']);
              $ref71 = $value['reference'];
              $sum = arabicnumDigit($amount71);
              $detail = "<b>".$netname."</b> สนับสนุนด้วยการบริจาคเงินสด จำนวน ".$amount71." บาท รายละเอียดการประเมิน ".$desc71;
              // calculate reference7-1
              if (!empty($ref71)) {
                foreach ($ref71 as $valref71) {
                  if ($valref71 == 1) {
                    $fref = "รูปภาพ";
                  } elseif ($valref71 == 2) {
                    if (!empty($fref)) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือประเมินราคา"; } else { $fref = "หนังสือประเมินราคา"; }
                  } elseif ($valref71 == 3) {
                    if (!empty($fref)) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "ใบเซ็นชื่อวิทยากร"; } else { $fref = "ใบเซ็นชื่อวิทยากร"; }
                  } elseif ($valref71 == 4) {
                    if (!empty($fref)) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "ใบเสร็จรับเงิน"; } else { $fref = "ใบเสร็จรับเงิน"; }
                  } elseif ($valref71 == 5) {
                    if (!empty($fref)) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือขอบคุณ"; } else { $fref = "หนังสือขอบคุณ"; }
                  } elseif ($valref71 == 6) {
                    if (!empty($fref)) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= thainumDigit($value['other']); } else { $fref = thainumDigit($value['other']); }
                  }
                }
              }
              // set value choice 7-2
            } elseif ($value[0] == 2) {
              // set value for title7
              if (!empty($title7)) { $title7 .= "<br>"; }
              if (!empty($title7)) { $title7 .= "สนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงาน"; } else { $title7 = "สนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงาน"; }
              $i = 0;
              $j = 0;
              // set value for detail7
              $lec = (isset($value['lecturer']))?thainumDigit($value['lecturer']):'';
              $artist = (isset($value['artist']))?thainumDigit($value['artist']):'';
              $sdepart = (isset($value['supdepart']))?thainumDigit($value['supdepart']):'';
              $act = (isset($value['stu_act']))?thainumDigit($value['stu_act']):'';
              $aprt = (isset($value['stu_aprt']))?thainumDigit($value['stu_aprt']):'';
              $outact = (isset($value['out_act']))?thainumDigit($value['out_act']):'';
              $oth72 = (isset($value['other']))?thainumDigit($value['other']):'';
              $desc72 = thainumDigit($value['evaluation_details']);
              $ref72 = $value['reference'];

              // total money in 7-2
              $total_artist = $artist != ""? 5000 :'0';
              $total_sdepart = $sdepart != ""? 1000 :'0';
              $total_outact = $outact != ""? 800*arabicnumDigit($outact['amount'])*arabicnumDigit($outact['time']) :'0';
              $total_oth72 = $oth72 != ""? arabicnumDigit($oth72['value']) :'0';

              if ($lec != "") {
                $lecnum = arabicnumDigit($lec);
                if ($nettype[0] == 1) {
                  $total_lec = $lecnum['amount'] >= 5? 3000 :$lecnum['amount'] * 600;
                } else {
                  $total_lec = $lecnum['amount'] >= 5? 6000 :$lecnum['amount'] * 1200;
                }
              } else {
                $total_lec = '0';
              }
              if ($act != "") {
                $actnum = arabicnumDigit($act);
                $total_act = $actnum['amount'] >= 5? (5*200)*$actnum['time'] :($actnum['amount']*200)*$actnum['time'];
              } else {
                $total_act = '0';
              }
              if ($aprt != "") {
                $aprtnum = arabicnumDigit($aprt);
                $total_aprt = $aprtnum['time'] == 1? $aprtnum['amount']*1000 :$aprtnum['amount']*3000;
              } else {
                $total_aprt = '0';
              }

              if (!empty($sum)) { $sum .= "<br>"; }
              if (!empty($sum)) { $sum .= $total_lec+$total_act+$total_aprt+$total_artist+$total_sdepart+$total_outact+$total_oth72; } else { $sum = $total_lec+$total_act+$total_aprt+$total_artist+$total_sdepart+$total_outact+$total_oth72; }

              if (!empty($detail)) { $detail .= "<br>"; }
              // have data list in $detail
              if (!empty($detail)) {
                if ($lec != '') {
                  $detail .= "<b>".$netname."</b> วิทยากร จำนวน ".$lec['amount']." คน ระยะเวลาในการดำเนินการ ".$lec['time']." ชั่วโมง จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม ".$lec['child_num']." ราย";
                  $j = 1;
                }
                if ($artist != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)"; } else { $detail .= "<b>".$netname."</b> ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)"; }
                  $j = 1;
                }
                if ($sdepart != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน"; } else { $detail .= "<b>".$netname."</b> เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน"; }
                  $j = 1;
                }
                if ($act != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "นักศึกษาเข้าทำกิจกรรม จำนวน ".$act['amount']." คน ระยะเวลา ".$act['time']." วัน"; } else { $detail .= "<b>".$netname."</b> นักศึกษาเข้าทำกิจกรรม จำนวน ".$act['amount']." คน ระยะเวลา ".$act['time']." วัน"; }
                  $j = 1;
                }
                if ($aprt != '') {
                  if ($aprt['time'] == "๑") { $time = "ระยะสั้น"; } else { $time = "ภาคเรียน"; }
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "นักศึกษาฝึกงาน จำนวน ".$aprt['amount']." คน ระยะเวลาในการดำเนินการ".$time; } else { $detail .= "<b>".$netname."</b> นักศึกษาฝึกงาน จำนวน ".$aprt['amount']." คน ระยะเวลาในการดำเนินการ".$time; }
                  $j = 1;
                }
                if ($outact != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก จำนวน ".$outact['amount']." คน ระยะเวลา ".$outact['time']." วัน"; } else { $detail .= "<b>".$netname."</b> การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก จำนวน ".$outact['amount']." คน ระยะเวลา ".$outact['time']." วัน"; }
                  $j = 1;
                }
                if ($oth72 != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การสนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงานรูปแบบอื่น ๆ ได้แก่ ".$oth72['specify']; } else { $detail .= "<b>".$netname."</b> การสนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงานรูปแบบอื่น ๆ ได้แก่ ".$oth72['specify']; }
                  $j = 1;
                }
                $detail .= " รายละเอียดการประเมิน  ".$desc72;
                // no data list in $detail
               } else {
                 if ($lec != '') {
                   $detail = "<b>".$netname."</b> วิทยากร จำนวน ".$lec['amount']." คน ระยะเวลาในการดำเนินการ ".$lec['time']." ชั่วโมง จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม ".$lec['child_num']." ราย";
                 }
                 if ($artist != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)"; } else { $detail = "<b>".$netname."</b> ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)"; }
                 }
                 if ($sdepart != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน"; } else { $detail = "<b>".$netname."</b> เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน"; }
                 }
                 if ($act != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "นักศึกษาเข้าทำกิจกรรม จำนวน ".$act['amount']." คน ระยะเวลา ".$act['time']." วัน"; } else { $detail = "<b>".$netname."</b> นักศึกษาเข้าทำกิจกรรม จำนวน ".$act['amount']." คน ระยะเวลา ".$act['time']." วัน"; }
                 }
                 if ($aprt != '') {
                   if ($aprt['time'] == "๑") { $time = "ระยะสั้น"; } else { $time = "ภาคเรียน"; }
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "นักศึกษาฝึกงาน จำนวน ".$aprt['amount']." คน ระยะเวลาในการดำเนินการ".$time; } else { $detail = "<b>".$netname."</b> นักศึกษาฝึกงาน จำนวน ".$aprt['amount']." คน ระยะเวลาในการดำเนินการ".$time; }
                 }
                 if ($outact != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก จำนวน ".$outact['amount']." คน ระยะเวลา ".$outact['time']." วัน"; } else { $detail = "<b>".$netname."</b> การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก จำนวน ".$outact['amount']." คน ระยะเวลา ".$outact['time']." วัน"; }
                 }
                 if ($oth72 != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การสนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงานรูปแบบอื่น ๆ ได้แก่ ".$oth72['specify']; } else { $detail = "<b>".$netname."</b> การสนับสนุนการเข้ามาจัดกิจกรรมหรือการดำเนินงานรูปแบบอื่น ๆ ได้แก่ ".$oth72['specify']; }
                 }
                 $detail .= " รายละเอียดการประเมิน  ".$desc72;
               }

               // calculate reference7-2
               if (!empty($fref)) { $fref .= "<br>"; }
               if (!empty($ref72)) {
                 foreach ($ref72 as $valref72) {
                   if ($valref72 == 1) {
                     if (!empty($fref)) { $fref .= "รูปภาพ"; } else { $fref = "รูปภาพ"; }
                     $i = 1;
                   } elseif ($valref72 == 2) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "หนังสือประเมินราคา"; } else { $fref = "หนังสือประเมินราคา"; }
                     $i = 1;
                   } elseif ($valref72 == 3) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "ใบเซ็นชื่อวิทยากร"; } else { $fref = "ใบเซ็นชื่อวิทยากร"; }
                     $i = 1;
                   } elseif ($valref72 == 5) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "หนังสือตอบขอบคุณ"; } else { $fref = "หนังสือตอบขอบคุณ"; }
                     $i = 1;
                   } elseif ($valref72 == 6) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= thainumDigit($value['other7_2']); } else { $fref = thainumDigit($value['other7_2']); }
                   }
                 }
               }

              // set value choice 7-3
            } elseif ($value[0] == 3) {
              if (!empty($title7)) { $title7 .= "<br>"; }
              if (!empty($title7)) { $title7 .= "การสนับสนุนด้วยวัสดุ-อุปกรณ์/สิ่งของ/สถานที่/พาหนะ/บริการบริการทางการแพทย์"; } else { $title7 = "การสนับสนุนด้วยวัสดุ-อุปกรณ์/สิ่งของ/สถานที่/พาหนะ/บริการบริการทางการแพทย์"; }
              $i = 0;
              $j = 0;
              // set value for detail7
              $met = (isset($value['material']))?thainumDigit($value['material']):'';
              $food = (isset($value['food']))?thainumDigit($value['food']):'';
              $reward = (isset($value['rewards']))?thainumDigit($value['rewards']):'';
              $place = (isset($value['place']))?thainumDigit($value['place']):'';
              $veh = (isset($value['vehicle']))?thainumDigit($value['vehicle']):'';
              $sad = (isset($value['substance_abuse_detection']))?thainumDigit($value['substance_abuse_detection']):'';
              $bm = (isset($value['banned_materials']))?thainumDigit($value['banned_materials']):'';
              $ms = (isset($value['medical_services']))?thainumDigit($value['medical_services']):'';
              $obj_med = (isset($value['obj_medical']))?thainumDigit($value['obj_medical']):'';
              $oth73 = (isset($value['other']))?thainumDigit($value['other']):'';
              $desc73 = thainumDigit($value['evaluation_details']);
              $ref73 = $value['reference'];

              // total money in 7-3
              $total_met = $met != ""? arabicnumDigit($met['value']) :'0';
              $total_food = $food != ""? arabicnumDigit($food['value']) :'0';
              $total_reward = $reward != ""? arabicnumDigit($reward['value']) :'0';
              $total_place = $place != ""? arabicnumDigit($place['value']) :'0';
              $total_veh = $veh != ""? arabicnumDigit($veh['value2']) :'0';
              $total_sad = $sad != ""? arabicnumDigit($sad['value']) :'0';
              $total_bm = $bm != ""? arabicnumDigit($bm['value']) :'0';
              $total_ms = $ms != ""? arabicnumDigit($ms['value']) :'0';
              $total_obj_med = $obj_med != ""? arabicnumDigit($obj_med['value']) :'0';
              $total_oth73 = $oth73 != ""? arabicnumDigit($oth73['value']) :'0';

              if (!empty($sum)) { $sum .= "<br>"; }
              if (!empty($sum)) { $sum .= $total_met+$total_food+$total_reward+$total_place+$total_veh+$total_sad+$total_bm+$total_ms+$total_obj_med+$total_oth73; } else { $sum = $total_met+$total_food+$total_reward+$total_place+$total_veh+$total_sad+$total_bm+$total_ms+$total_obj_med+$total_oth73; }
              if (!empty($detail)) { $detail .= "<br>"; }
              // have data list in $detail
              if (!empty($detail)) {
                if ($met != '') {
                  $detail .= "<b>".$netname."</b> สนับสนุนวัสดุ-อุปกรณ์ ได้แก่ ".$met['material_name']." จำนวน ".$met['amount']." ชิ้น/อัน";
                  $j = 1;
                }
                if ($food != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "อาหารและเครื่องดื่ม ได้แก่ ".$food['food_name']." จำนวนเด็กและเยาวชนที่ได้รับ ".$food['child_num']." คน จำนวนเจ้าหน้าที่ที่ได้รับ ".$food['officer_num']." คน"; } else { $detail .= "<b>".$netname."</b> อาหารและเครื่องดื่ม ได้แก่ ".$food['food_name']." จำนวนเด็กและเยาวชนที่ได้รับ ".$food['child_num']." คน จำนวนเจ้าหน้าที่ที่ได้รับ ".$food['officer_num']." คน"; }
                  $j = 1;
                }
                if ($reward != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ของรางวัล จำนวน ".$reward['amount']." ชิ้น"; } else { $detail .= "<b>".$netname."</b> ของรางวัล จำนวน ".$reward['amount']." ชิ้น"; }
                  $j = 1;
                }
                if ($place != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "สถานที่ ระยะเวลาในการใช้สถานที่ ".$place['hour']." ชม./วัน จำนวน ".$place['day']." วัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$place['participants']." ราย"; }
                  else { $detail .= "<b>".$netname."</b> สถานที่ ระยะเวลาในการใช้สถานที่ ".$place['hour']." ชม./วัน จำนวน ".$place['day']." วัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$place['participants']." ราย"; }
                  $j = 1;
                }
                if ($veh != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "พาหนะ จำนวน ".$veh['amount']." คัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$veh['participants']." ราย"; } else { $detail .= "<b>".$netname."</b> พาหนะ จำนวน ".$veh['amount']." คัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$veh['participants']." ราย"; }
                  $j = 1;
                }
                if ($sad != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การตรวจหาสารเสพติด จำนวนเด็ก/เยาวชนที่ได้รับ ".$sad['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การตรวจหาสารเสพติด จำนวนเด็ก/เยาวชนที่ได้รับ ".$sad['child_num']." ราย"; }
                  $j = 1;
                }
                if ($bm != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี จำนวน ".$bm['amount']." ชิ้น"; } else { $detail .= "<b>".$netname."</b> วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี จำนวน ".$bm['amount']." ชิ้น"; }
                  $j = 1;
                }
                if ($ms != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การบริการทางแพทย์ จำนวนเด็ก/เยาวชนที่ได้รับ ".$ms['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การบริการทางแพทย์ จำนวนเด็ก/เยาวชนที่ได้รับ ".$ms['child_num']." ราย"; }
                  $j = 1;
                }
                if ($obj_med != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่ ".$obj_med['object']." จำนวน ".$obj_med['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่ ".$obj_med['object']." จำนวน ".$obj_med['child_num']." ราย"; }
                  $j = 1;
                }
                if ($oth73 != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การสนับสนุนรูปแบบอื่น ๆ ได้แก่ ".$oth73['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth73['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การสนับสนุนรูปแบบอื่น ๆ ได้แก่ ".$oth73['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth73['child_num']." ราย"; }
                  $j = 1;
                }
                $detail .= " รายละเอียดการประเมิน  ".$desc73;
                // no data list in $detail
               } else {
                 if ($met != '') {
                   $detail = "<b>".$netname."</b> สนับสนุนวัสดุ-อุปกรณ์ ได้แก่ ".$met['material_name']." จำนวน ".$met['amount']." ชิ้น/อัน";
                 }
                 if ($food != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "อาหารและเครื่องดื่ม ได้แก่ ".$food['food_name']." จำนวนเด็กและเยาวชนที่ได้รับ ".$food['child_num']." คน จำนวนเจ้าหน้าที่ที่ได้รับ ".$food['officer_num']." คน"; } else { $detail = "<b>".$netname."</b> อาหารและเครื่องดื่ม ได้แก่ ".$food['food_name']." จำนวนเด็กและเยาวชนที่ได้รับ ".$food['child_num']." คน จำนวนเจ้าหน้าที่ที่ได้รับ ".$food['officer_num']." คน"; }
                 }
                 if ($reward != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ของรางวัล จำนวน ".$reward['amount']." ชิ้น"; } else { $detail = "<b>".$netname."</b> ของรางวัล จำนวน ".$reward['amount']." ชิ้น"; }
                 }
                 if ($place != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "สถานที่ ระยะเวลาในการใช้สถานที่ ".$place['hour']." ชม./วัน จำนวน ".$place['day']." วัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$place['participants']." ราย"; }
                   else { $detail = "<b>".$netname."</b> สถานที่ ระยะเวลาในการใช้สถานที่ ".$place['hour']." ชม./วัน จำนวน ".$place['day']." วัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$place['participants']." ราย"; }
                 }
                 if ($veh != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "พาหนะ จำนวน ".$veh['amount']." คัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$veh['participants']." ราย"; } else { $detail = "<b>".$netname."</b> พาหนะ จำนวน ".$veh['amount']." คัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรมและ/หรือจำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$veh['participants']." ราย"; }
                 }
                 if ($sad != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การตรวจหาสารเสพติด จำนวนเด็ก/เยาวชนที่ได้รับ ".$sad['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การตรวจหาสารเสพติด จำนวนเด็ก/เยาวชนที่ได้รับ ".$sad['child_num']." ราย"; }
                 }
                 if ($bm != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี จำนวน ".$bm['amount']." ชิ้น"; } else { $detail = "<b>".$netname."</b> วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี จำนวน ".$bm['amount']." ชิ้น"; }
                 }
                 if ($ms != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การบริการทางแพทย์ จำนวนเด็ก/เยาวชนที่ได้รับ ".$ms['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การบริการทางแพทย์ จำนวนเด็ก/เยาวชนที่ได้รับ ".$ms['child_num']." ราย"; }
                 }
                 if ($obj_med != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่ ".$obj_med['object']." จำนวน ".$obj_med['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่ ".$obj_med['object']." จำนวน ".$obj_med['child_num']." ราย"; }
                 }
                 if ($oth73 != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การสนับสนุนรูปแบบอื่น ๆ ได้แก่ ".$oth73['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth73['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การสนับสนุนรูปแบบอื่น ๆ ได้แก่ ".$oth73['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth73['child_num']." ราย"; }
                 }
                 $detail .= " รายละเอียดการประเมิน  ".$desc73;
               }

              // calculate reference7-3
              if (!empty($fref)) { $fref .= "<br>"; }
              if (!empty($ref73)) {
                foreach ($ref73 as $valref73) {
                  if ($valref73 == 1) {
                    if (!empty($fref)) { $fref .= "รูปภาพ"; } else { $fref = "รูปภาพ"; }
                    $i = 1;
                  } elseif ($valref73 == 2) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือประเมินราคา"; } else { $fref = "หนังสือประเมินราคา"; }
                    $i = 1;
                  } elseif ($valref73 == 4) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "ใบเสร็จรับเงิน"; } else { $fref = "ใบเสร็จรับเงิน"; }
                    $i = 1;
                  } elseif ($valref73 == 5) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือตอบขอบคุณ"; } else { $fref = "หนังสือตอบขอบคุณ"; }
                    $i = 1;
                  } elseif ($valref73 == 6) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= thainumDigit($value['other7_3']); } else { $fref = thainumDigit($value['other7_3']); }
                  }
                }
              }

              // set value choice 7-4
            } elseif ($value[0] == 4) {
              if (!empty($title7)) { $title7 .= "<br>"; }
              if (!empty($title7)) { $title7 .= "การสงเคราะห์เด็กและเยาวชน"; } else { $title7 = "การสงเคราะห์เด็กและเยาวชน"; }
              $i = 0;
              $j = 0;
              // set value for detail7
              $res = (isset($value['residence']))?thainumDigit($value['residence']):'';
              $ff = (isset($value['foster_family']))?thainumDigit($value['foster_family']):'';
              $fp = (isset($value['foster_parents']))?thainumDigit($value['foster_parents']):'';
              $emp = (isset($value['employment']))?thainumDigit($value['employment']):'';
              $grt = (isset($value['guarantee']))?thainumDigit($value['guarantee']):'';
              $appren = (isset($value['apprentice']))?thainumDigit($value['apprentice']):'';
              $admis = (isset($value['admission']))?thainumDigit($value['admission']):'';
              $scholar = (isset($value['scholarship']))?thainumDigit($value['scholarship']):'';
              $supcar = (isset($value['supcareer']))?thainumDigit($value['supcareer']):'';
              $oth74 = (isset($value['other']))?thainumDigit($value['other']):'';
              $desc74 = thainumDigit($value['evaluation_details']);
              $ref74 = $value['reference'];

              // total money in 7-4
              $total_res = $res != ""? arabicnumDigit($res['child_num'])*3000 :'0';
              $total_ff = $ff != ""? arabicnumDigit($ff['child_num'])*5000 :'0';
              $total_fp = $fp != ""? arabicnumDigit($fp['child_num'])*300 :'0';
              $total_emp = $emp != ""? arabicnumDigit($emp['child_num'])*3000 :'0';
              $total_grt = $grt != ""? arabicnumDigit($grt['child_num'])*1000 :'0';
              $total_admis = $admis != ""? arabicnumDigit($admis['value']) :'0';
              $total_scholar = $scholar != ""? arabicnumDigit($scholar['value']) :'0';
              $total_supcar = $supcar != ""? arabicnumDigit($supcar['value']) :'0';
              $total_oth74 = $oth74 != ""? arabicnumDigit($oth74['value']) :'0';

              if ($appren != "") {
                $apprennum = arabicnumDigit($appren);
                $total_appren = $apprennum['time'] == 1? $apprennum['child_num']*3000 :$apprennum['value'];
              } else {
                $total_appren = '0';
              }

              if (!empty($sum)) { $sum .= "<br>"; }
              if (!empty($sum)) { $sum .= $total_res+$total_ff+$total_fp+$total_emp+$total_grt+$total_appren+$total_admis+$total_scholar+$total_supcar+$total_oth74; }
              else { $sum = $total_res+$total_ff+$total_fp+$total_emp+$total_grt+$total_appren+$total_admis+$total_scholar+$total_supcar+$total_oth74; }
              if (!empty($detail)) { $detail .= "<br>"; }
              // have data list in $detail
              if (!empty($detail)) {
                if ($res != '') {
                  $detail .= "<b>".$netname."</b> ที่อยู่อาศัย จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$res['child_num']." ราย";
                  $j = 1;
                }
                if ($ff != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$ff['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$ff['child_num']." ราย"; }
                  $j = 1;
                }
                if ($fp != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "พ่อแม่อุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$fp['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> พ่อแม่อุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$fp['child_num']." ราย"; }
                  $j = 1;
                }
                if ($emp != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การจ้างงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$emp['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การจ้างงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$emp['child_num']." ราย"; }
                  $j = 1;
                }
                if ($grt != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$grt['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$grt['child_num']." ราย"; }
                  $j = 1;
                }
                if ($appren != '') {
                  if ($appren['time'] == "๑") { $monthtime = "เดือนแรก"; } else { $monthtime = "หลังจากเดือนแรก"; }
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การรับเด็ก/เยาวชนเข้าฝึกงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$appren['child_num']." ราย เดือนที่รับเข้าทำงาน".$monthtime; } else { $detail .= "<b>".$netname."</b> การรับเด็ก/เยาวชนเข้าฝึกงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$appren['child_num']." ราย เดือนที่รับเข้าทำงาน".$monthtime; }
                  $j = 1;
                }
                if ($admis != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การรับเด็ก/เยาวชนเข้าศึกษาต่อ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$admis['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การรับเด็ก/เยาวชนเข้าศึกษาต่อ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$admis['child_num']." ราย"; }
                  $j = 1;
                }
                if ($scholar != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$scholar['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$scholar['child_num']." ราย"; }
                  $j = 1;
                }
                if ($supcar != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ให้ทุนการประกอบอาชีพ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$supcar['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> ให้ทุนการประกอบอาชีพ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$supcar['child_num']." ราย"; }
                  $j = 1;
                }
                if ($oth74 != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "การสงเคราะห์เด็กและเยาวชนรูปแบบอื่น ๆ ได้แก่ ".$oth74['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth74['child_num']." ราย"; } else { $detail .= "<b>".$netname."</b> การสงเคราะห์เด็กและเยาวชนรูปแบบอื่น ๆ ได้แก่ ".$oth74['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth74['child_num']." ราย"; }
                  $j = 1;
                }
                $detail .= " รายละเอียดการประเมิน  ".$desc74;
                // no data list in $detail
               } else {
                 if ($res != '') {
                   $detail = "<b>".$netname."</b> ที่อยู่อาศัย จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$res['child_num']." ราย";
                 }
                 if ($ff != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$ff['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$ff['child_num']." ราย"; }
                 }
                 if ($fp != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "พ่อแม่อุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$fp['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> พ่อแม่อุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$fp['child_num']." ราย"; }
                 }
                 if ($emp != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การจ้างงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$emp['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การจ้างงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$emp['child_num']." ราย"; }
                 }
                 if ($grt != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$grt['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$grt['child_num']." ราย"; }
                 }
                 if ($appren != '') {
                   if ($appren['time'] == "๑") { $monthtime = "เดือนแรก"; } else { $monthtime = "หลังจากเดือนแรก"; }
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การรับเด็ก/เยาวชนเข้าฝึกงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$appren['child_num']." ราย เดือนที่รับเข้าทำงาน".$monthtime; } else { $detail = "<b>".$netname."</b> การรับเด็ก/เยาวชนเข้าฝึกงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$appren['child_num']." ราย เดือนที่รับเข้าทำงาน".$monthtime; }
                 }
                 if ($admis != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การรับเด็ก/เยาวชนเข้าศึกษาต่อ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$admis['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การรับเด็ก/เยาวชนเข้าศึกษาต่อ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$admis['child_num']." ราย"; }
                 }
                 if ($scholar != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$scholar['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$scholar['child_num']." ราย"; }
                 }
                 if ($supcar != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ให้ทุนการประกอบอาชีพ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$supcar['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> ให้ทุนการประกอบอาชีพ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$supcar['child_num']." ราย"; }
                 }
                 if ($oth74 != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "การสงเคราะห์เด็กและเยาวชนรูปแบบอื่น ๆ ได้แก่ ".$oth74['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth74['child_num']." ราย"; } else { $detail = "<b>".$netname."</b> การสงเคราะห์เด็กและเยาวชนรูปแบบอื่น ๆ ได้แก่ ".$oth74['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth74['child_num']." ราย"; }
                 }
                 $detail .= " รายละเอียดการประเมิน  ".$desc74;
               }

              // calculate reference7-4
              if (!empty($fref)) { $fref .= "<br>"; }
              if (!empty($ref74)) {
                foreach ($ref74 as $valref74) {
                  if ($valref74 == 1) {
                    if (!empty($fref)) { $fref .= "รูปภาพ"; } else { $fref = "รูปภาพ"; }
                    $i = 1;
                  } elseif ($valref74 == 2) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือประเมินราคา"; } else { $fref = "หนังสือประเมินราคา"; }
                    $i = 1;
                  } elseif ($valref74 == 4) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "ใบเสร็จรับเงิน"; } else { $fref = "ใบเสร็จรับเงิน"; }
                    $i = 1;
                  } elseif ($valref74 == 5) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= "หนังสือตอบขอบคุณ"; } else { $fref = "หนังสือตอบขอบคุณ"; }
                    $i = 1;
                  } elseif ($valref74 == 6) {
                    if (!empty($fref) && $i == 1) { $fref .= ", "; }
                    if (!empty($fref)) { $fref .= thainumDigit($value['other7_4']); } else { $fref = thainumDigit($value['other7_4']); }
                  }
                }
              }

              // set value choice 7-5
            } elseif ($value[0] == 5) {
              if (!empty($title7)) { $title7 .= "<br>"; }
              if (!empty($title7)) { $title7 .= "การติดตามเด็กและเยาวชน"; } else { $title7 = "การติดตามเด็กและเยาวชน"; }
              $i = 0;
              $j = 0;
              // set value for detail7
              $release = (isset($value['release']))?thainumDigit($value['release']):'';
              $statute = (isset($value['statute']))?thainumDigit($value['statute']):'';
              $ref751 = $release!=''?$release['reference']:'';
              $ref752 = $statute!=''?$statute['reference']:'';
              $tr = arabicnumDigit($release['center_name']);

              $query_tr = "SELECT unit_sname FROM division WHERE unit_type='3' and unit_id='$tr' order by unit_sname";
              $tr_res = mysqli_query($cond,$query_tr);
              $tr_name = mysqli_fetch_assoc($tr_res);

              // total money in 7-5
              $total_release = $release != ""? arabicnumDigit($release['child_num'])*arabicnumDigit($release['time'])*300 :'0';
              $total_statute = $statute != ""? arabicnumDigit($statute['child_num'])*arabicnumDigit($statute['time'])*300 :'0';

              if (!empty($sum)) { $sum .= "<br>"; }
              if (!empty($sum)) { $sum .= $total_release+$total_statute; } else { $sum = $total_release+$total_statute; }

              if (!empty($detail)) { $detail .= "<br>"; }
              // have data list in $detail
              if (!empty($detail)) {
                if ($release != '') {
                  $detail .= "<b>".$netname."</b> ติดตามเด็กและเยาวชนหลังได้รับการปล่อยตัวจาก ".$tr_name['unit_sname']." จำนวนเด็ก/เยาวชน ".$release['child_num']." ราย เดือนละ ".$release['time']." ครั้ง";
                  $j = 1;
                }
                if ($statute != '') {
                  if (!empty($detail) && $j == 1) { $detail .= " ,"; }
                  if (!empty($detail) && $j == 1) { $detail .= "ติดตามเด็กและเยาวชนตาม ม.๘๖ จำนวนเด็ก/เยาวชน ".$statute['child_num']." ราย เดือนละ ".$statute['time']." ครั้ง"; } else { $detail .= "<b>".$netname."</b> ติดตามเด็กและเยาวชนตาม ม.๘๖ จำนวนเด็ก/เยาวชน ".$statute['child_num']." ราย เดือนละ ".$statute['time']." ครั้ง"; }
                  $j = 1;
                }
                // no data list in $detail
               } else {
                 if ($release != '') {
                   $detail = "<b>".$netname."</b> ติดตามเด็กและเยาวชนหลังได้รับการปล่อยตัวจาก ".$tr_name['unit_sname']." จำนวนเด็ก/เยาวชน ".$release['child_num']." ราย เดือนละ ".$release['time']." ครั้ง";
                 }
                 if ($statute != '') {
                   if (!empty($detail)) { $detail .= " ,"; }
                   if (!empty($detail)) { $detail .= "ติดตามเด็กและเยาวชนตาม ม.๘๖ จำนวนเด็ก/เยาวชน ".$statute['child_num']." ราย เดือนละ ".$statute['time']." ครั้ง"; } else { $detail = "<b>".$netname."</b> ติดตามเด็กและเยาวชนตาม ม.๘๖ จำนวนเด็ก/เยาวชน ".$statute['child_num']." ราย เดือนละ ".$statute['time']." ครั้ง"; }
                 }
               }

               // calculate reference7-5
               if (!empty($fref)) { $fref .= "<br>"; }
               if (!empty($ref751)) {
                 foreach ($ref751 as $valref75) {
                   if ($valref75 == 1) {
                     if (!empty($fref)) { $fref .= "รูปภาพ"; } else { $fref = "รูปภาพ"; }
                     $i = 1;
                   } elseif ($valref75 == 7) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "แบบรายงานการติดตามฯ"; } else { $fref = "แบบรายงานการติดตามฯ"; }
                     $i = 1;
                   } elseif ($valref75 == 6) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= thainumDigit($release['other7_5_1']); } else { $fref = thainumDigit($release['other7_5_1']); }
                   }
                 }
               }
               if (!empty($ref752)) {
                 foreach ($ref752 as $valref752) {
                   if ($valref752 == 1) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "รูปภาพ"; } else { $fref = "รูปภาพ"; }
                     $i = 1;
                   } elseif ($valref752 == 7) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= "แบบรายงานการติดตามฯ"; } else { $fref = "แบบรายงานการติดตามฯ"; }
                     $i = 1;
                   } elseif ($valref752 == 6) {
                     if (!empty($fref) && $i == 1) { $fref .= ", "; }
                     if (!empty($fref)) { $fref .= thainumDigit($statute['other7_5_2']); } else { $fref = thainumDigit($statute['other7_5_2']); }
                   }
                 }
               }


            } else {
              $title7 = "";
            }
            // echo "$sum===<br>";
          }
        }

        // <td colspan="2" align="center"> -- colspan => merge cell // align => position
        echo '
        <tr>
          <td align="center">'.thainumDigit($item).'</td>
          <td>'.$newfdate.'</td>
          <td>'.$nt.'</td>
          <td>'.$fnetact.'</td>
          <td>'.$fstajuv.'</td>
          <td>'.$title7.'</td>
          <td colspan="2">'.$detail.'</td>
          <td style="padding-right: 5px;" align="right">'.floatInt($sum).'</td>
          <td>'.$fref.'</td>
        </tr>
        ';
        // print_r(floatInt($sum));

        // <td align="right">'.floatInt($sum).'</td>
        // restart variable
        $i = 0;
        $j = 0;
        $fnetact = "";
        $fstajuv = "";
        $title7 = "";
        $detail = "";
        $sum = "";
        $fref = "";
        $item++;
      }
      ?>
  </TABLE>
</BODY>
</HTML>
