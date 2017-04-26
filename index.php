<?php
if (isset($_POST["talleta"])) {
  $henkilo = new Henkilo();
  
}
elseif (isset($_POST["tyhjenna"])) {
  header("location: index.php");
  exit;
}
else {

}
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>
      Joulukortit kirjautuminen 
    </title>
  </head>
  <body>
    <h1>Joulukortit kirjautuminen</h1>
    <form action="onnistunut_kirjautuminen.php" method="post">
    <table>
      <tr>
         <td>
           Käyttäjätunnus 
         </td>
         <td>
	   <input type="text" name="kayttajatunnus" size="20">          
         </td>
      </tr>
      <tr>
         <td>
           Salasana 
         </td>
         <td>
	   <input type="password" name="salasana" size="20">          
         </td>
	  </tr>
	  <tr>
         <td>
         </td>
		 <td>
           <input type="submit" name="kirjaudu" value="Kirjaudu">
         </td>
      </tr>
    </table>
    </form>
  </body>
</html>
