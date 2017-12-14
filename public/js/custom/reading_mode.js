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

  if ('max' in document.getElementById('progress')) {
    // Browser supports progress element
    var progressBar = $('progress');

    // Set the Max attr for the first time
    progressBar.attr({ max: getMax() });

    $(document).on('scroll', function() {
      // On scroll only Value attr needs to be calculated
      progressBar.attr({ value: getValue() });
    });

    $(window).resize(function() {
      // On resize, both Max/Value attr needs to be calculated
      progressBar.attr({ max: getMax(), value: getValue() });
    });
  } else {
    var progressBar = $('.progress-bar'),
    max = getMax(),
    value, width;

    var getWidth = function() {
      // Calculate width in percentage
      value = getValue();
      width = (value / max) * 100;
      width = width + '%';
      return width;
    }

    var setWidth = function() {
      progressBar.css({ width: getWidth() });
    }

    $(document).on('scroll', setWidth);
    $(window).on('resize', function() {
      // Need to reset the Max attr
      max = getMax();
      setWidth();
    });
  }

        var page = 1;
      $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
          page++;
          loadMoreData(page);
        }
      });

      function loadMoreData(page){
        $.ajax(
        {
          url: '?page=' + page,
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
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
          alert('server not responding...');
        });
      }
});