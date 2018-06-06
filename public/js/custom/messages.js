function processAjaxData(responses, urlPath) {
    document.getElementById("content").innerHTML = responses.html;
    document.title = responses.pageTitle;
    window.history.pushState({"html": responses.html, "pageTitle": responses.pageTitle}, "", urlPath);
}

$(document).ready(function () {
    $(document).on("keyup", "#search_user", function () {
        var bak = $(this).val();
        // alert(bak);
        var lengths = bak.length;
        if (lengths >= 1) {
            $(".message-user").hide();
            $.each($(".message-user"), function (val, key) {
                var searchs = bak.toLowerCase();
                var indexSearch = $(this).attr("data-usr-name").toLowerCase();
                if (indexSearch.indexOf(bak) > -1) {
                    $(this).show();
                }
            });
        }else{
            $(".message-user").show();
        }
    });
    $(document).on("click", "#postMessage", function () {
        var ab = $(this),
            b = new FormData,
            message = ab.siblings("#pmessageas").val(),
            fullname = $("#paltui").attr("data-pname"),
            prof_pict = $("#paltui").attr("data-pimage");
        c = "<li class='self'> <div class='avatar'><img class='d-flex align-self-start mr-20 rounded-circle'src='" + prof_pict + "' width='48' height='48' alt='" + fullname + "' draggable='false'></div> <div class='msg msg-self'> <p>" + message + "</p> <span class='pull-right text-muted'>Just Now</span></small> </div> </li>";
        $(".chat").append(c);
        b.append("user_to", $("#iuswithid").val());
        b.append("message", ab.siblings("#pmessageas").val());
        $.ajax({
            url: base_url + "send_message",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: {b, csrf_test_name: csrf_value}
        }).done(function (a) {
            ab.siblings("#pmessageas").val("");
        }).fail(function () {
            console.log("error")
        }).always(function () {
        })
    });

    $(document).on("click", ".btncompar", function () {
        var a = $(this).parents(".textp").attr("data-text");
        $(".append_txt").text(a)
    });
    $(document).on("click",
        ".message-user",
        function (e) {
            e.preventDefault();
            var boo = $(this);
            var usr_with = boo.attr("data-usr-msg");
            var b = base_url + "detail_message/" + usr_with;
            if (null == usr_with || "" == usr_with){
                
            }
            else {
                $('#myModal2').modal('show').find('.modal-body').load(b);
                var bahtml = "<button type='button' class='closes' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'><i class='fa fa-arrow-left'></i></span></button><h4><b>" + boo.attr("data-usr-name") + "</b></h4>";
                $('#myModal2').find('.modal-header').html(bahtml);
                var refreshId = setInterval(function () {
                    $("#myModal2").find('.modal-body').load(b);
                }, 10000);
                $.ajaxSetup({cache: false});
            }
        });
    $(document).on('click', '.btn_list_msg', function(event) {
        event.preventDefault();
        var boo = $(this);
        var usr_with = boo.attr("data-usr-msg");
        var usr_name = boo.attr("data-usr-name");
        var formdata = new FormData();

        formdata.append("user_msg", usr_with);
        var url = base_url+'message/'+convertToSlug(usr_name);
        var form = $('<form action="' + url + '" method="post">' +
          '<input type="hidden" name="usr_msg" value="' + usr_with + '" />' +
          '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
          '</form>');
        $(boo).append(form);
        form.submit();
    });
    $( "#submit_msg" ).submit(function(event) {
      event.preventDefault();
      var msg = $(".input_msg").val();
      var usr_input = $(".input_usr").val();
      $(".msg_view").append('<div class="text-right p-10 chatright"> <p class="txtchatright msg_view">'+msg+'</p> </div>');
      $(".input_msg").val('');

      var formdata = new FormData();
      formdata.append('message', msg);
      formdata.append('user_to', usr_input);
      $.ajax({
        url: base_url+'send_message',
        cache: false,
        type: "POST",
        contentType: false,
        processData: false,
        data: {formdata, csrf_test_name: csrf_value}
      })
      .done(function() {
          console.log("success");
      })
      .fail(function() {
          console.log("error");
      })
      .always(function() {
          console.log("complete");
      });
    });
});

function loadMessage() {
    $.ajax({
        url: base_url + "detailMessage",
        type: "POST",
        dataType: "json"
        data: {csrf_test_name: csrf_value}
    }).done(function (b) {
        var d = 0;
        $.each(b, function (f, g) {
            "unread" == g.notif_status && d++
        });
        $("#noti_Counter").css({
            opacity: 0
        }).text(d).css({
            top: "-10px",
            opacity: 1
        })
    }).fail(function () {
        console.log("error")
    }).always(function () {
    })
}

function convertToSlug(d) {
    return d.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
};