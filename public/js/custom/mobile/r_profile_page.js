$(document).ready(function() {

	var id = $('#iaiduui').val();

	// LIKE BUTTON
  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();

    aww.children('.loveicon').attr("src", base_url+"public/img/assets/love_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
    $.ajax({
      url: base_url + 'like',
      type: 'POST',
      dataType: 'JSON',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
    })
    .done(function(data) {
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", base_url+"public/img/assets/icon_love.svg");
        } else {
          aww.removeClass('like');
          aww.addClass('unlike');
          aww.children('.loveicon').attr("src", base_url+"public/img/assets/love_active.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

  // UNLIKE BUTTON
  $(document).on('click', '.unlike', function() {

    var aww = $(this);
    var formData = new FormData();
    var txt = + aww.parents(".card").find(".like_countys").text() - 1;

    aww.children('.loveicon').attr("src", base_url+"public/img/assets/icon_love.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
    $.ajax({
      url: base_url + 'like',
      type: 'POST',
      dataType: 'JSON',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
        // beforeSend: function() {
        // }
      })
    .done(function(data) {
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", base_url+"public/img/assets/love_active.svg");
        } else {
          aww.removeClass('unlike');
          aww.addClass('like');
          aww.parents(".card").find(".like_countys").text(txt);
          aww.children('.txtlike').text('Suka');
          aww.children('.loveicon').attr("src", base_url+"public/img/assets/icon_love.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

	$(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = aww.parents(".card").find(".dbooktitle").text();
    var txt = + aww.parents(".card").find(".share_countys").text() + 1;
    var desc = aww.parents(".card").find(".textp").attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo.id';
    var img = aww.parents(".card").find('.cover_image').attr('src');
    var auname = aww.parents(".card").find('.author_name').text();
    var segment = aww.parents(".card").find('.segment').attr('data-href');

    FB.ui({
      method     : 'share_open_graph',
      action_type: 'og.shares',
      action_properties: JSON.stringify({
        object: {
          'og:url': base_url + 'book/' + segment + '/preview',
          'og:title': blink + ' ~ By : ' + auname + ' | Baboo.id',
          'og:description': desc,
          'og:image': img
        }
      })
    },
      // callback
      function(response) {
        if (response && !response.error_message) {

          formData.append("user_id", $("#iaiduui").val());
          formData.append("book_id", aww.attr('data-share'));

          $.ajax({
            url: base_url + 'shares',
            type: 'POST',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
              // beforeSend: function() {
              // }
            })
          .done(function(data) {
              // $('.loader').hide();
              // console.log("ke share");
            })
          .fail(function() {
            console.log("Failure");
          })
          .always(function() {

          });
        } else {
          console.log("Batal Share");
        }
      });
  });

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
			datas = "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='"+base_url+"public/img/icon_draft_blank.png' width='190'> </div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Belum ada buku yg kamu publish</p></div> </div> </div> </div> ";
		}else {
			var datas = "";
			$.each(data.data, function(i, item) {
				desc = item.desc;
				var cover;
		        if (item.image_url != "" || item.image_url == null) {
		          cover = item.image_url;
		        } else if (item.image_url == "") {
		          if (item.cover_url) {
		          	cover = item.cover_url;
		          }else{
		          	cover = base_url+'public/img/profile/blank-photo.jpg';
		          }
		        }
				var profpict;
		        if (item.author_avatar != "" || item.author_avatar == null) {
		          profpict = item.author_avatar;
		        } else {
		          profpict = base_url+'public/img/profile/blank-photo.jpg';
		        }
		        var like;
		        var likeimg;
		        if (item.is_like == true) {
		        	like = 'unlike';
		        	likeimg = base_url+'public/img/assets/icon_love.svg';
		        }else {
		        	like = 'like';
		        	likeimg = base_url+'public/img/assets/love_active.svg';
		        }
				datas += "<div class='card mb-15 p-0'> <div class='card-body p-0 pl-30 pr-30 pt-15'> <div class='row mb-10 pl-15 pr-15'> <div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ profpict +"' width='50' height='50' alt='"+ item.author_name +"'> <div class='media-body mt-5'> <h5 class='card-title nametitle2 author_name'><a href='javascript:void(0);'>"+ item.author_name +"</a></h5> <p class='text-muted' style='margin-top:-10px;'><small> <span>"+ item.publish_date +"</span></small></p> </div> </div><div class='dropdown right-posi'> <button class='btn-clear' type='button' id='dropEditBook' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='font-size:17pt;'>&#8226;&#8226;&#8226;</button> <div class='dropdown-menu' aria-labelledby='dropEditBook'> <a class='dropdown-item editbook' href='javascript:void(0);' dataedit='"+ item.book_id+"'><img src='"+base_url+"public/img/assets/icon_pen.svg' > Edit Buku</a><hr style='margin-top: 10px !important;margin-bottom: 10px !important;'> <a class='dropdown-item delbook' href='javascript:void(0);' datadel='"+ item.book_id+"'><img src='"+base_url+"public/img/icon-tab/dustbin.svg' > Hapus Buku</a> </div> </div> </div> <div class='media'> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"'><img alt='"+item.title_book+"' src='"+cover+"' class='w-100 imgcover cover_image'></a> </div> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"' class='segment' data-href='"+ item.book_id+"'><h5 class='pt-20 w-100' style='font-weight: 700;'><b class='dbooktitle'>"+item.title_book+"</b></h5></a> <div class='w-100'> <span class='mr-8' style='font-size: 12px;'>"+item.category+" &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca "+ item.view_count +" kali</span> <p class='mt-10 textp' data-text='"+ desc.substr(0, 100)+'...' +"'>"+ desc.substr(0, 100)+'...' +"</p> </div> </div> <div class='bg-white card-footer text-muted pr-30 pl-30' style='font-size: 0.8em;font-weight: bold;'> <div class='pull-right'> <div class='dropdown'> <button class='share-btn dropbtn' type='button' id='dropShare' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <img src='"+base_url+"public/img/assets/icon_share.svg' width='23'> </button> <div class='dropdown-menu' aria-labelledby='dropShare'> <a class='dropdown-item share-fb' href='javascript:void(0);' data-share='"+ item.book_id+"'><img src='"+base_url+"public/img/assets/fb-icon.svg' width='20'> Facebook</a> </div> </div> </div> <div> <a data-id='"+ item.book_id+"' href='javascript:void(0);' class='"+like+"' id='loveboo"+ item.book_id+"'><img src='"+likeimg+"' class='mr-20 loveicon' width='27'></a> <a href='book/"+ item.book_id+"-"+convertToSlug(item.title_book) +"#comments'><img src='"+base_url+"public/img/assets/icon_comment.svg' class='mr-10' width='25'></a> </div> </div> </div>"; 
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
		formData.append('address', $('#yourLoc').val());
		formData.append('about_me', $('#yourBio').val());

		$.ajax({
			url: 'edit_profile',
			type: 'POST',
			dataType: 'JSON',
			cache: false,
		    contentType: false,
		    processData: false,
			data: formData,
		})
		.done(function(data) {
			if (data.code == 200) {
				window.location = base_url+'profile';
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

  $(document).on('click', '.delbook', function() {
    var formData = new FormData();

    formData.append("book_id", $(this).attr("datadel"));

    swal({
      title: 'Hapus buku mu yang telah diterbitkan?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',  
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url+'delpublish',
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
          if (data.code == 200) {
            location.reload();
            swal.hideLoading();
          }
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

});