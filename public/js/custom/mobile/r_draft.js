$(document).ready(function() {
	$(document).on('click', '.deldraft', function() {
		var formData = new FormData();

		formData.append("book_id", $(this).attr("draft-id"));

		swal({
			title: 'Hapus draft buku?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url+'deldraft',
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
					console.log(data);
					// if (data.code == 200) {
						swal.hideLoading()
						location.reload();
					// }
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