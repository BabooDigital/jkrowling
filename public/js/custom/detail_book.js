$(document).ready(function() {
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

  // POST COMMENT
  $(document).on('click', '.post-comment', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#comments').val();
    var ava = $('#profpict').attr('src');
    var name = $('#profname').text();
    var commcount = +$('#commentcount').text() + 1;

    var datas = "";
    datas += "<div class='commentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='"+ ava +"'> <div class='media-body'> <h5 class='nametitle2 mb-5'>"+ name +"</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='nullcomment'>"+ comm +"</p> </div> <a href='#'><b>Balas</b></a> <hr></div>";
    $('#bookcomment_list').append(datas);

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
      $("span[id='commentcount']").text(commcount);
      if (data == null) {
        $('.commentviewnull').hide();
        // $("span[id='commentcount']").text(commcount);
        console.log('Koneksi Bermasalah');
      }
      $('#comments').val('');
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
    });
    

  });

  // LIKE BUTTON
  $(document).on('click', '.like', function() {

    var boo = $(this);
    var formData = new FormData();
    var likecount = +$('#likecount').text() + 1;

    $('.loveicon').attr("src","../public/img/assets/love_active.svg");
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
    .always(function() {
    });

  });

// UNLIKE BUTTON
$(document).on('click', '.unlike', function() {

  var boo = $(this);
  var formData = new FormData();
  var likecount = +$('#likecount').text() - 1;

  $('.loveicon').attr("src","../public/img/assets/icon_love.svg");
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
  .always(function() {
  });

});

progressScroll();
getChapter();
getmenuChapter();
getCommentBook();
});
function progressScroll() {
  var getMax = function() {
    return $(document).height() - $(window).height();
  }
  var getValue = function() {
    return $(window).scrollTop();
  }
  if ('max' in document.getElementById('progress')) {
    // Browser supports progress element
    var progressBar = $('progress');
    // Set the Max attr for the first time
    progressBar.attr({
      max: getMax()
    });
    $(document).on('scroll', function() {
      // On scroll only Value attr needs to be calculated
      progressBar.attr({
        value: getValue()
      });
    });
    $(window).resize(function() {
      // On resize, both Max/Value attr needs to be calculated
      progressBar.attr({
        max: getMax(),
        value: getValue()
      });
    });
  } else {
    var progressBar = $('.progress-bar'),
    max = getMax(),
    value, width;
    var getWidth = function() {
      value = getValue();
      width = (value / max) * 100;
      width = width + '%';
      return width;
    }
    var setWidth = function() {
      progressBar.css({
        width: getWidth()
      });
    }
    $(document).on('scroll', setWidth);
    $(window).on('resize', function() {
      // Need to reset the Max attr
      max = getMax();
      setWidth();
    });
  }
}
function getChapter() {
  $(".id_chapter").on('click', function() {
    var id = $(this).attr('id');
    var book_id = $(this).attr('b_id');
    $.ajax({
      url: base_url + 'getdetailchapter',
      type: 'POST',
      dataType: 'json',
      data: {
        id_chapter: id,
        id_book: book_id
      },
    }).done(function(data) {
      var datas = "";
      $.each(data, function(index, val) {
        datas += val['paragraph_text'];
      });
      $("#appendContent").append(datas);
      $("html, body").animate({
        scrollTop: $("#appendContent").offset().top
      }, 2000);
    }).fail(function() {
      console.log("error");
    }).always(function() {
    });
  });
}
function getmenuChapter() {
  $.ajax({
    url: base_url+'getmenuchapter',
    type: 'POST',
    dataType: 'json',
    data: {id_book: segment},
    beforeSend : function() {
      $("#loader_chapter").show();
    }
  })
  .done(function(data) {
    var data_chapter = "";
    $("#loader_chapter").hide();
    $.each(data, function(index, val) {
      data_chapter += '<li class="list-group-item" id="list_chapters"><a href="#'+val['chapter_id']+'" class="id_chapter" onclick="ScrollToBottom()">'+val['chapter_title']+'</a></li>';
    });
    $("#list_chapter").html(data_chapter);
  })
  .fail(function() {
    $("#loader_chapter").hide();
    console.log("error");
  })
  .always(function() {
    $("#loader_chapter").hide();
  });
  
}
function getCommentBook() {
  var id = $('#iaidubi').val();
  $.ajax({
    url: base_url + 'getcommentbook',
    type: 'POST',
    dataType: 'json',
    data: {book_id: id},
    beforeSend: function()
    {
      $('.loader').show();
    }
  })
  .done(function(data) {
    var datas = "";
    $.each(data, function(i, item) {
      var avatar;
      if (item.comment_user_avatar != "") {
        avatar = item.comment_user_avatar;
      }else if (item.comment_user_avatar == ""){
        avatar = 'public/img/profile/blank-photo.jpg';
      }
      datas += "<div class='commentview'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='"+ avatar +"'> <div class='media-body'> <h5 class='nametitle2 mb-5'>"+ item.comment_user_name +"</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='"+ item.comment_id +"'>"+ item.comment_text +"</p> </div> <a href='#'><b>Balas</b></a> <hr></div>";
    });
    $('.loader').hide();
    $("#bookcomment_list").html(datas);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
  
}
function ScrollToBottom() {
  window.scrollTo(0,document.querySelector("#post-data").scrollHeight);
}