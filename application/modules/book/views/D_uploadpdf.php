<style type="text/css">

#upload-button {
	width: 150px;
	display: block;
	margin: 20px auto;
	cursor: pointer;
}

#file-to-upload {
	display: none;
}

#pdf-main-container {
	width: 100%;
	margin: 20px auto;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}

#pdf-contents {
	display: none;
}

#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	/*width: 100%;*/
	border: 1px solid rgba(0,0,0,0.2);
	box-sizing: border-box;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;
}

.btn-upl-pdf {
	background: #fff;
    padding: 10px;
    border-radius: 35px;
    border: 1px #c3c3c3 solid;
}

.btn-nav-pdf {
	background: #fcfcff;
	border: 1px #c3c3c3 solid;
	border-radius: 6px;
}

</style>
<body id="pageContent" style="background-color: #f7f6f4;">
	<nav class="navbar navbar-expand-lg fixed-top" style="height:60px;background: #fcfcff;">
		<div class="container">
			<form class="navbar-brande">
				<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; <span>Upload PDF</span> </button>
			</form>
			<form class="form-inline">
				<a href="javascript:void(0);" class="mr-20 change-file-pdf" style="color: #333;"> GANTI FILE </a>
				<a href="javascript:void(0);" class="btn-transparant" id="post-uploadpdf" style="color: #7554bd;"><img src="<?php echo base_url() ?>public/img/assets/icon_publish.png" width="23"> &nbsp;<span>Publish</span></a> 
			</form>
		</div>
	</nav>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="pdf-main-container" class="mt-30">
					<div id="pdf-loader">Loading PDF ...</div>
					<div id="pdf-contents" class="pl-10 pr-10 text-center">
						<div id="pdf-meta">
							<div id="pdf-buttons">
								<button id="pdf-prev" class="btn-nav-pdf"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
								<button id="pdf-next" class="btn-nav-pdf"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
							</div>
							<div id="page-count-container">Halaman <div id="pdf-current-page"></div> dari <div id="pdf-total-pages"></div></div>
						</div>
						<canvas id="pdf-canvas"></canvas>
						<div id="page-loader">Mohon tunggu...</div>
					</div>
				</div>
				<div class="mt-100 pdf-preview">
					<div class="row">
						<img src="<?php echo base_url('public/img/assets/icon_upload.png'); ?>" class="mx-auto">
					</div>
					<div class="row mt-10">
						<p class="mx-auto" style="font-size: 15pt;">Upload file pdf</p>
					</div>
					<div class="row">
						<button id="upload-button" class="btn-upl-pdf pdf-file">Pilih File</button> 
						<input type="file" id="file-to-upload" accept="application/pdf" />
					</div>
					<div class="row pr-10 pl-10">
						<div class='pdf_file_nec' pdf_book="<?php echo $this->session->userdata('idBook_'); ?>"></div>
						<div class='pdf_file_in'></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.worker.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>
	<script>
		checking_pdf();

		var __PDF_DOC,
		__CURRENT_PAGE,
		__TOTAL_PAGES,
		__PAGE_RENDERING_IN_PROGRESS = 0,
		__CANVAS = $('#pdf-canvas').get(0),
		__CANVAS_CTX = __CANVAS.getContext('2d');

		function showPDF(pdf_url) {
			$("#pdf-loader").show();

			PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
				__PDF_DOC = pdf_doc;
				__TOTAL_PAGES = __PDF_DOC.numPages;

		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-loader").hide();
		$(".pdf-preview").hide();
		$("#pdf-contents").show();
		$("#pdf-total-pages").text(__TOTAL_PAGES);

		// Show the first page
		showPage(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-loader").hide();
		$("#upload-button").show();
		
		alert(error.message);
	});;
}

function showPage(page_no) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas").hide();
	$("#page-loader").show();

	// Update current page in HTML
	$("#pdf-current-page").text(page_no);
	
	// Fetch the page
	__PDF_DOC.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next, #pdf-prev").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas").show();
			$("#page-loader").hide();
		});
	});
}

// Upon click this should should trigger click on the #file-to-upload file input element
// This is better than showing the not-good-looking file input element
$("#upload-button").on('click', function() {
	$("#file-to-upload").trigger('click');
});

// When user chooses a PDF file
$("#file-to-upload").on('change', function() {
	// Validate whether PDF
	if(['application/pdf'].indexOf($("#file-to-upload").get(0).files[0].type) == -1) {
		alert('Error : Not a PDF');
		return;
	}

	$("#upload-button").hide();

	// Send the object url of the pdf
	showPDF(URL.createObjectURL($("#file-to-upload").get(0).files[0]));
});

// Previous page of the PDF
$("#pdf-prev").on('click', function() {
	if(__CURRENT_PAGE != 1)
		showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
	if(__CURRENT_PAGE != __TOTAL_PAGES)
		showPage(++__CURRENT_PAGE);
});
$(function() {      
      //Enable swiping...
      $("#pdf-canvas").swipe( {
        //Generic swipe handler for all directions
        swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
        	var page_no = Math.max(1, __CURRENT_PAGE - 1);
        	if (page_no !== __CURRENT_PAGE) {
        		__CURRENT_PAGE = page_no;
        		showPage(__CURRENT_PAGE);
        	}
        },
        swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
        	var page_no = Math.min(__TOTAL_PAGES, __CURRENT_PAGE + 1);
        	if (page_no !== __CURRENT_PAGE) {
        		__CURRENT_PAGE = page_no;
        		showPage(__CURRENT_PAGE);
        	}
        }
    });
  });

</script>
</body>
</html>