<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
<script type="text/javascript" src="scripts/php_ajax_framework.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>

<script type="text/javascript" src="scripts/livevalidation.js"></script>

<script type="text/javascript">
function valFull(){
	f=0;
	 if (document. getElementById("user").value=="")
f=1;
if(document. getElementById("f12").value=="")
f=1;
if (document. getElementById("e2").value=="")
f=1;
if(document. getElementById("dob").value=="")
f=1;
if(document. getElementById("f30").value=="")
f=1;

if(f==0)
return true;
else
return false;

	 }

       </script>
       
       <script type="text/javascript">
function chkuser_init() {
  //retrieve username from html input box with the id "name_box"
  var username = document.getElementById('user');
  var script = 'username_exists.php';
  var queryString = "?username=" + username;
  return script + queryString;
}


function chkuser_ajax(results) {
  var targetDiv = document.getElementById('result');
  var resultHTML='<h1>' + results + '</h1>';
  targetDiv.innerHTML = resultHTML;
}


function chkuser() {
  var user_field = document.getElementById('user');
  if (user_field.value.length > 0) {
    //call our AJAX function in the PHP AJAX Framework
    ajaxHelper('check_username');
  }
  else {
    //clear results field 
    var results_div = document.getElementById('result');
    results_div.innerHTML = '';
  }
}
</script>
       

</head>

<body>

<?php require("functions.php"); ?>
 
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

 <p align="center">Please register to get full access to Deal ON! </p> 

<div id="formcontainer">
<p>Please enter all the required details..</p>

<form action="process.php" name="register" method="post" onsubmit="return valFull();">
<table width="107%" border="1px" bordercolor="#0099FF" style="text-align:left">
<tr><th width="30%"> Details</th> <th width="70%">Input </th></tr>
<tr> <td> Enter your Full name*</td><td>
<input type="text" name="fname" id="f1" />
<script type="text/javascript">
		            var f1 = new LiveValidation('f1');
		            f1.add(Validate.Length, { minimum: 8 } );
		          </script></td></tr>
<tr>
  <td>Enter desired Username*</td><td>
 <input type="text" name="uname" id="user" onchange="chkuser();" /><div id="result"></div>
<script type="text/javascript">
		            var user = new LiveValidation('user');
		            user.add(Validate.Length, { minimum: 5 } );
					
		          </script>  </td></tr>
 </td></tr>
<tr>
  <td>Enter password*</td><td>
<input type="password" name="password" id="f12" />
<script type="text/javascript">
		            var f12 = new LiveValidation('f12');
		            f12.add(Validate.Length, { minimum: 5 } );
		          </script>  </td></tr>
<tr>
  <td>Enter your Email*</td><td>
 <input type="text" name="email" id="f30" /></td></tr>
 <script type="text/javascript">
var f20 = new LiveValidation('f30');
f20.add( Validate.Email );
</script>
<tr><td>Confirm your Email*</td><td><input type="text" name="confirm" id="e2" /></td></tr>
<script type="text/javascript">
var e2 = new LiveValidation('e2');
e2.add( Validate.Confirmation, { match: 'f30' } );</script>
    <td> Enter your Date of Birth* (yyyymmdd)</td><td>
<input type="text" name="dob" id="dob" /></td></tr>
<script type="text/javascript">
var f27 = new LiveValidation('dob');
f27.add( Validate.Length, { is: 8 } );

f27.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr> <td>Enter your Location</td><td><input type="text" name="address" value="Dubai, UAE"  /></td></tr>
</table>
<input type="submit" value="Register" />

</form>

</div>
</div>
<?php showFooter();?>
</body>
</html>