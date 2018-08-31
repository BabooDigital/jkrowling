$(document).ready(function() {
	$('.change-file-pdf').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('#pdf-contents').hide();
		$('.pdf-preview').show();
		$('#upload-button').show();
	});

	$('#post-prepdf').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
        var t = $('#judul_buku').val(),
            d = $('#isi_buku').val(),
            FD = new FormData(),
            bid = $('.pdf_file_nec').attr('pdf_book'),
            aww = $(this);

		if (d.length < 150) {
			swal(
				'Maaf!',
				'Deskripsi bukumu kurang dari 150 karakter.',
				'warning'
				);
		}else{
            if (bid !== null || bid !== ""){
                FD.append('id_book', $('.pdf_file_nec').attr('pdf_book'));
            }else{

            }
			FD.append('title_book', t);
			FD.append('desc_book', d);
			FD.append(csrf_name, csrf_value);
			$.ajax({
				url: base_url+'preUploadAct',
				type: 'POST',
				dataType: 'JSON',
				cache: false,
				contentType: false,
				processData: false,
				data: FD,
			})
			.done(function(data) {
				if (data.c == 200) {
					window.location = base_url+'yourpdf';
				}else{
					location.reload();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
		}

	});

	$('#post-draftprepdf').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
        var t = $('#judul_buku').val(),
            d = $('#isi_buku').val(),
            FD = new FormData(),
            bid = $('.pdf_file_nec').attr('pdf_book'),
            aww = $(this);

		if (d.length < 150) {
			swal(
				'Maaf!',
				'Deskripsi bukumu kurang dari 150 karakter.',
				'warning'
				);
		}else{
            if (bid !== null || bid !== ""){
                FD.append('id_book', $('.pdf_file_nec').attr('pdf_book'));
            }else{

            }
			FD.append('title_book', t);
			FD.append('desc_book', d);
			FD.append(csrf_name, csrf_value);
			$.ajax({
				url: base_url+'preUploadAct',
				type: 'POST',
				dataType: 'JSON',
				cache: false,
				contentType: false,
				processData: false,
				data: FD,
				beforeSend: function () {
                    swal.showLoading();
                }
			})
			.done(function(data) {
			if (data.c == 200){
                $('.swal2-container').css('display', 'none');
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                $('.pdf_file_nec').attr('pdf_book', data.d.book_id);
			}else{
				console.log(data);
			}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
		}

	});

    $('#post-uploadpdf').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var t = $('.pdf_file_nec').attr('pdf_book'),
            d = $("#file-to-upload")[0].files,
            p = $(".pdf_file_in").attr('pdf_url'),
            FD = new FormData(),
            aww = $(this);
        if (d.length === 1 || p !== "") {
            FD.append('pdf_file', d[0]);
            FD.append('id_book', t);
            FD.append(csrf_name, csrf_value);
            $.ajax({
                url: base_url+'uploadAct',
                type: 'POST',
                dataType: 'JSON',
                crossDomain: true,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: "multipart/form-data",
                data: FD,
                beforeSend: function () {
                    swal.showLoading()
                },
            })
                .done(function(data) {
                    console.log(data);
                    if (data.c == 403) {
                        window.location = base_url+'yourpdf';
                    }else{
                        window.location = base_url+'cover/'+t;
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                });
        }else{
            swal('File .PDF tidak boleh kosong');
        }
    });

    $('#post-uploaddraftpdf').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var t = $('.pdf_file_nec').attr('pdf_book'),
            d = $("#file-to-upload")[0].files,
            p = $(".pdf_file_in").attr('pdf_url'),
            FD = new FormData(),
            aww = $(this);
        if (d.length === 1 || p !== "") {
            FD.append('pdf_file', d[0]);
            FD.append('id_book', t);
            FD.append(csrf_name, csrf_value);
            $.ajax({
                url: base_url+'uploadAct',
                type: 'POST',
                dataType: 'JSON',
                crossDomain: true,
                cache: false,
                contentType: false,
                processData: false,
                mimeType: "multipart/form-data",
                data: FD,
                beforeSend: function () {
                    swal.showLoading()
                },
            })
                .done(function(data) {
                    if (data.c == 200){
                        $('.swal2-container').css('display', 'none');
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    }else{
                        console.log(data);
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                });
        }else{
            swal('File .PDF tidak boleh kosong');
        }
    });

	$('#post-prepdfedit').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var t = $('#judul_buku').val(),
		d = $('#isi_buku').val(),
		i = $(this).attr('data-id');
		FD = new FormData(),
		aww = $(this);

		if (d.length < 150) {
			swal(
				'Maaf!',
				'Deskripsi bukumu kurang dari 150 karakter.',
				'warning'
				);
		}else{
			FD.append('id_book', i);
			FD.append('title_book', t);
			FD.append('desc_book', d);
			FD.append(csrf_name, csrf_value);
			$.ajax({
				url: base_url+'preUploadAct',
				type: 'POST',
				dataType: 'JSON',
				cache: false,
				contentType: false,
				processData: false,
				data: FD,
			})
			.done(function(data) {
				if (data.c == 200) {
					window.location = base_url+'yourpdf';
				}else{
					location.reload();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
		}

	});
});

function checking_pdf() {
	var i = $('.pdf_file_nec').attr('pdf_book');
	FD = new FormData(),
	aww = $(this);

	FD.append('id_book', i);
	FD.append(csrf_name, csrf_value);
	$.ajax({
		url: base_url+'checkingPDF',
		type: 'POST',
		dataType: 'JSON',
		cache: false,
		contentType: false,
		processData: false,
		data: FD,
	})
	.done(function(data) {
		var url = data.d.url_book;
		if (data.c != 200) {
			window.location = base_url+'yourdraft';
		}else{
            $('.pdf_file_in').attr('pdf_url', url);
            // $('.pdf_file_nec').attr('pdf_url', url);
			if (data.d.url_book != "") {
				showPDF(url);
			}
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});
}
