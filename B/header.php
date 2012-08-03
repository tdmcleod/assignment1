<!doctype html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="styles/styles.css" />
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script>
                function findme(){
                    navigator.geolocation.getCurrentPosition(doit,broken,{enableHighAccuracy:true});

                }
                
                function broken(){
                    
                }
                
                function doit(position){
                    var map_div = document.getElementById("maps");
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    var LatLng = new google.maps.LatLng(lat,lng);
                    
                    console.log(LatLng);
                    
                    var map_options = {
                        center:LatLng,
                        zoom:18,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
   
                    };
                    
                    var map = new google.maps.Map(map_div,map_options);
                    
                    var marker_options = {
                        
                        position:LatLng,
                        map:map,
                        title:'RMIT'
                        
                    };
                    
                    
                    var marker = new google.maps.Marker(marker_options);
                }
                
                
            </script>
        
    </head>
    
    <body>
        
        <div class="container-all">
            <div class="header-container">
                <div class="header-inner">
                 
                    <div class="header-left">
                        The Winestore
                    </div>
                    
                    <div class="header-right">
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
         
            
        
        
        
   
    

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
