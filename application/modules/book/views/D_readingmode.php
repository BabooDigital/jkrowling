<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">
	<title><?php echo $title; ?></title>
	<?php if (isset($css)): ?><?php echo get_css($css) ?><?php endif ?>
	<script type="text/javascript">
		var base_url = '<?php echo base_url() ?>';
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
	</script>
	<?php echo "<script type='text/javascript' src='https://".MID_BASE_URL."/snap/snap.js' data-client-key='".MID_CLIENT."'></script>"; ?>
</head>
<style> .btn-buy {width: 89px; text-align: center; color: white; padding-top: 5px; padding-bottom: 5px; border-radius: 15px; background-color: #7661ca; } </style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 bg-dark"></div>
			<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
				<div class="col-md-8 bg-white">
				<?php }else{ ?>
					<div class="col-md-8 bg-white p-0">
					<?php } ?>
				<div id="readingModeContent" class="mb-100">
					<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
						<div class="card p-30" style="border-radius: 0;border: none;">
						<div class="card-body" style="padding-bottom:200px;">
					<?php }else{ ?>
						<div class="card" style="border-radius: 0;border: none;">
						<div class="card-body p-0">
					<?php } ?>
							<!-- <div class="media">
							<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
							<?php if($detail_book['data']['author']['avatar'] == NULL){ 
							}else{
								echo $detail_book['data']['author']['avatar']; } ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
								<div class="media-body">
									<h5 class="nametitle2 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></h5>
									<p><small><span>Jakarta, Indonesia</span></small></p>
									<a href="#" data-follow="<?php echo $detail_book['data']['book_info']['book_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ($detail_book['data']['author']['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
								</div>
							</div> -->
							<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">

							<div id="post-data">
								<?php $this->load->view('data/D_readingmode'); ?>
							</div>
							<center><div class="loader text-center mt-10" style="display:none;"></div></center>
							
							<div class="mt-10">
								<div class="bg-white p-10">
									<p></p>
									<div class="row">
										<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
											<div class="col-md-3 spadding">
											<?php }else{ 
												function incrementalHash($len = 5){$charset = "0123456789abcdefghijklmnopqrstuvwxyz"; $base = strlen($charset); $result = ''; $now = explode(' ', microtime())[1]; while ($now >= $base){$i = $now % $base; $result = $charset[$i] . $result; $now /= $base; } return substr($result, -5); }
												$generateDate = $detail_book['data']['book_info']['epoch_time'];
												$datapassword = 'ID#' . $detail_book['data']['book_info']['book_id'] . '#' . $detail_book['data']['book_info']['title_book'] . '#' . strtotime($generateDate);
												$password = hash_hmac('sha512', $datapassword, strtotime($generateDate)).incrementalHash(); ?>
												<div class="col-md-3 spadding" dat-cpss="<?php echo $password; ?>">
											</div>
												<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
							<nav id="cobamenu" class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
								<input type="hidden" value="post-0" />	
								<div class="container-fluid pt-5 pb-5">
									<div id="buatappend" class="col-md-2">
									</div>
									<div class="col-md-8">
										<ul class="navbar-nav pull-right">
											<li class="nav-item"><span class="text-muted"><strong id="chapter_number">Description</strong></span></li>
										</ul>
										<ul class="navbar-nav">
											<li class="nav-item">
												<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>">
													<img src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="30">
												</a>
											</li>
											<li class="nav-item ml-20">
												<?php 
												$url = base_url(uri_string());
												$replace = str_replace("/read", "#comment", $url);
												?>
												<a href="<?php echo $replace; ?>"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="30"></a>
											</li>
										</ul>
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="progress navprogress">
									<!-- <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 80%;"></div> -->
								</div>
							</nav>
						<?php } ?>
						<script type="text/javascript">
							var count_data = '<?php echo $detailChapter; ?>';
						</script>
					</div>
				</div>
				</div>
			<!-- batas -->
			<div class="col-md-2 bg-dark">
				<div style="position: fixed;">
					<a onclick="showLoading()" href="javascript:void(0);" class="backbtn" style="font-size: 14pt;color: #fff;">&#88;</a>
				</div>
			<!-- </div> -->
			</div>
		</div>
	</div>
	<div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<?php $this->load->view('data/D_paybook'); ?>
	</div>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == true) { ?>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.worker.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>
		<script>$(".backbtn").on("click", function() {
        window.history.go(-1)
    });getBooks();
		function getBooks() {var id = $('#iaidubi').val(); var di = $('.spadding').attr('dat-cpss'); $.ajax({url: base_url+'detailBooks', type: 'POST', dataType: 'json', data: {book_id: id, csrf_test_name: csrf_value} }) .done(function(data) {if (data.c == 200) {showPDF(atob(data.dat.u), di.slice(0, -5)); } }) .fail(function() {}) .always(function() {}); 
		var __PDF_DOC,
		__CURRENT_PAGE,
		__TOTAL_PAGES,
		pdfFile,
		__PAGE_RENDERING_IN_PROGRESS = 0,
		__CANVAS = $('#pdf-canvas').get(0),
		pageElement = document.getElementById('pdf-viewer');

		function showPDF(pdf_url, password) {
			$(".loader").show();
			PDFJS.disableStream = true;
			PDFJS.getDocument({ url: pdf_url, password: password }).then(function(pdf_doc) {
				__PDF_DOC = pdf_doc;
				__TOTAL_PAGES = __PDF_DOC.numPages;

				for(page = 1; page <= __TOTAL_PAGES; page++) {
					canvas = document.createElement("canvas");    
					canvas.className = 'pdf-page-canvas mb-10 w-100';      
					pageElement.appendChild(canvas);            
					showPage(page, canvas);
				}

        // showPage(1);
    }).catch(function(error) { console.log(error)

    	if(error.name == 'PasswordException') {
    		$("#password-message").text(error.code == 2 ? error.message : '');
    	}
    	else {
    		console.log(error.message);
    	}
    });
}

function showPage(page_no, canvas) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	__PDF_DOC.getPage(page_no).then(function(page) {
		var scale = 1;
		viewport = page.getViewport(scale);
		canvas.height = viewport.height;
		canvas.width = viewport.width;        
		page.render({canvasContext: canvas.getContext('2d'), viewport: viewport});
		$(".loader").hide();
	});
}
}
$("#buy-btn").click(function(event) {
	event.preventDefault();
	$(this).attr("disabled", "disabled");
		// console.log("clicked");

		$.ajax({
			url: base_url+'pay_book/token',
			type: "POST",
			data:{id_book:$("#iaidubi").val(), url_redirect:window.location.href, csrf_test_name: csrf_value},
			cache: false,
			success: function(data) {
				var resultType = document.getElementById('result-type');
				var resultData = document.getElementById('result-data');
				function changeResult(type,data){
					$("#result-type").val(type);
					$("#result-data").val(JSON.stringify(data));
				}
				snap.pay(data, {

					onSuccess: function(result){
						changeResult('success', result);
						console.log(result.status_message);
						console.log(result);
						$("#payment-form").submit();
					},
					onPending: function(result){
						changeResult('pending', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					},
					onError: function(result){
						changeResult('error', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					}
				});
			}
		});
	});
</script>
<?php }else{ ?>
	<script type="text/javascript" src="<?php echo base_url('public/js/custom/reading_mode.js'); ?>"></script>
<?php } ?>
</body>
</html>