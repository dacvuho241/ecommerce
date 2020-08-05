<?php
    ob_start();
    //include header.php
    include('header.php');
?>

<?php

    //include cart item if it is not empty    
    count($product->getData('cart')) ?  include('Template/_cart.php') :  include('Template/notFound/_cart_notFound.php');

    //wishlist
    include('Template/_wishlist-template.php');
    
    //new-phone
    include('Template/_new-coming.php');
?>
       
<?php
    //include footer.php
    include('footer.php');
?>