<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');

//Choice 7
$sup = (isset($_POST["sup"]))?$_POST["sup"]:'';
// print_r($sup);
if(!empty($sup)){
  $supnum = count($sup);
}
else{
  echo "";
}
// 7.1
$amount = (isset($_POST["amount"]))?$_POST["amount"]:'';
$ref7_1 = (isset($_POST["ref7_1"]))?$_POST["ref7_1"]:'';
$oth7_1 = (isset($_POST["other7_1"]))?$_POST["other7_1"]:'';
$val_detail7_1 = (isset($_POST["val_detail7_1"]))?$_POST["val_detail7_1"]:'';

//7.2
$txt7_2_01 = (isset($_POST["txt7_2_01"]))?$_POST["txt7_2_01"]:'';
$txt7_2_1 = (isset($_POST["txt7_2_1"]))?$_POST["txt7_2_1"]:'';
$txt7_2_2 = (isset($_POST["txt7_2_2"]))?$_POST["txt7_2_2"]:'';
$txt7_2_3 = (isset($_POST["txt7_2_3"]))?$_POST["txt7_2_3"]:'';
$txt7_2_4 = (isset($_POST["txt7_2_4"]))?$_POST["txt7_2_4"]:'';
$ref7_2 = (isset($_POST["ref7_2"]))?$_POST["ref7_2"]:'';
$oth7_2 = (isset($_POST["oth7_2"]))?$_POST["oth7_2"]:'';
$val_detail7_2 = (isset($_POST["val_detail7_2"]))?$_POST["val_detail7_2"]:'';


// 7.3
$txt7_3_01 = (isset($_POST["txt7_3_01"]))?$_POST["txt7_3_01"]:'';
$txt7_3_02 = (isset($_POST["txt7_3_02"]))?$_POST["txt7_3_02"]:'';
$txt7_3_1 = (isset($_POST["txt7_3_1"]))?$_POST["txt7_3_1"]:'';
$txt7_3_2 = (isset($_POST["txt7_3_2"]))?$_POST["txt7_3_2"]:'';
$txt7_3_3 = (isset($_POST["txt7_3_3"]))?$_POST["txt7_3_3"]:'';
$txt7_3_4 = (isset($_POST["txt7_3_4"]))?$_POST["txt7_3_4"]:'';
$txt7_3_5 = (isset($_POST["txt7_3_5"]))?$_POST["txt7_3_5"]:'';
$txt7_3_6 = (isset($_POST["txt7_3_6"]))?$_POST["txt7_3_6"]:'';
$txt7_3_7 = (isset($_POST["txt7_3_7"]))?$_POST["txt7_3_7"]:'';
$txt7_3_8 = (isset($_POST["txt7_3_8"]))?$_POST["txt7_3_8"]:'';
$ref7_3 = (isset($_POST["ref7_3"]))?$_POST["ref7_3"]:'';
$oth7_3 = (isset($_POST["oth7_3"]))?$_POST["oth7_3"]:'';
$val_detail7_3 = (isset($_POST["val_detail7_3"]))?$_POST["val_detail7_3"]:'';

//7.4
$txt7_4_01 = (isset($_POST["txt7_4_01"]))?$_POST["txt7_4_01"]:'';
$txt7_4_1 = (isset($_POST["txt7_4_1"]))?$_POST["txt7_4_1"]:'';
// $txt7_4_2 = (isset($_POST["txt7_4_2"]))?$_POST["txt7_4_2"]:'';
$txt7_4_3 = (isset($_POST["txt7_4_3"]))?$_POST["txt7_4_3"]:'';
$txt7_4_4 = (isset($_POST["txt7_4_4"]))?$_POST["txt7_4_4"]:'';
$txt7_4_5 = (isset($_POST["txt7_4_5"]))?$_POST["txt7_4_5"]:'';
$txt7_4_6 = (isset($_POST["txt7_4_6"]))?$_POST["txt7_4_6"]:'';
$txt7_4_7 = (isset($_POST["txt7_4_7"]))?$_POST["txt7_4_7"]:'';
$txt7_4_8 = (isset($_POST["txt7_4_8"]))?$_POST["txt7_4_8"]:'';
// $txt7_4_9 = (isset($_POST["txt7_4_9"]))?$_POST["txt7_4_9"]:'';
$txt7_4_10 = (isset($_POST["txt7_4_10"]))?$_POST["txt7_4_10"]:'';
$txt7_4_11 = (isset($_POST["txt7_4_11"]))?$_POST["txt7_4_11"]:'';
$ref7_4 = (isset($_POST["ref7_4"]))?$_POST["ref7_4"]:'';
$oth7_4 = (isset($_POST["oth7_4"]))?$_POST["oth7_4"]:'';
$val_detail7_4 = (isset($_POST["val_detail7_4"]))?$_POST["val_detail7_4"]:'';

// 7.5
$txt7_5_1 = (isset($_POST["txt7_5_1"]))?$_POST["txt7_5_1"]:'';
$txt7_5_2 = (isset($_POST["txt7_5_2"]))?$_POST["txt7_5_2"]:'';
$ref7_5_1 = (isset($_POST["ref7_5_1"]))?$_POST["ref7_5_1"]:'';
$ref7_5_2 = (isset($_POST["ref7_5_2"]))?$_POST["ref7_5_2"]:'';
$oth7_5_1 = (isset($_POST["oth7_5_1"]))?$_POST["oth7_5_1"]:'';
$oth7_5_2 = (isset($_POST["oth7_5_2"]))?$_POST["oth7_5_2"]:'';

//choice 8
$status =(isset($_POST["sta"]))? $_POST["sta"]:'';
$other8=(isset( $_POST["other8"]))? $_POST["other8"]:'';
$status_arr= array($status,$other8);
$status_srl= serialize($status_arr);

//choice 9
$condition=(isset( $_POST["cond"]))? $_POST["cond"]:'';
$other9=(isset( $_POST["other9"]))? $_POST["other9"]:'';
$condition_arr= array($condition,$other9);
$condition_srl=serialize($condition_arr);

// check null choice 7-9
$oph2 = (isset( $_POST["oph2"]))? $_POST["oph2"]:'';
// echo "$oph2";
if (empty($oph2)) {
  if (empty($sup)) {
    echo "<script type='text/javascript'>alert('กรุณาใส่ รูปแบบการสนับสนุนของเครือข่าย(7) '); javascript:history.go(-1);</script>";
  } elseif (empty($status)) {
    echo "<script type='text/javascript'>alert('กรุณาใส่ สถานะของเด็กและเยาวชนที่เครือข่ายสนับสนุนอย่างน้อย 1 ข้อ(8) '); javascript:history.go(-1);</script>";
  } elseif (empty($condition)) {
    echo "<script type='text/javascript'>alert('กรุณาใส่ สภาพปัญหาพิเศษของเด็กและเยาวชนอย่างน้อย 1 ข้อ(9) '); javascript:history.go(-1);</script>";
  } elseif (!empty($sup)) {
    foreach ($sup as $value) {
      if ($value == 1) {
        if (empty($ref7_1)) {
          $nullref7_1 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.1) '); javascript:history.go(-1);</script>";
        }
      } elseif ($value == 2) {
        $sup7_2 = (isset($_POST["7_2"]))?$_POST["7_2"]:'';
        if(!empty($sup7_2)) {
          $sup7_2num = count($sup7_2);
          if (empty($ref7_2)) {
            $nullref7_2 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.2) '); javascript:history.go(-1);</script>";
          }
        } else {
          $null7_2 = "<script type='text/javascript'>alert('กรุณาใส่ รายละเอียดอย่างน้อย 1 ข้อ(7.2) '); javascript:history.go(-1);</script>";
        }
      } elseif ($value == 3) {
        $sup7_3 = (isset($_POST["7_3"]))?$_POST["7_3"]:'';
        if(!empty($sup7_3)){
          $sup7_3num = count($sup7_3);
          if (empty($ref7_3)) {
            $nullref7_3 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.3) '); javascript:history.go(-1);</script>";
          }
        } else{
          $null7_3 = "<script type='text/javascript'>alert('กรุณาใส่ รายละเอียดอย่างน้อย 1 ข้อ(7.3) '); javascript:history.go(-1);</script>";
        }
      } elseif ($value == 4) {
        $sup7_4 = (isset($_POST["7_4"]))?$_POST["7_4"]:'';
        if(!empty($sup7_4)){
          $sup7_4num = count($sup7_4);
          if (empty($ref7_4)) {
            $nullref7_4 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.4) '); javascript:history.go(-1);</script>";
          }
        }
        else{
          $null7_4 = "<script type='text/javascript'>alert('กรุณาใส่ รายละเอียดอย่างน้อย 1 ข้อ(7.4) '); javascript:history.go(-1);</script>";
        }
      } elseif ($value == 5) {
        $sup7_5 = (isset($_POST["7_5"]))?$_POST["7_5"]:'';
        if(!empty($sup7_5)){
          $sup7_5num = count($sup7_5);
          // print_r($sup7_5);
          foreach ($sup7_5 as $value75) {
            if ($value75 == "release") {
              if (empty($ref7_5_1)) {
                $nullref7_5_1 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.5) '); javascript:history.go(-1);</script>";
              }
            } elseif ($value75 == "statute") {
              if (empty($ref7_5_2)) {
                $nullref7_5_2 = "<script type='text/javascript'>alert('กรุณาใส่ เอกสารอ้างอิง(7.5) '); javascript:history.go(-1);</script>";
              }
            }
          }
        } else {
          $null7_5 = "<script type='text/javascript'>alert('กรุณาใส่ รายละเอียดอย่างน้อย 1 ข้อ(7.5) '); javascript:history.go(-1);</script>";
        }
      }
    }
  }
} else {
  if (empty($status)) {
    echo "<script type='text/javascript'>alert('กรุณาใส่ สถานะของเด็กและเยาวชนที่เครือข่ายสนับสนุนอย่างน้อย 1 ข้อ(8) '); javascript:history.go(-1);</script>";
  } elseif (empty($condition)) {
    echo "<script type='text/javascript'>alert('กรุณาใส่ สภาพปัญหาพิเศษของเด็กและเยาวชนอย่างน้อย 1 ข้อ(9) '); javascript:history.go(-1);</script>";
  }
}




// add choice 7 to array
if(!empty($supnum)){
  for($i=0;$i<$supnum;$i++)
  {
    ${'arr'.$i}=array($sup[$i]);
  }
  // echo "Subnum = ".$supnum;
  //
  // echo "<br/>";
  // echo "<br/>";

  $new_7 =array();
  for($j=0;$j<$supnum;$j++)
  {
    //7.1
    if(${'arr'.$j}[0]=='1')
    {
      ${'arr'.$j}["amount"]=$amount;
      ${'arr'.$j}["reference"]=$ref7_1;
      ${'arr'.$j}["other"]=$oth7_1;
      ${'arr'.$j}["evaluation_details"]=$val_detail7_1;
    }
    //7.2
    else if (${'arr'.$j}[0]=='2')
    {
      // echo "จำนวนที่ติ๊ก".$sup7_2num;
      // echo "<br/>";
      if (!empty($sup7_2num)) {
        for($n=0;$n<$sup7_2num;$n++)
        {
          ${'arr'.$j}[$sup7_2[$n]]=array();
        }
      }
      if(array_key_exists('lecturer',${'arr'.$j})){
        ${'arr'.$j}['lecturer']["amount"]=$txt7_2_1[0];
        ${'arr'.$j}['lecturer']["value"]=$txt7_2_1[1];
        ${'arr'.$j}['lecturer']["time"]=$txt7_2_1[2];
        ${'arr'.$j}['lecturer']["child_num"]=$txt7_2_1[3];
      }
      if(array_key_exists('stu_act',${'arr'.$j})){
        ${'arr'.$j}['stu_act']["amount"]=$txt7_2_2[0];
        ${'arr'.$j}['stu_act']["time"]=$txt7_2_2[1];
        ${'arr'.$j}['stu_act']["child_num"]=$txt7_2_2[2];
      }
      if(array_key_exists('stu_aprt',${'arr'.$j})){
        ${'arr'.$j}['stu_aprt']["amount"]=$txt7_2_3[0];
        ${'arr'.$j}['stu_aprt']["time"]=$txt7_2_3[1];
        ${'arr'.$j}['stu_aprt']["child_num"]=$txt7_2_3[2];
      }
      if(array_key_exists('out_act',${'arr'.$j})){
        ${'arr'.$j}['out_act']["amount"]=$txt7_2_01[0];
        ${'arr'.$j}['out_act']["time"]=$txt7_2_01[1];
        ${'arr'.$j}['out_act']["child_num"]=$txt7_2_01[2];
      }
      if(array_key_exists('other',${'arr'.$j})){
        ${'arr'.$j}['other']["specify"]=$txt7_2_4[0];
        ${'arr'.$j}['other']["value"]=$txt7_2_4[1];
      }
      ${'arr'.$j}['reference']=$ref7_2;
      ${'arr'.$j}['other7_2']=$oth7_2;
      ${'arr'.$j}["evaluation_details"]=$val_detail7_2;
    }
    //7.3
    else if (${'arr'.$j}[0]=='3')
    {
      if (!empty($sup7_3num)) {
        for($n=0;$n<$sup7_3num;$n++)
        {
          ${'arr'.$j}[$sup7_3[$n]]=array();
        }
      }
      if(array_key_exists('material',${'arr'.$j})){
        ${'arr'.$j}['material']["material_name"]=$txt7_3_1[0];
        ${'arr'.$j}['material']["amount"]=$txt7_3_1[1];
        ${'arr'.$j}['material']["value"]=$txt7_3_1[2];

      }
      if(array_key_exists('food',${'arr'.$j})){
        ${'arr'.$j}['food']["food_name"]=$txt7_3_2[0];
        ${'arr'.$j}['food']["child_num"]=$txt7_3_2[1];
        ${'arr'.$j}['food']["officer_num"]=$txt7_3_2[2];
        ${'arr'.$j}['food']["value"]=$txt7_3_2[3];

      }
      if(array_key_exists('rewards',${'arr'.$j})){
        ${'arr'.$j}['rewards']["amount"]=$txt7_3_3[0];
        ${'arr'.$j}['rewards']["value"]=$txt7_3_3[1];
      }
      if(array_key_exists('place',${'arr'.$j})){
        ${'arr'.$j}['place']["hour"]=$txt7_3_4[0];
        ${'arr'.$j}['place']["day"]=$txt7_3_4[1];
        ${'arr'.$j}['place']["participants"]=$txt7_3_4[2];
        ${'arr'.$j}['place']["value"]=$txt7_3_4[3];

      }
      if(array_key_exists('vehicle',${'arr'.$j})){
        ${'arr'.$j}['vehicle']["amount"]=$txt7_3_5[0];
        ${'arr'.$j}['vehicle']["value1"]=$txt7_3_5[1];
        ${'arr'.$j}['vehicle']["participants"]=$txt7_3_5[2];
        ${'arr'.$j}['vehicle']["value2"]=$txt7_3_5[3];

      }
      if(array_key_exists('substance_abuse_detection',${'arr'.$j})){
        ${'arr'.$j}['substance_abuse_detection']["child_num"]=$txt7_3_6[0];
        ${'arr'.$j}['substance_abuse_detection']["value"]=$txt7_3_6[1];
      }
      if(array_key_exists('banned_materials',${'arr'.$j})){
        ${'arr'.$j}['banned_materials']["amount"]=$txt7_3_7[0];
        ${'arr'.$j}['banned_materials']["value"]=$txt7_3_7[1];
      }
      if(array_key_exists('medical_services',${'arr'.$j})){
        ${'arr'.$j}['medical_services']["child_num"]=$txt7_3_01[0];
        ${'arr'.$j}['medical_services']["value"]=$txt7_3_01[1];
      }
      if(array_key_exists('obj_medical',${'arr'.$j})){
        ${'arr'.$j}['obj_medical']["object"]=$txt7_3_02[0];
        ${'arr'.$j}['obj_medical']["child_num"]=$txt7_3_02[1];
        ${'arr'.$j}['obj_medical']["value"]=$txt7_3_02[2];
      }
      if(array_key_exists('other',${'arr'.$j})){
        ${'arr'.$j}['other']["other"]=$txt7_3_8[0];
        ${'arr'.$j}['other']["child_num"]=$txt7_3_8[1];
        ${'arr'.$j}['other']["value"]=$txt7_3_8[2];
      }
      ${'arr'.$j}['reference']=$ref7_3;
      ${'arr'.$j}['other7_3']=$oth7_3;
      ${'arr'.$j}["evaluation_details"]=$val_detail7_3;
    }
    //7.4
    else if (${'arr'.$j}[0]=='4')
    {
      if (!empty($sup7_4num)) {
        for($n=0;$n<$sup7_4num;$n++)
        {
          ${'arr'.$j}[$sup7_4[$n]]=array();
        }
      }
      if(array_key_exists('residence',${'arr'.$j})){
        ${'arr'.$j}['residence']["child_num"]=$txt7_4_1[0];
        ${'arr'.$j}['residence']["value"]=$txt7_4_1[1];
      }
      // if(array_key_exists('medical_services',${'arr'.$j})){
      //   ${'arr'.$j}['medical_services']["child_num"]=$txt7_4_2[0];
      //   ${'arr'.$j}['medical_services']["value"]=$txt7_4_2[1];
      // }
      if(array_key_exists('foster_family',${'arr'.$j})){
        ${'arr'.$j}['foster_family']["child_num"]=$txt7_4_3[0];
        ${'arr'.$j}['foster_family']["value"]=$txt7_4_3[1];
      }
      if(array_key_exists('foster_parents',${'arr'.$j})){
        ${'arr'.$j}['foster_parents']["child_num"]=$txt7_4_4[0];
        ${'arr'.$j}['foster_parents']["value"]=$txt7_4_4[1];
      }
      if(array_key_exists('employment',${'arr'.$j})){
        ${'arr'.$j}['employment']["child_num"]=$txt7_4_5[0];
        ${'arr'.$j}['employment']["value"]=$txt7_4_5[1];
      }
      if(array_key_exists('guarantee',${'arr'.$j})){
        ${'arr'.$j}['guarantee']["child_num"]=$txt7_4_6[0];
        ${'arr'.$j}['guarantee']["value"]=$txt7_4_6[1];
      }
      if(array_key_exists('apprentice',${'arr'.$j})){
        ${'arr'.$j}['apprentice']["child_num"]=$txt7_4_7[0];
        ${'arr'.$j}['apprentice']["time"]=$txt7_4_7[1];
        ${'arr'.$j}['apprentice']["value"]=$txt7_4_7[2];
      }
      if(array_key_exists('admission',${'arr'.$j})){
        ${'arr'.$j}['admission']["child_num"]=$txt7_4_8[0];
        ${'arr'.$j}['admission']["value"]=$txt7_4_8[1];
      }
      // if(array_key_exists('coordinate_study',${'arr'.$j})){
      //   ${'arr'.$j}['coordinate_study']["child_num"]=$txt7_4_9[0];
      //   ${'arr'.$j}['coordinate_study']["value"]=$txt7_4_9[1];
      // }
      if(array_key_exists('scholarship',${'arr'.$j})){
        ${'arr'.$j}['scholarship']["child_num"]=$txt7_4_10[0];
        ${'arr'.$j}['scholarship']["value"]=$txt7_4_10[1];
      }
      if(array_key_exists('supcareer',${'arr'.$j})){
        ${'arr'.$j}['supcareer']["child_num"]=$txt7_4_01[0];
        ${'arr'.$j}['supcareer']["value"]=$txt7_4_01[1];
      }
      if(array_key_exists('other',${'arr'.$j})){
        ${'arr'.$j}['other']["other"]=$txt7_4_11[0];
        ${'arr'.$j}['other']["child_num"]=$txt7_4_11[1];
        ${'arr'.$j}['other']["value"]=$txt7_4_11[2];
      }
      ${'arr'.$j}['reference']=$ref7_4;
      ${'arr'.$j}['other7_4']=$oth7_4;
      ${'arr'.$j}["evaluation_details"]=$val_detail7_4;
    }
    //7.5
    else if (${'arr'.$j}[0]=='5')
    {
      if (!empty($sup7_5num)) {
        for($n=0;$n<$sup7_5num;$n++)
        {
          ${'arr'.$j}[$sup7_5[$n]]=array();
        }
      }
      if(array_key_exists('release',${'arr'.$j})){
        ${'arr'.$j}['release']["center_name"]=$txt7_5_1[0];
        ${'arr'.$j}['release']["child_num"]=$txt7_5_1[1];
        ${'arr'.$j}['release']["time"]=$txt7_5_1[2];
        ${'arr'.$j}['release']["value"]=$txt7_5_1[3];
        ${'arr'.$j}['release']['reference']=$ref7_5_1;
        ${'arr'.$j}['release']['other7_5_1']=$oth7_5_1;

      }

      if(array_key_exists('statute',${'arr'.$j})){
        ${'arr'.$j}['statute']["child_num"]=$txt7_5_2[0];
        ${'arr'.$j}['statute']["time"]=$txt7_5_2[1];
        ${'arr'.$j}['statute']["value"]=$txt7_5_2[2];
        ${'arr'.$j}['statute']['reference']=$ref7_5_2;
        ${'arr'.$j}['statute']['other7_5_2']=$oth7_5_2;
      }
    }

    array_push($new_7,${'arr'.$j});
    echo "<br/>";
  }

  $new_7_srl = serialize($new_7);
}
// print_r($new_7);
// echo "<br>";
// print_r($new_7_srl);

//choice 10
$description=(isset( $_POST["description"]))? $_POST["description"]:'';
//print($description);

//choice 11
$record = (isset( $_POST["record"]))? $_POST["record"]:'';

//File Variables
$file = (isset($_FILES['file']))?$_FILES['file']:'';
$name = (isset($_FILES['file']['name']))?$_FILES['file']['name']:'';
$tempName = (isset($_FILES['file']['tmp_name']))?$_FILES['file']['tmp_name']:'';
$size = (isset($_FILES['file']['size']))?$_FILES['file']['size']:'';
$error = (isset($_FILES['file']['error']))?$_FILES['file']['error']:'';
$type = (isset($_FILES['file']['type']))?$_FILES['file']['type']:'';
$ext = explode('.',$name);
$actualext= strtolower(end($ext));
$allowed= array('pdf','zip');
// print_r($file);
// echo "===$tempName";
//old data
$user_id = $_POST['user_id'];
$net_name_O = $_POST['n_name'];
$net_name_C = $_POST['network_name'];
$filenamedb = $_POST['filenameget'];
$u_date = date("Y-m-d H:i:s");
//Update data

$sql_se = "SELECT * FROM network_detail WHERE user_id=$user_id and ";
if (empty($net_name_O)) {
  $sql_se .= " network_name=\"$net_name_C\"";
} else {
  $sql_se .= " network_name=\"$net_name_O\"";
}
$res = mysqli_query($conn,$sql_se) or die(mysqli_error());
$countq = mysqli_num_rows($res);


// check condition not equal history 2
if (empty($oph2)) {
  if (!empty($sup) && !empty($status) && !empty($condition)) {
    $countCheck = count($sup);
    if ($countCheck >= 1) {
      // check variable not empty == null
      foreach ($sup as $key => $val) {
        switch ($val) {
          case 1 :
          if (!empty($nullref7_1)) {
            echo $nullref7_1;
          }
          break ;
          case 2 :
          if (!empty($null7_2)) {
            echo $null7_2;
          } else {
            if (!empty($nullref7_2)) {
              echo $nullref7_2;
            }
          }
          break ;
          case 3 :
          if (!empty($null7_3)) {
            echo $null7_3;
          } else {
            if (!empty($nullref7_3)) {
              echo $nullref7_3;
            }
          }
          break ;
          case 4 :
          if (!empty($null7_4)) {
            echo $null7_4;
          } else {
            if (!empty($nullref7_4)) {
              echo $nullref7_4;
            }
          }
          break ;
          case 5 :
          if (!empty($null7_5)) {
            echo $null7_5;
          } else {
            if (!empty($nullref7_5_1)) {
              echo $nullref7_5_1;
            } elseif (!empty($nullref7_5_2)) {
              echo $nullref7_5_2;
            }
          }
          break ;
        }
      }


      if (empty($nullref7_1) && empty($null7_2) && empty($null7_3) && empty($null7_4) && empty($null7_5)) {
        if (empty($nullref7_1) && empty($nullref7_2) && empty($nullref7_3) && empty($nullref7_4) && empty($nullref7_5_1) && empty($nullref7_5_2)) {
          if(!empty($file))
          {
            if(in_array($actualext,$allowed))
            {
              if ($error === 0) {

                if($size < 50000000)
                {
                  $newname = $ext[0].date('Y').".".$actualext;
                  $sql_getid = "SELECT * FROM network_detail WHERE recording_agreement='$newname'";
                  $check_uniqe_directory = mysqli_query($conn,$sql_getid) or die(mysqli_error());
                  $count = mysqli_num_rows($check_uniqe_directory);

                  if($count==0){
                    $newname = $ext[0].date('Y').".".$actualext;
                  }else if ($count!=0){
                    $extend_name = mt_rand(0,9);
                    $newname = $ext[0].date('Y')."_".$extend_name.".".$actualext;
                  }
                  $fileDestination = 'file-upload/'.$newname;
                  if ($countq>0) {
                    move_uploaded_file($tempName,$fileDestination);
                    $sql =" UPDATE network_detail
                    set recording_agreement ='$newname',
                    valuation ='$new_7_srl',
                    status_juvenile ='$status_srl',
                    problem = '$condition_srl',
                    network_role_description ='$description',
                    update_date = '$u_date' ";
                    if (!empty($net_name_O)) {
                      $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_O'";
                    } else {
                      $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_C'";
                    }
                  } else {
                    echo "<script type='text/javascript'>alert('Error can't find network name!');javascript:history.go(-1);</script>";//Error can not save data!
                  }
                } else {
                  echo "<script type='text/javascript'>alert('Error!! File size is too large');javascript:history.go(-1);</script>";//Error!! File size is too large
                }
              } else {
                echo "<script type='text/javascript'>alert('Error in uploading the file');javascript:history.go(-1);</script>";//Error in uploading the file
              }
            } else {
              echo "<script type='text/javascript'>alert('Error!! File Extention not Correct');javascript:history.go(-1);</script>";//Error!! File Extention not Correct
            }
          } else {
            if ($countq>0) {
              $sql =" UPDATE network_detail
              set ";
              if (empty($filenamedb)) {
                $sql .= "recording_agreement = null, ";
              } else {
                $sql .= "recording_agreement = '$filenamedb', ";
              }
              $sql .= "valuation ='$new_7_srl',
              status_juvenile ='$status_srl',
              problem = '$condition_srl',
              network_role_description ='$description',
              update_date = '$u_date' ";
              if (!empty($net_name_O)) {
                $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_O'";
              } else {
                $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_C'";
              }
            } else {
              echo "<script type='text/javascript'>alert('Please Add data in Previous Page.'); javascript:history.go(-1);</script>";//Error no data in pervious page
            }
          }
        }
      }
    }
  }
// check condition equal history 2
} else {
  if (!empty($status) && !empty($condition)) {
    if(!empty($file))
    {
      if(in_array($actualext,$allowed))
      {
        if ($error === 0) {

          if($size < 50000000)
          {
            $newname = $ext[0].date('Y').".".$actualext;
            $sql_getid = "SELECT * FROM network_detail WHERE recording_agreement='$newname'";
            $check_uniqe_directory = mysqli_query($conn,$sql_getid) or die(mysqli_error());
            $count = mysqli_num_rows($check_uniqe_directory);

            if($count==0){
              $newname = $ext[0].date('Y').".".$actualext;
            }else if ($count!=0){
              $extend_name = mt_rand(0,9);
              $newname = $ext[0].date('Y')."_".$extend_name.".".$actualext;
            }
            $fileDestination = 'file-upload/'.$newname;
            if ($countq>0) {
              move_uploaded_file($tempName,$fileDestination);
              $sql =" UPDATE network_detail
              set recording_agreement ='$newname',
              valuation = null,
              status_juvenile ='$status_srl',
              problem = '$condition_srl',
              network_role_description ='$description',
              update_date = '$u_date' ";
              if (!empty($net_name_O)) {
                $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_O'";
              } else {
                $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_C'";
              }
            } else {
              echo "<script type='text/javascript'>alert('Error can't find network name!');javascript:history.go(-1);</script>";//Error can not save data!
            }
          } else {
            echo "<script type='text/javascript'>alert('Error!! File size is too large');javascript:history.go(-1);</script>";//Error!! File size is too large
          }
        } else {
          echo "<script type='text/javascript'>alert('Error in uploading the file');javascript:history.go(-1);</script>";//Error in uploading the file
        }
      } else {
        echo "<script type='text/javascript'>alert('Error!! File Extention not Correct');javascript:history.go(-1);</script>";//Error!! File Extention not Correct
      }
    } else {
      if ($countq>0) {
        $sql =" UPDATE network_detail
        set ";
        if (empty($filenamedb)) {
          $sql .= "recording_agreement = null, ";
        } else {
          $sql .= "recording_agreement = '$filenamedb', ";
        }
        $sql .= "valuation =null,
        status_juvenile ='$status_srl',
        problem = '$condition_srl',
        network_role_description ='$description',
        update_date = '$u_date' ";
        if (!empty($net_name_O)) {
          $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_O'";
        } else {
          $sql .= " WHERE user_id = '$user_id' and network_name = '$net_name_C'";
        }
      } else {
        echo "<script type='text/javascript'>alert('Please Add data in Previous Page.'); javascript:history.go(-1);</script>";//Error no data in pervious page
      }
    }
  }
}
if (!empty($sql)) {
  $query = mysqli_query($conn,$sql);
  if($query){
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:history.go(-1);</script>";//Save successfully!
  }else{
    echo "<script type='text/javascript'>alert('Error can't save data!');javascript:history.go(-1);</script>";//Error can not save data!
  }
  mysqli_close($conn);
}
?>
