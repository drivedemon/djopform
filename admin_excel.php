<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
error_reporting(0); // close all error
// set html to excel format
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls_admin.xls"');


$query = "SELECT * FROM network_detail ORDER BY update_date ASC";
// echo "$query";

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
      padding-left: 5px;
    }
    </style>
  </HEAD>
  <BODY>
    <TABLE x:str BORDER="1" >
      <tr align="center">
        <th>รายงานประจำปี</th>
        <th>รายงานประจำเดือน</th>
        <th>user_id</th>
        <th>1.</th>
        <th>2.</th>
        <th>3.</th>
        <th>4.</th>
        <th>5.</th>
        <th>5 (ภาครัฐ)</th>
        <th>5 (ภาคเอกชน)</th>
        <th>6.</th>
        <th>7.1 (สนับสนุนด้วยการบริจาคเงินสด)</th>
        <th>7.1 (เอกสารอ้างอิง)</th>
        <th>7.1 (รายละเอียดการประเมิน)</th>
        <th>7.2 (วิทยากร)</th>
        <th>7.2 (ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง)</th>
        <th>7.2 (เครือข่ายภาครัฐ)</th>
        <th>7.2 (นศ.เข้าทำกิจกรรม)</th>
        <th>7.2 (นศ.ฝึกงาน)</th>
        <th>7.2 (การจัดกิจกรรมภายนอก)</th>
        <th>7.2 (อื่นๆ โปรดระบุ)</th>
        <th>7.2 (เอกสารอ้างอิง)</th>
        <th>7.2 (รายละเอียดการประเมิน)</th>
        <th>7.3 (วัสดุ-อุปกรณ์)</th>
        <th>7.3 (อาหารและเครื่องดื่ม)</th>
        <th>7.3 (ของรางวัล)</th>
        <th>7.3 (สถานที่)</th>
        <th>7.3 (พาหนะ)</th>
        <th>7.3 (การตรวจหาสารเสพติด)</th>
        <th>7.3 (วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี)</th>
        <th>7.3 (การบริการทางแพทย์)</th>
        <th>7.3 (เครื่องมืออปุกรณ์ทางการแพทย์)</th>
        <th>7.3 (อื่นๆโปรดระบุ)</th>
        <th>7.3 (เอกสารอ้างอิง)</th>
        <th>7.3 (รายละเอียดการประเมิน)</th>
        <th>7.4 (ที่อยู่อาศัย)</th>
        <th>7.4 (ครอบครัวอุปถัมภ์)</th>
        <th>7.4 (พ่อแม่อุปถัมภ์)</th>
        <th>7.4 (การจ้างงาน)</th>
        <th>7.4 (การค้ำประกันในการประกอบอาชีพ)</th>
        <th>7.4 (การรับเด็ก/เยาวชนเข้าฝึกงาน)</th>
        <th>7.4 (การรับเด็ก/เยาวชนเข้าศึกษาต่อ)</th>
        <th>7.4 (ให้ทุนการศึกษา)</th>
        <th>7.4 (ให้ทุนการประกอบอาชีพ)</th>
        <th>7.4 (อื่นๆโปรดระบุ)</th>
        <th>7.4 (เอกสารอ้างอิง)</th>
        <th>7.4 (รายละเอียดการประเมิน)</th>
        <th>7.5 (ติดตามเด็กและเยาวชนหลังได้รับการปล่อยตัว)</th>
        <th>7.5 (เอกสารอ้างอิง)</th>
        <th>7.5 (ติดตามเด็กและเยาวชนตาม ม.๘๖)</th>
        <th>7.5 (เอกสารอ้างอิง)</th>
        <th>8.</th>
        <th>9.</th>
        <th>10.</th>
        <th>11.</th>
        <th>12.1</th>
        <th>12.2</th>
        <th>13.</th>
        <th>14.</th>
      </tr>
      <!-- <TR> -->
      <?php
      while($row = mysqli_fetch_assoc($result)) {
      // echo "<br>";
      // echo "<br>";
      // echo "<br>";
      // echo "<br>";
      //   print_r($row);

        // choice 1,2,4
        $year = $row['year'];
        $month = $row['month'];
        $userid = $row['user_id'];
        $netname = $row['network_name'];
        $address = $row['address'];
        $date_ac = $row['date_activity'];
        // choice 3
        $history = $row['history'];
        if ($history == 1) {
          $history = "เคยมีการดำเนินงานร่วมกับหน่วยงานอื่นแล้ว";
        } elseif ($history == 2) {
          $history = "มีการประสานงานแล้วแต่ยังไม่มีการดำเนินงานร่วมกัน";
        } elseif ($history == 3) {
          $history = "ยังไม่เคยดำเนินงานร่วมกันมาก่อน";
        } else {
          $history = "";
        }
        // choice 5
        $nettype = unserialize($row['network_type']);
        $nettype_main = $nettype[0]==1?"ภาครัฐ":"ภาคเอกชน";
        $net_sub = $nettype[1];
        if ($nettype[0] == 1) {
          if ($net_sub[0] == 1) {
            $net_sub1 = "อปท";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 2) {
            $net_sub1 = "กพย";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 3) {
            $net_sub1 = "ยุติธรรมชุมชน";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 4) {
            $net_sub1 = "ยุติธรรมจังหวัด";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 5) {
            $net_sub1 = "กระทรวงศึกษาธิการ";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 6) {
            $net_sub1 = "กระทรวงแรงงาน";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 7) {
            $net_sub1 = "กระทรวงยุติธรรม";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 8) {
            $net_sub1 = "กระทรวงมหาดไทย(ไม่รวม อปท)";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 9) {
            $net_sub1 = "กระทรวงพัฒนาสังคมและความมั่นคงของมนุษย์";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 10) {
            $net_sub1 = "กระทรวงสาธารณสุข";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 11) {
            $net_sub1 = "หน่วยงานทางศาสนา";
            $net_sub2 = "-";
          } elseif ($net_sub[0] == 16) {
            $net_sub1 = "อื่นๆ โปรดระบุ : ".$nettype[2];
            $net_sub2 = "-";
          }
        } else {
          if ($net_sub[0] == 12) {
            $net_sub2 = "บุคคล";
            $net_sub1 = "-";
          } elseif ($net_sub[0] == 13) {
            $net_sub2 = "กรมการสงเคราะห์";
            $net_sub1 = "-";
          } elseif ($net_sub[0] == 14) {
            $net_sub2 = "สถานประกอบการณ์ฝห้างร้าน";
            $net_sub1 = "-";
          } elseif ($net_sub[0] == 15) {
            $net_sub2 = "มูลนิธิ องค์กรเอกชน(NGO)";
            $net_sub1 = "-";
          } elseif ($net_sub[0] == 17) {
            $net_sub2 = "อื่นๆ โปรดระบุ : ".$nettype[2];
            $net_sub1 = "-";
          }
        }
        // choice 6
        $netact_main = unserialize($row['network_activity']);
        foreach ($netact_main[0] as $value) {
          $query_netact = "SELECT activity_name as actname FROM network_activity where id='$value'";
          $result_netact = mysqli_query($conn, $query_netact);
          $row_netact = mysqli_fetch_assoc($result_netact);
          if (empty($net_act)) {
            $net_act = $row_netact['actname'];
            if ($value == 12) {
              $net_act .= " : ".$netact_main[1];
            }
          } else {
            $net_act .= ", ".$row_netact['actname'];
            if ($value == 12) {
              $net_act .= " : ".$netact_main[1];
            }
          }
        }
        // choice 7
        $valu = unserialize($row['valuation']);
        // print_r($valu);
        if (!empty($valu)) {
          foreach ($valu as $value_val) {
            if ($value_val[0] == 1) {
              $val_71 = "สนับสนุนด้วยการบริจาคเงินสด ".$value_val['amount']." บาท";
              foreach ($value_val['reference'] as $value_71) {
                $query_71 = "SELECT name FROM reference where id='$value_71'";
                $result_71 = mysqli_query($conn, $query_71);
                $row_71 = mysqli_fetch_assoc($result_71);
                // print_r($row_71);
                if (empty($ref_71)) {
                  $ref_71 = $row_71['name'];
                  if ($value_71 == 6) {
                    $ref_71 .= " : ".$value_val['other'];
                  }
                } else {
                  $ref_71 .= ", ".$row_71['name'];
                  if ($value_71 == 6) {
                    $ref_71 .= " : ".$value_val['other'];
                  }
                }
              }
              $detail_71 = " รายละเอียดการประเมิน : ".$value_val['evaluation_details'];
            } elseif ($value_val[0] == 2) {
              $pickup_72 = $value_val;

              $lec = (isset($value_val['lecturer']))?($value_val['lecturer']):'';
              $artist = (isset($value_val['artist']))?($value_val['artist']):'';
              $sdepart = (isset($value_val['supdepart']))?($value_val['supdepart']):'';
              $act = (isset($value_val['stu_act']))?($value_val['stu_act']):'';
              $aprt = (isset($value_val['stu_aprt']))?($value_val['stu_aprt']):'';
              $outact = (isset($value_val['out_act']))?($value_val['out_act']):'';
              $oth72 = (isset($value_val['other']))?($value_val['other']):'';
              $desc72 = $value_val['evaluation_details'];
              $ref72 = (isset($value_val['reference']))?($value_val['reference']):'';

              $lec_72 = $lec != ''?"วิทยากร จำนวน ".$lec['amount']." คน คิดเป็นมูลค่า ".$lec['value']." บาท ระยะเวลาในการดำเนินการ ".$lec['time']." ชม. จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม ".$lec['child_num']." ราย":'';
              $artist_72 = $artist != ''?"ศิลปิน ดารา นักแสดง ผู้มีชื่อเสียง (กรณีมาจัดแสดงเดี่ยวหรือเป็นหมู่คณะ)":'';
              $sdepart_72 = $sdepart != ''?"เครือข่ายภาครัฐที่เข้ามาสนับสนุนกิจกรรมของหน่วยงาน":'';
              $act_72 = $act != ''?"นศ.เข้าทำกิจกรรม จำนวน ".$act['amount']." คน ระยะเวลา ".$act['time']." วัน คิดเป็นมูลค่า ".$act['child_num']." บาท":'';

              if ($aprt != '') { $aprttime = $aprt['time']==1?"ระยะสั้น":"ภาคเรียน"; }
              $aprt_72 = $aprt != ''?"นศ.ฝึกงาน จำนวน ".$aprt['amount']." คน ระยะเวลาในการดำเนินการ ".$aprttime." คิดเป็นมูลค่า ".$aprt['child_num']." บาท":'';
              $outact_72 = $outact != ''?"การสนับสนุนในรูปแบบของการจัดกิจกรรมภายนอก จำนวน ".$outact['amount']." คน ระยะเวลา ".$outact['time']." วัน คิดเป็นมูลค่า ".$outact['child_num']." บาท":'';
              $oth_new72 = $oth72 != ''?"อื่นๆ โปรดระบุ ".$oth72['specify']." คิดเป็นมูลค่า ".$oth72['value']." บาท":'';

              foreach ($ref72 as $value_72) {
                $query_72 = "SELECT name FROM reference where id='$value_72'";
                $result_72 = mysqli_query($conn, $query_72);
                $row_72 = mysqli_fetch_assoc($result_72);

                if (strlen($ref_72) == 1) { $ref_72 = ""; }
                if (empty($ref_72)) {
                  $ref_72 = $row_72['name'];
                  if ($value_72 == 6) {
                    $ref_72 .= " : ".$value_val['other7_2'];
                  }
                } else {
                  $ref_72 .= ", ".$row_72['name'];
                  if ($value_72 == 6) {
                    $ref_72 .= " : ".$value_val['other7_2'];
                  }
                }
              }
              $detail_72 = " รายละเอียดการประเมิน : ".$desc72;
            } elseif ($value_val[0] == 3) {
              $pickup_73 = $value_val;

              $met = (isset($value_val['material']))?($value_val['material']):'';
              $food = (isset($value_val['food']))?($value_val['food']):'';
              $reward = (isset($value_val['rewards']))?($value_val['rewards']):'';
              $place = (isset($value_val['place']))?($value_val['place']):'';
              $veh = (isset($value_val['vehicle']))?($value_val['vehicle']):'';
              $sad = (isset($value_val['substance_abuse_detection']))?($value_val['substance_abuse_detection']):'';
              $bm = (isset($value_val['banned_materials']))?($value_val['banned_materials']):'';
              $ms = (isset($value_val['medical_services']))?($value_val['medical_services']):'';
              $obj_med = (isset($value_val['obj_medical']))?($value_val['obj_medical']):'';
              $oth73 = (isset($value_val['other']))?($value_val['other']):'';
              $desc73 = ($value_val['evaluation_details']);
              $ref73 = $value_val['reference'];

              $met_73 = $met != ''?"วัสดุ-อุปกรณ์ ได้แก่ ".$met['material_name']." จำนวน ".$met['amount']." ชิ้น/อัน คิดเป็นมูลค่า ".$met['value']." บาท":'';
              $food_73 = $food != ''?"อาหารและเครื่องดื่ม ได้แก่ ".$food['food_name']." จำนวนเด็กและเยาวชนที่ได้รับ ".$food['child_num']." คน จำนวนเจ้าหน้าที่ที่ได้รับ ".$food['officer_num']." คน คิดเป็นมูลค่า ".$food['value']." บาท":'';
              $reward_73 = $reward != ''?"ของรางวัล จำนวน ".$reward['amount']." ชิ้น คิดเป็นมูลค่า ".$reward['value']." บาท":'';
              $place_73 = $place != ''?"สถานที่ ระยะเวลาในการใช้สถานที่ ".$place['hour']." ชม. จำนวน ".$place['day']." วัน จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม และ/หรือ จำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$place['participants']." ราย คิดเป็นมูลค่า ".$place['value']." บาท":'';
              $veh_73 = $veh != ''?"พาหนะ จำนวน ".$veh['amount']." คัน คิดเป็นมูลค่า ".$veh['value1']." บาท จำนวนเด็ก/เยาวชนที่เข้าร่วมกิจกรรม และ/หรือ จำนวนเจ้าหน้าที่เข้าร่วมกิจกรรม ".$veh['participants']." ราย คิดเป็นมูลค่า ".$veh['value2']." บาท":'';
              $sad_73 = $sad != ''?"การตรวจหาสารเสพติด จำนวนเด็ก/เยาวชนที่ได้รับ ".$sad['child_num']." ราย คิดเป็นมูลค่า ".$sad['value']." บาท":'';
              $bm_73 = $bm != ''?"วัสดุหรือสิ่งของที่ระบุว่าห้ามจำหน่ายหรือให้แจกจ่ายฟรี จำนวน ".$bm['amount']." ชิ้น คิดเป็นมูลค่า ".$bm['value']." บาท":'';
              $ms_73 = $ms != ''?"การบริการทางแพทย์ จำนวนเด็ก/เยาวชนที่ได้รับ ".$ms['child_num']." ราย คิดเป็นมูลค่า ".$ms['value']." บาท":'';
              $obj_med_73 = $obj_med != ''?"การสนับสนุนเครื่องมืออปุกรณ์ทางการแพทย์ ได้แก่ ".$obj_med['object']." จำนวน ".$obj_med['child_num']." ชิ้น คิดเป็นมูลค่า ".$obj_med['value']." บาท":'';
              $oth_new73 = $oth73 != ''?"อื่นๆ โปรดระบุ ".$oth73['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth73['child_num']." ราย คิดเป็นมูลค่า ".$oth73['value']." บาท":'';

              foreach ($ref73 as $value_73) {
                $query_73 = "SELECT name FROM reference where id='$value_73'";
                $result_73 = mysqli_query($conn, $query_73);
                $row_73 = mysqli_fetch_assoc($result_73);

                if (strlen($ref_73) == 1) { $ref_73 = ""; }
                if (empty($ref_73)) {
                  $ref_73 = $row_73['name'];
                  if ($value_73 == 6) {
                    $ref_73 .= " : ".$value_val['other7_3'];
                  }
                } else {
                  $ref_73 .= ", ".$row_73['name'];
                  if ($value_73 == 6) {
                    $ref_73 .= " : ".$value_val['other7_3'];
                  }
                }
              }
              $detail_73 = " รายละเอียดการประเมิน : ".$desc73;
            } elseif ($value_val[0] == 4) {
              $pickup_74 = $value_val;

              $res = (isset($value_val['residence']))?($value_val['residence']):'';
              $ff = (isset($value_val['foster_family']))?($value_val['foster_family']):'';
              $fp = (isset($value_val['foster_parents']))?($value_val['foster_parents']):'';
              $emp = (isset($value_val['employment']))?($value_val['employment']):'';
              $grt = (isset($value_val['guarantee']))?($value_val['guarantee']):'';
              $appren = (isset($value_val['apprentice']))?($value_val['apprentice']):'';
              $admis = (isset($value_val['admission']))?($value_val['admission']):'';
              $scholar = (isset($value_val['scholarship']))?($value_val['scholarship']):'';
              $supcar = (isset($value_val['supcareer']))?($value_val['supcareer']):'';
              $oth74 = (isset($value_val['other']))?($value_val['other']):'';
              $desc74 = ($value_val['evaluation_details']);
              $ref74 = $value_val['reference'];

              $res_74 = $res != ''?"ที่อยู่อาศัย จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$res['child_num']." ราย คิดเป็นมูลค่า ".$res['value']." บาท":'';
              $ff_74 = $ff != ''?"ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$ff['child_num']." ราย คิดเป็นมูลค่า ".$ff['value']." บาท":'';
              $fp_74 = $fp != ''?"พ่อแม่อุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$fp['child_num']." ราย คิดเป็นมูลค่า ".$fp['value']." บาท":'';
              $emp_74 = $emp != ''?"ครอบครัวอุปถัมภ์ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$emp['child_num']." ราย คิดเป็นมูลค่า ".$emp['value']." บาท":'';
              $grt_74 = $grt != ''?"การค้ำประกันในการประกอบอาชีพของเด็ก/เยาวชน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$grt['child_num']." ราย คิดเป็นมูลค่า ".$grt['value']." บาท":'';

              if ($appren != '') { $apprentime = $appren['time']==1?"เดือนแรก":"หลังจากเดือนแรก"; }
              $appren_74 = $appren != ''?"การรับเด็ก/เยาวชนเข้าฝึกงาน จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$appren['child_num']." ราย เดือนที่รับเข้าทำงาน ".$apprentime." คิดเป็นมูลค่า ".$appren['value']." บาท":'';
              $admis_74 = $admis != ''?"การรับเด็ก/เยาวชนเข้าศึกษาต่อ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$admis['child_num']." ราย คิดเป็นมูลค่า ".$admis['value']." บาท":'';
              $scholar_74 = $scholar != ''?"ให้ทุนการศึกษา/สนับสนุนค่าใช้จ่ายในการศึกษา จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$scholar['child_num']." ราย คิดเป็นมูลค่า ".$scholar['value']." บาท":'';
              $supcar_74 = $supcar != ''?"ให้ทุนการประกอบอาชีพ จำนวนเด็ก/เยาวชนที่ได้รับการสงเคราะห์ ".$supcar['child_num']." ราย คิดเป็นมูลค่า ".$supcar['value']." บาท":'';
              $oth_new74 = $oth74 != ''?"อื่นๆ โปรดระบุ ".$oth74['other']." จำนวนเด็ก/เยาวชนที่ได้รับ ".$oth74['child_num']." ราย คิดเป็นมูลค่า ".$oth74['value']." บาท":'';

              foreach ($ref74 as $value_74) {
                $query_74 = "SELECT name FROM reference where id='$value_74'";
                $result_74 = mysqli_query($conn, $query_74);
                $row_74 = mysqli_fetch_assoc($result_74);

                if (strlen($ref_74) == 1) { $ref_74 = ""; }
                if (empty($ref_74)) {
                  $ref_74 = $row_74['name'];
                  if ($value_74 == 6) {
                    $ref_74 .= " : ".$value_val['other7_4'];
                  }
                } else {
                  $ref_74 .= ", ".$row_74['name'];
                  if ($value_74 == 6) {
                    $ref_74 .= " : ".$value_val['other7_4'];
                  }
                }
              }
              $detail_74 = " รายละเอียดการประเมิน : ".$desc74;
            } elseif ($value_val[0] == 5) {

              $release = (isset($value_val['release']))?($value_val['release']):'';
              $statute = (isset($value_val['statute']))?($value_val['statute']):'';
              $ref751 = $release!=''?$release['reference']:'';
              $ref752 = $statute!=''?$statute['reference']:'';
              if (!empty($release)) {
                $tr = (isset($release['center_name']))?($release['center_name']):'';
                $query_tr = "SELECT unit_sname FROM division WHERE unit_type='3' and unit_id='$tr' order by unit_sname";
                $tr_res = mysqli_query($cond,$query_tr);
                $tr_name = mysqli_fetch_assoc($tr_res);
              }

              if ($release != '') { $releasetime = $release['time']==1?"1 ครั้ง":"2 ครั้ง"; }
              $release_75 = $release != ''?"ติดตามเด็กและเยาวชนหลังได้รับการปล่อยตัวจาก ".$tr_name['unit_sname']." จำนวนเด็ก/เยาวชน ".$release['child_num']." ราย เดือนละ ".$releasetime." คิดเป็นมูลค่า ".$release['value']." บาท":'';
              if ($statute != '') {
                if ($statute['time'] == 1) {
                  $statutetime = "1 ครั้ง";
                } elseif ($statute['time'] == 2) {
                  $statutetime = "2 ครั้ง";
                } elseif ($statute['time'] == 3) {
                  $statutetime = "3 ครั้ง";
                }
              }
              $statute_75 = $statute != ''?"ติดตามเด็กและเยาวชนตาม ม.๘๖ จำนวนเด็ก/เยาวชน ".$statute['child_num']." ราย เดือนละ ".$statutetime." คิดเป็นมูลค่า ".$statute['value']." บาท":'';
              // ref 7-5-1
              if (!empty($ref751)) {
                foreach ($ref751 as $value_751) {
                  $query_751 = "SELECT name FROM reference where id='$value_751'";
                  $result_751 = mysqli_query($conn, $query_751);
                  $row_751 = mysqli_fetch_assoc($result_751);

                  if (strlen($ref_751) == 1) { $ref_751 = ""; }
                  if (empty($ref_751)) {
                    $ref_751 = $row_751['name'];
                    if ($value_751 == 6) {
                      $ref_751 .= " : ".$release['other7_5_1'];
                    }
                  } else {
                    $ref_751 .= ", ".$row_751['name'];
                    if ($value_751 == 6) {
                      $ref_751 .= " : ".$release['other7_5_1'];
                    }
                  }
                }
              }
              // ref 7-5-2
              if (!empty($ref752)) {
                foreach ($ref752 as $value_752) {
                  $query_752 = "SELECT name FROM reference where id='$value_752'";
                  $result_752 = mysqli_query($conn, $query_752);
                  $row_752 = mysqli_fetch_assoc($result_752);

                  if (strlen($ref_752) == 1) { $ref_752 = ""; }
                  if (empty($ref_752)) {
                    $ref_752 = $row_752['name'];
                    if ($value_752 == 6) {
                      $ref_752 .= " : ".$statute['other7_5_2'];
                    }
                  } else {
                    $ref_752 .= ", ".$row_752['name'];
                    if ($value_752 == 6) {
                      $ref_752 .= " : ".$statute['other7_5_2'];
                    }
                  }
                }
              }
            }
            // set value = "-" if cant find data
            // choice 1 in list7
            if (empty($val_71)) {
              $val_71 = "-";
              $ref_71 = "-";
              $detail_71 = "-";
            }
            // choice 2 in list7
            if (empty($lec_72)) { $lec_72 = "-"; }
            if (empty($artist_72)) { $artist_72 = "-"; }
            if (empty($sdepart_72)) { $sdepart_72 = "-"; }
            if (empty($act_72)) { $act_72 = "-"; }
            if (empty($aprt_72)) { $aprt_72 = "-"; }
            if (empty($outact_72)) { $outact_72 = "-"; }
            if (empty($oth_new72)) { $oth_new72 = "-"; }
            if (empty($pickup_72)) { $ref_72 = "-"; }
            if (empty($detail_72)) { $detail_72 = "-"; }
            //choice 3 in list7
            if (empty($met_73)) { $met_73 = "-"; }
            if (empty($food_73)) { $food_73 = "-"; }
            if (empty($reward_73)) { $reward_73 = "-"; }
            if (empty($place_73)) { $place_73 = "-"; }
            if (empty($veh_73)) { $veh_73 = "-"; }
            if (empty($sad_73)) { $sad_73 = "-"; }
            if (empty($bm_73)) { $bm_73 = "-"; }
            if (empty($ms_73)) { $ms_73 = "-"; }
            if (empty($obj_med_73)) { $obj_med_73 = "-"; }
            if (empty($oth_new73)) { $oth_new73 = "-"; }
            if (empty($pickup_73)) { $ref_73 = "-"; }
            if (empty($detail_73)) { $detail_73 = "-"; }
            //choice 4 in list7
            if (empty($res_74)) { $res_74 = "-"; }
            if (empty($ff_74)) { $ff_74 = "-"; }
            if (empty($fp_74)) { $fp_74 = "-"; }
            if (empty($emp_74)) { $emp_74 = "-"; }
            if (empty($grt_74)) { $grt_74 = "-"; }
            if (empty($appren_74)) { $appren_74 = "-"; }
            if (empty($admis_74)) { $admis_74 = "-"; }
            if (empty($scholar_74)) { $scholar_74 = "-"; }
            if (empty($supcar_74)) { $supcar_74 = "-"; }
            if (empty($oth_new74)) { $oth_new74 = "-"; }
            if (empty($pickup_74)) { $ref_74 = "-"; }
            if (empty($detail_74)) { $detail_74 = "-"; }
            //choice 5 in list7
            if (empty($release_75)) { $release_75 = "-"; }
            if (empty($statute_75)) { $statute_75 = "-"; }
            if (empty($ref_751)) { $ref_751 = "-"; }
            if (empty($ref_752)) { $ref_752 = "-"; }
          }
        } else {
          $val_71 = "-";
          $ref_71 = "-";
          $detail_71 = "-";
          $lec_72 = "-";
          $artist_72 = "-";
          $sdepart_72 = "-";
          $act_72 = "-";
          $aprt_72 = "-";
          $outact_72 = "-";
          $oth_new72 = "-";
          $ref_72 = "-";
          $detail_72 = "-";
          $met_73 = "-";
          $food_73 = "-";
          $reward_73 = "-";
          $place_73 = "-";
          $veh_73 = "-";
          $sad_73 = "-";
          $bm_73 = "-";
          $ms_73 = "-";
          $obj_med_73 = "-";
          $oth_new73 = "-";
          $ref_73 = "-";
          $detail_73 = "-";
          $res_74 = "-";
          $ff_74 = "-";
          $fp_74 = "-";
          $emp_74 = "-";
          $grt_74 = "-";
          $appren_74 = "-";
          $admis_74 = "-";
          $scholar_74 = "-";
          $supcar_74 = "-";
          $oth_new74 = "-";
          $ref_74 = "-";
          $detail_74 = "-";
          $release_75 = "-";
          $ref_751 = "-";
          $statute_75 = "-";
          $ref_752 = "-";
        }
        // choice 8
        $stajuv = unserialize($row['status_juvenile']);
        if (!empty($stajuv)) {
          foreach ($stajuv[0] as $value_sta) {
            $query_sta = "SELECT status_name FROM status_juvenile where id='$value_sta'";
            $result_sta = mysqli_query($conn, $query_sta);
            $row_sta = mysqli_fetch_assoc($result_sta);
            if (empty($stajuv_8)) {
              $stajuv_8 = $row_sta['status_name'];
              if ($value_sta == 8) {
                $stajuv_8 .= " : ".$stajuv[1];
              }
            } else {
              $stajuv_8 .= ", ".$row_sta['status_name'];
              if ($value_sta == 8) {
                $stajuv_8 .= " : ".$stajuv[1];
              }
            }
          }
        }
        // choice 9
        $prob = unserialize($row['problem']);
        if (!empty($prob)) {
          foreach ($prob[0] as $value_prob) {
            $query_prob = "SELECT problem_name FROM problem where id='$value_prob'";
            $result_prob = mysqli_query($conn, $query_prob);
            $row_prob = mysqli_fetch_assoc($result_prob);
            if (empty($prob_9)) {
              $prob_9 = $row_prob['problem_name'];
              if ($value_prob == 10) {
                $prob_9 .= " : ".$prob[1];
              }
            } else {
              $prob_9 .= ", ".$row_prob['problem_name'];
              if ($value_prob == 10) {
                $prob_9 .= " : ".$prob[1];
              }
            }
          }
        }
        // choice 10
        $net_desc = (isset($row['network_role_description']))?($row['network_role_description']):'-';
        // choice 11
        $record = (isset($row['recording_agreement']))?($row['recording_agreement']):'-';
        // choice 12
        $minis = unserialize($row['ministry']);
        if (!empty($minis)) {
          $mi_1 = $minis[0];
          $query_minis = "SELECT name FROM operation WHERE id='$mi_1'";
          $result_minis = mysqli_query($conn, $query_minis);
          $row_minis = mysqli_fetch_assoc($result_minis);
          $minis_12_1 = $row_minis['name'];

          $mi_2 = $minis[1];
          $query_minis2 = "SELECT name FROM operation WHERE id='$mi_2'";
          $result_minis2 = mysqli_query($conn, $query_minis2);
          $row_minis2 = mysqli_fetch_assoc($result_minis2);
          $minis_12_2 = $row_minis2['name'];
          if ($mi_2 == 36) {
            $minis_12_2 .= " : ".$minis[2];
          }
        } else {
          $minis_12_1 = "-";
          $minis_12_2 = "-";
        }
        // choice 13
        $insti = unserialize($row['institution']);
        if (!empty($insti)) {
          foreach ($insti as $value_ins) {
            if (!empty($insti_13)) {
              $insti_13 .= ", ".$value_ins;
            } else {
              $insti_13 = $value_ins;
            }
          }
        } else {
          $insti_13 = "-";
        }
        // choice 14
        $net_res = $row['network_result'];
        if (!empty($net_res)) {
          $query_net_res = "SELECT result_name FROM network_result WHERE id='$net_res'";
          $result_net_res = mysqli_query($conn, $query_net_res);
          $row_net_res = mysqli_fetch_assoc($result_net_res);
          $net_res_14 = $row_net_res['result_name'];
        } else {
          $net_res_14 = "-";
        }

        // echo for create table data
        // <td colspan="2" align="center"> -- colspan => merge cell // align => position
        echo '
        <tr>
          <td align="center">'.$year.'</td>
          <td align="center">'.$month.'</td>
          <td>'.$userid.'</td>
          <td>'.$netname.'</td>
          <td>'.$address.'</td>
          <td>'.$history.'</td>
          <td>'.$date_ac.'</td>
          <td>'.$nettype_main.'</td>
          <td>'.$net_sub1.'</td>
          <td>'.$net_sub2.'</td>
          <td>'.$net_act.'</td>
          <td>'.$val_71.'</td>
          <td>'.$ref_71.'</td>
          <td>'.$detail_71.'</td>
          <td>'.$lec_72.'</td>
          <td>'.$artist_72.'</td>
          <td>'.$sdepart_72.'</td>
          <td>'.$act_72.'</td>
          <td>'.$aprt_72.'</td>
          <td>'.$outact_72.'</td>
          <td>'.$oth_new72.'</td>
          <td>'.$ref_72.'</td>
          <td>'.$detail_72.'</td>
          <td>'.$met_73.'</td>
          <td>'.$food_73.'</td>
          <td>'.$reward_73.'</td>
          <td>'.$place_73.'</td>
          <td>'.$veh_73.'</td>
          <td>'.$sad_73.'</td>
          <td>'.$bm_73.'</td>
          <td>'.$ms_73.'</td>
          <td>'.$obj_med_73.'</td>
          <td>'.$oth_new73.'</td>
          <td>'.$ref_73.'</td>
          <td>'.$detail_73.'</td>
          <td>'.$res_74.'</td>
          <td>'.$ff_74.'</td>
          <td>'.$fp_74.'</td>
          <td>'.$emp_74.'</td>
          <td>'.$grt_74.'</td>
          <td>'.$appren_74.'</td>
          <td>'.$admis_74.'</td>
          <td>'.$scholar_74.'</td>
          <td>'.$supcar_74.'</td>
          <td>'.$oth_new74.'</td>
          <td>'.$ref_74.'</td>
          <td>'.$detail_74.'</td>
          <td>'.$release_75.'</td>
          <td>'.$ref_751.'</td>
          <td>'.$statute_75.'</td>
          <td>'.$ref_752.'</td>
          <td>'.$stajuv_8.'</td>
          <td>'.$prob_9.'</td>
          <td>'.$net_desc.'</td>
          <td>'.$record.'</td>
          <td>'.$minis_12_1.'</td>
          <td>'.$minis_12_2.'</td>
          <td>'.$insti_13.'</td>
          <td>'.$net_res_14.'</td>
        </tr>
        ';

        // <td align="right">'.floatInt($sum).'</td>
        // restart variable
        $i = 0;
        $j = 0;
        $net_sub1 = "";
        $net_sub2 = "";
        $net_act = "";
        // reset 7-1
        $val_71 = "";
        $ref_71 = "";
        // reset 7-2
        $pickup_72 = "";
        $lec_72 = "";
        $artist_72 = "";
        $sdepart_72 = "";
        $act_72 = "";
        $aprt_72 = "";
        $sdepart_72 = "";
        $oth_new72 = "";
        $ref_72 = "";
        $detail_72 = "";
        // reset 7-3
        $pickup_73 = "";
        $met_73 = "";
        $food_73 = "";
        $reward_73 = "";
        $place_73 = "";
        $veh_73 = "";
        $sad_73 = "";
        $bm_73 = "";
        $ms_73 = "";
        $obj_med_73 = "";
        $oth_new73 = "";
        $ref_73 = "";
        $detail_73 = "";
        // reset 7-4
        $pickup_74 = "";
        $res_74 = "";
        $ff_74 = "";
        $fp_74 = "";
        $emp_74 = "";
        $grt_74 = "";
        $appren_74 = "";
        $admis_74 = "";
        $scholar_74 = "";
        $supcar_74 = "";
        $oth_new74 = "";
        $ref_74 = "";
        $detail_74 = "";
        // reset 7-5
        $release_75 = "";
        $ref_751 = "";
        $statute_75 = "";
        $ref_752 = "";
        // reset 8
        $stajuv_8 = "";
        // reset 9
        $prob_9 = "";
        // reset 10
        $net_desc = "";
        // reset 11
        $record = "";
        // reset 12
        $minis_12_1 = "";
        $minis_12_2 = "";
        // reset 13
        $insti_13 = "";
        // reset 14
        $net_res_14 = "";
      }
      ?>
  </TABLE>
</BODY>
</HTML>
