function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss")
}
$(window).on("load", function() {
    var getHashDaft = window.location.hash;
    if (getHashDaft != "" && getHashDaft == "#buynow") {
        $('.buyfullbook').click();
    }
});
$(document).ready(function() {
    // $(document).on('click', '.profile', function() {
    //     event.preventDefault();
    //     var boo = $(this);
    //     var usr_prf = boo.attr("data-usr-prf");
    //     var usr_name = boo.attr("data-usr-name");
    //     var formdata = new FormData();
    //
    //     formdata.append("user_prf", usr_prf);
    //     formdata.append("csrf_test_name", csrf_value);
    //     var url = base_url+'profile/'+usr_name;
    //     var form = $('<form action="' + url + '" method="post">' +
    //       '<input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" />' +
    //       '<input type="hidden" name="usr_prf" value="' + usr_prf + '" />' +
    //       '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
    //       '</form>');
    //     $(boo).append(form);
    //     form.submit();
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

	var d = window.location.hash;
	"" != d && "#comment" == d && $("#commentModal").modal("toggle");
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
    $(document).on("click", ".post-comment", function() {
        var boo = $(this);

        if ($('#comments').val() !== "")
        {
            $('textarea.mention').mentionsInput('val', function (text) {
                if (post_text != '') {
                    var post_text = text;
                    var post_data = "book_id=" + $("#iaidubi").val() + "&comments=" + post_text + "&csrf_test_name=" + csrf_value;
                    $.ajax({
                        url: base_url + "commentbook",
                        type: "POST",
                        dataType: "JSON",
                        data: post_data,
                        beforeSend: function () {
                            $(".loader").show()
                        }
                    }).done(function (a) {
                        null == a && ($(".coment_").hide(), console.log("Koneksi Bermasalah"));
                        $("textarea.mention").mentionsInput('reset');
                        $(".loader").hide();
                        var ava;
                        if (a.comment_user_avatar == null || a.comment_user_avatar == "") {
                            var ava = base_url + "public/img/profile/blank-photo.jpg";
                        } else {
                            var ava = a.comment_user_avatar;
                        }
                        dats = "<div class='media pb-15 mb-15 coment_'> <img class='d-flex align-self-start mr-15 rounded-circle' src='" + ava + "' width='40' height='40' alt='" + a.comment_user_name + "' style='object-fit:cover;'> <div class='media-body'> <a href='" + base_url + "penulis/" + convertToSlug(a.comment_user_name) + "-" + a.comment_user_id + "'><span class='card-title' style='font-size: 12pt;font-weight: 800;'>" + a.comment_user_name + "</span></a><div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='" + a.comment_id + "' datacom='" + a.comment_text + "'><img src='" + base_url + "public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='" + a.comment_id + "'><img src='" + base_url + "public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> <p class='commenttxt' com-id='" + a.comment_id + "'>" + a.comment_text + "</p><div><small><span class='text-muted'>" + a.comment_time + "</span> <a href='javascript:void(0);' class='ml-20 replcom' com-id='" + a.comment_id + "' com-name='" + a.comment_user_name + "'>Balas</a></small></div></div></div>";
                        $("#bookcomment_list").append(dats);
                    }).fail(function () {
                        console.log("error")
                    }).always(function () {
                    })
                } else {
                }
            });
        }else{
        }
    });
	// $(document).on("click", ".post-comment-parap", function() {// 	var a = $(this), // 	b = new FormData, // 	c = $("#pcomments").val(), // 	d = $("#profpict").attr("src"), // 	e = $("#profpict").attr("alt"); // 	c = "<div class='pcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + d + "' width='48' height='48' alt='" + e + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + e + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + // 	c + "</p></div> </div><hr></div>"; // 	$("#paragraphcomment_list").append(c); // 	b.append("user_id", $("#iaiduui").val()); // 	b.append("paragraph_id", a.attr("data-p-id")); // 	b.append("comments", $("#pcomments").val()); // 	b.append("csrf_test_name", csrf_value); // 	$.ajax({// 		url: base_url + "commentbook", // 		type: "POST", // 		dataType: "JSON", // 		cache: !1, // 		contentType: !1, // 		processData: !1, // 		data: b // 	}).done(function(a) {// 		null == a && ($(".pcommentviewnull").hide(), // 			console.log("Koneksi Bermasalah")); // 		$("#pcomments").val("") // 	}).fail(function() {// 		console.log("error") // 	}).always(function() {}) // });
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

	$(document).on("click", ".like", function() {
		var a = $(this),
		b = new FormData,
		c = +$("#likecount").text() + 1;
		$(".loveicon").attr("src", base_url+"/public/img/assets/love_active.svg");
		b.append("user_id", $("#iaiduui").val());
		b.append("book_id", a.attr("data-id"));
		b.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "like",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
			a.removeClass("like");
			a.addClass("unlike");
			$("#likecount").text(c)
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".unlike", function() {
		var a = $(this),
		b = new FormData,
		c = +$("#likecount").text() - 1;
		$(".loveicon").attr("src", base_url+"/public/img/assets/icon_love.svg");
		b.append("user_id", $("#iaiduui").val());
		b.append("book_id", a.attr("data-id"));
		b.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "like",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
			a.removeClass("unlike");
			a.addClass("like");
			$("#likecount").text(c)
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".follow-u", function() {
		var a = $(this),
		b = new FormData;
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
		}).done(function() {
			a.removeClass("follow-u");
			a.addClass("unfollow-u");
			$(".txtfollow").text("Unfollow")
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".unfollow-u", function() {
		var a = $(this),
		b = new FormData;
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
		}).done(function() {
			a.removeClass("unfollow-u");
			a.addClass("follow-u");
			$(".txtfollow").text("Follow")
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	var e = function(a) {
		return ["https://twitter.com/intent/tweet?tw_p=tweetbutton&url=",
		encodeURI(a.url), "&via=", a.via, "&text=", a.text
		].join("")
	};
	$(document).on("click", ".share-tweet", function() {
		$(this);
		var a = new FormData,
		b = $("#iaidubi").val(),
		c = $(".dbooktitle").text(),
		d = $("#parentparaph").text(),
		h = +$("#sharecount").text() + 1;
		b = e({
			url: full_url,
			via: "BabooID",
			text: d.substring(0, 120)
		});
		window.open(b, "Tweet", "height=300,width=700");
		a.append("user_id", $("#iaiduui").val());
		a.append("book_id", $("#iaidubi").val());
		a.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "shares",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: a
		}).done(function(a) {
			$("#sharecount").text(h)
		}).fail(function() {
			console.log("Failure")
		}).always(function() {})
	});
	$(document).on("click", ".share-fb", function() {
		$(this);
		var a = new FormData;
		$("#iaidubi").val();
		var b = $(".dbooktitle").text();
		c = +$("#sharecount").text() + 1;
		e = $(".cover_image").attr("src");
		k = $(".author_name").text();
		FB.ui({
			method: "share_open_graph",
			action_type: "og.shares",
			action_properties: JSON.stringify({
				object: {
					"og:url": full_url + "/preview",
					"og:title": b + " ~ By : " + k,
					"og:description": desc,
					"og:image": e
				}
			})
		}, function(b) {
			b && !b.error_message && (a.append("csrf_test_name", csrf_value),a.append("user_id", $("#iaiduui").val()), a.append("book_id", $("#iaidubi").val()), $.ajax({
				url: base_url + "shares",
				type: "POST",
				dataType: "JSON",
				cache: !1,
				contentType: !1,
				processData: !1,
				data: a
			}).done(function(a) {
				$("#sharecount").text(c)
			}).fail(function() {
				console.log("Failure")
			}).always(function() {}))
		})
	});
	$(document).on("click", ".btncompar", function() {
		var a = $(this),
		b = new FormData;
		b.append("paragraph_id", a.attr("data-p-id"));
		b.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "getcommentbook",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function(b) {
			var c = "";
			$.each(b, function(a, b) {
				var d;
				"" != b.comment_user_avatar ? d = b.comment_user_avatar : "" == b.comment_user_avatar && (d = "public/img/profile/blank-photo.jpg");
				c += "<div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + d + "' width='48' height='48' alt='" +
				b.comment_user_name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + b.comment_user_name + "</a><small><span class='text-muted ml-10'>" + b.comment_date + "</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + b.comment_id + "'>" + b.comment_text + "</p> </div> </div><hr>"
			});
			$("#paragraphcomment_list").html(c);
			$(".post-comment-parap").attr("data-p-id", a.attr("data-p-id"))
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	progressScroll();
	getChapter();
	getmenuChapter(); - 1 != document.URL.indexOf("#comment") && getCommentBook()
	buyBook();
	$("#notifpayment").modal('show');

	$(document).on("click", ".buyfullbook", function() {
        stat = $(this).attr('stats-book') ;
        if (stat == 'done') {
            $('#buymodal').modal('show');
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
});
function goodbye(e) {
    if(!e) e = window.event;
    //e.cancelBubble is supported by IE - this will kill the bubbling process.
    e.cancelBubble = true;
    e.returnValue = 'You sure you want to leave?'; //This is displayed on the dialog

    //e.stopPropagation works in Firefox.
    if (e.stopPropagation) {
        e.stopPropagation();
        e.preventDefault();
    }
}
function buyBook() {
	$("#buy-btn").click(function(event) {
		window.onbeforeunload = function(){
		  return 'Mohon Selesaikan Pembayaran Anda!';
		};		$(this).attr("disabled", "disabled");
		
			$.ajax({
				url: base_url+'pay_book/token',
				type: "POST",
				data:{id_book:$("#iaidubi").val(),user_id:$("#uid_sess").val(), url_redirect:window.location.href, csrf_test_name: csrf_value},
				cache: false,
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
		  }
		});
	});
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

function getChapter() {
	$(".id_chapter").on("click", function() {
		var d = $(this).attr("id"),
		c = $(this).attr("b_id");
		$.ajax({
			url: base_url + "getdetailchapter",
			type: "POST",
			dataType: "json",
			data: {
				id_chapter: d,
				id_book: c,
				csrf_test_name: csrf_value
			}
		}).done(function(c) {
			var a = "";
			$.each(c, function(b, c) {
				a += c.paragraph_text
			});
			$("#appendContent").append(a);
			$("html, body").animate({
				scrollTop: $("#appendContent").offset().top
			}, 2E3)
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	})
}

function getmenuChapter() {
	$.ajax({
		url: base_url + "getmenuchapter",
		type: "POST",
		dataType: "json",
		data: {
			id_book: segment,
			csrf_test_name: csrf_value
		},
		beforeSend: function() {
			$("#loader_chapter").show()
		}
	}).done(function(d) {
		var c = "";
		$("#loader_chapter").hide();
		if (userbook == userdata) {
			$.each(d, function(d, a) {
				if (d != 'pay') {
				c += '<li style="background:transparent;border-bottom: 0.5px #eeeeee;', 0 == d && (c += "background: url("+base_url+"public/img/assets/frame_active.svg) no-repeat; background-position: right; "), c += '" class="list-group-item ', 0 == d && (c += "chapter_active icon_active "), c += '" id="list_chapters"><a href="' + window.location.href + "/ch/" + a.chapter_id + '" class="id_chapter', c += '" id="' + d + '"><span style="font-size: 15px;">' + a.chapter_title + "</span></a>", 0 == d && (c += "</li>");
				}
			});
		}else{
			$.each(d, function(d, a) {
				if (d != 'pay') {
				false != a.chapter_free ? (c += '<li style="background:transparent;border-bottom: 0.5px #eeeeee;', 0 == d && (c += "background: url("+base_url+"public/img/assets/frame_active.svg) no-repeat; background-position: right; "), c += '" class="list-group-item ', 0 == d && (c += "chapter_active icon_active "), c += '" id="list_chapters"><a href="' + window.location.href + "/ch/" + a.chapter_id + '" class="id_chapter', c += '" id="' + d + '"><h2 class="h6">' + a.chapter_title + "</h2></a>", 0 == d && (c += "</li>")) : (c += '<li class="list-group-item ',
					c += "chapter_disabled ", c += '" title="Beli buku ini untuk versi full." style="cursor: not-allowed;border-bottom: 0.5px #eeeeee;"><h2 class="h6 id_chapter', c += '" id="' + d + '">' + a.chapter_title + "</h2><img class='float-right sale-icon' src='"+base_url+"public/img/assets/sale_active.svg'></li>")
				}
			});
			if (d.pay.is_free == false) {
				var pend;
				if (d.pay.stats == 'pending') {
					pend = 'pend';
				}else{
					pend = 'done';
				}
				if (true) {}
				 c += '<li class="list-group-item item_price_book ', c += '"><a class="', c += '" id="' + d + '"><p style="font-size:10px;">' + 'Versi buku full' + "</p><span style='color:#7554bd'>Rp "+ d.pay.book_price +"</span></a><button style='float:right;' class='btn-buy buyfullbook' stats-book='"+ pend +"'>Beli</button></li>";
			}
		}
		// $(document).on('click', '.btn-buy', function() {
		// 	window.onbeforeunload = function(){
		// 	  return 'You have unsaved changes!';
		// 	};
		// 	// console.log("clicked");
		// });
		$("#list_chapter").html(c);
		$(document).on('click', '#list_chapters', function(event) {
			event.preventDefault();
			/* Act on the event */
			var a = $(this).children('.id_chapter').attr("id");
			HoldOn.open({
				theme: "sk-cube-grid",
				message: "Tunggu Sebentar ",
				backgroundColor: "white",
				textColor: "#7554bd"
			});
			var b = $(this).children('.id_chapter').attr("href");
			$(this).siblings().removeClass("chapter_active").end().addClass("chapter_active");
			$(this).siblings().removeAttr("style").end().attr("style", "background:transparent;border-bottom: 0.5px #eeeeee;background: url("+base_url+"public/img/assets/frame_active.svg) no-repeat; background-position: right;");
			getContent(b, a);
		});
	}).fail(function() {
		$("#loader_chapter").hide();
		console.log("error")
	}).always(function() {
		$("#loader_chapter").hide()
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
				b += "<div id='detailStyle' class='mb-20 textp parap-desk mb-10' data-id-p='" + c.paragraph_id + "'>" + c.paragraph_text +
				"</div>"
			});
			$("#parentparaph").html(b)
		}
	})
}

function getCommentBook() {
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
            "' style='object-fit:cover;'> <div class='media-body'> <a href='"+base_url+"penulis/"+convertToSlug(d.comment_user_name)+"-"+d.comment_user_id+"'><span class='card-title' style='font-size: 12pt;font-weight: 800;'>" + d.comment_user_name + "</span></a>";
            if (d.comment_user_id == userdata) {
                b += "<div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+d.comment_id+"' datacom='"+d.comment_text+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+d.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> ";
            }else{
                b += "<div></div>";
            }
            b += "<p class='commenttxt' com-id='" + d.comment_id + "'>" + d.comment_text + "</p><div><small><span class='text-muted'>" + d.comment_date + "</span> <a href='javascript:void(0);' class='ml-20 replcom' com-id='" + d.comment_id + "' com-name='" + d.comment_user_name + "'>Balas</a></small></div><div class='data-reply' data-reply='" + d.comment_id + "'>";
            $.each(d.comment_reply_data, function(d, repl) {
                var names = repl.comment_user_name.substr(0,repl.comment_user_name.indexOf(' '));
                b += "<div class='mt-5'> <img src='"+repl.comment_user_avatar+"' width='20' height='20' class='rounded-circle fitcover'><a href='"+base_url+"penulis/"+convertToSlug(repl.comment_user_name)+"-"+repl.comment_user_id+"' class='ml-10' style='font-weight: 600;'>"+names+"</a><span class='ml-10 commenttxt'>"+repl.comment_text+"</span></div>";
            });
            b += "</div></div></div>";
            // <a href='#' class='float-right'>Like</a>
        });
        $(".loader").hide();

        $("#bookcomment_list").html(b);
    }).fail(function() {
        console.log("error")
    }).always(function() {})
}

function ScrollToBottom(d) {
	var c;
	for (c = 0; c <= d; c++) window.scrollTo(0, document.querySelector("#post-data").scrollHeight)
}

$(document).on('click', '.replcom', function() {
    event.preventDefault();
    /* Act on the event */
    var boo = $(this);
    var name = '@'+boo.attr('com-name').replace(/\s/g, '')+' ';
    var comid = boo.attr("com-id");
    $('#comments').val(name).focus();

    $('.post-comment').hide();
    var btn = "<button class='post-comment-repl' type='button' style='background: none;border: none;' com_id='"+comid+"'><img src='"+base_url+"public/img/assets/icon_sendcomm.png' width='43' height='43'></button>";
    $('#btn-com').html(btn);
});
$(document).on('click', '.post-comment-repl', function(event) {
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
                dats = "<div class='mt-5'> <img src='"+a.comment_user_avatar+"' width='20' height='20' class='rounded-circle fitcover'><a src='"+base_url+"penulis/"+convertToSlug(a.comment_user_name)+"-"+a.comment_user_id+"' class='ml-10' style='font-weight: 600;'>"+names+"</a><span class='ml-10 commenttxt'>"+a.comment_text+"</span> ";
                if (a.comment_user_id == userdata) {
                    dats += "<div class='dropdown right-posi'> <button aria-expanded='false' aria-haspopup='true' class='btn-clear' data-toggle='dropdown' id='dropEditComm' style='font-size:11pt;' type='button'>&#8226;&#8226;&#8226;</button> <div aria-labelledby='dropEditComm' class='dropdown-menu'> <a class='dropdown-item editcomm' href='javascript:void(0);' dataedit='"+a.comment_id+"' datacom='"+a.comment_text+"'><img src='"+base_url+"public/img/assets/icon_pen.svg'> Ubah Komentar</a> <hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delcomm' href='javascript:void(0);' datadel='"+a.comment_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg'> Hapus Komentar</a> </div></div> ";
                }else{
                    dats += "</div>";
                }
                $("#"+comid_).find(".data-reply").attr('data-reply', comid_).append(dats);
                var btn = "<button class='post-comment' type='button' style='background: none;border: none;'><img src='"+base_url+"public/img/assets/icon_sendcomm.png' width='43' height='43'></button>";
                $('#btn-com').html(btn);
                location.reload();
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
    $('#btn-com').children('button').removeClass('post-comment').addClass('post-editcomment').attr('dataedit', dat);
    $('#commentsed').focus();
    $('#commentsed').val(txt);
});
$(document).on('click', '.post-editcomment', function(event) {
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
function getBooks() {var id = $('#iaidubi').val(); var di = $('.spadding').attr('dat-cpss'); $.ajax({url: base_url+'detailBooks', type: 'POST', dataType: 'json', data: {book_id: id, csrf_test_name: csrf_value} }) .done(function(data) {if (data.c == 200) {showPDF(atob(data.dat.u), di.slice(0, -5)); } }) .fail(function() {}) .always(function() {});
var __PDF_DOC,
__CURRENT_PAGE,
__TOTAL_PAGES,
pdfFile,
__PAGE_RENDERING_IN_PROGRESS = 0,
__CANVAS = $('#pdf-canvas').get(0),
pageElement = document.getElementById('pdf-viewer');

function showPDF(pdf_url, password) {
	$(".loader").show();
	PDFJS.disableStream = true;
	PDFJS.getDocument({ url: pdf_url, password: password }).then(function(pdf_doc) {
		__PDF_DOC = pdf_doc;
		__TOTAL_PAGES = __PDF_DOC.numPages;

		for(page = 1; page <= __TOTAL_PAGES; page++) {
			canvas = document.createElement("canvas");
			canvas.className = 'pdf-page-canvas mb-10 w-100';
			pageElement.appendChild(canvas);
			showPage(page, canvas);
		}

        // showPage(1);
    }).catch(function(error) { console.log(error)

    	if(error.name == 'PasswordException') {
    		$("#password-message").text(error.code == 2 ? error.message : '');
    	}
    	else {
    		console.log(error.message);
    	}
    });
}

function showPage(page_no, canvas) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	$("#pdf-canvas").hide();
	$("#page-loader").show();

	$("#pdf-current-page").text(page_no);

	__PDF_DOC.getPage(page_no).then(function(page) {
		var scale = 1.5;
		viewport = page.getViewport(scale);
		canvas.height = viewport.height;
		canvas.width = viewport.width;
		page.render({canvasContext: canvas.getContext('2d'), viewport: viewport});
		$(".loader").hide();
	});
}
}

function convertToSlug(d) {
    return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};
