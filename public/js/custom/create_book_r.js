$(function(){
  froalaEditor();
  titleBook();
  chapterBook();
  isFree();
  backLink();
  toChaptList();
  saveDraft();
  saveEditChapter();
  addChapter();
  publishChapter();
  publishBook();
  getCategory();
});
function publishBook() {
    $("#publish_book").click(function() {
      var formData = new FormData();
      formData.append("book_id", $("#uri").val());
      formData.append("file_cover", $("#cover_name").val());
      formData.append("category", $("#category_ids").val());

      $.ajax({
        "url": base_url+'publishbook',
        "dataType": 'json',
        "cache": false,
        "type": "POST",
        "contentType": false,
        "processData": false,
        "data":formData,
      })
      .done(function(data) {
        if (data.code == 200) {
          window.location = base_url+'timeline';
        }
      })
      .fail(function() {
        console.log("error");
      });
    });
}
function publishChapter() {
    $("#publish_chapter").click(function() {
      var title = $("#chapter_title_out").val();
      var paragraph = $("#paragraph_book").val();
      var book_id = $("#book_id").val();

      var formData = new FormData();

      formData.append("book_id", book_id);
      formData.append("chapter_title", title);
      formData.append("paragraph", paragraph);

      $.ajax({
        url: base_url+'cover',
        type: 'POST',
        dataType: 'json',
        data: {book_id: book_id, chapter_title: title, paragraph: paragraph}
      })
      .done(function(data) {
        if (data.code == 200) {
          window.location = base_url+'cover/'+data.data['book_id'];
        }
      })
      .fail(function() {
        console.log("error");
      })
    });
}
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
    placeholderText: 'Kamu adalah apa yang kamu pikirkan...',
    heightMin: 200,
    heightMax: 300,
    width: 600,
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
    $("#paragraph").val($(this).val());
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
  $(document).on('click',"#backlinks", function() {

    var formData = new FormData();
    var book_id = $("#book_id").val();
    var chapter_title = $("#chapter_title_out").val();
    var paragraph_book = $("#paragraph_book").val();
    var url = base_url+'savechapter';
    
    if (chapter_title != '' || paragraph_book != '') {
      swal({
        title: 'Ingin Kembali?',
        text: "Simpan cerita kamu dan menuju daftar cerita yang kamu buat.",
        showCancelButton: true,
        confirmButtonColor: '#644cb6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          if (chapter_title == "" || paragraph_book == "") {
            swal(
              'Gagal!',
              'Lengkapi Judul dan Isi Buku mu.',
              'error'
              )
          }else {
            $.ajax({
              type:"POST",
              url:url,
              data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book},
              dataType: 'json',
              beforeSend: function () {
                swal({
                  title: 'Menyimpan Cerita',
                  timer: 60000,
                  onOpen: () => {
                    swal.showLoading()
                  }
                });
              },
              success:function (data) {
                if (data.code == 200) {
                  window.location = base_url+'listchapter/'+data.data['book_id'];
                }
              },
            });
          }
        }else{
        }
      });
    }else {
      window.location = base_url+'create_mybook';
    }
  });
}

function toChaptList() {
  $(document).on('click',"#backdraft",function() {
    var book_id = $("#book_id").val();
    window.location = base_url+'listchapter/'+book_id;
  });
}

function saveDraft() {
  $("#saveChapt").on('click', function() {

    var formData = new FormData();
    var book_id = $("#book_id").val();
    var chapter_title = $("#chapter_title_out").val();
    var paragraph_book = $("#paragraph_book").val();
    var url = base_url+'savechapter';

    if (chapter_title == "" || paragraph_book == "") {
      swal(
        'Gagal!',
        'Lengkapi Judul dan Isi Buku mu.',
        'error'
        )
    }else {
      $.ajax({
        type:"POST",
        url:url,
        data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book},
        dataType: 'json',
        beforeSend: function () {
          swal({
            title: 'Menyimpan Cerita',
            onOpen: () => {
              swal.showLoading()
            }
          });
        },
        success:function (data) {
          if (data.code == 200) {
              swal.hideLoading()
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
             $("#backlinks").removeClass('backlink');
             $("#backlinks").attr("id",'backdraft');
          }
        },
      });
    }
  });
}

function addChapter() {
  $("#addSome").on('click', function() {

    var formData = new FormData();
    var book_id = $("#book_id").val();
    var chapter_title = $("#chapter_title_out").val();
    var paragraph_book = $("#paragraph_book").val();
    var url = base_url+'savechapter';

    swal({
      title: 'Tambah cerita?',
      text: "Simpan cerita kamu dan tambah chapter bukumu.",
      showCancelButton: true,
      showCloseButton: true,
      confirmButtonColor: '#644cb6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Simpan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        if (chapter_title == "" || paragraph_book == "") {
          swal(
            'Gagal!',
            'Lengkapi Judul dan Isi Buku mu.',
            'error'
            )
        }else {
          $.ajax({
            type:"POST",
            url:url,
            data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book},
            dataType: 'json',
            beforeSend: function () {
              swal({
                title: 'Menyimpan Cerita',
                onOpen: () => {
                  swal.showLoading()
                }
              });
            },
            success:function (data) {
              if (data.code == 200) {
                swal.hideLoading();
                $("#chapter_title_out").val('');
                $("#paragraph_book").val('');
                $('#paragraph_book').froalaEditor('html.set', '');
               $("#backlinks").removeClass('backlink');
               $("#backlinks").attr("id",'backdraft');
              }
            },
          });
        }
      }
    });
  });
}

function getCategory() {
  $.ajax({
    url: base_url+'getCategory',
    type: 'POST',
    dataType: 'json'
  })
  .done(function(data) {
    var category = "<option value=''>Pilih Category Buku</option>"; 
    $.each(data, function(index, val) {
      category += "<option value='"+val.category_id+"'>"+val.category_name+"</option>";
    });
    $("#category_ids").html(category);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
  
}

// function back(url) {
    if (history.length > 2 || document.referrer.length > 0) {
        // go back:
        // window.History.back();
    } else if (url) {
        // go to specified fallback url:
        window.History.replaceState(null, null, url);
    }
// }

function saveEditChapter() {
  $("#saveEdit").on('click', function() {

    var formData = new FormData();
    var book_id = $("#book_id").val();
    var chapter_title = $("#chapter_title_out").val();
    var paragraph_book = $("#paragraph_book").val();
    var url = base_url+'saveeditchapter';

    if (chapter_title == "" || paragraph_book == "") {
      swal(
        'Gagal!',
        'Lengkapi Judul dan Isi Buku mu.',
        'error'
        )
    }else {
      $.ajax({
        type:"POST",
        url:url,
        data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book, 'chapter_id' : chid},
        dataType: 'json',
        beforeSend: function () {
          swal({
            title: 'Menyimpan Cerita',
            onOpen: () => {
              swal.showLoading()
            }
          });
        },
        success:function (data) {
          console.log(data);
          if (data.code == 200) {
              swal.hideLoading()
            window.location = base_url+'listchapter/'+data.data['book_id'];
          }
        },
      });
    }
  });
}