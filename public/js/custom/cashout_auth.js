$(document).ready(function() {

	$('.backcheck').click(function () {
		window.history.back();
	});

	$(document).on('click', '.btn-detdomp', function() {
		event.preventDefault();
		/* Act on the event */
		$('#pinauth-modal').modal('show')
		$("#firstdigit").focus();
	});
	$(document).on('click', '.activeDompet', function() {
		event.preventDefault();
		/* Act on the event */
		window.location = base_url+'pin-dompet';
	});
	$(document).on('click', '.activeWallet', function() {
		event.preventDefault();
		$('#wallet-modal').modal({backdrop: 'static', keyboard: false});
	});
	$(document).on('click', '.detail-wallet', function() {
		event.preventDefault();
		$('#pinauthdes-modal').modal({backdrop: 'static', keyboard: false});
		$("#firstdigit").focus();
	});
	keyupPIN();
});

// MODAL 
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
			a.append("confirmpin", fix);
			a.append("csrf_test_name", csrf_value);
			$.ajax({
				url: base_url+'auth/check_pin',
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
					window.location = base_url+'profile';
				}else {
					window.location = base_url+'dompet';
				}
			})
			.fail(function() {
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
			})
			.always(function() {
			});
		}
	});
}

// First Cashout
function checkAccount() {
	$(document).on('click', '.btnNextd', function(){
		var as = $( ".txtInpRek" ).val();
		var a = new FormData();
		a.append("account_number", as);
		a.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url+'auth/check_acc',
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
				localStorage.setItem("rekInf", as);
				window.location = base_url+'cashout/second';
			}else{
				localStorage.setItem("rekInf", data.data.account.account_number);
				window.location = base_url+'cashout/third';
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
		});
		
	});
}
function selectAccount() {
		$(document).on('click', '.nextActCash', function(){
		
		var as = $(this).attr('datacc');
		var a = new FormData();
		a.append("account_number", as);
		a.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url+'auth/check_acc',
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
				localStorage.setItem("rekInf", as);
				window.location = base_url+'cashout/second';
			}else{
				localStorage.setItem("rekInf", data.data.account.account_number);
				window.location = base_url+'cashout/third';
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
		});
	});
}
function keyupInputRek() {
	$("#noRekInput").on("keyup", function() {
		if ($('#noRekInput').val() > 0) {
			$('.btnNextd').prop('disabled', false);
		}else{
			$('.btnNextd').prop('disabled', true);
		} 

		var value = $(this).val().toLowerCase();
		$(".list-group a").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
}


// Second Cashout
function getRek() {
	frm = $('#inpNoRek');
	if (storedNames !== null) {
		var storedNames = localStorage.getItem("rekInf");
		frm.val(storedNames);
	}
}
function validationFormBank() {
	$("#formBankData").validate({
		ignore: [],
		rules: {
			inpNoRek: {
				required: true
			},
			inpNamaBank: {
				required: true
			},
			inpNamaRek: {
				required: true
			}
		},
		messages: {
			inpNoRek: {
				required: 'Masukan nomor rekening.'
			},
			inpNamaBank: {
				required: 'Pilih Nama Bank Terlebih dahulu.'
			},
			inpNamaRek: {
				required: 'Nama Penerima Bank Sangat di Perlukan.'
			}
		},
		submitHandler: function(form) {
			var as = $( "#inpNoRek" ).val();
			var bs = $( "#inpNamaRek" ).val();
			var cs = $( "#inpNamaBank" ).val();
			var a = new FormData();
			a.append("numb", as);
			a.append("name", bs);
			a.append("code", cs);
			a.append("csrf_test_name", csrf_value);
			$.ajax({
				url: base_url+'auth/create_acc',
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
					localStorage.setItem("rekInf", data.data.account_number);
					window.location = base_url+'cashout/third';
				}else{
					swal(
						'Maaf',
						'Terjadi kesalahan atau rekening yang anda masukan sudah terdaftar.',
						'warning'
						);
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


// Third Cashout
function rekValidation() {
	var ab = $('#namaRek');
	var ac = $('#nomRek');
	var ad = $('#namaBank');
	var ae = $('.tfRek');
	var af = $('.amount');
	var storedNames = localStorage.getItem("rekInf");
	var a = new FormData();
	a.append("account_number", storedNames);
	a.append("csrf_test_name", csrf_value);
	$.ajax({
		url: base_url+'auth/check_acc',
		type: 'POST',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: a,
		beforeSend: function () {
			swal({
				title: 'Pengecekan...',
				onOpen: () => {
					swal.showLoading()
				}
			});
		}
	})
	.done(function(data) {
		if (data.code != 200) {
			localStorage.setItem("rekInf", storedNames);
			window.location = base_url+'cashout/second';
		}else{
			ab.text(data.data.account.account_name);
			ac.text(data.data.account.account_number);
			ad.text(data.data.account.bank_name);
			ae.attr('accid', data.data.account.id_acc);
			ae.attr('dataRek', data.data.account.account_number);
			af.text($.number(data.data.balance_info, 0, '.' ));
			swal({
				title: 'Selesai..',
				onOpen: () => {
					swal.hideLoading()
				}
			});
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});
}
function validationFormCashout() {
	$('.tfrek').click(function () {
		$('#selectNoRek').modal('show');
	});
	$("#formDataCashOut").validate({
		ignore: [],
		rules: {
			inpJumSal: {
				required: true,
				min: 200000
			}
		},
		messages: {
			inpJumSal: {
				required: 'Masukan saldo yang ingin ditarik.',
				min : 'Minimum penarikan sebesar Rp 200.000'
			}
		},
		submitHandler: function(form) {
			var as = $( ".tfRek" ).attr('datarek');
			var bs = $( "#inpJumSal" ).val();
			var a = new FormData();
			a.append("accnum", as);
			a.append("amount", bs);
			a.append("csrf_test_name", csrf_value);
			$.ajax({
				url: base_url+'auth/create_payout',
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
					window.location = base_url+'cashout/fourth';
				}else{
					swal(
						'Maaf',
						'Terjadi kesalahan..',
						'warning'
						);
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
function selectRekModal() {
		$(document).on('click', '.modList', function(){
			var ab = $('#namaRek');
			var ac = $('#nomRek');
			var ad = $('#namaBank');
			var ae = $(this).attr('rekdata');
			var af = $('.amount');
			var ag = $('.tfRek');
			var a = new FormData();
			a.append("account_number", ae);
			a.append("csrf_test_name", csrf_value);
			$.ajax({
				url: base_url+'auth/check_acc',
				type: 'POST',
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: a,
				beforeSend: function () {
					swal({
						title: 'Pengecekan...',
						onOpen: () => {
							swal.showLoading()
						}
					});
				}
			})
			.done(function(data) {
				if (data.code != 200) {
					localStorage.setItem("rekInf", ae);
					window.location = base_url+'cashout/second';
				}else{
					localStorage.setItem("rekInf", ae);
					ab.text(data.data.account.account_name);
					ac.text(data.data.account.account_number);
					ad.text(data.data.account.bank_name);
					af.text($.number(data.data.balance_info, 0, '.' ));
					ag.attr('dataRek', data.data.account.account_number);
					ag.attr('accid', data.data.account.id_acc);
					swal({
						title: 'Selesai..',
						onOpen: () => {
							swal.hideLoading()
						}
					});
					$('#selectNoRek').modal('hide');
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
			});
		});
}