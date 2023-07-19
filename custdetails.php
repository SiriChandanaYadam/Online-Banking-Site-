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

<body bgcolor= white>
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
		<div class="image">
</div>
<div class="table">
<table align=center border=3 width=80% cellpadding=5 cellspacing=0>

<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankdatabase";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if($conn->connect_errno){
	echo('Failed to connect to MySQL');
	$conn->connect_error;
	exit();
}
session_start();
$v1=$_SESSION['acno'];

	$sqlvar="select * from customer_details where Account_number=$v1";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	while($row=$result->fetch_row())
	{
		echo("<tr><td> Name </td><td>".$row[0]." </td></tr><tr><td> ACCNum </td><td>".$row[1]."</td></tr><tr><td> ACCType </td><td>".$row[2]."</td></tr> <tr><td> BANKName </td><td>".$row[3]."</td></tr> <tr><td> BRANCHName</td><td>".$row[4]."</td></tr> <tr><td> Occupation</td><td>".$row[5]."</td></tr> ");
		
	}
	$conn->close();
	
?>

</table>
<a href=custmainpage.php> Back </a> 
<table width=100%>
<tr height=200> <td></td> </tr>
</table>
</div>
            </div>
        </div>
    </div>
</body>
</html>