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

	$('#summernote').summernote({
		placeholder: 'Tulis cerita di sini',
		tabsize: 2,
		minHeight: 500,
		maxHeight: 630,
		// toolbar: [
		// ['styleTags', ['bold', 'italic', 'underline', 'clear']],
		// ['color', ['color']],
		// ['para', ['ul', 'ol', 'paragraph']],
		// ['insert', ['picture', 'link', 'video', 'hr', 'help']]
		// ]
	});

	$('.backbtn').on('click', function() {
		window.history.go(-1);
	});
});