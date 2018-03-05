function funcDropdown() {
  document.getElementById("myDropdown").classList.toggle("showss");
}
function showLoading() {
  var options = {
   theme:"sk-cube-grid",
   message:'Tunggu Sebentar ',
   backgroundColor:"white",
   textColor:"#7554bd" 
 };
 HoldOn.open(options);
}
$(document).ready(function() {
  $(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = $('.dbooktitle').text();
    var share = +$('#sharecount').text() + 1;
    var desc = $('.textp').attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo - Beyond Book & Creativity';
    var img = $('.cover_image').attr('src');
    var auname = $('.author_name').text();
    var segment = $('.segment').attr('href');
    FB.ui({
      method: 'share_open_graph',
      action_type: 'og.shares',
      action_properties: JSON.stringify({
        object: {
          'og:url': base_url + 'book/' + segment + '/preview',
          'og:title': blink + ' ~ By : ' + auname + ' | Baboo - Beyond Book & Creativity',
          'og:description': desc,
          'og:image': img
        }
      })
    },
      // callback
      function(response) {
        if (response && !response.error_message) {

          formData.append("user_id", $("#iaiduui").val());
          formData.append("book_id", $('#iaidubi').val());

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
              // $('.loader').hide();
              // console.log("ke share");
              $('#sharecount').text(share);
            })
          .fail(function() {
            console.log("Failure");
          })
          .always(function() {

          });
        } else {
          // console.log("Batal Share");
        }
      });
  });
  var page = 2;
  $(window).scroll(function() {
    if  ($(window).scrollTop() == $(document).height() - $(window).height() ){
     loadMoreData(page)
     page++;
   }
 });

  function loadMoreData(page) {
    $.ajax({
      url: '?page=' + page,
      type: "get",
      beforeSend: function() {
        $('.loader').show();
      }
    })
    .done(function(data) {
      if (data == "" || data == null) {
        $('.loader').html("No more records found");
        return;

      };
      $('.loader').hide();
      $("#post-data").append(data);
      
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      console.log('server not responding...');
    });
  }

  $.ajax({
    url: base_url + 'writter',
    type: 'GET',
    dataType: 'json',
  })
  .done(function(data) {
    $(".loader").hide();
    var json = $.parseJSON(data);
    var datas = "";
    $.each(json.data, function(i, item) {
      var avatar;
      if (item.avatar != null) {
        avatar = item.avatar;
      }if(item.avatar == ""){
        avatar = 'public/img/profile/blank-photo.jpg';
      }
      else if(item.avatar == null){
        avatar = 'public/img/profile/blank-photo.jpg';
      }
      datas += "<li class='media baboocontent'><img alt='"+item.author_name+"' class='d-flex mr-3 rounded-circle' src='"+ avatar +"' width='50' height='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>"+item.author_name+"</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li>";
      
    });
    $("#author_this_week").html(datas);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {});

  $.ajax({
    url: base_url+'bestBook',
    type: 'GET',
    dataType: 'json',
  })
  .done(function(data) {
    var best_book = '';
    $.each(data, function(index, val) {
      var cover;
      if (val.popular_cover_url == null || val.popular_cover_url == '' || val.popular_cover_url == 'Kosong') {
        cover = base_url+'public/img/icon-tab/empty-set.png';
      }else{
        cover = val.popular_cover_url;
      }
      best_book += '<li class="list-group-item"> <div class="media"> <div class="media-left mr-10"> <a href="#"><img class="media-object" src="'+cover+'" width="60" height="80"></a> </div> <div class="media-body"> <div> <h4 class="media-heading bold mt-10"><a href="#">'+val.popular_book_title+'</a></h4> <p style="font-size: 10pt;">by <a href="#">'+val.popular_author_name+'</a></p> </div> </div> </div> </li>'; 

    });
    $("#best_book").html(best_book);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
  

  var window_width = $(window).width();

  if (window_width < 768) {
    $(".stickymenu").trigger("sticky_kit:detach");
  } else {
    make_sticky();
  }

  $(window).resize(function() {

    window_width = $(window).width();

    if (window_width < 768) {
      $(".stickymenu").trigger("sticky_kit:detach");
    } else {
      make_sticky();
    }

  });

  function make_sticky() {
    $(".stickymenu").stick_in_parent();
  }

  // LIKE BUTTON DESKTOP
  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();
    var txt = aww.children('.txtlike');

    aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
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
        if (data.code == null) {
          aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
        } else {
          aww.removeClass('like');
          aww.addClass('unlike');
          txt.removeClass('txtlike');
          txt.addClass('txtunlike');
          aww.children('.txtunlike').text('Batal Suka');
          aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

  // UNLIKE BUTTON DESKTOP
  $(document).on('click', '.unlike', function() {

    var aww = $(this);
    var formData = new FormData();
    var txt = aww.children('.txtunlike');

    aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
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
        if (data.code == null) {
          aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
        } else {
          aww.removeClass('unlike');
          aww.addClass('like');
          txt.removeClass('txtunlike');
          txt.addClass('txtlike');
          aww.children('.txtlike').text('Suka');
          aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
        }
      })
    .fail(function() {
      console.log("Failure");
    })
    .always(function() {});

  });

  // LIKE BUTTON
  $(document).on('click', '.like', function() {
    var aww = $(this);
    var formData = new FormData();
    var txt = aww.children('.txtlike');

    aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
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
        if (data.code == null) {
          aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
        } else {
          aww.removeClass('like');
          aww.addClass('unlike');
          txt.removeClass('txtlike');
          txt.addClass('txtunlike');
          aww.children('.txtunlike').text('Batal Suka');
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
    var txt = aww.children('.txtunlike');

    aww.children('.loveicon').attr("src", "public/img/assets/icon_love.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", aww.attr("data-id"));
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
        if (data.code == null) {
          aww.children('.loveicon').attr("src", "public/img/assets/love_active.svg");
        } else {
          aww.removeClass('unlike');
          aww.addClass('like');
          txt.removeClass('txtunlike');
          txt.addClass('txtlike');
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