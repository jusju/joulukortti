<?php
class Osoite {
  private $id;
  private $nimi;
  private $katuosoite;
  private $kunta;
  private $postinumero;
  private $osavaltio;
  private $maa;
  private static $virhelista = array(
	  -1 => "Kenttä pitää täyttää",
	  0 => "",
	  11 => "Muu virhe"
  );

  function __construct($nimi="", 
    $katuosoite="", $kunta="", $postinumero="", $osavaltio="", $maa="", $id=0) {
    $this->nimi = trim($nimi);
    $this->katuosoite = trim($katuosoite);
    $this->kunta = trim($kunta);
    $this->postinumero = trim($postinumero);
    $this->osavaltio = trim($osavaltio);
    $this->maa = trim($maa);
    $this->id = trim($id);
  }
  // Get- ja Set-metodit
  public function setNimi($nimi) {
    $this->nimi = trim($nimi);
  }
  public function getNimi() {
    return $this->nimi;
  }
  public function checkNimi($required=true, $min=1, $max=500) {
  // jos lausahdus on liian lyhyt
     if(strlen($this->nimi) < $min) {
       return 11;
     }
     return 0;
  }
  public function getKatuosoite() { 
    return $this->katuosoite;
  }
  public function setKatuosoite($katuosoite) {
    $this->katuosoite = trim($katuosoite);
  }
  public function checkKatuosoite($required=true, $min=1, $max=500) {
	  if(strlen($this->katuosoite) < $min) {
	    return 11;
	  }
	  return 0;
  }
  public function getKunta() { 
    return $this->kunta;
  }
  public function setKunta($kunta) {
    $this->kunta = trim($kunta);
  }
  public function checkKunta($required=true, $min=1, $max=500) {
	  if(strlen($this->kunta) < $min) {
	    return 11;
	  }
	  return 0;
  }
  public function getPostinumero() { 
    return $this->postinumero;
  }
  public function setPostinumero($postinumero) {
    $this->postinumero = trim($postinumero);
  }
  public function checkPostinumero($required=true, $min=1, $max=500) {
	  if(strlen($this->postinumero) < $min) {
	    return 11;
	  }
	  return 0;
  }

  public function getOsavaltio() { 
    return $this->osavaltio;
  }
  public function setOsavaltio($osavaltio) {
    $this->osavaltio = trim($osavaltio);
  }
  public function checkOsavaltio($required=true, $min=1, $max=500) {
	  if(strlen($this->osavaltio) < $min) {
	    return 11;
	  }
	  return 0;
  }

  public function getMaa() { 
    return $this->maa;
  }
  public function setMaa($maa) {
    $this->maa = trim($maa);
  }
  public function checkMaa($required=true, $min=1, $max=500) {
	  if(strlen($this->maa) < $min) {
	    return 11;
	  }
	  return 0;
  }
  


  // Metodilla näytetään virhekoodia vastaava tekstit
  public static function getError($virhekoodi) {
     if(isset(self::$virhelista [$virhekoodi] )) {
	     return self::$virhelista [-1];
   	 }
  }
}
?>
