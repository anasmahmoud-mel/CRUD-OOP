<?php


include 'classes.php';

?>
<?php
$student_1 = new students();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  $student_1->insertData($_POST);
}
?>
<?php


if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $student_1->deleteRecord($deleteId);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD (Add) Application using OOP (Object Oriented Programming) and MYSQL</title>
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
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
    </div>
    <div class="form-group">
      <label for="username">Mobile:</label>
      <input type="text" class="form-control" name="mobile" placeholder="Enter phone no." required="">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<br><br><br><br>


<div class="card text-center" style="padding:15px;">
  <h4>PHP: CRUD (View) Application using OOP (Object Oriented Programming) and MYSQL</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>View Records
    <a href="add.php" class="btn btn-primary" style="float:right;">Add New Record</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $students = $student_1->displayData(); 
          foreach ($students as $student) {
        ?>
        <tr>
          <td><?php echo $student['student_id'] ?></td>
          <td><?php echo $student['student_name'] ?></td>
          <td><?php echo $student['student_email'] ?></td>
          <td><?php echo $student['student_mobile'] ?></td>
          <td>
            <a href="edit.php?editId=<?php echo $student['student_id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="students.php?deleteId=<?php echo $student['student_id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
