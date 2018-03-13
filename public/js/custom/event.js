$(document).ready(function() {
	getBestBook();
	followEvent();
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
	      if (val.popular_cover_url == null || val.popular_cover_url == '' || val.popular_cover_url == 'Kosong') {
	        cover = base_url+'public/img/icon-tab/empty-set.png';
	      }else{
	        cover = val.popular_cover_url;
	      }
	      best_book += '<div class="col-sm-5 col-md-3"> <div class="thumbnail"> <img alt="100%x200" src="'+cover+'" style="height: 250px; width: 100%; display: block;border-radius:10px;box-shadow: 0px 2px 3px #818181;"> <div class="caption"> <h5><b>'+val.popular_book_title+'</b></h5> <h6>'+val.popular_author_name+'</h6> <p></p> <p></p> </div> </div> </div>';
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