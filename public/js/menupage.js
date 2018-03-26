

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
// 	var ua = navigator.userAgent.toLowerCase();
// var isAndroid = ua.indexOf("android") > -1;
// 	if(isAndroid) { // if is android
//     // your app address for local
//     var ifrSrc = 'intent://www.youtube.com/watch?v=dQw4w9WgXcQ#Intent;scheme=http;package=com.google.android.youtube;end';
//     var ifr = document.createElement('iframe');
//     ifr.src = ifrSrc ;
//     ifrSrc.onload = function() { // if app is not installed, then will go this function
//         window.location = 'http://your.app_download_page.com';
//     };
//     ifr.style.display = 'none';
//     document.body.appendChild(ifr);

//     setTimeout(function(){
//         document.body.removeChild(ifr); // remove the iframe element
//     }, 1000);
// } else { // if is not android
//     window.location = 'http://google.com';
// }

	var link = 'market://details?id=id.android.baboo';
	$('.bannerPopUp').html("<div class='popUpBannerBox'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span style='background:  #482d8e;padding: 15px 95px;border-radius:  35px;color:  #fff;font-size: 15pt;'>Download App</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");
	
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