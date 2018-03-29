$(document).ready(function() {
	getBestBook();
	participantEventAll();
	followEvent();
	validateEvent();
	like();
	unlike();
	shareFB();
});

var page = 1;
$(window).scroll(function() {
	if ($(window).scrollTop() == $(document).height() - $(window).height()){
		page++;
		loadMoreData(page);
	} 
});
function loadMoreData(page) {
	$.ajax({
		url: '?page=' + page,
		type: "get",
		beforeSend: function()
		{
			$('#loader_scroll').show();
		}
	})
	.done(function(data)
	{
		if(data == " "){
			$('#loader_scroll').html("No more records found");
			return;
		}
		$('#loader_scroll').hide();
		$("#post-data").append(data);
	})
	.fail(function(jqXHR, ajaxOptions, thrownError)
	{
		console.log('server not responding...');
	});
}
function getBestBook() {
	$.ajax({
	    url: base_url+"bestBookEvent",
	    type: 'GET',
	    dataType: 'json',
	  })
	  .done(function(data) {
	    var best_book = '';
	    // console.log
	    $.each(data, function(index, val) {
	      var cover;
	      var title;
	      var txt = val.popular_book_title;
	      if (txt != null) {
			title = txt.substring(0, 17) + '...';
	      }
	      if (val.popular_cover_url == null || val.popular_cover_url == '' || val.popular_cover_url == 'Kosong') {
	        cover = 'https://assets.dev-baboo.co.id/baboo-cover/default3.png';
	      }else{
	        cover = val.popular_cover_url;
	      }
	      best_book += '<div class="col-md-3 col-xs-6 mb-20"> <div class="thumbnail"> <img alt="'+val.popular_book_title+' by '+val.popular_author_name+'" src="'+cover+'" class="img-fluid rounded img-peserta"> <div class="caption mt-10"> <span class="txtTitleBook">'+title+'</span> <span class="txtAuthor text-muted">'+val.popular_author_name+'</span> </div> </div> </div>';
	    });
	    $(".participant_event").html(best_book);
	  })
	  .fail(function() {
	    console.log("error");
	  })
	  .always(function() {
	  });
}
function participantEventAll() {
	$.ajax({
	    url: base_url+"bestBookEventSeeAll",
	    type: 'GET',
	    dataType: 'json',
	  })
	  .done(function(data) {
	    var best_book = '';
	    // console.log
	    $.each(data, function(index, val) {
	      var cover;
	      var title;
	      // console.log(val);
	      var txt = val.title_book;
	      if (txt.length > 17) {
	      	title = txt.substring(0, 17) + '...';
	      }else{
	      	title = txt;
	      }
	      if (val.popular_cover_url == null || val.popular_cover_url == '' || val.popular_cover_url == 'Kosong') {
	        cover = base_url+'public/img/icon-tab/empty-set.png';
	      }else{
	        cover = val.popular_cover_url;
	      }
	      best_book += '<div class="col-md-3 col-xs-6 mb-20"> <div class="thumbnail"> <img alt="'+val.title_book+' by '+val.author_name+'" src="'+cover+'" class="img-fluid rounded img-peserta"> <div class="caption mt-10"> <span class="txtTitleBook">'+title+'</span> <span class="txtAuthor text-muted">'+val.author_name+'</span> </div> </div> </div>';
	    });
	    $(".participant_event_all").html(best_book);
	  })
	  .fail(function() {
	    console.log("error");
	  })
	  .always(function() {
	  });
}
function followEvent() {
	$(document).on('click', '.follow_event', function(event) {
        event.preventDefault();
        if (follow_event == false) {
			swal({
	            title: "Wait...",
	            text: "Anda Harus Login Terlebih Dahulu",
	            type: "info"
	        }).then(function() {
			    window.location = base_url+"login#event";
			});
        }else{
        	window.location = $(this).attr('href');
        }
    });
}
function validateEvent() {
	$("#follow-formevent").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			nohp: {
				required: true,
				minlength: 10
			},
			accept_event : {
				required: true
			}
		},
		messages: {
			email: {
				required: 'Email harus di isi'
			},
			nohp: {
				required: 'No Hp harus di isi',
				minlength: 'No Hp minimal 10 karakter'
			},
			accept_event: {
				required: 'Harus di isi'
			}
		},
		submitHandler: function(form) {
        $.ajax({
            url: base_url+'event/follow_event',
            type: 'POST',
            data: $(form).serialize(),
            success: function(response) {
            	// $('#answers').html(response);
            	location.href = base_url+'timeline';
            }            
        });
    }
	});
}
function like() {
	$(document).on("click", ".like", function() {
        var e = $(this),
            a = new FormData,
            t = e.children(".txtlike");
        e.children(".loveicon").attr("src", base_url+"public/img/assets/love_active.svg"), a.append("user_id", $("#iaiduui").val()), a.append("book_id", e.attr("data-id")), $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(a) {
            null == a.code ? e.children(".loveicon").attr("src", base_url+"public/img/assets/icon_love.svg") : (e.removeClass("like"), e.addClass("unlike"), t.removeClass("txtlike"), t.addClass("txtunlike"), e.children(".txtunlike").text("Batal Suka"), e.children(".loveicon").attr("src", base_url+"public/img/assets/love_active.svg"))
        }).fail(function() {
            console.log("Failure")
        }).always(function() {})
    })
}
function unlike() {
	$(document).on("click", ".unlike", function() {
        var e = $(this),
            a = new FormData,
            t = e.children(".txtunlike");
        e.children(".loveicon").attr("src", base_url+"public/img/assets/icon_love.svg"), a.append("user_id", $("#iaiduui").val()), a.append("book_id", e.attr("data-id")), $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function(a) {
            null == a.code ? e.children(".loveicon").attr("src", base_url+"public/img/assets/love_active.svg") : (e.removeClass("unlike"), e.addClass("like"), t.removeClass("txtunlike"), t.addClass("txtlike"), e.children(".txtlike").text("Suka"), e.children(".loveicon").attr("src", base_url+"public/img/assets/icon_love.svg"))
        }).fail(function() {
            console.log("Failure")
        }).always(function() {})
    })
}
function shareFB() {
	$(document).on("click", ".share-fb", function() {
	    var aww = $(this);
	    var e = new FormData,
	        title = aww.parents('.card').find(".dbooktitle").val();
	        t = +$("#sharecount").text() + 1,
	        desc = aww.parents('.card').find(".ptexts").text();
	        coverimg = aww.parents('.card').find(".effect-img").attr("src"),
	        authname = aww.parents('.card').find(".nametitle2").text(),
	        links = aww.parents('.card').find(".book_link").attr("href");
	        
	    FB.ui({
	        method: "share_open_graph",
	        action_type: "og.shares",
	        action_properties: JSON.stringify({
	            object: {
	                "og:url": base_url + "book/" + links + "/preview",
	                "og:title": title + " ~ By : " + authname,
	                "og:description": desc,
	                "og:image": coverimg
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
	        }).fail(function() {
	            console.log("Failure")
	        }).always(function() {}))
	    })
	});
}
function convertToSlug(d) {
	return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};