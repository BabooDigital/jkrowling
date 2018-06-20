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
        $('#r_publishdata').append("<div class='mb-30 text-center'>Tidak ada buku lagi, ayo buat lebih banyak buku!</div>");
        return;

      };
      $('.loader').hide();
      $("#r_publishdata").append(data);
      loaded = true;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      console.log('server not responding...');
      loaded = true;
      location.reload();
    });
  }

	var id = $('#iaiduui').val();

	// LIKE BUTTON
  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();
    var txt = + aww.parents(".card").find(".like_countys").text() + 1;
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
          aww.parents(".card").find(".like_countys").text(txt);
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
            aww.parents(".card").find(".share_countys").text(txt);
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
              title: 'Menghapus Buku mu..',
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

  $(document).on('click', '.editbook', function() {
    swal({
      title: 'Mohon tunggu...',
      onOpen: () => {
        swal.showLoading()
      }
    });
    var bid = $(this).attr("dataedit");
    window.location = base_url+'listchapter/'+bid+'?stat=revision';
  });

});