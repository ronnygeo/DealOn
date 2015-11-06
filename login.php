<?php session_start();
require("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
<script type="text/javascript">
function callRegister(){
window.location.href="register.php";
}
</script>

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

<p align="center">Welcome to DealON!.. </p>
<br />
<?php 
if(isset($_SESSION['uname']))
{
	echo "Already logged in as ".ucfirst($_SESSION['uname']).".. <br /><br />";
	 logoutbutton();
	}
else
{
	echo "<div class='wrapper col2'><div class='center'>
    <form action='welcome.php' name='login' style='width:50%;margin:auto;margin-right:auto; margin-left:auto; border:2px dotted #0099FF; opacity:.7;' method='post'>";
	echo "Please login.. <br /> <br />";

   echo "Username: <input type='text' name='userlogin' /><br />
   Password: &nbsp; &nbsp;<input type='password' name='passlogin'/> <br />
   <input type='submit' value='Login!' />
    	<input type='button' value='Register' onclick='callRegister();' />
		</form>

    </div>
	
	</div>";
	
	}
?>

</div>
</div>

<?php showFooter();?>
</body>
</html>