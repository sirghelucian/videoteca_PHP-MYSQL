<?php
   $host="localhost";
   $username="root";
   $password="root";
   $db="Videoteca";
   $conn=mysqli_connect($host,$username,$password) or die ("errore di connessione ".mysqli_error($conn));
   $query="create database if not exists $db;";
   mysqli_query($conn,$query)or die ("errore di creazione $db ".mysqli_error($conn));
   mysqli_query($conn,"use $db;")or die ("errore utilizzo $db ".mysqli_error($conn));
?>