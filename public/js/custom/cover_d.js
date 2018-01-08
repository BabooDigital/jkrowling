$(function() {
			$('#mycp').colorpicker();
		});
var inputBox = document.getElementById('cover_title');
inputBox.onkeyup = function() {
	document.getElementById('txtfontfam').innerHTML = inputBox.value;
}