<?php

session_start();

if (isset($_SESSION['id_users']))
{ //si la variable de session id_users existe on autorise la connexion au tableau de bord

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" href="../../style/user.css" />
		<link rel="stylesheet" href="../../style/fonts.css" />
		<title>Document</title>
	</head>
	<body>
		<nav>
			<img src="../../images/logo.svg" />
			<a href="./dashboard.php"> <img src="../../images/user/dashboard-inactive.svg" /> Tableau de bord </a>
			<a href="./profil.php"> <img src="../../images/user/profil-inactive.svg" /> Profil </a>
			<a href="./purchase-history.php">
				<img src="../../images/user/purchase-history-inactive.svg" />Historique des achats
			</a>
			<a href="./ico-calendar.php"> <img src="../../images/user/ico-calendar-inactive.svg" />Calendrier ICO</a>
			<a href="./kyc-documents.php" class="active">
				<img src="../../images/user/kyc-documents.svg" />KYC Documents
			</a>
			<a href="./my-bounty.php"> <img src="../../images/user/bounty-inactive.svg" />Mon Bounty</a>
			<!-- <a href="./disable-2fa.php"> <img src="../../images/user/2fa-disable.svg"/></a> -->
		</nav>
		<header>
			<p>Bon retour <?php echo ("Mr.".$_SESSION['login_users']);?> et merci de croire en Medwish</p>
			<div class="timeleft"><span class="name">VENTE PRINCIPALE CYCLE 1</span> <span>00 : 00 : 00 : 00</span></div>
			<div class="actions">
				<a><img src="../../images/user/notification.svg"/></a><a href=../script_Fr/scriptLogout.php title="Deconnexion"><img src="../../images/user/logout.svg"/></a>
			</div>
		</header>
		<div class="content">
			<div class="panel kyc">
				<h2>Documents Personels KYC</h2>

				<form class="row" method="POST" action="../script_Fr/scriptKyc.php" enctype="multipart/form-data"> 

					<div class="column">
						<div class="row"><label for="typeDoc">Type de document envoyé</label></div>
						<div class="row">
							<select name="typeDoc">
								<option selected="selected">PassePort</option>
								<option>Carte nationale d'identité</option>
								<option>Permis de conduire</option>
								<option>Visa Immigrant - Carte Verte</option>
							</select>
						</div>	
					
						<div class="row"><label >télécharger le fichier (format accepté : -jpeg, -png)</label></div>
							<div class="row">
							<input type="file" name="proof[]"  id="proofId" required>
						</div>

						<div class="separator"></div>
						<div class="separator"></div> 
					
						<div class="row"><label>Numero d'identification du document</label></div>
						<div class="row">
							<input type="text" name="numId" id="numId" required/>
						</div>

						<div class="row"><label>Selfie de votre document (format accepté : -jpeg, -png)</label></div>
						<div class="row">
							<input type="file" name="proof[]"  id="selfiProofId" required/>
						</div>
						<!-- <div class="separator"></div><br>
						<div class="row">
							<select>
								<option>Crypto-tradings</option>
							</select>
						</div> -->

						<div class="separator"></div>
						<button type="submit" value ="confirmer" name="confirmer" id = "confirmer">Confirmer</button>
					</div>
				</form>	
			</div>
		</div>
			
		<footer>
			<div class="documents">
				<button class="inset">Livre blanc</button> <button class="inset">One Page</button>
				<button class="inset">Bounty</button> <button class="inset">Engagement</button>
			</div>
			<div class="share">
				<a href="#"><img src="../../images/github.svg"/></a>
				<a href="https://medium.com/@contact_55394"><img src="../../images/medium.svg"/></a>
				<a href="https://www.facebook.com/Medwish.io"><img src="../../images/facebook.svg"/></a>
				<a href="#"><img src="../../images/bitcoin.svg"/></a> <a href="#"><img src="../../images/youtube.svg"/></a>
				<a href="https://t.me/medwish"><img src="../../images/telegram.svg"/></a>
				<a href="https://twitter.com/Medwish_io"><img src="../../images/twitter.svg"/></a>
				<a href="https://www.linkedin.com/company/medwish-blokchain/about/"
					><img src="../../images/linkedin.svg"
				/></a>
				<a href="#"><img src="../../images/reddit.svg"/></a>
			</div>
			<pre class="copyrights">
				Vie privée et politique
				Copyright © Medwish. Tous droits réservés
			</pre>
		</footer>
	</body>
</html>

<?php
}
else{
echo '<body onLoad="alert(\'Connectez-vous pour acceder &agrave; cette partie du site\'); window.location=\'../login.html\';">';  //sinon redirection sur le login       
}

?>