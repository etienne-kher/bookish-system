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
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Press+Start+2P|Russo+One&display=swap" rel="stylesheet">
</head>
<body id='bodyindex'>
<header>
	<?php include('header.php') ?>

	<?php include('footer.php') ?>
</header>

<main id="mainindex">
	<div id=animationindex>
		<img class="photoindex0" src="imageapparitionindexgauche.gif" alt="">
		<img  id="photoindex1" src="logomilieuindex .png" alt="">
		<img class="photoindex2" src="apparition indexdroite.png" alt="">

</div>
<h1 id='h1index'> Bienvenue!~~ </h1>


</main>


</body>
</html>
