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

	$('#book_paragraph').froalaEditor({
		imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove'],
		useClasses: false,
		pastePlain: true,
		height: 400
	})
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
		data: { book_id: book, chapter_id: chapter },
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
	$('.backbtn').on('click', function() {
		window.history.go(-1);
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
		formData.append("tag_book", $("#tag_book").val());
		formData.append("book_paragraph", $("#book_paragraph").val());
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

				// console.log(formData);
				for (var pair of formData.entries()) {
				    console.log(pair[0]+ ', ' + pair[1]); 
				}
				location.reload();
				$("#title_chapter").show();
				$("#title_chapter").val();
				$("#title_book").hide();
				// var url = data['data']['book_id'] + '/chapter/' + data['data']['chapter_id'];
				// url_redirect += 'create_book/' + data['data']['book_id'];
				// aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt' + count + ' addsubchapt_on" book="' + data['data']['book_id'] + '" chapter="' + data['data']['chapter_id'] + '" id="editchapt" href="' + url + '">' + $("#title_book").val() + '</a>');

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
	});
	var count = 0;
	$(document).on('click', '.saveasdraft', function() {
		HoldOn.open({
			theme: 'sk-bounce',
			message: "Tunggu sebentar."
		});
		console.log("Awali semua dengan Bismillah dan akhiri dengan Alhamdulillah");

		var aww = $("#btnsavedraft");
		var formData = new FormData();
		count++;
		$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');

		formData.append("title_book", $("#title_book").val());
		formData.append("chapter_title", $("#title_chapter").val());
		formData.append("cover_name", $('#cover_name').val());
		formData.append("category_id", $("#category_id").val());
		formData.append("user_id", $("input:hidden[name=user_id]").val());
		formData.append("tag_book", $("#tag_book").val());
		formData.append("book_paragraph", $("#book_paragraph").val());
		if ($("#book_id").val() != null) {
			formData.append("book_id", $("#book_id").val());
			for (var pair of formData.entries()) {
				console.log(pair[0] + ', ' + pair[1]);
			}
		} else {
			console.log('tidak');
		}
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
				location.reload();
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

	});
});
function getCategory() {
	$.ajax({
		url: base_url+'getCategory',
		type: 'POST',
		dataType: 'json'
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
		console.log("complete");
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
		data: {book_id: uri_segment},
		type: 'POST',
		dataType: 'json'
	})
	.done(function(data) {
		var chapter = "";
		var title = "";
		if (data.chapter == null || data.chapter.length == 0) {
			title += '<input type="text" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku" required> <input type="text" name="title_chapter" style="display: none;" id="title_chapter" value="Description" class="w-100" placeholder="Masukan Chapter">';
		}else{
			title += '<input type="text" name="title_chapter" id="title_chapter" class="w-100" placeholder="Masukan Chapter" required>';
			title_book = data.book_info.title_book; 
			$.each(data.chapter, function(index, val) {
				chapter += '<a class="btn w-100 mb-10 chapterdata0 editsubchapt1 addsubchapt_on withanimation" book="2016" chapter="1326" id="editchapt" href="'+uri_segment+'/chapter/'+val.chapter_id+'" onclick="showLoading()">'+val.chapter_title+'</a>';
			});
			$(".title_book_txt").html(title_book);
		}
		$(".tulisjudul").html(title);
		$("#btn_chapter").html(chapter);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
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