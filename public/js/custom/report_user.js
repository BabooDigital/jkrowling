$(document).ready(function() {
    $('#tbl-report').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\Rp. ,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            totalAll1 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            totalAll2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            total1 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $(api.column(3).footer()).html(
                total1+' ( Semua : '+totalAll1+' )', ''
            );
            $(api.column(4).footer()).html(
                'Rp. '+total2+' ( Semua : Rp. '+totalAll2+' )', ''
            );

            // $( api.column( 2 ).footer() ).html(
            //     '$'+pageTotal +' ( $'+ total +' total)'
            // );
        }
    } );

    $(document).on('click', function () {
        $(".search_result_report").addClass('hide').removeClass('show');
    });

    // $('#searchReports').bind("enterKey",function(e){
    //     window.location = base_url+'search?uid='+$(this).val();
    // });
    // $('#searchReports').keyup(function(e){
    //     if(e.keyCode == 13)
    //     {
    //         $(this).trigger("enterKey");
    //     }
    // });

    $(document).on('keyup', '#searchReports', function(event) {
        $(this).attr("style", "background: url('"+base_url+"public/img/spinner.gif') no-repeat right;background-size: 75px;background-position: 110% 50%;");
        var search = $(this).val();
        var formdata = new FormData();

        formdata.append('search', search);
        formdata.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "users",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: formdata,
        })
            .done(function(data) {
                if (search.length >=3) {
                    $(".search_result_report").addClass('show').removeClass('hide');
                    var list_user = '';

                    if (data.length !== 0) {
                        list_user += '<h6 class="dropdown-header">Daftar Pencarian Pengguna</h6><hr class="mt-0 mb-5">';
                    }
                    $.each(data, function(index, val) {
                        var prof_pict = val.prof_pict;
                        if (prof_pict == null || prof_pict == ""){
                            var prof_pict = base_url+'public/img/profile/blank-photo.jpg';
                        }
                        list_user += '<a class=""  href="'+base_url+'profile/laporan?uid='+val.user_id+'"><li class="dropdown-item"><img class="img-fluid rounded mr-10 obj-fit-cover prof_pict_search" src="'+prof_pict+'" width="20" height="25">'+val.fullname+'</li></a>';
                    });
                    if (data.length === 0){
                        $(".search_result_report").html('<li class="dropdown-item">Kata kunci yang anda cari tidak ada...</li>');
                    }else{
                        $(".search_result_report").html(list_user);
                    }
                }else{
                    $(".search_result_report").addClass('hide').removeClass('show');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
            });
    });
} );

function funcDropdown() {
    document.getElementById("myDropdown").classList.toggle("showss")
}
