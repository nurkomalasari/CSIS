@extends('layouts.v_main')
@section('title',' CSIS | Company ')
@section('title-table', 'Company')
@section('master','show')
@section('company','active')


@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button" id="add">
                <b>Add</b>
                <i class="fas fa-plus ml-2" ></i>
              </button>
              <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal" data-target="#importData" onclick="dataLengthAll()">
                  <b> Import </b>
                  <i class="fas fa-file-excel ml-2 " ></i>
                </button>
                <a href="/export_company" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
                <i class="fas fa-file-export"></i>
                </a>
                 {{-- buat form pencarian --}}
                <input type="text" placeholder="Search.." id="search_form">
              <button class="btn btn-success edit_all" data-toggle="tooltip" title="Edit Selected">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger delete_all" data-toggle="tooltip" title="Delete Selected">
                <i class="fas fa-trash"></i>
              </button>
            </div>
            <form onsubmit="return false">

             <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th>
                  <div>
                      <label class="form-check-label">
                          <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                          <span class="form-check-sign"></span>
                      </label>
                  </div>
                </th>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list-company">Company Name*</th>
                <th scope="col" class="list-company">Seller*</th>
                <th scope="col" class="list">Customer Code*</th>
                <th scope="col" class="list-agreement">No Agreement Letter*</th>
                <th scope="col" class="list">Status*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
              </tbody>
             </table>
             <div class="float-left mt-2">
            <select class="form-control input-fixed" id="page-length">
              <option value="50">50</option>
              <option value="100">100</option>
              <option value="1000">1000</option>
              {{-- <option value="all">All</option> --}}
            </select>
          </div>
           {{-- memposisikan page paling kiri --}}
          <div class="paginate float-right mt-2">
            {{-- membuat tombol data sebelumnya --}}
            <button class="btn btn-light" id="previous">Previous</button>
            {{-- membuat penomoran page --}}
            <button class="btn btn-secondary" id="currentPage"></button>
            {{-- membuat tombol data selanjutnya --}}
            <button class="btn btn-light" id="next">Next</button>
          </div>

            </div>
        </div>
    </div>
  </div>
 </form>

        {{-- modal Import --}}
        <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
		<div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role="document">
			<div class="modal-content-full-width modal-content">
				<div class="modal-header-full-width modal-header bg-primary">
					<h6 class="modal-title">Import data</h6>
					<button type="button" class="close" id="close-modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
          <div class="card">
            <div class="card-header">
              <b>Select Excel File</b>
              <br>
              <input type="file" id="excel_file" />
              <button type="button" class="btn btn-success btn-xs" id="send" onclick="save_data()" >Save</button>
              <a  class="btn btn-secondary btn-xs" href="/download_template_Company" style="color:white">Download Template</a>
              <div class="mt-2 progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="excel_data" ></div>
            </div>
          </div>
        </div>
        <div class="modal-footer-full-width  modal-footer">

        </div>
        </div>
			</div>
		</div>
	</div>


  <script>
    $(document).ready(function() {
         $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      read();
          // panggil fungsi currentPage
      currentPage()

    });

    const excel_file = document.getElementById("excel_file");
    excel_file.addEventListener("change",(event)=>{
        function progress_bar_process(percentage, timer)
        {
            $('.progress-bar').css('width',percentage + '%');
            if(percentage > 100)
            {
                clearInterval(timer);
                $('#process').css('display','none');
                $('.progress-bar').css('width','0%');
                if(
            ![
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                "application/vnd.ms-excel",
            ].includes(event.target.files[0].type)
        ) {
            document.getElementById("excel_data").innerHTML =
            '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';
            excel_file.value = "";
            return false;
        }

        var reader = new FileReader();
        reader.readAsArrayBuffer(event.target.files[0]);
        reader.onload = function (event){
            var data = new Uint8Array(reader.result);
            var work_book = XLSX.read(data,{type: "array"});
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(
                work_book.Sheets[sheet_name[0]],
                {header: 1}
            );
            if (sheet_data.length > 0){
                var table_output = '<table class="table table-bordered" id="importTable">';

                for(var row = 0; row < sheet_data.length; row++) {
                    table_output += "<tr>";

                    for (var cell = 0; cell < sheet_data[row].length; cell++){
                        if (row == 0){
                            table_output += "<th>" + sheet_data[row][cell] + "</th>";

                        } else {
                            if (cell == 7 || cell == 8 || cell == 9 || cell == 10) {

                        if(sheet_data[row][cell] === undefined) {
                          datas = "";
                        } else {
                          var converted_requestDate = new Date(Math.round((sheet_data[row][cell] - (25567 + 2)) * 86400 * 1000));
                          var datas = converted_requestDate.toISOString().split('T')[0];
                        }

                      } else {
                        var datas = sheet_data[row][cell];
                      }
                            table_output += '<td contenteditable id="table-data-' + cell +'" >' + sheet_data[row][cell] + "</td>";

                        }
                    }
                        table_output += "</tr>";
                }
                    table_output += "</table>";
                    document.getElementById("excel_data").innerHTML = table_output;

            }
            excel_file.value = "";
        };
      }
     }
     var percentage = 0;
      var timer = setInterval(function(){
      percentage = percentage + 20;
      progress_bar_process(percentage, timer);
      }, 1000);
    });

     function progress_bar_process(percentage, timer)
    {
      $('.progress-bar').css('width', percentage + '%');
      if(percentage > 100)
      {
        clearInterval(timer);
        $('#process').css('display', 'none');
        $('.progress-bar').css('width', '0%');
        setTimeout(function(){
        swal({
              type: 'success',
              title: 'Data Saved',
              showConfirmButton: false,
              timer: 1500
        }).catch(function(timeout) { });
        read();
        $("#importTable tr").remove();
        $('#importData').modal('hide');
        }, 5000);
      }
    }


    // ------ save data import -------
    function save_data(){
        var total = 0;
        var jsonTable = $('#importTable tbody tr:has(td)').map(function(){
            var $td = $('td', this);
            total += parseFloat($td.eq(2).text());
            return{
              company_name: $td.eq(0).text(),
              seller_id: $td.eq(1).text(),
              customer_code: $td.eq(2).text(),
              no_agreement_letter_id: $td.eq(3).text(),
              status: $td.eq(4).text(),
            }
        }).get();
         $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
        data = {};
        data = jsonTable;
        var thLength = $('#importTable th').length;
        var trLength = $("#importTable td").closest("tr").length;
        var item = document.querySelectorAll("#table-data-8");
        var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
        var success;
        $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: "{{ url('/save_import_Company') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
            swal({
                type: 'warning',
                text: 'error format',
                showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });
          } else {
              try {
              var percentage = 0;
              var timer = setInterval(function(){
              percentage = percentage + 20;
              progress_bar_process(percentage, timer);
              }, 1000);
            } catch (error) {
              swal({
                type: 'warning',
                text: 'Duplicate data or error format',
                showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });

            }
          }
          }
      });
    }
 // ---- Close Modal -------
    $('#close-modal').click(function() {
        // deleteTemporary();
        // read_temporary()
        $('#importData').modal('hide');
    });

     // membuat variable link untuk digunakan di fitur paginate
      var link = "{{ url('item_data_GsmMaster') }}";

    // ------ Tampil Data ------
    function read(){
        enableButton();
      $.get("{{ url('item_data_company') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "pageLength": 50,

         "dom": '<"top">rt<"bottom"><"clear">'

            });
        $('#table_id').DataTable().draw();
      });
    }

    // pageLength
    var length = 50;
    $("#page-length").change(function(){
        // numberPaginate = 1;
        length = $(this).val();
        numberPaginate = 1;
        lengthData = parseInt(length);
        // alert(lengthData_

        $.ajax({
        type: "get",
        url: `{{ url('item_data_page_length_company') }}`,
        data: {
          no: no - no + 1,
          length: length
        },
        success: function(datas) {
          $('#table_id').DataTable().destroy();
          $('#table_id').find("#item_data").html(datas);
          $('#table_id').dataTable( {
              "pageLength": length,
              "dom": '<"top">rt<"bottom"><"clear">'
              // "dom": '<lf<t>ip>'
              });
          $('#table_id').DataTable().draw();
          currentPage()
        }
      });
    });


    // ---- Tombol Cancel -----
    function cancel() {

      reload()

    }

     // ---- reload Table ---
    var lengthData = 50;
    var url =  "{{ url('item_data_company') }}";
    function reload() {
        enableButton();
    // alert(link)
    var reload = true;
      $.ajax({
        type: "get",
        url: `{{ '${url}' }}`,
        data: {
          no: no - lengthData,
          reload: reload
        },
        success: function(datas) {
          $('#table_id').DataTable().destroy();
          $('#table_id').find("#item_data").html(datas);
          $('#table_id').dataTable( {
              "pageLength": 50,
              "dom": '<"top">rt<"bottom"><"clear">'
              // "dom": '<lf<t>ip>'
              });
          $('#table_id').DataTable().draw();
          currentPage()
        }
      });
    }

      // Paginate --------
    let numberPaginate = 1;
    // next paginate
    $( "#next" ).click(function() {
      // console.log(link);
      // var old_no = no;
      // alert(old_no)
      if (no > 50) {
        numberPaginate += 1;
        $.get(`{{ '${link}?page=${numberPaginate}' }}` , {}, function(data, status) {
          // console.log(no)
          if(data != ""){
          $.ajax({
            type: "get",
            url: `{{ '${link}?page=${numberPaginate}' }}`,
            data: {
              no: no,
              length: length
            },
            success: function(datas) {
              $('#table_id').DataTable().destroy();
              $('#table_id').find("#item_data").html(datas);
              $('#table_id').dataTable( {
                  "pageLength": length,
                  "dom": '<"top">rt<"bottom"><"clear">'
                  // "dom": '<lf<t>ip>'
                  });
              $('#table_id').DataTable().draw();
              currentPage()
              url = `{{ '${link}?page=${numberPaginate}' }}`;
              // alert(url)
            }
          });
          } else {
            // numberPaginate -= 1;
            // alert(numberPaginate);
          }
        });
      }
    });

// previous paginate
    $( "#previous" ).click(function() {
      // alert(typeof length)
      // alert(no - length -1)
      if (numberPaginate > 1) {
          numberPaginate -= 1;
          $.ajax({
          type: "get",
          url: `{{ '${link}?page=${numberPaginate}' }}`,
          data: {
            no: no - (length*2),
          length: length
          },
          success: function(datas) {
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(datas);
            $('#table_id').dataTable( {
                "pageLength": length,
                "dom": '<"top">rt<"bottom"><"clear">'
                // "dom": '<lf<t>ip>'
            });
            $('#table_id').DataTable().draw();
            currentPage()
            url = `{{ '${link}?page=${numberPaginate}' }}`;
          }
        });
      }
    });

     // Search
    $(document).ready(function() {
      $("#search_form").keyup(function() {
        // alert($(this).val());
        $.ajax({
          type: "get",
          url: `{{ url('item_data_search_company') }}`,
          data: {
            text: $(this).val(),
          },
          success: function(datas) {
            var link = "{{ url('item_data_search_company') }}";
            numberPaginate = 1;
            // console.log(datas);
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(datas);
            $('#table_id').dataTable( {
                "pageLength": 50,
                "dom": '<"top">rt<"bottom"><"clear">'
                // "dom": '<lf<t>ip>'
                });
            $('#table_id').DataTable().draw();
            currentPage()
          }
        });

      });
    })

     // current Page
    function currentPage(){
      // memasukkan value dari variable numberPaginate ke elemen id currentPage
      $("#currentPage").text(numberPaginate);
    }

     // ------ Tambah Form Input ------
     $('.check').click(function() {
        $.get("{{ url('item_data_temporary_GsmMaster') }}", {}, function(data, status) {
          $('#table_temporary_id').find("#item_data_temporary").html(data);
        });
      });


     // ------ Tambah Form Input ------
     $('.add').click(function() {
         disableButton();
        $.get("{{ url('add_form_company') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_name = $("#company_name").val();
        var seller_id = $("#seller_id").val();
        var customer_code = $("#customer_code").val();
        var no_agreement_letter_id = $("#no_agreement_letter_id").val();
        var status = $("#status").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_company') }}",
            data: {
              company_name: company_name,
              seller_id: seller_id,
              customer_code: customer_code,
              no_agreement_letter_id: no_agreement_letter_id,
              status: status

            },
             success: function(data) {
            swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
            reload()


            }
        })
    }

    // -----Proses Delete Data ------
     function destroy(id) {
        var id = id;
        swal({
            title: 'Are you sure?',
            text: "You want delete to this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    type: "get",
                    url: "{{ url('destroy_company') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                         reload()

                    }
                });

              });
            },
            allowOutsideClick: false
      });
    }

    // ------ Edit Form Data ------
    function edit(id){
        disableButton();
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        // $("#item-no-"+id).hide("fast");
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+id).slideUp("fast");
        $("#item-company_name-"+id).slideUp("fast");
        $("#item-seller_id-"+id).slideUp("fast");
        $("#item-customer_code-"+id).slideUp("fast");
        $("#item-no_agreement_letter_id-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
        $.get("{{ url('edit_form_company') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_name = $("#company_name").val();
        var seller_id = $('select[name="seller_id"]').val();
        var customer_code = $("#customer_code").val();
        var no_agreement_letter_id = $("#no_agreement_letter_id").val();
        var status = $("#status").val();

        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_company') }}/"+id,
            data: {
              company_name: company_name,
              seller_id: seller_id,
              customer_code: customer_code,
              no_agreement_letter_id:no_agreement_letter_id,
              status: status
            },
            success: function(data) {
              swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                    reload()

            }
        });
    }


   // checkbox all

  $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

    // delete all
    $('.delete_all').on('click', function(){
      event.preventDefault();
      var allVals = [];
      $(".task-select:checked").each(function() {
          allVals.push($(this).attr("id"));
      });
          if (allVals.length > 0) {
              var _token = $('input[name="_token"]').val();
              // alert(allVals);
              swal({
              title: 'Are you sure?',
              text: "You want delete Selected data !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes Delete',
              showLoaderOnConfirm: true,
              preConfirm: function() {
              return new Promise(function(resolve) {
                  $.ajax({
                      url: "{{ url('/selectedDelete_company') }}",
                      method: "get",
                      data: {
                          id: allVals,
                          _token: _token
                      },
                      success: function(data) {
                          swal({
                              type: 'success',
                              title: 'The selected data has been deleted',
                              showConfirmButton: false,
                              timer: 1500
                          }).catch(function(timeout) { });
                          $("#master").prop('checked', false);
                            reload()

                          }
                      });
              });
              },
              allowOutsideClick: false
          });
      }else{
          alert('Select the row you want to delete')
      }
   });

    // form edit all
    $('.edit_all').on('click', function(e){
        disableButton();
        $('[data-toggle="tooltip"]').tooltip("hide");

    var allVals = [];
    var _token = $('input[name="_token"]').val();

    $(".task-select:checked").each(function() {
        allVals.push($(this).attr("id"));
    });
    if (allVals.length > 0){
        $(".edit_all").hide("fast");
        $(".delete_all").hide("fast");
        $.get("{{ url('selected_company') }}", {}, function(data, status) {
            $("#selected").prepend(data)
        });
        $.each(allVals, function(index, value){
            $("#td-checkbox-"+value).hide("fast");
            $("#td-button-"+value).hide("fast");
            $("#item-no-"+value).slideUp("fast");
            $("#item-company_name-"+value).slideUp("fast");
            $("#item-seller_id-"+value).slideUp("fast");
            $("#item-customer_code-"+value).slideUp("fast");
            $("#item-no_agreement_letter_id-"+value).slideUp("fast");
            $("#item-status-"+value).slideUp("fast");

            $(".add").hide("fast");
            $.get("{{ url('edit_form_company') }}/" + value, {}, function(data, status) {
                $("#edit-form-"+value).prepend(data)
                $("#master").prop('checked', false);
                $(".add").hide();
                $(".cancel").hide();
                $(".import").hide();
                $(".export").hide();
            });
        });
    }else{
        alert('Select the row you want to edit')
    }
    });

      // ------ Proses Update Data ------
    function updateSelected() {
        var allVals = [];

        $(".task-select:checked").each(function() {
            allVals.push($(this).attr("id"));
        });
        swal({
            title: "Are you sure?",
            text: "Do you want to do an update?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: '#00FF00',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Update',
            showLoaderOnConfirm: true,
        }).then((willDelete) => {
            $.each(allVals, function(index, value){
                var company_name = $(".company_name-"+value).val();
                var seller_id = $(".seller_id-"+value).val();
                var customer_code = $(".customer_code-"+value).val();
                var no_agreement_letter_id = $(".no_agreement_letter_id-"+value).val();
                var status = $(".status-"+value).val();

                $.ajax({
                type: "get",
                url: "{{ url('update_company') }}/"+value,
                data: {
                    company_name: company_name,
                    seller_id: seller_id,
                    customer_code: customer_code,
                    no_agreement_letter_id:no_agreement_letter_id,
                    status: status
                },
                success: function(data) {
                swal({
                      type: 'success',
                      title: 'The selected data has been updated',
                      showConfirmButton: false,
                      timer: 1500

                  // $(".save").hide();
                  });
                    reload()


                  $(".add").show("fast");
                    $(".edit_all").show("fast");
                    $(".delete_all").show("fast");
                    $(".import").show("fast");
                    $(".export").show("fast");
                    $(".btn-round").hide("fast");
                    $(".btn-round").hide("fast");
                }
            });

            });
        });
        }

         //--------Proses Batal--------
        function cancelUpdateSelected(){
            $("#save-selected").hide("fast");
            $("#cancel-selected").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            $(".import").show("fast");
            $(".export").show("fast");
            read();
        }

        function disableButton() {

          $('.add').prop('disabled', true);
          $('.edit_all').prop('disabled', true);
          $('.delete_all').prop('disabled', true);
          $('.export').addClass('disabled');
          $('.import').addClass('disabled');
          $('.edit').addClass('disable');
          $('.delete').addClass('disable');
          $("[data-toggle= modal]").prop('disabled', true);

        }

        function enableButton(){

          $('.add').prop('disabled', false);
          $('.edit_all').prop('disabled', false);
          $('.delete_all').prop('disabled', false);
          $('.edit').removeClass('disable');
          $('.export').removeClass('disabled');
          $('.import').removeClass('disabled');
          $('.delete').removeClass('disable');
          $("[data-toggle= modal]").prop('disabled', false);

        }
// destro datatable
        function dataLengthAll() {
          $('#table_id').DataTable().destroy();
        }



  </script>
   @endsection
