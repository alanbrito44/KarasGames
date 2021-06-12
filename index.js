$(document).ready(function(){

    //top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000 : {
                items: 4
            }
        }
    });

    //isotope filter
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    $(".button-group").on("click","button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });

    //new games owl carousel
    $("#new-games .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000 : {
                items: 4
            }
        }
    });
    
    //blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000 : {
                items: 3
            }
        }
    });

    //product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $dealPrice = $("#deal-price");
    //let $input = $(".qty .qty-input");
    //click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $precio = $(`.product_price[data-id='${$(this).data("id")}']`);

        //cambiando el precio del producto usando ajax call
        $.ajax({url: "template/ajax.php",
                type: 'post',
                data: {itemid: $(this).data("id")},
                success: function(result){
                    let obj = JSON.parse(result);
                    let juego_precio = obj[0]['juego_precio'];

                    if($input.val() >=1 && $input.val() <= 9){
                        $input.val(function(i,oldval){
                            return ++oldval;
                        });

                        //incremento el precio del producto
                        $precio.text(parseInt(juego_precio*$input.val()).toFixed(2));
                        //poniendo el subtotal final
                        let subtotal = parseInt($dealPrice.text()) + parseInt(juego_precio);
                        $dealPrice.text(subtotal.toFixed(2));

                    }      
                }})//cerrando el ajax request   
    });
    //click on qty down button
    $qty_down.click(function(e){

        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $precio = $(`.product_price[data-id='${$(this).data("id")}']`);

        //cambiando el precio del producto usando ajax call
        $.ajax({url: "template/ajax.php",
                type: 'post',
                data: {itemid: $(this).data("id")},
                success: function(result){
                    let obj = JSON.parse(result);
                    let juego_precio = obj[0]['juego_precio'];

                    if($input.val() >1 && $input.val() <= 10){
                        $input.val(function(i,oldval){
                            return --oldval;
                        });

                        //incremento el precio del producto
                        $precio.text(parseInt(juego_precio*$input.val()).toFixed(2));
                        //poniendo el subtotal final
                        let subtotal = parseInt($dealPrice.text()) - parseInt(juego_precio);
                        $dealPrice.text(subtotal.toFixed(2));
                    }                
                }})//cerrando el ajax request   
    });
});