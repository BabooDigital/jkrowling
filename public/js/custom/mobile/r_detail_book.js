$(document).ready(function() {

    $(document).on('click', '.btncompar', function() {
      
      var text = $(this).parents(".textp").attr('data-text');
      $(".append_txt").text(text);
    });

  // POST COMMENT
  $(document).on('click', '.Rpost-comment', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#comments').val();
    var ava = $('#profpict').attr('src');
    var name = $('#profpict').attr('alt');
    // var name = $('#profname').text();

    var datas = "";
    datas += "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + ava + "' width='48' height='48' alt='" + name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + name + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + comm + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img base_url+spublic/img/assets/icon_love.svg'> </a></div> </div> </div> </div><hr></div>";
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

  // POST COMMENT PARAGRAPH
  $(document).on('click', '.Rpost-comment-parap', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#pcomments').val();
    var ava = $('#profpict').attr('src');
    var name = $('#profpict').attr('alt');

    var datas = "";
    datas += "<div class='rcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + ava + "' width='48' height='48' alt='" + name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + name + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + comm + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img base_url+spublic/img/assets/icon_love.svg'> </a></div> </div> </div> </div><hr></div>";
    $('#Rparagraphcomment_list').append(datas);

    formData.append('user_id', $('#iaiduui').val());
    formData.append('paragraph_id', boo.attr("data-p-id"));
    formData.append('comments', $('#pcomments').val());

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
        $('#pcomments').val('');
      })
    .fail(function() {
      console.log("error");
    })
    .always(function() {});
  });

  // BOOKMARK BUTTON
  $(document).on('click', '.bookmark', function() {

    var boo = $(this);
    var formData = new FormData();

    $('.bookmarkicon').attr("src", base_url+"public/img/assets/icon_bookmark_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", boo.attr("data-id"));
    $.ajax({
        url: base_url + 'bookmark',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        // beforeSend: function() {
        // }
      })
      .done(function() {
        boo.removeClass('bookmark');
        boo.addClass('unbookmark');
        // $('.loader').hide();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // UNBOOKMARK BUTTON
  $(document).on('click', '.unbookmark', function() {

    var boo = $(this);
    var formData = new FormData();

    $('.bookmarkicon').attr("src", base_url+"public/img/assets/icon_bookmark.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", boo.attr("data-id"));
    $.ajax({
        url: base_url + 'bookmark',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        // beforeSend: function() {
        // }
      })
      .done(function() {
        boo.removeClass('unbookmark');
        boo.addClass('bookmark');
        // $('.loader').hide();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // LIKE BUTTON
  $(document).on('click', '.like', function() {

    var boo = $(this);
    var formData = new FormData();
    var likecount = +$('#likecount').text() + 1;

    $('.loveicon').attr("src", base_url+"public/img/assets/love_active.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", boo.attr("data-id"));
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
      .done(function() {
        boo.removeClass('like');
        boo.addClass('unlike');
        // $('.loader').hide();
        $('#likecount').text(likecount);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // UNLIKE BUTTON
  $(document).on('click', '.unlike', function() {

    var boo = $(this);
    var formData = new FormData();
    var likecount = +$('#likecount').text() - 1;

    $('.loveicon').attr("src", base_url+"public/img/assets/icon_love.svg");
    formData.append("user_id", $("#iaiduui").val());
    formData.append("book_id", boo.attr("data-id"));
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
      .done(function() {
        boo.removeClass('unlike');
        boo.addClass('like');
        // $('.loader').hide();
        $('#likecount').text(likecount);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // FOLLOW USER BUTTON
  $(document).on('click', '.follow-u', function() {

    var boo = $(this);
    var formData = new FormData();

    formData.append("user_id", $("#iaiduui").val());
    formData.append("fuser_id", boo.attr("data-follow"));
    $.ajax({
        url: base_url + 'follows',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        // beforeSend: function() {
        // }
      })
      .done(function() {
        boo.removeClass('follow-u');
        boo.addClass('unfollow-u');
        $('.txtfollow').text('Unfollow');
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // UNFOLLOW USER BUTTON
  $(document).on('click', '.unfollow-u', function() {

    var boo = $(this);
    var formData = new FormData();

    formData.append("user_id", $("#iaiduui").val());
    formData.append("fuser_id", boo.attr("data-follow"));
    $.ajax({
        url: base_url + 'follows',
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        // beforeSend: function() {
        // }
      })
      .done(function() {
        boo.removeClass('unfollow-u');
        boo.addClass('follow-u');
        $('.txtfollow').text('Follow');
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // GET COMMENT PARAGRAPH
  $(document).on('click', '.btncompar', function() {

    var boo = $(this);
    var formData = new FormData();

    formData.append("paragraph_id", boo.attr("data-p-id"));
    $.ajax({
        url: base_url + 'getcommentbook',
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
        var datas = "";
    $.each(data, function(i, item) {
      var avatar;
      if (item.comment_user_avatar != "") {
        avatar = item.comment_user_avatar;
      } else if (item.comment_user_avatar == "") {
        avatar = 'public/img/profile/blank-photo.jpg';
      }
      datas += "<div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ avatar +"' width='48' height='48' alt='"+ item.comment_user_name +"'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>"+ item.comment_user_name +"</a><small><span class='text-muted ml-10'>"+ item.comment_date +"</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + item.comment_id + "'>" + item.comment_text + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img base_url+spublic/img/assets/icon_love.svg'> </a></div> </div> </div> </div><hr>";
    });
    $("#Rparagraphcomment_list").html(datas);
    $(".Rpost-comment-parap").attr("data-p-id",boo.attr("data-p-id"));
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  // SHARE FACEBOOK
  $(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = $('.dbooktitle').text();
    var share = +$('#sharecount').text() + 1;

    FB.ui({
        method: 'share',
        display: 'popup',
        href: 'https://dev-baboo.co.id/book/' + bid + '-' + convertToSlug(blink),
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

  getRCommentBook();
  getRMenuChapter();
});

function getRMenuChapter() {
  $.ajax({
      url: base_url + 'getmenuchapter',
      type: 'POST',
      dataType: 'json',
      data: { id_book: segment },
      // beforeSend: function() {
      // }
    })


  .done(function(data) {
    var data_chapter = "";
    $.each(data, function(index, val) {
      id = val['chapter_id'];
        if (val['chapter_free'] != "false") {
          data_chapter += '<a href="' + base_url + 'book/' + segment + '/' +val['chapter_id'] + '" class="borbot bornone list-group-item list-group-item-action ';
          if (active == id) {
            data_chapter += 'active';
          }
          data_chapter += '" >' + val['chapter_title'] + '</a>';
        } else {
          data_chapter += '<a class="borbot bornone list-group-item list-group-item-action';
          // if (index == 0) {
          data_chapter += 'disabled ';
          // }
          data_chapter += '>';
          data_chapter += '" >' + val['chapter_title'] + '</a>';
        }
      $(".detailbook").children().attr('data-id', );
      });
      $("#list_Rchapter").html(data_chapter);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
  
}

function getRCommentBook() {
  var id = $('#iaidubi').val();

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
      datas += "<div class='media' id='" + item.comment_id + "'> <img class='d-flex align-self-start mr-20 rounded-circle' src='"+ avatar +"' width='48' height='48' alt='"+ item.comment_user_name +"'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>"+ item.comment_user_name +"</a><small><span class='text-muted ml-10'>"+ item.comment_date +"</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;' id='" + item.comment_id + "'>" + item.comment_text + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img base_url+spublic/img/assets/icon_love.svg'> </a></div> </div> </div> </div><hr>";
    });
    $('.loader').hide();
    $("#Rbookcomment_list").html(datas);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {});

}

function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g, '')
    .replace(/ +/g, '-');
}