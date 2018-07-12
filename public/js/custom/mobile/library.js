$(document).ready(function () {
    getBookmark();
    getLastRead();
    getCollection();
    detail_transaction();
});
function convertToSlug(Text) {return Text.toString().toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');}

function getLastRead() {
    $.ajax({
        url: base_url+'lastread',
        type: 'POST',
        dataType: 'json',
        data: {user: iaiduui, csrf_test_name: csrf_value},
        beforeSend: function()
        {
            $(".loader").show();
        }
    })
    .done(function(data) {
        if (data.code != 200) {
            var html = '';
            html +='<div class="container"><h5 class="text-muted">Anda belum membaca buku satupun. Ayo baca lebih banyak buku...</h5><div>';
            $("#myWorkContent").html(html);
        }else {
            var html = '';
            $.each(data.data, function(index, val) {
                var title = val.title_book.toString();
                var viewtitle = title;
                if (title.length > 10) {
                    viewtitle = title.substring(0,11) + '...';
                }
                var urls = base_url+'book/'+ val.book_id+'-'+convertToSlug(val.title_book);
                if (val.is_pdf == true) {
                    var urls = base_url+'book/'+ val.book_id+'-'+convertToSlug(val.title_book)+'/pdf';
                }
                html += '<a class="pull-left" href="'+urls+'"> <div class="col-12" style="height:auto;"> <div> <img src="'+val.cover_url.toString()+'" width="110" height="140" class="rounded" style="box-shadow: 0px 0px 10px rgba(76, 76, 76, 0.3);object-fit:cover;"> </div> <div class="mt-10" style="text-align:left;"> <div id="title_book"> <p style="font-size: 13px;font-weight: bold;">'+ viewtitle +'</p> </div> <div id="author_book" class="text-muted"> <p style="font-size: 10px;">by '+val.author_name+'</p> </div> </div> </div> </a>'; });
            $("#insideDiv").html(html);
            if (data.data.length == 5) {
                $('.alllast').show();
            }
        }
        $(".loader").hide();
    })
    .fail(function() {
        
    })
    .always(function() {
    });
}

function getBookmark() {
    $.ajax({
        url: base_url+'bookmark',
        type: 'POST',
        dataType: 'json',
        data: {user: iaiduui, csrf_test_name: csrf_value},
        beforeSend: function() {
            $(".loader").show();
        }
    })
    .done(function(data) {
        if (data.code == 200) {
            var html = '';
            $.each(data.data, function(index, val) {
                var title = val.title_book.toString();
                var viewtitle = title;
                if (title.length > 22) {
                    viewtitle = title.substring(0,21) + '...';
                }

                var authorimg = val.author_avatar.toString();
                if (authorimg == null || authorimg == '') {
                    authorimg = 'public/img/profile/blank-photo.jpg';
                }
                var urls = base_url+'book/'+ val.book_id+'-'+convertToSlug(val.title_book);
                if (val.is_pdf == true) {
                    var urls = base_url+'book/'+ val.book_id+'-'+convertToSlug(val.title_book)+'/pdf';
                }
                html += '<a href="'+urls+'"><div class="col-12 mb-20"> <div class="bookmarkbook w-100"> <img src="'+ val.cover_url.toString() +'" width="150" height="180" class="rounded"> <img src="public/img/assets/bookmark.png" width="30" height="40" class="markbook" style="object-fit:cover;"> <div class="mt-10" style="text-align:left;"> <div id="title_book"> <p style="font-size: 13px;font-weight: bold;">'+ viewtitle +'</p> </div> <div id="author_book"> <p style="font-size: 12px;"><img src="'+ authorimg +'" width="20" height="20" class="rounded-circle"> '+ val.author_name +'</p> </div> </div> </div> </div></a>';

            });
            $("#bookmarkList").html(html);
            if (data.data.length == 4) {
                $('.allmark').show();
                $(document).on("click", ".allmark", function() {
                    window.location = base_url+"library/all_bookmark";
                });
            }
        }else {
            var html = '';
            html +='<div class="container"><h5 class="text-muted">Anda belum bookmark buku apapun. Ayo baca lebih banyak buku...</h5><div>';
            $("#bookmarkList").html(html);
        }
        $(".loader").hide();
    })
    .fail(function() {
        
    })
    .always(function() {
    });
}

function getCollection() {
    $.ajax({
        url: base_url+'collections',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            $(".loader").show();
        }
    })
    .done(function(data) {
        if (data.code == 200) {
            var html = '';
            $.each(data.data, function(index, col) {
                var title = col.title_book.toString();
                var viewtitle = title;
                if (title.length > 22) {
                    viewtitle = title.substring(0,21) + '...';
                }

                var authorimg = col.author_avatar.toString();
                if (authorimg == null || authorimg == '') {
                    authorimg = 'public/img/profile/blank-photo.jpg';
                }

                var urls = base_url+'book/'+ col.book_id+'-'+convertToSlug(col.title_book);
                if (col.is_pdf == true) {
                    var urls = base_url+'book/'+ col.book_id+'-'+convertToSlug(col.title_book)+'/pdf';
                }
                html += '<a href="'+urls+'"><div class="col-12 mb-20"> <div class="bookmarkbook w-100"> <img src="'+ col.cover_url.toString() +'" width="150" height="180" class="rounded"> <div class="mt-10" style="text-align:left;"> <div id="title_book"> <p style="font-size: 13px;font-weight: bold;">'+ viewtitle +'</p> </div> <div id="author_book"> <p style="font-size: 12px;"><img src="'+ authorimg +'" width="20" height="20" class="rounded-circle"> '+ col.author_name +'</p> </div> </div> </div> </div></a>';

            });
            $("#collectionList").html(html);
            if (data.data.length == 4) {
                $('.allcoll').show();
                $(document).on("click", ".allcoll", function() {
                    window.location = base_url+"library/all_collection";
                });
            }
        }else {
            var html = '';
            html +='<div class="container"><h5 class="text-muted">Anda belum memiliki koleksi buku apapun.</h5><div>';
            $("#collectionList").html(html);
        }
        $(".loader").hide();
    })
    .fail(function() {
        
    })
    .always(function() {
    });
}