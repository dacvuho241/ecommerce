
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //delete from cart
    if(isset($_POST['delete-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }
    //add to cart
    
    if(isset($_POST['cart-submit'])){
        $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>

<!--Shopping Cart-->
<section id="cart" class="py-3">
    <div class="container py-5 w-75">
        <h4 class="font-baloo font-size20">Wishlist</h4>
        <!--Shopped Products -->
        <div class="row">
            <div class="col-sm-8">
                <!--cart items-->
                <?php
                foreach ($product->getData('wishlist') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) { //assign subtotal in array map to return price
                        //print_r($result);
                ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="cart1" class="img-fluid">
                            </div>

                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                                <small>by <?php echo $item['item_brand'] ?? "brand"; ?></small>
                                <!--Rating-->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size12" style="width :150px;">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-raleway font-size14" style="width :380px;">20,300 ratings | 500+ answered questions</a>
                                </div>
                                <!--quantity-->
                                <div class="qty d-flex pt-2">     
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="cart-submit" class="btn font-baloo text-danger px-3">Add to Cart</button>
                                    </form>      
                                </div>
                            </div>

                            <div class="col-sm-2  text-right">
                                <div class="font-size20 text-danger font-baloo">
                                    $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';  ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                        return $item['item_price'];
                    }, $cart);
                //print_r($subTotal);
                endforeach;

                ?>

            </div>
            
        </div>

    </div>
</section>