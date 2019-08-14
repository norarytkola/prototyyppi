		<?php session_start();
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
	
	
	<div class="logo">
	Heppaset
	</div>
	<div style="clear:both;"></div>
	
	<div class="sisältö">
	
		<div class="vasenreuna">
	<a href="heppaset.php">TAKAISIN ETUSIVULLE</a>
	</div>
	
	<div style="clear:both;"></div>
	
	
	<body>
	<div id="tietodivi">
	
	Heppaset on vuonna 2018 perustettu sivusto, jonka tarkoituksena on helpottaa hevosihmisen elämää tuomalla kaikki tiedot yhteen paikkaan. Meillä voit selvittää hevosen sukujuuria ja kilpasuorituksia, lukea keskusteluja 
	koskien hevosia, ja vilkaista Hippoksen uusimmat uutiset. 
	Mikäli löydät sivustolta virheellistä tietoa, voit olla meihin yhteydessä lomakkeella. Tarkistamme tiedot pikimmiten ja korjaamme ne, mikäli virheellistä tietoa löytyy.
	<br>
	Olethan jo rekisteröitynyt? Rekisteröityessäsi saat käyttöön lisää mahdollisuuksia; voit osallistua keskusteluun, lisätä hevosten tietoja järjestelmään, ja tutustua muihin hevosihmisiin.
	</div>
	
	<div id="yhteytta">
	<form action="tietoa.php" method="post">
		<fieldset>
			<legend>Ota yhteyttä</legend>
				<?php if (!isset($_SESSION["tunnus"])){?>
			Nimesi: <input type="text" name="kokonimi">

			Sähköpostiosoite: <input type:"text" name="sapo">
				<?php } ?>
			<br><br>
			Viesti: <textarea name="viesti" rows="3" cols="50"></textarea>
			<br><br>
			<input type="submit" name="submit" value="Lähetä">
		</fieldset>
	</form>
	</div>
	
	<div class="echo">
		<?php
		if (isset($_POST["submit"])){
			if (isset ($_POST["sapo"])&& $_POST !="" && isset ($_POST["viesti"]) && $_POST["viesti"] != ""){
					echo "Kiitos viestistäsi. Vastaamme sinulle mahdollisimman pian.";
			}else{
					echo "Kerrothan sähköpostin ja kirjoitat viestin.";
			}
		}
		?>
	</div>	
	
	</div>

	
	</body>
	
	</html>
	