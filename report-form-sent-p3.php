<?php
require 'dbconnect.php';
session_start();
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');

$user_id = $_POST['user_id'];
$net_name_O = $_POST['n_name'];
$menu = $_POST['menu'];
// $url = $_POST['page'];
$u_date = date("Y-m-d H:i:s");
//choice 12
$department = (isset( $_POST["dpm"]))? $_POST["dpm"]:'';
$ministry = (isset( $_POST["mnt"]))? $_POST["mnt"]:'';
$other12 = (isset( $_POST["other12"]))? $_POST["other12"]:'';
$moa_arr =array($ministry,$department,$other12);
$moa_srl =serialize($moa_arr);

// print_r($moa_arr);
// print_r($moa_srl);

//choice 13
$institution = (isset( $_POST['txtDepartment']))? $_POST['txtDepartment']:'';
// print_r($institution);
$institution_srl=serialize($institution);
// echo "<br>";
// echo "<br>";
// print_r($institution_srl);

//choice 14
$result = (isset( $_POST['result']))? $_POST['result']:'';

// check null choice 12,14
if (empty($department)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ การดำเนินงาน ระดับกรม(12) '); javascript:history.go(-1);</script>";
} elseif (empty($ministry)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ การดำเนินงาน ระดับกระทรวง(12) '); javascript:history.go(-1);</script>";
} elseif (empty($result)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ ผลการดำเนินงานร่วมกับเครือข่าย(14) '); javascript:history.go(-1);</script>";
}


if (!empty($department) && !empty($ministry) && !empty($result)) {
  if (!empty($net_name_O)) {
    $sql =" UPDATE network_detail
            set
                ministry = '$moa_srl',
                institution = '$institution_srl',
                network_result ='$result',
                update_date = '$u_date'
                WHERE user_id = '$user_id' and network_name = '$net_name_O'";

        // $sql = " INSERT INTO network_detail (institution,network_result)
        // VALUES ('$institution_srl','$result')";
        $query = mysqli_query($conn,$sql);
        if($query){
            unset($_SESSION["create_da"]);

            echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.open('/djopform/home/$user_id', '_self');</script>";//Save successfully!
            // Header("Location: home.php?user=".$user_id."");
            // echo "<script type='text/javascript'>window.open('/djopform/home.php?user=$user_id', '_self');</script>";//Save successfully!
        }else{
            echo "<script type='text/javascript'>alert('Error can't save data!'); javascript:history.go(-1);</script>";//Error can not save data!
        }
  } else {
    echo "<script type='text/javascript'>alert('Please Add data in First Page.'); javascript:history.go(-1);</script>";//Error can not save data!
  }
}


mysqli_close($conn);

?>
