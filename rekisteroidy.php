		<?php session_start();
		$palvelin = "localhost";
		$kayttaja = "root"; 
		$salasana = "";
		$tietokanta = "hevoset";

		$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
		if ($yhteys->connect_error) 
		{
		die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
		}
		mysqli_set_charset($yhteys,"utf8");		
		
		
		?>

<!DOCTYPE>

	<html>
	
		<head>
	
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="tyyli.css">
	  
		</head>
	
	
	<body>
	
	<div class="logo">
	Heppaset
	</div>
	
	<div class="sisalto">


	<div id="lomake">
	<form action="rekisteroidy.php" method="post">
		<fieldset>
		<legend>Rekisteröidy:</legend>
		Etunimi: <br><input type="text" name="nimi">
		<br>
		Sukunimi: <br><input type="text" name="sukunimi">
		<br>
		Sähköposti: <br><input type="text" name="email">
		<br>
		Puhelinnumero: <br><input type="text" name="puh">
		<br>
		Nimimerkki: <br><input type="text" name="nimimerkki">
		<br>
		Salasana: <br><input type="password" name="salasana">
		<br>
		Haluan saada Heppasilta sähköpostia minua kiinnostavista uutisista: <input type="radio">
		<br><br>
		<input type="submit" name="laheta" value="Lähetä">
		</fieldset>
		</form>	
	</div>
	
	
	<div id="heppa">
		<img src="heppa.jpg">
	</div>
	

	
	
	<div class="vasenreuna">
		<a href="heppaset.php">TAKAISIN ETUSIVULLE<a>
		</div>

	
	
	
	<div class="echo">
		<?php

				 
		if (isset ($_POST["laheta"])){
			 if(isset($_POST["nimi"]) && $_POST["nimi"] != "" && isset($_POST["sukunimi"]) &&  $_POST["sukunimi"] != "" && isset($_POST["salasana"]) && $_POST["salasana"] != "" && isset ($_POST["email"])
			 && $_POST["email"] != "" && isset($_POST["nimimerkki"]) && $_POST["nimimerkki"] != ""){
				 $nikki=mysqli_real_escape_string($yhteys,$_POST["nimimerkki"]);
				 $ssana=mysqli_real_escape_string($yhteys,$_POST["salasana"]);
				 $meili=mysqli_real_escape_string($yhteys,$_POST["email"]);
				 $numero=mysqli_real_escape_string($yhteys,$_POST["puh"]);
					if (!filter_var($meili, FILTER_VALIDATE_EMAIL)){
						echo "Tarkista sähköposti.";
					}else if (!preg_match('/^[a-zA-Z0-9\s]+$/', $nikki)) {
						echo "Tarkista nimimerkki. Nimimerkkisi ei voi sisältää erikoismerkkejä";
					}else if (strlen($ssana) < 8){
						echo "Salasanan tulee sisältää vähintään 8 merkkiä";
					}else if (!is_numeric($numero)){
						echo "Tarkista puhelinnumero";	
					}else {
				 $lisaasql="Insert into kayttajat (NIMI, SALASANA, email) values ('$nikki', '$ssana', '$meili') ";
				 $onnistui=$yhteys->query($lisaasql);
					if ($onnistui==TRUE){
				 echo "Tervetuloa käyttäjäksi, $nikki ";
				 $_SESSION["tunnus"]=$_POST["nimimerkki"];
					}}
				 } else {
				 echo "Täytäthän vaadittavat tiedot";
				 }}
				 
		
		?>
	</div>
	
	</div>
	
	
	</body>
	</html>