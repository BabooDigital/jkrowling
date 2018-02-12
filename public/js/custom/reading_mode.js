$(document).ready(function() {
  $('.backbtn').on('click', function() {
    window.history.go(-1);
  });
    $(document).on('click', '.like', function() {

    var boo = $(this);
    var formData = new FormData();
    var likecount = +$('#likecount').text() + 1;

    $('.loveicon').attr("src", ""+base_url+"public/img/assets/love_active.svg");
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

    $('.loveicon').attr("src", ""+base_url+"/public/img/assets/icon_love.svg");
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
        console.log(count_data);
        loadMoreData(page);
      }else{
        // $("#read").show();
      }
    }
    var fixedScroll = $("#cobamenu").scrollTop();
    var scrollPos = $(document).scrollTop();
    $('#cobamenu input[type="hidden"]').each(function () {
        var currLink = $(this);
        var refElement = $("#"+currLink.val());
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            var numbers = currLink.val().split("-");
            var number = parseInt(numbers[1])+1;
            $('#chapter_number').html(number);
        }
    });
   //  if (currentScroll > previousScroll){
   //   console.log("down "+fixedScroll);
   // } else {
   //    console.log("up "+fixedScroll);
      // var id_page = '';
      // var page_id = $("#chapter_number").text() - 1;
      // if (page_id == 0) {
      //   id_page += '<small>Page</small> <strong>Description</strong>';
      // }else{
      //   id_page += page_id;
      // }
      //   $("#chapter_number").text(id_page);
      // }
      // previousScroll = currentScroll;
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
      $("nav#cobamenu").append("<input type='hidden' value='post-"+page+"' />");
    })
    .fail(function(jqXHR, ajaxOptions, thrownError)
    {
      console.log('server not responding...');
    });
  }
});
function showLoading() {
  var options = {
         theme:"sk-cube-grid",
         message:'Tunggu Sebentar ',
         backgroundColor:"white",
         textColor:"#7554bd" 
    };
    HoldOn.open(options);
}