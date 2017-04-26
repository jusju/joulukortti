<?php
require_once 'henkilo.php';

session_start ();

if (isset ( $_POST ["laheta"] )) {
	$henkilo = new Henkilo ( $_POST ["sukunimi"], $_POST ["etunimi"], $_POST ["lahiosoite"], $_POST ["postinumero"], $_POST ["postitoimipaikka"], $_POST ["puhelinnumero"], $_POST ["palkka"], $_POST ["tyohontulo"], $_POST ["lisatieto"] );
	
	$nimiVirhe = $henkilo->checkSukunimi ();
	if ($nimiVirhe == 0) {
		$nimiVirhe = $henkilo->checkEtunimi ();
	}
	
	$lahiosoiteVirhe = $henkilo->checkLahiosoite ();
	$postinumeroVirhe = $henkilo->checkPostinumero ();
	$postitoimipaikkaVirhe = $henkilo->checkPostitoimipaikka ();
	$puhelinnumeroVirhe = $henkilo->checkPuhelinnumero ();
	$palkkaVirhe = $henkilo->checkPalkka ();
	$tyohontuloVirhe = $henkilo->checkTyohontulo ();
	$lisatietoVirhe = $henkilo->checkLisatieto ( false );
} elseif (isset ( $_POST ["peruuta"] )) {
	
	header ( "Location: index.php" );
	exit ();
} else {
	$henkilo = new Henkilo ();
	
	$nimiVirhe = 0;
	$lahiosoiteVirhe = 0;
	$postinumeroVirhe = 0;
	$postitoimipaikkaVirhe = 0;
	$puhelinnumeroVirhe = 0;
	$palkkaVirhe = 0;
	$tyohontuloVirhe = 0;
	$lisatietoVirhe = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Henkilöhallinta</title>
<link rel="stylesheet" type="text/css" href="tyyli/henkilo.css">
<style type="text/css">
label {
	width: 8em;
	display: block;
	float: left;
}

.pun {
	color: red;
}
</style>
</head>

<body>
	<header>
		<img src="index_kuvat/logo.jpg" alt="HAAGA-HELIA" width="200"
			height="78" class="tunnus">
		<h2>Lisää henkilö</h2>
	</header>

	<nav>
		<a href="index.php">Etusivu</a> Lisää henkilö <a href="">Henkilöt</a>
		<a href="">Asetukset</a>
	</nav>

	<article>

		<form action="uusiHenkilo.php" method="post">

			<p>
				<label>Suku- ja etunimi</label> <input type="text" name="sukunimi"
					size="25"
					value="<?php print(htmlentities($henkilo->getSukunimi(),ENT_QUOTES, "UTF-8"));?>">
				<input type="text" name="etunimi" size="25"
					value="<?php print(htmlentities($henkilo->getEtunimi(),ENT_QUOTES, "UTF-8"));?>">
<?php
print ("<span class='pun'>" . $henkilo->getError ( $nimiVirhe ) . "</span>") ;
?>
</p>

			<p>
				<label>L&auml;hiosoite</label> <input type="text" name="lahiosoite"
					size="40"
					value="<?php print(htmlentities($henkilo->getLahiosoite(),ENT_QUOTES, "UTF-8"));?>">
<?php
print ("<span class='pun'>" . $henkilo->getError ( $lahiosoiteVirhe ) . "</span>") ;
?>
</p>

			<p>
				<label>Postinumero</label> <input type="text" name="postinumero"
					size="5" maxlength="5"
					value="<?php print(htmlentities($henkilo->getPostinumero(),ENT_QUOTES, "UTF-8"));?>">
<?php
print ("<span class='pun'>" . $henkilo->getError ( $postinumeroVirhe ) . "</span>") ;
?>
</p>

			<p>
				<label>Postitoimipaikka</label> <input type="text"
					name="postitoimipaikka" size="30"
					value="<?php print(htmlentities($henkilo->getPostitoimipaikka(),ENT_QUOTES, "UTF-8"));?>">
<?php
print ("<span class='pun'>" . $henkilo->getError ( $postitoimipaikkaVirhe ) . "</span>") ;
?>
</p>

			<p>
				<label>Puhelinnumero</label> <input type="text" name="puhelinnumero"
					size="20"
					value="<?php print(htmlentities($henkilo->getPuhelinnumero(),ENT_QUOTES, "UTF-8"));?>">
<?php
print ("<span class='pun'>" . $henkilo->getError ( $puhelinnumeroVirhe ) . "</span>") ;
?>
</p>

			<p>
				<label>Palkka</label> <input type="text" name="palkka" size="10"
					value="<?php print(htmlentities($henkilo->getPalkka(),ENT_QUOTES, "UTF-8"));?>">
<?php print("<span class='pun'>" . $henkilo->getError($palkkaVirhe) . "</span>"); ?>
</p>

			<p>
				<label>Ty&ouml;suhteen alku</label> <input type="text"
					name="tyohontulo" size="10" maxlength="10"
					value="<?php print(htmlentities($henkilo->getTyohontulo(),ENT_QUOTES, "UTF-8"));?>">
<?php print("<span class='pun'>" . $henkilo->getError($tyohontuloVirhe) . "</span>"); ?>
</p>

			<p>
				<label>Lis&auml;tieto</label>
				<textarea rows="8" cols="40" name="lisatieto"><?php print(htmlentities($henkilo->getLisatieto(),ENT_QUOTES, "UTF-8"));?></textarea>
<?php print("<br><label>&nbsp;</label><span class='pun' >" . $henkilo->getError($lisatietoVirhe) . "</span>"); ?>
</p>

			<p>
				<br> <label>&nbsp;</label> <input type="submit" name="laheta"
					value="Talleta">&nbsp;&nbsp; <input type="submit" name="peruuta"
					value="Peruuta">
			</p>

		</form>

	</article>

</body>
</html>