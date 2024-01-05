<?php
  require_once("common.php");
  show_top();
  $member = $dbm->get_allstudents();
  if($member != null) {
    show_student_list($member);
  }
  echo "<a href=\"student_input.php\">Add a new student info</a>";
  show_bottom();
?>
