<!DOCTYPE html>
<html>
<head>

	<title> Startseite </title>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 1149px)" href="css/style_mobile.css">
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 1150px)" href="css/style_desktop.css">

	<script src="func/jquery.js"></script> <!-- JQuery -->
	<script src="func/script.js"></script> <!-- Menü für mobile Endgeräte -->

	<!-- Metadaten -->
	<meta http-equiv="content-type"     content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="de-DE" />
	<meta name="DC.Language" content="de" />
	<meta name="DC.Rights"   content="Alle Rechte liegen beim Autor" />
	<meta name="description" content="Webseite der Wetterstation"/>
	<meta name="keywords"    content="WeatherPi, Wetterstation, Wetter, Raspberry Pi"/>

</head>
<body>

<div class="wrapper">
		<div class="header">
    	<table class="head_table">
      	<tr class="head_table_tr">

  	  		<td class="table_left">
 	    		<div class="header_menu">
          	<img class="logo_cloud" src="/pic/cloud.png" alt="Menu">
 	    		</div>
          </td>

					<td class="table_center">
  	    		<p class="header_title t_center"> WeatherPi </p>
          </td>

 	  			<td class="table_menu">
					<table style="width: 600px">
						<tr>
							<td> <a href="startseite.php" class="bold no-italic"> Startseite       </a> </td>
							<td> <a href="messungen.php"  class="bold no-italic"> Aktuelle Messung </a> </td>
							<td> <a href="formulae.php"   class="bold no-italic"> Formeln-Rechner  </a> </td>
 	    		  </tr>
					</table>
   	      </td>

 	  			<td class="table_right">
 	    			<div class="header_menu f_right">
 						<img class="logo_menu" src="/pic/menu.png" id="menu" alt="Logo">
 	    			</div>
          </td>

      	</tr>
      </table>
    </div>

		<!-- Menüleiste mit Links zu drei Tabellen -->
		<div class="menu">
		  <ul class="list">
			   <li class="list_menu click bg_nav border_around">
			      <a href="startseite.php" class="bold no-italic"> Startseite <br/> </a>
		  	 </li>
			   <li class="list_menu click bg_nav border_around">
				     <a href="messungen.php" class="bold no-italic"> Aktuelle Messung </a>
			   </li>
			   <li class="list_menu click bg_nav border_around">
				     <a href="formulae.php" class="bold no-italic"> Formeln-Rechner </a>
			   </li>
			</ul>
		</div>


    <!-- Inhalt der Webseite -->
		<div class="content f_left bg_content">
			<p class="subtitle t_center">
 	    Willkommen auf meiner Webseite!
  	 </p>
		 <div style="text-align:center">
			 <img src="pic/station.png" style="max-width:60%"> </img>
		 </div>
		 <br/>
        <p class="content_text">
	      Diese Webseite ist ein Teil eines Freizeitprojektes. Mithilfe eines Raspberry Pi Zero und
				eines NodeMCU (ESP32) habe ich eine Wetterstation eingerichtet, deren Messwerte nicht nur protokolliert,
				sondern und hier in Form einer Webseite für alle einsehbar sind.
    </div>

		<div class="content f_right bg_content">
  	<p class="subtitle t_center">
 	    Dokumentation
  	</p> <br/>

		<div style="text-align:center">
			<img src="pic/doku.jpg" style="max-width:80%"> </img>
		</div><br/>
		<p class="content_text">
			Um die einzelnen Schitte, die ich zum Einichten benötigt habe, auch in Zukunft parat zu haben,
			habe ich eine Dokumentation erstellt. Aktuell befindet sie sich noch in Überarbeitung.
			Sobald sie abgeschlossen ist, ist sie dann [hier] zu finden.
		</p>
		</div>

	<!-- Footer anzeigen -->
	<div class="footer">
	 	<div class="footer_title">
			<p class="subtitle footer_subtitle"> Über mich </p>
			<a href="impressum.php">   Impressum   </a> <br/>
			<a href="impressum.php#datenschutz"> Datenschutz </a> <br/>
		</div>
		<div class="footer_text">
			<p>
				Moin! Ich bin Alex. Inmeiner Freizeit beschäftige ich mich mit Elektronik und dem Programmieren. Nebenbei sammle ich ein paar
				der coolsten Pokemon, die es gibt; sowohl auf der Konsole als auch unterwegs. </p>
			<p> Für 2020 habe ich mir	vorgenommen, ein paar Tools zu programmieren, die dann hier eine neue Rubrik erhalten.
				Was es genau sein wird, verrate ich noch nicht. Stay tuned ;)
			</p>
		</div>
		<div class="footer_picture">
			<img src="pic/head.png" alt="Image_AboutMe" class="head_picture">
		</div>
	</div>

</div>
</body>
</html>
