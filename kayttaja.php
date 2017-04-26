<?php
class Kayttaja {
  private $kayttajatunnus;
  private $salasana;

  function __construct($kayttajatunnus = "", $salasana = "", $id = 0) {
	  $this->kayttajatunnus = trim($kayttajatunnus);
	  $this->salasana = trim($salasana);
	  $this->id = $id;
  }

  public function setKayttajatunnus($kayttajatunnus) { 
    $this->kayttajatunnus = $kayttajatunnus;
  }

  public function getKayttajatunnus() {
    return $this->kayttajatunnus;
  }

  public function setSalasana($salasana) {
    $this->kayttajatunnus = $salasana;

  }
  public function getSalasana() { 
    return $this->salasana;
  }


}	
?>
