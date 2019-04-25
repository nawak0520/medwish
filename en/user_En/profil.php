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
			<a href="./dashboard.html"> <img src="../../images/user/dashboard-inactive.svg" /> Dashboard </a>
			<a href="./profil.html" class="active"> <img src="../../images/user/profil.svg" /> Profil </a>
			<a href="./purchase-history.html">
				<img src="../../images/user/purchase-history-inactive.svg" />Purchase history
			</a>
			<a href="./ico-calendar.html"> <img src="../../images/user/ico-calendar-inactive.svg" />ICO Calendar</a>
			<a href="./kyc-documents.html"> <img src="../../images/user/kyc-documents-inactive.svg" />KYC Documents</a>
			<a href="./my-bounty.html"> <img src="../../images/user/bounty-inactive.svg" />My Bounty</a>
			<!-- <a href="./disable-2fa.html"> <img src="../../images/user/2fa-disable.svg"/></a> -->
		</nav>
		<header>
			<p>Welcome back <?php echo ("Mr.".$_SESSION['login_users']);?> and thank you for believing in Medwish</p>
			<div class="timeleft"><span class="name">MAIN SALE ROUND 1</span> <span>00 : 00 : 00 : 00</span></div>
			<div class="actions">
				<a><img src="../../images/user/notification.svg"/></a><a><img src="../../images/user/logout.svg"/></a>
			</div>
		</header>
		<div class="content">
			<div class="panel">
				<h2>Personal Information</h2>
				<?php     
					require "../../script/scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
					$db = connexionBase(); // Appel de la fonction de connexion
					// echo($_SESSION['id_users']);
					// echo($_SESSION["login_users"]);
					// echo($_SESSION["pwd_users"]);
					// echo($_SESSION["email_users"]); 
					// echo($_SESSION["id_users"]);
					// echo($_SESSION["flag"]);
					$requete = "SELECT * FROM Users WHERE Users_Id=".$_SESSION['id_users'];
				
					$result = $db->query($requete);
					$Use = $result->fetch(PDO::FETCH_OBJ);
					$result = null;					

				?>
				<form class="row" method="POST" action="../script_En/scriptModifUser.php">
					<div class="column">
						<div class="row"><label for="firstname">Name</label><label for="Surname">Surname</label></div>
						<div class="row">
							<input name="firstname" placeholder="Last Name (Surname)" value="<?php echo $Use->Users_Name; ?>"/>
							<input name="lastname" placeholder="Last Name (Surname)" value="<?php echo $Use->Users_Surname; ?>"/>
						</div>
						
						<div class="row">
							<label for="gender">Gender</label> <label for="nationality">Nationality</label>
						</div>
						<div class="row">
							<select name="gender" >
							<?php
								if ($Use->Users_Gender == "male")
								{
									?>
								<option value="male" selected>Male</option>
								<option value="female" >Female</option>
								<?php
								}
								else
								{ 
								?>
								<option value="male" >Male</option>
								<option value="female" selected>Female</option>
								<?php
								}
								?>
							</select>
							<select name="nationality">
							<?php 
								$requete2 = "SELECT * FROM Nationality ORDER BY Nationality_Id asc";
							
								$result2 = $db->query($requete2);
								
								if (!$result2) 
								{
									$tableauErreurs = $db->errorInfo();
									echo $tableauErreur[2]; 
									die("Erreur dans la requête");
								}
								
								if ($result2->rowCount() == 0) {
								// Pas d'enregistrement
									die("La table est vide");
								}
								$nation = $Use->Users_Nationality_Id;

								while ($row2 = $result2->fetch(PDO::FETCH_OBJ)){
									if ($nation == $row2->Nationality_Id){
									?>
										<option value="<?=$row2->Nationality_Id?>" selected="selected"><?=$row2->Nationality_Fr?></option>
									<?php 
									}
									else {
									?>
										<option value="<?=$row2->Nationality_Id?>"><?=$row2->Nationality_Fr?></option>
									<?php 
									}
								}
								$result2 =null?>
							</select>
						</div>
						<div class="row"><label for="dateofbirth">Date of Birth</label></div>
						<div class="row"><input type="date" name="dateofbirth" class="left" value="<?php echo $Use->Users_Birthdate; ?>"/></div>
						<div class="row"><label for="streetline">Address Information</label></div>
						<div class="row"><input name="streetline" placeholder="Street address" class="left" value="<?php echo $Use->Users_Address1; ?>" /></div>
						<div class="row"><input name="streetline2" placeholder="Street address line 2" class="left" value="<?php echo $Use->Users_Address2; ?>" /></div>
						<div class="row">
							<input name="city" placeholder="City" class="left" value="<?php echo $Use->Users_City; ?>"/>
							<input name="state" placeholder="State/Province" class="left" value="<?php echo $Use->Users_State; ?>"/>
						</div>
						<div class="row">
							<input name="zipcode" placeholder="Postal / Zip Code" class="left" value="<?php echo $Use->Users_CP; ?>"/>
							<select name="county" class="left">
							<?php 
								$requete3 = "SELECT * FROM Country ORDER BY Country_id asc";
							
								$result3 = $db->query($requete3);
								
								if (!$result3) 
								{
									$tableauErreurs = $db->errorInfo();
									echo $tableauErreur[2]; 
									die("Erreur dans la requête");
								}
								
								if ($result3->rowCount() == 0) {
								// Pas d'enregistrement
									die("La table est vide");
								}

								$country = $Use->Users_Country_id;

								while ($row3 = $result3->fetch(PDO::FETCH_OBJ)){
									if ($country == $row3->Country_id){
									?>
										<option value="<?=$row3->Country_id?>" selected="selected"><?=$row3->Country_fr_fr?></option>
									<?php 
									}
									else {
									?>
										<option value="<?=$row3->Country_id?>"><?=$row3->Country_fr_fr?></option>
									<?php 
									}
								}
								$result3 =null?>
							</select>
						</div>
					</div>
					<div class="column">
						<div class="row">
							<label>My personal ETH Wallet Adress ETH/ERC 20</label>
						</div>
						<div class="row"><input name="" placeholder="0x73957709695E7.........." class="left" /></div>
						<div class="row"><label>Phone Number </label></div>
						<div class="row"><input name="phone" placeholder="" class="left" value ="<?php echo $Use->Users_Phone; ?> "/></div>
						<div class="row"><label>Mail address</label></div>
						<div class="row"><input name="eMail" placeholder="" class="left" value ="<?php echo $Use->Users_Mail	; ?> "/></div>
						<div class="row"><label>Profession </label></div>
						<div class="row"><input name="job" placeholder="" class="left" value ="<?php echo $Use->Users_Job; ?> "/></div>
						<div class="row"><button type="submit" value ="EDIT" name="EDIT" id = "EDIT">EDIT</button></div>
					</div>
				</form>
			</div>
		</div>
		<footer>
			<div class="documents">
				<button class="inset">Whitepaper</button> <button class="inset">One Page</button>
				<button class="inset">Bounty</button> <button class="inset">Commitment</button>
			</div>
			<div class="share">
				<a href="#"><img src="../../images/github.svg"/></a> <a href="https://medium.com/@contact_55394"><img src="../../images/medium.svg"/></a>
				<a href="https://www.facebook.com/Medwish.io"><img src="../../images/facebook.svg"/></a> <a href="#"><img src="../../images/bitcoin.svg"/></a>
				<a href="#"><img src="../../images/youtube.svg"/></a> <a href="https://t.me/medwish"><img src="../../images/telegram.svg"/></a>
				<a href="https://twitter.com/Medwish_io"><img src="../../images/twitter.svg"/></a> <a href="https://www.linkedin.com/company/medwish-blokchain/about/"><img src="../../images/linkedin.svg"/></a>
				<a href="#"><img src="../../images/reddit.svg"/></a>
			</div>
			<pre class="copyrights">
Privacy & Policy
Copyright © Medwish. All rights reserved</pre
			>
		</footer>
	</body>
</html>
<?php
}
else{
echo '<body onLoad="alert(\'Connectez-vous pour acceder &agrave; cette partie du site\'); window.location=\'../login.html\';">';  //sinon redirection sur le login       
}

?>
