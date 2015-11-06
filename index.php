<?php session_start(); // starts the session
require("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Deal ON!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.setup.js"></script>





</head>
<body id="top">

<div class="wrapper col1">
  <div id="header">
  
<?php 

siteName(); 
$f1=0;
if(isset($_SESSION['uname']))
	{
		echo "<div class='fl_left' style='margin-left:40px; padding:5px;opacity:.8; width:170px;'>
	 <form action='logoff.php' name='logout' style=''>";
	echo "Logged in as ".$_SESSION['fname'].".. <br />
	<input type='submit' value='Logout'/></form> </div>"; 
		}
	else
	$f1=1;    
 ?>
    <div id="topnav">
  
      <ul>
        <li class="last"><a href="about.html">About Us</a><span>Contact Us</span></li>
        <li><a href="gallery.php?cat=shopping">Shopping</a><span>shopping deals</span></li>
        <li><a href="gallery.php?cat=vacation">Vacation</a><span>Holiday Deals</span></li>
        <li><a href="gallery.php?cat=food">Food</a><span>Food Deals</span></li>
        <li class="active"><a href="index.php">Home</a>Latest Deals</li>
      </ul>
    </div>
    
    
 <?php  
  if ($f1==1)
	loginwide();
	else
	echo "<br /><br />";
?>
<br />
  </div>
  
</div>

<!-- ####################################################################################################### -->


<?php 

$bslidecon=createSQL();

$qrymain="SELECT * FROM deals ORDER BY id DESC";

$sqlmain=mysql_query($qrymain,$bslidecon);

echo "<div class='wrapper col2'>
  <div id='featured_slide_'>
    <ul id='featured_slide_Content'>";
	
while($alldeals=mysql_fetch_array($sqlmain))
{
	echo "<li class='featured_slide_Image'><a href='offer.php?id=".$alldeals['id']."'><img src=".$alldeals['image']." alt='".$alldeals['name']."' /></a>
        <div class='introtext'>
          <h2>".$alldeals['name']."</h2>
          <p>".$alldeals['details'].".. Click to Deal..</p>
        </div>
      </li>";
}

mysql_close($bslidecon);

echo "</ul>
  </div>
 
</div>
 ";
?>

    
<!-- ####################################################################################################### -->
<div class="wrapper">
<div id="scroller">
<h3>&nbsp;&nbsp;&nbsp;Food Deals  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Holiday Deals &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Shopping Deals</h3>

<div class="scroller_slot">

<marquee behavior="scroll" direction="up" width="240" height="190" align="middle" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">

<?php 
$sslid1c=createSQL();


$qy="SELECT id,name, details, thumb FROM deals WHERE category='food' ORDER BY id DESC";
$sql=mysql_query($qy,$sslid1c);
echo " ";
while($it=mysql_fetch_array($sql))
{
	echo "
<a href='offer.php?id=".$it['id']."'>
<img src='".$it['thumb']."' align='top' height='190px' alt='".$it['details']."'/><div class='smallbox'>
<h4>".$it['name']."</h4>
</div></a>
<br /> <br />
";
}

mysql_close($sslid1c);

?>

</marquee>

</div>

<div class="scroller_slot">
<marquee behavior="scroll" direction="down" width="240" height="190"  align="middle" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">

<?php 

$sql_conn3=createSQL();
$qe="SELECT id,name, details, thumb FROM deals WHERE category='vacation' ORDER BY id DESC";
$sqlother=mysql_query($qe,$sql_conn3);

while($ite=mysql_fetch_array($sqlother))
{
	
	echo "
<a href='offer.php?id=".$ite['id']."'>
<img src='".$ite['thumb']."' align='top' height='190px' alt='".$ite['details']."'/><div class='smallbox'>
<h4>".$ite['name']."</h4>
</div></a>
<br /> <br />
";

}
mysql_close($sql_conn3);

?>
</marquee>

</div>

<div class="scroller_slot">
<marquee behavior="scroll" direction="up" width="240" height="190" align="middle" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">


<?php 
$sql_conn4=createSQL();
$qr="SELECT id,name, details, thumb FROM deals WHERE category='shopping' ORDER BY id DESC";
$sqlother=mysql_query($qr,$sql_conn4);

while($item=mysql_fetch_array($sqlother))
{
	
	echo "
<a href='offer.php?id=".$item['id']."'>
<img src='".$item['thumb']."' align='top' height='190px' alt='".$item['details']."'/><div class='smallbox'>
<h4>".$item['name']."</h4>
</div></a>
<br /> <br />
";

}
mysql_close($sql_conn4);
?>

</marquee>

</div>

</div>
</div>
<!-- ####################################################################################################### -->

<?php 	
showFooter();
?>



</body>
</html>
