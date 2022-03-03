<?php
/* Questa pagina è l'iniziale dell'applicativo web, le operazioni che compie sono:
   - Visualizzazione del form per inserire le credenziali.
   - Verifica delle credenziali a database e impostazione di una sessione.
   - Visulizzazione di un riepilogo generale dei record presenti nelle varie tabelle.
*/
session_start();
if(isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc=null;
if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

require("funzioni.php"); 
require("openclosePage/apertura.php");   

if($sc == "login"){ 
   if(($_REQUEST['username']=="admin") && ($_REQUEST['password']=="admin"))
      $_SESSION['loggato'] = true;
   else{
      echo("
         <div class=\"alert alert-danger\" role=\"alert\">
            Credenziali non valide.
         </div>");
      $_SESSION['loggato'] = false;
   }
}
if($sc == "logout"){ 
   $_SESSION['loggato'] = false;
}

if($_SESSION['loggato'] == true){ 
   writeMenu();
   
   echo("<div class=\"row\">
      <div class=\"col col-4\">
         <div class=\"alert alert-success\">Proprietari</div>
      ");
         $db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
         $sql = "SELECT COUNT(id) AS 'Proprietari Presenti' FROM proprietario";
         $rs = $db->query($sql);
         showResultTable($rs, "Table Proprietario");
         $db->close();
      echo("</div>
      <div class=\"col col-4\">
         <div class=\"alert alert-success\">Zone e Tipologie</div>
      ");
         $db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
         $sql = "SELECT COUNT(id) AS 'Zone Presenti' FROM zona";
         $rs = $db->query($sql);
         showResultTable($rs, "Table Zona");

         $sql = "SELECT COUNT(id) AS 'Tipologie Presenti' FROM tipologia";
         $rs = $db->query($sql);
         showResultTable($rs, "Table Tipologia");
         $db->close();
      echo("</div>
      <div class=\"col col-4\">
         <div class=\"alert alert-success\">Immobili</div>
      ");
         $db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
         $sql = "SELECT COUNT(id) AS 'Immobili Presenti' FROM immobile";
         $rs = $db->query($sql);
         showResultTable($rs, "Table Immobile");
      echo("</div>
   </div>");

}

// form per il login

else{
   echo("<form action=\"index.php\" method=\"get\">
      <div class=\"mb-3\">
         <label for=\"userInput\" class=\"form-label\">Username</label>
         <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Username\" aria-label=\"default input example\">
      </div>
      <div class=\"mb-3\">
         <label for=\"passwordInput\" class=\"form-label\">Password</label>
         <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Password\" aria-label=\"default input example\">
      </div>
      <input type=\"hidden\" name=\"sc\" value=\"login\">
      <button type=\"submit\" class=\"btn btn-primary\">Login</button>
      </form>");
}

require("openclosePage/chiusura.php"); 
?>