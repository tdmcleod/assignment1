<?php

include('utilities.php');

function process_form($form_array) {
    $fields_array = array
        (
        "wine_name" => " LIKE ",
        "winery_name" => " LIKE ",
        "region_name" => " LIKE ",
        "variety" => " LIKE ",
        "stock" => " >= ",
        "order" => " >= ",
        "year_min" => " >= ",
        "year_max" => " <= ",
        "max_price" => " <= ",
        "min_price" => " >= "
    );

    $query_terms = "";

    foreach ($form_array as $key => $value) {

        if (array_key_exists($key, $fields_array) && $value != "") {

            $query_terms .=" AND ";
            switch ($key) {
                case 'year_min': $query_terms.='wine.year >= ' . $value;
                    break;

                case 'year_max': $query_terms.='wine.year <= ' . $value;
                    break;

                case 'max_price': $query_terms.='items.price <=' . $value;
                    break;

                case 'min_price':$query_terms.='items.price >=' . $value;
                    break;

                case 'stock':$query_terms.='inventory.on_hand >=' . $value;
                    break;

                case 'order':$query_terms.='items.qty >=' . $value;
                    break;

                case 'wine_name': $query_terms.='wine.wine_name LIKE \'%' . $value . '%\'';
                    break;

                case 'winery_name': $query_terms.='winery.winery_name LIKE \'%' . $value . '%\'';
                    break;

                case 'region_name': $query_terms.='region.region_name LIKE \'%' . $value . '%\'';
                    break;

                case 'variety': $query_terms.='grape_variety.variety LIKE \'%' . $value. '%\'';
                    break;
            }
        }
    }
    return $query_terms;
}

function get_wine_info($search_params) {
    $conn = connect();

    $sql = "SELECT wine.wine_name, items.price, items.qty, inventory.on_hand, winery.winery_name, region.region_name,wine.year, grape_variety.variety  
    FROM wine,inventory,items, winery, region,grape_variety
    WHERE (wine.wine_id = items.wine_id AND wine.wine_id = inventory.wine_id 
    AND winery.winery_id = wine.winery_id AND winery.region_id = region.region_id AND wine.wine_type=grape_variety.variety_id" . 
      $search_params . ") GROUP BY wine.wine_id";
    
    $idx = 0;
    
    echo "<table><thead>
            <tr><th style='text-align:left;width:60px;'></th>
                <th>Wine Name</th>
                <th>Wine Price</th>
                <th>Quantity on Hand</th>
                <th>Winery Name</th>
                <th>Region Name</th>
                <th>Year</th>
                <th>Variety</th>
            </tr>
            </thead>
            <tbody>

        ";
    
    foreach ($conn->query($sql) as $results) {
        
        
        echo "<tr>
            <td style='text-align:left;width:60px;'>$idx</td>
            <td>$results[wine_name]</td>
            <td>$results[price]</td>
            <td>$results[qty]</td>
            <td>$results[winery_name]</td>
            <td>$results[region_name]</td>
            <td>$results[year]</td>
            <td>$results[variety]</td>
            </tr>";
            
        $idx++;
    }
    
    echo "</tbody></table>";
}

include('header.php');
?>


<div class="main-container">
    <div class="main-inner">

        <div class="results-container">
            
            <?php get_wine_info(process_form($_POST)); ?>


        </div>

    </div>
</div>












