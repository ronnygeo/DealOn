<?php session_start();
require("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/layout.css">
<title>Offer Page</title>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<!-- FancyBox -->
<script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.js"></script>
<script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.setup.js"></script>
<link rel="stylesheet" href="scripts/fancybox/jquery.fancybox-1.3.2.css" type="text/css" />

</head>

<body>
<?php $sqcon=createSQL();
$qry="SELECT * FROM deals WHERE id='".$_GET['id']."'";
$sqldata=mysql_query($qry,$sqcon);
$deal=mysql_fetch_array($sqldata);
?>
<div class="wrapper col1">
<div id="header">
<?php siteName(); $f1=0;
if(isset($_SESSION['uname']))
	{
		echo "<div class='fl_left' style='margin-left:40px; padding:5px;opacity:.8; width:170px;'>
	 <form action='logoff.php' name='logout' style=''>";
	echo "Logged in as ".$_SESSION['fname'].".. <br />
	<input type='submit' value='Logout'/></form> </div>"; 
	$f1=0;
		}
	else
	$f1=1;    ?>
    <div id="topnav">
  <br />
      <ul>
      
        
          
        <li><a href="gallery.php?cat=shopping">Shopping</a><span>Shopping deals</span></li>
        <li><a href="gallery.php?cat=Vacation">Vacation</a><span>Holiday Deals</span></li>
        <li><a href="gallery.php?cat=Food">Food</a><span>Food Deals</span></li>
        <li class="active"><a href="#">Deal</a><span>Details</span></li>
        <li><a href="index.php">Home</a>Latest Deals</li>
      </ul>
    </div>
    
     <?php  
  if ($f1==1)
	loginwide();
	else
	echo "<br class='clear' />";
?>
    
    </div>
     
    </div>

<!--------------------------------------##################-------------------------------------------------->

<div class="wrapper col2">
    <div id="container" style="padding-top:0px;border:none">
  <div id="offer">
<div id="offer_image">
  <?php echo "<img src='".$deal['image']."' width='700' height='450' />"; ?>
  
  </div>
  <div id="offer_float" style="">
  <?php 
  $viss=  $deal['vissued'] ;
  $minv=$deal['minv'];
  $maxv=$deal['maxv'];
  $date=Date("Y-m-d");
  $vto=add_date($deal['validfrom'],$day=$deal['validity'],$mth=0,$yr=0);


if($date<$vto) 
 {
  if(($viss>=$minv)&&($viss<$maxv))
  echo "<p style='font-family:'Arial Black', Gadget, sans-serif; font-size:12px;color:#090; text-align:center'><br /><a rel='vdisplay' href='deal.php?id=".$_GET['id']."' style='background-color:transparent;font-size:20px;text-align: center;color: #090'>DEAL ON!";
  else
  {
  if($viss<$maxv)
  echo "<p style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:12px;color:#F60; text-align:center'><br /><a rel='vdisplay' href='deal.php?id=".$_GET['id']."' style='background-color:transparent;font-size:20px;text-align: center;color: #F60'>DEAL Off.";
  else
  echo "<p style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:20px;color:#0066FF; text-align:center'>DEAL OVER!";
  }
}
 else
{
 echo "<p style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:20px;color:#0066FF; text-align:center'>DEAL OVER!";

 }
  
 
  echo "</a></p><p>";
   
  echo "<p style='text-align:center;'> Vouchers Issued: ".$deal['vissued']."</p>";
  
  

  ?>
  
  </p>
  
  </div>
  
  <?php 
 $sqltime = strtotime($deal['validfrom']);
$vfrom = date("d-m-Y", $sqltime);
  
  echo "<div class='offerdetails'>
 <h1><b>".$deal['name']."</b></h1>
  <p>".$deal['details']."</p>
 
 <p> Number of vouchers required to get deal on: ".$deal['minv']." </p>
 <p> Number of vouchers available: ".($deal['maxv']-$deal['vissued'])."</p>
 <p> Voucher Valid From: ".$vfrom."</p>
    ";


	
	echo "<div class='fl_right'>Time Remaining for this Deal..<br /><script language='JavaScript'>
TargetDate = '".$vto." 12:00 AM';
BackColor = 'palegreen';
ForeColor = 'navy';
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = '%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.';
FinishMessage = 'This Deal is Over!';
</script>
<script language='JavaScript' src='http://scripts.hashemian.com/js/countdown.js'></script></div> </div>";
	
	
	
?>

    </div>

  
  <div id="offerside">
  
  <marquee direction="up" behavior="scroll" height="642" width="220" align="left" scrollamount="4" onmouseover="this.setAttribute('scrollamount',2,0);" onmouseout="this.setAttribute('scrollamount',4,0);">
  
<?php 

$sql_conn2=createSQL();

$qy="SELECT id,name, details, thumb FROM deals WHERE category='".$deal['category']."'";
$sqlother=mysql_query($qy,$sql_conn2);

while($items=mysql_fetch_array($sqlother))
{
	
	echo "
<br /><br /><a href='offer.php?id=".$items['id']."'>
<img src='".$items['thumb']."' align='middle' width='220'/><div class='offsidebox'>
<h3>".$items['name']."</h3>
".$items['details']."</div></a>
<br /> <br />
";

}
mysql_close($sql_conn2);
mysql_close($sqcon);
?>

</marquee>

    </div>
    
    </div>
<br class="clear" />
</div>

<?php 
showFooter();

?>
</body>
</html>