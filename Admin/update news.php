<?php
$conn = mysqli_connect('localhost', 'root', '', 'food_order');
if($conn) { } else { print('Could not connect: ' . mysql_error()); exit;}
	 
$id = $_REQUEST['id'];
$query = "SELECT * FROM news_tbl WHERE news_id = $id";
$dataset =	mysqli_query($conn, $query);
$product_data = mysqli_fetch_assoc($dataset);

if(isset($_REQUEST["submit"])) {
	$news = $_REQUEST["news"];
	 
	 //database connection
	 $query = "UPDATE news_tbl SET news = '$news' WHERE news_id=$id";
	 mysqli_query($conn, $query);
	echo "<script>window.location = 'news list.php' </script>";
	exit; 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update News</title>
<link rel="shortcut icon" href="img/fevicon icon.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-state=1"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="css/override.css">
<!--<link rel="stylesheet" href="css/slider.css" />-->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>

<body>
<header>
	<h1 style="color: white;"> Online Reservation System</h1>
</header>
<?php
include_once'menu bar.php';
?>

<div class="container">
<div class="row jumbotron" style="background:white;">
<div class="col-sm-3">
</div>
<div class="col-sm-5">
<div class="panel panel-primary">
<div class="panel-heading">
<h4><b>Update News</b></h4>
</div>
<div class="panel-body">
<div class="col-sm-12">
<form action="update news.php?id=<?php echo $id; ?>" method="post" style="margin-top:10%;">

	<label>News:</label><br>
	<input type="textarea" style="border-radius: 6px; width:100%; hight: 100px;" name="news" value='<?php echo $product_data['news']; ?>'><br /><br /><br>
	
	<input type="submit" name="submit" style="float: left; font-size: 14px; margin-top: 2px; width: 105px; background:#43a286; color: white; padding: 4px; border-radius: 6px; box-shadow: 0pt 0pt 3px rgb(0, 0, 0);" onMouseOver="this.style.background = '#00795f'" onMouseOut="this.style.background = '#43a286'" value="SAVE"><br>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<?php
include_once'footer.php';
?>
</div>

</body>
</html>
