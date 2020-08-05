

<!--Shopping Cart-->
<section id="cart" class="py-3">
    <div class="container py-5 w-75">
        <h4 class="font-baloo font-size20">Shopping Cart</h4>
        <!--Shopped Products -->
        <div class="row">
            <div class="col-sm-8 text-center">
                <!--empty cart-->
                <div class="row top py-3 mt-4">
                    <div class="col-sm-12">
                        <img class="img-fluid" src="./assets/blog/empty_cart.png" alt="Empty Cart" style="height: 200px;">
                        <p class="font-baloo font-size16 text-black-50">Empty Cart</p>
                    </div>
                </div>
               

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