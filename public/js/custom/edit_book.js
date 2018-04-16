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
            chapter_id: c
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
    b = 0;
    $(document).on("click", ".saveasdraft", function() {
        HoldOn.open({
            theme: "sk-bounce",
            message: "Tunggu sebentar."
        });
        console.log("Awali semua dengan Bismillah dan akhiri dengan Alhamdulillah");
        $("#btnsavedraft");
        var a = new FormData;
        b++;
        $(this).parents("#subchapter").append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');
        a.append("title_book",
            $("#title_book").val());
        a.append("chapter_title", $("#title_book").val());
        a.append("cover_name", $("#cover_name").val());
        a.append("category_id", $("#category_id").val());
        a.append("user_id", $("input:hidden[name=user_id]").val());
        a.append("tag_book", $("#tag_book").val());
        a.append("book_paragraph", $("#book_paragraph").val());
        if (null != $("#book_id").val()) {
            a.append("book_id", $("#book_id").val());
            for (var d = $jscomp.makeIterator(a.entries()), e = d.next(); !e.done; e = d.next()) e = e.value, console.log(e[0] + ", " + e[1])
        } else console.log("tidak");
        $.ajax({
            url: "create_book/save",
            dataType: "json",
            cache: !1,
            type: "POST",
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(a) {
            HoldOn.close();
            $("#success").show().delay(5E3).queue(function(a) {
                $(this).hide();
                a()
            });
            location.reload()
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    })
});

function getCategory() {
    $.ajax({
        url: base_url + "getCategory",
        type: "POST",
        dataType: "json"
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
            book_id: uri_segment
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