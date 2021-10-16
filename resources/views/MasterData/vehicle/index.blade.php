@extends('layouts.v_main')
@section('title','Master Vehicle')

@section('content')

<div class="title">
    <strong>Master Vehicle</strong>
</div>
<br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
             <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>

          <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>
                  <th width="10px">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                                <span class="form-check-sign"></span>
                            </label>
                        </div>
                    </th>
                    <th scope="col" class="action">Action</th>
                    <th scope="col" class="list">Company Name</th>
                    <th scope="col" class="list">License Plate</th>
                    <th scope="col" class="list">Vihecle Type</th>
                    <th scope="col" class="list">Pool Name</th>
                    <th scope="col" class="list">Pool Location</th>
                    </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <script>
    
    $(document).ready(function() {
        read();
    });

     // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_vehicle') }}", {}, function(data, status) {
         $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
        $('#table_id').DataTable().draw();
      });
    }


    function cancel() {
      read();
    }

    $('.add').click(function() {
        $.get("{{ url('add_form_vehicle') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
    });

    function store() {
        
        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_vehicle') }}",
            data: {
              company_id    : company_id,
              license_plate : license_plate,
              vehicle_id    : vehicle_id,
              pool_name     : pool_name,
              pool_location : pool_location

            },
             success: function(data) {
                swal({
                    type: 'success',
                    title: 'Data Saved',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                read();
            }
        })
    }

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
                    url: "{{ url('destroy_vehicle') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        read();
                    }
                });

              });
            },
            allowOutsideClick: false
      });
    }

    function edit(id){
        
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-license_plate-"+id).slideUp("fast");
        $("#item-vehicle_id-"+id).slideUp("fast");
        $("#item-pool_name-"+id).slideUp("fast");
        $("#item-pool_location-"+id).slideUp("fast");
        $.get("{{ url('show_vehicle') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });

    }

    function update(id) {
        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();

        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_vehicle') }}/"+id,
            data: {
              company_id    :   company_id,
              license_plate :   license_plate,
              vehicle_id    :   vehicle_id,
              pool_name     :   pool_name,
              pool_location :   pool_location
            },
            success: function(data) {
              swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                read();
            }
        });
    }

    $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

        
    $('.delete_all').on('click', function(){
        
          var allVals = [];
          $(".task-select:checked").each(function() {
              allVals.push($(this).attr("id"));
          });
              if (allVals.length > 0) {
                  var _token = $('input[name="_token"]').val();
                  
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
                          url: "{{ url('/selectedDelete_vehicle') }}",
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
            
            $(".edit_all").hide("fast");
            $(".delete_all").hide("fast");
            $.get("{{ url('selected_vehicle') }}", {}, function(data, status) {
                $("#selected").prepend(data)
            });
            $.each(allVals, function(index, value){
                $("#td-checkbox-"+value).hide("fast");
                $("#td-button-"+value).hide("fast");
                $("#item-company_id-"+value).slideUp("fast");
                $("#item-license_plate-"+value).slideUp("fast");
                $("#item-vehicle_id-"+value).slideUp("fast");
                $("#item-pool_name-"+value).slideUp("fast");
                $("#item-pool_location-"+value).slideUp("fast");

                $(".add").hide("fast");
                $.get("{{ url('show_vehicle') }}/" + value, {}, function(data, status) {
                    $("#edit-form-"+value).prepend(data)
                    $("#master").prop('checked', false);

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

                var company_id      = $(".company_id-"+value).val();
                var license_plate   = $(".license_plate-"+value).val();
                var vehicle_id      = $(".vehicle_id-"+value).val();
                var pool_name       = $(".pool_name-"+value).val();
                var pool_location   = $(".pool_location-"+value).val();
                $.ajax({
                type: "get",
                url: "{{ url('update_vehicle') }}/"+value,
                data: {
                    company_id      : company_id,
                    license_plate   : license_plate,
                    vehicle_id      : vehicle_id,
                    pool_name       : pool_name ,
                    pool_location   : pool_location
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: 'The selected data has been updated',
                    showConfirmButton: false,
                    timer: 1500
                    }).catch(function(timeout) { });
                        $(".save").hide("fast");
                        $(".cancel").hide("fast");
                        $(".add").show("fast");
                        $(".edit_all").show("fast");
                        $(".delete_all").show("fast");
                        read();
                }
            });

            });
        });
    }

    function batal(){

        $(".save").hide("fast");
        $(".cancel").hide("fast");
        $(".add").show("fast");
        $(".edit_all").show("fast");
        $(".delete_all").show("fast");
        read();
    }

</script>
@endsection