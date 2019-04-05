<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
// error_reporting(0); // close all error
// set html to excel format
// header("Content-Type: application/vnd.ms-excel");
// header('Content-Disposition: attachment; filename="MyXls.xls"');


$query = "SELECT * FROM network_detail ORDER BY update_date ASC";
echo "$query";

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
        <th>5(ภาครัฐ)</th>
        <th>5(ภาคเอกชน)</th>
        <th>6.</th>
        <th>7.1</th>
        <th>7.2</th>
        <th>7.3</th>
        <th>7.4</th>
        <th>7.5</th>
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

        $year = $row['year'];
        $month = $row['month'];
        $userid = $row['user_id'];
        $netname = $row['network_name'];
        $address = $row['address'];
        $date_ac = $row['date_activity'];

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

        $valu = unserialize($row['valuation']);
        // print_r($valu);
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
            $val_71 .= " โดยมีเอกสารอ้างอิงได้แก่ ".$ref_71;
            $val_71 .= " รายละเอียดการประเมิน : ".$value_val['evaluation_details'];
          } elseif ($value_val[0] == 2) {
            print_r($value_val);

          }






          if (empty($val_71)) {
            $val_71 = "-";
          }
          if (empty($val_72)) {
            $val_72 = "-";
          }
          if (empty($val_73)) {
            $val_73 = "-";
          }
          if (empty($val_74)) {
            $val_74 = "-";
          }
          if (empty($val_75)) {
            $val_75 = "-";
          }
        }

        echo "<br>";
        echo "<br>";
        echo "<br>";

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
        </tr>
        ';
        // print_r(floatInt($sum));

        // <td align="right">'.floatInt($sum).'</td>
        // restart variable
        $i = 0;
        $j = 0;
        $net_sub1 = "";
        $net_sub2 = "";
        $net_act = "";
        $val_71 = "";
        $ref_71 = "";
      }
      ?>
  </TABLE>
</BODY>
</HTML>
