$(document).ready(function() {
	function getContent(tab_page) {
		$.ajax({
			url: tab_page,
			type: 'GET',
			cache: false,
			success: function(data) {
				$(".lds-css").hide();
				$("#pageContent").html(data);
			}
		})
		
	}

	$(".menu-page").on('click', function(event) {
		var tab_page = $(this).attr('href');
		var title = $(this).attr('dat-title');
		$(".lds-css").show();
		history.pushState(null, null, tab_page);

		getContent(tab_page);
		document.title = title+' | Baboo - Beyond Book & Creativity';
		event.preventDefault();		
	});
});

function funcDropdown() {
  document.getElementById("myDropdown").classList.toggle("showss");
}