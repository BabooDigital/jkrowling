$(document).ready(function() {

loaded = true;
  var page = 2;
  $(window).scroll(function() {
    if  ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && loaded){
      loadMoreData(page)
      page++;
    }
  });

  function loadMoreData(page) {
    loaded = false;
    $.ajax({
      url: '?page=' + page,
      type: "get",
      beforeSend: function() {
        $('.loader').show();
      }
    })
    .done(function(data) {
      if (!$.trim(data)) {
        $('.loader').hide();
        $('#r_publishdatas').append("<div class='mb-30 text-center'>Tidak ada buku lagi..</div>");
        return;

      };
      $('.loader').hide();
      $("#r_publishdatas").append(data);
      loaded = true;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      console.log('server not responding...');
      loaded = true;
      location.reload();
    });
  }


  var id = $('#thisUsr').val();

  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();

    var txt = + aww.parents(".card").find(".like_countys").text() + 1;
    aww.children('.loveicon').attr("src", "../public/img/assets/love_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
    formData.append("csrf_test_name", csrf_value);
    $.ajax({
      url: base_url + 'like',
      type: 'POST',
      dataType: 'JSON',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
    })
    .done(function(data) {
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", "../public/img/assets/icon_love.svg");
        } else {
          aww.removeClass('like');
          aww.parents(".card").find(".like_countys").text(txt);
          aww.addClass('unlike');
          aww.children('.loveicon').attr("src", "../public/img/assets/love_active.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

  // UNLIKE BUTTON
  $(document).on('click', '.unlike', function() {

    var aww = $(this);
    var formData = new FormData();

    var txt = + aww.parents(".card").find(".like_countys").text() - 1;
    aww.children('.loveicon').attr("src", "../public/img/assets/icon_love.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
    formData.append("csrf_test_name", csrf_value);
    $.ajax({
      url: base_url + 'like',
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
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", "../public/img/assets/love_active.svg");
        } else {
          aww.removeClass('unlike');
          aww.addClass('like');
          aww.parents(".card").find(".like_countys").text(txt);
          aww.children('.txtlike').text('Suka');
          aww.children('.loveicon').attr("src", "../public/img/assets/icon_love.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

  $(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();

    var txt = + aww.parents(".card").find(".share_countys").text() + 1;

    var blink = aww.parents(".card").find(".dbooktitle").text();
    var desc = aww.parents(".card").find(".textp").attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo.id';
    var img = aww.parents(".card").find('.cover_image').attr('src');
    var auname = aww.parents(".card").find('.author_name').text();
    var segment = aww.parents(".card").find('.segment').attr('data-href');
    FB.ui({
      method     : 'share_open_graph',
      action_type: 'og.shares',
      action_properties: JSON.stringify({
        object: {
          'og:url': base_url + 'book/' + segment + '/preview',
          'og:title': blink + ' ~ By : ' + auname + ' | Baboo.id',
          'og:description': desc,
          'og:image': img
        }
      })
    },
      // callback
      function(response) {
        if (response && !response.error_message) {

          formData.append("user_id", $("#iaiduui").val());
          formData.append("book_id", aww.attr('data-share'));
          formData.append("csrf_test_name", csrf_value);

          $.ajax({
            url: base_url + 'shares',
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
            aww.parents(".card").find(".share_countys").text(txt);
              // $('.loader').hide();
              // console.log("ke share");
            })
          .fail(function() {
            console.log("Failure");
          })
          .always(function() {

          });
        } else {
          console.log("Batal Share");
        }
      });
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
    b.append("csrf_test_name", csrf_value);
    $.ajax({
      url: base_url + "send_message",
      type: "POST",
      dataType: "JSON",
      cache: !1,
      contentType: !1,
      processData: !1,
      data: b
    }).done(function (a) {
      ab.siblings("#pmessageas").val("");
    }).fail(function () {
      console.log("error")
    }).always(function () {
    })
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
        // var refreshId = setInterval(function () {
        //   $("#myModal2").find('.modal-body').load(b);
        // }, 9000);
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
    formdata.append("csrf_test_name", csrf_value);
    $.ajax({
      url: base_url+'send_message',
      cache: false,
      type: "POST",
      contentType: false,
      processData: false,
      data: formdata,
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
function convertToSlug(Text) {
  return Text
  .toLowerCase()
  .replace(/[^\w ]+/g, '')
  .replace(/ +/g, '-');
}

function loadMessage() {
  $.ajax({
    url: base_url + "detailMessage",
    type: "POST",
    dataType: "json",
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