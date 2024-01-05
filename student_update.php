<?php
  require_once("common.php");
  $old_id = $_GET["id"];
  $member = $dbm->get_student($old_id);
  $id = $member["id"];
  $name = $member["name"];
  $grade = $member["grade"];
  show_top("Update Info");
  show_update($id,$name,$grade,$old_id);
  show_bottom(true);
?>
