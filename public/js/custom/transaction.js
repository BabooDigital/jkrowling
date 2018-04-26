$(document).ready(function() {
	transaction_counter();
	popular_book();
	detail_transaction();
});
function popular_book() {
    $.ajax({
        url: base_url + "bestBookLib",
        type: "GET",
        dataType: "json"
    }).done(function(e) {
    	e.slice(2);
	    // console.log(e.length);
    	var a = "";
    	$.each(e, function(e, t) {
            var o;
            o = null == t.popular_cover_url || "" == t.popular_cover_url || "Kosong" == t.popular_cover_url ? base_url + "public/img/blank_cover.png" : t.popular_cover_url, a += '<a><li class="list-group-item"> <div class="media"> <div class="media-left mr-10"> <a href="#"><img class="media-object" src="' + o + '" width="60" height="80"></a> </div> <div class="media-body"> <div> <h4 class="media-heading bold mt-10"><a href="book/' + t.popular_book_id + "-" + convertToSlug(t.popular_book_title) + '">' + t.popular_book_title + '</a></h4> <p style="font-size: 10pt;">by <a class="profile" data-usr-prf="'+t.popular_author_id+'" data-usr-name="'+convertToSlug(t.popular_author_name)+'" id="' + t.popular_author_id + '" href="' + base_url + "profile/" + convertToSlug(t.popular_author_name) + '">' + t.popular_author_name + "</a></p> </div> </div> </div> </li>"
        }),
   		$("#best_book_library").html(a)
    }).fail(function() {
        console.log("error")
    }).always(function() {});
}
function transaction_counter() {
	$.ajax({
		url: base_url+'transaction_counter',
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		var count_transaction = 0;
		$.each(data, function(index, val) {
			count_transaction++;
		});
		if (count_transaction == 0) {
			$('#transaction_counter')
			.css({ opacity: 0 })
			.text(count_transaction)
			.css({opacity: 1, display: 'none'  });

			$('#transaction_box_counter')
			.text(count_transaction);
		}else{
			$('#transaction_counter')
			.css({ opacity: 0 })
			.text(count_transaction)
			.css({opacity: 1, display: 'block'  });

			$('#transaction_box_counter')
			.text(count_transaction);
		}
	})
	.fail(function() {
    
    })
	.always(function() {
	});
}
function detail_transaction() {
    $(".btn_detail_transaction").on("click", function(e) {
        var id = $(this).attr('data-id');
        
        $.ajax({
        	url: base_url+'detail_transaction',
        	type: 'POST',
        	dataType: 'json',
        	data: {transaction_id: id},
        })
        .done(function(data) {
        	var html = '';
        	$.each(data, function(index, val) {
        		html = '<object data="'+val.pdf_url+'" type="application/pdf" width="100%" height="100%"> <iframe src="'+val.pdf_url+'" width="100%" height="100%" style="border: none;"> </iframe> </object>';
        	});
        	$(".pdf_url").html(html);
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
        
    });
}