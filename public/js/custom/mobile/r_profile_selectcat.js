$(document).ready(function() {

	$('#selectCat').on('click', function(e) {
		e.preventDefault();
		var selectedIds = $("input:checkbox:checked").map(function () {
		    return $(this).val();
		  }).get();
		var formData = new FormData();
		formData.append("user_id", $("#iaiduui").val());
		formData.append("category_id", selectedIds);

		$.ajax({
          url: base_url + 'postselectcat',
          type: 'POST',
          dataType: 'JSON',
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
        })
        .done(function(data) {
        	if(data.code == "200") location.href = base_url+"first_follow";
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
        });
	});
});