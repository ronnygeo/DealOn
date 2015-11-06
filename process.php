<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creating new user</title>
<?php error_reporting(0);
require("functions.php");
if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "index.php"; // default page for 

header("refresh: 7;$url");


?>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
</head>

<body>
<div class="wrapper col1">
<div id="header">
<?php siteName();?>
   
<div id="topnav">

      <ul>
        <li><a href="gallery.php?cat=shopping">Shopping</a><span>Shopping deals</span></li>
        <li><a href="gallery.php?cat=Vacation">Vacation</a><span>Holiday Deals</span></li>
        <li><a href="gallery.php?cat=Food">Food</a><span>Food Deals</span></li>
        <li><a href="index.php">Home</a>Latest Deals</li>
      </ul>
    </div>

</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<p>Hello.... Welcome to DealON!.. </p>


<?php 

/*$qry="SELECT max(id) from users";
$sqldata=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqldata);
$row[0]++;
$newid=$row[0];
echo $newid;
*/
$sql_conn=createSQL();
$qry="INSERT INTO users (fname,username,password,email,dob,address) VALUES ('$_POST[fname]','$_POST[uname]','$_POST[password]','$_POST[email]','$_POST[dob]','$_POST[address]')";
if (!mysql_query($qry,$sql_conn))
{
	die ('Error: '.mysql_error());
	}
echo "<p>Registratrion Complete</p>";

$qry="SELECT * FROM  d_users WHERE username= '$_POST[uname]' AND password='$_POST[password]'";

$sqluser=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqluser);

	//setcookie("user",$row['username'],time()+(60*60*24));
	session_start();
	$_SESSION['uname']=$row['username'];
	$_SESSION['fname']=$row['fname'];
	$_SESSION['uid']=$row['id'];
	$_SESSION['email']=$row['email'];
	$_SESSION['dob']=$row['dob'];

echo "<p>Welcome to DealOn, ".ucfirst($_SESSION['fname'])."</p>";
	

mysql_close($sql_conn);
?>

<p>You will be automatically redirected to the Home page in 5 seconds..</p>

</div>
</div>
<?php showfooter();?>

</body>
</html>