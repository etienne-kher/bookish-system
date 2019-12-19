<?php session_start(); include('fonction.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Planning</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<?php include('header.php') ?>
	<?php
		
		if(!isset($_GET['w']))
		{	$w=date('W');
			header("Location: planning.php?w=$w");
		}
		else
		{	
			$sem=$_GET['w'];
			$ann=date('Y');
			$tab=sql("SELECT reservations.id,titre,login,debut,fin FROM `reservations`INNER JOIN utilisateurs on reservations.id_user=utilisateurs.id WHERE (DATE_FORMAT(debut,'%u')='".$sem."'and DATE_FORMAT(debut,'%Y')='".$ann."' )or (DATE_FORMAT(fin,'%u')='".$sem."' and DATE_FORMAT(fin,'%Y')='".$ann."') ORDER BY `debut` ");
			$wav=$_GET['w']-1;
			$wap=$_GET['w']+1;
		}
		
	?>
	<table>
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
	<a href="planning.php?w=<?php echo $wav ?>">Semaine précédente</a>
	<a href="planning.php?w=<?php echo $wap ?>">Semaine suivante</a>
	<?php include('footer.php') ?>
</body>
</html>
