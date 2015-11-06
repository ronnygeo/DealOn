<?php
require("functions.php");
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$sqlc=createSQL();
$qry="SELECT DISTINCT name FROM deals";
$sqldata=mysql_query($qry,$sqlc);
$i=0;
while($offers=mysql_fetch_array($sqldata))
{$offerarr[$i]=$offers['name'];
    $i++;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the Admin Area..</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
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

<p>Welcome to Administration Area of DealON! </p>




<?php 
if (isset($_SESSION['uname']))
{
if ($_SESSION['admin']==1)

	{
	echo "<div class='right' style='padding:10px;'>Logged in as Admin ".ucfirst($_SESSION['fname']);
	
	logoutbutton();
	echo "</div> <br />"; 
	
	echo "<br /><div class='center'><p style='font-size:large;color:#000; background-color:#FFF'>Choose a task below: </p><br /><a href='new.php' style='font-size:24px; color:#00C; background-color:#FFF'>Add a New Deal..</a><br />
	<br /><p style='font-size:24px;color:#00C; background-color:#FFF'>View users for an Offer.. ";
		
echo "<form action='view.php' method='post'>
<select name='offer'>";
$i=0;
while($i<count($offerarr))
{
	echo "<option value='".$offerarr[$i]."'>".$offerarr[$i]."</option>";
	$i++;
}
echo "</select>
<input type='submit' value='GO!' />
	<br />

	
	</div><br /><br /><br />";
	
	}
	
	else
	{
		echo "Please logout and login as an Administrator..";
		echo "<div class='right'>";
	echo "Logged in as ".$_SESSION['fname'].".. &nbsp; &nbsp;";
	logoutbutton();
	echo "</div></p>"; 
	}
}
else
{
	echo "<div class='wrapper col2'>
	<div class='center'>
    <form action='welcome.php' name='login' onsubmit='' style='width:50%;margin:auto;margin-right:auto; margin-left:auto; border:2px dotted #0099FF; opacity:.7;' method='post'>";
	echo "Please login.. <br /> <br />";

   echo "Username: <input type='text' name='userlogin' /><br />
   Password: &nbsp; &nbsp;<input type='password' name='passlogin'/> <br />
   <input type='submit' value='Login!' />
    </form>
    </div>
	
	</div>";
	
	}
	
	mysql_close($sqlc);
?>

</div>
</div>

<div class='wrapper col5'>
  <div id='footer'>
    <p class='fl_left'>Copyright &copy; 2012 - All Rights Reserved - Deal ON - <a href='#' style="color:#FFFFFF;background-color:#333; font-size:16px">Administration Area</a></p>
    <p class='fl_right'>Template by OS Templates<br /> Modified by Ronny</p>

    <p class='fl_right'>&nbsp;</p>
    <p class='fl_right'>&nbsp;</p>
    <br class='clear' />
  </div>
</div>

</body>
</html>