<?php


Class students {

        private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "crud_oop";
        public  $con;
        

        public function __construct()
		{   
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
        }
        
        public function insertData($post)
		{
			$name = $this->con->real_escape_string($_POST['name']);
			$email = $this->con->real_escape_string($_POST['email']);
			$mobile = $this->con->real_escape_string($_POST['mobile']);
			$password = $this->con->real_escape_string(md5($_POST['password']));
			$query="INSERT INTO student(student_name,student_email,student_mobile,student_password) VALUES('$name','$email','$mobile','$password')";
			$sql = $this->con->query($query);
			if ($sql==true) {
                echo "Succecfuly added";
			    // header("Location:index.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}
        }
        
        public function displayData()
		{
		    $query = "SELECT * FROM student";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
             return $data;
             
		    }else{
			 echo "No found records";
		    }
        }
        
        public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM student WHERE student_id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}
        
        public function deleteRecord($id)
		{
		    $query = "DELETE FROM student WHERE student_id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:students.php");
		}else{
			echo "Record has not been deleted! try again";
		    }
        }
        

        public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
            $mobile = $this->con->real_escape_string($_POST['umobile']);
            $password = $this->con->real_escape_string($_POST['upassword']);

		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE student SET student_name = '$name', student_email = '$email', student_mobile = '$mobile',student_password = '$password' WHERE student_id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:students.php");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}


}