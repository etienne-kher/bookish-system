<head>
	<link rel="stylesheet" type="text/css" href="reservation.css">

</head>
<header>
	<nav id="header-nav">
		<a href="index.php">Index</a>
		<a href="planning.php">Planning</a>
		<?php
		if(isset($_SESSION['login']))
			{/*conecté*/?>
				<a href="reservation-form.php">Réservation</a>
				<a href="profil.php">Profil</a>
				<a href="index.php?deco=true">Déconnexion</a>
			<?php
			}
			else
			{ /*pas connecter */?>
				<a href="inscription.php">Inscription</a>
		<a href="connexion.php">Connexion</a>

			<?php
			}
		?>


	</nav>
</header>
