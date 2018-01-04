$(function(){
  froalaEditor();
  titleBook();
  chapterBook();
  isFree();
  backLink();
});
function froalaEditor() {
  $.FroalaEditor.DefineIcon('imageInfo', {NAME: 'info'});
  $.FroalaEditor.RegisterCommand('imageInfo', {
    title: 'Info',
    focus: false,
    undo: false,
    refreshAfterCallback: false,
    callback: function () {
      var $img = this.image.get();
      alert($img.attr('src'));
    }
  });

  $('#paragraph_book').froalaEditor({
    imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove'],
    buttons: ['undo', 'redo' , 'sep', 'bold', 'italic', 'underline'],
    height: 150,
    width: 500,
    initOnClick: true,
    toolbarBottom: true
  })
}
function titleBook() {
    $("#title_book_out").keyup(function(event) {
      $("#title_book").val($(this).val());
    });
}
function chapterBook() {
  $("#chapter_title_out").keyup(function(event) {
    $("#chapter_title").val($(this).val());
  });
  $('.paragraph').on('froalaEditor.keyup', function (e, editor, keyupEvent) {
    $("#paragraph").val($(".paragraph").val());
  });
}
function tampilkanPreview(gambar, idpreview) {
// membuat objek gambar
  var gb = gambar.files;

  // loop untuk merender gambar
  // console.log(idpreview);
  // console.log(gb);
  for (var i = 0; i < gb.length; i++) {
    // bikin variabel
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview = document.getElementById(idpreview);
    var reader = new FileReader();
      console.log(gbPreview);
    if (gbPreview.type.match(imageType)) {
      // jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element) {
        return function(e) {
          element.src = e.target.result;
        };
      })(preview);

      // membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    } else {
      // jika tipe data tidak sesuai
      alert("Type file tidak sesuai. Khusus image.");
    }

  }
}

function isFree() {
    $("#is_free").change(function() {
        if ($(this).is(':checked')) {
          $(".rangebook").show();
        }else{
          $(".rangebook").hide();
        }
    });
}
function backLink() {
    $(".backlink").on('click', function() {

      var formData = new FormData();
      var book_id = $("#book_id").val();
      var chapter_title = $("#chapter_title").val();
      var paragraph_book = $("#paragraph_book").val();
      var url = base_url+'savechapter';
        var confirmText = "Are you sure ?";
        if(confirm(confirmText)) {
            $.ajax({
                type:"POST",
                url:url,
                data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book},
                dataType: 'json',
                success:function (data) {
                  if (data.code == 200) {
                    // console.log(data.data['book_id']);
                    window.location = base_url+'listchapter/'+data.data['book_id'];
                  }
                },
            });
        }
        return false;
    });
}

// function back(url) {
    if (history.length > 2 || document.referrer.length > 0) {
        // go back:
        // window.History.back();
        console.log('a');
    } else if (url) {
        // go to specified fallback url:
        window.History.replaceState(null, null, url);
    }
// }