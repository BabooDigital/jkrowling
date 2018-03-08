$(document).ready(function() {

	var id = $('#iaiduui').val();

	function convertToSlug(Text) {
	  return Text
	    .toLowerCase()
	    .replace(/[^\w ]+/g, '')
	    .replace(/ +/g, '-');
	}
	
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
			$(".loader").show();
		}
	}).done(function(data) {
		if (data.code != 200) {
			datas = "<div class='alert alert-success' role='alert'> <h4 class='alert-heading'>Aw Snap! Kamu belum publish buku :(</h4> <p>Ayo buat dan kreasikan buku mu semenarik mungkin, dan mulai dapatkan penghasilan di Baboo. Buku yang kamu publikasikan akan muncul disini :).</p> </div>";
		}else {
			var datas = "";
			$.each(data.data, function(i, item) {
				desc = item.desc;
				var cover;
		        if (item.cover_url != "" || item.cover_url == " ") {
		          cover = item.cover_url;
		        } else if (item.cover_url == "") {
		          cover = 'public/img/profile/blank-photo.jpg';
		        }
				datas += "<div class='card mb-15 p-0'> <div class='card-body p-0 pl-30 pr-30 pt-15'> <div class='row mb-10 pl-15 pr-15'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ item.author_avatar +"' width='50' height='50' alt='"+ item.author_name +"'> <div class='media-body mt-5'> <h5 class='card-title nametitle2'><a href='javascript:void(0);'>"+ item.author_name +"</a></h5> <p class='text-muted' style='margin-top:-10px;'><small><span>Jakarta, Indonesia</span> <span class='ml-10'>"+ item.publish_date +"</span></small></p> </div> </div> </div> <div class='media'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><img alt='"+item.title_book+"' src='"+cover+"' class='w-100 imgcover'></a> </div> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><h5 class='pt-20 w-100' style='font-weight: 700;'><b>"+item.title_book+"</b></h5></a> <div class='w-100'> <span class='mr-8' style='font-size: 12px;'>"+item.category+" &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca "+ item.view_count +" kali</span> <p class='mt-10'>"+ desc.substr(0, 100)+'...' +"</p> </div> </div> <div class='bg-white card-footer text-muted pr-30 pl-30' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <a href='#'><img src='public/img/assets/icon_share.svg' width='23'></a> </div> <div> <a data-id='"+ item.book_id+"' href='javascript:void(0);' id='loveboo"+ item.book_id+"'><img src='public/img/assets/icon_love.svg' class='mr-20 loveicon' width='27'></a> <a href='javascript:void(0);'><img src='public/img/assets/icon_comment.svg' class='mr-10' width='25'></a> </div> </div> </div>"; 
			});
		}
			$(".loader").hide();
			$("#r_publishdata").html(datas);
	}).fail(function() {
		console.log("error");
	}).always(function() {
	});


	$('#confEdit').on('click', function() {
		var formData = new FormData();

		formData.append('fullname', $('#yourName').val());
		formData.append('date_of_birth', $('#yourBirth').val());
		formData.append('location', $('#yourLoc').val());
		formData.append('about_me', $('#yourBio').val());

		$.ajax({
			url: 'edit_profile',
			type: 'POST',
			dataType: 'JSON)',
			cache: false,
		    contentType: false,
		    processData: false,
			data: formData,
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

});