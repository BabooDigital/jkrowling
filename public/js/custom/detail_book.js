function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss")
}
$(document).ready(function() {
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
	$(document).on("click",
		".post-comment",
		function() {
			$(this);
			var a = new FormData,
			b = $("#comments").val();
			if (null == b || "" == b) alert("Anda harus masukan karakter");
			else {
				var c = $("#profpict").attr("src"),
				d = $("#profname").text(),
				e = +$("#commentcount").text() + 1;
				b = "<div class='commentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='" + c + "'> <div class='media-body'> <h5 class='nametitle2 mb-5'>" + d + "</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='nullcomment'>" +
				b + "</p> </div> <hr></div>";
				$("#bookcomment_list").append(b);
				a.append("user_id", $("#iaiduui").val());
				a.append("book_id", $("#iaidubi").val());
				a.append("comments", $("#comments").val());
				$.ajax({
					url: base_url + "commentbook",
					type: "POST",
					dataType: "JSON",
					cache: !1,
					contentType: !1,
					processData: !1,
					data: a
				}).done(function(a) {
					$("span[id='commentcount']").text(e);
					null == a && ($(".commentviewnull").hide(), console.log("Koneksi Bermasalah"));
					$("#comments").val("")
				}).fail(function() {
					console.log("error")
				}).always(function() {})
			}
		});
	$(document).on("click", ".post-comment-parap", function() {
		var a = $(this),
		b = new FormData,
		c = $("#pcomments").val(),
		d = $("#profpict").attr("src"),
		e = $("#profpict").attr("alt");
		c = "<div class='pcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + d + "' width='48' height='48' alt='" + e + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + e + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" +
		c + "</p></div> </div><hr></div>";
		$("#paragraphcomment_list").append(c);
		b.append("user_id", $("#iaiduui").val());
		b.append("paragraph_id", a.attr("data-p-id"));
		b.append("comments", $("#pcomments").val());
		$.ajax({
			url: base_url + "commentbook",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function(a) {
			null == a && ($(".pcommentviewnull").hide(),
				console.log("Koneksi Bermasalah"));
			$("#pcomments").val("")
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".like", function() {
		var a = $(this),
		b = new FormData,
		c = +$("#likecount").text() + 1;
		$(".loveicon").attr("src", "../public/img/assets/love_active.svg");
		b.append("user_id", $("#iaiduui").val());
		b.append("book_id", a.attr("data-id"));
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
		$(".loveicon").attr("src", "../public/img/assets/icon_love.svg");
		b.append("user_id", $("#iaiduui").val());
		b.append("book_id", a.attr("data-id"));
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
			url: base_url + "book/" + b + "-" + convertToSlug(c),
			via: "BabooID",
			text: d.substring(0, 120)
		});
		window.open(b, "Tweet", "height=300,width=700");
		a.append("user_id", $("#iaiduui").val());
		a.append("book_id", $("#iaidubi").val());
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
		var b = $(".dbooktitle").text(),
		c = +$("#sharecount").text() + 1,
		d = $(".textp").attr("data-text") + ".. - Baca buku lebih lengkap disini.. | Baboo - Beyond Book & Creativity",
		e = $(".cover_image").attr("src"),
		k = $(".author_name").text();
		FB.ui({
			method: "share_open_graph",
			action_type: "og.shares",
			action_properties: JSON.stringify({
				object: {
					"og:url": base_url + "book/" + segment + "/preview",
					"og:title": b + " ~ By : " + k + " | Baboo - Beyond Book & Creativity",
					"og:description": d,
					"og:image": e
				}
			})
		}, function(b) {
			b && !b.error_message && (a.append("user_id", $("#iaiduui").val()), a.append("book_id", $("#iaidubi").val()), $.ajax({
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
});

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
				id_book: c
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
			id_book: segment
		},
		beforeSend: function() {
			$("#loader_chapter").show()
		}
	}).done(function(d) {
		var c = "";
		$("#loader_chapter").hide();
		$.each(d, function(d, a) {
			"false" != a.chapter_free ? (c += '<li class="list-group-item ', 0 == d && (c += "chapter_active "), c += '" id="list_chapters"><a href="' + base_url + "book/" + segment + "/chapter/" + a.chapter_id + '" class="id_chapter', c += '" id="' + d + '">' + a.chapter_title + "</a></li>") : (c += '<li class="list-group-item ',
				c += "chapter_disabled ", c += '" id="list_chapters" style="cursor: not-allowed;"><span class="id_chapter', c += '" id="' + d + '">' + a.chapter_title + "</span></li>")
		});
		$("#list_chapter").html(c);
		$(".id_chapter").on("click", function(c) {
			var a = $(this).attr("id");
			HoldOn.open({
				theme: "sk-cube-grid",
				message: "Tunggu Sebentar ",
				backgroundColor: "white",
				textColor: "#7554bd"
			});
			var b = $(this).attr("href");
			$(this).parent().siblings().removeClass("chapter_active").end().addClass("chapter_active");
			getContent(b, a);
			c.preventDefault()
		})
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
			b + "'> <div class='media-body'> <h5 class='nametitle2 mb-5'>" + a.comment_user_name + "</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='" + a.comment_id + "'>" + a.comment_text + "</p> </div> <hr></div>"
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