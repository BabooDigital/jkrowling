$(document).ready(function() {
	getBestBook();
	followEvent();
	validateEvent();
});
function getBestBook() {
	$.ajax({
	    url: base_url+event,
	    type: 'GET',
	    dataType: 'json',
	  })
	  .done(function(data) {
	    var best_book = '';
	    console.log
	    $.each(data, function(index, val) {
	      var cover;
	      var title;
	      var txt = val.popular_book_title;
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
        	window.location = $(this).attr('href');;
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