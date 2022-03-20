<?php
  include("config.php");
echo"<h1 align='left'>Aggiungi un nuovo film.</h1>";
echo"<form action='$_SERVER[PHP_SELF]' method='post' enctype='multipart/form-data'>
<input type='text' name='nome'> Inserisci il titolo del film.<br>
<input type='text' name='regista'> Inserisci il nome del regista.<br>
<input type='file' name='regista'> Inserisci la locandina del film.<br>";
$elenco=mysqli_query($conn,"select * from Genere;")or die (mysqli_error()); 
   echo"<select name='genere'>";
   while($riga=mysqli_fetch_array($elenco)){
    echo"<option value='$riga[IdGenere]'>$riga[Descrizione]</option>";
   }
  echo"</select>Seleziona il genere del film. <br>

<input type='submit' name='ok' value='AVANTI'> 
    </form>
  ";
  if(isset($_POST['ok'])){

  	if($_POST['nome']=="" || $_POST['regista']==""){
  		echo"ATTENTO NON HAI COMPILATO TUTTI I CAMPI!";
  	}
  	else{
    $tmp=$_FILES['image']['tmp_name'];
    $nome=$_FILES['image']['name'];
    move_uploaded_file($tmp,$nome);
       $query="insert into Film(Titolo,Regista,IdGenere,Url_Locandina) values
      ('$_POST[nome]','$_POST[regista]','$_POST[genere]','$nome')";
       mysqli_query($conn,$query)or die ("Errore negli inserimenti".mysqli_error());
       echo"Film aggiunto correttamente<br>
       <a href='home.php'>Clicca qui per tornare alla home.</a>";
  	}
  }
?>