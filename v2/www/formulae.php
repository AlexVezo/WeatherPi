<!DOCTYPE html>
<html>
<head>

	<title> Formeln </title>

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
          <b> (Mess-)Werte der Größen: </b>
        </p> <br/>

      <table class="wdata_table" style="text-align: center">
    	<tr>
    	  <td class="wdata_name"> Temperatur </td>
    	  <td class="wdata_value"> <input class='form_wdata' id='t' value='10'></input> </td>
    	  <td class="wdata_unit"> °C </td>
    	</tr> <tr>
    	  <td class="wdata_name"> relative Luftfeuchtigkeit </td>
				<td class="wdata_value"> <input class='form_wdata' id='h' value='60'></input> </td>
    	  <td class="wdata_unit"> % </td>
    	</tr> <tr>
        <td class="wdata_name"> Luftdruck: </td>
				<td class="wdata_value"> <input class='form_wdata' id='p' value='1014'></input> </td>
    	  <td class="wdata_unit"> hPa </td>
			</tr> <tr>
    	  <td class="wdata_name"> Windgeschwindigkeit </td>
				<td class="wdata_value"> <input class='form_wdata' id='v' value='10'></input> </td>
    	  <td class="wdata_unit"> km/h </td>
    	</tr>
		</table> <br/> <br/>
		  <div style="text-align: center">
		 	  <button class='nice_button' onclick="calcFormulae()"> Berechen! </button>
		  </div>
	  </div>

      <div class="content f_right bg_content">
        <p style="font-size: 35px; text-align: center">
          <b> Berechnete Größen: </b>
        </p> <br/>

      <table class="wdata_table t_center">
    	<tr>
    	  <td class="wdata_name"> Taupunkttemperatur </td>
    	  <td class="wdata_value" id='tau'>  </td>
    	  <td class="wdata_unit"> °C </td>
    	</tr> <tr>
      	<td class="wdata_name"> Sättigungsdampfdruck </td>
    	  <td class="wdata_value" id='p_sat'>  </td>
    	  <td class="wdata_unit"> hPa </td>
    	</tr> <tr>
      	  <td class="wdata_name"> absolute Luftfeuchtigkeit </td>
    	  <td class="wdata_value" id='h_abs'>  </td>
    	  <td class="wdata_unit"> g/m³ </td>
    	</tr> <tr>
      	  <td class="wdata_name"> Feuchttemperatur </td>
    	  <td class="wdata_value" id='tf'>  </td>
    	  <td class="wdata_unit"> °C </td>
    	</tr> <tr>
      	  <td class="wdata_name"> Windchill </td>
    	  <td class="wdata_value" id='wc'> </td>
    	  <td class="wdata_unit"> °C </td>
    	</tr>
      </table>
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
