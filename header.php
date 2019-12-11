<header>
	<nav id="header-nav">
		<?php 
		if(isset($_SESSION['login']))
			{?>
				<a href="profil.php">profil</a>
				<a href="index.php?deco=true">deconnexion</a>
			<?php
			}
			else
			{?>
				<a href="inscription.php">inscription</a>
		<a href="connexion.php">connexion</a>
			<?php
			}
		?>
		<a href="index.php">index</a>
		<a href="reservation.php">reservation</a>
		<a href="planning.php">planning</a>
		
	</nav>
</header>