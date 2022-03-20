<?php
  include("config.php");
echo"<h1 align='left'>Effettua un nuovo prestito.</h1>";
echo"<form action='$_SERVER[PHP_SELF]' method='post'>";
$elenco=mysqli_query($conn,"select * from Film;")or die (mysqli_error()); 
   echo"<select name='film'>";
   while($riga=mysqli_fetch_array($elenco)){
    echo"<option value='$riga[IdFilm]'>$riga[Nome]</option>";
   }
  echo"</select>Seleziona il film <br>
  <input type='text' name='richiedente'> Inserisci il tuo nome<br>
  <input type='number' name='quantita'> Inserisci la quantita di giorni del prestito<br>
  <input type='text' name='data' value='GG/MM/AA'> Scegli la data di inizio del prestito<br>
  <input type='submit' name='ok' value='AVANTI'> 
    </form>
  ";
  if(isset($_POST['ok'])){
  	if($_POST['richiedente']=="" || $_POST['quantita']==""){
  		echo"ATTENTO NON HAI COMPILATO TUTTI I CAMPI!";
  	}
  	else{
       $query="insert into Prestito(IdFilm,Richiedente,Inizio_Prestito,Giorni_Prestito) values ('$_POST[film]','$_POST[richiedente]','$_POST[data]','$_POST[quantita]')";
       mysqli_query($conn,$query)or die ("Errore negli inserimenti".mysqli_error());
       echo"Prestito effettuato correttamente<br>
       <a href='home.php'>Clicca qui per tornare alla home.</a>";
  	}
  }
?>