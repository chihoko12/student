<?php
  require_once("common.php");
  $id = $_GET["id"];
  $member = $dbm->get_student($id);
  show_top("Delete Info");
  show_delete($member);
  show_bottom(true);
?>
