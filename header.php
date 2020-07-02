<header>
	<div class="menu">
		<div class="menu_header">
			<div class="menu_logo">
				<a href="index.php" class="logo">
						<img src="images/logo2.png" />
				</a>
			</div>
			<div class="menu_icon" id="menu">
				<?php   $connected = isset($_SESSION['email']) ? true : false;
        if(!$connected){ ?>
				<li><a class="link" href="#">
						<svg class="compteSvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
								y="0px" viewBox="0 0 563.43 563.43" style="enable-background:new 0 0 563.43 563.43;" xml:space="preserve" width="512px"
								height="512px">
								<g >
										<path class="pathCompte" d="M280.79,314.559c83.266,0,150.803-67.538,150.803-150.803S364.055,13.415,280.79,13.415S129.987,80.953,129.987,163.756  S197.524,314.559,280.79,314.559z M280.79,52.735c61.061,0,111.021,49.959,111.021,111.021S341.851,274.776,280.79,274.776  s-111.021-49.959-111.021-111.021S219.728,52.735,280.79,52.735z M19.891,550.015h523.648c11.102,0,19.891-8.789,19.891-19.891c0-104.082-84.653-189.198-189.198-189.198H189.198  C85.116,340.926,0,425.579,0,530.124C0,541.226,8.789,550.015,19.891,550.015z M189.198,380.708h185.034  c75.864,0,138.313,56.436,148.028,129.524H41.17C50.884,437.607,113.334,380.708,189.198,380.708z"
												data-original="#000000" class="active-path" data-old_color="#000000" fill="#000000" />
								</g>
						</svg>
				</a>
					<ul class="menu_compte">
						<li class="compte_top"><h1>Mon compte</h1></li>
						<li class="compte_account"><h1>Vous avez déjà un compte ?</h1></li>
						<li class=""><a href="connexion.php">Se connecter</a></li>
						<li class="transition"><h1>Ou</h1></li>
						<li class="compte_noaccount"><h1>Pas encore de compte ?</h1></li>
						<li class="compte_bottom"><a href="connexion.php">Créer un compte</a></li>
					</ul>
			</li>
		<?php } else{ ?>
			<li><a class="link" href="#">
					<svg class="compteSvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
							y="0px" viewBox="0 0 563.43 563.43" style="enable-background:new 0 0 563.43 563.43;" xml:space="preserve" width="512px"
							height="512px">
							<g >
									<path class="pathCompte" d="M280.79,314.559c83.266,0,150.803-67.538,150.803-150.803S364.055,13.415,280.79,13.415S129.987,80.953,129.987,163.756  S197.524,314.559,280.79,314.559z M280.79,52.735c61.061,0,111.021,49.959,111.021,111.021S341.851,274.776,280.79,274.776  s-111.021-49.959-111.021-111.021S219.728,52.735,280.79,52.735z M19.891,550.015h523.648c11.102,0,19.891-8.789,19.891-19.891c0-104.082-84.653-189.198-189.198-189.198H189.198  C85.116,340.926,0,425.579,0,530.124C0,541.226,8.789,550.015,19.891,550.015z M189.198,380.708h185.034  c75.864,0,138.313,56.436,148.028,129.524H41.17C50.884,437.607,113.334,380.708,189.198,380.708z"
											data-original="#000000" class="active-path" data-old_color="#000000" fill="#000000" />
							</g>
					</svg>
			</a>
				<ul class="menu_compte">
					<li class="compte_top"><h1 id="bienvenue">Bienvenue <?= $_SESSION['prenom']?> <?= $_SESSION['nom']?></h1></li>
					<li class=""><a href="profil.php">Mon profil</a></li>
					<li class="transition"><h1>Ou</h1></li>
					<li class="deconnexion"><a href="deconnexion.php">Se deconnecter</a></li>
				</ul>
		</li>
		<?php } ?>
			</div>
	</div>
		<div class="menu_lvl1">
			<a class="link" href="index.php"> Accueil </a>
			<a class="link" href="services.php"> Nos Services </a>
			<a class="link" href="aeroclub.php"> Aéroclub </a>
		</div>
	</div>
</header>
