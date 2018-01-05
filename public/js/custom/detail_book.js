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
    datas += "<div class='commentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='" + ava + "'> <div class='media-body'> <h5 class='nametitle2 mb-5'>" + name + "</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='nullcomment'>" + comm + "</p> </div> <a href='#'><b>Balas</b></a> <hr></div>";
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
      .always(function() {});


  });

  // LIKE BUTTON
  $(document).on('click', '.like', function() {

    var boo = $(this);
    var formData = new FormData();
    var likecount = +$('#likecount').text() + 1;

    $('.loveicon').attr("src", "../public/img/assets/love_active.svg");
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

    $('.loveicon').attr("src", "../public/img/assets/icon_love.svg");
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

  // SHARE TWITTER
  var tweetUrlBuilder = function(o) {
    return [
      'https://twitter.com/intent/tweet?tw_p=tweetbutton',
      '&url=', encodeURI(o.url),
      '&via=', o.via,
      '&text=', o.text
    ].join('');
  };

  $(document).on('click', '.share-tweet', function() {
    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = $('.dbooktitle').text();
    var desc = $('#parentparaph').text();
    var share = +$('#sharecount').text() + 1;
    var url = tweetUrlBuilder({
      url: base_url + 'book/' + bid + '-' + convertToSlug(blink),
      via: 'BabooID',
      text: desc.substring(0, 120)
    });

    window.open(url, 'Tweet', 'height=300,width=700');

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
        $('#sharecount').text(share);
      })
      .fail(function() {
        console.log("Failure");
      })
      .always(function() {

      });
  });

  // Called by the Twitter, many times during it's
  // life-cycle. We only want to know when the user
  // has tweeted, so the following filters are required.
  // var callback = function(e) {
  //   if (e && e.data) {
  //     var data;
  //     try {
  //       data = JSON.parse(e.data);
  //     } catch (e) {
  //       // Don't care.
  //     }
  //     if (data && data.params && data.params.indexOf('tweet') > -1) {

  //     }
  //   }
  // };

  // window.addEventListener ? window.addEventListener("message", callback, !1) : window.attachEvent("onmessage", callback)

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
        href: base_url + 'book/' + bid + '-' + convertToSlug(blink),
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
    }).always(function() {});
  });
}

function getmenuChapter() {
  $.ajax({
      url: base_url + 'getmenuchapter',
      type: 'POST',
      dataType: 'json',
      data: { id_book: segment },
      beforeSend: function() {
        $("#loader_chapter").show();
      }
    })
    .done(function(data) {
      var data_chapter = "";
      $("#loader_chapter").hide();
      $.each(data, function(index, val) {

        if (val['chapter_free'] != "false") {
          data_chapter += '<li class="id_chapter list-group-item ';
          if (index == 0) {
            data_chapter += 'chapter_active ';
          }
          data_chapter += '" id="list_chapters"><a href="#' + val['chapter_id'] + '" class="id_chapter';
          data_chapter += '" onclick="ScrollToBottom(' + index + ')">' + val['chapter_title'] + '</a></li>';
        } else {
          data_chapter += '<li class="list-group-item ';
          // if (index == 0) {
          data_chapter += 'chapter_disabled ';
          // }
          data_chapter += '" id="list_chapters" style="cursor: not-allowed;"><span class="id_chapter';
          data_chapter += '" >' + val['chapter_title'] + '</span></li>';
        }
      });
      $("#list_chapter").html(data_chapter);
      $('.id_chapter').on('click', function(event) {
        var $this = $(this);
        $this.parent().siblings().removeClass('chapter_active').end().addClass('chapter_active');
        event.preventDefault();

        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollBottom: target.offset().bottom
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });
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
        datas += "<div class='commentview'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' width='50' height='50' src='" + avatar + "'> <div class='media-body'> <h5 class='nametitle2 mb-5'>" + item.comment_user_name + "</h5> <small><span>Jakarta, Indonesia</span></small> </div> </div> <div class='mt-10'> <p class='fs-14px' id='" + item.comment_id + "'>" + item.comment_text + "</p> </div> <a href='#'><b>Balas</b></a> <hr></div>";
      });
      $('.loader').hide();
      $("#bookcomment_list").html(datas);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {});

}

function ScrollToBottom(count) {
  // console.log(count);
  var i;
  for (i = 0; i <= count; i++) {
    window.scrollTo(0, document.querySelector("#post-data").scrollHeight);
  }
}

function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g, '')
    .replace(/ +/g, '-');
}