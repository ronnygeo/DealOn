<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Users</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css">
</head>
<body>
<div class="wrapper col1">
<div id="header">
<?php 
require("functions.php");
siteName();?>
   
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


<?php 

echo "<p style='font-size:20px'>Showing details for ".$_POST['offer']."..</p>";

$sql_co=createSQL();
$qry="SELECT uname, date,vcode FROM dealed WHERE dname='".$_POST['offer']."' ORDER BY date ASC";
$sqldata=mysql_query($qry,$sql_co);

$qy="SELECT email,vissued,minv FROM deals WHERE name='".$_POST['offer']."'";
$mail=mysql_fetch_array(mysql_query($qy,$sql_co));




?>

<table>
<tr><th>Name</th><th>Date Purchased</th></tr>

<?php 
$mailcontents="";
while ($userde=mysql_fetch_array($sqldata)){
echo "<tr><td>".$userde['uname']."</td><td>".$userde['date']."</td></tr>";
$mailcontents+=("<tr><td>".$userde['uname']."</td><td>".$userde['date']."</td></tr>");
}
//$mailcontents+="</html>";



mysql_close($sql_co);

$Content=$mailcontents;
$Subject="Details for ".$userde['vcode'];
	$Headers  = "MIME-Version: 1.0\n";
    $Headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $Headers .= "From: Ronny Mathew <admin@dealon.com>\n";
    $Headers .= "X-Sender: <admin@dealon.com>\n";
    $Headers .= "X-Mailer: PHP\n"; 
    $Headers .= "X-Priority: 1\n"; 
    $Headers .= "Return-Path: <admin@dealon.com>\n";  

if($mail['vissued']>=$mail['minv']){
if(mail($mail[0], $Subject, $Content, $Headers) == false) {
        echo "Unable to send mail";
    }
}

?>
<tfoot></tfoot>
</table>
</div>
</div>
<?php showFooter(); ?>
</body>
</html>