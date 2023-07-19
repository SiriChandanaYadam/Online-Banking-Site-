<html>
<head>
<title> Banking Project </title>
<link rel="stylesheet" href="sty.css">
<style>
body {
	font-size:20px;
	
}
table{
	font-size:20px;
	
}
</style></head>

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
<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankdatabase";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();
$res="";


if($_SERVER['REQUEST_METHOD']=='POST')
{
	//echo("working");
	$v1=$_SESSION['acno'];
	$v2=$_POST['text1'];
	$v3=$_POST['text2'];
	$v4=$_POST['text3'];


	//echo $v1."  ".$v2;
	$nvar=1001;
	$sqlvar="select max(transaction_number) + 1 from  transfer_details";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo("Error in excuting query");
		$conn->error;
		exit;
	}
	while($row=$result->fetch_row())
	{
		$nvar=$row[0];
	}
	if($nvar===null){$nvar=1001;}
	//echo($nvar);
	$d1=date('Y/m/d');
	$sqlvar2="insert into transfer_details values('$nvar','$d1','$v1','$v2','$v3','$v4')";
	$result2=$conn -> query($sqlvar2);
	if($result2)
	{
		$res="Transaction successful!";
		
	}
	else
	{
		
		$res="Record Not Inserted, Some problem";
	}
	
	
}
?>

<form name=form1 method="post"  action="custtransfer.php">

<table width=80% border=3 cellspacing=0 cellpadding=5 align=center>
<tr> <td colspan=2> Transfer Money </td> </tr>
<tr> <td >To AcNo </td> <td> <input type=text name=text1> </td> </tr>
<tr> <td > Amount</td> <td> <input type=text name=text2> </td> </tr>
<tr> <td > Transfer Details  </td> <td> <input type=text name=text3> </td> </tr>

<tr> <td >  </td> <td> <input type=submit name=Login  style="height: 45px; width: 150px"> </td> </tr>
<tr> <td colspan=2> <?php echo $res; ?> </td> </tr>

</table>

</form>
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