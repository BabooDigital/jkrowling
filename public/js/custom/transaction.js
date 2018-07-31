$(document).ready(function() {
	transaction_counter();
	// popular_book();
	detail_transaction();
});

function transaction_counter() {
	$.ajax({
		url: base_url+'transaction_counter',
		type: 'POST',
		dataType: 'json',
        data: {csrf_test_name:csrf_value}
	})
	.done(function(data) {
		if (data == 0) {
			$('#transaction_counter')
			.css({ opacity: 0 })
			.text(data)
			.css({opacity: 1, display: 'none'  });
		}else{
			$('#transaction_counter')
			.css({ opacity: 0 })
			.text(data)
			.css({opacity: 1, display: 'block'  });
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

function cancel_transaction() {
    $('.cancel-trans').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        swal({
          title: 'Apa kamu yakin?',
          text: "Transaksi yang dibatalkan tidak akan bisa di lanjutkan.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Batalkan!',
          cancelButtonText: 'Tidak'
      }).then((result) => {
          if (result.value) {

            var orid = $(this).attr('data-cancel');
            $.ajax({
                url: base_url+'cancel_transaction',
                type: 'POST',
                dataType: 'JSON',
                data: {or_id:orid,csrf_test_name:csrf_value}
            })
            .done(function(data) {
                if (data.code == 200) {
                    swal(
                        'Berhasil',
                        'Transaksi ini berhasil dibatalkan.',
                        'success'
                        );
                    location.reload();
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
            });
        }
    })
  });
}