<?php
//delete from cart
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //delete from cart
    if (isset($_POST['delete-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }

    //save for later
    if (isset($_POST['wishlist-submit'])) {
        $Cart->saveForLater($_POST['item_id']);
    }

}
?>

<!--Shopping Cart-->
<section id="cart" class="py-3">
    <div class="container py-5 w-75">
        <h4 class="font-baloo font-size20">Shopping Cart</h4>
        <!--Shopped Products -->
        <div class="row">
            <div class="col-sm-8">
                <!--cart items-->
                <?php
                foreach ($product->getData('cart') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) { //assign subtotal in array map to return price
                        //print_r($result);
                ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="cart1" class="img-fluid">
                            </div>

                            <div class="col-sm-8 py-2">
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
                                    <form method="post" >
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger border-right">Delete</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger px-3">Save for later</button>
                                    </form>
                                    <div class="d-flex font-raleway w-25 ">
                                        <button class="qty_up border bg-light" data-id="<?php echo $item['item_id']??'0'; ?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border w-50 bg-light text-center" disabled value="1" placeholder="1"> 
                                        <button class="qty_down border bg-light" data-id="<?php echo $item['item_id']??'0';  ?>"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                    
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

            <!--Subtotal-->
            <div class="col-sm-4 mt-3">
                <div class="sub-total border text-center">
                    <h6 class="font-size12 font-raleway text-success py-3"> <i class="fas fa-check"></i> Your order is eligible for FREE delivery</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size20"><span> Sub Total: <span><?php echo count($product->getData('cart'));  ?></span> <span> item(s)</span> </span> </h5>
                        <h5 class="font-baloo font-size20"> <span class="text-danger">$ <span class="text-danger" id="deal-price"> <?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?> </span></span></h5>
                        <button class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>