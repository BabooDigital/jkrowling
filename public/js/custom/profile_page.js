function funcDropdown() {
    document.getElementById("myDropdown").classList.toggle("showss")
}
$(document).ready(function() {
	// validateProfile();
	$("#profile-edit").validate({
		rules: {
			fullname: {
				required: true
			},
			dateofbirth: {
				required: true
			},
			address : {
				required: true
			}
		},
		messages: {
			fullname: {
				required: 'Nama Lengkap harus di isi'
			},
			dateofbirth: {
				required: 'Tanggal Harus Diisi'
			},
			address: {
				required: 'Alamat Harus di isi'
			}
		},
		submitHandler: function(form) {
        $.ajax({
            url: base_url+'edit_profile',
            type: 'POST',
            data: $(form).serialize(),
            success: function(response) {
     //        	if (response.code == 200) {
				  $('#alert_success').show('slow/400/fast', function() {
        			setTimeout(function() {
						$('#edit-profile').modal('hide');
					}, 300);
				  });
            	// }
     			// console.log(response);
            	// location.href = base_url+'';
            }            
        });
    }
	});
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

	// PUBLISH BOOK DESKTOP
	$.ajax({
		url: base_url + 'getpublishbook',
		type: 'POST',
		dataType: 'json',
		data: {
			user_id: id
		},
		beforeSend: function()
		{
			$('.loader').show();
		}
	}).done(function(data) {
		if (data.code != 200) {
			var datas = "";
			datas += "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='public/img/icon_draft_blank.png' width='190'> </div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Belum ada buku yg kamu publish</p></div> </div> </div> </div> ";
		}else{
			var datas = "";
			$.each(data.data, function(i, item) {
				var cover;
				if (item.cover_url != null || item.cover_url != [] || item.cover_url != "") {
					cover = item.cover_url;
				} else if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
					cover = 'public/img/blank_cover.png';
				}
				datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'> <img class='d-flex align-self-start mr-10 float-left' src='"+cover+"' width='120' height='170' alt='"+item.title_book+"'> </a> <span class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></span> <div class='dropdown float-right'><button class='btn btn-transparent dropdown-toggle float-right' type='button' data-toggle='dropdown'><span class='float-right'><img src='"+base_url+"/public/img/assets/caret.svg'></span></button><ul class='dropdown-menu dropdown-menu-right'> <li class='drpdwn-caret'><a href='javascript:void(0);' onclick='editBook("+item.book_id+")'>Edit Buku</a></li> <li class='drpdwn-caret'><a href='javascript:void(0);' onclick='deleteBook("+item.book_id+")'>Hapus Buku</a></li></ul></div><br><br><p class='catbook'><a href='#' class='mr-20'><span class='btn-no-fill'>FIKSI</span></a> <span class='mr-20'><img src='public/img/assets/icon_view.svg'> "+item.view_count+"</span> <span><img src='public/img/assets/icon_share.svg'> "+item.share_count+"</span></p> <p class='text-desc-in'>"+item.desc+" <a href='#' class='readmore'>Lanjut</a> </p> </div> </div> </div> </div><div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a class='fs-14px' href='#'><img class='mr-10' src='public/img/assets/icon_share.svg' width='23'> Bagikan</a> </div> <div> <a class='mr-30 fs-14px' href='javascript:void(0);' id='loveboo'><img class='mr-10' src='public/img/assets/icon_love.svg' width='27'> Suka</a> <a class='fs-14px' href='#' id='commentboo'><img class='mr-10' src='public/img/assets/icon_comment.svg' width='25'> Komentar</a> </div> </div> </div>"; 
			});
		}
		$('.loader').hide();
		$("#publishdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

	// DRAFT BOOK DESKTOP
	$.ajax({
		url: base_url + 'getdraftbook',
		type: 'POST',
		dataType: 'json',
		data: {
			user_id: id
		},
		beforeSend: function()
		{
			$('.loader').show();
		}
	}).done(function(data) {
		// console.log(data);
		if (data.length != 0) {
			var datas = "";
			$.each(data, function(i, item) {
				var cover;
				if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
					cover = 'public/img/blank_cover.png';
				}else {
					cover = item.cover_url;
				}
				datas += "<div class='card mb-20'> <div class='card-header bg-white'> <span><img src='public/img/assets/icon_clock.svg' width='20'> "+item.latest_update+"</span> <span class='float-right' style='color: red;'>Draft</span> </div> <div class='card-body'> <img alt='"+item.category+"' class='d-flex align-self-start mr-10 float-left' height='170' src='"+cover+"' width='120'> <h4 class='card-title nametitle3'><span class='titlebooks'>"+item.title_book+"</span></h4> <p class='catbook mb-10'><span class='btn-no-fill'>"+item.category+"</span></p> <p class='text-desc-in'>"+item.desc+"</p> </div> <div class='card-footer text-muted bg-white' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right' style='margin-top: 3px;'> <a class='mr-10 fs-14px mb-5' href='"+base_url+"my_book/"+item.book_id+"' style='border: 1px #333 solid;border-radius: 40px;padding: 8px 25px;'><img src='public/img/assets/icon_pen.svg' width='23'> Edit</a> </div> <div> <button type='button' class='clear-btn deldraft' draft-id='"+item.book_id+"'><img src='public/img/icon-tab/dustbin.svg' width='20'></button> </div> </div> </div>";
			}); 
		}else {
			var datas = "";
			datas += "<div class='container first_login mt-30' style='height:100vh;'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='public/img/icon_draft_blank.png' width='190'> </div> <div class='text-center'> <h4><b>Belum ada draft buku yang kamu tulis</b></h4> </div> </div> </div> </div>" ;
		}
		$('.loader').hide();
		$("#draftdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});
	

	// LATEST READ BOOK
	$.ajax({
		url: base_url + 'getlatestread',
		type: 'POST',
		dataType: 'json',
		data: {
			user_id: id
		},
		beforeSend: function()
		{
			$('.loader').show();
		}
	}).done(function(data) {
		if (data != 0) {
			var datas = "";
			$.each(data, function(i, item) {
				var cover;
				if (item.cover_url != null || item.cover_url != [] || item.cover_url != "") {
					cover = item.cover_url;
				} else if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
					cover = 'public/img/blank_cover.png';
				}
				// console.log(item);
				datas += "<li class='list-group-item'> <div class='media'> <div class='media-left mr-10'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><img class='media-object' src='"+ cover +"' width='60' height='80'></a> </div> <div class='media-body'> <div> <h4 class='media-heading bold mt-10'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+ item.title_book +"</a></h4> <p style='font-size: 10pt;'>by <a href='profile/"+item.author_id+"-"+convertToSlug(item.author_name)+"'>"+ item.author_name +"</a></p> </div> </div> </div> </li>";
			});
		}else {
			var datas = "";
			datas += "<p class='text-center'>Belum membaca buku manapun</p>";
		}
		$('.loader').hide();
		$("#latestreadbook").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

});

$(document).on('click', '.deldraft', function() {
	var formData = new FormData();

	formData.append("book_id", $(this).attr("draft-id"));

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
function editBook(id_book) {
	swal.showLoading();
	window.location.href = base_url+'my_book/'+id_book;
}
$(document).on("click", ".share-fb", function() {
    var aww = $(this);
    var e = new FormData,
        title = aww.parents('.card').find(".dbooktitle").val();
        t = +$("#sharecount").text() + 1,
        desc = aww.parents('.card').find(".ptexts").text();
        coverimg = aww.parents('.card').find(".effect-img").attr("src"),
        authname = aww.parents('.card').find(".nametitle2").text(),
        links = aww.parents('.card').find(".segment").attr("data-href");
        
    FB.ui({
        method: "share_open_graph",
        action_type: "og.shares",
        action_properties: JSON.stringify({
            object: {
                "og:url": base_url + "book/" + convertToSlug(links) + "/preview",
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