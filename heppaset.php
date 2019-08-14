		<?php session_start(); 
			$palvelin = "localhost";
			$kayttaja = "root"; 
			$salasana = "";
			$tietokanta = "hevoset";
			$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
			if ($yhteys->connect_error) {
				die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
			}
			mysqli_set_charset($yhteys,"utf8");		
			if (isset($_GET["ulos"])){
				session_unset();
				session_destroy();
				echo "Onnistunut uloskirjautuminen";
			}
		?>

<!DOCTYPE>

	<html>
		<head>
	
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="tyyli.css">
			<script language="javascript">
				function siirry(){
					document.location.href = document.heppaset.profiili.value
				}
			</script>

				
		</head>
	
	<body>
	
		<?php 
		if (isset($_SESSION["tunnus"])){?>
	<div class="profiili">
		<form name="heppaset">
		<select name="profiili" onchange="siirry()">
			<option> Profiili </option>
			<option value="profiili.php">Muokkaa profiilia</option>
			<option value="heppaset.php?ulos" >Kirjaudu ulos</option>
			<option  value="keskustelu.php" >Siirry keskusteluun</option>
		</select>
		</form>
	</div>
	
		<?php }
		?>	
		
	<div class="logo">
		Heppaset
	</div>
	
	<div class="sisalto">
	
	<div style="clear:both;"></div>
	
	<div class="vasenreuna">
		<form action="heppaset.php" method="post">
			Hae tietoja hevosesta nimen tai rodun perusteella:<br>
			<input type="text" name="haku">
			<input type="submit" name="hae" value="HAE">
		</form>
		
		<form action="heppaset.php" method="post">
		<?php
			$sql= "Select nimi, rotu, isa, ema from hevoset ";
				if (isset ($_POST["hae"])&&($_POST["haku"]!="")){
					$haku= mysqli_real_escape_string($yhteys, $_POST["haku"]);
					$sql= $sql. "where nimi like '%$haku%' or rotu like '%$haku%'";
					$tulokset=$yhteys->query($sql);
				while($rivi = $tulokset->fetch_assoc()) {
					echo "Nimi: " .$rivi['nimi']. " <br> Rotu: " .$rivi['rotu']. " <br> Isä: " .$rivi['isa']. " <br> Emä: " .$rivi['ema']. "<br>";
					}
				}
				if (isset($_SESSION["tunnus"])){
					echo "Lisää Hevosen tiedot:<br>Nimi: <input type='text' name='hnimi'><br>Rotu: <input type='text' name='hrotu'><br>Omistaja: <input type='text' name='homistaja'><br>
					Isä: <input type='text' name='hisa'><br>Emä: <input type='text' name='hema'><br><br><input type='submit' name='lisaa'><br><br>";
				}
		
				if(isset($_POST["lisaa"])){
					$hnimi=mysqli_real_escape_string($yhteys, $_POST["hnimi"]);
					$hrotu=mysqli_real_escape_string($yhteys, $_POST["hrotu"]);
					$homistaja=mysqli_real_escape_string($yhteys, $_POST["homistaja"]);
					$hisa=mysqli_real_escape_string($yhteys, $_POST["hisa"]);
					$hema=mysqli_real_escape_string($yhteys, $_POST["hema"]);
			
					$lisaaheppa="insert into hevoset (nimi, rotu, omistaja, isa, ema) values ('$hnimi', '$hrotu', '$homistaja', '$hisa', '$hema')";
					$onnistunut=$yhteys->query($lisaaheppa);
						if($onnistunut==TRUE){
							echo "<strong>Hevosen tiedot lisätty tietokantaan</strong>";
						}else{
							echo "<strong>Valitettavasti lisäys ei onnistunut. Yritä myöhemmin uudelleen</strong>";
						}
				}
			?>
		</form>
	</div>
	
	<div id="kuva">
		<img src="dokumentointikansi.jpg" alt="Kuva">
	</div>
			
	<div class="oikeareuna">
		<a href="tietoa.php"><br>TIETOA <br> MEISTÄ<br><br></a>
	</div>
	
	<div class="oikeareuna">
		<h1>Uutiset Hippokselta:</h1>
		<br>
		<img src="raviurheilu_logo.jpg">
		<?php 
			$xml=simplexml_load_file("http://www.hippos.fi/rss/ajankohtaista_ravit");
			$syote=$xml->children()[0];
			foreach($syote->children() as $uutinen){
			echo "<a href=$uutinen->link target='_blank'> $uutinen->title </a>";
			if($uutinen !=""){
				echo "<br><br>";
			} 
				
			}
		?>
	</div>
	
		<?php
			$kirjautuminen_ok=TRUE;
			if (isset($_POST['kirjaudu'])){
				if(!isset($_POST['salasana']) || ($_POST['salasana'])=="" || !isset($_POST['nimimerkki']) || ($_POST['nimimerkki'])==""){
					echo "Täytäthän vaaditut tiedot";
				}else {
					$nikki= mysqli_real_escape_string($yhteys, $_POST['nimimerkki']);
					$salasana= mysqli_real_escape_string($yhteys, $_POST['salasana']);
					$haku= "select NIMI from kayttajat where NIMI like '$nikki' and SALASANA like '$salasana'";
					$tulos=$yhteys->query($haku);
						if($tulos==TRUE){
							$_SESSION["tunnus"]=$_POST["nimimerkki"];
						}else if ($tulos==FALSE){
							$kirjautuminen_ok=FALSE;
						} 
				}
			}

			if (!isset($_SESSION["tunnus"])) :
		?>	
		
	<div id="kirjautuminen">
		<form action="heppaset.php" name="kirjaudu" method="post" >
			<fieldset>
			<legend>Kirjaudu sisään:</legend>
			Käyttäjätunnus:<br>
			<input type="text" name="nimimerkki">
			<br>
			Salasana:<br>
			<input type="password" name="salasana" >
			<br><br>
			<input type="submit" name="kirjaudu" value="Kirjaudu sisään">
			<br><br>
			</fieldset>
			<fieldset>
			<br>
			<a href="rekisteroidy.php">TAI REKISTERÖIDY TÄSTÄ</a>
			<br>
			</fieldset>	
		</form>
		<?php
			if(!$kirjautuminen_ok){
				echo "<strong>Tietojasi ei löytynyt. <br> Tarkista nimimerkki ja salasana.<br> Jos et vielä ole rekisteröitynyt, rekisteröidy</strong>";
			}
		?>
	</div>
		<?php else : ?>
			
		
	<div id="kirjautuminen">
		<?php 
			$kayttajannimi=$_SESSION["tunnus"];
				echo "<br> <strong>Tervetuloa, $kayttajannimi!</strong> <br>
				<a href='heppaset.php?ulos'>Kirjaudu ulos</a>
				<br><br>";
		?>
		
	</div>
		<?php
		endif;
		?>


	
	<div class="vasenreuna">
		<a href="keskustelu.php">KESKUSTELUUN</a>
	</div>
	
	</div>

	</body>
	
</html>