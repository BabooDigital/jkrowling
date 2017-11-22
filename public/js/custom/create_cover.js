	//[OPEN] Preview Image Upload Function
	function tampilkanPreview(gambar, idpreview) {
		// membuat objek gambar
		var gb = gambar.files;

		// loop untuk merender gambar
		for (var i = 0; i < gb.length; i++) {
			// bikin variabel
			var gbPreview = gb[i];
			var imageType = /image.*/;
			var preview = document.getElementById(idpreview);
			var reader = new FileReader();

			if (gbPreview.type.match(imageType)) {
				// jika tipe data sesuai
				preview.file = gbPreview;
				reader.onload = (function(element) {
					return function(e) {
						element.src = e.target.result;
					};
				})(preview);

				// membaca data URL gambar
				reader.readAsDataURL(gbPreview);
			} else {
				// jika tipe data tidak sesuai
				alert("Type file tidak sesuai. Khusus image.");
			}

		}
	}
	//[CLOSE] Preview Image Upload Function

	$(document).ready(function() {
		//[OPEN] BACK BUTTON
		$('.backbtn').on('click', function() {
			window.history.go(-1);
		});
		//[CLOSE] BACK BUTTON

		//[OPEN] STICKY SIDE MENU
		var window_width = $(window).width();

		if (window_width < 768) {
			$(".stickymenu").trigger("sticky_kit:detach");
		} else {
			make_sticky();
		}

		$(window).resize(function() {

			window_width = $(window).width();

			if (window_width < 768) {
				$(".stickymenu").trigger("sticky_kit:detach");
			} else {
				make_sticky();
			}

		});

		function make_sticky() {
			$(".stickymenu").stick_in_parent();
		}
		//[CLOSE] STICKY SIDE MENU

		//[OPEN] CANVAS COVER TEXT SIZE WITH H1-H6
		$('#txt-size1').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h1');
		});
		$('#txt-size2').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h2');
		});
		$('#txt-size3').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h3');
		});
		$('#txt-size4').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h4');
		});
		$('#txt-size5').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h5');
		});
		$('#txt-size6').click(function() {
			$('#parenttxttitle').removeClass().toggleClass('txt-h6');
		});
		//[CLOSE] CANVAS COVER TEXT SIZE WITH H1-H6

		//[OPEN] CANVAS COVER TEXT FONT FAMILY
		$('#txt-font1').click(function() {
			$('#txtfontfam').removeClass().toggleClass('setfont1');
		});
		$('#txt-font2').click(function() {
			$('#txtfontfam').removeClass().toggleClass('setfont2');
		});
		$('#txt-font3').click(function() {
			$('#txtfontfam').removeClass().toggleClass('setfont3');
		});
		$('#txt-font4').click(function() {
			$('#txtfontfam').removeClass().toggleClass('setfont4');
		});
		$('#txt-font5').click(function() {
			$('#txtfontfam').removeClass().toggleClass('setfont5');
		});
		//[CLOSE] CANVAS COVER TEXT FONT FAMILY

		//[OPEN] CANVAS COVER TEXT ALIGN SETTING
		$('#a-topleft').click(function() {
			$('#coverCreation, #texttitle').removeClass().toggleClass('text-left');
		});
		$('#a-topmid').click(function() {
			$('#coverCreation, #texttitle').removeClass().toggleClass('text-center');
		});
		$('#a-topright').click(function() {
			$('#coverCreation, #texttitle').removeClass().toggleClass('text-right');
		});

		$('#a-centerleft').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-left');
			$('#texttitle').removeClass().toggleClass('a-txtcenter');
		});
		$('#a-centermid').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-center');
			$('#texttitle').removeClass().toggleClass('a-txtcenter');
		});
		$('#a-centerright').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-right');
			$('#texttitle').removeClass().toggleClass('a-txtcenter');
		});

		$('#a-botleft').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-left');
			$('#texttitle').removeClass().toggleClass('a-txtbot');
		});
		$('#a-botmid').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-center');
			$('#texttitle').removeClass().toggleClass('a-txtbot');
		});
		$('#a-botright').click(function() {
			$('#coverCreation').removeClass().toggleClass('text-right');
			$('#texttitle').removeClass().toggleClass('a-txtbot');
		});
		//[CLOSE] CANVAS COVER TEXT ALIGN SETTING

		//[OPEN] CALL COLORPICKER
		$(function() {
			$('#mycp').colorpicker();
		});
		//[CLOSE] CALL COLORPICKER

		//[OPEN] CHANGE COLOR BGROUND & FONT
		var color = '';
		// FONT
		$('.colortxt').click(function() {
			var x = $(this).css('backgroundColor');
			hexc(x);
			$('#textcolor').css({
				color: color
			});

		});
		// BGROUND
		$('.colorbg').click(function() {
			var x = $(this).css('backgroundColor');
			hexc(x);
			$('#bg-cover').removeAttr('src').css({
				background: color
			});

		});

		function hexc(colorval) {
			var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			delete(parts[0]);
			for (var i = 1; i <= 3; ++i) {
				parts[i] = parseInt(parts[i]).toString(16);
				if (parts[i].length == 1) parts[i] = '0' + parts[i];
			}
			color = '#' + parts.join('');

		}
		//[CLOSE] CHANGE COLOR BGROUND & FONT

		//[OPEN] FUNCTION TYPING ON CANVAS
		var inputBox = document.getElementById('cover_title');
		inputBox.onkeyup = function() {
			document.getElementById('txtfontfam').innerHTML = inputBox.value;
		}
		//[CLOSE] FUNCTION TYPING ON CANVAS

		//[OPEN] GET DATE MONTH YEAR NOW FOR COVER NAME
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec'];
		var date = new Date();
		var yy = date.getYear();
		var mon = date.getMonth();
		var day = date.getDate();
		var min = date.getMinutes();
		var sec = date.getSeconds();
		var msec = date.getMilliseconds();
		var year = (yy < 1000) ? yy + 1900 : yy;
		var aws = msec + "_" + sec + "_" + min + "_" + day + "_" + months[mon] + "_" + year;
		//[CLOSE] GET DATE MONTH YEAR NOW FOR COVER NAME

		//[OPEN] CANVAS FUNCTION AND AJAX TO SAVE
		var element = $("#yourcoverimage"); // global variable
		var getCanvas; // global variable

		$("#done-cover").on('click', function() {
			html2canvas(element, {
				onrendered: function(canvas) {
					$("#previewImage").append(canvas);
					getCanvas = canvas;
					var dataURL = getCanvas.toDataURL("image/png");

					var blobBin = atob(dataURL.split(',')[1]);
					var array = [];
					for (var i = 0; i < blobBin.length; i++) {
						array.push(blobBin.charCodeAt(i));
					}
					var file = new Blob([new Uint8Array(array)], { type: 'image/png' });

					var formData = new FormData();


					formData.append("user_id", $("input:hidden[name=iaiduui]").val());
					formData.append('cover_url', file, aws + '.png');

					swal({
						title: 'Selesai membuat?',
						text: "Anda tidak dapat mengubah cover lagi",
						type: 'question',
						showCancelButton: true,
						confirmButtonColor: '#b54aca',
						cancelButtonColor: '#d33',
						confirmButtonText	: 'Gunakan'
					}).then((saveCover) => {
						if (saveCover) {
							$.ajax({
								async: true,
								crossDomain: true,
								url: 'send_cover',
								method: 'post',
								processData: false,
								contentType: false,
								dataType: 'json',
								mimeType: "multipart/form-data",
								data: formData,
								success: function () {
									window.history.go(-1);
								},
								error: function () {
									console.log('Error');
								}
							});
						}
					});
				}
			});
		});
		//[CLOSE] CANVAS FUNCTION AND AJAX TO SAVE
	});