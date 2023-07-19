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
<table align=center border=1 width=80% cellpadding=6 cellspacing=0>

<tr><td colspan=6><h2 align:center> Customer Transaction List </h2> </td></tr>
<tr><td> Tran No </td><td> Date </td><td> Ac No </td><td> cr Amt </td><td> Db Amt</td><td> Details</td></tr>
<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankdatabase";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();
$v1=$_SESSION['acno'];

	$sqlvar="select * from transfer_details where From_Acc_num=$v1 ";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	while($row=$result->fetch_row())
	{
		echo("<tr><td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[3]."</td>
		<td>"."0"."</td>
		<td>".$row[4]."</td>
		<td>".$row[5]."</td></tr>");
		
	}
	$sqlvar="select * from transfer_details where To_Acc_num = $v1 ";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	while($row=$result->fetch_row())
	{
		echo("<tr><td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>".$row[4]."</td>
		<td>"."0"."</td>
		<td>".$row[5]."</td></tr>");
		
	}
	
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