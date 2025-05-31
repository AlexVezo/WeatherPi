<?php
	$title     = "WeatherPi";
	$title_tab = "WeatherPi";

	include "/wpi/php/lastline.php";
?>

<!DOCTYPE html>
<html>
<head>

    <?php include "/var/www/html/func/head.php"; ?>

</head>
<body> 
<div class="wrapper">

    <!-- Überschrift für die Webseite -->
    <?php include "/var/www/html/func/header.php"; ?>

    <!-- Menüleiste mit Links -->
    <?php include "/var/www/html/func/menu.php"; ?>

    <!-- Div-Element an der Seite vom Inhalt -->
    <div class="box left red"> 
	<p class="box_value"> <?= $weather_data[1]; ?> °C </p>
    </div>
    <div class="box right blue"> 
	<p class="box_value"> <?= $weather_data[3]; ?> % </p>
    </div>
    <div class="box right green"> 
	<p class="box_value"> <?= $weather_data[4]/100; ?> hPa </p>
    </div>
    <div class="box left pastell"> 
	<p class="box_value"> <?= $weather_data[5]; ?> m/s </p>
    </div>
    <div class="box right pink"> 
	<p class="box_value"> <?= $weather_data[8][1]; ?> Uhr </p>
    </div>
    <div class="box left yellow"> 
	<p class="box_value"> <?= "-" //Lux ?> </p>
    </div>

    <!-- Footer anzeigen: Auf der Startseite indivuell mit Text -->
    <div class="footer"> 
 	<div class="footer_title">
		<p class="subtitle footer_subtitle"> Über den <br/> Webmaster </p>
		<a href="/impressum.php">Impressum</a><br/>
	</div>
	<div class="footer_text">
		<p style="font-size: 18px">
			Hallo. Ich bin Alexandar Vesovic. In meiner Freizeit beschäftige
			ich mich gerne mit Webdesign, meinem Raspberry Pi und
			Wetterkunde.
		</p> <p style="font-size: 20px">
			Ich freue mich über Ihren Besuch auf meiner
			Webseite.
		</p>
	</div>
	<div class="footer_picture">
		<img src="/pic/head.jpg" alt="Bild des Autors" class="head_picture">
	</div>
     </div>

</div>
</body>
</html>

