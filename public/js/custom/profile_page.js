function funcDropdown() {
    document.getElementById("myDropdown").classList.toggle("showss")
}
$(document).ready(function() {

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
		$.ajax({
			url: '?page=' + page,
			type: "get",
			beforeSend: function() {
				$('.loader').show();
			}
		})
		.done(function(data) {
			if (!$.trim(data)) {
				$('.loader').hide();
				$('#publishdata').append("<div class='mb-30 text-center'>Tidak ada buku lagi, ayo buat lebih banyak buku!</div>");
				return;

			};
			$('.loader').hide();
			$("#publishdata").append(data);
			loaded = true;
		})
		.fail(function(jqXHR, ajaxOptions, thrownError) {
			console.log('server not responding...');
			loaded = true;
			location.reload();
		});
	}


		$(document).on('click', '.ikuti-lomba', function() {
			var formData = new FormData();

			formData.append('fullname', $('#yourName').val());
			formData.append('date_of_birth', $('#yourBirth').val());
			formData.append('address', $('#yourLoc').val());
			formData.append('about_me', $('#yourBio').val());
			formData.append("csrf_test_name", csrf_value);

			$.ajax({
				url: 'edit_profile',
				type: 'POST',
				dataType: 'JSON',
				cache: false,
				contentType: false,
				processData: false,
				data: formData
			})
			.done(function(data) {
				if (data.code == 200) {
					$('#alert_success').show('slow/400/fast', function() {
						setTimeout(function() {
							$('#edit-profile').modal('hide');
						}, 300);
					});
				}else{
					location.reload();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
			});
     //    $.ajax({
     //        url: base_url+'edit_profile',
     //        type: 'POST',
     //        data: $(form).serialize(),
     //        success: function(response) {
     //        	if (response.code == 200) {
				 //  $('#alert_success').show('slow/400/fast', function() {
     //    			setTimeout(function() {
					// 	$('#edit-profile').modal('hide');
					// }, 300);
				 //  });
     //        	}
     // 			console.log(response);
     //        	location.href = base_url+'';
     //        }
     //    });
    // }
	// });
	// $(document).on('click', '.profile', function(event) {
     //    event.preventDefault();
     //    var boo = $(this);
     //    var usr_prf = boo.attr("data-usr-prf");
     //    var usr_name = boo.attr("data-usr-name");
     //    var formdata = new FormData();
    //
     //    formdata.append("user_prf", usr_prf);
     //    formdata.append("csrf_test_name", csrf_value);
     //    var url = base_url+'profile/'+usr_name;
     //    var form = $('<form action="' + url + '" method="post">' +
     //      '<input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" />' +
     //      '<input type="hidden" name="usr_prf" value="' + usr_prf + '" />' +
     //      '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
     //      '</form>');
     //    $(boo).append(form);
     //    form.submit();
    // });
	var window_width = $( window ).width();

	if (window_width < 768) {
		$(".stickymenu").trigger("sticky_kit:detach");
	} else {
		make_sticky();
	}

	$( window ).resize(function() {

		window_width = $( window ).width();

		if (window_width < 768) {
			$(".stickymenu").trigger("sticky_kit:detach");
		} else {
			make_sticky();
		}

	});

	function make_sticky() {
		$(".stickymenu").stick_in_parent();
	}

	function convertToSlug(Text)
	{
		return Text
		.toLowerCase()
		.replace(/[^\w ]+/g,'')
		.replace(/ +/g,'-');
	}

	var id = $('#iaiduui').val();


});

$(document).on('click', '.deldraft', function() {
	var formData = new FormData();

	formData.append("book_id", $(this).attr("draft-id"));
    formData.append("csrf_test_name", csrf_value);

	swal({
		title: 'Hapus draft buku?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: base_url+'deldraft',
				type: 'POST',
				dataType: 'JSON',
				contentType: false,
				processData: false,
				data:formData,
				beforeSend: function () {
					swal({
						title: 'Menghapus Draft Book',
						onOpen: () => {
							swal.showLoading()
						}
					});
				}
			})
			.done(function(data) {
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
});

function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss");
}

function convertToSlug(d) {
	return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};
function validateProfile() {

}
function deleteBook(id_book) {
	var formData = new FormData();
	formData.append("book_id", id_book);
    formData.append("csrf_test_name", csrf_value);
	swal({
		title: 'Hapus Buku ?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			console.log(id_book);
			$.ajax({
				url: base_url+'delpublish',
				type: 'POST',
				dataType: 'JSON',
				contentType: false,
				processData: false,
				data:formData,
				beforeSend: function () {
					swal({
						title: 'Menghapus Buku',
						onOpen: () => {
							swal.showLoading()
						}
					});
				}
			})
			.done(function(data) {
				console.log(data);
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
}
function editBook(id_book, type) {
	swal.showLoading();
	if (type == 'pdf') {
    window.location = base_url+'upload_mypdf/'+id_book+'?stat=revision';
    }else if(type == 'epub') {
        window.location = base_url+'upload_myepub/'+id_book+'?stat=revision';
	}else{
    window.location = base_url+'my_book/'+id_book+'?stat=revision';
    }
}
function archiveBook(id_book) {
    var formData = new FormData();
    formData.append("book_id", id_book);
    formData.append("csrf_test_name", csrf_value);
    swal({
        title: 'Arsipkan Buku',
		text: 'Perhatian! Kamu akan memindahkan buku ini ke draft buku. Orang lain tidak akan bisa melihat buku ini kecuali kamu.\n' +
        'Kamu dapat mempublish ulang dengan mengakses buku ini di draft.',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Arsipkan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
        console.log(id_book);
        $.ajax({
            url: base_url+'arcpublish',
            type: 'POST',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            data:formData,
            beforeSend: function () {
                swal({
                    title: 'Loading...',
                    onOpen: () => {
                    swal.showLoading()
            }
            });
            }
        })
            .done(function(data) {
                console.log(data);
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
}
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
// LIKE BUTTON
$(document).on("click", ".like", function() {
    var e = $(this),
        a = new FormData,
        t = e.children(".txtlike");
    a.append("csrf_test_name", csrf_value);
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
});

  // UNLIKE BUTTON
$(document).on("click", ".unlike", function() {
    var e = $(this),
        a = new FormData,
        t = e.children(".txtunlike");
    a.append("csrf_test_name", csrf_value);
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
});
