<?php session_start(); include('fonction.php')?>
<?php
	if(!isset($_SESSION['login']))
	{
		header("Location: index.php");
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>

	<?php include('footer.php') ?>
</body>
</html>