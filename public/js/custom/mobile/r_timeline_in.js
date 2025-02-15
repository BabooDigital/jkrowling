$(document).ready(function() {

  $(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = aww.parents(".card").find(".dbooktitle").text();
    var txt = + aww.parents(".card").find(".share_countys").text() + 1;
    var desc = aww.parents(".card").find(".textp").attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo.id';
    var img = aww.parents(".card").find('.cover_image').attr('src');
    var auname = aww.parents(".card").find('.author_name').text();
    var segment = aww.parents(".card").find('.segment').attr('href');
    FB.ui({
      method     : 'share_open_graph',
      action_type: 'og.shares',
      action_properties: JSON.stringify({
        object: {
          'og:url': segment + '/preview',
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
            data: formData
              // beforeSend: function() {
              // }
            })
          .done(function(data) {
              // $('.loader').hide();
              // console.log("ke share");
          aww.parents(".card").find(".share_countys").text(txt);
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
        $('#post-data').append("<div class='mb-30 text-center'>Tidak ada data lagi..</div>");
        return;

      };
      $('.loader').hide();
      $("#post-data").append(data);
      loaded = true;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      console.log('server not responding...');
      loaded = true;
      location.reload();
    });
  }


  // LIKE BUTTON
  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();
    var txt = + aww.parents(".card").find(".like_countys").text() + 1;

    aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
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
      data: formData
    })
    .done(function(data) {
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
        } else {
          aww.removeClass('like');
          aww.addClass('unlike');
          aww.parents(".card").find(".like_countys").text(txt);
          aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
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

    aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
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
      data: formData
        // beforeSend: function() {
        // }
      })
    .done(function(data) {
        // $('.loader').hide();
        if (data.code == null || data.code == 403 || data.code == 404) {
          aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
        } else {
          aww.removeClass('unlike');
          aww.addClass('like');
          aww.parents(".card").find(".like_countys").text(txt);
          aww.children('.txtlike').text('Suka');
          aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

});

function convertToSlug(Text) {
  return Text
  .toLowerCase()
  .replace(/[^\w ]+/g, '')
  .replace(/ +/g, '-');
}
function shareBtn() {
  document.getElementById("dropdownShare").classList.toggle("show");
}
function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
