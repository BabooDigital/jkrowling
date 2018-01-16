$(document).ready(function(){
  getWritters();
  getSlide();
});
function getWritters() {
  $.ajax({
    url: 'writters',
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
  });

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
}
function getSlide() {
  $.ajax({
    url: 'slide',
    type: 'GET',
    dataType: 'json',
  })
  .done(function(data) {
    var datas = "";
    $.each(data, function(i, item) {
      datas += '<div class="slide"> <div class="blueslidebg"> <div class="media"> <img class="d-flex mr-3" src="'+base_url+'public/img/book-cover/kite-runner.png" width="160"> <div class="media-body mt-10 blueslide" style="padding: 5% 0;"> <h4 class="mt-0"><b>Kite Runner</b></h4> <p class="authorslide">by Khaled Hosseini</p> <p>Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p> <div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div> </div> </div> </div> </div> '; 
    });
    $("#slide_show").html(datas);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
}