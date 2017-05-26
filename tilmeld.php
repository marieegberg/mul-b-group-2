<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="mobil.css">
<link rel="stylesheet" href="medium.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" href="style.css" media="screen and (min-width: 1500px)">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>#VALGPÅSKINNER</title>
</head>
    
<body>
    
<div id="page">
    <header>
            <p class="logo"><a href="index.html">#<span>VALG</span>PÅSKINNER</a></p>
                <p class="logo_mobile"><a href="index.html">#<span>VALG</span>PÅSKINNER</a></p>
        <nav>
			<ul class="nav_bar">
				<li><a href="bidrag.html">Bliv aktiv</a></li>
				<li><a href="kv.html">Kommunalvalg</a></li>
				<li><a href="kommune.html">Din kommune</a></li>
				<li><a href="plan.html">Køreplan</a></li>
				<li><a href="fest_info.html">Fest info</a></li>
				<li><a class="active" href="tilmeld.php">Tilmeld</a></li>
                <li><a href="index.html">Hjem</a></li>
			</ul>
		</nav>
        <img class="photo" src="background_photo.jpg" alt="kommunalvalg" style="width: 100%;">
	</header>
    
    
    <!-- MOBIL NAV START -->
    <nav class="mobile">
		<button></button>
		<div>
			<a href="index.html">Hjem</a>
			<a href="tilmeld.php">Tilmeld</a>
			<a href="fest_info.html">Fest info</a>
			<a href="plan.html">Køreplan</a>
            <a href="kommune.html">Din kommune</a>
            <a href="kv.html">Kommunalvalg</a>
            <a href="bidrag.html">Bliv aktiv</a>
		</div>
	</nav>
	<script src="hamb.js"></script>
    
     <!-- MOBIL NAV SLUT -->
    
<!-- PHP START -->
<?php

		
$tilmeld = filter_input(INPUT_POST, 'tilmeld', FILTER_SANITIZE_STRING);

	if(!empty($tilmeld)){ // button was pressed
		
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) or die('missing/illegal param name');
		$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING) or die('missing/illegal param age');
		$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING) or die('missing/illegal param zip');
		$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING) or die('missing/illegal param city');
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('missing/illegal param email');
		
		require_once('db_tilmeld.php');
		
		$sql = 'INSERT INTO tilmeld (name, age, zip, city, email) VALUES (?, ?, ?, ?, ?)';
		$stmt = $con->prepare($sql);
		$stmt->bind_param("siiss", $name, $age, $zip, $city, $email);
		$stmt->execute();

		//echo 'inserted '.$stmt->affected_rows.' rækker'; 
		$stmt->close();
		}
	
	
	
?>
	<div class="tilmeld">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<h2>TILMELDING TIL VALGFEST</h2><br>
			<input type="text" placeholder="Fulde navn" name="name" required style="width: 19em"><br><br>
			<input type="number" placeholder="Alder" name="age" required style="width: 19em"><br><br>
			<input type="number" placeholder="Postnr." name="zip" required style="width: 19em"><br><br>
			<input type="text" placeholder="By" name="city" required style="width: 19em"><br><br>
			<input type="email" placeholder="Email" name="email" required style="width: 19em"><br><br>
			<input type="submit" name="tilmeld" value="Tilmeld" id=button>
		</form>
	</div><br>
    
<!-- PHP SLUT -->

    <footer>
			<p>DETTE ER ET SKOLEPROJEKT</p>
		</footer>
    </div>
</body>
</html>