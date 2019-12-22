<?php 
function sql($sql)
{
	$bd=mysqli_connect("localhost","root","","reservationsalles");
	$envoit=mysqli_query($bd,$sql);
	if($sql[0]=="S"||$sql[0]=="s")
	{	
		$reception = mysqli_fetch_all($envoit);
		mysqli_close($bd);
		return $reception;
	}
	mysqli_close($bd);	
}

function chiffre($mdp)
{	
	$mdp=hash('sha512', $mdp);
	$mdp= "p0mm".$mdp."r&dbul1";
	$mdp=hash('sha256', $mdp);
	return $mdp;
}
?>