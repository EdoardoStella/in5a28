<?php
// richiamo il blocco iniziale HTML per precaricare dati e BootStrap
require("head.html");
require("funzioni.php");

   echo("Questo messaggio lo vedo spaziato e in carattere diverso dal solito");
   echo("<br />");
   helloword();

   // richiamo il blocco finale con chiusura pagina e caricamento JS di BootStrap
require("foot.html");
?>