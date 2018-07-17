$(document).ready(function() {
	buyBook();

    loaded = true;
    var d = 0;
    $(window).scroll(function() {
        $(window).scrollTop() +
        $(window).height() > $(document).height() - 1 && d < count_data && (d++, console.log(count_data) && loaded, e(d));
        $("#cobamenu").scrollTop();
        var b = $(document).scrollTop();
        $('#cobamenu input[type="hidden"]').each(function() {
            var a = $(this),
            c = $("#" + a.val());
            c.position().top <= b && c.position().top + c.height() > b && (a = a.val().split("-"), a = parseInt(a[1]) + 1, $("#chapter_number").html(a))
        })
    });

    function e(b) {
        var cls = $('.mauboleh').find('.stops');
        loaded = false;
        $.ajax({
            url: "?chapter=" + b,
            type: "get",
            beforeSend: function() {
                $(".loader").show()
            }
        }).done(function(a) {
            if (!$.trim(a)) {
                $('.loader').hide();
                loaded = false;
            }
            cls.first().show();
            " " == a ? $(".loader").html("No more records found") : ($(".loader").hide(), $("#post-data").append(a), $("#chapter_number").text(b), $("nav#cobamenu").append("<input type='hidden' value='post-" + b + "' />"));
            loaded = true;
        }).fail(function(a, b, d) {
            console.log("server not responding...");
            loaded = true;
            location.reload();
        })
    }

    $(".backbtn").on("click", function() {
        window.history.go(-1)
    });
    $(document).on("click", ".like", function() {
        var b =
            $(this),
            a = new FormData,
            c = +$("#likecount").text() + 1;
        $(".loveicon").attr("src", "" + base_url + "public/img/assets/love_active.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        a.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function() {
            b.removeClass("like");
            b.addClass("unlike");
            $("#likecount").text(c)
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    $(document).on("click", ".unlike", function() {
        var b =
            $(this),
            a = new FormData,
            c = +$("#likecount").text() - 1;
        $(".loveicon").attr("src", "" + base_url + "/public/img/assets/icon_love.svg");
        a.append("user_id", $("#iaiduui").val());
        a.append("book_id", b.attr("data-id"));
        a.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "like",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: a
        }).done(function() {
            b.removeClass("unlike");
            b.addClass("like");
            $("#likecount").text(c)
        }).fail(function() {
            console.log("error")
        }).always(function() {})
    });
    
});

function showLoading() {
    HoldOn.open({
        theme: "sk-cube-grid",
        message: "Tunggu Sebentar ",
        backgroundColor: "white",
        textColor: "#7554bd"
    })
};
function buyBook() {
	$("#buy-btn").click(function(event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");
		console.log("clicked");

			$.ajax({
				url: base_url+'pay_book/token',
				type: "POST",
				data:{id_book:$("#iaidubi").val(), url_redirect:window.location.href,csrf_test_name: csrf_value},
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
}