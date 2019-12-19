<?php session_start(); include('fonction.php');

if(!isset($_SESSION['login']))
	{
		header("Location: index.php");
	}
if(isset($_POST['res']))
{
	if (strlen($_POST['titre'])==0 
		|| strlen($_POST['desc'])==0 
		|| strlen($_POST['jour'])==0 // modif
		|| strlen($_POST['debheur'])==0 
		// supp
		|| strlen($_POST['finheur'])==0 
		|| $_POST['debheur']<8 ||$_POST['debheur']>18 
		|| $_POST['finheur']<9 ||$_POST['finheur']>19
		|| $_POST['debheur']>$_POST['finheur']) //
		{
			$err="<p id='err'>Bien essayé hackerman</p>";
			if ($_POST['debheur']>$_POST['finheur']) // remplacer par heur
			{
				$err="<p id='err'>la date de debut ne peu étres apres la date de fin</p>";
			}
		}
		else
		{
			$datedeb=$_POST['jour']." ".$_POST['debheur'];// modif
			$datefin=$_POST['jour']." ".$_POST['finheur'];// modif
			$jo=date("D",strtotime($_POST['jour']));// modif// sup
			if ($jo!="Sat"&&$jo!="Sun") 
			{
				$verif=sql("SELECT COUNT(*) FROM `reservations` WHERE (debut < '".$datedeb."' and '".$datedeb."'< fin) OR (debut < '".$datefin."' and '".$datefin."' < fin) or ('".$datedeb."'< debut and fin < '".$datefin."') or (debut < '".$datedeb."' and '".$datefin."'< fin) or(debut='".$datedeb."') or (fin='".$datefin."')");

				if($verif[0][0]==0)
				{
					$req="insert into reservations (id,titre,description,debut,fin,id_user) VALUES (NULL,'".$_POST['titre']."','".$_POST['desc']."','".$datedeb."','".$datefin."',".$_SESSION['id'].")";
					sql($req);
					header("Location: planning.php");
				}
				else
				{
					$err= "le créneau est deja pris consulter le <a href=\"planning.php\">planning</a>";
				}
			}
			else
			{
				$err="déso on travaille pas le weekend";
			}	
		}
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Nouvelle Réservation</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>
		<form action="reservation-form.php" method="post">
			<label>titre :</label><input type="text" name="titre" required>
			<label>description :</label><textarea  name="desc" ></textarea>
			<label>Date</label><input type="date" name="jour"><label>heur de debut</label><input type="number" name="debheur" min="8" max="18">
			<label>heur de fin</label><input type="number" name="finheur" min="9" max="19">
			<input type="submit" name="res">
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
