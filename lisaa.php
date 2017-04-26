<?php
require_once 'osoite.php'; 

if (isset($_POST["talleta"])) {
	$osoite = new Osoite($_POST["nimi"], $_POST["katuosoite"],$_POST["kunta"], $_POST["postinumero"],
	$_POST["osavaltio"], $_POST["maa"]);
	$nimiVirhe = $osoite->checkNimi();
	$katuosoiteVirhe = $osoite->checkKatuosoite();
	$kuntaVirhe = $osoite->checkKunta();
	$postinumeroVirhe = $osoite->checkPostinumero();
	$osavaltioVirhe = $osoite->checkOsavaltio();
	$maaVirhe = $osoite->checkMaa();
	if($nimiVirhe == 0 && $katuosoiteVirhe == 0 && $kuntaVirhe == 0 && $postinumeroVirhe == 0 && $osavaltioVirhe == 0 && $maaVirhe == 0) {
		
	}
}
else {
    $osoite = new Osoite();
    $nimiVirhe = 0;	
}
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>
      Joulukortit lisää
    </title>
  </head>
  <body>
  <?php
  if(session_id() == '' || !isset($_SESSION)) {
	  print("Sessio on päällä!");
  ?>

    <h1>Joulukortit lisää</h1>
    <form action="lisaa.php" method="post">
    <table>
      <tr>
         <td>
           Nimi(*)
         </td>
         <td>
		 <input type="text" name="nimi" size="40" value="<?php print(htmlentities($osoite->getNimi(), ENT_QUOTES, "UTF-8")); ?>">
<?php
if($nimiVirhe != 0) {
	  print("<b>" . $osoite->getError($nimiVirhe) . "</b>");
}
?>
         </td>
      </tr>
      <tr>
         <td>
           Katuosoite(*)
         </td>
         <td>
		 <input type="text" name="katuosoite" size="40" value="<?php print(htmlentities($osoite->getKatuosoite(), ENT_QUOTES, "UTF-8")); ?>">          
<?php
if($katuosoiteVirhe != 0) {
  print("<b>" . $osoite->getError($katuosoiteVirhe) . "</b>");
}
?>

         </td>
      </tr>
      <tr>
         <td>
           Kunta(*)
         </td>
         <td>
		 <input type="text" name="kunta" size="40" value="<?php print(htmlentities($osoite->getKunta(), ENT_QUOTES, "UTF-8")); ?>">          
<?php
if($kuntaVirhe != 0) {
  print("<b>" . $osoite->getError($kuntaVirhe) . "</b>");
}
?>

       </td>
      </tr>
      <tr>
         <td>
           Postinumero(*)
         </td>
         <td>
		 <input type="text" name="postinumero" size="30" value="<?php print(htmlentities($osoite->getPostinumero(), ENT_QUOTES, "UTF-8")); ?>">          
<?php
if($postinumeroVirhe != 0) {
  print("<b>" . $osoite->getError($postinumeroVirhe) . "</b>");
}
?>

         </td>
      </tr>
      <tr>
         <td>
           Osavaltio(*)
         </td>
         <td>
		 <input type="text" name="osavaltio" size="40" value="<?php print(htmlentities($osoite->getOsavaltio(), ENT_QUOTES, "UTF-8")); ?>">          
<?php
if($osavaltioVirhe != 0) {
  print("<b>" . $osoite->getError($osavaltioVirhe) . "</b>");
}
?>

         </td>
      </tr>
      <tr>
         <td>
           Maa(*)
         </td>
         <td>
		 <input type="text" name="maa" size="40" value="<?php print(htmlentities($osoite->getMaa(), ENT_QUOTES, "UTF-8")); ?>">          
<?php
if($maaVirhe != 0) {
  print("<b>" . $osoite->getError($maaVirhe) . "</b>");
}
?>

         </td>
      </tr>
      <tr>
         <td>
           Email
         </td>
         <td>
	   <input type="text" name="email" size="40">          
         </td>
      </tr>
      <tr>
         <td>
           Puhelin (ilman plussia)
         </td>
         <td>
	   <input type="text" name="puhelin" size="40">          
         </td>
      </tr>
      <tr>
         <td>
           Saadut kortit
         </td>
         <td>
	   <textarea name="saadut" rows="4" cols="80"></textarea>
         </td>
      </tr>
      <tr>
         <td>
         </td>
         <td>
           <input type="submit" name="talleta" value="Tallenna">
           <input type="reset" name="tyhjenna" value="Tyhjennä">
         </td>
      </tr>
    </table>
    </form>
	<?php
    }
	?>
  </body>
</html>
