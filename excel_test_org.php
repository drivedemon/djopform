<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
session_start();

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls.xls"');

$user = $_GET['user'];
$n_name = $_GET['nname'];

echo "$user";

if(isset($_POST["export"]))
{
  $a = $_SESSION["userID"];
  $query = "SELECT * FROM network_detail where user_id='$a'";
} elseif (!empty($n_name) && !empty($user)) {
  $query = "SELECT * FROM network_detail where user_id='$user' and network_name='$n_name'";
}
$result = mysqli_query($conn, $query);
?>
<!-- <html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40"> -->
<HTML>
  <HEAD>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  </HEAD><BODY>
    <TABLE  x:str BORDER="1" style="font-family: TH SarabunPSK; font-size: 20px; height: 40px;">
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th>ชื่อเครือข่าย</th>
        <th>ที่อยู่</th>
        <th>ประวัติการดำเนินงานร่วมกัน</th>
        <th>ปี</th>
        <th>เดือน</th>
      </TR>
      <!-- <TR> -->
      <?php
      while($row = mysqli_fetch_array($result))
      {

        // <td colspan="2" align="center"> -- colspan => merge cell // align => position
        echo '
        <tr>
        <td colspan="2">'.$row["network_name"].'</td>
        <td>'.$row["address"].'</td>
        <td>'.$row["history"].'</td>
        <td>'.$row["year"].'</td>
        <td>'.$row["month"].'</td>
        </tr>
        ';
      }
      ?>
      <!-- <TD>ภาษาไทย</TD>
      <TD>ภาษาไทย</TD>
      <TD>ภาษาไทย</TD>
    </TR> -->
  </TABLE>
</BODY>
</HTML>
