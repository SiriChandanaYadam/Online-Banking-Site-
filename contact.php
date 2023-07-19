<html>
<head>
<title> Banking Project </title>
<style>
body {
	font-size:20px;
	
}
table{
	font-size:20px;
	
}
</style>
<link rel="stylesheet" href="sty.css">
</head>
<body >
<div class="container">
        <div class="sidebar">
            <nav>
                <ul>
				<li><a href="index.html">Home</a></li>
                    <li><a href="custdetails.php">Account Details</a></li>
                    
                    <li><a href="custbalance.php">Account Balance</a></li>
                    
                    <li><a href="custtransfer.php">Money Transfer</a></li>
                    
                    <li><a href="custtranslist.php">Transaction List</a></li>
                </ul>
            </nav>
        </div>
        <div class="main">
    <div class = 'form-box'>
        <h1  style="text-align:center;padding-top:20px">CONTACT US</h1>
        <form id = "register" class="input-group" action="contact.php" method="POST">
            <input type ="text" class="input-field" name="name" placeholder="Account holder name">
            <input type ="text" class="input-field" name="bank-name" placeholder="Bank name">
            <input type ="text" class="input-field" name="acc-number" placeholder="Account number">
            <input type ="text" class="input-field" name="phone" placeholder="Phone">
	        <input type ="email" class="input-field" name="email" placeholder="Email">
	        <input type ="text" class="input-field" name="remarks" placeholder="Remarks">
            <input type ="checkbox" class = "check-box"><span> I agree to terms & conditions</span>
            <input type="submit" class="submit-btn" value="submit" name="submit" id="submit">
        </form>
        
    </div>
    <?php
session_start();
$rs = "";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $acc_num = $_POST['acc-number'];
        $bank_name = $_POST['bank-name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $remarks = $_POST['remarks'];

// Validate the fields
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required";
}

// Perform other validation checks...

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
    $sql = "INSERT INTO contact_details VALUES ('$name', '$bank_name', '$acc_num', '$phone','$email','$remarks')";
  
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
<p class="para"> 
		<a href="custmainpage.php">Go back</a>
	</p>
</div>

            </div>
        </div>
    </div>
</body>
</html>