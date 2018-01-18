$(document).ready(function() {
  $('.backbtn').on('click', function() {
    window.history.go(-1);
  });
  
  var getMax = function() {
    return $(document).height() - $(window).height();
  }

  var getValue = function() {
    return $(window).scrollTop();
  }

  // if ('max' in document.getElementById('progress')) {
  //   // Browser supports progress element
  //   var progressBar = $('progress');

  //   // Set the Max attr for the first time
  //   progressBar.attr({ max: getMax() });

  //   $(document).on('scroll', function() {
  //     // On scroll only Value attr needs to be calculated
  //     progressBar.attr({ value: getValue() });
  //   });

  //   $(window).resize(function() {
  //     // On resize, both Max/Value attr needs to be calculated
  //     progressBar.attr({ max: getMax(), value: getValue() });
  //   });
  // } else {
  //   var progressBar = $('.progress-bar'),
  //   max = getMax(),
  //   value, width;

  //   var getWidth = function() {
  //     // Calculate width in percentage
  //     value = getValue();
  //     width = (value / max) * 100;
  //     width = width + '%';
  //     return width;
  //   }

  //   var setWidth = function() {
  //     progressBar.css({ width: getWidth() });
  //   }

  //   $(document).on('scroll', setWidth);
  //   $(window).on('resize', function() {
  //     // Need to reset the Max attr
  //     max = getMax();
  //     setWidth();
  //   });
  // }

  var page = 0;
  var previousScroll = 0;
  $(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
      if (page < count_data) {
        page++;
        loadMoreData(page);
      }else{
        // $("#read").show();
      }
    }
    var currentScroll = $(this).scrollTop();
    if (currentScroll > previousScroll){
     console.log("down");
   } else {
      console.log("up");
      // var id_page = '';
      // var page_id = $("#chapter_number").text() - 1;
      // if (page_id == 0) {
      //   id_page += '<small>Page</small> <strong>Description</strong>';
      // }else{
      //   id_page += page_id;
      // }
      //   $("#chapter_number").text(id_page);
      }
      previousScroll = currentScroll;
  });

  function loadMoreData(page){
    $.ajax(
    {
      url: '?chapter=' + page,
      type: "get",
      beforeSend: function()
      {
        $('.loader').show();
      }
    })
    .done(function(data)
    {
      if(data == " "){
        $('.loader').html("No more records found");
        return;
      }
      $('.loader').hide();
      $("#post-data").append(data);
      $("#chapter_number").text(page);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
      console.log('server not responding...');
    });
  }
});