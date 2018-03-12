$(document).ready(function() {
	getBestBook();
});
function getBestBook() {
	$.ajax({
	    url: base_url+'bestBook',
	    type: 'GET',
	    dataType: 'json',
	  })
	  .done(function(data) {
	    var best_book = '';
	    $.each(data, function(index, val) {
	      var cover;
	      if (val.popular_cover_url == null || val.popular_cover_url == '' || val.popular_cover_url == 'Kosong') {
	        cover = base_url+'public/img/icon-tab/empty-set.png';
	      }else{
	        cover = val.popular_cover_url;
	      }
	      best_book += '<div class="col-sm-6 col-md-4"> <div class="thumbnail"> <img alt="100%x200" src="'+cover+'" style="height: 200px; width: 100%; display: block;"> <div class="caption"> <h5 align="center">'+val.popular_author_name+'</h5> <p></p> <p></p> </div> </div> </div>';
	    });
	    $(".best_book_event").html(best_book);
	  })
	  .fail(function() {
	    console.log("error");
	  })
	  .always(function() {
	  });
}