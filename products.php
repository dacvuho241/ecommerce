<?php
    ob_start();
    //include header.php
    include('header.php');
?>

<?php
    //products
    include('Template/_products.php');

    //topsale-area
    include('Template/_top-sale.php');
?>
       
<?php
    //include footer.php
    include('footer.php');
?>