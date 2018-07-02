var url_redirect = '';

$(function() {
	$.FroalaEditor.DefineIcon('imageInfo', { NAME: 'info' });
	$.FroalaEditor.RegisterCommand('imageInfo', {
		title: 'Info',
		focus: false,
		undo: false,
		refreshAfterCallback: false,
		callback: function() {
			var $img = this.image.get();
			alert($img.attr('src'));
		}
	});

	var as = $("#book_id").val();
	var bs = $("#title_book").val();
	var cs = $("#title_chapter").val();
	$('#book_paragraph').froalaEditor({
		imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove'],
		useClasses: false,
		pastePlain: true,
		height: 400
	});
});
function tampilkanPreview(gambar, idpreview) {
// membuat objek gambar
var gb = gambar.files;
	// loop untuk merender gambar
	for (var i = 0; i < gb.length; i++) {
		// bikin variabel
		var gbPreview = gb[i];
		var imageType = /image.*/;
		var preview = document.getElementById(idpreview);
		var reader = new FileReader();

		if (gbPreview.type.match(imageType)) {
			// jika tipe data sesuai
			preview.file = gbPreview;
			reader.onload = (function(element) {
				return function(e) {
					element.src = e.target.result;
				};
			})(preview);

			// membaca data URL gambar
			reader.readAsDataURL(gbPreview);
		} else {
			// jika tipe data tidak sesuai
			alert("Type file tidak sesuai. Khusus image.");
		}

	}
}
function getContent(tab_page, book, chapter) {
	$.ajax({
		url: tab_page,
		type: 'POST',
		cache: false,
		data: { book_id: book, chapter_id: chapter, csrf_test_name: csrf_value },
		success: function(data) {
			HoldOn.close();
			$(".loader").hide();
			$("#pageContent").html(data);
		}
	})

}
$(document).ready(function() {
	getCategory();
	getChapter();
	addMinusPlus();
	$('.backbtn').on('click', function() {
		window.history.go(-1);
	});

	$("#file_cover").change(function() {
		var a = new FormData();
		a.append("file_cover", $("#file_cover")[0].files[0]);
		a.append("book_id", $("#uri").val());
		a.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "post_cover",
			type: "POST",
			dataType: 'json',
			contentType: false,
			processData: false,
			data: a
		}).done(function(data) {
			$("#cover_name").val(data.link);
		}).fail(function() {
			console.log("error");
		}).always(function() {})
	});

	var window_width = $(window).width();

	if (window_width < 768) {
		$(".stickymenu").trigger("sticky_kit:detach");
	} else {
		make_sticky();
	}

	$(window).resize(function() {

		window_width = $(window).width();

		if (window_width < 768) {
			$(".stickymenu").trigger("sticky_kit:detach");
		} else {
			make_sticky();
		}

	});

	function make_sticky() {
		$(".stickymenu").stick_in_parent();
	}

	
	function showSpinner() {
		var options = {
			theme:"sk-cube-grid",
			message:'Tunggu Sebentar ',
			backgroundColor:"white",
			textColor:"#7554bd" 
		};
		HoldOn.open(options);
	}
	var count = 0;
	$(document).on('click', '.addsubchapt', function() {
		HoldOn.open({
			theme: 'sk-bounce',
			message: "Loading."
		});
		// console.log("Awali semua dengan Bismillah dan akhiri dengan Alhamdulillah");
		// var editorText = CKEDITOR.instances.book_paragraph.getData();
		var title_book = $("#title_book").val();
		var chapter_title = $("#title_chapter").val();

		if (title_book == null) {
			if (chapter_title.length == 0 || chapter_title.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				var aww = $(this);
				var formData = new FormData();
				count++;
				$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');
				// console.log($('#file_cover')[0].val);
				formData.append("title_book", $("#title_book").val());
				formData.append("chapter_title", $("#title_chapter").val());
				formData.append("cover_name", $('#cover_name').val());
				formData.append("category_id", $("#category_id").val());
				formData.append("user_id", $("#user_id").val());
				formData.append("csrf_test_name", csrf_value);
				// formData.append("tag_book", $("#tag_book").val());
				formData.append("book_paragraph", $("#book_paragraph").val());
				if ($("#book_id").val() != null) {
					formData.append("book_id", $("#book_id").val());
					// for (var pair of formData.entries()) {
						// console.log(pair[0]+ ', ' + pair[1]); 
					// }
				} else {
					console.log('tidak');
				}
				$.ajax({
					"url": base_url+"my_book/create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					HoldOn.close();
					$("#success").show().delay(5000).queue(function(n) {
						$(this).hide();
						n();
					});

						// console.log(formData);
						// for (var pair of formData.entries()) {
						//     console.log(pair[0]+ ', ' + pair[1]); 
						// }
						location.reload();
						$("#title_chapter").show();
						$("#title_chapter").val();
						$("#title_book").hide();
					})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}else{
			if (title_book.length == 0 || title_book.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}
			else if (chapter_title.length == 0 || chapter_title.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				var aww = $(this);
				var formData = new FormData();
				count++;
				$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');
				// console.log($('#file_cover')[0].val);
				formData.append("title_book", $("#title_book").val());
				formData.append("chapter_title", $("#title_chapter").val());
				formData.append("cover_name", $('#cover_name').val());
				formData.append("category_id", $("#category_id").val());
				formData.append("user_id", $("#user_id").val());
				// formData.append("tag_book", $("#tag_book").val());
				formData.append("book_paragraph", $("#book_paragraph").val());
				formData.append("csrf_test_name",  csrf_value)
				if ($("#book_id").val() != null) {
					formData.append("book_id", $("#book_id").val());
					for (var pair of formData.entries()) {
						// console.log(pair[0]+ ', ' + pair[1]); 
					}
				} else {
					console.log('tidak');
				}
				$.ajax({
					"url": base_url+"my_book/create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					HoldOn.close();
					$("#success").show().delay(5000).queue(function(n) {
						$(this).hide();
						n();
					});
					location.reload();
					$("#title_chapter").show();
					$("#title_chapter").val();
					$("#title_book").hide();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}
	});
var count = 0;
$(document).on('click', '.saveasdraft', function() {
	HoldOn.open({
		theme: 'sk-bounce',
		message: "Tunggu sebentar."
	});

	var aww = $("#btnsavedraft");
	var formData = new FormData();

	var title_book = $("#title_book").val();
	var chapter_title = $("#title_chapter").val();

	count++;
	$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');

	formData.append("title_book", $("#title_book").val());
	formData.append("chapter_title", $("#title_chapter").val());
	formData.append("cover_name", $('#cover_name').val());
	formData.append("category_id", $("#category_id").val());
	formData.append("user_id", $("input:hidden[name=user_id]").val());
	formData.append("csrf_test_name",  csrf_value)
		// formData.append("tag_book", $("#tag_book").val());
		formData.append("book_paragraph", $("#book_paragraph").val());
		if ($("#book_id").val() != null) {
			formData.append("book_id", $("#book_id").val());
			// for (var pair of formData.entries()) {
			// 	console.log(pair[0] + ', ' + pair[1]);
			// }
		} else {
			console.log('tidak');
		}

		if (title_book == null) {
			if (chapter_title.length == 0 || chapter_title.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				$.ajax({
					"url": "create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					HoldOn.close();
					$("#success").show().delay(5000).queue(function(n) {
						$(this).hide();
						n();
					});
					// location.reload();
					// var url = data['data']['book_id'] + '/chapter/' + data['data']['chapter_id'];
					// url_redirect += 'create_book/' + data['data']['book_id'];
					// aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt' + count + ' addsubchapt_on" book="' + data['data']['book_id'] + '" chapter="' + data['data']['chapter_id'] + '" id="editchapt" href="' + url + '">' + $("#title_book").val() + '</a>');
					
					// $("#books_id").html('<input type="hidden" id="book_id" name="book_id" value="' + data['data']['book_id'] + '">');
					// $("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
					// $("#title_book").val("");
					// $('.book_paragraph').froalaEditor('undo.reset');
					// $("#title_book").attr({
					// 	"placeholder": 'Masukan judul chapter'
					// });
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}else{
			if (title_book.length == 0 || title_book.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}
			else if (chapter_title.length == 0 || chapter_title.length == null) {
				HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				$.ajax({
					"url": "create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					HoldOn.close();
					$("#success").show().delay(5000).queue(function(n) {
						$(this).hide();
						n();
					});
					// location.reload();
					// var url = data['data']['book_id'] + '/chapter/' + data['data']['chapter_id'];
					// url_redirect += 'create_book/' + data['data']['book_id'];
					// aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt' + count + ' addsubchapt_on" book="' + data['data']['book_id'] + '" chapter="' + data['data']['chapter_id'] + '" id="editchapt" href="' + url + '">' + $("#title_book").val() + '</a>');
					
					// $("#books_id").html('<input type="hidden" id="book_id" name="book_id" value="' + data['data']['book_id'] + '">');
					// $("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
					// $("#title_book").val("");
					// $('.book_paragraph').froalaEditor('undo.reset');
					// $("#title_book").attr({
					// 	"placeholder": 'Masukan judul chapter'
					// });
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}	
	});
});
function getCategory() {
	$.ajax({
		url: base_url+'getCategory',
		type: 'POST',
		dataType: 'json',
		data: {csrf_test_name: csrf_value}
	})
	.done(function(data) {
		var category = "<option value=''>Pilih Category Buku</option>"; 
		$.each(data, function(index, val) {
			category += "<option value='"+val.category_id+"'>"+val.category_name+"</option>";
		});
		$("#category_id").html(category);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});
	
}
function showLoading() {
	var options = {
		theme:"sk-cube-grid",
		message:'Tunggu Sebentar ',
		backgroundColor:"white",
		textColor:"#7554bd" 
	};
	HoldOn.open(options);
}
function getChapter() {
	$.ajax({
		url: base_url+'getChapter',
		data: {book_id: uri_segment,csrf_test_name: csrf_value},
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		var chapter = "";
		var title = "";
		if (data.chapter == null || data.chapter.length == 0) {
			title += '<input type="text" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku" required> <input type="text" name="title_chapter" style="display: none;" id="title_chapter" value="Description" class="w-100" placeholder="Masukan Chapter">';
			title += '<input type="hidden" name="count_chapter" id="count_chapter" value="0" class="w-100" placeholder="Count Chapter" required>';

		}else{
			var str_desc = data.chapter[0].desc;
			title += '<input type="text" name="title_chapter" id="title_chapter" class="w-100" placeholder="Masukan Chapter" required>';
			title_book = data.book_info.title_book;
			title += '<input type="hidden" name="title_book" id="title_book" value="'+title_book+'" class="w-100" placeholder="Masukan Judul" required>';
			title += '<input type="hidden" name="count_chapter" id="count_chapter" value="'+data.total_chapter_sellable+'" class="w-100" placeholder="Count Chapter" required>';
			title += '<input type="hidden" name="count_chapter_plus_minus" id="count_chapter_plus_minus" value="'+data.chapter.length+'" class="w-100" placeholder="Count Chapter" required>';
			if (data.chapter[0]) {
				chapter += '<div id="accordion"> <div class="card"> <div class="card-header" id="headingOne"> <h5 class="mb-0"> <button class="btn btn-transparent" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Daftar Chapter <span class="caret"></span> </button> </h5> </div> <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"> ';
				$.each(data.chapter, function(index, val) {
					if (index != 0) {
						chapter += '<div class=""><a style="border-bottom:solid 1px #DDD;" class="btn w-100 chapterdata0 editsubchapt1 addsubchapt_on " book="2016" chapter="1326" id="editchapt" href="'+base_url+'my_book/'+uri_segment+'/chapter/'+val.chapter_id+'" onclick="showLoading()"><img src="'+base_url+'/public/img/icon-tab/chapter.svg" class="pr-10">  '+val.chapter_title+'</a> </div>';
					}
				});
				chapter += '</div> </div> </div><br>';
			}
			$(".title_book_txt").html(title_book);
			$(".desc_book_txt").html(str_desc);
		}
		// console.log(data.book_info.cover_url);
		if (data.book_info.cover_url != "") {
			$("#preview").attr('src', data.book_info.cover_url);
			$("#cover_name").val(data.book_info.cover_url);
		}else{
			$("#preview").attr('src', base_url+'public/img/assets/def_prev.png');
		}
		if (data.is_publishable == true) {
			if (data.is_sellable == true && data.book_info.is_free == true) {
				swal({
					title: 'Yeay...!',
					text: 'Buku anda sudah layak untuk dijual. Mau dijual sekarang?',
					imageUrl: base_url+'public/img/can_sell.png',
					imageAlt: 'Congrats! You Can Sell your Book. :)',
					animation: true,
					showCancelButton: true,
					confirmButtonColor: '#7661ca',
					cancelButtonColor: '#979797',
					confirmButtonText: 'Ya, Jual',
					cancelButtonText: 'Nanti'
				}).then((result) => {
					if (result.value) {
						// $('#is_free').prop('checked', true);
						$(document).on('click', '#is_free', function() {
							var sellbtn = $('#is_free:checkbox:checked');
							var pin = $('#what').val();
							if (sellbtn.length == 0 && pin == 'false') {
								$('#publish_book').show();
								$('#setpin_publish').hide();
							}else if (sellbtn.length == 1 && pin == 'true'){
								$('#publish_book').show();
								$('#setpin_publish').hide();
							}else if (sellbtn.length == 0 && pin == 'true'){
								$('#publish_book').show();
								$('#setpin_publish').hide();
							}else{
								$('#publish_book').hide();
								$('#setpin_publish').show();
							}
						});
						// $('.rangebook').addClass('show');
					}else{

					}
				});
				$("#sell_book").show();
				$(document).on('keyup', '.input-range', function(event) {
					event.preventDefault();
					var id = $(this).val();
					var payment_fee = data.payment_fee;
					var nominal = $(this).val().split(".").join("");
					var ppn = data.ppn * nominal / 100;
					var rp_total = ppn + payment_fee;
					var total = parseInt(rp_total) + parseInt(id);
					$("#rp").show();
					$("#rp_fee").show();
					$("#rp_total").show();
					$('#ppn').number(ppn);
					$('#payment_fee').number(payment_fee);
					$('#total').number(total);
					$("#sell_nominal").show();
					$("#sell_nominal").html("<input type='text' name='price' value='"+nominal+"'><input type='text' name='total_price' value='"+total+"'>");
				});
				$('.input-range').number(true);
			}else{
				$("#sell_book").hide();
			}

		}else{
			$(document).on('click', '#publish_book', function() {
				if ($('.fr-counter').text() > 149) {
					var cat = $("#category_id").val();
					var tnc = $('.checktnc:checkbox:checked');

					if (cat == null || cat == "") {
						swal(
							'Gagal!',
							'Pilih kategori buku mu.',
							'error'
							);
					}
					else if(tnc.length == 0){
						swal(
							'Gagal!',
							'Setujui Term of Service.',
							'error'
							);
					}
					else {
						var formData = new FormData();

						var title_book = $("#title_book").val();
						var chapter_title = $("#title_chapter").val();

						$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');

						formData.append("title_book", $("#title_book").val());
						formData.append("chapter_title", $("#title_chapter").val());
						formData.append("cover_name", $('#cover_name').val());
						formData.append("category_id", $("#category_id").val());
						formData.append("user_id", $("input:hidden[name=user_id]").val());
						formData.append("csrf_test_name",  csrf_value)
						formData.append("status", 'publish');
						formData.append("book_paragraph", $("#book_paragraph").val());
						if ($("#book_id").val() != null) {
							formData.append("book_id", $("#book_id").val());
			// for (var pair of formData.entries()) {
			// 	console.log(pair[0] + ', ' + pair[1]);
			// }
		} else {
			console.log('tidak');
		}

		if (title_book == null) {
			if (chapter_title.length == 0 || chapter_title.length == null) {
				// HoldOn.close();
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				$.ajax({
					"url": "create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					window.location = base_url+'timeline';
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}else{
			if (title_book.length == 0 || title_book.length == null) {
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}
			else if (chapter_title.length == 0 || chapter_title.length == null) {
				swal("Maaf..", "Semua Field harus diisi", "warning");
			}else{
				$.ajax({
					"url": "create_book/save",
					"dataType": 'json',
					"cache": false,
					"type": "POST",
					"contentType": false,
					"processData": false,
					"data": formData
				})
				.done(function(data) {
					window.location = base_url+'timeline';
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {});
			}
		}
	}
	}else{
		swal(
			'Gagal!',
			'Maaf, untuk mempublish bukumu, jumlah karakter dibukumu harus lebih dari 150',
			'error'
			);
	}
});
		}
		$(".tulisjudul").html(title);
		$(".start_chapter").val(data.chapter.length);
		$("#btn_chapter").html(chapter);
	})
.fail(function() {
	console.log("error");
})
.always(function() {
});

}
$(function () {
	$(".withanimation").click(function(event) {
		event.preventDefault();
		var url=$(this).attr("href");

		setTimeout(function() {
			setTimeout(function() {showSpinner();},30);
			window.location=url;
		},0);
	});
});

function addMinusPlus() {
	$(document).on('click','.value-control',function(){
		var action = $(this).attr('data-action')
		var target = $(this).attr('data-target')
		var value  = parseFloat($('[id="'+target+'"]').val());
		if ( action == "plus") {
			if (value == $("#count_chapter_plus_minus").val()) {
				value;
			}else{
				value++;
			}
		}
		if ( action == "minus") {
			if (value <= $("#count_chapter_plus_minus").val()) {
				if (value < 2) {
					value;
				}else{
					value--;
				}
			}
		}
		$('[id="'+target+'"]').val(value);
	});
}

$(document).on('click', '#setpin_publish', function() {
	swal({
		title: 'Perhatian',
		text: "Untuk menjual sebuah buku, anda harus mengaktifkan Dompet Baboo terlebih dahulu.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#7661ca',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, aktifkan',
		cancelButtonText: 'Jual nanti',
	}).then((result) => {
		if (result.value) {
			$('#wallet-modal').modal('show');
		}
	})
});

$("#publish_book").click(function() {
	var formData = new FormData();
	var ch = $(".start_chapter").val();
	var slide = $('#is_free:checkbox:checked');
	if (slide.length == 0) {
		formData.append("book_id", $("#uri").val());
		formData.append("file_cover", $("#cover_name").val());
		formData.append("category", $("#category_id").val());
		formData.append("is_paid", false);
	}else{
		formData.append("book_id", $("#uri").val());
		formData.append("file_cover", $("#cover_name").val());
		formData.append("category", $("#category_id").val());
		formData.append("price", $(".input-range").val());
		if (ch == '3' || ch >= '3' || ch > '3') {
			formData.append("chapter_start", ch);
		}else {
			formData.append("chapter_start", $(".start_chapter").val('3'));
		}
		formData.append("is_paid", true);
	}
	formData.append("csrf_test_name", csrf_value);

	var cat = $("#category_id").val();
	var tnc = $('.checktnc:checkbox:checked');

	if (cat == null || cat == "") {
		swal(
			'Gagal!',
			'Pilih kategori buku mu.',
			'error'
			);
	}
	else if(tnc.length == 0){
		swal(
			'Gagal!',
			'Setujui Term of Service.',
			'error'
			);
	}
	else {
		$.ajax({
			url: base_url+'publishbook',
			dataType: 'json',
			type: 'POST',
			contentType: false,
			processData: false,
			data: formData
		})
		.done(function(data) {
			if (data.code == 200) {
				window.location = base_url+'timeline';
			}
		})
		.fail(function() {
			console.log("errorss");
		})
		.always(function() {
		});
	}

});