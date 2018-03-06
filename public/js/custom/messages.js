function processAjaxData(responses, urlPath){
    document.getElementById("content").innerHTML = responses.html;
    document.title = responses.pageTitle;
    window.history.pushState({"html":responses.html,"pageTitle":responses.pageTitle},"", urlPath);
}

$(document).ready(function() {
    $(document).on("click","#postMessage", function() {
        var ab = $(this),
            b = new FormData,
            message = ab.siblings("#pmessageas").val(),
            fullname = $("#paltui").attr("data-pname"),
            prof_pict = $("#paltui").attr("data-pimage");
        c = "<div class='card-library mb-15' style='height: auto;'> <div class='list-group'> <div class='row mb-10' style='padding: 0px 10px 0px 10px;'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src="+prof_pict+" width='48' alt='Generic placeholder image'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'>"+fullname+"</h5> <p class='text-muted' style='margin-top:-10px;'> <small> <span>"+message+"</span> <span class='ml-10'>Just Now</span></small> </p></div></div></div></div></div>";
        $("#message_container").append(c);
        b.append("user_to", $("#iuswithid").val());
        b.append("message", ab.siblings("#pmessageas").val());
        $.ajax({
            url: base_url + "send_message",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: b
        }).done(function(a) {
            ab.siblings("#pmessageas").val("");
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });

    var c = $(window).width();
    768 > c ? $(".stickymenu").trigger("sticky_kit:detach") : $(".stickymenu").stick_in_parent();
    $(window).resize(function() {
        c = $(window).width();
        768 > c ? $(".stickymenu").trigger("sticky_kit:detach") : $(".stickymenu").stick_in_parent()
    });
    $(document).on("click", ".btncompar", function() {
        var a = $(this).parents(".textp").attr("data-text");
        $(".append_txt").text(a)
    });
    $(document).on("click",
        ".message-user",
        function(e) {
            e.preventDefault();
            var boo = $(this);
            var usr_with = boo.attr("data-usr-msg");
            var b = base_url+"detail_message/"+usr_with;
            if (null == usr_with || "" == usr_with) alert("user not found");
            else {
                $('#myModal2').modal('show').find('.modal-body').load(b);
                var bahtml = "<button type='button' class='closes' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'><i class='fa fa-arrow-left'></i></span></button><h4><b>"+boo.attr("data-usr-name")+"</b></h4>";
                $('#myModal2').find('.modal-header').html(bahtml);
                var refreshId = setInterval(function() {
                    $("#myModal2").find('.modal-body').load(b);
                }, 9000);
                $.ajaxSetup({ cache: false });
            }
        });

});
function loadMessage(){
    $.ajax({
        url: base_url + "detailMessage",
        type: "POST",
        dataType: "json"
    }).done(function(b) {
        var d = 0;
        $.each(b, function(f, g) {
            "unread" == g.notif_status && d++
        });
        $("#noti_Counter").css({
            opacity: 0
        }).text(d).css({
            top: "-10px",
            opacity: 1
        })
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}
function progressScroll() {
    var d = function() {
        return $(document).height() - $(window).height()
    };
    if ("max" in document.getElementById("progress")) {
        var c = $("progress");
        c.attr({
            max: d()
        });
        $(document).on("scroll", function() {
            c.attr({
                value: $(window).scrollTop()
            })
        });
        $(window).resize(function() {
            c.attr({
                max: d(),
                value: $(window).scrollTop()
            })
        })
    } else {
        c = $(".progress-bar");
        var e = d(),
            a, b, g = function() {
                a = $(window).scrollTop();
                b = a / e * 100;
                return b += "%"
            },
            f = function() {
                c.css({
                    width: g()
                })
            };
        $(document).on("scroll", f);
        $(window).on("resize",
            function() {
                e = d();
                f()
            })
    }
}

function showLoading() {
    HoldOn.open({
        theme: "sk-cube-grid",
        message: "Tunggu Sebentar ",
        backgroundColor: "white",
        textColor: "#7554bd"
    })
}

function strip_tags(d) {
    d = d.toString();
    return d.replace(/<\/?[^>]+>/gi, "")
}

function getContent(d, c) {
    $.ajax({
        url: d,
        type: "GET",
        cache: !1,
        dataType: "json",
        success: function(d) {
            HoldOn.close();
            var a = "";
            a = 0 == c ? a + "<small>Page</small> <strong>Description</strong>" : a + ("<small>Page</small> <strong>" + c + "</strong>");
            $("#id_page").html(a);
            var b = "";
            $(".loader").hide();
            $(".chapter").html(d.chapter.chapter_title);
            $.each(d.chapter.paragraphs, function(a, c) {
                var d = strip_tags(c.paragraph_text),
                    e = c.comment_count;
                b += "<div class='mb-20 textp' data-id-p='" + c.paragraph_id + "' data-text='" + d + "'>" + c.paragraph_text +
                    "<button type='button' data-p-id='" + c.paragraph_id + "' data-toggle='modal' id='comm_p' data-target='#myModal2' class='btncompar comment-marker on-inline-comments-modal' for='toggle-right'><span class='num-comment'>" + (0 == e ? "+" : e) + "</span><span  aria-hidden='true' style='font-size:28px;'><img src='" + base_url + "public/img/assets/icon_comment.svg'></span></button></div>"
            });
            $("#parentparaph").html(b)
        }
    })
}

function getCommentBook() {
    $.ajax({
        url: base_url + "getcommentbook",
        type: "POST",
        dataType: "json",
        data: {
            book_id: segment
        },
        beforeSend: function() {
            $(".loader").show()
        }
    }).done(function(d) {
        var c = "";
        $.each(d, function(d, a) {
            var b;
            console.log(a.comment_user_avatar);
            "" != a.comment_user_avatar ? b = a.comment_user_avatar : "" == a.comment_user_avatar && (b = base_url + "public/img/profile/blank-photo.jpg");
            c += "<div class='commentview'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='" +
                b + "'> <div class='media-body'> <h5 class='nametitle2 mb-5'>" + a.comment_user_name + "</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='" + a.comment_id + "'>" + a.comment_text + "</p> </div> <a href='#'><b>Balas</b></a> <hr></div>"
        });
        $(".loader").hide();
        $("#bookcomment_list").html(c)
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}

function ScrollToBottom(d) {
    var c;
    for (c = 0; c <= d; c++) window.scrollTo(0, document.querySelector("#post-data").scrollHeight)
}

function convertToSlug(d) {
    return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};