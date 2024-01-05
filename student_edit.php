<?php
  require_once("common.php");
  $id = $_GET["id"];
  $member = $dbm->get_student($id);
  show_top("Select Info");
  show_student($member);
  show_operations($id);
  show_bottom(true);
?>
