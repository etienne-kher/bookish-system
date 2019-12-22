<?php session_start(); include('fonction.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Reservation</title>
	<link href="https://fonts.googleapis.com/css?family=Bangers|Press+Start+2P|Russo+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body id="bodyreservation4">
	<?php include('header.php') ?>
	<div id="reponseformulaire">

	<?php
		if(empty($_GET['res']))
		{
			header("Location: planning.php");
		}
		else
		{
			$res=sql("SELECT login , titre , description, debut ,fin FROM `reservations` INNER JOIN utilisateurs ON utilisateurs.id = id_user WHERE reservations.id = ".$_GET['res']."");
			$date=date("j/n/Y",strtotime($res[0][3]));
			$hd=date("G",strtotime($res[0][3]));
			$hf=date("G",strtotime($res[0][4]));
			?>
			<main>
				<section>
					<h>Titre: <?php echo $res[0][1]; ?> </h>
					<p>Createur: <?php echo $res[0][0]; ?> </p>
					<div>Description: <?php echo $res[0][2]; ?> </div>
					<p>Date: <?php echo $date; ?> </p>
					<p>Heure de début: <?php echo $hd; ?> h</p>
					<p>Heure de fin: <?php echo $hf; ?> h</p>
				</section>
			</main>
		<?php }
	?>
</div>

	<?php include('footer.php') ?>
</body>
</html>
