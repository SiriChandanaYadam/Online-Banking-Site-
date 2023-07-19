<?php
session_start();
$rs = "";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $acc_num = $_POST['acc-number'];
        $acc_type = $_POST['acc-type'];
        $bank_name = $_POST['bank-name'];
        $branch_name = $_POST['branch-name'];
        $occupation = $_POST['occupation'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['re-password'];

// Validate the fields
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required";
}

// Perform other validation checks...

if (empty($password)) {
    $errors[] = "Password is required";
}

if ($password !== $confirmPassword) {
    $errors[] = "Passwords do not match";
}
if (strlen($acc_num) !== 10) {
    $errors[] = "Account number must be 10 digits long";
}
// database details
if (count($errors) === 0) {
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "bankdatabase";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if ($con -> connect_error)
    {
        die("Connection failed!" . $con->connect_error);
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO customer_details(Account_name,Account_number,Account_type,Bank_name,Branch_name,Occupation,Password)
    VALUES ('$name', '$acc_num', '$acc_type', '$bank_name','$branch_name','$occupation','$password')";
  
    // send query to the database to add values and confirm if successful
    $rs = $con -> query($sql);
    if($rs === true)
    {
        echo "Response recorded!";
    }
    else{
		
		echo "Error" .$sql . "<br>" .$con->error;
	}
	
  
    // close connection
    $con->close();
}else{
    // Display validation errors
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
  }
}

?>
