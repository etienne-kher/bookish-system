<?php session_start(); include('fonction.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Planning</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Press+Start+2P|Russo+One&display=swap" rel="stylesheet">

</head>
<body id="bodyplanning">
	<?php include('header.php') ?>

<main id="maintab">

	<?php

		if(!isset($_GET['w']))
		{	$w=date('W');
			$ann=date('Y');
			header("Location: planning.php?w=$w&ann=$ann");
		}
		else
		{
			//bug lié au zero manquant quand w <10
			$sem=$_GET['w'];
			if($sem[0]!="0" && $sem<10 && $sem>0)
			{
				$sem="0".$sem;
			}
			$ann=$_GET['ann'];
			$tab=sql("SELECT reservations.id,titre,login,debut,fin FROM `reservations`INNER JOIN utilisateurs on reservations.id_user=utilisateurs.id WHERE (DATE_FORMAT(debut,'%u')='".$sem."'and DATE_FORMAT(debut,'%Y')='".$ann."' )or (DATE_FORMAT(fin,'%u')='".$sem."' and DATE_FORMAT(fin,'%Y')='".$ann."') ORDER BY `debut` ");
			$wav=$_GET['w']-1;
			$annav=$ann;
			if($wav<=0)
			{
				$wav=52;
				$annav--;
			}
			$wap=$_GET['w']+1;
			$annap=$ann;
			if ($wap>=53) 
			{
				$wap=1;
				$annap++;
			}
			echo "<h1>Semaine n°".$sem." de l'année ".$ann."</h1>";
		}

	?>

	<table class='tableaureservation' style="border-spacing: 5px 5px;">
		<tr>
			<th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th>
		</tr>
		<?php
		    for ($h=8; $h <19; $h++)
			{ ?>
				<tr>
				<?php
				for ($j=1; $j <6; $j++)
				{ ?>
					<td>
						<?php
						if(empty($tab))
						{ ?><div class="vide">
								<p class="heur"> <?php echo $h; ?> h</p>
							</div>
						<?php }
						else
						{
							foreach ($tab as $key )
							{
							 	if(date("N",strtotime($key[3]))==$j && date("G",strtotime($key[3]))<=$h && date("G",strtotime($key[4]))>$h)
							 	{
							 		$hor=true;
							 		break;
							 	}
							 	else
							 	{
							 		$hor=false;
							 	}

							}
							if(isset($hor) && $hor==false)
							{ ?><div class="vide">
							 		<p class="heur"> <?php echo $h; ?>h</p>
							 	</div>
							<?php }
							else
							{ ?>
								<div class="pris">
									<p class="heur"> <?php echo $h; ?> h</p> <?php
									echo "<a href=\"reservation.php?res=".$key[0]."\" class=\"titre\">".$key[1]."</a>";?>
									<p class=" login"><?php echo $key[2]; ?> </p>
								</div>
							<?php }
						}
						?>
					</td>
			<?php } ?>
				</tr>
		<?php } ?>

	
</table>
<div class="tableaureservation" id="choixsem">
	<a href="planning.php?w=<?php echo $wav ?>&ann=<?php echo $annav ?>">Semaine précédente</a>
	<a href="planning.php?w=<?php echo $wap ?>&ann=<?php echo $annap ?>">Semaine suivante</a>
</div>
</main>
	<?php include('footer.php') ?>
</body>
</html>
