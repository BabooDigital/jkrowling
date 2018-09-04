$(document).ready(function() {

    $(document).on('click', '.comment_', function() {
        $('#modComment').modal('show');
        $('.fix-comm').show();
    });
    $('#modComment').on('hide.bs.modal', function (e) {
        $('.fix-comm').hide();
    });
    $('#modComment').on('show.bs.modal', function (e) {
        // $('#comments').on('focus', function() {
        //     $(".modal").animate({ scrollTop: $(document).height() }, 1000);
            $('#comments').focus();
        // });
    });

    $(document).on("click", ".backfrmbook", function() {
        // history.go(-1);
        window.location = base_url+'timeline';
    });
    $(document).on("click", ".btncompar", function() {
        var b = $(this).parents(".textp").attr("data-text");
        $(".append_txt").text(b)
    });

    // MENTION AND COMMENT
    $('textarea.mention').mentionsInput({
        onDataRequest:function (mode, query, callback) {
            // Search User with API Search..
            var valnya = $(this).val();
            var cut    = valnya.substr(1);
            var post_data = "search="+cut+"&csrf_test_name="+csrf_value;
            $.ajax({
                url: base_url+"users",
                type: 'POST',
                dataType: 'JSON',
                data: post_data,
            })
            .done(function(responseData) {
                responseData = _.filter(responseData, function(item) { return item.fullname.toLowerCase().indexOf(query.toLowerCase()) > -1 });
             callback.call(this, responseData);
            })
            .fail(function() {
                console.log("Something wrong..");
            })
            .always(function() {
            });

            // $.getJSON(base_url+"user_all",{search: cut}, function(responseData) {
            //    responseData = _.filter(responseData, function(item) { return item.fullname.toLowerCase().indexOf(query.toLowerCase()) > -1 });
            //    callback.call(this, responseData);
            // });
       }
   });
    $(document).on("click", ".Rpost-comment", function() {
        var boo = $(this);

        if ($('#comments').val() !== ""){
            $('textarea.mention').mentionsInput('val', function(text) {
                if(post_text != '')
                {
                    var post_text = text;
                    var post_data = "book_id="+$("#iaidubi").val()+"&comments="+post_text+"&csrf_test_name="+csrf_value;
                    $.ajax({
                        url: base_url + "commentbook",
                        type: "POST",
                        dataType: "JSON",
                        data: post_data,
                        beforeSend: function() {
                            $(".loader").show()
                        }
                    }).done(function(a) {
                        null == a && ($(".coment_").hide(), console.log("Koneksi Bermasalah"));
                        $("textarea.mention").mentionsInput('reset');
                        $(".loader").hide();
                        var ava;
                        if (a.comment_user_avatar == null || a.comment_user_avatar == "") {
                            var ava = base_url+"public/img/profile/blank-photo.jpg";
                        }else{
                            var ava = a.comment_user_avatar;
                        }
                        dats = "<div class='media pb-15 mb-15 coment_'> <img class='d-flex align-self-start mr-15 rounded-circle' src='"+ava+"' width='40' height='40' alt='"+a.comment_user_name+"' style='object-fit:cover;'> <div class='media-body'> <a href='#'><span class='card-title' style='font-size: 12pt;font-weight: 800;'>"+a.comment_user_name+"</span></a><div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+a.comment_id+"' datacom='"+a.comment_text+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+a.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> <p class='commenttxt' com-id='"+a.comment_id+"'>"+a.comment_text+"</p><div><small><span class='text-muted'>"+a.comment_time+"</span> <a href='javascript:void(0);' class='ml-20 replcom' com-id='"+a.comment_id+"' com-name='" + a.comment_user_name + "'>Balas</a></small></div></div></div>";
                        $("#Rbookcomment_list").append(dats);
                    }).fail(function() {
                        console.log("error")
                    }).always(function() {})
                } else {

                }
            });
        }else{
        }

        // function getMentions($content) {
        //     $('textarea.mention').mentionsInput('getMentions', function(data) {
        //       alert(JSON.stringify(data));
        //   });
        // }
    });


    // $(document).on("click", ".Rpost-comment-parap", function() {
    //     var b = $(this),
    //     a = new FormData;
        // c = $("#pcomments").val(),
        // e = $("#profpict").attr("src"),
        // d = $("#profpict").attr("alt");
        // c = "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" +
        // e + "' width='48' height='48' alt='" + d + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + d + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + c + "</p> </div> </div><hr></div>";
        // $("#Rparagraphcomment_list").append(c);
    //     a.append("user_id", $("#iaiduui").val());
    //     a.append("paragraph_id", b.attr("data-p-id"));
    //     a.append("comments", $("#pcomments").val());
    //     a.append("csrf_test_name", csrf_value);
    //     $.ajax({
    //         url: base_url + "commentbook",
    //         type: "POST",
    //         dataType: "JSON",
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         data: a
    //     }).done(function(a) {
    //         // null == a && ($(".rcommentviewnull").hide(), console.log("Koneksi Bermasalah"));
    //         // $("#pcomments").val("")
    //         location.reload();
    //     }).fail(function() {
    //         console.log("error")
    //     }).always(function() {})
    // });
    $(document).on("click", ".bookmark", function() {
        var b = $(this),
        a = new FormData;
        $(".bookmarkicon").attr("src",
            base_url + "public/img/assets/icon_bookmark_active.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        a.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "sendbookmark",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function(data) {
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
        a.append("csrf_test_name", csrf_value);
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
        a.append("csrf_test_name", csrf_value);
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
        a.append("csrf_test_name", csrf_value);
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
        a.append("csrf_test_name", csrf_value);
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
        a.append("csrf_test_name", csrf_value);
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
        a.append("csrf_test_name", csrf_value);
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
                "" != b.comment_user_avatar ? d = b.comment_user_avatar : "" == b.comment_user_avatar && (d = base_url+"public/img/profile/blank-photo.jpg");
                c += "<div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + d + "' width='40' height='40' alt='" + b.comment_user_name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + b.comment_user_name + "</a><small><span class='text-muted ml-10'>" + b.comment_date + "</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + b.comment_id + "'>" + b.comment_text + "</p>  </div> </div><hr>"
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
        d = $(".cover_image").attr("src");
        FB.ui({
            method: "share_open_graph",
            action_type: "og.shares",
            action_properties: JSON.stringify({
                object: {
                    "og:url": base_url + "book/" + segment,
                    "og:title": a + " ~ By : " + author,
                    "og:description": desc,
                    "og:image": d
                }
            })
        }, function(a) {
            a && !a.error_message && (b.append("csrf_test_name", csrf_value),b.append("user_id", $("#iaiduui").val()), b.append("book_id", $("#iaidubi").val()), $.ajax({
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
    $(document).on("click", ".share-fb-ch", function() {
        $(this);
        var b = new FormData;
        $("#iaidubi").val();
        var a = $(".title_book").text(),
        c = +$("#sharecount").text() + 1,
        d = $(".cover_image").attr("src");
        FB.ui({
            method: "share_open_graph",
            action_type: "og.shares",
            action_properties: JSON.stringify({
                object: {
                    "og:url": link_url,
                    "og:title": a + " - " + chapter_title + " ~ By : " + author,
                    "og:description": desc,
                    "og:image": d
                }
            })
        }, function(a) {
            a && !a.error_message && (b.append("csrf_test_name", csrf_value),b.append("user_id", $("#iaiduui").val()), b.append("book_id", $("#iaidubi").val()), $.ajax({
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
    $(document).on("click", ".buyfullbook", function() {
        stat = $(this).attr('stats-book') ;
        var j = $('#iaidubi').val();
        if (stat == 'done') {
            $('#modal-checkout').modal('show');
            $('#nextcheck').attr('b-id', j);
        }else{
            swal({
              text: "Mohon selesaikan transaksi sebelumnya terlebih dahulu, sebelum melakukan transaksi baru.",
              showCancelButton: true,
              confirmButtonColor: '#7661ca',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.value) {
                window.location = base_url+'library#list_trans'
            }
        })
        }
    });
    getRCommentBook();
});

function getRCommentBook() {
    var b = $("#iaidubi").val();
    $.ajax({
        url: base_url + "getcommentbook",
        type: "POST",
        dataType: "json",
        data: {
            book_id: b,
            csrf_test_name: csrf_value
        },
        beforeSend: function() {
            $(".loader").show()
        }
    }).done(function(a) {
        var b = "";
        $.each(a, function(a, d) {
            var c;
            "" != d.comment_user_avatar ? c = d.comment_user_avatar : "" == d.comment_user_avatar && (c = base_url+"public/img/profile/blank-photo.jpg");
            b += "<div class='media pb-15 mb-15 coment_' id='" + d.comment_id + "'> <img class='d-flex align-self-start mr-15 rounded-circle' src='" + c + "' width='40' height='40' alt='" + d.comment_user_name +
            "' style='object-fit:cover;'> <div class='media-body'> <a href='#'><span class='card-title' style='font-size: 12pt;font-weight: 800;'>" + d.comment_user_name + "</span></a>";
            if (d.comment_user_id == userdata) {
                b += "<div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+d.comment_id+"' datacom='"+d.comment_text+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+d.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> ";
            }else{
                b += "<div></div>";
            }
            b += "<p class='commenttxt' com-id='" + d.comment_id + "'>" + d.comment_text + "</p><div><small><span class='text-muted'>" + d.comment_date + "</span> <a href='javascript:void(0);' class='ml-20 replcom' com-id='" + d.comment_id + "' com-name='" + d.comment_user_name + "'>Balas</a></small></div><div class='data-reply' data-reply='" + d.comment_id + "'>";
            $.each(d.comment_reply_data, function(d, repl) {
                var names = repl.comment_user_name.substr(0,repl.comment_user_name.indexOf(' '));
                // if (repl.comment_text.length > 20) {
                //     var txtcomm = repl.comment_text.substr(0, 20)+'...';
                // }else {
                //     var txtcomm = repl.comment_text;
                // }
                b += "<div class='mt-5'> <img src='"+repl.comment_user_avatar+"' width='20' height='20' class='rounded-circle fitcover'><a src='#' class='ml-10' style='font-weight: 600;'>"+names+"</a><span class='ml-10 commenttxt'>"+repl.comment_text+"</span></div>";
                // if (repl.comment_user_id == userdata) {
                //     b += "<div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+repl.comment_id+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+repl.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div>";
                // }else{
                //     b += "<div></div>";
                // }
            });
            b += "</div></div></div>";
            // <a href='#' class='float-right'>Like</a>
        });
        $(".loader").hide();

        $("#Rbookcomment_list").html(b);
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}

function buyBook() {
    $(document).on("click", "#buy-btn", function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");
        // console.log("clicked");

        $.ajax({
            url: base_url+'pay_book/token',
            type: "POST",
            data:{id_book:$("#iaidubi").val(), url_redirect:window.location.href, csrf_test_name: csrf_value},
            cache: false,
            beforeSend: function() {
                $(".lds-css").show();
            },
            success: function(data) {
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');
                function changeResult(type,data){
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                }
                snap.pay(data, {

                    onSuccess: function(result){
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result){
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
                $(".lds-css").hide();
            }
        });
    });
}
function getBooks() {var id = $('#iaidubi').val(); var di = $('.spadding').attr('dat-cpss'); $.ajax({url: base_url+'detailBooks', type: 'POST', dataType: 'json', data: {book_id: id, csrf_test_name: csrf_value} }) .done(function(data) {if (data.c == 200) {showPDF(atob(data.dat.u), di.slice(0, -5)); } }) .fail(function() {}) .always(function() {});
var __PDF_DOC,
__CURRENT_PAGE,
__TOTAL_PAGES,
pdfFile,
__PAGE_RENDERING_IN_PROGRESS = 0,
__CANVAS = $('#pdf-canvas').get(0),
__CANVAS_CTX = __CANVAS.getContext('2d'),
pageElement = document.getElementById('pdf-contents');

var reachedEdge = false;
var touchStart = null;
var touchDown = false;

var lastTouchTime = 0;
pageElement.addEventListener('touchstart', function(e) {
  touchDown = true;

    //   if (e.timeStamp - lastTouchTime < 500) {
    //     lastTouchTime = 0;
    //     toggleZoom();
    // } else {
    //     lastTouchTime = e.timeStamp;
    // }
});

pageElement.addEventListener('touchmove', function(e) {
  if (pageElement.scrollLeft === 0 ||
    pageElement.scrollLeft === pageElement.scrollWidth - page.clientWidth) {
    reachedEdge = true;
} else {
    reachedEdge = false;
    touchStart = null;
}

if (reachedEdge && touchDown) {
    if (touchStart === null) {
      touchStart = e.changedTouches[0].clientX;
  } else {
      var distance = e.changedTouches[0].clientX - touchStart;
      if (distance < -100) {
        touchStart = null;
        reachedEdge = false;
        touchDown = false;
        openNextPage();
    } else if (distance > 100) {
        touchStart = null;
        reachedEdge = false;
        touchDown = false;
        openPrevPage();
    }
}
}
});

pageElement.addEventListener('touchend', function(e) {
  touchStart = null;
  touchDown = false;
});


function showPDF(pdf_url, password) {
    $("#pdf-loader").show();
    $("#password-container").hide();
    PDFJS.disableStream = true;
    PDFJS.getDocument({ url: pdf_url, password: password }).then(function(pdf_doc) {
        __PDF_DOC = pdf_doc;
        __TOTAL_PAGES = __PDF_DOC.numPages;

        $("#pdf-loader").hide();
        $("#password-container").hide();
        $("#pdf-contents").show();
        $("#pdf-total-pages").text(__TOTAL_PAGES);

        showPage(1);
    }).catch(function(error) { console.log(error)
        $("#pdf-loader").hide();

        if(error.name == 'PasswordException') {
            $("#password-container").show();
            $("#pdf-password").val('');
            $("#password-message").text(error.code == 2 ? error.message : '');
        }
        else {
            $("#upload-button").show();
            console.log(error.message);
        }
    });
}

function showPage(page_no) {
    __PAGE_RENDERING_IN_PROGRESS = 1;
    __CURRENT_PAGE = page_no;

    $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

    $("#pdf-canvas").hide();
    $("#page-loader").show();

    $("#pdf-current-page").text(page_no);

    __PDF_DOC.getPage(page_no).then(function(page) {
        var scale_required = 2;

        var viewport = page.getViewport(scale_required);

        __CANVAS.height = viewport.height;
        __CANVAS.width = viewport.width;

        var renderContext = {
            canvasContext: __CANVAS_CTX,
            viewport: viewport
        };

        page.render(renderContext).then(function() {
            __PAGE_RENDERING_IN_PROGRESS = 0;

            $("#pdf-next, #pdf-prev").removeAttr('disabled');

            $("#pdf-canvas").show();
            $("#page-loader").hide();
        });
    });
}

var openNextPage = function() {
  var page_no = Math.min(__TOTAL_PAGES, __CURRENT_PAGE + 1);
  if (page_no !== __CURRENT_PAGE) {
    __CURRENT_PAGE = page_no;
    showPage(__CURRENT_PAGE);
}
if (page_no == __TOTAL_PAGES) {
    $('#modal-checkout').modal('toggle');
}else{
}
};
var openPrevPage = function() {
  var page_no = Math.max(1, __CURRENT_PAGE - 1);
  if (page_no !== __CURRENT_PAGE) {
    __CURRENT_PAGE = page_no;
    showPage(__CURRENT_PAGE);
}
};
}

function convertToSlug(b) {
    return b.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};

var modal_lv = 0 ;
$('body').on('show.bs.modal', function(e) {
    if ( modal_lv > 0 )
        $(e.target).css('zIndex',1051+modal_lv) ;
    modal_lv++ ;
}).on('hidden.bs.modal', function() {
    if ( modal_lv > 0 )
        modal_lv-- ;
});

$(document).on('click', '.replcom', function() {
    event.preventDefault();
    /* Act on the event */
    var boo = $(this);
    var name = '@'+boo.attr('com-name').replace(/\s/g, '')+' ';
    var comid = boo.attr("com-id");
    $('#comments').val(name).focus();

    $('.Rpost-comment').hide();
    var btn = "<button class='Rpost-comment-repl' type='button' style='background: none;border: none;' com_id='"+comid+"'><img src='"+base_url+"public/img/assets/icon_sendcomm.png' width='43' height='43'></button>";
    $('#btn-com').html(btn);
});
$(document).on('click', '.Rpost-comment-repl', function(event) {
    event.preventDefault();
    /* Act on the event */
    var boo = $(this);
    var comid_ = boo.attr('com_id')
    var formData = new FormData();
    formData.append('comment_id', comid_);
    formData.append('comments', $('#comments').val());
    formData.append('csrf_test_name', csrf_value);

    if ($('#comments').val() !== ""){
        $.ajax({
            url: base_url+'replycom',
            type: 'POST',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $(".loader").show()
            }
        })
            .done(function(a) {
                // null == a && ($(".rcommentviewnull").hide(), console.log("Koneksi Bermasalah"));
                $("#comments").val("");$("textarea.mention").mentionsInput('reset');
                $(".loader").hide();
                var names = a.comment_user_name.substr(0,a.comment_user_name.indexOf(' '));
                dats = "<div class='mt-5'> <img src='"+a.comment_user_avatar+"' width='20' height='20' class='rounded-circle fitcover'><a src='#' class='ml-10' style='font-weight: 600;'>"+names+"</a><span class='ml-10 commenttxt'>"+a.comment_text+"</span> ";
                if (a.comment_user_id == userdata) {
                    dats += "<div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+a.comment_id+"' datacom='"+a.comment_text+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+a.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> ";
                }else{
                    dats += "</div>";
                }
                $("#"+comid_).find(".data-reply").attr('data-reply', comid_).append(dats);
                var btn = "<button class='Rpost-comment' type='button' style='background: none;border: none;'><img src='"+base_url+"public/img/assets/icon_sendcomm.png' width='43' height='43'></button>";
                $('#btn-com').html(btn);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
            });
    }else{
    }
});
$(document).on('click', '.delcomm', function(event) {
    event.preventDefault();
    /* Act on the event */
    var boo = $(this);
    var formData = new FormData();
    formData.append('comment_id', boo.attr('datadel'));
    formData.append("csrf_test_name", csrf_value);
    $.ajax({
        url: base_url+'delcom',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: function() {
            $(".loader").show()
        }
    })
    .done(function(data) {
        if (data == 200) {
            var idc = boo.attr('datadel');
            boo.parents('.coment_').attr('id', idc).remove();
            $(".loader").hide();
        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
    });

});
$(document).on('click', '.editcomm', function(event) {
    var txt = $(this).attr('datacom');
    var dat = $(this).attr('dataedit');
    $('.commentform').attr('id', 'commentsed');
    $('#btn-com').children('button').removeClass('Rpost-comment').addClass('Rpost-editcomment').attr('dataedit', dat);
    $('#commentsed').focus();
    $('#commentsed').val(txt);
});
$(document).on('click', '.Rpost-editcomment', function(event) {
    event.preventDefault();
    /* Act on the event */
    var boo = $(this);
    var formData = new FormData();
    formData.append('commentupdate_id', boo.attr('dataedit'));
    formData.append('comments', $('#commentsed').val());
    formData.append("csrf_test_name", csrf_value);
    $.ajax({
        url: base_url+'editcom',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: function() {
            $(".loader").show();
        }
    })
    .done(function(data) {
        // if (data.code == 200) {
            // $(".loader").hide();
        // }else{
            location.reload();
        // }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
    });
});

