<?php


function connect(){
    
    $pdo = new PDO("mysql:host=yallara.cs.rmit.edu.au;dbname=winestore;port=59443", "td_mcleod", "blowfish1") or die("Could not connect");
    return $pdo;
}



function get_regions(){
    
    
}

function get_variety(){
    
}

function get_years(){
    
    $conn = connect();
    
    $sql = "SELECT MAX(year) FROM wine";
    $max= $conn->query($sql);
    
    $sql = "SELECT MIN(year) FROM wine";
    $min = $conn->query($sql);
    
    for($i=$min;$i<=$max;$i++){
        
        echo "<option value\"$i\" >$i</option>";
         
    }
    
}


?>
