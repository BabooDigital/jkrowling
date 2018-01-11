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
	        .replace(/ +/g,'-')
	        ;
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
		var datas = "";
		$.each(data, function(i, item) {
			var cover;
	        if (item.cover_url != "Kosong") {
	          cover = item.cover_url;
	        } else if (item.cover_url == "Kosong") {
	          cover = 'public/img/profile/blank-photo.jpg';
	        }
			datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'> <img class='d-flex align-self-start mr-10 float-left' src='"+cover+"' width='120' height='170' alt='"+item.title_book+"'> </a> <h5 class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></h5> <p class='catbook'><a href='#' class='mr-20'><span class='btn-no-fill'>FIKSI</span></a> <span class='mr-20'><img src='public/img/assets/icon_view.svg'> 11</span> <span><img src='public/img/assets/icon_share.svg'> 11</span></p> <p class='text-desc-in'>"+item.desc+" <a href='#' class='readmore'>Lanjut</a> </p> </div> </div> </div> </div><div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a class='fs-14px' href='#'><img class='mr-10' src='public/img/assets/icon_share.svg' width='23'> Bagikan</a> </div> <div> <a class='mr-30 fs-14px' href='javascript:void(0);' id='loveboo'><img class='mr-10' src='public/img/assets/icon_love.svg' width='27'> Suka</a> <a class='fs-14px' href='#' id='commentboo'><img class='mr-10' src='public/img/assets/icon_comment.svg' width='25'> Komentar</a> </div> </div> </div>"; 
		});
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
	        if (item.cover_url != "Kosong") {
	          cover = item.cover_url;
	        } else if (item.cover_url == "Kosong") {
	          cover = 'public/img/profile/blank-photo.jpg';
	        }
			datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><img alt='"+item.title_book+"' class='d-flex align-self-start mr-10 float-left' height='170' src='"+cover+"' width='120'></a> <h5 class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></h5> <p class='catbook'><a class='mr-20' href='#'><span class='btn-no-fill'>FIKSI</span></a></p> <p class='text-desc-in'>"+item.desc+" <a class='readmore' href='#'>Lanjut</a></p> </div> </div> </div> </div> <div class='card-footer text-muted' style='font-weight: bold;padding: 20px 20px;'> <div class='pull-right'> <a href='#' class='arrowdraft'>Draft</a> </div> </div> </div>";
		}); 
		$('.loader').hide();
		$("#draftdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

	// PUBLISH BOOK MOBILE RESPONSIVE
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
		var datas = "";
		$.each(data, function(i, item) {
			desc = item.desc;
			var cover;
	        if (item.cover_url != "Kosong") {
	          cover = item.cover_url;
	        } else if (item.cover_url == "Kosong") {
	          cover = 'public/img/profile/blank-photo.jpg';
	        }
			datas += "<div class='card p-10 mb-20'> <div class='media'> <img class='d-flex align-self-start mr-20 ml-15 rounded-circle'src='"+ item.author_avatar +"' width='50' height='50' alt='"+ item.author_name +"'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'>"+ item.author_name +"</h5> <p class='text-muted' style='margin-top:-10px;'> <small><span>Jakarta, Indonesia</span> <span class='ml-10'>1 hours ago</span></small> </p> <div class='pull-right'> <img src='public/img/assets/icon_love.svg' style='position: absolute;top: 10px;right: 25px;'> </div> </div> </div> <div class='card-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"''><img src='"+cover+"' class='img-fluid mb-15' style='width: 100%;height: 200px;'></a> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"''><h4 style='font-weight: 500;'><b>"+item.title_book+"</b></h4></a> <p class='catbook mb-10 mt-15'><a class='mr-20' href='#'><span class='btn-no-fill'>FIKSI</span></a> <span class='mr-20'><img src='public/img/assets/icon_view.svg'> "+ item.view_count +"</span> <span><img src='public/img/assets/icon_share.svg'> "+ item.share_count +"</span></p> <p class='text-desc-in'> "+ desc.substr(0, 100) +" </p> </div> <div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a href='#'><img class='mr-10 fs-14px' src='public/img/assets/icon_share.svg' width='27'></a> </div> <div> <a class='mr-30 fs-14px' href='#'><img class='mr-10' src='public/img/assets/icon_love.svg' width='27'></a> <a href='#'><img class='mr-10 fs-14px' src='public/img/assets/icon_comment.svg' width='25'></a> </div> </div> </div>"; 
		});
		$('.loader').hide();
		$("#r_publishdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

	// DRAFT BOOK MOBILE RESPONSIVE
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
			desc = item.desc;
			var cover;
	        if (item.cover_url != "Kosong") {
	          cover = item.cover_url;
	        } else if (item.cover_url == "Kosong") {
	          cover = 'public/img/profile/blank-photo.jpg';
	        }
			datas += "<div class='card p-10 mb-20'> <div class='card-header'> <span><img src='public/img/assets/icon_clock.svg' width='20'> Sekarang</span> <span class='float-right' style='color: red;'>Draft</span> </div> <div class='card-body'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'> <img alt='asd' class='d-flex align-self-start mr-10 float-left' src='"+ cover +"' width='120' height='170'> </a> <h4 class='card-title nametitle3'><a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'>"+item.title_book+"</a></h4> <p class='catbook mb-10'><a class='mr-10' href='#'><span class='btn-no-fill'>FIKSI</span></a> <a class='mr-10' href='#'><span class='btn-no-fill'>BIOGRAFI</span></a></p> <p class='text-desc-in'> "+ desc.substr(0, 220) +" </p> </div> <div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right mt-10'> <a class='mr-10 fs-14px' href='#' style='border:  1px #333 solid;border-radius:  40px;padding: 10px 25px;'><img src='public/img/assets/icon_pen.svg' width='23'> Edit</a> <a href='#' style='border: 1px #7554bd solid;border-radius: 40px;padding: 10px 20px;color: #7554bd; '><img class='mr-10 fs-14px' src='public/img/assets/icon_publish.svg' width='20'> Publish</a> </div> <div> <a href='#'><img src='public/img/icon-tab/dustbin.svg' width='27'></a> </div> </div> </div>";
		}); 
		$('.loader').hide();
		$("#r_draftdata").html(datas);
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
	        if (item.cover_url != "Kosong") {
	          cover = item.cover_url;
	        } else if (item.cover_url == "Kosong") {
	          cover = 'public/img/profile/blank-photo.jpg';
	        }
			datas += "<li class='list-group-item'> <div class='media'> <div class='media-left mr-10'> <a href='book/"+ item.id_book+"-"+convertToSlug(item.title_book) +"'><img class='media-object' src='"+ cover +"' width='60' height='80'></a> </div> <div class='media-body'> <div> <h4 class='media-heading bold mt-10'><a href='book/"+ item.id_book+"-"+convertToSlug(item.title_book) +"'>"+ item.title_book +"</a></h4> <p style='font-size: 10pt;'>by <a href='#'>"+ item.author +"</a></p> </div> </div> </div> </li>";
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