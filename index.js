$(document).ready(function(){
    //banner owl-carousel
    $('#banner-area .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        //dots: true,
        items: 1,
        //nav: true,
        loop: true,
        responsive:{
            0:{
                dots: false,
            },
            600:{
                dots: false,
            },
            1000:{
                dots: true,
            }
            
        }
    });

    //top sale 
    $('#top-sale .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        loop: true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });

    //isotope Filter
    var $grid = $(".grid").isotope({
        itemSelector:'.grid-item',
        layoutMode: 'fitRows'
    })
    //filter items on button click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    })

    //New Phones
    $('#new-coming .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        nav: false,
        loop: true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });

    //news
    $('#news .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        nav: false,
        loop: true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
        }
    });

    //product qty section
    let $qty_up = $(".qty .qty_up");
    let $qty_down = $(".qty .qty_down");
    //let $input = $(".qty .qty_input");

    
    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        //let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
        
        //change product price using ajax call
        //$.ajax({uri: 'Template/ajax.php', type : 'POST', data : { itemid : $(this).data("id")}, success: function(result){
       
            //console.log(rep);
            //let obj = JSON.parse(result);
            //let item_price = obj[0]['item_price'];
            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i,oldVal){
                return ++oldVal;
            });
            } 
            
            //increase the price if the product 
            //$price.text(parseInt(item_price*$input.val()).toFixed(2));
           
       //}});  
         
             
    }); 
    

   

    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val() > 1 && $input.val() <= 10){
            $input.val(function(i,oldVal){
                return --oldVal;
            });
        }
       
    });
   

    

});