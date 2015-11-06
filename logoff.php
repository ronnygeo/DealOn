<?php session_start();
/*if(isset($_SESSION['url']))
    $url = $_SESSION['url']; // holds url for last page visited.
else
    $url = ""; // default page for */
header("Location: index.php");

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logging Off..</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
</head>
<body>

<?php echo "Logged out successfully";	?>

</body>
</html>