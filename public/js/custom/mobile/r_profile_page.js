$(document).ready(function() {
	$('#confEdit').on('click', function() {
		var formData = new FormData();

		formData.append('fullname', $('#yourName').val());
		formData.append('date_of_birth', $('#yourBirth').val());
		formData.append('location', $('#yourLoc').val());
		formData.append('about_me', $('#yourBio').val());

		$.ajax({
			url: 'edit_profile',
			type: 'POST',
			dataType: 'JSON)',
			cache: false,
		    contentType: false,
		    processData: false,
			data: formData,
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});