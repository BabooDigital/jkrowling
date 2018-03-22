$(document).ready(function() {
	showPopUpBanner();
	
	// $(document).on('click', '#accRegis', function() {
	// 	var aww = $(this);
	// 	var formData = new FormData();

	// 	formData.append("name", $("#yname").val());
	// 	formData.append("email", $("#emailRegis").val());
	// 	formData.append("password", $("#passRegis").val());
	// 	formData.append("tgl_lahir", $("#date").val());
	// 	formData.append("j_kelamin", $("input[name=j_kelamin]").val());

	// 	$.ajax({
	// 		url: base_url+'booRegis',
	// 		dataType: 'json',
	// 		type: 'POST',
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		data: formData
	// 	})
	// 	.done(function(data) {
	// 		console.log(data);
	// 		if (data.status != 200) {
 //                swal("Gagal", data.message, "error");
	// 		}else{
 //                window.location = base_url+'firstlogin';
	// 		}
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 	});

	// });
});
var modal_lv = 0;
$('.modal').on('shown.bs.modal', function (e) {
	$('.modal-backdrop:last').css('zIndex',1051+modal_lv);
	$(e.currentTarget).css('zIndex',1052+modal_lv);
	modal_lv++
});

$('.modal').on('hidden.bs.modal', function (e) {
	modal_lv--
});
var getHashDaft = window.location.hash;
if (getHashDaft != "" && getHashDaft == "#btndaftar") {
	$('#register-modal').modal('toggle');
}
if (getHashDaft != "" && getHashDaft == "#event") {
	$('#event-modal').modal('toggle');
}
$(function() {
	$('#date').combodate('method');
});
$("#login-form").validate({
	rules: {
		emails: {
			required: true,
			email: true
		},
		passwords: {
			required: true,
			minlength: 5
		}
	},
	messages: {
		emails: {
			required: 'Email harus di isi'
		},
		passwords: {
			required: 'Password harus di isi'
		}
	}
});
$("#login-form, #form-login").validate({
	rules: {
		emails: {
			required: true,
			email: true
		},
		passwords: {
			required: true,
			minlength: 5
		}
	},
	messages: {
		emails: {
			required: 'Email harus di isi'
		},
		passwords: {
			required: 'Password harus di isi'
		}
	}
});
$("#form-register").validate({
	ignore: [],
	rules: {
		name: {
			required: true
		},
		email: {
			required: true,
			email: true
		},
		password: {
			required: true,
			minlength: 5
		},
		retype_password: {
			equalTo: "#password"
		},
		tgl_lahir: {
			required: true
		}
	},
	messages: {
		name: {
			required: 'Nama lengkap harus di isi'
		},
		email: {
			required: 'Email harus di isi',
			email   : 'Email harus valid'
		},
		password: {
			required: 'Password harus di isi',
			minlength: 'Password minimal 5 karakter'
		},
		retype_password: {
			equalTo: 'Retype Password Tidak sama',
		},
		tgl_lahir: {
			required: 'Tanggal lahir harus di isi',
		}
	},
	submitHandler: function(form) {
		$('#tnc-modal').modal('show');
		var a = $("#yname").val();
		var b = $("#emailRegis").val();
		var c = $("#passRegis").val();
		var d = $("#date").val();
		var e = $("input[name=j_kelamin]").val();

		$('#namess').val(a);
		$('#emailss').val(b);
		$('#passss').val(c);
		$('#datess').val(d);
		$('#jkss').val(e);
	}
});

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
	$('.bannerPopUp').html("<div class='popUpBannerBox'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span style='background:  #482d8e;padding: 15px 95px;border-radius:  35px;color:  #fff;font-size: 15pt;'>Download App</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");
	
	function showPopUpBanner() {
		if( isMobile.Android() )
		$('.popUpBannerBox').fadeIn("2000");
	}

	$('.closeButton').click(function() {
		$('.popUpBannerBox').fadeOut("2000");
		return false;
	});