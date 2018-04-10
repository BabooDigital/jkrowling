<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a>
		<span class="mx-auto title-nav">Keamanan Jual Beli</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Tentukan Pertanyaan Keamanan</span>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1"></div>
				<div class="col-10">
					<span class="text-white text-p">Pertanyaan keamanan digunakan pada saat anda lupa PIN</span>
				</div>
				<div class="col-1"></div>
			</div>
		</div>
		<form id="questionForm">
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="firstQuestion" class="text-white">Pertanyaan 1</label>
						<select class="form-control pin-form-text text-white item_id required" name="firstQuestions" id="firstQuestion" required>
							<option value="">Pilih pertanyaan mu..</option>
							<option id='opt' value="1">Apa nama panggilan dari teman baikmu pada saat SMA?</option>
							<option id='opt' value="2">Apa nama dari binatang peliharaan pertamamu?</option>
							<option id='opt' value="3">Apa pekerjaan impianmu?</option>
							<option id='opt' value="4">Apa nama panggilan masa kecilmu?</option>
							<option id='opt' value="5">Siapa penyanyi atau ban favoritemu pada saat SMA?</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="firstAnsware" class="text-white">Jawaban</label>
						<input type="text" name="firstAnsware" class="form-control text-white pin-form-text" id="firstAnsware" required>
					</div>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="secondQuestion" class="text-white">Pertanyaan 2</label>
						<select class="form-control pin-form-text text-white item_id required" name="secondQuestions" id="secondQuestion" required>
							<option value="">Pilih pertanyaan mu..</option>
							<option id='opt' value="1">Apa nama panggilan dari teman baikmu pada saat SMA?</option>
							<option id='opt' value="2">Apa nama dari binatang peliharaan pertamamu?</option>
							<option id='opt' value="3">Apa pekerjaan impianmu?</option>
							<option id='opt' value="4">Apa nama panggilan masa kecilmu?</option>
							<option id='opt' value="5">Siapa penyanyi atau ban favoritemu pada saat SMA?</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="secondAnsware" class="text-white">Jawaban</label>
						<input type="text" name="secondAnsware" class="form-control text-white pin-form-text" id="secondAnsware" required>
					</div>
				</div>
			</div>
			<div class="text-center">
				<div class="row mt-20">
					<div class="col-1"></div>
					<div class="col-10">
						<button type="submit" class="btn-ok btn-okq w-100">OK</button>
					</div>
					<div class="col-1"></div>
				</div>
			</div>
		</form>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.backcheck').click(function () {
				window.history.back();
			});
			$(".item_id").on('focus', function ()
			{
				// Store the current value on focus and on change
				previous = this.value;
			}).change(function() {
				// Do something with the previous value after the change		
				//alert(previous);
				var previoues_val=previous;//alert(p);
				var selected=$(this).val();
				var opts = $(this)[0].options;		
				var array = $.map(opts, function(elem) {
					return (elem.value || elem.text);
				});
				//alert(array);
				$('.item_id').each(function() {
					var v=$(this).val();
					if(previoues_val != '' )
					{
						//alert(p);
						$('option[value="' + previoues_val + '"]').removeAttr('disabled'); 
					}
					$('option[value="' + selected + '"]').attr('disabled','disabled');
					$('option[value=""]').removeAttr('disabled'); 
				});
				// Make sure the previous value is updated
				previous = this.value;
			});

			$(".btn-okq").on('click', function () {
				window.location = base_url+'pin_dompet/seventh';
			});

			// $("#questionForm").validate({
			// 	ignore: [],
			// 	rules: {
			// 		firstAnsware: {
			// 			required: true
			// 		},
			// 		secondAnsware: {
			// 			required: true
			// 		},
			// 	},
			// 	messages: {
			// 		firstAnsware: {
			// 			required: 'Harus Menjawab Pertanyaan Pertama...'
			// 		},
			// 		secondAnsware: {
			// 			required: 'Harus Menjawab Pertanyaan Kedua...'
			// 		}
			// 	},
			// 	submitHandler: function(form) {
			// 		window.location = base_url+'pin_dompet/third';
			// 	}
			// });
		});

</script>
</body>
</html>