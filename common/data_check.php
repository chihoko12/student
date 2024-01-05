<?php
  function check_input($id,$name,$grade,$error) {
    $error = "";
    $check = "/^[1-3][0-9]{3}$/";

    if ($id === "" or $name === "") {
      $error = "There is a mising value";
      return false;
    }
    if (preg_match($check,$id) != true) {
      $error = "Please enter 4 digit id starting from 1 to 3";
      return false;
    }
    return true;
  }

?>
