<?php session_start(); // starts the session
require("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>View Offers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">

  <?php

  siteName();    
 ?>
    <div id="topnav">

      <ul>
        <li><a href="gallery.php?cat=shopping">Shopping</a><span>Shopping deals</span></li>
        <li><a href="gallery.php?cat=Vacation">Vacation</a><span>Holiday Deals</span></li>
        <li><a href="gallery.php?cat=Food">Food</a><span>Food Deals</span></li>
        <li><a href="index.php">Home</a>Latest Deals</li>
      </ul>
    </div>
    
     <?php  
  $f1=0;
  
if(isset($_SESSION['uname']))
{
	$f1=1;
	}
	else
	{
loginwide();
		}
	
?>
    
    <br class="clear" />
  </div>
  
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a onclick="showtype();">Deals</a></li>
      <li>&#187;</li>
      <li><a href="#"><?php echo ucfirst($_GET['cat']) ?></a></li>
    </ul>
    <?php 
  if($f1==1){
	  
	 echo "<div class='fl_right'>
	 <form action='logoff.php' name='logout' style=''>";
	echo "Logged in as ".$_SESSION['fname'].".. &nbsp; &nbsp;
	<input type='submit' value='Logout' /></form> </div>"; 
	  }
  
  ?>
  </div>
   
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container">
    <div class="gallery">
      <h2><?php print_r($_GET['cat']." Deals"); ?></h2>
      <ul>
      <?php 
	  $sqlcon=createSQL();
	  $qry="SELECT * FROM deals WHERE category='$_GET[cat]' ORDER BY id DESC";
	  $sqldata=mysql_query($qry,$sqlcon);
	  while($item=mysql_fetch_array($sqldata))
	  {
		 echo "<li><a href='offer.php?id=".$item['id']."' title='".$item['name']."'><img src='".$item['thumb']."' alt='' /></a></li>";
		  
		  
		  }
	  mysql_close($sqlcon);
	  ?>
      
      
    <!--
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 1"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 2"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 3"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 4"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li class="last"><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 5"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 6"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 7"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 8"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 9"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>
        <li class="last"><a rel="gallery_group" href="images/demo/gallery/500x500.gif" title="Image 10"><img src="images/demo/gallery/174x174.gif" alt="" /></a></li>   -->
      </ul>
      <br class="clear" />
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<?php showFooter(); ?>
</body>
</html>
