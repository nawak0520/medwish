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
			<a href="./dashboard.php"> <img src="../../images/user/dashboard-inactive.svg" /> Dashboard </a>
			<a href="./profil.php"> <img src="../../images/user/profil-inactive.svg" /> Profil </a>
			<a href="./purchase-history.php">
				<img src="../../images/user/purchase-history-inactive.svg" />Purchase history
			</a>
			<a href="./ico-calendar.php"> <img src="../../images/user/ico-calendar-inactive.svg" />ICO Calendar</a>
			<a href="./kyc-documents.php"> <img src="../../images/user/kyc-documents-inactive.svg" />KYC Documents</a>
			<a href="./my-bounty.php"> <img src="../../images/user/bounty-inactive.svg" />My Bounty</a>
			<a href="./dashboard.php"> <img src="../../images/user/2fa-enable.svg"/></a>
		</nav>
		<header>
			<p>Welcome back <?php echo ("Mr.".$_SESSION['login_users']);?> and thank you for believing in Medwish</p>
			<div class="timeleft"><span class="name">MAIN SALE ROUND 1</span> <span>00 : 00 : 00 : 00</span></div>
			<div class="actions">
				<a><img src="../../images/user/notification.svg"/></a><a><img src="../../images/user/logout.svg"/></a>
			</div>
		</header>
		<div class="content"></div>
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
Copyright © Medwish. All rights reserved</pre>
		</footer>
	</body>
</html>
<?php
}
else{
echo '<body onLoad="alert(\'Connectez-vous pour acceder &agrave; cette partie du site\'); window.location=\'../login.html\';">';  //sinon redirection sur le login       
}

?>

