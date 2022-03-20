<?php
  include("config.php");
  echo"<h1>Modifica la durata di un prestito.</h1>";
  $query="select * from Prestito;";
  $risultato=mysqli_query($conn,$query)or die (mysqli_error($conn));
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>
          <select name='ricerca'>";
      while($riga=mysqli_fetch_array($risultato)){
        echo"<option value='$riga[IdPrestito]'>$riga[Richiedente] - $riga[IdFilm] - $riga[Giorni_Prestito]gg</option>";
      }  
  echo"</select>
  <input type='number' name='giorni' >Inserisci la nuova durata del prestito<br>
      <input type='submit' name='ok' value='AGGIORNA'>
    </form>
  ";

  if(isset($_POST['ok'])){
    $query="Update Prestito set Giorni_Prestito = $_POST['giorni'] where IdPrestito='$_POST[ricerca]';";
    mysqli_query($conn,$query)or die (mysqli_error($conn));

    echo"Aggiornamento avvenuto con esito positivo.<br>
    <a href='home.php'>Clicca qui per tornare alla home.</a>";
    
    
  }
?>