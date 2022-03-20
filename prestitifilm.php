<?php
  include("config.php");
  echo"<h1>Visualizza tutti i prestiti riguardanti un certo film.</h1>";
  $query="select * from Prestito join Film on Prestito.IdFilm=Film.IdFilm;";
  $risultato=mysqli_query($conn,$query)or die (mysqli_error($conn));
  echo"<form action='$_SERVER[PHP_SELF]' method='post'>
          <select name='ricerca'>";
      while($riga=mysqli_fetch_array($risultato)){
        echo"<option value='$riga[IdFilm]'>$riga[Titolo]</option>";
      }  
  echo"</select>
      <input type='submit' name='ok' value='RICERCA'>
    </form>
  ";

  if(isset($_POST['ok'])){
    $query="select * from Prestito where IdFilm='$_POST[ricerca]';";
    mysqli_query($conn,$query)or die (mysqli_error($conn));
    echo"<table align='left' border='1'>
  <tr>
  <td>Id del prestito</td>
  <td>Nome del richiedente</td>
  <td>Data di inizio del prestito</td>
  <td>Durata del prestito</td>
  </tr>";
  while($riga=mysqli_fetch_array($risultato)){
      echo"<tr>
      <td>$riga[IdPrestito]</td>
      <td>$riga[Richiedente]</td>
      <td>$riga[Inizio_Prestito]</td>
      <td>$riga[Giorni_Prestito] giorni</td>
      
      </tr>";
  }
  echo"</table>
  <a href='home.php'>Clicca qui per tornare alla home.</a>
  ";
    
    
  }
?>