<?php

require 'dbconnect.php';

$dpid = (isset($_REQUEST["dpid"]))?$_REQUEST["dpid"]:"";

$sql_division = "SELECT unit_id,unit_sname FROM division WHERE unit_type='3' order by unit_sname";
$result_di = mysqli_query($cond,$sql_division) or die(mysqli_error());

  while($row2 = mysqli_fetch_array($result_di)) {
    if ($row2["unit_id"] == $dpid) {
      echo"<option value='".$row2["unit_id"]."' selected>" .$row2["unit_sname"]." </option>";
    } else {
      echo"<option value='".$row2["unit_id"]."'>" .$row2["unit_sname"]." </option>";
    }
  }

?>
