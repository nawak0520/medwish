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
		<link rel="stylesheet" href="../../style/dashboard.css" />
		<link rel="stylesheet" href="../../style/fonts.css" />
		<title>Document</title>
	</head>
	<body>
		<nav>
			<img src="../../images/logo.svg" />
			<a href="./dashboard.php" class="active"> <img src="../../images/user/dashboard.svg" /> Dashboard </a>
			<a href="./profil.php"> <img src="../../images/user/profil-inactive.svg" /> Profil </a>
			<a href="./purchase-history.php">
				<img src="../../images/user/purchase-history-inactive.svg" />Purchase history
			</a>
			<a href="./ico-calendar.php"> <img src="../../images/user/ico-calendar-inactive.svg" />ICO Calendar</a>
			<a href="./kyc-documents.php"> <img src="../../images/user/kyc-documents-inactive.svg" />KYC Documents</a>
			<a href="./my-bounty.php"> <img src="../../images/user/bounty-inactive.svg" />My Bounty</a>
			<!-- <a href="./disable-2fa.php"> <img src="../../images/user/2fa-disable.svg"/></a> -->
		</nav>
		<header>
			<p>Welcome back <?php echo ("Mr.".$_SESSION['login_users']);?> and thank you for believing in Medwish</p>
			<div class="timeleft"><span class="name">MAIN SALE ROUND 1</span> <span>00 : 00 : 00 : 00</span></div>
			<div class="actions">
				<a><img src="../../images/user/notification.svg"/></a><a><img src="../../images/user/logout.svg"/></a>
			</div>
		</header>
		<div class="content">
			<div class="row no-flex">
				<div class="panel">
					My ID Medwish <span class="input readonly"><span class="value"><?php echo ($_SESSION['id_users']);?></span></span>
				</div>
				<div class="progress-bar">
					<div class="soft">SOFT CAP</div>
					<div class="normal">NORMAL CAP</div>
					<div class="optimal">OPTIMAL CAP</div>
					<div class="hard">HARD CAP</div>
					<div class="innerbar" style="width: 55%;"><div class="total">10,526,789 EUROS</div></div>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<div class="panel token">
						<div class="row">
							<h3>My Medwish Tokens <img src="../../images/user/section.svg" /></h3>
							<select>
								<option>MWT / EUR</option>
							</select>
						</div>
						<div class="row">
							<span class="label">Purchased MWT</span>
							<span class="input readonly">
								<span class="value">40 000</span><span class="label">MWT</span>
							</span>
							<img src="../../images/user/exchange.svg" />
							<span class="input readonly">
								<span class="value">400</span><span class="label">EUR</span>
							</span>
						</div>
						<div class="row">
							<span class="label">MWT from Bounty</span>
							<span class="input readonly">
								<span class="value">6 000</span><span class="label">MWT</span>
							</span>
							<img src="../../images/user/exchange.svg" />
							<span class="input readonly">
								<span class="value">60</span><span class="label">EUR</span>
							</span>
						</div>
						<div class="row">
							<span class="label">MWT from Affiliate program</span>
							<span class="input readonly">
								<span class="value">10 000</span><span class="label">MWT</span>
							</span>
							<img src="../../images/user/exchange.svg" />
							<span class="input readonly">
								<span class="value">100</span><span class="label">EUR</span>
							</span>
						</div>
						<div class="row">
							<span class="label"></span>
							<hr />
						</div>
						<div class="row">
							<span class="label">Total MWT</span>
							<span class="input readonly">
								<span class="value">56 000</span><span class="label">MWT</span>
							</span>
							<img src="../../images/user/exchange.svg" />
							<span class="input readonly">
								<span class="value">560</span><span class="label">EUR</span>
							</span>
						</div>
					</div>
					<div class="panel">
						<h3><img src="../../images/user/section.svg" /> MWT</h3>
					</div>
				</div>
				<div class="column">
					<div class="panel campaign">
						<h3><img src="../../images/user/section.svg" /> My Bounty campaign “on”</h3>
						<div class="row">
							<img src="../../images/user/bounty-newsletter.svg" />
							<img src="../../images/user/bounty-twitter.svg" />
							<img src="../../images/user/bounty-telegram.svg" />
						</div>
						<div class="row">
							<img src="../../images/user/bounty-translation.svg" />
							<img src="../../images/user/bounty-facebook.svg" />
							<img src="../../images/user/bounty-special.svg" />
						</div>
						<div class="row">
							<img src="../../images/user/bounty-bitcointalk.svg" class="inactive"/>
							<img src="../../images/user/bounty-linkedin.svg" class="inactive" />
							<img src="../../images/user/bounty-media.svg" class="inactive" />
						</div>
					</div>
					<div class="panel column golden-ticket">
						<h3><img src="../../images/user/golden-ticket.svg" /> Golden Ticket</h3>
						<span>
							You have
							<div class="golden-chance">3</div>
							Ticket to Win<br />
							10 000 000 MWT
						</span>
						<a>Read terms</a>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="documents">
				<button class="inset">Whitepaper</button> <button class="inset">One Page</button>
				<button class="inset">Bounty</button> <button class="inset">Commitment</button>
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
