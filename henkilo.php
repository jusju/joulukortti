<?php
class Henkilo {
	private static $virhelista = array (
			- 1 => "Tuntematon virhe",
			0 => "",
			1 => "Anna nimi",
			2 => "Nimessä saa olla merkit a-ö ja -",
			3 => "Nimi on liian lyhyt",
			4 => "Nimi on liian pitkä",
			10 => "Anna lähiosoite",
			11 => "Lähiosoitteessa saa olla merkit a-ö, 0-9, . ja -",
			12 => "Lähiosoite on liian lyhyt",
			13 => "Lähiosoite on liian pitkä",
			20 => "Anna postinumero",
			22 => "Anna postinumero viidellä numerolla",
			30 => "Anna postitoimipaikka",
			31 => "Postitoimipaikassa saa olla merkkit a-ö ja -",
			32 => "Postitoimipaikka on liian lyhyt",
			33 => "Postitoimipaikka on liian pitkä",
			40 => "Anna puhelinnumero",
			42 => "Puhelimessa voi olla vain numeroita ja +",
			43 => "+ voi olla vain ensimmäisenä merkkinä",
			44 => "Puhelinnumero on liian lyhyt",
			45 => "Puhelinnumero on liian pitkä",
			60 => "Palkka ei voi olla tyhjä",
			61 => "Palkka voi olla vain numeerista tietoa",
			62 => "Palkka on liian pieni",
			63 => "Palkka on liian suuri",
			70 => "Anna pvm",
			71 => "Päivämäärän muoto on vvvv-kk-pp",
			72 => "Päivämäärä ei ole kelvollinen",
			80 => "Anna lisätieto",
			81 => "Lisätiedossa on kiellettyjä merkkejä &lt; ja &gt;",
			82 => "Lisätiedossa on liian vähän merkkejä",
			83 => "Lisätiedossa on liikaa merkkejä" 
	);
	
	private $sukunimi;
	private $etunimi;
	private $lahiosoite;
	private $postinumero;
	private $postitoimipaikka;
	private $puhelinnumero;
	private $palkka;
	private $tyohontulo;
	private $lisatieto;
	private $id;
	
	function __construct($sukunimi = "", $etunimi = "", $lahiosoite = "", $uusipostinumero = "", $postitoimipaikka = "", $puhelinnumero = "", $palkka = 0, $tyohontulo = "", $lisatieto = "", $id = 0) {
		$this->sukunimi = trim ( $sukunimi );
		$this->etunimi = trim ( $etunimi );
		$this->lahiosoite = trim ( $lahiosoite );
		$this->postinumero = trim ( $uusipostinumero );
		$this->postitoimipaikka = trim ( $postitoimipaikka );
		$this->puhelinnumero = trim ( $puhelinnumero );
		$this->palkka = trim ( $palkka );
		if (strlen ( trim ( $tyohontulo ) ) > 0) {
			$this->tyohontulo = trim ( $tyohontulo );
		} else {
			// Jos parametri on tyhjä, laitetaan attribuuttiin tämä päivä
			$this->tyohontulo = date ( "Y-m-d", time () );
		}
		
		$this->lisatieto = trim ( $lisatieto );
		
		$this->id = $id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setsukunimi($sukunimi) {
		$this->sukunimi = $sukunimi;
	}
	
	public function getsukunimi() {
		return $this->sukunimi;
	}
	
	public function checksukunimi($required = true, $min = 3, $max = 30) {
		// Hyväksytään tyhjä jos required false
		if ($required == false && strlen ( $this->sukunimi ) == 0)
			return 0;
			
			// Ei hyväksytä tyhjää jos on required true
		if ($required == true && strlen ( $this->sukunimi ) == 0)
			return 1;
			
			// Sallitut merkit
		if (preg_match ( "/[^a-zåäöA-ZÅÄÖ\- ]/", $this->sukunimi ))
			return 2;
			
			// Jos nimi on liian lyhyt
		if (strlen ( $this->sukunimi ) < $min)
			return 3;
			
			// Jos nimi on liian pitkä
		if (strlen ( $this->sukunimi ) > $max)
			return 4;
		
		return 0;
	}
	
	public function setetunimi($etunimi) {
		$this->etunimi = $etunimi;
	}
	
	public function getetunimi() {
		return $this->etunimi;
	}
	
	public function checketunimi($required = true, $min = 3, $max = 30) {
		if ($required == false && strlen ( $this->etunimi ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->etunimi ) == 0)
			return 1;
		
		if (preg_match ( "/[^a-zåäöA-ZÅÄÖ\- ]/", $this->etunimi ))
			return 2;
		
		if (strlen ( $this->etunimi ) < $min)
			return 3;
		
		if (strlen ( $this->etunimi ) > $max)
			return 4;
		
		return 0;
	}
	
	public function setlahiosoite($lahiosoite) {
		$this->lahiosoite = $lahiosoite;
	}
	
	public function getlahiosoite() {
		return $this->lahiosoite;
	}
	
	public function checklahiosoite($required = true, $min = 3, $max = 60) {
		if ($required == false && strlen ( $this->lahiosoite ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->lahiosoite ) == 0)
			return 10;
		
		if (preg_match ( "/[^a-zåäöA-ZÅÄÖ\-0-9 ]/", $this->lahiosoite ))
			return 11;
		
		if (strlen ( $this->lahiosoite ) < $min)
			return 12;
		
		if (strlen ( $this->lahiosoite ) > $max)
			return 13;
		
		return 0;
	}
	
	public function setpostinumero($uusipostinumero) {
		$this->postinumero = $uusipostinumero;
	}
	
	public function getpostinumero() {
		return $this->postinumero;
	}
	
	public function checkpostinumero($required = true) {
		if ($required == false && strlen ( $this->postinumero ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->postinumero ) == 0)
			return 20;
		
		if (! preg_match ( "/^\d{5}$/", $this->postinumero ))
			return 22;
		
		return 0;
	}
	
	public function setpostitoimipaikka($postitoimipaikka) {
		$this->postitoimipaikka = $postitoimipaikka;
	}
	
	public function getpostitoimipaikka() {
		return $this->postitoimipaikka;
	}
	
	public function checkpostitoimipaikka($required = true, $min = 2, $max = 30) {
		if ($required == false && strlen ( $this->postitoimipaikka ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->postitoimipaikka ) == 0)
			return 30;
		
		if (preg_match ( "/[^a-zåäöA-ZÅÄÖ\- ]/", $this->postitoimipaikka ))
			return 31;
		
		if (strlen ( $this->postitoimipaikka ) < $min)
			return 32;
		
		if (strlen ( $this->postitoimipaikka ) > $max)
			return 33;
		
		return 0;
	}
	
	public function setpuhelinnumero($puhelinnumero) {
		$this->puhelinnumero = $puhelinnumero;
	}
	
	public function getpuhelinnumero() {
		return $this->puhelinnumero;
	}
	
	public function checkpuhelinnumero($required = true, $min = 3, $max = 30) {
		if ($required == false && strlen ( $this->puhelinnumero ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->puhelinnumero ) == 0)
			return 40;
		
		if (preg_match ( "/[^+0-9]/", $this->puhelinnumero ))
			return 42;
		
		if (substr_count ( $this->puhelinnumero, "+" ) > 1 || strpos ( $this->puhelinnumero, "+" ) > 1)
			return 43;
		
		if (strlen ( $this->puhelinnumero ) < $min)
			return 44;
		
		if (strlen ( $this->puhelinnumero ) > $max)
			return 45;
		
		return 0;
		
		return 0;
	}
	
	public function setpalkka($palkka) {
		$this->palkka = $palkka;
	}
	
	public function getpalkka() {
		return $this->palkka;
	}
	
	public function checkpalkka($required = true, $min = 0.0, $max = 10000.0) {
		if ($required == false && strlen ( $this->palkka ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->palkka ) == 0)
			return 60;
		
		if (! preg_match ( "/^\d+(\.\d{1,2})?$/", $this->palkka ))
			return 61;
		
		if ($this->palkka < $min)
			return 62;
		
		if ($this->palkka > $max)
			return 63;
		
		return 0;
	}
	
	public function settyohontulo($tyohontulo) {
		$this->tyohontulo = $tyohontulo;
	}
	
	public function gettyohontulo() {
		return $this->tyohontulo;
	}
	
	public function checktyohontulo($required = true) {
		if ($required == false && strlen ( $this->tyohontulo ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->tyohontulo ) == 0)
			return 70;
		
		if (! preg_match ( "/^\d{4}\-\d{1,2}\-\d{1,2}$/", $this->tyohontulo ))
			return 71;
			
			// Pilkotaan vvvv-kk-pp osiin
		list ( $vv, $kk, $pp ) = explode ( "-", $this->tyohontulo );
		
		// Tarkastetaan, onko päivämäärä kelvollinen
		if (! checkdate ( $kk, $pp, $vv ))
			return 72;
		
		return 0;
	}
	
	public function setlisatieto($lisatieto) {
		$this->lisatieto = $lisatieto;
	}
	
	public function getlisatieto() {
		return $this->lisatieto;
	}
	
	public function checklisatieto($required = true, $min = 3, $max = 500) {
		if ($required == false && strlen ( $this->lisatieto ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->lisatieto ) == 0)
			return 80;
		
		if (preg_match ( "/[<>]/", $this->lisatieto ))
			return 81;
		
		if (strlen ( $this->lisatieto ) < $min)
			return 82;
		
		if (strlen ( $this->lisatieto ) > $max)
			return 83;
		
		return 0;
	}
	
	public static function getError($virhekoodi) {
		if (isset ( self::$virhelista [$virhekoodi] ))
			return self::$virhelista [$virhekoodi];
		
		return self::$virhelista [- 1];
	}
}
?>