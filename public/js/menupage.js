

$(document).ready(function() {
	showPopUpBanner();

	function getContent(tab_page) {
		$.ajax({
			url: tab_page,
			type: 'GET',
			cache: false,
			success: function(data) {
				// location.reload();
				// $(".lds-css").hide();
				// $("#pageContent").html(data);
			}
		})
		
	}

	$(".menu-page").on('click', function(event) {
		// var tab_page = $(this).attr('href');
		// var title = $(this).attr('dat-title');
		$(".lds-css").show();
		// history.pushState(null, null, tab_page);

		// getContent(tab_page);
		// document.title = title;
		// event.preventDefault();		
	});
});

function funcDropdown() {
	document.getElementById("myDropdown").classList.toggle("showss");
}

var isMobile = {
	Android: function() {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};

	var link = 'market://details?id=id.android.baboo';
	$('.bannerPopUp').html("<div class='popUpBannerBox'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span class='popUpBannerSpan'>Unduh Aplikasi</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");
	
	function showPopUpBanner() {
		if( isMobile.Android() ) {
			$('.popUpBannerBox').fadeIn("2000");
		}else{
			
		}
	}

	$('.closeButton').click(function() {
		$('.popUpBannerBox').fadeOut("2000");
		return false;
	});