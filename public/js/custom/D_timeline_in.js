function funcDropdown() {
    document.getElementById("myDropdown").classList.toggle("showss")
}

function showLoading() {
    HoldOn.open({
        theme: "sk-cube-grid",
        message: "Tunggu Sebentar ",
        backgroundColor: "white",
        textColor: "#7554bd"
    })
}

$(document).on('mouseenter mouseleave','.nav-btn_dropdown',function(e){
    var _d=$(e.target).closest('.dropdown');
    _d.addClass('show');
    setTimeout(function(){
        _d[_d.is(':hover')?'addClass':'removeClass']('show');
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
    },1000);
});

function convertToSlug(e) {
    return e.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
}

function shareBtn() {
    document.getElementById("dropdownShare").classList.toggle("show")
}
$(document).ready(function() {
    // filterSelection("all");

    // $(document).on('click', '.btn-cat_select', function() {
    //     var aww = $(this),
    //         FD = new FormData,
    //         category = aww.attr('dat-category');
    //
    //     FD.append('category', category);
    //     FD.append("csrf_test_name", csrf_value);
    //     $.ajax({
    //         url: base_url + "category_get",
    //         type: "POST",
    //         dataType: "JSON",
    //         cache: !1,
    //         contentType: !1,
    //         processData: !1,
    //         data: FD
    //     }).done(function(data) {
    //
    //     }).fail(function() {
    //
    //     }).always(function() {
    //
    //     });
    // });
    $(document).on('click', '.followprofile', function(event) {
        event.preventDefault();
        var a = $(this),
        b = new FormData;
        a.hide();
        b.append("user_id", $("#iaiduui").val());
        b.append("fuser_id", a.attr("data-follow"));
        b.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "follows",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: b
        }).done(function(data) {
            if (data.code == 200) {
            }
            // console.log(data.code);
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".share-fb", function() {
        var aww = $(this);
        var e = new FormData,
            title = aww.parents('.card').find(".dbooktitle").val();
            t = +$("#sharecount").text() + 1,
            desc = aww.parents('.card').find(".ptexts").text();
            coverimg = aww.parents('.card').find(".effect-img").attr("src"),
            authname = aww.parents('.card').find(".nametitle2").text(),
            links = aww.parents('.card').find(".segment").attr("href");
        FB.ui({
            method: "share_open_graph",
            action_type: "og.shares",
            action_properties: JSON.stringify({
                object: {
                    "og:url": links + "/preview",
                    "og:title": title + " ~ By : " + authname,
                    "og:description": desc,
                    "og:image": coverimg
                }
            })
        }, function(a) {
            a && !a.error_message && (e.append("csrf_test_name", csrf_value),e.append("user_id", $("#iaiduui").val()), e.append("book_id", $("#iaidubi").val()), $.ajax({
                url: base_url + "shares",
                type: "POST",
                dataType: "JSON",
                cache: !1,
                contentType: !1,
                processData: !1,
                data: e
            }).done(function(e) {
            }).fail(function() {
                console.log("Failure")
            }).always(function() {}))
        })
    });

    loaded = true;
    var page = 2;
    $(window).scroll(function() {
        if  ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && loaded){
          loadMoreData(page)
          page++;
      }
  });

    function loadMoreData(page) {
        loaded = false;
        var field = 'category';
        var url = window.location.href;
        if(url.indexOf('?' + field + '=') != -1) var sendUrl = url + '&page=' + page;
        else var sendUrl = '?page=' + page;
        $.ajax({
          url: sendUrl,
          type: "get",
          beforeSend: function() {
            $('.loader').show();
        }
    })
        .done(function(data) {
          if (!$.trim(data)) {
            $('.loader').hide();
            $('#post-data').append("<div class='mb-30 text-center'>Tidak ada data lagi..</div>");
            return;

        };
        $('.loader').hide();
        $("#post-data").append(data);
        loaded = true;
    })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
          console.log('server not responding...');
          loaded = true;
          location.reload();
      });
    }

    // ,
    //  $.ajax({
    //     url: base_url + "writters_afer_login",
    //     type: "GET",
    //     dataType: "json"
    // }).done(function(e) {
    //     $(".loader").hide();
    //     // var a = $.parseJSON(e),
    //        var t = "";
    //     $.each(e, function(e, a) {
    //         var o;
    //         var follow = '';
    //         if (a.isFollow == false) {
    //             follow += "<a href='#' data-follow='"+a.author_id+"' class='addbutton followprofile'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a>";
    //         }else{
    //             follow += "";
    //         }
    //         null != a.avatar && (o = a.avatar), "" == a.avatar ? o = "public/img/profile/blank-photo.jpg" : null == a.avatar && (o = "public/img/profile/blank-photo.jpg"), t += "<li class='media baboocontent'><img alt='" + a.author_name + "' class='d-flex mr-3 rounded-circle' src='" + o + "' width='50' height='50'><div class='media-body mt-7'><a class='profile' data-usr-prf='"+a.author_id+"' data-usr-name='"+convertToSlug(a.author_name)+"' href='profile/"+convertToSlug(a.author_name) + "'><h5 class='mt-0 mb-1 nametitle'>" + a.author_name + "</h5></a><div class='pull-right baboocolor'>"+follow+"</div></div></li>"
    //     }), $("#author_this_week").html(t)
    // }).fail(function() {
    //     console.log("error")
    // }).always(function() {})
    // ,
    //  $.ajax({
    //     url: base_url + "bestBooks",
    //     type: "GET",
    //     dataType: "json"
    // }).done(function(e) {
    //     var a = "";
    //     $.each(e, function(e, t) {
    //         var o;
    //         o = null == t.popular_cover_url || "" == t.popular_cover_url || "Kosong" == t.popular_cover_url ? base_url + "public/img/blank_cover.png" : t.popular_cover_url, a += '<a><li class="list-group-item"> <div class="media"> <div class="media-left mr-10"> <a href="#"><img class="media-object" src="' + o + '" width="60" height="80"></a> </div> <div class="media-body"> <div> <h4 class="media-heading bold mt-10"><a href="book/' + t.popular_book_id + "-" + convertToSlug(t.popular_book_title) + '">' + t.popular_book_title + '</a></h4> <p style="font-size: 10pt;">by <a class="profile" data-usr-prf="'+t.popular_author_id+'" data-usr-name="'+convertToSlug(t.popular_author_name)+'" id="' + t.popular_author_id + '" href="' + base_url + "profile/" + convertToSlug(t.popular_author_name) + '">' + t.popular_author_name + "</a></p> </div> </div> </div> </li>"
    //     }), $("#best_book").html(a)
    // }).fail(function() {
    //     console.log("error")
    // }).always(function() {});
    var a = $(window).width();

    function t() {
        $(".stickymenu").stick_in_parent()
    }
    a < 768 ? $(".stickymenu").trigger("sticky_kit:detach") : t(), $(window).resize(function() {
        (a = $(window).width()) < 768 ? $(".stickymenu").trigger("sticky_kit:detach") : t()
    }), $(document).on("click", ".like", function() {
        var e = $(this),
            a = new FormData,
            t = e.children(".txtlike");
            a.append("csrf_test_name", csrf_value);
        e.children(".loveicon").attr("src", "public/img/assets/love_active.svg"), a.append("user_id", $("#iaiduui").val()), a.append("book_id", e.attr("data-id")), $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(a) {
            null == a.code ? e.children(".loveicon").attr("src", "public/img/assets/icon_love.svg") : (e.removeClass("like"), e.addClass("unlike"), t.removeClass("txtlike"), t.addClass("txtunlike"), e.children(".txtunlike").text("Batal Suka"), e.children(".loveicon").attr("src", "public/img/assets/love_active.svg"))
        }).fail(function() {
            console.log("Failure")
        }).always(function() {})
    }), $(document).on("click", ".unlike", function() {
        var e = $(this),
            a = new FormData,
            t = e.children(".txtunlike");
            a.append("csrf_test_name", csrf_value);
        e.children(".loveicon").attr("src", "public/img/assets/icon_love.svg"), a.append("user_id", $("#iaiduui").val()), a.append("book_id", e.attr("data-id")), $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(a) {
            null == a.code ? e.children(".loveicon").attr("src", "public/img/assets/love_active.svg") : (e.removeClass("unlike"), e.addClass("like"), t.removeClass("txtunlike"), t.addClass("txtlike"), e.children(".txtlike").text("Suka"), e.children(".loveicon").attr("src", "public/img/assets/icon_love.svg"))
        }).fail(function() {
            console.log("Failure")
        }).always(function() {})
    })
}), window.onclick = function(e) {
    if (!e.target.matches(".dropbtn")) {
        var a, t = document.getElementsByClassName("dropdown-content");
        for (a = 0; a < t.length; a++) {
            var o = t[a];
            o.classList.contains("show") && o.classList.remove("show")
        }
    }
};

// function filterSelection(c) {
//     var x, i;
//     x = document.getElementsByClassName("card-content_container");
//     if (c == "all") c = "";
//     for (i = 0; i < x.length; i++) {
//         w3RemoveClass(x[i], "showss");
//         if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "showss");
//     }
// }
//
// function w3AddClass(element, name) {
//     var i, arr1, arr2;
//     arr1 = element.className.split(" ");
//     arr2 = name.split(" ");
//     for (i = 0; i < arr2.length; i++) {
//         if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
//     }
// }
//
// function w3RemoveClass(element, name) {
//     var i, arr1, arr2;
//     arr1 = element.className.split(" ");
//     arr2 = name.split(" ");
//     for (i = 0; i < arr2.length; i++) {
//         while (arr1.indexOf(arr2[i]) > -1) {
//             arr1.splice(arr1.indexOf(arr2[i]), 1);
//         }
//     }
//     element.className = arr1.join(" ");
// }
//
//
// // Add active class to the current button (highlight it)
// var btnContainer = document.getElementById("myBtnContainer");
// var btns = btnContainer.getElementsByClassName("nav-btn_link");
// for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function(){
//         var current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//     });
// }
