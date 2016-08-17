
$(document).ready(function() {

    $(".my-cart-trigger").leanModal();

});

$(document).scroll(function() {
    if($(window).scrollTop() == 0) {
        $("section").animate({
            "padding-top": "140px"
        }, {
            duration: 50, queue: false
        });
        $("header img").animate({
            height: "50px"
        }, {
            duration: 250, queue: false
        });

    } else {
        $("section").animate({
            "padding-top": "60px"
        }, {
            duration: 50, queue: false
        });
        $("header img").animate({
            height: "30px"
        }, {
            duration: 100, queue: false
        });
    }
});


function validateForm()
{
    validated = true;

    if($("#first_name").val().length === 0)
    {
        validated = false;
        $("#first_name").parent().addClass("invalid");
    }

    if($("#last_name").val().length === 0)
    {
        validated = false;
        $("#last_name").parent().addClass("invalid");
    }

    if($("#email").val().length === 0)
    {
        validated = false;
        $("#email").parent().addClass("invalid");
    }

    if($("#address").val().length === 0)
    {
        validated = false;
        $("#address").parent().addClass("invalid");
    }

    if($("#city").val().length === 0)
    {
        validated = false;
        $("#city").parent().addClass("invalid");
    }

    if($("#area_code").val().length === 0)
    {
        validated = false;
        $("#area_code").parent().addClass("invalid");
    }

    if($("#country").val() == "0")
    {
        validated = false;
        $("#country").parent().addClass("invalid");
    }


    if(!validated)
        $("#warningTrigger").trigger("click");

    return validated;
}


function changeShippingPrice() {

    var country = $("select#country option:selected").val();

    var $shipping = $("p#shipping-price");
    var price = 0;

    if(country == 'Croatia' || country == 'Bosnia and Herzegovina')
        price = 0;
    else if(country == 'USA' || country == 'Canada' || country == 'Mexico')
        price = 10;
    else if( country == 'Albania'    || country == 'Andorra' ||
        country == 'Armenia'    || country == 'Azerbaijan' ||
        country == 'Belarus'    || country == 'Georgia' ||
        country == 'Iceland'    || country == 'Kazakhstan' ||
        country == 'Kosovo'     || country == 'Liechtenstein' ||
        country == 'Macedonia'  || country == 'Moldova' ||
        country == 'Monaco'     || country == 'Montenegro' ||
        country == 'Norway'     || country == 'Russia' ||
        country == 'San Marino' || country == 'Serbia' ||
        country == 'Slovakia'   || country == 'Switzerland' ||
        country == 'Turkey'     || country == 'Ukraine')
            price = 7;
    else
        price = 5;


    $shipping.text("Shipping: " + price + " EUR");
}