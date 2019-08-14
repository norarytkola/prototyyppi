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
			<script language="javascript">
				function siirry(){
					document.location.href = document.heppaset.profiili.value
				}
			</script>
	  
		</head>
	
	<body>
		<?php 
		if (isset($_SESSION["tunnus"])){?>
	<form name="heppaset">
	<div class="profiili">
	<select name="profiili" onchange="siirry()">
		<option> Profiili</option>
		<option value="heppaset.php">Takaisin etusivulle</option>
		<option value="profiili.php">Muokkaa profiilia</option>
		<option value="ulos">Kirjaudu ulos</option>
		<option  value="keskustelu.php" >Siirry keskusteluun</option>
	</select>
	</div>
	</form>
		<?php }
			?>
	
	
	
	<div class="logo">
	Heppaset
	</div>
	
	<div id="sisalto">
	

	
	<div class="vasenreuna">
	<a href="heppaset.php">TAKAISIN ETUSIVULLE<a>
	</div>
	
	<div style="clear:both;"></div>
	

	<div class="vasenreuna">
	
	<table>
		<?php
		$keskustelu="select aihe from keskustelu";
		$aihe=$yhteys->query($keskustelu);
		$i=1;
		while($rivi = $aihe->fetch_assoc()){
			$keskustelu.="where id=$i";
			echo "<tr><a href='keskustelu.php?id=$i'>".$rivi['aihe']."</a></tr><br><br>";
			$i++;
		}
		
		?>
		</table>
	</div>
	
	<div id="kuva2">
		<img src="image.jpg" alt="kuva">
	</div>
	
	<div>
	 <form action="keskustelu.php" method="post">
	 
	 <?php if(isset($_SESSION["tunnus"])){ ?>
	 <div class="oikeareuna">
	<strong>Jäsenet:</strong><br>
		<?php
			$jasenet="select NIMI, kuvaus from kayttajat";
			$jasenlista=$yhteys->query($jasenet);
			while ($jasen=$jasenlista->fetch_assoc()){
				echo "<div class='pikkudivi'><fieldset><strong>Käyttäjä: </strong>".$jasen['NIMI']."</fieldset><br><fieldset><strong>Kuvaus: </strong>".$jasen['kuvaus']."</fieldset><br></div>";
				
			}

		
		?>
	 </div> <?php } ?>
	<div class="vasenreuna">

		<form action="keskustelu.php" method="post">
			<fieldset>
			<legend>Uusi Keskustelu</legend>
				<?php
				if(isset($_SESSION["tunnus"])){
					echo "Otsikko:<br><input type='text' name='otsikko'><br>
					Teksti:<br><textarea name='teksti' rows='10' cols='30'></textarea>
					<br><input type='submit' name='send' value='Lähetä'>";
						if (isset ($_POST["send"])){
							$otsikko=mysqli_real_escape_string($yhteys, $_POST["otsikko"]);
							$tekstikentta=mysqli_real_escape_string($yhteys, $_POST["teksti"]);
							$nikki=mysqli_real_escape_string($yhteys, $_SESSION['tunnus']);
							$uusi="insert into keskustelu (aihe, teksti, nikki) values ('$otsikko', '$tekstikentta', '$nikki')";
							$a = $yhteys->query($uusi);
								if ($a==TRUE){
									echo "Uusi keskustelu avattu.";
								}else {
									echo " Virhe lisätessä viestiä. Yritä myöhemmin uudelleen";
				}}} else {
							echo "<a href='heppaset.php'>Kirjaudu sisään</a> tai <a href='rekisteroidy.php'>rekisteröidy</a> aloittaaksesi keskustelu.";
				}
				
				?>
			</fieldset>
		</form>
	</div>
	
	<div id="keskustelu">
		<?php
		
		
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$haku="select aihe, teksti, nikki from keskustelu where id=$id";	
			$tulokset = $yhteys->query($haku);
				while($rivi = $tulokset->fetch_assoc()) {
					echo "<fieldset><h1> Otsikko:<br>" .$rivi['aihe']. "</h1><br>Teksti:<br>" .$rivi['teksti']. "<br>Nimimerkki:<br><a>" .$rivi['nikki']. "</a><br></fieldset>";
					}
			$haku="select vastaus, nimimerkki from vastaus where aiheid=$id";
			$tulokset = $yhteys->query($haku);
				while($rivi = $tulokset->fetch_assoc()) {
					echo "<fieldset> Vastaus:<br>" .$rivi['vastaus']. "<br>Nimimerkki:<br><a>" .$rivi['nimimerkki']. "</a><br></fieldset>";
					}	
			if (isset($_SESSION["tunnus"])){
				echo "<form action='keskustelu.php' method='post'> <input type='hidden' name='aiheid' value='$id'> <fieldset><textarea name='vastauskentta' rows='5' cols='100'></textarea><br><br><input type='submit' name='vastaa' value='Lähetä vastaus'></fieldset></form>";
							
					}
		else{
				echo "Kirjaudu sisään tai rekisteröidy osallistuaksesi keskusteluun.";
			} 
				
		}
		
		if (isset($_POST["vastaa"])){
						$aiheid=mysqli_real_escape_string($yhteys, $_POST['aiheid']);
						$vastaus=mysqli_real_escape_string($yhteys, $_POST['vastauskentta']);
						$vastaaja=mysqli_real_escape_string($yhteys, $_SESSION["tunnus"]);
						$lisaasql="insert into vastaus (aiheid, vastaus, nimimerkki) values ($aiheid, '$vastaus', '$vastaaja')";
						$b= $yhteys->query($lisaasql);
					if($b==TRUE){
						echo "Vastaus lisätty";
					}else{
						echo "Virhe. Yritä myöhemmin uudelleen";
				}}
				
		
		

			
		?>
		
	</div>
	

	 </div>
	
	
		
	</body>
	</html>
