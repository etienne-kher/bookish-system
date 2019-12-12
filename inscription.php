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
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>
		<form action="Inscription.php" method="post">
			<label>Login :</label><input type="text" name="login" required>
			<label></label><input type="password" name="mdp" required>
			<label></label><input type="password" name="remdp" required>
			<input type="submit" name="inscr">
		</form>
	<?php
		 if(isset($err))
		{
			echo $err;
		}
	?>
	<?php include('footer.php') ?>
</body>
</html>

