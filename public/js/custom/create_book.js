var url_redirect = '';
var base_url = window.location.origin+'/baboo-frontend/';

$(document).ready(function() {

	$('.backbtn').on('click', function() {
		window.history.go(-1);
	});
	
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


	var count = 0;
	$(document).on('click','.addsubchapt', function() {
		HoldOn.open({
            theme:'sk-bounce',
            message:"Tunggu sebentar."
        });
		console.log("Awali semua dengan Bismillah dan akhiri dengan Alhamdulillah");
		var editorText = CKEDITOR.instances.book_paragraph.getData();
		var aww = $(this);
		var formData = new FormData();
		count ++;
		$(this).parents('#subchapter').append('<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />');

		formData.append("title_book", $("#title_book").val());
		formData.append("file_cover", $('input[type=file]')[0].files[0]);
		formData.append("category", $("#category_id").val());
		formData.append("user_id", $("input:hidden[name=user_id]").val());
		formData.append("tag_book", $("#tag_book").val());
		formData.append("paragraph", $("#book_paragraph").html(editorText).val());
		if ($("#id_books").val() != null) {
			formData.append("id_books", $("#id_books").val());
			for (var pair of formData.entries()) {
			    console.log(pair[0]+ ', ' + pair[1]); 
			}
		}else {
			console.log('tidak');
		}
		$.ajax({
			"url": base_url+"create_book/save",
			"dataType": 'json',
			"cache": false,
			"type": "POST",
			"contentType": false,
			"processData": false,
			"data" : formData
		})
		.done(function(data) {
			HoldOn.close();
			$("#success").show().delay(5000).queue(function(n) {
				$(this).hide(); n();
			});
			var url = base_url+'my_book/'+data['data']['book_id']+'/chapter/'+data['data']['chapter_id'];
			url_redirect += 'create_book/'+data['data']['book_id'];
			aww.replaceWith('<a class="btn w-100 mb-10 chapterdata0 editsubchapt'+count+' addsubchapt_on" book="'+data['data']['book_id']+'" chapter="'+data['data']['chapter_id']+'" id="editchapt" href="'+url+'">'+$("#title_book").val()+'</a>');
			// aww.show();
			// aww.removeClass("addsubchapt").addClass('editsubchapt'+count);
			// aww.addClass('addsubchapt_on');
			// aww.attr('id', 'editchapt');
			// aww.text($("#title_book").val());
			// $('.editsubchapt'+count).attr('href', url);
			$("#books_id").html('<input type="text" id="id_books" name="id_books" value="'+data['data']['book_id']+'">');
			$("#sub_title").removeClass('txtaddsubchapt').addClass('txtaddsubchapt_on');
			// $("#title_book").val("");
			for ( instance in CKEDITOR.instances ){
				CKEDITOR.instances[instance].updateElement();
			}
			CKEDITOR.instances[instance].setData('');
			$("#title_book").attr({
				"placeholder": 'Masukan judul chapter'
			});
			function getContent(tab_page, book, chapter) {
				$.ajax({
					url: tab_page,
					type: 'POST',
					cache: false,
					data: {book_id : book, chapter_id : chapter},
					success: function(data) {
						HoldOn.close();
						$(".loader").hide();
						$("#pageContent").html(data);
					}
				})
				
			}
			$("a").on('click', function(event) {
				HoldOn.open({
		            theme:'sk-bounce',
		            message:"Tunggu sebentar."
		        });
				var tab_page = $(this).attr('href');
				var book = $(this).attr('book');
				var chapter = $(this).attr('chapter');
				$(".loader").show();
				history.pushState(null, null, tab_page);

				getContent(tab_page,book,chapter);
				event.preventDefault();		
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
		});
		
	});
});
// window.onbeforeunload = function () {
// window.setTimeout(function () {
//     window.location = url_redirect;
// }, 0);
// window.onbeforeunload = null;
                                
// return 'test';
// }