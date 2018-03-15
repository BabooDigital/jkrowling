function funcDropdown() {
    document.getElementById("myDropdown").classList.toggle("showss")
}
$(document).ready(function() {
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
			datas += "<div class='alert alert-success' role='alert'> <h4 class='alert-heading'>Aw Snap! Kamu belum publish buku :(</h4> <p>Ayo buat dan kreasikan buku mu semenarik mungkin, dan mulai dapatkan penghasilan di Baboo. Buku yang kamu publikasikan akan muncul disini :).</p> </div>";
		}else{
			var datas = "";
			$.each(data.data, function(i, item) {
				var cover;
				if (item.cover_url != null || item.cover_url != [] || item.cover_url != "") {
					cover = item.cover_url;
				} else if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
					cover = 'public/img/blank_cover.png';
				}
				datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'> <img class='d-flex align-self-start mr-10 float-left' src='"+cover+"' width='120' height='170' alt='"+item.title_book+"'> </a> <h5 class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></h5> <p class='catbook'><a href='#' class='mr-20'><span class='btn-no-fill'>FIKSI</span></a> <span class='mr-20'><img src='public/img/assets/icon_view.svg'> 11</span> <span><img src='public/img/assets/icon_share.svg'> 11</span></p> <p class='text-desc-in'>"+item.desc+" <a href='#' class='readmore'>Lanjut</a> </p> </div> </div> </div> </div><div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a class='fs-14px' href='#'><img class='mr-10' src='public/img/assets/icon_share.svg' width='23'> Bagikan</a> </div> <div> <a class='mr-30 fs-14px' href='javascript:void(0);' id='loveboo'><img class='mr-10' src='public/img/assets/icon_love.svg' width='27'> Suka</a> <a class='fs-14px' href='#' id='commentboo'><img class='mr-10' src='public/img/assets/icon_comment.svg' width='25'> Komentar</a> </div> </div> </div>"; 
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
		var datas = "";
		$.each(data, function(i, item) {
			var cover;
			if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
				cover = 'public/img/blank_cover.png';
			}else {
				cover = item.cover_url;
			}
			datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><img alt='"+item.title_book+"' class='d-flex align-self-start mr-10 float-left' height='170' src='"+cover+"' width='120'></a> <h5 class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></h5> <p class='catbook'><a class='mr-20' href='#'><span class='btn-no-fill'>FIKSI</span></a></p> <p class='text-desc-in'>"+item.desc+" <a class='readmore' href='#'>Lanjut</a></p> </div> </div> </div> </div> <div class='card-footer text-muted' style='font-weight: bold;padding: 20px 20px;'> <div class='pull-right'> <a href='#' class='arrowdraft'>Draft</a> </div> </div> </div>";
		}); 
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
		var datas = "";
		$.each(data, function(i, item) {
			var cover;
			if (item.cover_url != null || item.cover_url != [] || item.cover_url != "") {
				cover = item.cover_url;
			} else if (item.cover_url == null || item.cover_url == [] || item.cover_url == "") {
				cover = 'public/img/blank_cover.png';
			}
			datas += "<li class='list-group-item'> <div class='media'> <div class='media-left mr-10'> <a href='book/"+ item.id_book+"-"+convertToSlug(item.title_book) +"'><img class='media-object' src='"+ cover +"' width='60' height='80'></a> </div> <div class='media-body'> <div> <h4 class='media-heading bold mt-10'><a href='book/"+ item.id_book+"-"+convertToSlug(item.title_book) +"'>"+ item.title_book +"</a></h4> <p style='font-size: 10pt;'>by <a href='profile/"+item.author_id+"-"+convertToSlug(item.author_name)+"'>"+ item.author_name +"</a></p> </div> </div> </div> </li>";
		}); 
		$('.loader').hide();
		$("#latestreadbook").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

});

function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss");
}

function convertToSlug(d) {
	return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};
$(document).on("click", ".share-fb", function() {
    var aww = $(this);
    var e = new FormData,
        title = aww.parents('.card').find(".dbooktitle").val();
        t = +$("#sharecount").text() + 1,
        desc = aww.parents('.card').find(".ptexts").text() + ".. - Baca buku lebih lengkap disini | Baboo - Beyond Book & Creativity";
        coverimg = aww.parents('.card').find(".effect-img").attr("src"),
        authname = aww.parents('.card').find(".nametitle2").text(),
        links = aww.parents('.card').find(".segment").attr("data-href");
        
    FB.ui({
        method: "share_open_graph",
        action_type: "og.shares",
        action_properties: JSON.stringify({
            object: {
                "og:url": base_url + "book/" + convertToSlug(links) + "/preview",
                "og:title": title + " ~ By : " + authname + " | Baboo - Beyond Book & Creativity",
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