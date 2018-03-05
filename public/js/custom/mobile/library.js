$(document).ready(function () {
    getBookmark();
    getLastRead();
});

function convertToSlug(Text)
{
    return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-')
    ;
}

function getLastRead() {
    $.ajax({
        url: 'lastread',
        type: 'POST',
        dataType: 'json',
        data: {user: iaiduui},
        beforeSend: function()
        {
            $(".loader").show();
        }
    })
    .done(function(data) {
        $(".loader").hide();
        if (data == []) {
            var html = '';
            html +='<div class="container"><h5 class="text-muted">Anda belum membaca buku satupun. Ayo baca lebih banyak buku...</h5><div>';
            $("#myWorkContent").html(html);
        }else {
            var html = '';
            $.each(data, function(index, val) {
                var title = val.title_book;
                var viewtitle = title;
                if (title.length > 10) {
                    viewtitle = title.substring(0,11) + '...';
                }
                html += '<a class="pull-left" href="book/'+ val.book_id+"-"+convertToSlug(val.title_book) +'"> <div class="col-12" style="height:auto;"> <div> <img src="'+val.cover_url+'" width="110" height="140" class="rounded" style="box-shadow: 0px 0px 10px rgba(76, 76, 76, 0.3);"> </div> <div class="mt-10" style="text-align:left;"> <div id="title_book"> <p style="font-size: 13px;font-weight: bold;">'+ viewtitle +'</p> </div> <div id="author_book" class="text-muted"> <p style="font-size: 10px;">by '+val.author_name+'</p> </div> </div> </div> </a>'; });
            $("#insideDiv").html(html);
        }
    })
    .fail(function() {
        console.log('asd');
    })
    .always(function() {
    });
}

function getBookmark() {
    $.ajax({
        url: 'bookmark',
        type: 'POST',
        dataType: 'json',
        data: {user: iaiduui},
        beforeSend: function() {
            $(".loader").show();
        }
    })
    .done(function(data) {
        $(".loader").hide();
        if (data == []) {
            var html = '';
            $.each(data, function(index, val) {
                var title = val.title_book;
                var viewtitle = title;
                if (title.length > 22) {
                    viewtitle = title.substring(0,21) + '...';
                }

                var authorimg = val.author_avatar;
                if (authorimg == null || authorimg == 'Kosong' || authorimg == '') {
                    authorimg = 'public/img/profile/blank-photo.jpg';
                }
                html += '<a href="book/'+ val.book_id+"-"+convertToSlug(val.title_book) +'"><div class="col-12 mb-20"> <div class="bookmarkbook w-100"> <img src="'+ val.cover_url +'" width="150" height="180" class="rounded"> <img src="public/img/assets/bookmark.png" width="30" height="40" class="markbook"> <div class="mt-10"> <div id="title_book"> <p style="font-size: 13px;font-weight: bold;">'+ viewtitle +'</p> </div> <div id="author_book"> <p style="font-size: 12px;"><img src="'+ authorimg +'" width="20" height="20" class="rounded-circle"> '+ val.author_name +'</p> </div> </div> </div> </div></a>'; 

            });
            $("#bookmarkList").html(html);
        }else {
            var html = '';
            html +='<div class="container"><h5 class="text-muted">Anda belum bookmark buku apapun. Ayo baca lebih banyak buku...</h5><div>';
            $("#bookmarkList").html(html);
        }
    })
    .fail(function() {
        console.log("asd");
    })
    .always(function() {
    });
}