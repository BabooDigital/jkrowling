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
            data: b
        }).done(function (data) {
            if (Object.keys(data.user).length > 0) {
                var userhtml = "";

                if (bak.length >= 1) {
                    $.each(data.user, function (valkey, valid) {
                        var prof_picts = valid.prof_pict;
                        if (valid.prof_pict == '' || valid.prof_pict == null) {
                            prof_picts = base_url + "public/img/profile/blank-photo.jpg";
                        }
                        userhtml += "<a class='pull-left' ><div class='card-library mb-15' style='height: auto;'> <div class='list-group'> <div class='row mb-10' style='padding: 0px 10px 0px 10px;'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src=" + prof_picts + " width='48' alt='Generic placeholder image'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'>" + valid.fullname + "</h5> <p class='text-muted' style='margin-top:-10px;'> <small> <span>" + valid.book_made + "</span> <span class='ml-10'>" + valid.date_of_birth + "</span></small> </p></div></div></div></div></div></a>";
                    });
                }
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
                        bookhtml += "<div class='card-library mb-15' style='height: auto;'> <div class='list-group'> <div class='row mb-10' style='padding: 0px 10px 0px 10px;'> <div class='card-body p-0 pl-20 pr-20 pt-20 pb-10'><div class='row pl-10 pr-10'> <div class='media'> <img class='w-100 imgcover' src=" + cover_url + " width='48' alt='Generic placeholder image'></div><h5 class='pt-20 w-100' style='font-weight: 700;'><b>" + valad.title_book + "</b></h5> <div class='w100'><span class='mr-8' style='font-size: 12px;'>" + valad.category + " &#8226; </span> <span class='text-muted' style='font-size: 11px;'> dibaca "+valad.view_count+" kali </span><p class='mt-10 text-justify'> <small> <span>" + valad.desc + "</span> <span class='ml-10'>" + valad.publish_date + "</span></small> </p></div></div></div><div class='col-12 text-muted' style='font-size: 11px;'><div class='pull-right'><span><b>" + valad.share_count + "</b> Bagikan</span></div><div><span class='mr-30'><b>"+valad.like_count+"</b> Suka</span><span><b>"+valad.comment_count+"</b> Komentar</span></div></div><div class='bg-white card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'><div class='pull-right'><a href='#'><img src='"+base_url+"public/img/assets/icon_share.svg' width='23'></a></div><div><a data-id='"+valad.book_id+"' href='javascript:void(0);' id='loveboo"+valad.book_id+"' class='mr-30 fs-14px "+ unlikes +"'><img src='"+ img_love +"' class='mr-10 loveicon' width='27'></a><a href='javascript:void(0);'><img src='"+base_url+"public/img/assets/icon_comment.svg' class='mr-10' width='25'></a></div></div></div></div></div>";
                    });
                }
                $("#search_books").html(bookhtml);
            }

            if(Object.keys(data.books).length == 0){
                var bhtml ='<div class="container"><h5 class="text-muted">Tidak ada buku yang dicari</h5><div>';
                $("#search_books").html(bhtml);
            }
        }).fail(function () {
            console.log("error")
        }).always(function () {
        })
    });


});