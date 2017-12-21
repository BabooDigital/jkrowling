    function funcDropdown() {
      document.getElementById("myDropdown").classList.toggle("showss");
    }

    $(document).ready(function(){
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
          console.log('server not responding...');
        });
      }
      
      $.ajax({
        url: base_url + 'writter',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(data) {
        var json = $.parseJSON(data);
        var datas = "";
        $.each(json.data, function(i, item) {
          var avatar;
          if (item.avatar != "") {
            avatar = item.avatar;
          }else if (item.avatar == ""){
            avatar = 'public/img/profile/blank-photo.jpg';
          }
          datas += "<li class='media baboocontent'><img alt='"+item.author_name+"' class='d-flex mr-3 rounded-circle' src='"+ avatar +"' width='50' height='50'><div class='media-body mt-7'><h5 class='mt-0 mb-1 nametitle'>"+item.author_name+"</h5><small>Fiksi</small><div class='pull-right baboocolor'><a href='#' class='addbutton'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a></div></div></li>";
          
        });
        $("#author_this_week").html(datas);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });



      var window_width = $( window ).width();

      if (window_width < 768) {
        $(".stickymenu").trigger("sticky_kit:detach");
      } else {
        make_sticky();
      }

      $( window ).resize(function() {

        window_width = $( window ).width();

        if (window_width < 768) {
          $(".stickymenu").trigger("sticky_kit:detach");
        } else {
          make_sticky();
        }

      });

      function make_sticky() {
        $(".stickymenu").stick_in_parent();
      }

      $(document).on('click', '.like', function() {

        var aww = $(this);
        var formData = new FormData();
        var id_book = $("#iaidubi").val();

        formData.append("user_id", $("#iaiduui").val());
        formData.append("book_id", $("#iaidubi").val());

        $.ajax({
          url: base_url + 'like',
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
        .done(function() {
          $("#loveboo"+id_book).attr('class', 'mr-30 fs-14px unlike');
          $(".loveicon").attr({
            src: 'public/img/assets/love_active.svg'
          });
          // $('.loader').hide();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
        });
        
      });

      $(document).on('click', '.unlike', function() {

        var aww = $(this);
        var formData = new FormData();
        var id_book = $("#iaidubi").val();

        formData.append("user_id", $("#iaiduui").val());
        formData.append("book_id", $("#iaidubi").val());

        $.ajax({
          url: base_url + 'like',
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
        .done(function() {
          $("#loveboo"+id_book).attr('class', 'mr-30 fs-14px like');
          $(".loveicon").attr({
            src: 'public/img/assets/icon_love.svg'
          });
          // $('.loader').hide();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
        });
        
      });

    });