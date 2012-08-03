<?php


function connect(){
    
    $pdo = new PDO("mysql:host=yallara.cs.rmit.edu.au;dbname=winestore;port=59443", "td_mcleod", "blowfish1") or die("Could not connect");
    return $pdo;
}


?>
