$(document).ready(function() {
    $("#profileImage").click(function(a) {
        $("#imageUpload").click()
    });
    $("#imageUpload").change(function() {
        this.files && this.files[0] && $("#profileImage").attr("src", window.URL.createObjectURL(this.files[0]));
        $(this);
        var a = new FormData;
        a.append("prof_pict", $("#imageUpload")[0].files[0]);
        a.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "upload_pict",
            type: "POST",
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            data: a
        }).done(function() {
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });

    $(document).on('click', '.btnupdate-prof', function() {
    	var boo = $(this);
    	var formData = new FormData();

    	formData.append("location", $("#yourDomisili").val());
    	formData.append("about_me", $("#yourBio").val());
        formData.append("csrf_test_name", csrf_value);

    	$.ajax({
    		url: base_url + 'firstedit',
    		type: 'POST',
    		dataType: 'JSON',
    		cache: false,
    		contentType: false,
    		processData: false,
    		data: formData,
        // beforeSend: function() {
        // }
    })
    	.done(function(data) {
    		if (data.status == 200) {
				window.location = base_url+"selectcategory";
    		}
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {});
    });
});