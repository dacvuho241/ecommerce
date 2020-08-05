<?php
    ob_start(); //without ob_start, this page cannot reload and cart cannot updated
    //include header.php
    include('header.php');
?>

<?php
    //banner-area
    include('Template/_banner-area.php');

    //topsale-area
    include('Template/_top-sale.php');

    //special-price
    include('Template/_special-price.php');

    //banner-ads
    include('Template/_banner-ads.php');

    //new-phone
    include('Template/_new-coming.php');

    //news
    include('Template/_news.php');
?>
       
<?php
    //include footer.php
    include('footer.php');
?>