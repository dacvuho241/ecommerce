<!--product info-->
<?php
$item_id = $_GET['item_id']??1; //get item_id from db
//print($item_id);
//use for loop because each loop will generate distinguish id when click on
foreach ($product->getData() as $item) : //$product object from function.php
    if ($item['item_id'] == $item_id) : //very important to force item_id match item_id in database, if without this expression, we don't know which item_id to match
        // we cannot express the code below into if{} so we use ALTERNATIVE syntax endif 

//request method post -ADD to Cart
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['product_submit'])){
        // call method addToCart()
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']); //$Cart obj from function.php
    }
}       
?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/2.png" ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size16 font-baloo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                            </div>
                            <div class="col">
                                <form method="post">
                                     <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                     <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                     <button type="submit" name="product_submit" class="btn btn-warning form-control">Add to Cart</button>
                                 </form>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 pt-5">
                        <h5 class="font-baloo font-size20"><?php echo $item['item_name'] ?? "Unknown" ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Unknown" ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-raleway font-size14">20,300 ratings | 500+ answered questions</a>
                        </div>
                        <hr class="m-0">
                        <!--product price-->
                        <table class="my-3">
                            <tr class="font-rale font-size14">
                                <td>M.R.P</td>
                                <td><strike>$162.00</strike></td>
                            </tr>
                            <tr class="font-rale font-size14">
                                <td>Deal Price</td>
                                <td class="font-size20 text-danger">$<span><?php echo $item['item_price'] ?? "0" ?></span> <small class="text-dark font-size12">&nbsp;&nbsp;inclusive of all taxes</small> </td>
                            </tr>
                            <tr class="font-rale font-size14">
                                <td>You Save</td>
                                <td><span class="font-size16 text-danger">$10.00</span> </td>
                            </tr>
                        </table>

                        <!--Policy-->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size12">10 Days <br> Replacement </a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size12">Daily Tuition <br> Delivered </a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size12">1 Year <br> Warranty </a>
                                </div>

                            </div>

                        </div>

                        <!--Order details-->
                        <div id="order-details" class="font-raleway d-flex flex-column text-dark">
                            <small>Deliver by: June 25 - July 1</small>
                            <small>Sold by <a href="#">Daily Electronics</a>(4.5 out of 5 | 15,198 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 10010</small>
                        </div>

                        <!--Color, quantity selection-->
                        <div class="row">
                            <div class="col-6">
                                <!--color-->
                                <div class="color my-3">
                                    <div class="d-flex">
                                        <h6 class="font-baloo">Color</h6>
                                        <a href="#">
                                            <div class="m-2 color-yellow-bg rounded-circle" style="width: 35px; height: 35px;"></div>
                                        </a>
                                        <a href="#">
                                            <div class="m-2 color-primary-bg rounded-circle" style="width: 35px; height: 35px;"></div>
                                        </a>
                                        <a href="#">
                                            <div class="m-2 color-second-bg rounded-circle" style="width: 35px; height: 35px;"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <!--quantity-->
                                <div class="qty d-flex my-3">
                                    <h6 class="font-baloo px-2">Qty </h6>
                                    <div class="px4 d-flex font-raleway py-2">
                                        <button class="qty_up border bg-light" data-id="<?php echo $item['item_id']??'0';  ?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="<?php echo $item['item_id']??'0';  ?>" class="qty_input border text-center w-25 bg-light" disabled value="1" placeholder="1">
                                        <button class="qty_down border bg-light" data-id="<?php echo $item['item_id']??'0';  ?>"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Size-->
                        <div class="size">
                            <h6 class="font-baloo">Size</h6>
                            <div class="d-flex justify-content-between w-75 m-2">
                                <button class="btn btn-light border font-size14" style="width: 100px;">S</button>
                                <button class="btn btn-light border font-size14" style="width: 100px;">M</button>
                                <button class="btn btn-light border font-size14" style="width: 100px;">XL</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h6 class="font-rubik">Product Description</h6>
                        <hr>
                        <p class="font-raleway font-size14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima omnis veritatis molestiae dolores, facere molestias quaerat, dolorum odit est neque vel nostrum provident explicabo. Repudiandae nulla vel consequuntur consequatur fugiat!</p>
                    </div>
                </div>
            </div>
        </section>

<?php
    endif;
endforeach;
?>