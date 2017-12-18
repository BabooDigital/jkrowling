$(document).ready(function() {
	function getContent(tab_page) {
		$.ajax({
			url: tab_page,
			type: 'GET',
			cache: false,
			success: function(data) {
				$(".loader").hide();
				$("#pageContent").html(data);
			}
		})
		
	}

	$("a").on('click', function(event) {
		var tab_page = $(this).attr('href');
		$(".loader").show();
		history.pushState(null, null, tab_page);

		getContent(tab_page);
		event.preventDefault();		
	});
});

function funcDropdown() {
  document.getElementById("myDropdown").classList.toggle("showss");
}