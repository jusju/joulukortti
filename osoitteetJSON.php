<?php
try {
	require_once "henkiloPDO.php";
	
	// Luodaan tietokanta-luokan olio
	$kantakasittely = new henkiloPDO ();
	
	// Jos sivua pyytaneelta tuli hae eli kyseessa on nimella leffoejn hakeminen
	if (isset ( $_GET ["nimi"] )) {
		$haettava = $_GET ["nimi"];
		
		// Tehdään kantahaku, parametrina on nimi
		$tulos = $kantakasittely->haeHenkilotNimella ( $haettava );
		
		// Palautetaan vastaus JSON-tekstina
		print (json_encode ( $tulos )) ;
	}  // Kyseessa on kaikkien leffojen haku kannasta
    else {
		$tulos = $kantakasittely->kaikkiHenkilot ();
		
		// Palautetaan vastaus JSON-tekstinä
		print json_encode ( $tulos );
	}
} catch ( Exception $error ) {
}
?>

