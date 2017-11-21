$(document).ready(function() {
	var edit = CKEDITOR.replace('edit_book', {
		width: '97%',
		filebrowserBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html',
		filebrowserImageBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : 'public/plugins/ckfinder_responsive/ckfinder.html?type=Flash',
		filebrowserUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : 'public/plugins/ckfinder_responsive/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKFinder.setupCKEditor( edit, '../' );
});