$(document).ready(function () {
    // $(document).on('click', '.profile', function() {
        // event.preventDefault();
        // var boo = $(this);
        // var usr_prf = boo.attr("data-usr-prf");
        // var usr_name = boo.attr("data-usr-name");
        // var formdata = new FormData();

        // formdata.append("user_prf", usr_prf);
        // formdata.append("csrf_test_name", csrf_value);
        // var url = base_url+'profile/'+usr_name;
        // var form = $('<form action="' + url + '" method="post">' +
        // '<input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" />' +
        //   '<input type="hidden" name="usr_prf" value="' + usr_prf + '" />' +
        //   '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
        //   '</form>');
        // $(boo).append(form);
        // form.submit();
        // console.log("aaa");
    // });

    $(document).on("keyup", "#searchss", function (event) {
        $("#myWorkContent").html("<div id='insideDiv'></div>");
        $("#search_books").html("");
        var bak = $(this).val();
        if (bak.length >= 3) {
            var ab = $(this),
                b = new FormData;
            b.append("search", $(this).val());
            b.append("csrf_test_name", csrf_value);
            ab.data('timer', setTimeout(function () {
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
                                var follow;
                                var txtfol;
                                if (valid.isFollow == false) {
                                    follow = 'follow-u';
                                    txtfol = 'Follow';
                                }else {
                                    follow = 'unfollow-u';
                                    txtfol = 'Unfollow';
                                }
                                var prof_picts = valid.prof_pict;
                                if (valid.prof_pict == '' || valid.prof_pict == null) {
                                    prof_picts = base_url + "public/img/profile/blank-photo.jpg";
                                }
                                userhtml += "<div class='card mr-10 pull-left' style='width:15%;'> <div class='container'> <div class='row'> <div class='col-12'> <div class='text-center p-10'> <img src='" + prof_picts + "' width='50' height='50' class='rounded-circle'> <p class='nametitled'><a href='"+base_url+"penulis/"+valid.user_id+"-"+convertToSlug(valid.fullname)+"'>" + valid.fullname + "</a></p> </div> </div> </div> <div class='row'> <div class='col-6 text-center rborder'> <p style='display: inline-flex;'><img src='public/img/icon-tab/book.svg' width='25'> <span>" + valid.book_made + "</span></p> <h6>Buku</h6> </div> <div class='col-6 text-center'> <p style='display: inline-flex;'><img src='public/img/icon-tab/followers.svg' width='25'> <span>" + valid.followers + "</span></p> <h6>Teman</h6> </div> </div> <br> <div class='row'> <div class='col-12 text-center'> <button class='btnfollow-f "+follow+"' data-follow='" + valid.user_id + "'><img src='public/img/icon-tab/add_follow.svg' width='30'> <span class='txtfollow'>"+txtfol+"</span></button> </div> </div> <br> </div> </div>";
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
                                var ava = valad.author_avatar;
                                if (valad.author_avatar == null || valad.author_avatar == '') {
                                    ava = 'public/img/profile/blank-photo.jpg';
                                }
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
                                if(valad.is_like == true){
                                    unlikes = "unlike";
                                    img_love = base_url + "public/img/assets/love_active.svg";
                                }
                                var urls = base_url+'penulis/'+ valad.author_id+'-'+convertToSlug(valad.author_name)+'/'+valad.book_id+'-'+convertToSlug(valad.title_book);
                                if (valad.is_pdf == true) {
                                    var urls = base_url+'penulis/'+ valad.author_id+'-'+convertToSlug(valad.author_name)+'/'+valad.book_id+'-'+convertToSlug(valad.title_book)+'/pdf';
                                }

                                bookhtml += "<div class='card mb-15 p-0 text-left'> <div class='card-body p-0 pl-30 pr-30 pt-15'> <div class='row mb-10 pl-15 pr-15'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ ava +"' width='50' height='50' alt='"+ valad.author_name +"'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'><a href='"+base_url+"penulis/"+ valad.author_id +"-"+convertToSlug(valad.author_name)+"' class='author_name'>"+ valad.author_name +"</a></h5> <p class='text-muted' style='margin-top:-10px;'><small><span>"+ valad.publish_date +"</span></small></p> </div> </div> </div> <div class='media'> <a href='"+urls+"'><img alt='"+valad.title_book+"' src='"+cover_url+"' class='w-100 imgcover cover_image'></a> </div> <a href='"+urls+"' class='segment' data-href='"+ valad.book_id+"'><h5 class='pt-20 w-100' style='font-weight: 700;'><b class='dbooktitle'>"+valad.title_book+"</b></h5></a> <div class='w-100'> <span class='mr-8' style='font-size: 12px;'>"+valad.category+" &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca "+ valad.view_count +" kali</span> <p class='mt-10 textp' data-text='"+ valad.desc +"'>"+ valad.desc.substr(0, 100)+'...' +"</p> </div> </div> <div class='bg-white card-footer text-muted pr-30 pl-30' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <div class='dropdown'> <button class='share-btn dropbtn' type='button' id='dropShare' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <img src='public/img/assets/icon_share.svg' width='23'> </button> <div class='dropdown-menu' aria-labelledby='dropShare'> <a class='dropdown-item share-fbs' href='javascript:void(0);' data-share='"+valad.book_id+"'><img src='public/img/assets/fb-icon.svg' width='20'> Facebook</a> </div> </div> </div> <div> <a data-id='"+ valad.book_id+"' href='javascript:void(0);' class='"+unlikes+"'><img src='"+img_love+"' class='mr-20 loveicon' width='27'></a> <a href='#'><img src='public/img/assets/icon_comment.svg' class='mr-10' width='25'></a> </div> </div> </div>";
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
                });
            }, 1000));
        };
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    //
    //   $(document).on('click', '.share-fbs', function() {
    //
    //   var aww = $(this);
    //   var formData = new FormData();
    //   var blink = aww.parents(".card").find(".dbooktitle").text();
    //   var desc = aww.parents(".card").find(".textp").attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo.id';
    //   var img = aww.parents(".card").find('.cover_image').attr('src');
    //   var auname = aww.parents(".card").find('.author_name').text();
    //   var segment = aww.parents(".card").find('.segment').attr('data-href');
    //
    //   FB.ui({
    //     method     : 'share_open_graph',
    //     action_type: 'og.shares',
    //     action_properties: JSON.stringify({
    //       object: {
    //         'og:url': base_url + 'book/' + segment + '/preview',
    //         'og:title': blink + ' ~ By : ' + auname + ' | Baboo.id',
    //         'og:description': desc,
    //         'og:image': img
    //       }
    //     })
    //   },
    //     // callback
    //     function(response) {
    //       if (response && !response.error_message) {
    //
    //         formData.append("user_id", $("#iaiduui").val());
    //         formData.append("book_id", aww.attr('data-share'));
    //         formData.append("csrf_test_name", csrf_value);
    //
    //         $.ajax({
    //           url: base_url + 'shares',
    //           type: 'POST',
    //           dataType: 'JSON',
    //           cache: false,
    //           contentType: false,
    //           processData: false,
    //           data: formData,
    //             // beforeSend: function() {
    //             // }
    //           })
    //         .done(function(data) {
    //             // $('.loader').hide();
    //             // console.log("ke share");
    //           })
    //         .fail(function() {
    //           console.log("Failure");
    //         })
    //         .always(function() {
    //
    //         });
    //       } else {
    //         console.log("Batal Share");
    //       }
    //     });
    // });

    function convertToSlug(Text) {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    }
    function convertSearch(Text) {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '+');
    }
    // $(document).on('focus', '.search_bbo', function () {
    //     $(".search_result_bbo").addClass('show').removeClass('hide');
    // });
    $(document).on('click', function () {
        $(".search_result_bbo").addClass('hide').removeClass('show');
    });

    $('.search_bbo').bind("enterKey",function(e){
        window.location = base_url+'search/'+$(this).val();
    });
    $('.search_bbo').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });

    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();
    $(document).on('keyup', '.search_bbo', function(event) {
        $(this).attr("style", "background: url('"+base_url+"public/img/spinner.gif') no-repeat right;background-size: 75px;background-position: 110% 50%;");
        var search = $(this).val();
        var formdata = new FormData();

        formdata.append('search', search);
        formdata.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "searching",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: formdata,
        })
            .done(function(data) {
                if (search.length >=3) {
                    $(".search_result_bbo").addClass('show').removeClass('hide');
                    var list_book = '',
                        list_user = '';
                    list_all = '';

                    if (data['books'].length !== 0){
                        list_book += '<h6 class="dropdown-header">Daftar Pencarian Buku</h6><hr class="mt-0 mb-5">';
                    }
                    $.each(data['books'], function(index, val) {
                        var cover = val.cover_url;
                        if (cover == null || cover == ""){
                            var cover = base_url+'public/img/blank_cover.png';
                        }
                        var urls = base_url+'penulis/'+ val.author_id+'-'+convertToSlug(val.author_name)+'/'+val.book_id+'-'+convertToSlug(val.title_book);
                        if (val.is_pdf == true) {
                            var urls = base_url+'penulis/'+ val.author_id+'-'+convertToSlug(val.author_name)+'/'+val.book_id+'-'+convertToSlug(val.title_book)+'/pdf';
                        }
                        list_book += '<a href="'+urls+'"><li class="dropdown-item"><img class="img-fluid rounded mr-10 obj-fit-cover book_cover_search" src="'+cover+'" width="20" height="25">'+val.title_book+'</li></a>';
                    });


                    if (data['user'].length !== 0) {
                        list_user += '<h6 class="dropdown-header mt-15">Daftar Pencarian Pengguna</h6><hr class="mt-0 mb-5">';
                    }
                    $.each(data['user'], function(index, val) {
                        var prof_pict = val.prof_pict;
                        if (prof_pict == null || prof_pict == ""){
                            var prof_pict = base_url+'public/img/profile/blank-photo.jpg';
                        }
                        list_user += '<a class=""  data-usr-prf="'+val.user_id+'" data-usr-name="'+convertToSlug(val.fullname)+'" href="'+base_url+'penulis/'+val.user_id+'-'+convertToSlug(val.fullname)+'"><li class="dropdown-item"><img class="img-fluid rounded mr-10 obj-fit-cover prof_pict_search" src="'+prof_pict+'" width="20" height="25">'+val.fullname+'</li></a>';
                    });
                    list_all += '<hr class="mb-5"><a href="'+base_url+'search/'+convertSearch(search)+'"><li class="dropdown-item font-weight-bold text-center">Lihat Semua</li></a>';
                    if (data['books'].length === 0 && data['user'].length === 0){
                        $(".search_result_bbo").html('<li class="dropdown-item">Kata kunci yang anda cari tidak ada...</li>');
                    }else{
                        $(".search_result_bbo").html(list_book+list_user+list_all);
                    }
                }else{
                    $(".search_result_bbo").addClass('hide').removeClass('show');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                delay(function(){
                    $('.search_bbo').attr("style", "background: url('"+base_url+"public/img/search.png') no-repeat right;background-size: 18px;background-position: 95% 50%;");
                }, 500);
            });
    });

});
