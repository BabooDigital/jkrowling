$(document).ready(function() {
	$("#profileImage").click(function(e) {
		$("#imageUpload").click();
	});

	function fasterPreview( uploader ) {
		if ( uploader.files && uploader.files[0] ){
			$('#profileImage').attr('src', 
				window.URL.createObjectURL(uploader.files[0]) );
		}
	}

	$("#imageUpload").change(function(){
		fasterPreview( this );

		var boo = $(this);
		var formData = new FormData();

		formData.append("prof_pict", $('#imageUpload')[0].files[0]);
		formData.append("user_id", $('#dat-id').val());
		$.ajax({
			url: base_url + 'upload_pict',
			type: 'POST',
			dataType: 'JSON',
			cache: false,
			contentType: false,
			processData: false,
			data: formData
    })
		.done(function() {
			console.log("wew mantab");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {});
		
	});
});