 <!--top sale-->

 <?php
    $product_shuffle = $product->getData();
    shuffle($product_shuffle);  //create shuffle effect, more beautiful!

    //request method post -ADD to Cart
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['top_sale_submit'])){
            // call method addToCart()
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
 ?>

 <section id="top-sale">
            <div class="container py-5">
                <h4 class="font-rubik font-size20">Top Sale</h4>
                <hr>
                <div class="item-res owl-carousel owl-theme">
                    <?php foreach ($product_shuffle as $item) {?>
                    <div class="item py-0 px-3">
                        <div class="product font-raleway" style="width: 200px; height:400px;">
                                <a class="py-6 px-6" href="<?php printf('%s?item_id=%s','products.php',$item['item_id'])?>"><img style="width: 200px; height:250px;" src="<?php echo $item['item_image']?? "./assets/products/1.png";?>" alt="product1" class="img-fluid"></a>                                           
                            <div class="text-center py-4">
                                <h6><?php echo $item['item_name']?? "Unknown";?></h6>
                                <div class="rating text-warning font-size12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price']?? '0';?></span>
                                </div>
                                <form method = "post"> 
                                    <input type="hidden" name="item_id" value = "<?php echo $item['item_id']??'1'; ?>">
                                    <input type="hidden" name="user_id" value = "<?php echo 1; ?>">
                                    <button type="submit" name="top_sale_submit" class="btn btn-warning font-size12">Add to Cart</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
</section>