function funcDropdown() {
  document.getElementById("myDropdown").classList.toggle("showss");
}

$(document).ready(function() {
  var getHashDaft = window.location.hash;
  if (getHashDaft != "" && getHashDaft == "#comment") {
    $('#commentModal').modal('toggle');
  }
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

  $(document).on('click', '.btncompar', function() {
    
    var text = $(this).parents(".textp").attr('data-text');
    $(".append_txt").text(text);
  });

  // POST COMMENT
  $(document).on('click', '.post-comment', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#comments').val();
    if (comm == null || comm == "") {
      alert('Anda harus masukan karakter');
    }else{
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
      }
  });

  // POST COMMENT PARAGRAPH
  $(document).on('click', '.post-comment-parap', function() {
    var boo = $(this);
    var formData = new FormData();
    var comm = $('#pcomments').val();
    var ava = $('#profpict').attr('src');
    var name = $('#profpict').attr('alt');

    var datas = "";
    datas += "<div class='pcommentviewnull'><div class='media'> <img class='d-flex align-self-start mr-20 rounded-circle' src='" + ava + "' width='48' height='48' alt='" + name + "'> <div class='media-body mt-5'> <p><h5 class='card-title nametitle3'><a href='#'>" + name + "</a><small><span class='text-muted ml-10 timepost'>Just now</span></small></h5> <div class='text-muted' style='margin-top:-10px;'></div></p> <p style='font-size:16px; font-family: Roboto;'>" + comm + "</p> <div> <a href='#' class='fs-14px'>Reply</a> <div class='pull-right'><a href='#'><img base_url+spublic/img/assets/icon_love.svg'> </a></div> </div> </div> </div><hr></div>";
    $('#paragraphcomment_list').append(datas);

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
        $('.pcommentviewnull').hide();
          console.log('Koneksi Bermasalah');
        }
        $('#pcomments').val('');
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

  // SHARE FACEBOOK
  $(document).on('click', '.share-fb', function() {

    var aww = $(this);
    var formData = new FormData();
    var bid = $('#iaidubi').val();
    var blink = $('.dbooktitle').text();
    var share = +$('#sharecount').text() + 1;
    var desc = $('.textp').attr('data-text')+'.. - Baca buku lebih lengkap disini.. | Baboo - Beyond Book & Creativity';
    var img = $('.cover_image').attr('src');
    var auname = $('.author_name').text();

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
    $("#paragraphcomment_list").html(datas);
    $(".post-comment-parap").attr("data-p-id",boo.attr("data-p-id"));
        // console.log(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {});

  });

  progressScroll();
  getChapter();
  getmenuChapter();
  var url_slug = document.URL;
  var n = url_slug.indexOf("#comment");
  if (n != -1) {
    getCommentBook();
  }
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
          data_chapter += '<li class="list-group-item ';
          if (index == 0) {
            data_chapter += 'chapter_active ';
          }
          data_chapter += '" id="list_chapters"><a href="'+base_url+'book/'+ segment+'/chapter/'+val['chapter_id']+'" class="id_chapter';
          data_chapter += '" id="'+index+'">' + val['chapter_title'] + '</a></li>';
        } else {
          data_chapter += '<li class="list-group-item ';
          // if (index == 0) {
          data_chapter += 'chapter_disabled ';
          // }
          data_chapter += '" id="list_chapters" style="cursor: not-allowed;"><span class="id_chapter';
          data_chapter += '" id="'+index+'">' + val['chapter_title'] + '</span></li>';
        }
      });
      $("#list_chapter").html(data_chapter);
      $('.id_chapter').on('click', function(event) {
        var page_id = $(this).attr('id');
        var options = {
             theme:"sk-cube-grid",
             message:'Tunggu Sebentar ',
             backgroundColor:"white",
             textColor:"#7554bd" 
        };
        HoldOn.open(options);
        var page = $(this).attr('href');
        var $this = $(this);
        $this.parent().siblings().removeClass('chapter_active').end().addClass('chapter_active');
        getContent(page, page_id);
        event.preventDefault();
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
function showLoading() {
  var options = {
       theme:"sk-cube-grid",
       message:'Tunggu Sebentar ',
       backgroundColor:"white",
       textColor:"#7554bd" 
  };
  HoldOn.open(options);
}
function strip_tags(str) {
    str = str.toString();
    return str.replace(/<\/?[^>]+>/gi, '');
}
function getContent(tab_page, page_id) {
  $.ajax({
    url: tab_page,
    type: 'GET',
    cache: false,
    dataType:'json',
    success: function(data) {
      HoldOn.close();
      var id_page = '';
      if (page_id == 0) {
        id_page += '<small>Page</small> <strong>Description</strong>';
      }else{
        id_page += '<small>Page</small> <strong>'+page_id+'</strong>';
      }
      $("#id_page").html(id_page);
      var content = '';
      $(".loader").hide();
      $(".chapter").html(data['chapter']['chapter_title']);
      $.each(data['chapter']['paragraphs'], function(index, val) {
        var text = strip_tags(val['paragraph_text']);
        var count = val['comment_count'];
        if (count == 0) { var view_count = '+'; }else{ var view_count = count;}
        content += "<div class='mb-20 textp' data-id-p='"+val['paragraph_id']+"' data-text='"+text+"'>"+val['paragraph_text']+"<button type='button' data-p-id='"+val['paragraph_id']+"' data-toggle='modal' id='comm_p' data-target='#myModal2' class='btncompar comment-marker on-inline-comments-modal' for='toggle-right'><span class='num-comment'>"+view_count+"</span><span  aria-hidden='true' style='font-size:28px;'><img src='"+base_url+"public/img/assets/icon_comment.svg'></span></button></div>";
      });
      $("#parentparaph").html(content);
    }
  })
}

function getCommentBook() {
  // var id = $('#iaidubi').val();
  $.ajax({
      url: base_url + 'getcommentbook',
      type: 'POST',
      dataType: 'json',
      data: { book_id: segment },
      beforeSend: function() {
        $('.loader').show();
      }
    })
    .done(function(data) {
      var datas = "";
      $.each(data, function(i, item) {
        var avatar;
        console.log(item.comment_user_avatar);
        if (item.comment_user_avatar != "") {
          avatar = item.comment_user_avatar;
        } else if (item.comment_user_avatar == "") {
          avatar = base_url+'public/img/profile/blank-photo.jpg';
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