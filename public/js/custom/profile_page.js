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

	var id = $('#iaiduui').val();

	// PUBLISH BOOK
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
			datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='#'> <img class='d-flex align-self-start mr-10 float-left' src='"+item.cover_url+"' width='120' height='170' alt='"+item.title_book+"'> </a> <h5 class='card-title nametitle3'><a href='#'>"+item.title_book+"</a></h5> <p class='catbook'><a href='#' class='mr-20'><span class='btn-no-fill'>FIKSI</span></a> <span class='mr-20'><img src='public/img/assets/icon_view.svg'> 11</span> <span><img src='public/img/assets/icon_share.svg'> 11</span></p> <p class='text-desc-in'>"+item.desc+" <a href='#' class='readmore'>Lanjut</a> </p> </div> </div> </div> </div><div class='card-footer text-muted' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a class='fs-14px' href='#'><img class='mr-10' src='public/img/assets/icon_share.svg' width='23'> Bagikan</a> </div> <div> <a class='mr-30 fs-14px' href='javascript:void(0);' id='loveboo'><img class='mr-10' src='public/img/assets/icon_love.svg' width='27'> Suka</a> <a class='fs-14px' href='#' id='commentboo'><img class='mr-10' src='public/img/assets/icon_comment.svg' width='25'> Komentar</a> </div> </div> </div>"; 
		});
		$('.loader').hide();
		$("#publishdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

	// DRAFT BOOK
	// PUBLISH BOOK
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
			datas += "<div class='card mb-15'> <div class='card-body pt-20 pb-20 pl-30 pr-30'> <div class='row'> <div class='media w-100'> <div class='media-body'> <a href='#'><img alt='"+item.title_book+"' class='d-flex align-self-start mr-10 float-left' height='170' src='"+item.cover_url+"' width='120'></a> <h5 class='card-title nametitle3'><a href='#'>"+item.title_book+"</a></h5> <p class='catbook'><a class='mr-20' href='#'><span class='btn-no-fill'>FIKSI</span></a></p> <p class='text-desc-in'>"+item.desc+" <a class='readmore' href='#'>Lanjut</a></p> </div> </div> </div> </div> <div class='card-footer text-muted' style='font-weight: bold;padding: 20px 20px;'> <div class='pull-right'> <a href='#' class='arrowdraft'>Draft</a> </div> </div> </div>";
		}); 
		$('.loader').hide();
		$("#draftdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});

});

function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss");
}