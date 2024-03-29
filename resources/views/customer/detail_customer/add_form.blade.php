<tr>
    <td></td>
    <td></td>
    <td>
        <select class="select" id="CompanyId" name="CompanyId">
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
       <select class="select-search search_selectpicker" id="LicencePlate" name="LicencePlate" data-live-search="true">
            <option style="display: none"></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('license_plate') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="VihecleType" name="VihecleType" disabled>
            <option class="hidden" value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->vehicle->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="PoNumber" name="PoNumber">
            <option class="hidden" value=""></option>
            @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ old('po_number') == $item->id ? 'selected':'' }}>{{ $item->po_number}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="HargaLayanan" name="HargaLayanan" disabled>
            <option class="hidden" value=""></option>
            @foreach ($po as $item)
                <option value="{{ $item->id }}" {{ old('harga_layanan') == $item->id ? 'selected':'' }}>{{ $item->harga_layanan}}</option>
            @endforeach
        </select>
    </td>
     <td>
        <select class="select" id="PoDate" name="PoDate" disabled>
        <option class="hidden" value=""></option>
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ old('po_date') == $item->id ? 'selected':'' }}>{{ $item->po_date}}</option>
        @endforeach
     </select>

    <td>
        <select class="select" id="StatusPo" name="StatusPo" disabled>
            <option class="hidden" value=""></option>
            @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ old('status_po') == $item->id ? 'selected':'' }}>{{ $item->status_po}}</option>
        @endforeach
        </select>
    </td>
    <td>
        <select class="select-search_imei search_selectpicker" id="Imei" name="Imei">
            <option class="hidden" value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('imei') == $item->id ? 'selected':''}}>{{ $item->imei }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Merk" name="Merk" disabled>
            <option class="hidden" value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('merk') == $item->id ? 'selected':''}}>{{ $item->merk }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Type" name="Type" disabled>
            <option class="hidden" value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':''}}>{{ $item->type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select-search_gsm search_selectpicker" id="GSM" name="GSM">
            <option class="hidden" value=""></option>
            @foreach ($gsm as $item)
                <option value="{{ $item->id }}" {{ old('gsm_id') == $item->id ? 'selected':''}}>{{ $item->gsm_number }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Provider" name="Provider" disabled>
            <option class="hidden" value=""></option>
                @foreach ($gsm as $item)
                <option value="{{ $item->id }}" {{ old('provider') == $item->id ? 'selected':''}}>{{ $item->provider }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModal" id="modal">
            Sensor
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sensor Input</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="SerialNumberSensor">Serial Number</label>
                            </div>
                        <select class="form-control selectpicker" id="SerialNumberSensor" name="SerialNumberSensor" data-live-search="true">
                            <option value=""></option>
                            @foreach ($sensor as $item)
                                <option value="{{ $item->id }}" {{ old('serial_number') == $item->id ? 'selected':''}}>{{ $item->serial_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="SensorName">Name</label>
                        </div>
                        <select class="custom-select" id="SensorName" name="SensorName" disabled>
                            <option value=""></option>
                            @foreach ($sensor as $item)
                            <option value="{{ $item->id }}" {{ old('sensor_id') == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="MerkSensor">Merk</label>
                        </div>
                        <select class="custom-select" id="MerkSensor" name="MerkSensor" disabled>
                            <option value=""></option>
                            @foreach ($sensor as $item)
                                <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':''}}>{{ $item->merk_sensor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>

                        <button type="button" class="btn btn-success float-right mb-2"  data-dismiss="modal"onclick="send()">Send</button>
                        <button  type="button" class="btn btn-primary float-right mb-2 mr-2" onclick="add()" >Add</button>
                        <button  type="button" class="btn btn-danger float-right mb-2 mr-2" id="clear">Clear</button>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">Sensor terpilih</span>
                        <textarea class="form-control" aria-label="With textarea" id="SensorTerpilih" disabled></textarea>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </td>
    <td>
        <select class="select" id="PoolName" name="PoolName" disabled>
            <option class="hidden" value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('pool_name') == $item->id ? 'selected':'' }}>{{ $item->pool_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="PoolLocation" name="PoolLocation" disabled>
            <option class="hidden" value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('pool_location') == $item->id ? 'selected':'' }}>{{ $item->pool_location}}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type= "date" class="input" id="Waranty" placeholder="Waranty"></div></td>
    <td>
        <select class="select" name="status_layanan" id="StatusLayanan">
            @foreach ($status_layanan as $item)
            <option value="{{ $item->id }}" {{ old('status_layanan') == $item->id ? 'selected':'' }}>{{ $item->service_status_name }}</option>
        @endforeach
        </select>
    </td>
    <td id="tanggal_aktif">
        <div class="input-div"><input type="date" class="input" id="TanggalPasang" name="tanggal_pasang" data-toggle="popover" data-placement="bottom" data-content="Please fill out the field" ></div>
    </td>
    <td id="tanggal_non_aktif">
        <div class="input-div"><input type="date" class="input" id="TanggalNonAktif" ></div>
    </td>
    <td id="tanggal_reaktivasi">
        <div class="input-div"><input type="date" class="input" id="TanggalReaktivasi"></div>
    </td>
    <td class="action sticky-col first-col">
        <button type="submit" class="unstyled-button">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

    <script>
  $(document).ready(function() {
    new TomSelect(".select-search",{
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    }
    });
    });

    $(document).ready(function() {
    new TomSelect(".select-search_imei",{
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    }
    });
    });

    $(document).ready(function() {
    new TomSelect(".select-search_gsm",{
    create: false,
    sortField: {
        field: "text",
        direction: "asc"
    }
    });
    });
        $(document).ready(function() {

            $(function(){
                $('.selectpicker').selectpicker();
            });

            $('select[name="Imei"]').on('change', function(){
                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_imeiDetail/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="Merk').empty();
                            $('select[name="Type').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Merk').append('<option value="'+ key +'">'+ value.merk +'</option>');
                                $('select[name="Type').append('<option value="'+ key +'">'+ value.type +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="Merk').empty();
                    $('select[name="Type').empty();
                }
            });

            $('select[name="GSM"]').on('change', function(){

                var Id = $(this).val();
                if(Id){
                    $.ajax({
                        url: '/based_gsm/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="Provider').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Provider').append('<option value="'+ key +'">'+ value.provider +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="Provider').empty();
                }

            });

            $('select[name="SerialNumberSensor"]').on('change', function(){

                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_sensor/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="SensorName').empty();
                            $('select[name="MerkSensor').empty();
                            $.each(data, function(key, value) {
                                $('select[name="SensorName').append('<option value="'+ key +'">'+ value.sensor_name +'</option>');
                                $('select[name="MerkSensor').append('<option value="'+ key +'">'+ value.merk_sensor +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="SensorName').empty();
                    $('select[name="MerkSensor').empty();
                }

            });

            $('select[name="LicencePlate"]').on('change', function(){

                var Id = $(this).val();
                if(Id){
                    $.ajax({
                        url: '/based_license/'+ Id,
                        method: "GET",
                        success:function(data){

                            $('select[name="VihecleType').empty();
                            $('select[name="PoolName').empty();
                            $('select[name="PoolLocation').empty();
                            $.each(data, function(key, value) {
                                $('select[name="VihecleType').append('<option value="'+ value.id +'">'+ value.vehicle_name +'</option>');
                                $('select[name="PoolName').append('<option value="'+ value.id  +'">'+ value.pool_name +'</option>');
                                $('select[name="PoolLocation').append('<option value="'+ value.id  +'">'+ value.pool_location +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="VihecleType').empty();
                    $('select[name="PoolName').empty();
                    $('select[name="PoolLocation').empty();
                }
            });


            $('select[name="PoNumber"]').on('change', function(){

                var Id = $(this).val();
                if(Id){
                    $.ajax({
                        url: '/based_ponumber/'+ Id,
                        method: "GET",
                        success:function(data){
                            $('select[name="HargaLayanan').empty();
                            $('select[name="PoDate').empty();
                            $('select[name="StatusPo').empty();
                            $.each(data, function(key, value) {
                                $('select[name="HargaLayanan').append('<option value="'+ key +'">'+ value.harga_layanan +'</option>');
                                $('select[name="PoDate').append('<option value="'+ key +'">'+ value.po_date +'</option>');
                                $('select[name="StatusPo').append('<option value="'+ key +'">'+ value.status_po +'</option>');
                            });
                        }
                    });
                }
                else{

                    $('select[name="HargaLayanan').empty();
                    $('select[name="PoDate').empty();
                    $('select[name="StatusPo').empty();
                }
            });




            // $('select[name="CompanyId"]').on('change', function() {
            //     var itemID = $(this).val();
            //     if(itemID) {
            //         $.ajax({
            //             url: '/based_company/'+ itemID,
            //             method: "GET",
            //             success:function(data) {
            //                 $('select[name="LicencePlate').empty();
            //                 $('select[name="LicencePlate').append('<option value=""> </option>');
            //                     for(var i = 0 ; i < data.length ; i++) {
            //                         $('select[name="LicencePlate').append('<option value="'+ data[i].id + '"> '+ data[i].license_plate +'</option>');
            //                     }
            //             }
            //         });


            //         $.ajax({
            //             url: '/based_po/'+ itemID,
            //             method: "GET",
            //             success:function(data) {
            //                 $('select[name="PoNumber').empty();
            //                 $('select[name="PoNumber').append('<option value=""></option>');
            //                 console.log(data.length)
            //                     for(var i = 0 ; i < data.length ; i++) {

            //                         $('select[name="PoNumber').append('<option value="'+ data[i].id + '"> '+ data[i].po_number +'</option>');
            //                     }
            //             }
            //         });
            //     }
            //     else{
            //         $('select[name="LicencePlate"]').empty();
            //         $('select[name="PoNumber').empty();
            //     }

            // });



            // $('select[name="SensorName"]').on('change', function() {

            //     var itemID = $(this).val();
            //     // alert(itemID);

            //     if(itemID) {
            //         $.ajax({
            //             url: '/based_sensor/'+ itemID,
            //             method: "GET",
            //             success:function(data) {
            //                 // alert(data.length);

            //                 $('select[name="SerialNumberSensor').empty();
            //                 $('select[name="SerialNumberSensor').append('<option value=""> </option>');
            //                     for(var i = 0 ; i < data.length ; i++) {
            //                         $('select[name="SerialNumberSensor').append('<option value="'+ data[i].serial_number + '"> '+ data[i].serial_number +'</option>');
            //                          16-Nov-2021   // alert(data[i].serial_number)
            //                     }
            //             }
            //         });
            //     }
            //     else{
            //         $('select[name="SerialNumberSensor"]').empty();

            //     }

            // });



            $('#clear').click(function(){

                var sensorterpilih =  document.getElementById("SensorTerpilih").value;
                if (sensorterpilih == ""){
                    alert("No sensor selected")
                }else{
                    $('#SensorTerpilih').empty();
                }
            });

        });


        function add(){

            // var sensor = document.getElementById("SensorName").value;
            var serialnumber = document.getElementById("SerialNumberSensor").value;
            // var merksensor = document.getElementById("MerkSensor").value;
            // var data = sensor + "(" +" "+ serialnumber +","+ merksensor +")" +" "+" "
            var data = serialnumber +" "
            var hasil = document.getElementById("SensorTerpilih").value;
            if (data == hasil) {
                alert("ada data yang sama");
            }else{
            $("#SensorTerpilih").prepend(data);
            }

         }

        function send(){
            var sensorterpilih = document.getElementById("SensorTerpilih").value;
            if (sensorterpilih == "") {
                alert("No sensor selected")
            }
            else{
                $('#modal').empty();
                $('#SensorAll').empty();
                $('#modal').append('<option value="'+ sensorterpilih + '" id="SensorAll"  data-toggle="modal" data-target="#exampleModal" > '+ sensorterpilih +'</option>');
            }
         }


            $('select[name="status_layanan"]').on('change', function(){
                var Id = $(this).val();
                // alert(Id);
                if(Id == 1) {
                    $('#tanggal_non_aktif').empty();
                    $('#tanggal_non_aktif').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalNonAktif" disabled></div>`
                    );
                     $('#tanggal_aktif').empty();
                    $('#tanggal_aktif').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalPasang"></div>`
                    );
                     $('#tanggal_reaktivasi').empty();
                    $('#tanggal_reaktivasi').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalReaktivasi"></div>`
                    );
                }
                else{
                    $('#tanggal_aktif').empty();
                    $('#tanggal_aktif').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalPasang" disabled></div>`
                    );
                    $('#tanggal_non_aktif').empty();
                    $('#tanggal_non_aktif').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalNonAktif"></div>`
                    );
                    $('#tanggal_reaktivasi').empty();
                    $('#tanggal_reaktivasi').append(
                        `<div class="input-div"><input type="date" class="input" id="TanggalReaktivasi" disabled></div>`
                    );
                }
            });



    </script>


</tr>
