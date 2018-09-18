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
    uploadCoverMr();

    $("#publish_book_epub").click(function() {
        event.preventDefault();
        /* Act on the event */
        var formData = new FormData(),
            pr = $("#inputprice").val(),
            slide = $('.priceCheck:checkbox:checked'),
            asd = slide.is(':empty'),
            slidepub = $('.publishCheck:checkbox:checked'),
            dsa = slidepub.is(':empty'),
            dateField = $('#date_pub').val(),
            timeField = $('#time_pub').val(),
            pub_date = dateField+' '+timeField+':00';

        formData.append("csrf_test_name", csrf_value);
        if (slide.length == 0 || asd == false) {
            formData.append("is_paid", false);
        }else{
            formData.append("price", pr);
            formData.append("is_paid", true);
        }
        if (slidepub.length == 1 && dateField !== null || dateField !== ""){
            formData.append("publish_date", pub_date)
        }else{

        }
        formData.append("book_id", $("#uri").val());
        formData.append("file_cover", $("#cover_file").val());
        formData.append("category", $("#category_ids").val());

        var cat = $("#category_ids").val();
        var tnc = $('.checktnc:checkbox:checked');

        if (cat == null || cat == "") {
            swal(
                'Gagal!',
                'Pilih kategori buku mu.',
                'error'
            );
        }else if(slide.length == 1 && pr <= 10000){
            swal(
                'Gagal!',
                'Minimal harga total penjualan buku sebesar Rp 10.000,-',
                'error'
            );
        }else if(tnc.length == 0){
            swal(
                'Gagal!',
                'Setujui Term of Service.',
                'error'
            );
        }else {
            var t = type_,
                d = $("#file-to-upload")[0].files,
                FD = new FormData(),
                aww = $(this);

            if (d.length === 1) {
                FD.append('pdf_file', d[0]);
                FD.append('id_book', $('#uri').val());
                FD.append('is_free', '1');
                FD.append(csrf_name, csrf_value);
                $.ajax({
                    url: base_url+'uploadAct',
                    type: 'POST',
                    dataType: 'JSON',
                    crossDomain: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    mimeType: "multipart/form-data",
                    data: FD,
                    beforeSend: function () {
                        swal.showLoading()
                    },
                }).done(function(data) {
                    if (data.c == 200){
                        $.ajax({
                            url: base_url+'publishbook',
                            dataType: 'json',
                            type: 'POST',
                            contentType: false,
                            processData: false,
                            data: formData,
                            beforeSend: function() {
                                swal({
                                    text: 'Harap tunggu...',
                                    onOpen: () => {
                                    swal.showLoading();
                            }
                            });
                            }
                        })
                            .done(function(data) {
                                if (data.code == 200) {
                                    window.location = base_url+'timeline';
                                }else{
                                    console.log(data);
                                    location.reload();
                                }
                            })
                            .fail(function() {
                                console.log("errorss");
                                location.reload();
                            })
                            .always(function() {
                            });
                    }
                })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                    });
            }else{
                $.ajax({
                    url: base_url+'publishbook',
                    dataType: 'json',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function() {
                        swal({
                            text: 'Harap tunggu...',
                            onOpen: () => {
                            swal.showLoading();
                    }
                    });
                    }
                })
                    .done(function(data) {
                        console.log(data);
                        // if (data.code == 200) {
                        //     window.location = base_url+'timeline';
                        // }else{
                        //     location.reload();
                        // }
                    })
                    .fail(function() {
                        console.log("errorss");
                        location.reload();
                    })
                    .always(function() {
                    });
            }
        }
    });
});
function publishBook() {
  $("#publish_book").click(function() {
      var formData = new FormData(),
          start_ch = '',
          pr = $("#inputprice").val(),
          slide = $('.priceCheck:checkbox:checked'),
          asd = slide.is(':empty'),
          slidepub = $('.publishCheck:checkbox:checked'),
          dsa = slidepub.is(':empty'),
          cat = $("#category_ids").val(),
          tnc = $('.checktnc:checkbox:checked'),
          dateField = $('#date_pub').val(),
          timeField = $('#time_pub').val(),
          pub_date = dateField+' '+timeField+':00';

      formData.append("csrf_test_name", csrf_value);
      if ($('.pdfcheck').val() == 'true') {
          start_ch = $(".start_chapter_pdf").val();
      }else{
          start_ch = $(".start_chapter").val();
      }
      if (slide.length == 0 || asd == false) {
          formData.append("is_paid", false);
      }else{
          formData.append("price", pr);
          formData.append("chapter_start", start_ch);
          formData.append("is_paid", true);
      }
      if (slidepub.length == 1 && dateField !== null || dateField !== ""){
          formData.append("publish_date", pub_date)
      }else{

      }
      formData.append("book_id", $("#uri").val());
      formData.append("file_cover", $("#cover_file").val());
      formData.append("category", $("#category_ids").val());

    if (cat == null || cat == "") {
      swal(
        'Gagal!',
        'Pilih kategori buku mu.',
        'error'
        );
    }else if(slide.length == 1 && pr <= 10000){
      swal(
        'Gagal!',
        'Minimal harga total penjualan buku sebesar Rp 10.000,-',
        'error'
        );
    }else if(tnc.length == 0){
      swal(
        'Gagal!',
        'Setujui Term of Service.',
        'error'
        );
    }else {
      $.ajax({
        url: base_url+'publishbook',
        dataType: 'json',
        type: 'POST',
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: function() {
          swal({
            text: 'Harap tunggu...',
            onOpen: () => {
              swal.showLoading();
            }
          });
        }
      })
      .done(function(data) {
        if (data.code == 200) {
          window.location = base_url+'timeline';
        }else{
          location.reload();
        }
        })
      .fail(function() {
        console.log("errorss");
        location.reload();
      })
      .always(function() {
      });
    }

  });
}

function uploadCoverMr() {
  $("#file_cover").change(function() {
    var a = new FormData();
    a.append("file_cover", $("#file_cover")[0].files[0]);
    a.append("book_id", $("#uri").val());
    a.append("csrf_test_name", csrf_value);
    $.ajax({
      url: base_url + "post_cover",
      type: "POST",
      dataType: 'json',
      contentType: false,
      processData: false,
      data: a
    }).done(function(data) {
     $("#cover_file").val(data.link);
   }).fail(function() {
    console.log("error");
  }).always(function() {})
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
      data: {book_id: book_id, chapter_title: title, paragraph: paragraph, csrf_test_name: csrf_value}
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
    toolbarBottom: false,
    pastePlain: true
  });
  $('#paragraph_book').froalaEditor('events.on', 'focus', function (e) {
    $('#paragraph_book').froalaEditor('fullscreen.toggle');
    $('.fr-element').css({'background-color':'#f3f5f7', 'height':'100vh', 'z-index':'9999'});
  }, false);
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
      // console.log(gbPreview);
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
    var chapter_id = $("#ch_id").val();
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
              data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book, 'chapter_id' : chapter_id, 'csrf_test_name': csrf_value},
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
      window.history.back();
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
    var chapter_id = $("#ch_id").val();
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
        data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book, 'chapter_id' : chapter_id, 'csrf_test_name' : csrf_value},
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
          var chid = data.data.chapter_id;
          if (data.code == 200) {
            $('#ch_id').val(chid);
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
    var chapter_id = $("#ch_id").val();
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
            data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book, 'chapter_id' : chapter_id, 'csrf_test_name' : csrf_value},
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
                // swal.hideLoading();
                window.location = base_url+'listchapter/'+book_id;
                // $("#chapter_title_out").val('');
                // $("#paragraph_book").val('');
                // $('#paragraph_book').froalaEditor('html.set', '');
                // $("#backlinks").removeClass('backlink');
                // $("#backlinks").attr("id",'backdraft');
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
    dataType: 'json',
    data:{csrf_test_name: csrf_value}
  })
  .done(function(data) {
    var category = "<option value=''>Kategori Buku</option>";
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
        data: { 'book_id' : book_id, 'chapter_title' : chapter_title, 'paragraph_book' : paragraph_book, 'chapter_id' : chid, 'csrf_test_name' : csrf_value},
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

function check_sell() {
  var formData = new FormData();
  formData.append("book_id", $("#uri").val());
  formData.append("csrf_test_name", csrf_value);

  $.ajax({
    url: base_url+'validateSell',
    type: 'POST',
    dataType: 'JSON',
    contentType: false,
    processData: false,
    data: formData,
    beforeSend: function() {
      swal({
        text: 'Harap tunggu...',
        onOpen: () => {
          swal.showLoading();
        }
      });
    }
  })
  .done(function(data) {
      $('.swal2-container').css('display', 'none');
    if (data.code == 200) {
      if (data.data.is_publishable == true) {

        $('#writen1').text(data.data.writer_fee+'%');
        $('#baboo1').text(data.data.baboo_fee+'%');
        $('#fee1').text(data.data.ppn+'%');

        if (data.data.is_sellable == true && data.data.price == "0") {
          $(".start_chapter").val(data.data.total_chapter_sellable);
          $(".start_chapter_pdf").val(data.data.total_chapter_sellable);
          $("#count_chapter_plus_minus").val(data.data.total_chapter);
          $("#minim_chapter").val(data.data.total_chapter_sellable);
          $('.switch').show();
          swal({
            title: 'Yeay...!',
            text: 'Buku anda sudah layak untuk dijual. Mau dijual sekarang?',
            imageUrl: base_url+'public/img/can_sell.png',
            imageAlt: 'Congrats! You Can Sell your Book. :)',
            animation: true,
            showCancelButton: true,
            confirmButtonColor: '#7661ca',
            cancelButtonColor: '#979797',
            confirmButtonText: 'Ya, Jual',
            cancelButtonText: 'Nanti'
          }).then((result) => {
            if (result.value) {
              $('#showOpt').prop('checked', true);
              var sellbtn = $('#showOpt:checkbox:checked');
              var pin = $('#what').val();
              if (sellbtn.length != 0 && pin == 'false') {
                $('#publish_book').hide();
                $('#publish_book_epub').hide();
                $('#setpin_publish').show();
              }
              $('#priceSet').addClass('show');
            }else{

            }
          });
          $(document).on('keyup', '#inputprice', function(event) {
            event.preventDefault();
            var id = $(this).val();
            var payment_fee = data.data.payment_fee;
            var nominal = $(this).val().split(".").join("");
            var ppn = data.data.ppn * nominal / 100;
            var writen_earn = parseFloat(id) * data.data.writer_fee / 100;
            var baboo_earn = parseFloat(id) * data.data.baboo_fee / 100;
            var rp_total = parseFloat(id) + (ppn + payment_fee);
            $("#rp").show();
            $("#rp_fee").show();
            $("#rp2").show();
            $("#rp_fee2").show();
            $("#rp_total").show();
            $('#writen-earn').number(writen_earn);
            $('#baboo-earn').number(baboo_earn);
            $('#ppn').number(ppn);
            $('#payment_fee').number(payment_fee);
            $('#total').number(rp_total);
          });

        }else{

        }
      }else{

      }
    }else{
      window.location = base_url+'yourdraft';
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
  });
}

function checkingPIN(){
  var bid = $("#uri").val();
  $(document).on('click', '#setpin_publish', function() {
    swal({
      title: 'Perhatian',
      text: "Untuk menjual sebuah buku, anda harus mengaktifkan Dompet Baboo terlebih dahulu.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#7661ca',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, aktifkan',
      cancelButtonText: 'Jual nanti',
    }).then((result) => {
      if (result.value) {
        window.location = base_url+'pin-dompet?from=pub-book&b='+bid+'&type='+type_;
      }
    })
  });
}
