<?php

require_once 'kayttaja.php';

if(isset($_POST["kirjaudu"])) {
	if($_POST["kayttajatunnus"] == "jusju" && $_POST["salasana"] == "jusju") {
      session_start();
	  $_SESSION["kayttaja"] = $_POST["kayttajatunnus"];
      ob_start();
	  header('Location: '. 'valikko.html');
	  ob_end_flush();
	  die();
	}	
}
