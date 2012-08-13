<?php require_once('utilities.php'); ?>
<?php require_once('header.php'); ?>


<div class="main-container">
    <div class="main-inner">

        <div class="search-container">
            <form method="POST" action="results.php" id="wine_form">
                <table>
                    <tr>
                        <td>Wine</td>
                        <td><input class="search-main" type="text" id="wine_name" name="wine_name" /></td>
                    </tr>
                    <tr>
                        <td>Winery Name</td>
                        <td><input class="search-main" type="text" id="winery_name" name="winery_name" /></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td><select name="region_name"><?php get_regions(); ?></select></td>
                    </tr>
                    <tr>
                        <td>Variety</td>
                        <td><select name="variety"><?php get_variety(); ?></select></td>
                    </tr>
                    
                    <tr>
                        <td>Year Range</td>
                        <td><select name="year_min"> <?php get_years(); ?></select><select name="year_max"><?php get_years(); ?></select></td>
                    </tr>
                    <tr>
                        <td>Min Wines in Stock</td>
                        <td><input class="search-main" type="text" id="min_stock" name="stock" /></td>
                    </tr>
                    <tr>
                        <td>Min Wines in Ordered</td>
                        <td><input class="search-main" type="text" id="min_order" name="order" /></td>
                    </tr>
                    <tr>
                        <td>Price Range</td>
                        <td><input class="search-main" type="text" id="min_price" name="min_price" style="width:110px;margin-right:5px;" /><input class="search-main" type="text" id="max_price" name="max_price" style="width:110px;" /> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" id="submit" class="btn" /></td>
                    </tr>

                </table>

            </form>

         

        </div>

    </div>
</div>




<?php require_once('footer.php'); ?>
