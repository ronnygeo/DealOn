<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="scripts/php_ajax_framework.js"></script>
<?php 



$qry="SELECT uname FROM users";
$users=mysql_query($qry,$sql_conn);

//echo $users[0];


$username = trim($_GET['username']);
  
if (usernameExists($username)) {
  echo '<span style="color:red";>Username Taken</span>';
}
else {
  echo '<span style="color:green;">Username Available</span>';
}
  
function usernameExists($input) {
  // in production use we would look up the username in 
  // our database, but for this example, we'll just check
  // to see if its in an array of preset usernames.
  $name_array =  array ('ronny', 'nimil', 'cyril', 'admin');
  
  if (in_array($input, $name_array)) {
    return true;
  }
  else {
    return false;
  }
}

mysql_close($sql_conn);
?>

<title>Untitled Document</title>
</head>

<body>
</body>
</html>