$(document).ready(function() {

	$('.backcheck').click(function () {
		window.history.back();
	});

	// Second
	$('#fileImportant').change(function () {
		var a = $('#fileImportant').val().toString().split('\\');
		$('.txtFile').text(a[a.length -1]);
	});
	

	// Third

	// Fourth

	// Fifth

	// Sixth

});

// Second
function validateFormActivation() {
	
	$("#activationForm").validate({
		ignore: [],
		rules: {
			nameKTP: {
				required: true
			},
			numbKTP: {
				required: true,
				number: true,
				minlength: 16
			},
			fileKTP: {
				required: true,
				extension: "jpg|png|jpeg|gif"
			},
			numbHP: {
				required: true,
				number: true,
				minlength: 10
			}
		},
		messages: {
			nameKTP: {
				required: 'Nama lengkap harus di isi.'
			},
			numbKTP: {
				required: 'Email sangat diperlukan.',
				number   : 'Nomor KTP harus valid',
				minlength: 'Nomor KTP Kurang dari 16 Digit'
			},
			fileKTP: {
				required: 'Foto KTP sangat diperlukan.',
				extension: 'File foto harus berformat .jpg / .png untuk diterima.'
			},
			numbHP: {
				required: 'Nomor Handphone sangat diperlukan.',
				number : 'Nomor Handphone Harus Valid',
				minlength: 'Nomor Handphone tidak valid'
			}
		},
		submitHandler: function(form) {
			var a = new FormData();
			/* Act on the event */
			a.append("fullname", $("#nameImportant").val());
			a.append("phone", $("#hpImportant").val());
			a.append("ktp_no", $("#numbImportant").val());
			a.append("ktp_image", $("#fileImportant")[0].files[0]);
    		a.append("csrf_test_name", csrf_value);
			$.ajax({
				url: base_url+'auth/confirm_acc',
				type: 'POST',
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: a,
				beforeSend: function () {
					swal({
						title: 'Mohon tunggu...',
						onOpen: () => {
							swal.showLoading()
						}
					});
				}
			})
			.done(function(data) {
				if (data.code == 200) {
					window.location = base_url+'pin-dompet/third';
				}else {
					location.reload();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
		}
	});
}


// Third
function keyupOTP() {
	$('body').on('keyup', 'input.digit', function(event){

		var as = $( "#firstdigit" );
		var b = $( "#secondtdigit" );
		var c = $( "#thirddigit" );
		var d = $( "#fourthdigit" );
		var inputs = $("input.digit");

		if(event.keyCode == 8 || event.keyCode == 46){
			var index = inputs.index(this);
			if (index != 0)
				inputs.eq(index - 1).val('').focus();    
		}
		else{
			if($(this).val().length === this.size){
				inputs.eq(inputs.index(this) + 1).focus();
			}
		}
		
		if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0)
		{
			var str = as.val()+b.val()+c.val()+d.val();
			var fix = str.replace(/\s/g, '');
			   		// window.location = base_url+'pin-dompet/fourth';
			   		var a = new FormData();
			   		a.append("otp", fix);
    				a.append("csrf_test_name", csrf_value);
			   		$.ajax({
			   			url: base_url+'auth/confirm_otp',
			   			type: 'POST',
			   			dataType: 'json',
			   			cache: false,
			   			contentType: false,
			   			processData: false,
			   			data: a,
			   			beforeSend: function () {
			   				swal({
			   					title: 'Mohon tunggu...',
			   					onOpen: () => {
			   						swal.showLoading()
			   					}
			   				});
			   			}
			   		})
			   		.done(function(data) {
			   			if (data.code == 200) {
			   				window.location = base_url+'pin-dompet/fourth';
			   			}else if (data.code == 400) {
			   				as.val('');
			   				b.val('');
			   				c.val('');
			   				d.val('');
			   				$("#firstdigit").focus();
			   				swal(
			   					'Maaf',
			   					'Kode OTP yang anda masukan, salah.',
			   					'warning'
			   					);
			   			}else {
			   				window.location = base_url+'pin-dompet/second';
			   			}
			   		})
			   		.fail(function() {
			   			swal(
			   				'Maaf',
			   				'Terjadi kesalahan...',
			   				'warning'
			   				);
			   			window.location = base_url+'pin-dompet/second';
			   		})
			   		.always(function() {
			   		});
			   	}
			   });
}
function resendOTP() {
	$('.timer').startTimer({
		onComplete: function(){
			$('.btn-senda').removeAttr('disabled');
			$('.btn-senda').removeClass('disabled');
		}
	});
	$(document).on('click', '.btn-senda', function() {
		$.ajax({
			url: base_url+'auth/resend_otp',
			type: 'POST',
			dataType: 'json'
		})
		.done(function(data) {
			if (data.code == 200) {
				location.reload();
			}else{
				window.location = base_url+'pin-dompet/second';
			}
		})
		.fail(function() {
			window.location = base_url+'pin-dompet/second';
		})
		.always(function() {
		});
		
	});
}

	// Fourth
	function keyupPIN() {
		$('body').on('keyup', 'input.pininput', function(event){
			var as = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			var e = $( "#fifthdigit" );
			var f = $( "#sixthdigit" );
			var inputs = $("input.pininput");

			if(event.keyCode == 8 || event.keyCode == 46){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}
			else{
				if($(this).val().length === this.size){
					inputs.eq(inputs.index(this) + 1).focus();
				}
			}

			if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0 && e.val().length > 0 && f.val().length > 0)
			{
				var str = as.val()+b.val()+c.val()+d.val()+e.val()+f.val();
				var fix = str.replace(/\s/g, '');
				var a = new FormData();
				a.append("newpin", fix);
    			a.append("csrf_test_name", csrf_value);
				$.ajax({
					url: base_url+'auth/new_pin',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a,
					beforeSend: function () {
						swal({
							title: 'Mohon tunggu...',
							onOpen: () => {
								swal.showLoading()
							}
						});
					}
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'pin-dompet/fifth';
					}else {
						window.location = base_url+'pin-dompet/second';
					}
				})
				.fail(function() {
					window.location = base_url+'pin-dompet/second';
				})
				.always(function() {
				});
			}
		});
	}

	// Fifth
	function keyupConfirmPIN() {
		$('body').on('keyup', 'input.pininput', function(event){
			var as = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			var e = $( "#fifthdigit" );
			var f = $( "#sixthdigit" );
			var inputs = $("input.pininput");

			if(event.keyCode == 8 || event.keyCode == 46){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}
			else{
				if($(this).val().length === this.size){
					inputs.eq(inputs.index(this) + 1).focus();
				}
			}

			if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0 && e.val().length > 0 && f.val().length > 0)
			{
				var str = as.val()+b.val()+c.val()+d.val()+e.val()+f.val();
				var fix = str.replace(/\s/g, '');
				var a = new FormData();
				a.append("confirmpin", fix);
    			a.append("csrf_test_name", csrf_value);
				$.ajax({
					url: base_url+'auth/confirm_pin',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a,
					beforeSend: function () {
						swal({
							title: 'Mohon tunggu...',
							onOpen: () => {
								swal.showLoading()
							}
						});
					}
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'pin-dompet/sixth';
					}else if(data.code == 202){
						as.val('');
						b.val('');
						c.val('');
						d.val('');
						e.val('');
						f.val('');
						$("#firstdigit").focus();
						swal(
							'Maaf',
							'Kode PIN yang anda masukan berbeda.',
							'warning'
							);
					}else{
						window.location = base_url+'pin-dompet/second';
					}
				})
				.fail(function() {
					window.location = base_url+'pin-dompet/second';
				})
				.always(function() {
				});
			}
		});
	}


	// Sixth
	function disableSelectOpt() {
		$(".item_id").on('focus', function () {
			// Store the current value on focus and on change
			previous = this.value;
		}).change(function() {

			$('.item_id').not(this)
			.children('option[value=' + this.value + ']')
			.attr('disabled', true)
			.siblings().removeAttr('disabled');

		});
	}
	function validateFormQuestion() {
		$("#questionForm").validate({
				// ignore: ".item_id",
				rules: {
					firstQuestion: {
						required: true
					},
					firstAnswer: {
						required: true
					},
					secondQuestion: {
						required: true
					},
					secondAnswer: {
						required: true
					},
				},
				messages: {
					firstQuestion: {
						required: 'Pilih pertanyaan pertama...'
					},
					firstAnswer: {
						required: 'Harus Menjawab Pertanyaan Pertama...'
					},
					secondQuestion: {
						required: 'Pilih pertanyaan kedua...'
					},
					secondAnswer: {
						required: 'Harus Menjawab Pertanyaan Kedua...'
					}
				},
				submitHandler: function(form) {
					var pert = $("#firstQuestion").val();
					var kedu = $("#firstAnswer").val();
					var keti = $("#secondQuestion").val();
					var keem = $("#secondAnswer").val();

					var a = new FormData();
					a.append("question1", pert);
					a.append("answer1", kedu);
					a.append("question2", keti);
					a.append("answer2", keem);
    				a.append("csrf_test_name", csrf_value);
					$.ajax({
						url: base_url+'auth/set_question',
						type: 'POST',
						dataType: 'json',
						cache: false,
						contentType: false,
						processData: false,
						data: a,
						beforeSend: function () {
							swal({
								title: 'Mohon tunggu...',
								onOpen: () => {
									swal.showLoading()
								}
							});
						}
					})
					.done(function(data) {
						if (data.code != 200) {
							window.location = base_url+'pin-dompet/second';
						}else {
							window.location = base_url+'pin-dompet/seventh';
						}
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
					});
				}
			});
	}



	// FORGOT PIN
	// STEP ONE
	function validateAnswerQ() {
		$('#ansQuestions').keyup(function() {
			$('#ansQuestions').removeClass('error');
			$('#ansQuestions-error').detach();
		});
		$("#qForgotForm").validate({
			ignore: [],
			rules: {
				ansQuestion: {
					required: true
				}
			},
			messages: {
				ansQuestion: {
					required: 'Jawaban harus diisi..'
				}
			},
			submitHandler: function(form) {
				var que = $(".randQ").attr('q-id');
				var ans = $("#ansQuestions").val();

				var a = new FormData();
				a.append("questionQ", que);
				a.append("answerQ", ans);
				a.append("csrf_test_name", csrf_value);
				$.ajax({
					url: base_url+'auth/answer_check',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'pin-dompet/forgot-two';
					}else {
						var label = "<label id='ansQuestions-error' class='error' for='ansQuestions'>Jawaban anda salah</label>";
						var textlink = "<a href='#' class='text-dark reld' onclick='window.location.reload(true);' style='font-size: 14pt;font-weight: 600;'><u>Coba Pertanyaan Lain?</u></a>";
						$('#ansQuestions').addClass('error');
						$('.form-group').append(label);
						$('.tryanother').html(textlink);
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
				});
			}
		});
	}

	// STEP TWO
	function keyupOTPs() {
		$('body').on('keyup', 'input.digit', function(event){

			var as = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			var inputs = $("input.digit");

			if(event.keyCode == 8 || event.keyCode == 46){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}
			else{
				if($(this).val().length === this.size){
					inputs.eq(inputs.index(this) + 1).focus();
				}
			}

			if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0)
			{
				var str = as.val()+b.val()+c.val()+d.val();
				var fix = str.replace(/\s/g, '');
			   		// window.location = base_url+'pin-dompet/fourth';
			   		var a = new FormData();
			   		a.append("otp", fix);
    				a.append("csrf_test_name", csrf_value);
			   		$.ajax({
			   			url: base_url+'auth/confirm_otp_forgot',
			   			type: 'POST',
			   			dataType: 'json',
			   			cache: false,
			   			contentType: false,
			   			processData: false,
			   			data: a,
			   			beforeSend: function () {
			   				swal({
			   					title: 'Mohon tunggu...',
			   					onOpen: () => {
			   						swal.showLoading()
			   					}
			   				});
			   			}
			   		})
			   		.done(function(data) {
			   			if (data.code == 200) {
			   				window.location = base_url+'pin-dompet/forgot-three';
			   			}else if (data.code == 400) {
			   				as.val();
			   				b.val('');
			   				c.val('');
			   				d.val('');
			   				$("#firstdigit").focus();
			   				swal(
			   					'Maaf',
			   					'Kode OTP yang anda masukan, salah.',
			   					'warning'
			   					);
			   			}else{
			   				window.location = base_url+'pin-dompet/forgot-one';
			   			}
			   		})
			   		.fail(function() {
			   			// window.location = base_url+'pin-dompet/forgot-one';
			   		})
			   		.always(function() {
			   		});
			   	}
			   });
	}
	function resendOTPs() {
		$('.timer').startTimer({
			onComplete: function(){
				$('.btn-senda').removeAttr('disabled');
				$('.btn-senda').removeClass('disabled');
			}
		});
		$(document).on('click', '.btn-senda', function() {
			$.ajax({
				url: base_url+'auth/resend_otp_forgot',
				type: 'POST',
				dataType: 'json'
			})
			.done(function(data) {
				if (data.code == 200) {
					location.reload();
				}else{
					window.location = base_url+'pin-dompet/forgot-one';
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});

		});
	}


	// STEP THREE
	function keyupPINs() {
		$('body').on('keyup', 'input.pininput', function(event){
			var as = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			var e = $( "#fifthdigit" );
			var f = $( "#sixthdigit" );
			var inputs = $("input.pininput");

			if(event.keyCode == 8 || event.keyCode == 46){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}
			else{
				if($(this).val().length === this.size){
					inputs.eq(inputs.index(this) + 1).focus();
				}
			}

			if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0 && e.val().length > 0 && f.val().length > 0)
			{
				var str = as.val()+b.val()+c.val()+d.val()+e.val()+f.val();
				var fix = str.replace(/\s/g, '');
				var a = new FormData();
				a.append("newpin", fix);
    			a.append("csrf_test_name", csrf_value);
				$.ajax({
					url: base_url+'auth/update_pin',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a,
					beforeSend: function () {
						swal({
							title: 'Mohon tunggu...',
							onOpen: () => {
								swal.showLoading()
							}
						});
					}
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'pin-dompet/forgot-four';
					}else {
						window.location = base_url+'pin-dompet/forgot-one';
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
				});
			}
		});
	}

	// STEP FOUR
	function keyupConfirmPINs() {
		$('body').on('keyup', 'input.pininput', function(event){
			var as = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			var e = $( "#fifthdigit" );
			var f = $( "#sixthdigit" );
			var inputs = $("input.pininput");

			if(event.keyCode == 8 || event.keyCode == 46){
				var index = inputs.index(this);
				if (index != 0)
					inputs.eq(index - 1).val('').focus();    
			}
			else{
				if($(this).val().length === this.size){
					inputs.eq(inputs.index(this) + 1).focus();
				}
			}

			if (as.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0 && e.val().length > 0 && f.val().length > 0)
			{
				var str = as.val()+b.val()+c.val()+d.val()+e.val()+f.val();
				var fix = str.replace(/\s/g, '');
				var a = new FormData();
				a.append("confirmpin", fix);
    			a.append("csrf_test_name", csrf_value);
				$.ajax({
					url: base_url+'auth/confirm_upd_pin',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a,
					beforeSend: function () {
						swal({
							title: 'Mohon tunggu...',
							onOpen: () => {
								swal.showLoading()
							}
						});
					}
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'dompet';
					}else if(data.code == 202){
						as.val('');
						b.val('');
						c.val('');
						d.val('');
						e.val('');
						f.val('');
						$("#firstdigit").focus();
						swal(
							'Maaf',
							'Kode PIN yang anda masukan berbeda.',
							'warning'
							);
					}else{
						swal(
							'Maaf',
							'Terjadi kesalahan...',
							'warning'
							);
						window.location = base_url+'pin-dompet/forgot-one';
					}
				})
				.fail(function() {
						swal(
							'Maaf',
							'Terjadi kesalahan...',
							'warning'
							);
						window.location = base_url+'pin-dompet/forgot-one';
				})
				.always(function() {
				});
			}
		});
	}