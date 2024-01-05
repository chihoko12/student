<?php

function show_top($heading="Student List") {
  echo <<<STUDENT_LIST
  <html>
    <head>
      <title>Student List</title>
    </head>
    <body>
      <h1>$heading</h1>
  STUDENT_LIST;
}

function show_bottom($return_top=false) {
  if ($return_top == true) {
    echo <<<BACK_TOP
      <a href="index.php">Back to List</a>
    BACK_TOP;
  }
  echo <<<BOTTOM
      </body>
  </html>
  BOTTOM;
}

function show_input() {
  $error = get_error();
  show_edit_input_common("","",-1,"","create","Register");
}

function show_delete($member) {
  if ($member != null ) {
    show_student($member);
  }
  $error = "";
  $error = get_error();

  echo <<<DELETE
  <form action="post_data.php" method="post">
    <p>Do you want to delete this?</p>
    <p>{$error}</p>
    <input type="hidden" name="id" value="{$member["id"]}"/>
    <input type="hidden" name="data" value="delete"/>
    <input type="submit" value="Delete">
  </form>
  DELETE;
}

function show_update($id,$name,$grade,$old_id) {
  show_edit_input_common($id,$name,$grade,$old_id,"update","Update");
}

function show_edit_input_common($id,$name,$grade,$old_id,$data,$button) {
  $error ="";
  $error = get_error();

  echo <<<INPUT_TOP
  <form action="post_data.php" method="post">
    <p>Student number</p>
    <input type="text" name="id" placeholder="eg) 1001" value="{$id}">
    <p>Student Name</p>
    <input type="text" name="name" placeholder="eg) Taro Yamada" value="{$name}">
    <p>Grade</p>
    <select name="grade">
  INPUT_TOP;

  for ($i = 1; $i <=3; $i++) {
    echo "<option value=\"{$i}\"";
    if ($i == $grade) {
      echo " selected ";
    }
    echo ">";
    echo $i;
    echo "</option>";
  }

  echo <<<INPUT_BOTTOM
      </select>
      <p>{$error}</p>
      <input type="hidden" name="old_id" value="{$old_id}">
      <input type="hidden" name="data" value="{$data}">
      <input type="submit" value="{$button}">
    </form>
  INPUT_BOTTOM;
}

function show_student_list($member) {

  echo <<<TABLE_TOP
  <table border="1" style="border-collapse:collapse">
    <tr>
      <th>Student number</th>
      <th width="100px">Student Name</th>
      <th>Grade</th>
    </tr>
  TABLE_TOP;

  foreach($member as $loop) {
    echo <<<END
    <tr align="center">
      <td>{$loop["id"]}</td>
      <td><a href="student_edit.php?id={$loop["id"]}">{$loop["name"]}</a></td>
      <td>{$loop["grade"]}</td>
    </tr>
    END;
  }
  echo <<<TABLE_BOTTOM
  </table>
  <br>
  TABLE_BOTTOM;
}

function show_student($member) {

  echo <<<STUDENT
  <table border=1 style="border-collapse:collapse">
    <tr>
      <th>Student number</th>
      <th width="100px">Student Name</th>
      <th>Grade</th>
    </tr>
    <tr align="center">
      <td>{$member["id"]}</td>
      <td>{$member["name"]}</td>
      <td>{$member["grade"]}</td>
    </tr>
  </table>
  <br>
  STUDENT;
}

function show_operations($id) {

  echo <<<OPERATIONS
  <a href="student_update.php?id={$id}">Update Info</a>
  <br>
  <a href="student_delete.php?id={$id}">Delete Info</a>
  <br>
  <br>
  OPERATIONS;

}



?>
