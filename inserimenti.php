<?php
  include("config.php");
  $query="
    insert into Genere(Descrizione) values
       ('Horror'),
  	   ('Azione'),
  	   ('Commedia');
  ";
  mysqli_query($conn,$query)or die ("Errore negli inserimenti".mysqli_error($conn));
  $query="
    insert into Film(Titolo,Regista,IdGenere,Url_Locandina) values
       ('Fat and Furios','PinoLongino',2,'fat.jpg'),
       ('Grimsby - Attenti a quell altro','LouisLeterrier',2,'grimsby.jpg'),
       ('Kung Fury','Orion',2,'kungfury.jpg');  
  ";
  mysqli_query($conn,$query)or die ("Errore negli inserimenti".mysqli_error($conn));
?>