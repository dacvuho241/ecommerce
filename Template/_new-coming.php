 <!--New Phones-->
<?php
    $product_shuffle = $product->getData();
    shuffle($product_shuffle);


     //request method post -ADD to Cart
     if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['new_product_submit'])){
            // call method addToCart()
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>

 <section id="new-coming">
            <div class="container py-5">
                <h4 class="font-rubik font-size20">New</h4>
                <hr>
                <div class="owl-carousel owl-theme">
                    <?php array_map(function($item) {?>
                    <div class="item py-2 bg-light px-2 py-2 text-center" style="width: 200px; height:400px;">
                        <div class="product font-raleway">
                            <a href="<?php printf('%s?item_id=%s','products.php',$item['item_id'])?>"><img style="width: 200px; height:250px;" src="<?php echo $item['item_image']??"./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                            <div class="pb-4">
                                <h6><?php echo $item['item_brand']??"Unknown"; ?></h6>
                                <div class="rating text-warning font-size12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price']??"0"; ?></span>
                                </div>
                                <form method="post">
                                     <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                     <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                     <button type="submit" name="new_product_submit" class="btn btn-warning font-size12">Add to Cart</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <?php }, $product_shuffle) ?>                
                </div>      
            </div>

        </section>