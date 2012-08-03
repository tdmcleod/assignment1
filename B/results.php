<?php include('utilities.php');

$fields_array = array
           (
            "wine_name",
            "winery_name",
            "min_stock",
            "min_order",
            "yr_min",
            "yr_max",
            "max_price",
            "min_price"
            );


function process_form()
{
   $query_terms = array();
    
    foreach($_POST as $key => $value)
    {
        if(in_array($value, $fields_array) && $value != "")
        {
           array_push($query_terms, htmlentities($value)); 
        
        }

    }
    return $query_terms;
}
    
function get_wine_info($search_params){
    $conn = connect();
    
//    $stmnt = $search_params[0];
//   if(count($search_params) > 1){ 
//        for($i=1;$i<count($search_params)-1;$i++){
//           $stmnt += "AND $search_params[$i]"; 
//
//        }
//   }
   //$stmnt += ");";
   //$sql = "SELECT * FROM ";
    
   $sql = "SELECT * FROM wine INNER JOIN inventory ON (wine.wine_id=inventory.wine_id) INNER JOIN items ON (wine.wine_id = items.wine_id) WHERE(inventory.cost>0) GROUP BY(wine.wine_id)";
   
   $idx=0;
   foreach($conn->query($sql) as $results){
       
       echo $idx . ". ";
       echo $results["wine_name"];
       echo "---".$results["cost"] . "-----";
       echo $results["price"] ."-----";
       echo $results["qty"];
       echo "<br />";
       $idx++;
   }
   
   
   
   
   //winery,grape_variety,region)
   
}
 

get_wine_info(array('hi','who-me?'));

?>
