var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function(a, b, c) {
    a != Array.prototype && a != Object.prototype && (a[b] = c.value)
};
$jscomp.getGlobal = function(a) {
    return "undefined" != typeof window && window === a ? a : "undefined" != typeof global && null != global ? global : a
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.SYMBOL_PREFIX = "jscomp_symbol_";
$jscomp.initSymbol = function() {
    $jscomp.initSymbol = function() {};
    $jscomp.global.Symbol || ($jscomp.global.Symbol = $jscomp.Symbol)
};
$jscomp.Symbol = function() {
    var a = 0;
    return function(b) {
        return $jscomp.SYMBOL_PREFIX + (b || "") + a++
    }
}();
$jscomp.initSymbolIterator = function() {
    $jscomp.initSymbol();
    var a = $jscomp.global.Symbol.iterator;
    a || (a = $jscomp.global.Symbol.iterator = $jscomp.global.Symbol("iterator"));
    "function" != typeof Array.prototype[a] && $jscomp.defineProperty(Array.prototype, a, {
        configurable: !0,
        writable: !0,
        value: function() {
            return $jscomp.arrayIterator(this)
        }
    });
    $jscomp.initSymbolIterator = function() {}
};
$jscomp.arrayIterator = function(a) {
    var b = 0;
    return $jscomp.iteratorPrototype(function() {
        return b < a.length ? {
            done: !1,
            value: a[b++]
        } : {
            done: !0
        }
    })
};
$jscomp.iteratorPrototype = function(a) {
    $jscomp.initSymbolIterator();
    a = {
        next: a
    };
    a[$jscomp.global.Symbol.iterator] = function() {
        return this
    };
    return a
};
$jscomp.makeIterator = function(a) {
    $jscomp.initSymbolIterator();
    var b = a[Symbol.iterator];
    return b ? b.call(a) : $jscomp.arrayIterator(a)
};
var url_redirect = "";
$(function() {
    $.FroalaEditor.DefineIcon("imageInfo", {
        NAME: "info"
    });
    $.FroalaEditor.RegisterCommand("imageInfo", {
        title: "Info",
        focus: !1,
        undo: !1,
        refreshAfterCallback: !1,
        callback: function() {
            var a = this.image.get();
            alert(a.attr("src"))
        }
    });
    $("#book_paragraph").froalaEditor({
        imageEditButtons: ["imageDisplay", "imageAlign", "imageInfo", "imageRemove"],
        useClasses: !1,
        pastePlain: !0,
        height: 400
    })
});

function tampilkanPreview(a, b) {
    for (var c = a.files, d = 0; d < c.length; d++) {
        var e = c[d],
            f = document.getElementById(b),
            g = new FileReader;
        e.type.match(/image.*/) ? (f.file = e, g.onload = function(a) {
            return function(c) {
                a.src = c.target.result
            }
        }(f), g.readAsDataURL(e)) : alert("Type file tidak sesuai. Khusus image.")
    }
}

function getContent(a, b, c) {
    $.ajax({
        url: a,
        type: "POST",
        cache: !1,
        data: {
            book_id: b,
            chapter_id: c,
            csrf_test_name: csrf_value
        },
        success: function(a) {
            HoldOn.close();
            $(".loader").hide();
            $("#pageContent").html(a)
        }
    })
}
$(document).ready(function() {
    getCategory();
    getChapter();
    addMinusPlus();
    $(".backbtn").on("click", function() {
        window.history.go(-1)
    });
    var a = $(window).width();
    768 > a ? $(".stickymenu").trigger("sticky_kit:detach") : $(".stickymenu").stick_in_parent();
    $(window).resize(function() {
        a = $(window).width();
        768 > a ? $(".stickymenu").trigger("sticky_kit:detach") : $(".stickymenu").stick_in_parent()
    });
    var b = 0;
    $(document).on("click", ".addsubchapt", function() {
        HoldOn.open({
            theme: "sk-bounce",
            message: "Loading."
        });
        $(this);
        var a = new FormData;
        b++;
        $(this).parents("#subchapter").append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');
        a.append("title_book", $("#title_book").val());
        a.append("chapter_title", $("#title_chapter").val());
        a.append("cover_name", $("#cover_name").val());
        a.append("category_id", $("#category_id").val());
        a.append("user_id", $("#user_id").val());
        a.append("tag_book", $("#tag_book").val());
        a.append("book_paragraph", $("#book_paragraph").val());
        a.append("csrf_test_name", csrf_value);
        if (null != $("#book_id").val()) {
            a.append("book_id",
                $("#book_id").val());
            for (var d = $jscomp.makeIterator(a.entries()), e = d.next(); !e.done; e = d.next());
        } else console.log("tidak");
        $.ajax({
            url: base_url + "my_book/create_book/save",
            dataType: "json",
            cache: !1,
            type: "POST",
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(b) {
            HoldOn.close();
            $("#success").show().delay(5E3).queue(function(a) {
                $(this).hide();
                a()
            });
            b = $jscomp.makeIterator(a.entries());
            for (var c = b.next(); !c.done; c = b.next()) c = c.value, console.log(c[0] + ", " + c[1]);
            location.reload();
            $("#title_chapter").show();
            $("#title_chapter").val();
            $("#title_book").hide()
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    
var count = 0;
$(document).on('click', '.saveasdraft', function() {
    HoldOn.open({
        theme: 'sk-bounce',
        message: "Tunggu sebentar."
    });

    var aww = $("#btnsavedraft");
    var formData = new FormData();

    var title_book = $("#title_book").val();
    var chapter_title = $("#title_chapter").val();

    count++;
    $(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');

    formData.append("title_book", $("#title_book").val());
    formData.append("chapter_title", $("#title_chapter").val());
    formData.append("cover_name", $('#cover_name').val());
    formData.append("category", $("#category_id").val());
    formData.append("user_id", $("input:hidden[name=user_id]").val());
    formData.append("csrf_test_name",  csrf_value)
        // formData.append("tag_book", $("#tag_book").val());
        formData.append("book_paragraph", $("#book_paragraph").val());
        if ($("#book_id").val() != null) {
            formData.append("book_id", $("#book_id").val());
        } else {
            console.log('tidak');
        }
        if ($(this).attr('ch_id') == null) {
        }else{
            formData.append("chapter_id", $(this).attr('ch_id'));
        }

        if (title_book == null) {
            if (chapter_title.length == 0 || chapter_title.length == null) {
                HoldOn.close();
                swal("Maaf..", "Semua Field harus diisi", "warning");
            }else{
                $.ajax({
                    "url": "create_book/save",
                    "dataType": 'json',
                    "cache": false,
                    "type": "POST",
                    "contentType": false,
                    "processData": false,
                    "data": formData
                })
                .done(function(data) {
                    HoldOn.close();
                    $("#success").show().delay(5000).queue(function(n) {
                        $(this).hide();
                        n();
                    });
                    $('.saveasdraft').attr('ch_id', data.data.chapter_id);
                    $('.addsubchapt').attr('ch_id', data.data.chapter_id);
                    // location.reload();
                    // var url = data['data']['book_id'] + '/chapter/' + data['data']['chapter_id'];
                    // url_redirect += 'create_book/' + data['data']['book_id'];
                    // aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt' + count + ' addsubchapt_on" book="' + data['data']['book_id'] + '" chapter="' + data['data']['chapter_id'] + '" id="editchapt" href="' + url + '">' + $("#title_book").val() + '</a>');
                    
                    // $("#books_id").html('<input type="hidden" id="book_id" name="book_id" value="' + data['data']['book_id'] + '">');
                    // $("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
                    // $("#title_book").val("");
                    // $('.book_paragraph').froalaEditor('undo.reset');
                    // $("#title_book").attr({
                    //  "placeholder": 'Masukan judul chapter'
                    // });
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {});
            }
        }else{
            if (title_book.length == 0 || title_book.length == null) {
                HoldOn.close();
                swal("Maaf..", "Semua Field harus diisi", "warning");
            }
            else if (chapter_title.length == 0 || chapter_title.length == null) {
                HoldOn.close();
                swal("Maaf..", "Semua Field harus diisi", "warning");
            }else{
                $.ajax({
                    "url": "create_book/save",
                    "dataType": 'json',
                    "cache": false,
                    "type": "POST",
                    "contentType": false,
                    "processData": false,
                    "data": formData
                })
                .done(function(data) {
                    HoldOn.close();
                    $("#success").show().delay(5000).queue(function(n) {
                        $(this).hide();
                        n();
                    });
                    $('.saveasdraft').attr('ch_id', data.data.chapter_id);
                    $('.addsubchapt').attr('ch_id', data.data.chapter_id);
                    // location.reload();
                    // var url = data['data']['book_id'] + '/chapter/' + data['data']['chapter_id'];
                    // url_redirect += 'create_book/' + data['data']['book_id'];
                    // aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt' + count + ' addsubchapt_on" book="' + data['data']['book_id'] + '" chapter="' + data['data']['chapter_id'] + '" id="editchapt" href="' + url + '">' + $("#title_book").val() + '</a>');
                    
                    // $("#books_id").html('<input type="hidden" id="book_id" name="book_id" value="' + data['data']['book_id'] + '">');
                    // $("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
                    // $("#title_book").val("");
                    // $('.book_paragraph').froalaEditor('undo.reset');
                    // $("#title_book").attr({
                    //  "placeholder": 'Masukan judul chapter'
                    // });
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {});
            }
        }   
    });
});

function getCategory() {
    $.ajax({
        url: base_url + "getCategory",
        type: "POST",
        dataType: "json",
        data: {csrf_test_name: csrf_value}
    }).done(function(a) {
        var b = "<option value=''>Pilih Category Buku</option>";
        $.each(a, function(a, d) {
            b += "<option value='" + d.category_id + "'>" + d.category_name + "</option>"
        });
        $("#category_id").html(b)
    }).fail(function() {
        console.log("error")
    }).always(function() {
    })
}
function showLoading() {
    HoldOn.open({
        theme: "sk-cube-grid",
        message: "Tunggu Sebentar ",
        backgroundColor: "white",
        textColor: "#7554bd"
    })
}

function getChapter() {
    $.ajax({
        url: base_url + "getChapter",
        data: {
            book_id: uri_segment,
            csrf_test_name: csrf_value
        },
        type: "POST",
        dataType: "json"
    }).done(function(a) {
        var b = "";
        // console.log(a);
        $.each(a, function(a, d) {
            b += '<a class="btn w-100 mb-10 chapterdata0 editsubchapt1 addsubchapt_on withanimation" book="2016" chapter="1326" id="editchapt" href="' + uri_segment + "/chapter/" + d.chapter_id + '" onclick="showLoading()">' + d.chapter_title + "</a>"
        });
        $("#btn_chapter").html(b)
    }).fail(function() {
        console.log("error")
    }).always(function() {
    })
}
$(function() {
    $(".withanimation").click(function(a) {
        a.preventDefault();
        var b = $(this).attr("href");
        setTimeout(function() {
            setTimeout(function() {
                showSpinner()
            }, 30);
            window.location = b
        }, 0)
    })
});
$(function() {
    $("#updateChapter").hide();
    $("#title_chapter").keyup(function() {
        $("#updateChapter").show();
    });
    $("#book_paragraph").on('froalaEditor.keyup', function (e, editor, keyupEvent) {
        $("#updateChapter").show();
    });
    $.FroalaEditor.DefineIcon("imageInfo", {
        NAME: "info"
    });
    $.FroalaEditor.RegisterCommand("imageInfo", {
        title: "Info",
        focus: !1,
        undo: !1,
        refreshAfterCallback: !1,
        callback: function() {
            var a = this.image.get();
            alert(a.attr("src"))
        }
    });
    $("#book_paragraph").froalaEditor({
        imageEditButtons: ["imageDisplay", "imageAlign", "imageInfo", "imageRemove"],
        pastePlain: !0
    });
    $("#updateChapter").click(function() {
        HoldOn.open({
            theme: "sk-bounce",
            message: "Tunggu sebentar."
        });
        var a = new FormData;
        a.append("title_book", $("#title_book").val());
        a.append("title_chapter", $("#title_chapter").val());
        a.append("cover_name", $("#cover_name").val());
        a.append("category_id", $("#category_id").val());
        a.append("user_id", $("input:hidden[name=user_id]").val());
        a.append("tag_book", $("#tag_book").val());
        a.append("book_paragraph", $("#book_paragraph").val());
        a.append("csrf_test_name", csrf_value);
        if (null != $("#book_id").val()) {
            a.append("book_id", $("input:hidden[name=books_id]").val());
            for (var b = $jscomp.makeIterator(a.entries()), c = b.next(); !c.done; c = b.next()) c = c.value, console.log(c[0] + ", " + c[1])
        } else console.log("tidak");
        null != $("#chapter_id").val() ? a.append("chapter_id", $("input:hidden[name=chapter_id]").val()) : console.log("tidak");

        
        $.ajax({
            url: base_url + "updatechapter",
            dataType: "json",
            cache: !1,
            type: "POST",
            contentType: !1,
            processData: !1,
            data: a
        }).done(function() {
            HoldOn.close();
            $("#success").show().delay(5E3).queue(function(a) {
                $(this).hide();
                a()
            });
            location.reload()
        }).fail(function() {
            console.log("error")
        }).always(function() {
            console.log("complete")
        })
    })
});

    $("#file_cover").change(function() {
        var a = new FormData();
        a.append("file_cover", $("#file_cover")[0].files[0]);
        a.append("book_id", $("#uri").val());
        a.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "post_cover",
            type: "POST",
            dataType: 'json',
            contentType: false,
            processData: false,
            data: a
        }).done(function(data) {
            $("#cover_name").val(data.link);
        }).fail(function() {
            console.log("error");
        }).always(function() {})
    });

    
    function showSpinner() {
        var options = {
            theme:"sk-cube-grid",
            message:'Tunggu Sebentar ',
            backgroundColor:"white",
            textColor:"#7554bd" 
        };
        HoldOn.open(options);
    }

function addMinusPlus() {
        $('.addplus').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('data-target');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        var jum = $("#count_chapter_plus_minus").val() - 2;
        if (!isNaN(currentVal)) {
            if (currentVal < jum)
            {
                $('input[name='+fieldName+']').val(currentVal + 1);
                $('.addmin').removeAttr('style');
            }
            else
            {
                $('.addplus').css('cursor','not-allowed');
            }
        } else {
            $('input[name='+fieldName+']').val(1);

        }
    });
    $(".addmin").click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-target');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal) && currentVal > 3) {
            $('input[name='+fieldName+']').val(currentVal - 1);
            $('.addplus').removeAttr('style');
        } else {
            $('input[name='+fieldName+']').val(3);
            $('.addmin').css('cursor','not-allowed');
        }
    });
}

$(document).on('click', '#setpin_publish', function() {
    swal({
        title: 'Perhatian',
        text: "Untuk menjual sebuah buku, anda harus mengaktifkan Dompet Baboo terlebih dahulu.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7661ca',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, aktifkan',
        cancelButtonText: 'Jual nanti',
    }).then((result) => {
        if (result.value) {
            $('#wallet-modal').modal('show');
        }
    })
});

$("#publish_book").click(function() {
    var formData = new FormData();
    var pr = $(".input-range").val();
    var slide = $('#is_free:checkbox:checked');
    var asd = slide.is(':empty');
    if (slide.length == 0 || asd == false) {
        formData.append("is_paid", false);
    }else{
        formData.append("price", pr);
        formData.append("chapter_start", $("#chapter_start").val());
        formData.append("is_paid", true);
    }
    formData.append("book_id", $("#uri").val());
    formData.append("file_cover", $("#cover_name").val());
    formData.append("category", $("#category_id").val());
    formData.append("book_paragraph", $("#book_paragraph").val());
    formData.append("title_book", $("#title_book").val());
    formData.append("title_chapter", $("#title_chapter").val());
    formData.append("csrf_test_name", csrf_value);

    var cat = $("#category_id").val();
    var tnc = $('.checktnc:checkbox:checked');

    if (cat == null || cat == "") {
        swal(
            'Gagal!',
            'Pilih kategori buku mu.',
            'error'
            );
    }else if(slide.length == 1 && pr <= 10000){
      swal(
        'Gagal!',
        'Minimal harga total penjualan buku sebesar Rp 10.000,-',
        'error'
        );
    }
    else if(tnc.length == 0){
        swal(
            'Gagal!',
            'Setujui Term of Service.',
            'error'
            );
    }
    else {
        $.ajax({
            url: base_url+'my_book/create_book/publish',
            dataType: 'json',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function () {
                HoldOn.open({
                    theme: 'sk-bounce',
                    message: "Tunggu sebentar."
                });
            }
        })
        .done(function(data) {
            if (data.code == 200) {
                window.location = base_url+'timeline';
            }else{
                location.reload();
            }
        })
        .fail(function() {
            console.log("errorss");
            location.reload();
        })
        .always(function() {
        });
    }

});