$(document).ready(function() {
	transaction_counter();
});
function transaction_counter() {
	$.ajax({
		url: base_url+'transaction_counter',
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		var count_transaction = 0;
		console.log(data.length);
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