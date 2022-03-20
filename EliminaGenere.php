<?php
  include("config.php");
  echo"<h1>Elimina un genere con relativi film.</h1>";
  $query="select * from Genere;";
  $risultato=mysqli_query($conn,$query)or die (mysqli_error($conn));
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>
          <select name='ricerca'>";
      while($riga=mysqli_fetch_array($risultato)){
        echo"<option value='$riga[IdGenere]'>$riga[Descrizione]</option>";
      }  
  echo"</select>
      <input type='submit' name='ok' value='ELIMINA'>
    </form>
  ";

  if(isset($_POST['ok'])){
    $query="delete from Genere where IdGenere='$_POST[ricerca]';";
    mysqli_query($conn,$query)or die (mysqli_error($conn));
    echo"Eliminazione avvenuta con esito positivo.<br>
    <a href='home.php'>Clicca qui per tornare alla home.</a>";
    
    
  }
?>