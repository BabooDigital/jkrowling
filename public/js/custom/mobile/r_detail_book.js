$(document).ready(function() {

  // POST COMMENT
  $(document).on('click', '.Rpost-comment', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#comments').val();
    var ava = $('#profpict').attr('src');
    var name = $('#profpict').attr('alt');
    // var name = $('#profname').text();

    var datas = "";
    datas += "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + ava + "' width='48' height='48' alt='" + name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + name + "</a><small><span class='text-muted ml-10'>15 Menit yang lalu</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + comm + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img src='../public/img/assets/icon_love.svg'> 22</a></div> </div> </div> </div><hr></div>";
    $('#Rbookcomment_list').append(datas);

    formData.append('user_id', $('#iaiduui').val());
    formData.append('book_id', $('#iaidubi').val());
    formData.append('comments', $('#comments').val());

    $.ajax({
      url: base_url + 'commentbook',
      type: 'POST',
      dataType: 'JSON',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
        // beforeSend: function()
        // {
        //   $('.loader').show();
        // }
      })
    .done(function(data) {
      if (data == null) {
        $('.rcommentviewnull').hide();
          console.log('Koneksi Bermasalah');
        }
        $('#comments').val('');
      })
    .fail(function() {
      console.log("error");
    })
    .always(function() {});
  });

  getRCommentBook();
});

function getRCommentBook() {
  var id = $('#book_id').val();
  $.ajax({
    url: base_url + 'getcommentbook',
    type: 'POST',
    dataType: 'json',
    data: { book_id: id },
    beforeSend: function() {
      $('.loader').show();
    }
  })
  .done(function(data) {
    var datas = "";
    $.each(data, function(i, item) {
      var avatar;
      if (item.comment_user_avatar != "") {
        avatar = item.comment_user_avatar;
      } else if (item.comment_user_avatar == "") {
        avatar = 'public/img/profile/blank-photo.jpg';
      }
      datas += "<div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ avatar +"' width='48' height='48' alt='"+ item.comment_user_name +"'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>"+ item.comment_user_name +"</a><small><span class='text-muted ml-10'>"+ item.comment_date +"</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + item.comment_id + "'>" + item.comment_text + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img src='../public/img/assets/icon_love.svg'> 22</a></div> </div> </div> </div><hr>";
    });
    $('.loader').hide();
    $("#Rbookcomment_list").html(datas);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {});

}