// $(document).ready(function() {
// 	var edit = CKEDITOR.replace('edit_book', {
// 		width: '97%',
// 		filebrowserBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html',
// 		filebrowserImageBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html?type=Images',
// 		filebrowserFlashBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html?type=Flash',
// 		filebrowserUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Files',
// 		filebrowserImageUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Images',
// 		filebrowserFlashUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Flash'
// 	});
// 	CKFinder.setupCKEditor( edit, '../' );
// });

$(function(){
  $.FroalaEditor.DefineIcon('imageInfo', {NAME: 'info'});
  $.FroalaEditor.RegisterCommand('imageInfo', {
    title: 'Info',
    focus: false,
    undo: false,
    refreshAfterCallback: false,
    callback: function () {
      var $img = this.image.get();
      alert($img.attr('src'));
    }
  });

  $('#book_paragraph').froalaEditor({
    imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove'],
    pastePlain: true
  })
  $("#updateChapter").click(function() {
    HoldOn.open({
      theme: 'sk-bounce',
      message: "Tunggu sebentar."
    });
    var formData = new FormData();
    formData.append("title_book", $("#title_book").val());
    formData.append("title_chapter", $("#title_chapter").val());
    formData.append("cover_name", $('#cover_name').val());
    formData.append("category_id", $("#category_id").val());
    formData.append("user_id", $("input:hidden[name=user_id]").val());
    formData.append("tag_book", $("#tag_book").val());
    formData.append("book_paragraph", $("#book_paragraph").val());
    if ($("#book_id").val() != null) {
      formData.append("book_id", $("input:hidden[name=books_id]").val());
      for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
      }
    } else {
      console.log('tidak');
    }
    if ($("#chapter_id").val() != null) {
      formData.append("chapter_id", $("input:hidden[name=chapter_id]").val());
    } else {
      console.log('tidak');
    }

    $.ajax({
      "url": base_url+"updatechapter",
      "dataType": 'json',
      "cache": false,
      "type": "POST",
      "contentType": false,
      "processData": false,
      "data": formData
    })
    .done(function() {
      HoldOn.close();
      $("#success").show().delay(5000).queue(function(n) {
        $(this).hide();
        n();
      });
      location.reload();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
});