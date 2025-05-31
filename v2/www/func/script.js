$(document).ready(function(){
  $("img.logo_menu").click(function(){
        $("ul").toggle(400);
    });
});

function calcFormulae() {

  // Variablen auslesen
  var t = document.getElementById("t").value;
  var h = document.getElementById("h").value;
  var p = document.getElementById("p").value;
  var v = document.getElementById("v").value;

  // Werte berechnen

  // Werte ausgeben
  document.getElementById("tau").innerHTML   = 0;
  document.getElementById("p_sat").innerHTML = 0;
  document.getElementById("h_abs").innerHTML = 0;
  document.getElementById("wc").innerHTML    = 0;
  document.getElementById("tf").innerHTML    = 0;
}
