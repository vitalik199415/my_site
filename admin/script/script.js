/**
 * Created by Admin on 12.09.14.
 */
$(document).ready(function() {

    $("a#remind_link").click(function(){
        $("#login").hide();
        $("#remind").show();
        return false;
    });

    $("img.arrow").click(function(){

        var row = ".hidden_row_"+$(this).attr("id");

        if ($(row).is(":visible")) {
            $(row).slideUp("slow");
            $(this).attr("src","images/arrow_right.png");
        } else {
            $(row).slideDown("slow");
            $(this).attr("src","images/arrow_down.png");
        }

    });

    function show_login(){
        $("#login").show();
        $("#remind").hide();
    }

    function show_remind(){
        $("#login").hide();
        $("#remind").show();
    }

    $("#menu li a").each(function () {              // получаем все нужные нам ссылки
        var location = window.location.href;        // получаем адрес страницы
        var link = this.href;                       // получаем адрес ссылки
        if(location.indexOf(link)+1) {              // при совпадении адреса ссылки и адреса окна
            $(this).addClass('active');             //добавляем класс
        } else {
            $("#first").addClass('active');
        }
    });

    $("#add").click(function(){
        $("#show").slideUp(300);
        $("#edit").slideDown(300);
    });

    $("#close").click(function(){
        $("#edit").slideUp(300);
        $("#show").slideDown(300);
    });

    $("#save").hover(function(){ $("#save").attr("src","images/hover_save_btn.png"); },function(){ $("#save").attr("src","images/save_btn.png"); })
    $("#save").mousedown(function(){ $("#save").attr("src","images/click_save_btn.png")});
    $("#save").mouseup(function(){ $("#save").attr("src","images/save_btn.png"); });
});