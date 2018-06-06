$(document).ready(function() {
	
	// BackButton
	$(document).on('click', '.backlink', function() {
		swal({
			title: 'Anda ingin kembali?',
			text: "Buku yang anda buat akan masuk ke daftar draft.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Kembali'
		}).then((result) => {
			if (result.value) {
				window.location = base_url+"yourdraft";
			}
		})
	});

	// ListChapter Button
	$(document).on('click', '.listChapt', function() {
		$(this).find('.overlayOpt').toggle();
	});

	// Edit CHapter button Click
	$(document).on('click', '.editCh', function() {
		var formData = new FormData();

		formData.append("book_id", $("#book_id").val());
		formData.append("chapter", $(this).attr("chid"));

		$.ajax({
			url: base_url+'detaileditchapt',
			type: 'POST',
			dataType: 'JSON',
			contentType: false,
			processData: false,
			data:{formData, csrf_test_name: csrf_value},
		})
		.done(function(data) {
			$.each(data, function(i, item) {
				window.location = base_url+'chapter/'+item.chapter_id;
				// $('#chapter_title_out').val(item.chapter_title);
				// console.log(item.chapter_title);
				// $.each(item.paragraphs, function(i, desc) {
					// $('#paragraph_book').froalaEditor('html.set', desc.paragraph_text);
					// console.log(desc.paragraph_text);
				// });
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
		});
		
	});

	// Hapus CHapter button Click
	$(document).on('click', '.delCh', function() {
		var formData = new FormData();

		formData.append("chapter_id", $(this).attr("chid"));

		$.ajax({
			url: base_url+'delchapter',
			type: 'POST',
			dataType: 'JSON',
			contentType: false,
			processData: false,
			data:{formData, csrf_test_name: csrf_value},
			beforeSend: function () {
				swal({
					title: 'Menghapus Chapter',
					onOpen: () => {
						swal.showLoading()
					}
				});
			}
		})
		.done(function(data) {
			if (data.code == 200) {
				swal.hideLoading()
				location.reload();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
		});
		
	});

});


