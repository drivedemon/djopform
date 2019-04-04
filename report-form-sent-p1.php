<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
//Year
$txt_dateyear = (isset($_POST['txtDate_year']))? $_POST["txtDate_year"]:'';
//Month
$txt_datemonth = (isset($_POST['txtDate_month']))? $_POST["txtDate_month"]:'';

//Choice 1
$net_name = (isset($_POST['network-name']))? $_POST["network-name"]:'';
//Choice 2
$address = (isset($_POST['address']))?$_POST['address']:'';
//Choice 3
$oph = (isset($_POST['operation-history']))?$_POST['operation-history']:'';
$oph = htmlspecialchars($oph,ENT_QUOTES);
$oph = mysqli_real_escape_string($conn,$oph);

//Choice 4
$date = (isset($_POST["date"]))?$_POST['date']:'';
$date = htmlspecialchars($date,ENT_QUOTES);
$date = mysqli_real_escape_string($conn,$date);

//Choice 5
$cate =(isset($_POST["category"]))?$_POST['category']:'';
$type = (isset($_POST['type']))?$_POST['type']:'';
$oth5 = (isset($_POST['other5']))?$_POST['other5']:'';
$net_typearr= array($cate,$type,$oth5);
$net_type = serialize($net_typearr);

//Choice 6
$activity = (isset($_POST["act"]))?$_POST["act"]:'';
$oth6 = (isset($_POST['other6']))?$_POST['other6']:'';
$act_arr= array($activity,$oth6);
$act= serialize($act_arr);

$user_id = $_POST['user_id'];
$menu = $_POST['menu'];
$netname = $_POST['n_name'];
$u_date = date("Y-m-d H:i:s");
$c_date = date("Y-m-d H:i:s");

$sql_se = "SELECT * FROM network_detail WHERE user_id=$user_id and network_name=\"$netname\"";
$res = mysqli_query($conn,$sql_se) or die(mysqli_error());
$count = mysqli_num_rows($res);

// check null all choice
if (empty($oph)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ ประวัติการดำเนินงานร่วมกัน(3) '); javascript:history.go(-1);</script>";
} elseif (empty($date)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ วัน/เดือน/ปี ที่เข้ามาทำกิจกรรม(4) '); javascript:history.go(-1);</script>";
} elseif (empty($cate)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ ประเภทของเครือข่าย(5) '); javascript:history.go(-1);</script>";
} elseif (empty($type)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ รายละเอียดประเภทของเครือข่าย(5) '); javascript:history.go(-1);</script>";
} elseif (empty($activity)) {
  echo "<script type='text/javascript'>alert('กรุณาใส่ ด้านของกิจกรรมที่เครือข่ายสนับสนุน(6) '); javascript:history.go(-1);</script>";
}

if (!empty($oph) && !empty($date) && !empty($cate) && !empty($type) && !empty($net_typearr) && !empty($activity)) {
  if ($count > 0) {
    $sql = "UPDATE network_detail
    set year = '$txt_dateyear',
    month = '$txt_datemonth',
    network_name = '$netname',
    address = '$address',
    history = '$oph',
    date_activity = '$date',
    network_type = '$net_type',
    network_activity = '$act', ";
    if ($oph == 2) {
      $sql .= "valuation = null, ";
    }
    $sql .= "update_date = '$u_date'
    WHERE user_id = '$user_id' and network_name = '$netname'";
  } else {
    $sql_dup = "SELECT * FROM network_detail WHERE user_id=$user_id and network_name=\"$net_name\"";
    $querydup = mysqli_query($conn,$sql_dup);
    $q_dup = mysqli_num_rows($querydup);
    if ($q_dup == 0) {
        $sql = " INSERT INTO network_detail (year,month,user_id,network_name,address,history,date_activity,network_type,network_activity,create_date,update_date)
        VALUES ('$txt_dateyear','$txt_datemonth','$user_id','$net_name','$address','$oph','$date','$net_type','$act','$c_date','$c_date')";

      session_start();
      $_SESSION["create_da"] = $c_date;
      session_write_close();

    } else {
      echo "<script type='text/javascript'>alert('Error Network name dupplicate!');javascript:history.go(-1);</script>";//Error can not save data!
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
