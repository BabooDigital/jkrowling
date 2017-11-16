$(document).ready(function() {
	
	var window_width = $( window ).width();

	if (window_width < 768) {
		$(".stickymenu").trigger("sticky_kit:detach");
	} else {
		make_sticky();
	}

	$( window ).resize(function() {

		window_width = $( window ).width();

		if (window_width < 768) {
			$(".stickymenu").trigger("sticky_kit:detach");
		} else {
			make_sticky();
		}

	});

	function make_sticky() {
		$(".stickymenu").stick_in_parent();
	}

	var editor = CKEDITOR.replace( 'book_paragraph', {
		filebrowserBrowseUrl : 'public/plugins/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : 'public/plugins/ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : 'public/plugins/ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : 'public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : 'public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : 'public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( editor, '../' );
	$('.backbtn').on('click', function() {
		window.history.go(-1);
	});

	// $(document).on('click','.addsubchapt', function() {
	// 	var url = $(location).attr('href');
	// 	var segments = url.split( '/' );
	// 	var bid = segments[5];
	// 	var formData = new FormData(this);

	// 	// $("div[id=subchapter]").append("<a class='btn w-100 mb-10 addsubchapt'><span style='font-size: 12px;color: #7b8a95;'>Tambah Sub Cerita</span></a>");

	// 	formData.append("id_book", $("input:hidden[name=id_book]").val());
	// 	formData.append("title_book", $("#title_book").val());
	// 	formData.append("description", $("#summernote").val());

	// 	$.ajax({
	// 		url: bid+"/chapters",
	// 		cache: false,
	// 		type: "POST",
	// 		contentType: false,
	// 		processData: false,
	// 		dataType: 'json',
	// 		data: formData,
	// 	})
	// 	.done(function() {
	// 		console.log("success");
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		history.pushState('id', 'chapter', 'https://localhost/jkrowling/create_book/23/chapters/1');
	// 	});

	// });

// Button Tambah Chapter

	var count = 0;
$(document).on('click','.addsubchapt', function() {
	var editorText = CKEDITOR.instances.book_paragraph.getData();
	var aww = $(this);
	var formData = new FormData();
	count ++;
	$(this).parents('#subchapter').append("<a class='btn w-100 mb-10 addsubchapt'>Tambah Sub Cerita</a>");

	formData.append("title_book", $("#title_book").val());
	formData.append("file_cover", $('input[type=file]')[0].files[0]);
	formData.append("category", $("#category_id").val());
	formData.append("user_id", $("input:hidden[name=user_id]").val());
	formData.append("tag_book", $("#tag_book").val());
	formData.append("paragraph", $("#book_paragraph").html(editorText).val());
	$.ajax({
		"url": "create_book/save",
		"dataType": 'json',
		"cache": false,
		"type": "POST",
		"contentType": false,
		"processData": false,
		"data" : formData
	})
	.done(function(data) {
		console.log(data);
		console.log(data['data']['book_id']);
		
		$("#success").show().delay(5000).queue(function(n) {
		  $(this).hide(); n();
		});
		aww.removeClass("addsubchapt").addClass('editsubchapt'+count);
		aww.addClass('addsubchapt_on');
		aww.text($("#title_book").val());
		$("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
		$("#title_book").val("");
		for ( instance in CKEDITOR.instances ){
	        CKEDITOR.instances[instance].updateElement();
	    }
	        CKEDITOR.instances[instance].setData('');
		$("#title_book").attr({
			"placeholder": 'Masukan judul chapter'
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("success");
	});

});

// Button Save Book
// $(document).on('click','.savebook', function() {
// 	var url = $(location).attr('href');
// 	var segments = url.split( '/' );
// 	var id = segments[5];
// 	var formData = new FormData(this);

// 	formData.append("title_book", $("#title_book").val());
// 	formData.append("file_cover", $('input[type=file]').val());
// 	formData.append("description", $("#summernote").val());
// 	formData.append("category_id", $("#category_id").val());
// 	formData.append("tag_book", $("#tag_book").val());
// 	$.ajax({
// 		url: id+"/save",
// 		dataType: 'json',
// 		cache: false,
// 		type: "POST",
// 		contentType: false,
// 		processData: false,
// 		data : formData,
// 	})
// 	.done(function() {
// 		$("#title_book").attr({
// 			"placeholder": 'Masukan judul chapter'
// 		});
// 		$(".note-placeholder").text('Tuliskan cerita buku anda...').val();
// 		$("#book_save").removeClass('savebook').addClass('savebook_on');
// 		$("#title_forbook").removeClass('txtsavebook').addClass('txtsavebook_on');
// 		$("#subchapter").show();
// 		$("#title_forbook").text($("#title_book").val());
// 		$("#title_book").val("");
// 		$('#summernote').summernote('reset');
// 	})
// 	.fail(function() {
// 		console.log("error");
// 	})
// 	.always(function() {
// 		console.log("success");
// 	});

// });
});