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
			<div class="image">
</div>
<div class="table">
	<table align=center border=2 width=80% cellpadding=5 cellspacing=0>
<tr> <td colspan=2> <h1> Balance Amount </h1> </tr>
<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankdatabase";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();
$v1=$_SESSION['acno'];

	$sqlvar="select sum(Amount) from transfer_details where To_acc_num='$v1'";
	$result=$conn -> query($sqlvar);
	while($row=$result->fetch_row())
	{
		$credited = $row[0];
		
	}
	$sqlvar2="select sum(Amount) from transfer_details where From_acc_num='$v1'";
	$result2=$conn -> query($sqlvar2);
	while($row2=$result2->fetch_row())
	{
		$debited = $row2[0];
		
	}
	$balance = 3000 + $credited - $debited;

	if(!$balance){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	else{ 
		echo("<tr><td> Balance Amt </td><td>".$balance." </td></tr>");
		
	}
	
?>

</table>
<a href=custmainpage.php> Back </a>
</div>
            </div>
        </div>
    </div>
</body>
</html>