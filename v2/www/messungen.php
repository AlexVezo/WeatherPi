<!DOCTYPE html>
<html>
<head>

	<title> Messungen </title>

  <!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 1149px)" href="css/style_mobile.css">
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 1150px)" href="css/style_desktop.css">

	<script src="/func/jquery.js"></script> <!-- JQuery -->
	<script src="/func/script.js"></script> <!-- Menü für mobile Endgeräte -->

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
		<div class="menu" style="display: none">
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
    <div class="content f_left bg_side">
        <p class="subtitle t_center">
          <b> Aktuelle Messung: </b>
        </p> <br/>

      <table class="wdata_table" style="text-align: center">

      <?php

			// Aus der aktuellen CSV-Datei die letzte Zeile auslesen
			$file     = escapeshellarg('log/'.date("Y-m-d").'.csv');
			$lastLine = `tail -n 1 $file`;
			$wdata    = explode(",", $lastLine);
			$wdata[4] = "{$wdata[9]}:{$wdata[10]}:{$wdata[11]}";

			//
			$name = array('Temperatur', 'Luftfeuchtigkeit', 'Luftdruck', 'Windgeschwindigkeit', 'Zeitpunkt der Messung');
			$unit = array('°C', '%', 'hPa', 'U / 5min', 'Uhr');

			for ($i = 0; $i < count($name); $i++) {
        $k = "<tr>
							  <td class='wdata_name'>  $name[$i]  </td>
								<td class='wdata_value'> $wdata[$i] </td>
								<td class='wdata_unit'>  $unit[$i]  </td>
							</tr>";
				echo $k;
      };
      ?>

          </table>
      </div>

			<div class="content f_left bg_side">
	        <p class="subtitle t_center">
	          <b> Aktuelle Messung als Grafik: </b>
	        </p> <br/>

				 <div style="text-align:center">
		 			 <img src='<?="img/today/".date("Y-m-d-H").".png"; ?>' style="max-width:100%"> </img>
		 		 </div>
			</div>

			<div class="content f_left bg_side">
	        <p class="subtitle t_center">
	          <b> Aktuelle Woche: </b>
	        </p> <br/>

				 <div style="text-align:center">
		 			 <img src='<?="img/week/".date("Y-m-d").".png"; ?>' style="max-width:100%"> </img>
		 		 </div>
			</div>

	<!-- Footer anzeigen -->
	<div class="footer" style="height: 120px">
	 	<div class="footer_title">
			<a href="impressum.php">   Impressum   </a> <br/>
			<a href="impressum.php#datenschutz"> Datenschutz </a> <br/>
		</div>
	</div>

</div>
</body>
</html>
