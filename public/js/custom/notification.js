$(document).ready(function () {
  load_notification();
  count_notif();
  setInterval(count_notif,10000);
  $("#btn_notif_comment").on('click', function(event) {
    // console.log($(this).attr('ntf'));
    var ntf = $(this).attr('ntf');
    var slug = $(this).attr('href');
    $.ajax({
      url: 'updatentf',
      type: 'POST',
      dataType: '',
      data: {ntf: ntf},
    })
    .done(function(data) {
      // console.log("success");
    })
    .fail(function() {
      // console.log("error");
    })
    .always(function() {
      // console.log("complete");
    });
    
    event.preventDefault();
  });
});
$("#btn_notif_comment").on('click', function(event) {
  // console.log($(this).attr('ntf'));
  var ntf = $(this).attr('ntf');
  var slug = $(this).attr('href');
  $.ajax({
    url: 'updatentf',
    type: 'POST',
    dataType: '',
    data: {ntf: ntf},
  })
  .done(function(data) {
    // console.log("success");
  })
  .fail(function() {
    // console.log("error");
  })
  .always(function() {
    // console.log("complete");
  });
  
  event.preventDefault();
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
    var count_unread = 0;
    $.each(data, function(index, val) {
        if (val.notif_status == "unread") {
          count_unread++;
        }
    });
    $('#noti_Counter')
          .css({ opacity: 0 })
          .text(count_unread)
          .css({ top: '-10px', opacity: 1  });
  })
  .fail(function() {
    // console.log("error");
  })
  .always(function() {
  });
}
function load_notification() {
  $('#noti_Button').click(function () {
    $("#notifications").show();
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
          // console.log(val);
          if (val.notif_type.notif_type_id == 1) {
            var add_style = "";
            if (val.notif_status == "read") {
              add_style += "style='background:#ddd;'";
            }
            if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
              user = base_url+'public/img/profile/blank-photo.jpg';
            }else{
              user = val.notif_user.prof_pict;
            }
            // console.log("following");
            datas += '<a class="list-group-item list-group-item-action flex-column align-items-start btn_notif_follow" '+add_style+' id="btn_notif_follow" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="50" height="50" alt="'+val.notif_user.fullname+'"> <div class="media-body"> <span class="nametitle2">'+val.notif_user.fullname+'</span> <br> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span><span class="button_follow"><img class="img_follow" src="'+'public/img/icon-tab/add_follow.svg"> </span><p class="text-muted fontkecil">1 hours ago</p></small></p> </div> </div> </div> </a>'; 
          }else if(val.notif_type.notif_type_id == 2){
            var add_style = "";
            if (val.notif_status == "read") {
              add_style += "style='background:#ddd;'";
            }
            // console.log("comment");
            if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
              user = base_url+'public/img/profile/blank-photo.jpg';
            }else{
              user = val.notif_user.prof_pict;
            }
            var title = "";
            if (val.notif_book.title_book != null || val.notif_book.title_book != '' || val.notif_book.title_book != 'undefined') {
              title += val.notif_book.title_book;
            }else{
              title += "kosong";
            }
            var object;
            if (val.notif_book.cover_url == "") {
              object = '';
            }if (val.notif_book.cover_url != null) {
              object = '<object data="" style="width:100%;background-image:url('+val.notif_book.cover_url+');"></object>';
            }
            else if (val.notif_book.cover_url == null){
              object = '';
            }
            datas += '<a href="'+base_url+'book/'+val.notif_book.book_id+'-'+convertToSlug(title)+'#comment" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_comment" '+add_style+' id="" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="50" height="50" alt="'+val.notif_user.fullname+'"> <div class="media-body mt-5"> <span class="nametitle2">'+val.notif_user.fullname+'</span> <span class="text-muted fontkecil">Mengomentari tulisan anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media" style="width:100%;"> '+object+' </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+val.notif_book.title_book+'</b></h5> </div> </a>'; 
          }else if(val.notif_type.notif_type_id == 3){
            var add_style = "";
            if (val.notif_status == "read") {
              add_style += "style='background:#ddd;'";
            }
            // console.log("likes");
            if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
              user = base_url+'public/img/profile/blank-photo.jpg';
            }else{
              user = val.notif_user.prof_pict;
            }
            var title = "";
            if (val.notif_book.title_book != null || val.notif_book.title_book != '' || val.notif_book.title_book != 'undefined') {
              title += val.notif_book.title_book;
            }else{
              title += "kosong";
            }
            datas += '<a href="'+base_url+'book/'+val.notif_book.book_id+'-'+convertToSlug(title)+'" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_like" '+add_style+' id="btn_notif_like" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <img class="d-flex align-self-start mr-20 rounded-circle" src="'+user+'" width="50" height="50" alt="'+val.notif_user.fullname+'"> <div class="media-body mt-5"> <span class="nametitle2">'+val.notif_user.fullname+'</span> <span class="text-muted fontkecil">Menyukai buku anda</span><span class="button_follow"> </div> </div> </div> <div class="row" style="padding: 0px 10px 0px 10px;"> <div class="media"> <img src="'+val.notif_book.cover_url+'" style="width: 100%;"> </div> <h5 style="padding-top:20px; font-weight: 500;"><b>'+val.notif_book.title_book+'</b></h5> </div> </a>'; 
          }else{
            var title = "";
            if (val.notif_book.title_book != null || val.notif_book.title_book != '' || val.notif_book.title_book != 'undefined') {
              title += val.notif_book.title_book;
            }else{
              title += "kosong";
            }
            if (val.notif_user.prof_pict == null || val.notif_user.prof_pict == '' || val.notif_user.prof_pict == 'Kosong') {
              user = base_url+'public/img/profile/blank-photo.jpg';
            }else{
              user = val.notif_user.prof_pict;
            }
            var user_name = "";
            if ($.isEmptyObject(val.notif_user.fullname)) {
              user_name += "Baboo";
            }
            // console.log("publish");
            var add_style = "";
            if (val.notif_status == "read") {
              add_style += "style='background:#ddd;'";
            }
            datas += '<a href="'+base_url+'book/'+val.notif_book.book_id+'-'+convertToSlug(title)+'" class="list-group-item list-group-item-action flex-column align-items-start btn_notif_publish" '+add_style+' id="" ntf="'+val.notif_id+'"> <div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> <div class="media-body"> <span class="nametitle2">'+user_name+'</span> <br> <span class="text-muted fontkecil">'+val.notif_text+'</span> <p class="text-muted fontkecil">'+val.notif_time+'</p></small></p> </div> </div> </div> </a>';
          }
          // console.log(val.notif_user);
        });
      $("#notification").html(datas);
      $(".btn_notif_comment").on('click', function(event) {
        // console.log($(this).attr('ntf'));
        var ntf = $(this).attr('ntf');
        var slug = $(this).attr('href');
        $.ajax({
          url: 'updatentf',
          type: 'POST',
          dataType: '',
          data: {ntf: ntf},
        })
        .done(function(data) {
          // console.log("success");
          window.location.href = slug;
        })
        .fail(function() {
          // console.log("error");
        })
        .always(function() {
        });
        
        event.preventDefault();
      });
      $(".btn_notif_like").on('click', function(event) {
        var ntf = $(this).attr('ntf');
        var slug = $(this).attr('href');
        $.ajax({
          url: 'updatentf',
          type: 'POST',
          dataType: '',
          data: {ntf: ntf},
        })
        .done(function(data) {
          window.location.href = slug;
        })
        .fail(function() {
          // console.log("error");
        })
        .always(function() {
        });
        
        event.preventDefault();
      });
      $(".btn_notif_publish").on('click', function(event) {
        var ntf = $(this).attr('ntf');
        var slug = $(this).attr('href');
        $.ajax({
          url: 'updatentf',
          type: 'POST',
          dataType: '',
          data: {ntf: ntf},
        })
        .done(function(data) {
          window.location.href = slug;
        })
        .fail(function() {
          // console.log("error");
        })
        .always(function() {
        });
        
        event.preventDefault();
      });
      $(".btn_notif_follow").on('click', function(event) {
        var ntf = $(this).attr('ntf');
        var slug = $(this).attr('href');
        $.ajax({
          url: 'updatentf',
          type: 'POST',
          dataType: '',
          data: {ntf: ntf},
        })
        .done(function(data) {
          window.location.href = slug;
        })
        .fail(function() {
          // console.log("error");
        })
        .always(function() {
        });
        
        event.preventDefault();
      });
})
.fail(function() {
  // console.log("error");
})
.always(function() {
  // console.log("complete");
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
}