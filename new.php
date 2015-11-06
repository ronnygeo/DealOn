<?php
require("functions.php");
session_start();
if($_SESSION['admin']==0)
{header('refresh: 5; "index.php"');
    echo "<div class='abcenter'>
<h1 style='font-size:40px;color:#FF0000;'>Restricted Area..</h1><br /> You are not an administrator... <br /> You will be taken back to the homepage in 5 seconds.. </div>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="scripts/jquery-1.4.3.min.js">
</script>
<script type="text/javascript">
 function valFull(){
	f=0;
	 if (document. getElementById("name").value=="")
f=1;
if(document. getElementById("email").value=="")
f=1;
if (document. getElementById("vcode").value=="")
f=1;
if(document. getElementById("f30").value=="")
f=1;
if(document. getElementById("f28").value=="")
f=1;
if(document. getElementById("f29").value=="")
f=1;
if(document. getElementById("vfrom").value=="")
f=1;

if(f==0)
return true;
else
return false;

	 }
</script>

<script type="text/javascript" src="scripts/livevalidation.js">
</script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add a new Deal..</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="styles/tables.css" type="text/css" />



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

<p>Welcome to DealON!.. </p>

<p align="right">Logged in as <?php echo $_SESSION['fname'];?>..</p>

<p> Please enter all the details to add a new deal... </p>
<form action="additem.php" method="post" enctype="multipart/form-data" onsubmit="return valFull();">
<table border="1px dashed" bordercolor="#3366FF" align="center">
<thead><tr>
<th>Name</th>
<th>Details</th>
</tr>
</thead>

<tbody>
<tr>
<td>Category*</td>
<td><select name="category">
<option value="food"> Deals on Food </option>
<option value="vacation"> Deals on Vacation </option>
<option value="shopping"> Deals on Shopping </option>
</select>
</td>
</tr>

<tr>
<td>Name of the Company*</td>
<td><input type="text" name="cname" id="name"/></td>
<script type="text/javascript">
var f11 = new LiveValidation('name');
f11.add( Validate.Length, { minimum: 2 } );
</script>
</tr>
<tr>
<td>Correspondence Email*</td>
<td><input type="text" name="email" id="email" /></td>
<script type="text/javascript">
var f20 = new LiveValidation('email');
f20.add( Validate.Email );
</script>
</tr>

<tr>
<td>Starting Voucher Code*</td>
<td><input type="text" name="vcode" id="vcode"/></td>
</tr>
<script type="text/javascript">
var f12 = new LiveValidation('vcode');
f12.add( Validate.Length, { minimum: 4 } );
</script>

<tr>
<td>Upload Image*</td>
<td>
<input type="file" name="file" id="file" />
</td>
</tr>


<tr>
<td>Details for the Offer*</td>
<td>

<textarea rows="5" cols="50" name="details" id="f25" wrap="physical"></textarea>

</td>

</tr>
<script type="text/javascript">
var f25 = new LiveValidation('25');
f25.add( Validate.Length, { minimum: 15 } );
</script>
<tr>
<td>Valid From Date* (YYYYMMDD)</td>
<td><input type="text" name="vfrom" id="vfrom"></td>
</tr>
<script type="text/javascript">
var f27 = new LiveValidation('vfrom');
f27.add( Validate.Length, { is: 8 } );
f27.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr>
<td>Validity* (Days)</td>
<td><input type="text" name="validity" id="f28"></td>
</tr>
<script type="text/javascript">
var f28 = new LiveValidation('f28');
f28.add( Validate.Length, { minimum: 1 } );
f28.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr>
<td>Minimum Vouchers*</td>
<td><input type="text" name="mvou" id="f29"></td>
</tr>
<script type="text/javascript">
var f29 = new LiveValidation('f29');
f29.add( Validate.Length, { minimum: 1 } );
f29.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr>
<td>Total Vouchers*</td>
<td><input type="text" name="tvou" id="f30"></td>
</tr>
</tbody>
<script type="text/javascript">
var f30 = new LiveValidation('f30');
f30.add( Validate.Length, { minimum: 1 } );
f30.add( Validate.Numericality, { onlyInteger: true } );
</script>

<tfoot>
<tr> <td></td><td align="right">
<input type="submit" value="Add Item" /></td>
</tr>
</tfoot>

</table>
</form>
</div>

</div>

<?php 

showFooter();

?>

</body>
</html>