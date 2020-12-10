<?php


include ('classes.php');

$student_1 = new students();



if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $student = $student_1->displyaRecordById($editId);
  }







if(isset($_POST['update'])){
    

    $student_1->updateRecord($_POST);

// print_r($row);
// die();



}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</h4>
</div><br> 

<div class="container">
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $student['student_name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="uemail" value="<?php echo $student['student_email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Phone No:</label>
      <input type="text" class="form-control" name="umobile" value="<?php echo $student['student_mobile']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Password:</label>
      <input type="password" class="form-control" name="upassword" value="" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $student['student_id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>