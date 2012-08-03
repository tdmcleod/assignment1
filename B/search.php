<?php

    $conn=mysql_connect('yallara.cs.rmit.edu.au:59443','td_mcleod','blowfish1') or die("Could not connect");
    mysql_select_db('winestore',$conn);
    
    $sql = "SELECT * FROM winery";
    
    $results = mysql_query($sql);
    
    print_r($results);
    
?>