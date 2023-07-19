<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankdatabase";

// creating a connection
$con = mysqli_connect($host, $username, $password, $dbname);
session_start();
$_SESSION['acno']=00;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	//echo("working");
	$v1=$_POST['login-number'];
	$v2=$_POST['login-password'];
	//echo $v1."  ".$v2;
	$sqlvar="select * from customer_details where Account_number=$v1";
	$result=$con -> query($sqlvar);
	if($result -> num_rows > 0)
	{
		$_SESSION['acno']=$v1;
		echo($_SESSION['acno']);
		header('location: custmainpage.php');
		
	}
	else
	{
		
		echo('userid or password is not correct');
	}
	
	
}

?>