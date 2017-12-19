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
  progressScroll();
  getChapter();
  getmenuChapter();
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
      console.log("complete");
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
    console.log("complete");
  });
  
}
function ScrollToBottom() {
  window.scrollTo(0,document.querySelector("#post-data").scrollHeight);
}