<?php session_start(); include('fonction.php')?>
<?php
	if(isset($_SESSION['login']))
	{
		header("Location: index.php");
	}
	if(isset($_POST['conn']))
	{
		$req=sql("SELECT * FROM `utilisateurs` WHERE `login`='".$_POST['login']."' AND  `password`='".chiffre($_POST['mdp'])."';");
		if (!empty($req))
		{
			$_SESSION['id']=$req[0][0];
			$_SESSION['login']=$req[0][1];
			header("Location: index.php");
		}
		else
		{
			$err="<p id='err'>une erreur c'est produite</p>";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Press+Start+2P|Russo+One&display=swap" rel="stylesheet">

</head>
<body id='bodyconnexion'>
	<main>

	<?php include('header.php') ?>
		<div id='labelconnexion'>
		<form action="connexion.php" method="post" id = "form-con">
			<label>Login :</label><input type="text" name="login" required>
			<label>Password :</label><input type="password" name="mdp" required>
			<input class="buttonOK" type="submit" name="conn">
		</form>
		<?php
		 if(isset($err))
		{
			echo $err;
		}
		?>
		</div>
		</main>
	<?php include('footer.php') ?>
</body>
</html>
