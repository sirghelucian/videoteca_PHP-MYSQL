<?php
  include("config.php");
  $query="
     create table if not exists Genere(
       IdGenere int(10) primary key auto_increment,
       Descrizione varchar(30)
       
     );
  ";
  mysqli_query($conn,$query) or die("Errore creazione tabella".mysqli_error($conn));  
  $query="
     create table if not exists Film(
       IdFilm int(10) primary key auto_increment,
       Titolo varchar(50),
       Regista varchar(30),
       IdGenere int(10),
       Url_Locandina varchar(50),
       foreign key (IdGenere) references Genere(IdGenere) on delete cascade on update cascade
     );
  ";
  mysqli_query($conn,$query) or die("Errore creazione tabella".mysqli_error($conn));  
  $query="
     create table if not exists Prestito(
       IdPrestito int(10) primary key auto_increment,
       IdFilm int(10),
       Richiedente varchar(30),
       Inizio_Prestito datetime,
       Giorni_Prestito int(10),
       foreign key (IdFilm) references Film(IdFilm) on delete cascade on update cascade
     );
  ";
  mysqli_query($conn,$query) or die("Errore creazione tabella".mysqli_error($conn));
  mysqli_close($conn);
?>