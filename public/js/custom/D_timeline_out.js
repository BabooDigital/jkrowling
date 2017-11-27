$(document).ready(function() {

	$.ajax({
		url: 'writters',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		var json = $.parseJSON(data);
		// for (var i=0;i<json.length;++i)
  //       {
  //           console.log(json[i].message);
  //       }
  		console.log(json.message);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

	$("#author_this_week").html('<li class="media baboocontents"><a href="#"><img alt="Name" class="d-flex mr-3 rounded-circle" src="public/img/profile/pp_pria2.png" width="50"></a><div class="media-body"><h5 class="mt-0 mb-1"><a class="nametitle" href="#">Rian</a></h5><small>Fiksi</small></div></li>');
});