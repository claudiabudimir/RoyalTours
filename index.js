$(document).ready(function() {

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    //product

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        margin: 20,
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    var $gallery = $('#gallery');
    var $boxes = $('.revGallery-anchor');
    $boxes.hide();

    // isotope filter
    var $grid = $(".nak-gallery").isotope({
        itemSelector: '.revGallery-anchor',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    })

    //button active mode
    $('.button').click(function() {
        $('.button').removeClass('is-checked');
        $(this).addClass('is-checked');
    });

    // product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(e) {

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({
            url: "Template/ajax.php",
            type: 'post',
            data: { itemid: $(this).data("id") },
            success: function(result) {
                let obj = JSON.parse(result);
                let item_price = obj[0]['pret'];

                if ($input.val() >= 1 && $input.val() <= 2) {
                    $input.val(function(i, oldval) {
                        return ++oldval;
                    });

                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }
        }); // closing ajax request
    }); // closing qty up button

    // click on qty down button
    $qty_down.click(function(e) {

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({
            url: "Template/ajax.php",
            type: 'post',
            data: { itemid: $(this).data("id") },
            success: function(result) {
                let obj = JSON.parse(result);
                let item_price = obj[0]['pret'];

                if ($input.val() > 1 && $input.val() <= 3) {
                    $input.val(function(i, oldval) {
                        return --oldval;
                    });


                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }
        }); // closing ajax request
    }); // closing qty down button
});

// ========================================================================= //
//  Porfolio isotope and filter
// ========================================================================= //
$(window).load(function() {

    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-thumbnail',
        layoutMode: 'fitRows'
    });

    $('#portfolio-flters li').on('click', function() {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });

})