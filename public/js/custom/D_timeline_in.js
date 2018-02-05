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
  var page = 1;
  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
      page++;
      loadMoreData(page);
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
      if (data == " ") {
        $('.loader').html("No more records found");
        return;
      }
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
    var json = $.parseJSON(data);
    var datas = "";
    $.each(json.data, function(i, item) {
      var avatar;
      if (item.avatar != "") {
        avatar = item.avatar;
      }else if (item.avatar == ""){
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
      console.log(val);
    });
    $("#best_book").html(best_book);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
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

$(document).ready(function () {
load_notification();
count_notif();
setInterval(count_notif,1000);
});
function count_notif() {
  $.ajax({
            url: base_url+'notification',
            type: 'POST',
            dataType: 'json',
          })
          .done(function(data) {
            var datas = "";
            var user = "";
            $('#noti_Counter2')
            .css({ opacity: 0 })
                .text(data.length)
                .css({ top: '-10px' })
                .animate({ top: '-2px', opacity: 1 }, 500);
          $("#noti_Counter").text(data.length);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
  
}
function load_notification() {
      $('#noti_Button').click(function () {
        $("#notifications").show();
        clearInterval(load_notification); 
        $('#notifications').show('slow/400/fast', function () {
          $.ajax({
            url: base_url+'notification',
            type: 'POST',
            dataType: 'json',
          })
          .done(function(data) {
            var datas = "";
            var user = "";
            $("#loader_notif").hide();
            $.each(data, function(index, val) {
              if (val.notif_type["notif_type_id"] == 1) {
                if (val.notif_user["user_avatar"] == null || val.notif_user["user_avatar"] == '' || val.notif_user["user_avatar"] == 'Kosong') {
                  user = base_url+'public/img/icon-tab/empty-set.png';
                }else{
                  user = val.notif_user["user_avatar"];
                }
                console.log("following");
                datas += '<a class="list-group-item list-group-item-action flex-column align-items-start"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+val.notif_user["user_name"]+'</span> <br> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span><span class="button_follow"> <img class="img_follow" src="'+'public/img/icon-tab/add_follow.svg"> </span> <p class="text-muted fontkecil">1 hours ago</p></small></p> </div> </div> </div> </a>'; 
              }else if(val.notif_type["notif_type_id"] == 2){
                console.log("comment");
                if (val.notif_user["user_avatar"] == null || val.notif_user["user_avatar"] == '' || val.notif_user["user_avatar"] == 'Kosong') {
                  user = base_url+'public/img/icon-tab/empty-set.png';
                }else{
                  user = val.notif_user["user_avatar"];
                }
                var title = "";
                if (val.notif_book["title_book"] != null || val.notif_book["title_book"] != '' || val.notif_book["title_book"] != 'undefined') {
                  title += val.notif_book["title_book"];
                }else{
                  title += "kosong";
                }
                datas += '<a href="'+base_url+'book/'+val.notif_book["book_id"]+'-'+convertToSlug(title)+'#comment" class="list-group-item list-group-item-action flex-column align-items-start"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+val.notif_user["user_name"]+'</span> <span class="text-muted fontkecil">Mengomentari tulisan anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img src="'+val.notif_book["cover_url"]+'" style="width: 100%;heigt:20%;" height="150"> </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+val.notif_book["title_book"]+'</b></h5> </div> </a>'; 
              }else if(val.notif_type["notif_type_id"] == 3){
                console.log("likes");
                if (val.notif_user["user_avatar"] == null || val.notif_user["user_avatar"] == '' || val.notif_user["user_avatar"] == 'Kosong') {
                  user = base_url+'public/img/icon-tab/empty-set.png';
                }else{
                  user = val.notif_user["user_avatar"];
                }
                var title = "";
                if (val.notif_book["title_book"] != null || val.notif_book["title_book"] != '' || val.notif_book["title_book"] != 'undefined') {
                  title += val.notif_book["title_book"];
                }else{
                  title += "kosong";
                }
                datas += '<a href="'+base_url+'book/'+val.notif_book["book_id"]+'-'+convertToSlug(title)+'" class="list-group-item list-group-item-action flex-column align-items-start"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="48" alt="Generic placeholder image"> <div class="media-body mt-5"> <span class="nametitle2">'+val.notif_user["user_name"]+'</span> <span class="text-muted fontkecil">Menyukai buku anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img src="'+val.notif_book["cover_url"]+'" style="width: 100%;"> </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+val.notif_book["title_book"]+'</b></h5> </div> </a>'; 
              }else{
                console.log("publish");
              }
            });
            $("#notification").html(datas);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });

      $('#noti_Counter').fadeOut('slow');

      return false;
    });
      $(document).click(function () {
        $('#notifications').hide();

        if ($('#noti_Counter').is(':hidden')) {
        }
      });

    //   $('#notifications').click(function () {
    //   // return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
    // });
}

function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g, '')
    .replace(/ +/g, '-');
}