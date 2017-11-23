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
    imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove']
  })
});