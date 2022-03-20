<html>
  <head>
  </head>
  <body>
    <?php
    echo"<h1 align='center'>BENVENUTO NELLA HOME DEI PRESTITI</h1>";
      include("config.php");
      echo"<h1 align='left'>Visualizza qui tutti i prestiti attualmente attivi.</h1>
        Hai la possibilità di fare le seguenti operazioni :<br>
        <ul>
          <li><a href='NuovoPrestito.php'>Effettua un nuovo prestito.</a></li>
          <li><a href='prestitifilm.php'>Visualizza tutti i prestiti di un determinato film.</a></li>
          <li><a href='prestitiutente.php'>Visualizza tutti i prestiti di un determinato utente.</a></li>
          <li><a href='modificagiorni.php'>Modifica i giorni di un prestito.</a></li>
          <li><a href='home.php'>Oppure torna alla home.</a></li>
        </ul>
      ";
      $query="select IdPrestito,Titolo,Url_Locandina,Richiedente,Inizio_Prestito,Giorni_Prestito,Url_Locandina from Prestito join Film on Prestito.IdFilm=Film.IdFilm;";
      $risultato=mysqli_query($conn,$query)or die (mysqli_error($conn));
      echo"
      <table align='left' border='1'>
        <tr>
          <td>Id del prestito</td>
          <td>Titolo del film</td>
          <td>Locandina del film</td>
          <td>Nome del richiedente</td>
          <td>Data di inizio del prestito</td>
          <td>Durata del prestito</td>
      
      </tr>";
      while($riga=mysqli_fetch_array($risultato)){
          echo"<tr>
          <td>$riga['IdPrestito']</td>
          <td>$riga['Titolo']</td>
          <td><img src='$riga[Url_Locandina]' height='100' width='120'></td>
          <td>$riga['Richiedente']</td>
          <td>$riga['Inizio_Prestito']</td>
          <td>$riga['Giorni_Prestito'] giorni</td>
          
          </tr>";
      }
      echo"</table>
      <a href='home.php'>Clicca qui per tornare alla home.</a>
      ";
    ?>
  </body>
</html>