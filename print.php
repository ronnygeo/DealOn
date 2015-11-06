<?php session_start();
require("functions.php");
$id=$_SESSION['pid'];
$slcon=createSQL();
$qry="SELECT * FROM deals where id=".$id;
$sqldata=mysql_query($qry,$slcon);
$deal=mysql_fetch_array($sqldata);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal!!</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />

</head>

<body>

<?php

?>

<div class="wrapper col1">
<div class="header">

<?php

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
$vto=add_date($deal['validfrom'],$day=$deal['validity'],$mth=0,$yr=0);
echo "<div class='center'>".$deal['details']."</div><br /><br /> ";

echo "<div class='fl_left'>
<ul>
<li>Name: <b>".$_SESSION['fname']."</b></li>
<li>Email: ".$_SESSION['email']."</li>
<li>Date of Birth: ".$_SESSION['dob']."</li>

<br />
<li>Offer Valid From: ".$deal['validfrom']."</li>

<li>Valid Till: ".$vto."</li>
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


</div>

";


mysql_close($slcon);
?>
<script type="text/javascript">
window.print();

</script>

</body>
</html>