
$(window).on('load', function() {
	var link = 'market://details?id=id.android.baboo';
	$('.bannerPopUp').html("<div class='popUpBannerBox' style='display: block;'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span style='background:  #482d8e;padding: 15px 95px;border-radius:  35px;color:  #fff;font-size: 15pt;'>Download App</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");
	
	function showPopUpBanner() {
		$('.popUpBannerBox').fadeIn("2000");
	}
	setTimeout(showPopUpBanner, 3000);

	$('.closeButton').click(function() {
		$('.popUpBannerBox').fadeOut("2000");
		return false;
	});
});
$(document).ready(function() {
    
	function getContent(tab_page) {
		$.ajax({
			url: tab_page,
			type: 'GET',
			cache: false,
			success: function(data) {
				location.reload();
				// $(".lds-css").hide();
				// $("#pageContent").html(data);
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