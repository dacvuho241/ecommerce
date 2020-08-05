 <!--Special Price-->
 <?php
    //use array_map to pass the variable (array) of the getData() function into call back function and print the brand name 
    $brand = array_map(function ($pro) {
        return $pro['item_brand'];
    }, $product_shuffle);
    $unique = array_unique($brand); //array-unique enables select the unique (no iteration) value in a array..
    sort($unique); //sort all brand in alphabet order
    //print_r($unique); //check
    shuffle($product_shuffle);


    //request method post -ADD to Cart
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['special_price_submit'])){
            // call method addToCart()
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>

 <section id="special-price">
     <div class="container">
         <h4 class="font-rubik font-size20">Special Price</h4>
         <hr>
         <!--Filter-->
         <div id="filter" class="item-res button-group text-right font-baloo font-size16">
             <button class="btn is-checked" data-filter="*">View All</button>
             <?php
                // use array_map function to irritate the button, and when buttons are added from database, you don't need to edit coe anymore
                // you can set any $name of variable in thí function
                array_map(function ($brand) {
                    printf('<button class="btn" data-filter = ".%s"> %s </button>', $brand, $brand);
                }, $unique);  //pass $unique var into Callback function($brand).
                ?>
         </div>

         <div class="grid">
             <?php array_map(function ($item) { ?>
                 <div class="grid-item <?php echo $item['item_brand'] ?? "Brand"; ?> border">
                     <div  style="width: 200px; height:400px;">
                         <div class="product font-raleway">
                                <a  href="<?php printf('%s?item_id=%s', 'products.php', $item['item_id']) ?>"><img style="width: 200px; height:250px;" src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product13" class="img-fluid"></a>
                             <div class="text-center py-4">
                                 <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                 <div class="rating text-warning font-size12">
                                     <span><i class="fas fa-star"></i></span>
                                     <span><i class="fas fa-star"></i></span>
                                     <span><i class="fas fa-star"></i></span>
                                     <span><i class="fas fa-star"></i></span>
                                     <span><i class="fas fa-star"></i></span>
                                 </div>
                                 <div class="price py-2">
                                     <span><?php echo $item['item_price'] ?? '0'; ?></span>
                                 </div>
                                 <form method="post">
                                     <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                     <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                     <button type="submit" name="special_price_submit" class="btn btn-warning font-size12">Add to Cart</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php }, $product_shuffle) ?>
         </div>

     </div>

 </section>