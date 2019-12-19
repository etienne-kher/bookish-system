<?php session_start(); include('fonction.php')?>
<?php
	if(!isset($_SESSION['login']))
	{
		header("Location: index.php");
	}
	if(isset($_POST['pro']))
	{	
		
		$req=sql("SELECT * FROM `utilisateurs` WHERE `login`='".$_POST['login']."';");
				if(empty($req)||$_SESSION['login']==$_POST['login'])
				{
					$mdp=sql("SELECT password FROM `utilisateurs` WHERE `id` = ".$_SESSION['id']." ;")[0][0];

					if ($mdp==chiffre($_POST['mdp'])) 
					{
						$req="UPDATE `utilisateurs` SET `login` = '".$_POST['login']."'";
			
						if($_POST['newmdp']==$_POST['confmdp'] && strlen($_POST['newmdp'])!=0)
						{
							$req=$req.",`password` = '".chiffre($_POST['newmdp'])."'";
						}
						$req=$req." WHERE `id` = ".$_SESSION['id']." ;";
						sql($req);
						$_SESSION['login']=$_POST['login'];
						header("Location: profil.php");
					}
					else
					{
						$err="<p id='err'>erreur mot de passe</p>";
					}
				}
				else
				{
					$err="<p id='err'>Login deja pris, essayé ".$_POST['login']."123</p>";
				}
	}

?>	
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>
		<form action="profil.php" method="post">
			<label>Login :</label><input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" required></input>
			<label>Password :</label><input type="password" name="mdp" required>
			<label>New Password :</label><input type="password" name="newmdp" >
			<label>Confirmation :</label><input type="password" name="confmdp">
			<input type="submit" name="pro">
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