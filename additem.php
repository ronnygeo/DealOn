<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding new Item..</title>
<?php 
//header('refresh: 5;index.php');

require("functions.php");
require("imageconv.php");
?>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />


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

<p>Hello.... Welcome to DealON!.. </p>



<?php 

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Image error: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
 //   echo "Type: " . $_FILES["file"]["type"] . "<br />";
 //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 //   echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("images/temp/" . $_FILES["file"]["name"]))
      {
//      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/temp/" . $_FILES["file"]["name"]);
     // echo "Stored in: " . "images/temp/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid Image";
  }
$sql_conn=createSQL();
$qry="SELECT max(id) from deals";
$sqldata=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqldata);
$row[0]++;
$did=$row[0];

$img="images/temp/".$_FILES["file"]["name"];
$image=new SimpleImage();
$image->load($img);
$image->resizeToHeight(450);
$imgloc="images/deals/deal".$did.".jpg";
$image->save($imgloc);



$image=new SimpleImage();
$image->load($imgloc);
$image->resize(240,170);
$thloc="images/deals/thumbs/thumb".$did.".jpg";
$image->save($thloc);


$qry="INSERT INTO deals (category,name,email,vcode,image,thumb,details,validfrom,validity,minv,maxv) VALUES ('$_POST[category]','$_POST[cname]','$_POST[email]','$_POST[vcode]','$imgloc','$thloc','$_POST[details]','$_POST[vfrom]','$_POST[validity]','$_POST[mvou]','$_POST[tvou]')";

if (!mysql_query($qry,$sql_conn))
{
	die ('Error: '.mysql_error());
	}
	
echo "Deal Added Successfully... Select any of the following options: <br /><p> <a href='new.php' style='color:#000; background-color:#FFF'> 1. Add more items.. </a><br /><a href='admin.php' style='color:#000; background-color:#FFF'> 2. Go back to Admin Area.. </a> <br /> <a href='index.php' style='color:#000; background-color:#FFF'> 3. Go back to the Homepage..</a> </p> <br />";



mysql_close($sql_conn);

?>

</div>
</div>
<?php showfooter();?>

</body>
</html>