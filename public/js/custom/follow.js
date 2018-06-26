$(document).ready(function() {
	$(document).on("click", ".follow-u", function() {
		var a = $(this),
		b = new FormData;
		a.removeClass("follow-u");
		a.addClass("unfollow-u");
		a.children(".txtfollow").text("Diikuti");
		b.append("fuser_id", a.attr("data-follow"));
		b.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "follows",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".unfollow-u", function() {
		var a = $(this),
		b = new FormData;
		a.removeClass("unfollow-u");
			a.addClass("follow-u");
			a.children(".txtfollow").text("Ikuti");
		b.append("fuser_id", a.attr("data-follow"));
		b.append("csrf_test_name", csrf_value);
		$.ajax({
			url: base_url + "follows",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
});