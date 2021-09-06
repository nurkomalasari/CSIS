@extends('layouts.v_main')
@section('title','Gsm Active')

@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
             <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary btn-round mr-2 add"><i class="fas fa-plus" id="add"></i></button>
                <button class="btn btn-success btn-round mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger btn-round delete_all"><i class="fas fa-trash"></i></button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                  <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col">Action</th>
                <th scope="col">Gsm Pre Active</th></th>
                <th scope="col">Request Date</th>
                <th scope="col">Active Date</th>
                <th scope="col">Status Active</th>
                <th scope="col">Company</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{ csrf_field() }}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {

      read()

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_GsmActive') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();

      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('#add').click(function() {
        $.get("{{ url('add_form_GsmActive') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var gsm_pre_active_id = $("#gsm_pre_active_id").val();
        var request_date = $("#request_date").val();
        var active_date = $("#active_date").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_GsmActive') }}",
            data: {
              gsm_pre_active_id: gsm_pre_active_id,
              request_date: request_date,
              active_date: active_date,
              status_active: status_active,
              company_id: company_id,
              note:note
            },
            success: function(data) {
              read()
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
                    url: "{{ url('destroy_GsmActive') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal("Done!","It was succesfully deleted!","success");
                        read();
                    }
                });

              });
            },
            allowOutsideClick: false
      });
    }

    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");
        $("#item-gsm_pre_active_id-"+id).slideUp("fast");
        $("#item-request_date-"+id).slideUp("fast");
        $("#item-active_date-"+id).slideUp("fast");
        $("#item-status_active-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('show_GsmActive') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var gsm_pre_active_id = $("#gsm_pre_active_id").val();
        var request_date = $("#request_date").val();
        var active_date = $("#active_date").val();
        var status_active = $("#status_active").val();
        var company_id = $("#company_id").val();
        var note = $("#note").val();
        var id = id;
        // console.log('test');
        $.ajax({
            type: "get",
            url: "{{ url('update_GsmActive') }}/"+id,
            data: {
               gsm_pre_active_id: gsm_pre_active_id,
              request_date: request_date,
              active_date: active_date,
              status_active: status_active,
              company_id: company_id,
              note:note
            },
            success: function(data) {
              read()
            // console.log('test');
            }
        })
    }

     $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

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
                            url: "{{ url('/selectedDelete_GsmActive') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal("Done!","It was succesfully deleted!","success");
                                read();
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

        $('.edit_all').on('click', function(e){

            var allVals = [];
            var _token = $('input[name="_token"]').val();

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-gsm_pre_active_id-"+value).slideUp("fast");
                    $("#item-request_date-"+value).slideUp("fast");
                    $("#item-active_date-"+value).slideUp("fast");
                    $("#item-status_active-"+value).slideUp("fast");
                    $("#item-company_id-"+value).slideUp("fast");
                    $("#item-note-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmActive') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

            function updateSelected() {
            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });

                $.each(allVals, function(index, value){
                    var gsm_pre_active_id = $(".gsm_pre_active_id-"+value).val();
                    var request_date = $(".request_date-"+value).val();
                    var active_date = $(".active_date-"+value).val();
                    var status_active = $(".status_active-"+value).val();
                    var company_id = $(".company-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmActive') }}/"+value,
                    data: {
                        gsm_pre_active_id: gsm_pre_active_id,
                        request_date: request_date,
                        active_date: active_date,
                        status_active: status_active,
                        company: company,
                        note:note
                    },
                    success: function(data) {
                    read()
                    }
                });
            });


        }



  </script>

   @endsection