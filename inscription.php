<?php session_start(); include('fonction.php')?>
<?php
	if(isset($_SESSION['login']))
	{
		header("Location: index.php");
	}
	if(isset($_POST['inscr']))
	{	if (strlen($_POST['login'])==0 || strlen($_POST['mdp'])==0)
		{
			$err="<p id='err'>bien essayé hackerman</p>";
		}
		else
		{
			if($_POST['mdp']==$_POST['remdp'])
			{	$req=sql("SELECT * FROM `utilisateurs` WHERE `login`='".$_POST['login']."';");
				if(empty($req))
				{
					sql("INSERT INTO `utilisateurs`(`id`, `login`, `password`) VALUES (null,'".$_POST['login']."','".chiffre($_POST['mdp'])."');");
					header("Location: connexion.php");
				}
				else
				{
					$err="<p id='err'>Login deja pris, essayé ".$_POST['login']."123</p>";
				}
			}
			else
			{
				$err="<p id='err'>Les mots de passe saisis sont différent</p>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Press+Start+2P|Russo+One&display=swap" rel="stylesheet">

</head>
<body id='bodyinscription'>


	<?php include('header.php') ?>
	<section id="sec-inscr">
	<div id="inscriptionreservationform">

		<form action="Inscription.php" method="post"  id="form-inscr">
			<div class="aling"><label>Login :</label><input type="text" name="login" required></div>
			<div class="aling"><label>Mot de Passe :</label><input type="password" name="mdp" required> </div>
			<div class="aling"><label>Cofirmation :</label><input type="password" name="remdp" required></div>


			<input class="buttonOK" type="submit" name="inscr">
			</div>
			</form>

<br>
	<?php
		 if(isset($err))
		{
			echo $err;
		}
	?>
	</div>
</section>
	<?php include('footer.php') ?>
</body>
</html>
