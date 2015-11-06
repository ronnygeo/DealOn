<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal!!</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
<?php 
require("functions.php");
session_start();

$id=$_GET['id'];
$_SESSION['pid']=$id; 			//To enable printing
$slcon=createSQL();
$qry="SELECT * FROM deals where id=".$id;
$sqldata=mysql_query($qry,$slcon);
$deal=mysql_fetch_array($sqldata);
if(isset($_SESSION['uname']))
$qry="SELECT id FROM dealed WHERE offerid='".$id."' AND user='".$_SESSION['uname']."'";
$sqldata=mysql_query($qry,$slcon);
$flag=1;
$flag=mysql_fetch_array($sqldata);
if($flag!=NULL)
{
if(isset($_SESSION['uname']))
echo "You have already bought this deal..";
else
echo "Please login..";
}

?>
</head>

<body>

<?php

?>

<div class="wrapper col1">
<div class="header">


<?php 
if((isset($_SESSION['uid']))&&($flag==NULL))
{	
$qry="INSERT INTO dealed (category,offerid,dname,uname,user,vcode,date) VALUES ('".$deal['category']."','".$deal['id']."','".$deal['name']."','".$_SESSION['fname']."','".$_SESSION['uname']."','".$deal['vcode']."','".date('Ymd')."')";
mysql_query($qry,$slcon);
//$flag=mysql_fetch_array($sqldata);
$deal['vissued']++;
$qry="UPDATE deals SET vissued='".$deal['vissued']."' WHERE id='".$deal['id']."'";
mysql_query($qry,$slcon);

echo "<div class='fl_left'>
<h1 style='font-size:30px'>Deal ON!</h1>
</div>";
echo "<div class='fl_right'>";
echo "<h2>".$deal['name']."</h2>";
echo "<div class='fl_right'>
<img src='".$deal['thumb']."' height='120px'/>
</div>";
echo "</div>";

?>

</div>
</div>

<div class="wrapper col2">
<br />
<br />

<?php
$dt=date('d-M-Y');
echo "<div class='center'>".$deal['details']."</div><br /><br /> ";

echo "<div class='fl_left'>
<ul>
<li>Name: <b>".$_SESSION['fname']."</b></li>
<li>Email: ".$_SESSION['email']."</li>
<li>Date of Birth: ".$_SESSION['dob']."</li>

<br />
<li>Offer Valid From: ".$deal['validfrom']."</li>
<li>Valid For: ".$deal['validity']." day(s).</li>
</ul>
</div>";

echo "<div class='pg_center' style='background-color:#FF6;
	color:#F03;
	font-size:18px;
	font-family:Tahoma, Geneva, sans-serif;width:170px;height:45px; padding:5px;'>
	Voucher Code: <br /><b>".$deal['vcode']."</b>
</div>
</div>
<div class='fl_right'>".$dt."
<form action='print.php'>
<input type='submit' value='Print Voucher'/>
</form>

</div><br /><br /><br />
<div class='center'><em>Please take a printout of this voucher and present it along with an id..</em></div>

";

	
	}
else
{
	
	if(isset($_SESSION['uid']))
	{
		echo "<br />Only one voucher per customer... Thank You..<br />";
		}
	else
	{
	echo "<br /><p style='text-align:center'>Please <a href='login.php' style='background-color: white;color:blue'>login in</a> first..</p>";
	}
}

mysql_close($slcon);
?>




</body>
</html>