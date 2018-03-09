$(document).ready(function () {
    $(document).on("keyup", "#searchss", function () {
        $("#myWorkContent").html("<div id='insideDiv'></div>");
        $("#search_books").html("");
        var bak = $(this).val();
        // alert(bak);
        var ab = $(this),
            b = new FormData;
        b.append("search", $(this).val());
        $.ajax({
            url: base_url + "searching",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: b,
            beforeSend: function() {
                $('.loader').show();
              }
        }).done(function (data) {
            if (Object.keys(data.user).length > 0) {
                var userhtml = "";

                if (bak.length >= 1) {
                    $.each(data.user, function (valkey, valid) {
                        var prof_picts = valid.prof_pict;
                        if (valid.prof_pict == '' || valid.prof_pict == null) {
                            prof_picts = base_url + "public/img/profile/blank-photo.jpg";
                        }
                        userhtml += "<div class='card mr-10 pull-left' style='width:15%;'> <div class='container'> <div class='row'> <div class='col-12'> <div class='text-center p-10'> <img src='" + prof_picts + "' width='50' height='50' class='rounded-circle'> <p class='nametitled'><a href='#'>" + valid.fullname + "</a></p> </div> </div> </div> <div class='row'> <div class='col-6 text-center rborder'> <p style='display: inline-flex;'><img src='public/img/icon-tab/book.svg' width='25'> <span>" + valid.book_made + "</span></p> <h6>Buku</h6> </div> <div class='col-6 text-center'> <p style='display: inline-flex;'><img src='public/img/icon-tab/followers.svg' width='25'> <span>" + valid.followers + "</span></p> <h6>Pengikut</h6> </div> </div> <br> <div class='row'> <div class='col-12 text-center'> <button class='btnfollow-f follow-u' user-d='" + valid.user_id + "'><img src='public/img/icon-tab/add_follow.svg' width='30'> <span class='txtfollow'>Ikuti</span></button> </div> </div> <br> </div> </div>";
                    });
                }
                $('.loader').hide();
                $("#insideDiv").html(userhtml);
            }

            if(Object.keys(data.user).length == 0){
                var xhtml ='<div class="container"><h5 class="text-muted">Tidak ada pengguna yang dicari</h5><div>';
                $("#myWorkContent").html(xhtml);
            }

            if (Object.keys(data.books).length > 0) {
                var bookhtml = "";
                if (bak.length >= 1) {
                    $.each(data.books, function (valkay, valad) {
                        var cover_url = valad.cover_url;
                        if (valad.cover_url == '' || valad.cover_url == null) {
                            cover_url = "https://assets.dev-baboo.co.id/baboo-cover/default1.png";
                        }
                        var image_url = valad.image_url;
                        if (valad.image_url == '' || valad.image_url == null) {
                            image_url = cover_url;
                        }
                        var unlikes = "like";
                        var img_love = base_url + "public/img/assets/icon_love.svg";
                        if(valad.is_like == false){
                            unlikes = "unlike";
                            img_love = base_url + "public/img/assets/love_active.svg";
                        }
                        bookhtml += "<div class='card mb-15 p-0 text-left'> <div class='card-body p-0 pl-30 pr-30 pt-15'> <div class='row mb-10 pl-15 pr-15'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ valad.author_avatar +"' width='50' height='50' alt='"+ valad.author_name +"'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'><a href='javascript:void(0);'>"+ valad.author_name +"</a></h5> <p class='text-muted' style='margin-top:-10px;'><small><span>Jakarta, Indonesia</span> <span class='ml-10'>"+ valad.publish_date +"</span></small></p> </div> </div> </div> <div class='media'> <a href='book/"+ valad.book_id+"-"+convertToSlug(valad.title_book) +"'><img alt='"+valad.title_book+"' src='"+cover_url+"' class='w-100 imgcover'></a> </div> <a href='book/"+ valad.book_id+"-"+convertToSlug(valad.title_book) +"'><h5 class='pt-20 w-100' style='font-weight: 700;'><b>"+valad.title_book+"</b></h5></a> <div class='w-100'> <span class='mr-8' style='font-size: 12px;'>"+valad.category+" &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca "+ valad.view_count +" kali</span> <p class='mt-10'>"+ valad.desc.substr(0, 100)+'...' +"</p> </div> </div> <div class='bg-white card-footer text-muted pr-30 pl-30' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a href='#'><img src='public/img/assets/icon_share.svg' width='23'></a> </div> <div> <a data-id='"+ valad.book_id+"' href='javascript:void(0);' id='loveboo"+ valad.book_id+"'><img src='public/img/assets/icon_love.svg' class='mr-20 loveicon' width='27'></a> <a href='javascript:void(0);'><img src='public/img/assets/icon_comment.svg' class='mr-10' width='25'></a> </div> </div> </div>";
                    });
                }
                $('.loader').hide();
                $("#search_books").html(bookhtml);
            }

            if(Object.keys(data.books).length == 0){
                var bhtml ='<div class="container"><h5 class="text-muted">Tidak ada buku yang dicari</h5><div>';
                $('.loader').hide();
                $("#search_books").html(bhtml);
            }
        }).fail(function () {
            console.log("error")
        }).always(function () {
        })
    });

function convertToSlug(Text) {
  return Text
  .toLowerCase()
  .replace(/[^\w ]+/g, '')
  .replace(/ +/g, '-');
}
});