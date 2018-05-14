$(document).ready(function() {
	loaded = true;
	var page = 2;
	$(window).scroll(function() {
		if  ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && loaded){
			loadMoreData(page)
			page++;
		}
	});

	function loadMoreData(page) {
		loaded = false;
		$.ajax({
			url: '?page=' + page,
			type: "get",
			beforeSend: function() {
				$('.loader').show();
			}
		})
		.done(function(data) {
			if (data == "" || data == null) {
				$('.loader').hide();
				$('#post-data').append("<div class='mb-30 text-center'>Tidak ada data lagi..</div>");
				return;

			};
			$('.loader').hide();
			$("#post-data").append(data);
			loaded = true;
		})
		.fail(function(jqXHR, ajaxOptions, thrownError) {
			console.log('server not responding...');
			loaded = true;
			location.reload();
		});
	}

	$('.your-class').slick({
		centerMode: true,
		centerPadding: '30px',
		slidesToShow: 1,
		arrows: true,
		prevArrow:"<i class='fa fa-chevron-left contslider slidebtn prevbtn'></i>",
		nextArrow:"<i class='fa fa-chevron-right contslider slidebtn nextbtn'></i>",
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: true,
				centerMode: true,
				centerPadding: '166px',
				slidesToShow: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: true,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1,
			}
		}
		],
	});
});