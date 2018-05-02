<style>
	input.error, input.error:focus {
		border-bottom: 1px solid red;
	}
</style>
<body>
	<nav class="navbar bg-white">
		<a class="navbar-brand" href="#"><i class="fa fa-arrow-left text-dark"></i></a>
	</nav>
	<form id="qForgotForm">
		<div class="container mb-50">
			<div class="row">
				<div class="col-12">
					<h4 class="font-weight-bold">Lupa PIN</h4>
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<span>Silakan jawab pertanyaan keamanan berikut</span>
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<p><span class="d-block font-weight-bold">Pertanyaan:</span>
						<span class="randQ" q-id="<?php echo $listQ['question_id']; ?>"><?php echo $listQ['question_text']; ?></span></p>
					</div>
				</div>
				<div class="row mt-15">
					<div class="col-12">
						<div class="form-group">
							<input type="text" class="form-control fieldStyle border-top-0 border-right-0 border-left-0 rounded-0" id="ansQuestions" placeholder="Jawaban" name="ansQuestion" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="row mt-30">
					<div class="col-12">
						<div class="text-center tryanother">
							
						</div>
					</div>
				</div>
			</div>
			<nav class="navbar bg-white fixed-bottom p-0">
				<button type="submit" class="w-100 text-white border-0 p-15 btnfullsubmit">Submit</button>
			</nav>
		</form>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>public/js/custom/pin_auth.js"></script>
	<script>
		$(document).ready(function () {
			validateAnswerQ();
			$('input').on('focus',function(){
				var inputHeight=$('.container').height();
				$("html, body").animate({ scrollTop: inputHeight}, 500);
				return false;
			});
			$('.reld').on('click',function(){
				window.location.reload(true);
				console.log('change');
			});
		});
	</script>
</body>
</html>