$(document).ready(function() {

// FOLLOW USER BUTTON
$(document).on('click', '.follow-u', function() {

  var boo = $(this);
  var formData = new FormData();

  formData.append("user_id", $("#iaiduui").val());
  formData.append("fuser_id", boo.attr("user-d"));
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
    formData.append("fuser_id", boo.attr("user-d"));
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
});