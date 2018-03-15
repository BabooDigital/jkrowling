$(document).ready(function() {
    $(document).on("click", ".btncompar", function() {
        var b = $(this).parents(".textp").attr("data-text");
        $(".append_txt").text(b)
    });
    $(document).on("click", ".Rpost-comment", function() {
        $(this);
        var b = new FormData,
            a = $("#comments").val(),
            c = $("#profpict").attr("src"),
            e = $("#profpict").attr("alt");
        a = "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + c + "' width='48' height='48' alt='" + e + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" +
            e + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + a + "</p> </div> </div><hr></div>";
        $("#Rbookcomment_list").append(a);
        b.append("user_id", $("#iaiduui").val());
        b.append("book_id", $("#iaidubi").val());
        b.append("comments",
            $("#comments").val());
        $.ajax({
            url: base_url + "commentbook",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: b
        }).done(function(a) {
            null == a && ($(".rcommentviewnull").hide(), console.log("Koneksi Bermasalah"));
            $("#comments").val("")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".Rpost-comment-parap", function() {
        var b = $(this),
            a = new FormData,
            c = $("#pcomments").val(),
            e = $("#profpict").attr("src"),
            d = $("#profpict").attr("alt");
        c = "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" +
            e + "' width='48' height='48' alt='" + d + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + d + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + c + "</p> </div> </div><hr></div>";
        $("#Rparagraphcomment_list").append(c);
        a.append("user_id", $("#iaiduui").val());
        a.append("paragraph_id", b.attr("data-p-id"));
        a.append("comments", $("#pcomments").val());
        $.ajax({
            url: base_url + "commentbook",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function(a) {
            null == a && ($(".rcommentviewnull").hide(), console.log("Koneksi Bermasalah"));
            $("#pcomments").val("")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".bookmark", function() {
        var b = $(this),
            a = new FormData;
        $(".bookmarkicon").attr("src",
            base_url + "public/img/assets/icon_bookmark_active.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        $.ajax({
            url: base_url + "sendbookmark",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function(data) {
        	console.log(data);
            b.removeClass("bookmark");
            b.addClass("unbookmark")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".unbookmark", function() {
        var b = $(this),
            a = new FormData;
        $(".bookmarkicon").attr("src", base_url + "public/img/assets/icon_bookmark.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        $.ajax({
            url: base_url + "sendbookmark",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
            b.removeClass("unbookmark");
            b.addClass("bookmark")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".like", function() {
        var b = $(this),
            a = new FormData,
            c = +$("#likecount").text() + 1;
        $(".loveicon").attr("src", base_url + "public/img/assets/love_active.svg");
        a.append("user_id",
            $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
            b.removeClass("like");
            b.addClass("unlike");
            $("#likecount").text(c)
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".unlike", function() {
        var b = $(this),
            a = new FormData,
            c = +$("#likecount").text() - 1;
        $(".loveicon").attr("src", base_url + "public/img/assets/icon_love.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
            b.removeClass("unlike");
            b.addClass("like");
            $("#likecount").text(c)
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".follow-u", function() {
        var b = $(this),
            a = new FormData;
        a.append("user_id", $("#iaiduui").val());
        a.append("fuser_id", b.attr("data-follow"));
        $.ajax({
            url: base_url + "follows",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
            b.removeClass("follow-u");
            b.addClass("unfollow-u");
            $(".txtfollow").text("Unfollow")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".unfollow-u", function() {
        var b = $(this),
            a = new FormData;
        a.append("user_id", $("#iaiduui").val());
        a.append("fuser_id", b.attr("data-follow"));
        $.ajax({
            url: base_url + "follows",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
            b.removeClass("unfollow-u");
            b.addClass("follow-u");
            $(".txtfollow").text("Follow")
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".btncompar", function() {
        var b = $(this),
            a = new FormData;
        a.append("paragraph_id", b.attr("data-p-id"));
        $.ajax({
            url: base_url + "getcommentbook",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function(a) {
            var c = "";
            $.each(a, function(a, b) {
                var d;
                "" != b.comment_user_avatar ? d = b.comment_user_avatar : "" == b.comment_user_avatar && (d = "../public/img/profile/blank-photo.jpg");
                c += "<div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + d + "' width='48' height='48' alt='" + b.comment_user_name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + b.comment_user_name + "</a><small><span class='text-muted ml-10'>" + b.comment_date + "</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + b.comment_id + "'>" + b.comment_text + "</p>  </div> </div><hr>"
            });
            $("#Rparagraphcomment_list").html(c);
            $(".Rpost-comment-parap").attr("data-p-id", b.attr("data-p-id"))
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".share-fb", function() {
        $(this);
        var b = new FormData;
        $("#iaidubi").val();
        var a = $(".title_book").text(),
            c = +$("#sharecount").text() + 1,
            e = $(".textp").attr("data-text") + ".. - Baca buku lebih lengkap disini.. | Baboo - Beyond Book & Creativity",
            d = $(".cover_image").attr("src"),
            f = $(".author_name").text();
        FB.ui({
            method: "share_open_graph",
            action_type: "og.shares",
            action_properties: JSON.stringify({
                object: {
                    "og:url": base_url + "book/" + segment + "/preview",
                    "og:title": a + " ~ By : " + f + " | Baboo - Beyond Book & Creativity",
                    "og:description": e,
                    "og:image": d
                }
            })
        }, function(a) {
            a && !a.error_message && (b.append("user_id", $("#iaiduui").val()), b.append("book_id", $("#iaidubi").val()), $.ajax({
                url: base_url + "shares",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                data: b
            }).done(function(a) {
                $("#sharecount").text(c)
            }).fail(function() {
                console.log("Failure")
            }).always(function() {}))
        })
    });
    getRCommentBook();
    getRMenuChapter()
});

function getRMenuChapter() {
    $.ajax({
        url: base_url + "getmenuchapter",
        type: "POST",
        dataType: "json",
        data: {
            id_book: segment
        }
    }).done(function(b) {
        var a = "";
        $.each(b, function(b, e) {
            id = e.chapter_id;
            "false" != e.chapter_free ? (a += '<a href="' + base_url + "book/" + segment + "/" + e.chapter_id + '" class="borbot bornone list-group-item list-group-item-action ', active == id && (a += "active")) : (a += '<a class="borbot bornone list-group-item list-group-item-action', a += "disabled ", a += ">");
            a += '" >' + e.chapter_title + "</a>";
            $(".detailbook").children().attr("data-id")
        });
        $("#list_Rchapter").html(a)
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}

function getRCommentBook() {
    var b = $("#iaidubi").val();
    $.ajax({
        url: base_url + "getcommentbook",
        type: "POST",
        dataType: "json",
        data: {
            book_id: b
        },
        beforeSend: function() {
            $(".loader").show()
        }
    }).done(function(a) {
        var b = "";
        $.each(a, function(a, d) {
            var c;
            "" != d.comment_user_avatar ? c = d.comment_user_avatar : "" == d.comment_user_avatar && (c = "../public/img/profile/blank-photo.jpg");
            b += "<div class='media' id='" + d.comment_id + "'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + c + "' width='48' height='48' alt='" + d.comment_user_name +
                "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + d.comment_user_name + "</a><small><span class='text-muted ml-10'>" + d.comment_date + "</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + d.comment_id + "'>" + d.comment_text + "</p> </div> </div><hr>"
        });
        $(".loader").hide();
        $("#Rbookcomment_list").html(b)
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}

function convertToSlug(b) {
    return b.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};