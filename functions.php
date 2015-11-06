<script type="text/javascript">
function callRegister(){
window.location.href="register.php";
}
</script>
<?php 

function createSQL(){
	$conn=mysql_connect("hwudb.db.10987563.hostedresource.com","hwudb","e2010@Mbt");
if(!$conn)
{
	die("Error Occured: ".mysql_error());
}

mysql_select_db("hwudb",$conn);
return $conn;
	}

function siteName(){
	echo "<div class='fl_left'>
      <h1><a href='index.php'>Deal ON!</a></h1>
      <p>The Best Deals..</p>
   
    </div>";
	
	
	}

function add_date($givendate,$day=0,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d', mktime(date('h',$cd),
    date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
    date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
              }


function loginwide(){
	
		echo "<div class='fl_right' style='display:block; width:950px;text-align:center'><br />
     <form action='welcome.php' name='login' onsubmit='' style='border:2px dotted #0099FF; opacity:.7;' method='post'>
    Please Login to enjoy the benefits!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Username: <input type='text' name='userlogin' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Password: <input type='password' name='passlogin'/>&nbsp;&nbsp;<input type='submit' value='Login!' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type='button' value='Register' onclick='callRegister();' />
    </form><br /><br />
    </div>";
	
	}
	
	
function logoutbutton(){
	echo "<form action='logoff.php' name='logout'>";
	echo "<input type='submit' value='Logout' /></form>";
	}


function showFooter(){
	echo "<div class='wrapper col5'>
  <div id='footer'>
    <p class='fl_left'>Copyright &copy; 2012 - All Rights Reserved - Deal ON - <a href='admin.php'>Administration Area</a></p>
    <p class='fl_right'>Template by OS Templates<br /> Modified by Ronny</p>

    <p class='fl_right'>&nbsp;</p>
    <p class='fl_right'>&nbsp;</p>
    <br class='clear' />
  </div>
</div>";	
	}
	
	
?>