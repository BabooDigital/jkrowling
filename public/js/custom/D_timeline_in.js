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

function loadMoreData(e) {
    $.ajax({
        url: "?page=" + e,
        type: "get",
        beforeSend: function() {
            $(".loader").show()
        }
    }).done(function(e) {
        " " != e ? ($(".loader").hide(), $("#post-data").append(e)) : $(".loader").html("No more records found")
    }).fail(function(e, a, t) {
        console.log("server not responding...")
    })
}

function convertToSlug(e) {
    return e.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
}

function shareBtn() {
    document.getElementById("dropdownShare").classList.toggle("show")
}
$(document).ready(function() {
    $(document).on('click', '.profile', function() {
        event.preventDefault();
        var boo = $(this);
        var usr_prf = boo.attr("data-usr-prf");
        var usr_name = boo.attr("data-usr-name");
        var formdata = new FormData();

        formdata.append("user_prf", usr_prf);
        var url = base_url+'profile/'+usr_name;
        var form = $('<form action="' + url + '" method="post">' +
          '<input type="hidden" name="usr_prf" value="' + usr_prf + '" />' +
          '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
          '</form>');
        $(boo).append(form);
        form.submit();
    });
    $(document).on("click", ".share-fb", function() {
        $(this);
        var e = new FormData,
            a = ($("#iaidubi").val(), $(".dbooktitle").text()),
            t = +$("#sharecount").text() + 1,
            o = $(".textp").attr("data-text") + ".. - Baca buku lebih lengkap disini.. | Baboo - Beyond Book & Creativity",
            i = $(".cover_image").attr("src"),
            l = $(".author_name").text(),
            n = $(".segment").attr("href");
        FB.ui({
            method: "share_open_graph",
            action_type: "og.shares",
            action_properties: JSON.stringify({
                object: {
                    "og:url": base_url + "book/" + n + "/preview",
                    "og:title": a + " ~ By : " + l + " | Baboo - Beyond Book & Creativity",
                    "og:description": o,
                    "og:image": i
                }
            })
        }, function(a) {
            a && !a.error_message && (e.append("user_id", $("#iaiduui").val()), e.append("book_id", $("#iaidubi").val()), $.ajax({
                url: base_url + "shares",
                type: "POST",
                dataType: "JSON",
                cache: !1,
                contentType: !1,
                processData: !1,
                data: e
            }).done(function(e) {
                $("#sharecount").text(t)
            }).fail(function() {
                console.log("Failure")
            }).always(function() {}))
        })
    });
    var e = 2;
    $(window).scroll(function() {
        $(window).scrollTop() == $(document).height() - $(window).height() && (loadMoreData(e), e++)
    }), $.ajax({
        url: "?page=" + e,
        type: "get",
        beforeSend: function() {
            $(".loader").show()
        }
    }).done(function(e) {
        "" != e && null != e ? ($(".loader").hide(), $("#post-data").append(e)) : $(".loader").html("No more records found")
    }).fail(function(e, a, t) {
        console.log("server not responding...")
    }), $.ajax({
        url: base_url + "writter",
        type: "GET",
        dataType: "json"
    }).done(function(e) {
        $(".loader").hide();
        var a = $.parseJSON(e),
            t = "";
        $.each(a.data, function(e, a) {
            var o;
            null != a.avatar && (o = a.avatar), "" == a.avatar ? o = "public/img/profile/blank-photo.jpg" : null == a.avatar && (o = "public/img/profile/blank-photo.jpg"), t += "<li class='media baboocontent'><img alt='" + a.author_name + "' class='d-flex mr-3 rounded-circle' src='" + o + "' width='50' height='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>" + a.author_name + "</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li>"
        }), $("#author_this_week").html(t)
    }).fail(function() {
        console.log("error")
    }).always(function() {}), $.ajax({
        url: base_url + "bestBook",
        type: "GET",
        dataType: "json"
    }).done(function(e) {
        var a = "";
        $.each(e, function(e, t) {
            var o;
            o = null == t.popular_cover_url || "" == t.popular_cover_url || "Kosong" == t.popular_cover_url ? base_url + "public/img/blank_cover.png" : t.popular_cover_url, a += '<a><li class="list-group-item"> <div class="media"> <div class="media-left mr-10"> <a href="#"><img class="media-object" src="' + o + '" width="60" height="80"></a> </div> <div class="media-body"> <div> <h4 class="media-heading bold mt-10"><a href="book/' + t.popular_book_id + "-" + convertToSlug(t.popular_book_title) + '">' + t.popular_book_title + '</a></h4> <p style="font-size: 10pt;">by <a class="profile" data-usr-prf="'+t.popular_author_id+'" data-usr-name="'+convertToSlug(t.popular_author_name)+'" id="' + t.popular_author_id + '" href="' + base_url + "profile/" + convertToSlug(t.popular_author_name) + '">' + t.popular_author_name + "</a></p> </div> </div> </div> </li>"
        }), $("#best_book").html(a)
    }).fail(function() {
        console.log("error")
    }).always(function() {});
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
    }), $(document).on("click", ".like", function() {
        var e = $(this),
            a = new FormData,
            t = e.children(".txtlike");
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