/**
 * Created by Віталій on 10.10.2014.
 */

$(document).ready(function() {

    $(".edit").click(function () {
        $.ajax({
            url: "classes/products.php",
            data: "action=edit&product_id=" + $(this).attr("value"),
            success: function () {

            }
        });
    });

    $("#close").click(function () {
        $.ajax({
            url: "classes/product.php",
            cache: false,
            success: function (html) {
                $("#wrapper").html(html);
            }
        });
    });

    $(".menu").click(function(){
        $.ajax({
            url: "classes/"+$(this).attr('ref')+".php",
            cache: false,
            success: function(html){
                $("#wrapper").html(html);
                $(window).pushState(null, null, $(this).attr('ref'));
            }
        })
    });
});