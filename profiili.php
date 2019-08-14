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
	
		<?php if (isset($_SESSION["tunnus"])){?>
	<form name="heppaset">
	<div class="profiili">
	<select name="profiili" onchange="siirry()">
		<option> Profiili </option>
		<option value="heppaset.php">Takaisin etusivulle</option>
		<option value="profiili.php">Muokkaa profiilia</option>
		<option value="ulos">Kirjaudu ulos</option>
		<option  value="keskustelu.php" >Siirry keskusteluun</option>
	</select>
	</div>
	</form>
		<?php }
			?>

	
	
	<div class="sisalto">
	<div class="logo">
	Heppaset
	</div>
	
	<div style="clear:both;"></div>
	
	<div id="muokkaus" >
	<?php
	$nikki=$_SESSION["tunnus"];
	echo "<strong>Tervetuloa muokkaamaan profiiliasi, $nikki !</strong>";
	?>	
	<form action="profiili.php" method="post">
		<fieldset>
		Muokkaa profiilisi kuvausta:<br>
		<?php 
			
			echo "<textarea name='kuvaus' rows='10' cols='70'>";
			$kuvaus="select kuvaus from kayttajat where NIMI like '$nikki'";
			$tulosta=$yhteys->query($kuvaus);
				while ($tulostus=$tulosta->fetch_assoc()){
					echo "".$tulostus['kuvaus']."";
				} 
			echo "</textarea><br><input type='submit' name='laheta'><br><br>";
				if (isset($_POST['laheta'])){
					$kuvaus=mysqli_real_escape_string($yhteys, $_POST['kuvaus']);
					$muokkaus="Update kayttajat set kuvaus='$kuvaus' where NIMI='$nikki'";
					$onnistui=$yhteys->query($muokkaus);
					if ($onnistui==TRUE){
						echo "Profiilikuvaus päivitetty.";
					}else{
						echo "Jotakin meni pieleen nyt";
					}
				}
		?>
		
		</form>
	</div>

	<div id="uutiset">
		<h1>Uutiset Hippokselta:</h1>
		<br>
		<img src="raviurheilu_logo.jpg">
			<?php 
			$xml=simplexml_load_file("http://www.hippos.fi/rss/ajankohtaista_ravit");
			$syote=$xml->children()[0];
			foreach($syote->children() as $uutinen){
			echo "<a href=$uutinen->link target='_blank'> $uutinen->title </a><br><br>";
			}
		

			?>

	</div>