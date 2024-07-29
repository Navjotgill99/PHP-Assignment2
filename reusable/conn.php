<?php 

$connect = mysqli_connect('localhost', 'root', 'root', 'formula1');
      if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
      }