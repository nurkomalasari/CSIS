<tr id="add_form">

    <td></td>
    <td></td>

     <td>
        <select class="select-search search_company" id="company_id" placeholder="Select a Company..." name="company_id" required>
            {{-- <option class="hidden" placeholder="Search Company"></option> --}}
            <option value="">Select a Company...</option>
            @foreach ($detail as $item )
            <option value="{{ $item->company_id }}">{{ $item->company->company_name }}</option>

            @endforeach
        </select></i>
    </td>
    <td>
        <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example" required>
            <option selected disabled class="hidden">--Pilih Internal/External--</option>
            <option value="Request Internal">Request Internal</option>
            <option value="Complain Internal">Complain Internal</option>
            <option value="Request Eksternal">Request Eksternal</option>
            <option value="Complain Eksternal">Complain Eksternal</option>
        </select></i>
    </td>
      <td>
          <select class="select" id="pic_id" name="pic_id" required>
            {{-- <option selected disabled></option> --}}
            <option class="hidden"> --Pilih PIC--</option>

            {{-- @foreach ($pic as $item)
                <option value="{{ $item->id }}" {{ old('pic_id') == $item->id ? 'selected':'' }}>{{ $item->pic_name }}</option>

            @endforeach --}}
         </select></i>
      </td>

      <td>
          <select class="select" id="vehicle" name="vehicle">
            <option value="" class="hidden">--Pilih Vehicle--</option>
            {{-- <option value="" class="hidden"></option> --}}


            {{-- @foreach ($detail as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->vehicle->license_plate??'' }}</option>

            @endforeach --}}
         </select></i>
      </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="Waktu Respond" required></i></div>
    </td>

    <td>
        <select class="select" id="task" name="task" required>
            <option selected disabled value="" class="hidden">--Pilih Task--</option>
       @foreach ($task_request as $item)
        <option value="{{ $item->task }}" {{ old('task') == $item->task ? 'selected':'' }}>{{ $item->task }}</option>

       @endforeach
    </select></i>
    </td>

      <td>
        <select class="select" id="platform" name="platform" aria-label=".form-select-lg example" required>
            <option selected disabled class="hidden">--Pilih Platform--</option>
            <option value="WA">WA</option>
            <option value="SMS">SMS</option>
            <option value="E-mail">E-mail</option>
            <option value="Telepon">Telepon</option>
        </select></i>
    </td>


    <td>
        <textarea class="form-control" id="detail_task" name="detail_task" required ></textarea></i>
    </td>
    <td>
        <select class="select" id="divisi" name="divisi" aria-label=".form-select-lg example" required>
            <option selected disabled class="hidden">--Pilih Divisi--</option>
            <option value="Opersional (CS)">Opersional (CS)</option>
            <option value="Lintas Divisi">Lintas Divisi</option>
            <option value="Operasional (Implementor)">Operasional (Implementor)</option>
        </select></i>
    </td>
    {{-- <td>
        <div class="input-div"><input type="text" class="input" id="divisi" placeholder="Divisi" required></i></div>
    </td> --}}
    <td>
        <div class="input-div"><input type="text" class="input" id="respond" placeholder="Respond" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" required ></i></div>
    </td>
       <td>
        <select class="select"  id="status" name="status" aria-label=".form-select-lg example" required>
            <option class="hidden" value="">--Pilih Status--</option>
            <option value="On Progress">On Progress</option>
            <option value="Done">Done</option>
        </select></i>
    </td>
    <td id="td-solve">
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="waktu Solve" required ></i></div>
    </td>

    <td>
        <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="status akhir" ></i></div>
    </td>
     <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
         <button class="unstyled-button" type="submit">
        <i class="fas fa-times cancel" onclick="cancel()"></i>
         </button>
    <td>
        {{-- input untuk pemasangan dan maintenance --}}




    <script>

    $(document).ready(function() {
    new TomSelect(".select-search",{
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    }
    });
     $('#vehicle').select2();
     $('#task').select2();

    });


    $('select[name="company_id"]').on('change', function() {
            var itemID = $(this).val();
            // alert(itemID);
            if(itemID) {
                $.ajax({
                    url: '/based_pic/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="pic_id').empty();
                        $('select[name="pic_id').append('<option class="hidden" value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="pic_id').append('<option value="'+ data[i].id + '"> '+ data[i].pic_name +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
                 $.ajax({
                    url: '/based_vehicleRequest/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="vehicle').empty();
                        $('select[name="vehicle').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="vehicle').append('<option value="'+ data[i].id + '"> '+ data[i].vehicle_license_plate +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
            }
            else{
                $('select[name="pic_id"]').empty();
                $('select[name="vehicle"]').empty();

            }
         });




         // status waktu solve
         $('select[name="status"]').on('change', function() {
            var itemID = $(this).val();
           if(itemID == "On Progress"){
               $('#td-solve').empty();
               $('#td-solve').append(
                `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" disabled></div>`
               );
           }else{
                $('#td-solve').empty();
                $('#td-solve').append(
                `<div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve"></div>`
                );
           }
        });

        $('select[name="internal_eksternal"]').on('change', function() {
                var request_complain = $(this).val();
                // alert(itemID);
                if(request_complain) {
                    $.ajax({
                        url: '/based_internal_eksternal',
                        method: "GET",
                        data  :{
                            request_complain : request_complain
                        },
                        success:function(data) {
                            $('select[name="task').empty();
                            $('select[name="task').append('<option style="display:none"></option>');
                                for(var i = 0 ; i < data.length ; i++) {
                                    $('select[name="task').append('<option value="'+ data[i].task + '"> '+ data[i].task +'</option>');
                                }
                        }
                    });
                }
                else{
                    $('select[name="task"]').empty();

                }
            });

            //   $('select[name="vehicle"]').on('change', function() {
            //         var vehicle = $(this).val();

            //         alert(vehicle);
            //     });



            //  $('select[name="task"]').on('change', function(){
            //     var Id = $('#vehicle').val();
            //     var task = $('#task option:selected').text();
            //     // alert(task);
            //     // if(Id){
            //     if(task == "Pemasangan GPS" || task == "Pelepasan GPS" || task == "Mutasi") {
            //         alert(task);
            //         // $.ajax({
            //         //     url: '/based_pemasangan/'+ Id,
            //         //     method: "GET",
            //         //     success:function(data) {

            //         //         $.each(data, function(key, value) {
            //         //             alert(key);
            //         //             // $('#imei').val(key);
            //         //             // $('#gsm_pemasangan').val(key);
            //         //             // $('#equipment_terpakai_gps').val(key);
            //         //         });
            //         //     }
            //         // });
            //     }



            //  });
</script>

</tr>
