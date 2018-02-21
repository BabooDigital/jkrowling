$(document).ready(function () {
    getBookmark();
    getLastRead();
})

function getBookmark() {
    $.ajax({
        url: 'bookmark',
        type: 'POST',
        dataType: 'json',
        data: {user: user},
    })
    .done(function(data) {
        var html = '';
        var html_desk = '';
        html_desk += '<a class="terakhir_dilihat_label"></a> <a class="terakhir_dilihat_button"><b></b></a> <div class="terakhir_dilihat_enter"></div>';
        html_desk += '<div class="terakhir_dilihat_sub1a"> <img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" class="terakhir_dilihat_img"> <div class="terakhir_dilihat_sub2"> <div id="title_book"> <b class="font_title_terakhir_dilihat">The Kite Runner ...</b> </div> <div id="author_book"> <p class="terakhir_dilihat_by">By : Idealcom</p> </div> </div> </div>';
        $.each(data, function(index, val) {
        html_desk += '<div class="terakhir_dilihat_sub1"> <img src="'+val.cover_url+'" class="terakhir_dilihat_img"> <div class="terakhir_dilihat_sub2"> <div id="title_book"> <b class="font_title_terakhir_dilihat"><a href="" id="slug">'+val.title_book+'</a></b> </div> <div id="author_book"> <p class="terakhir_dilihat_by">By : '+val.author_name+'</p> </div> </div> </div>'; 

        });
        $(".terakhir_dilihat").html(html_desk);
        $("#content1").html(html);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}
var slug = function(str) {
    var $slug = '';
    var trimmed = $.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}
function getLastRead() {
    $.ajax({
        url: 'lastread',
        type: 'POST',
        dataType: 'json',
        data: {user: user},
    })
    .done(function(data) {
        var html = '';
        html += '<a class="terakhir_dilihat_label">Terakhir Dilihat</a> <a class="terakhir_dilihat_button"><b>Lihat Semua</b></a> <div class="terakhir_dilihat_enter"></div>';
        html += '<div class="terakhir_dilihat_sub1a"> <img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" class="terakhir_dilihat_img"> <div class="terakhir_dilihat_sub2"> <div id="title_book"> <b class="font_title_terakhir_dilihat">The Kite Runner ...</b> </div> <div id="author_book"> <p class="terakhir_dilihat_by">By : Idealcom</p> </div> </div> </div>';
        $.each(data, function(index, val) {
            $('#slug').text(slug(val.title_book));
            html += '<div class="terakhir_dilihat_sub1"> <img src="'+val.cover_url+'" class="terakhir_dilihat_img"> <div class="terakhir_dilihat_sub2"> <div id="title_book"> <b class="font_title_terakhir_dilihat"><a href="" id="slug">'+val.title_book+'</a></b> </div> <div id="author_book"> <p class="terakhir_dilihat_by">By : '+val.author_name+'</p> </div> </div> </div>'; });
        $(".terakhir_dilihat").html(html);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}