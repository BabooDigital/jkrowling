$(document).ready(function() {
	$(document).on("click", ".follow-u", function() {
		var a = $(this),
		b = new FormData;
		a.removeClass("follow-u");
		a.addClass("unfollow-u");
		$(".txtfollow").text("Unfollow");
		b.append("user_id", $("#iaiduui").val());
		b.append("fuser_id", a.attr("data-follow"));
		$.ajax({
			url: base_url + "follows",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
			// a.removeClass("follow-u");
			// a.addClass("unfollow-u");
			// $(".txtfollow").text("Unfollow")
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
	$(document).on("click", ".unfollow-u", function() {
		var a = $(this),
		b = new FormData;
		a.removeClass("unfollow-u");
			a.addClass("follow-u");
			$(".txtfollow").text("Follow");
		b.append("user_id", $("#iaiduui").val());
		b.append("fuser_id", a.attr("data-follow"));
		$.ajax({
			url: base_url + "follows",
			type: "POST",
			dataType: "JSON",
			cache: !1,
			contentType: !1,
			processData: !1,
			data: b
		}).done(function() {
			// a.removeClass("unfollow-u");
			// a.addClass("follow-u");
			// $(".txtfollow").text("Follow")
		}).fail(function() {
			console.log("error")
		}).always(function() {})
	});
});