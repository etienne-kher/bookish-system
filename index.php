<?php 
session_start(); include('fonction.php');
if(isset($_GET['deco']))
{
	session_destroy();
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>

	<?php include('footer.php') ?>
</body>
</html>