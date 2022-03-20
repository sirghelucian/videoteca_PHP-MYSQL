<html>
<head>
</head>
<body>
<?php
echo"<h1 align='center'>BENVENUTO NELLA HOME DELLA VIDEOTECA</h1>";
  include("config.php");
  echo"<h1 align='left'>DA QUI PUOI ANDARE ALLE SEGUENTI PAGINE</h1><br>
<ul>
<li><a href='prestiti.php'>Visualizza i prestiti attualmente attivi.</a></li>
<li><a href='Nuovofilm.php'>Aggiungi un nuovo film.</a></li>
<li><a href='NuovaPrestito.php'>Aggiungi un prestito.</a></li>
<li><a href='EliminaGenere.php'>Elimina un genere di film.</a></li>
<li><a href='prestitiutente.php'>Visualizza i prestiti di un determinato utente.</a></li>
<li><a href='prestitifilm.php'>Visualizza i prestiti di un determinato film..</a></li>
<li><a href='aggiornaprestiti.php'>Aggiorna la durata di un prestito.</a></li>
</ul>
  ";
?>
</body>
</html>