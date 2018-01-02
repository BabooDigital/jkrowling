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
        $.each(data, function(index, val) {
            html += '<div class="cards" style="padding: 0 00px;"> <div class="card-body p-0 p-20"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img class="d-flex align-self-start mr-20 rounded-circle" src="public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <h5 class="card-title nametitle2">'+val.author_name+'</h5> <p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span> <span class="ml-10">1 hours ago</span></small></p> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img src="'+val.image_url+'" style="width: 100%;height: 200px;"> </div> <h5 style="padding-top:50px; font-weight: 500;"><b>'+val.title_book+'</b></h5> <div style="margin-top:10px;"> <a href="#" class="mr-10"><span style="font-size:12px;border: 1px #7554bd solid;border-radius: 25px;padding: 3px 10px;color: #7554bd;">FIKSI</span></a> <span class="mr-10"><img src="public/img/assets/icon_view.svg"> 290</span> <span><img src="public/img/assets/icon_share.svg"> 12</span></p> <p style="font-size:16px; font-family: Roboto; margin-top:20px; ">'+val.desc+' </div> </div> </div> <div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;"> <div class="pull-right"> <a href="#"><img src="public/img/assets/icon_share.svg" width="18"></a> </div> <div> <a href="#" class="mr-20"><img src="public/img/assets/icon_love.svg" class="mr-5" width="27"></a> <a href="#"><img src="public/img/assets/icon_comment.svg" class="mr-10" width="25"></a> </div> </div> </div>'; 
        });

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