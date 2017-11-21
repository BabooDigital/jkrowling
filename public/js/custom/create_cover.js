$(document).ready(function() {

	$('.backbtn').on('click', function() {
		window.history.go(-1);
	});

//[OPEN] CANVAS COVER TEXT SIZE WITH H1-H6
$('#txt-size1').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h1');
	console.log('h1');
});
$('#txt-size2').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h2');
	console.log('h2');
});
$('#txt-size3').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h3');
	console.log('h3');
});
$('#txt-size4').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h4');
	console.log('h4');
});
$('#txt-size5').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h5');
	console.log('h5');
});
$('#txt-size6').click(function() {
	$('#texttitle').removeClass().toggleClass('txt-h6');
	console.log('h6');
});
//[CLOSE] CANVAS COVER TEXT SIZE WITH H1-H6

//[OPEN] CANVAS COVER TEXT ALIGN SETTING
$('#a-topleft').click(function() {
	$('#coverCreation').removeClass().toggleClass('text-left');
	console.log('topleft');
});
$('#a-topmid').click(function() {
	$('#coverCreation').removeClass().toggleClass('text-center');
	console.log('topmid');
});
$('#a-topright').click(function() {
	$('#coverCreation').removeClass().toggleClass('text-right');
	console.log('topright');
});

$('#a-centerleft').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtcenter text-left');
	console.log('centerleft');
});
$('#a-centermid').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtcenter text-center');
	console.log('centermid');
});
$('#a-centerright').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtcenter text-right');
	console.log('centerright');
});

$('#a-botleft').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtbot text-left');
	console.log('botleft');
});
$('#a-botmid').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtbot text-center');
	console.log('botmid');
});
$('#a-botright').click(function() {
	$('#coverCreation').removeClass().toggleClass('a-txtbot text-right');
	console.log('botright');
});
//[CLOSE] CANVAS COVER TEXT ALIGN SETTING

$(function () {
	$('#mycp').colorpicker();
});

var inputBox = document.getElementById('cover_title');
var color = '';

$('.colorbg').click(function() {
	var x = $(this).css('backgroundColor');
	hexc(x);
	$('#bg-cover').css({
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

inputBox.onkeyup = function(){
	document.getElementById('texttitle').innerHTML = inputBox.value;
}

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
var aws = msec + "_" + sec +"_" + min +"_" + day + "_" + months[mon] + "_" + year;
//[CLOSE] GET DATE MONTH YEAR NOW FOR COVER NAME

	var element = $("#yourcoverimage"); // global variable
	var getCanvas; // global variable

	$("#btn-Preview-Image").on('click', function () {
		html2canvas(element, {
			onrendered: function (canvas) {
				$("#previewImage").append(canvas);
				getCanvas = canvas;
				var dataURL = getCanvas.toDataURL("image/png");
				var newData = dataURL.replace(/^data:image\/png/, "data:application/octet-stream");
				//return a promise that resolves with a File instance
				function urltoFile(url, filename, mimeType){
					return (fetch(url)
						.then(function(res){return res.arrayBuffer();})
						.then(function(buf){return new File([buf], filename, {type:mimeType});})
						);
				}
				//Usage example:
				var good = urltoFile(dataURL, aws+'.png', 'image/png');
				console.log ($("#uploadcover").val());
				var formData = new FormData();


				formData.append("user_id", $("input:hidden[name=user_id]").val());
				formData.append('cover_url', $("#uploadcover")[0].files[0]);
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
					success: function(response) {
						if(response.success) {
			               //Post the imgur url to your server
			               // $.post("C:\\", response.data.link);
			               console.log("success");
			           }
			       }
			   })
				.always(function() {
					for (var pair of formData.entries()) {
						console.log(pair[0]+ ', ' + pair[1]); 
					}
				});
			}
		});
	});

	$("#btn-Convert-Html2Image").on('click', function () {
		var imgageData = getCanvas.toDataURL("image/png");
	    // Now browser starts downloading it instead of just showing it
	    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
	    $("#btn-Convert-Html2Image").attr("download", aws+".png").attr("href", newData);
	    console.log(imgageData);
	});

});