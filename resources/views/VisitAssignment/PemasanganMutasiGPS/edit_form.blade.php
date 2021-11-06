 <td></td>
 <td></td>

    <td>
        <select class="select company_id-{{$pemasangan_mutasi_GPS->id}}" id="company_id" name="company_id">

        <option value="{{$pemasangan_mutasi_GPS->company_id}}"> {{$pemasangan_mutasi_GPS->companyRequest->company_name?? ''}} </option>
        @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id  ? 'selected':'' }}>
        {{$companys->company_name}}
        </option>

       @endforeach
    </select></i>

    <td><select class="select task-{{$pemasangan_mutasi_GPS->id}}" id="task" name="task">
        <option value="{{$pemasangan_mutasi_GPS->task}} "> {{$pemasangan_mutasi_GPS->taskRequest->task}} </option>
        @foreach ($task as $tasks)
        <option value="{{ $tasks->id }}" {{ old('task') == $tasks->id  ? 'selected':'' }}>
            {{$tasks->task}}
        </option>

       @endforeach
    </select></i></td>
    </td>

      <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$pemasangan_mutasi_GPS->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $pemasangan_mutasi_GPS->waktu_kesepakatan) }}"></i></div>
    </td>
    <td>
          <select class="select vehicle-{{$pemasangan_mutasi_GPS->id}}" id="vehicle" name="vehicle" required>
            <option selected value="">
                {{-- {{ $pemasangan_mutasi_GPS->vehicleRequest->license_plate??'' }} --}}
            </option>
            @foreach ($details as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->vehicle->license_plate }}</option>

            @endforeach
         </select></i>
    </td>
    <td>
          <select class="select kendaraan_pasang-{{$pemasangan_mutasi_GPS->id}}" id="kendaraan_pasang" name="kendaraan_pasang" required>
            <option selected value="">
                {{-- {{ $pemasangan_mutasi_GPS->vehicleKendaraanPasang->license_plate ??''}} --}}
            </option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
    </td>


    <td><select class="select imei-{{$pemasangan_mutasi_GPS->id}}" id="imei" name="imei" required>
        <option value=""> {{$pemasangan_mutasi_GPS->detailCustomer->gps->imei?? ''}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->gps->imei}}
        </option>
       @endforeach
    </select></i></td>

     <td><select class="select gsm_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="gsm_pemasangan" name="gsm_pemasangan" required>
        <option value=""> {{$pemasangan_mutasi_GPS->gsmMaster->gsm_number?? ''}} </option>
        @foreach ($gsm_master as $gsm_masters)
        <option value="{{ $gsm_masters->id }}" {{ old('gsm_pemasangan') == $gsm_masters->id  ? 'selected':'' }}>
        {{$gsm_masters->gsm_number}}
        </option>

       @endforeach
    </select></i></td>
      <td><select class="select equipment_terpakai_gps-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_gps}}"> {{$pemasangan_mutasi_GPS->gpsPemasangan->type??''}} </option>
        @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->type??''}}
        </option>

       @endforeach
    </select></i></td>
     {{-- <td><select class="select equipment_terpakai_sensor-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}"> {{$pemasangan_mutasi_GPS->sensor->sensor_name?? ''}} </option>
        @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>
       @endforeach
    </select></i></td> --}}
<td>
    {{-- <div class="col m" id="sensor">
        <a><option class="SensorAll-{{$pemasangan_mutasi_GPS->id}}" value="{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}" id="equipment_terpakai_sensor" data-toggle="modal" data-target="#exampleModal">{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}</option></a> --}}
    <div class="col m" id="sensor">
    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModal" id="modal">
            <option class="SensorAll-{{$pemasangan_mutasi_GPS->id}}" value="{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}" id="equipment_terpakai_sensor" data-toggle="modal" data-target="#exampleModal">{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}</option>

    </button>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Sensor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="Serial Number">Serial Number</label>
                    </div>
                    <select class="form-control selectpicker" id="SerialNumberSensor" name="SerialNumberSensor" data-live-search="true">
                        @foreach ($sensor as $item)
                            <option value="{{ $item->id }}" {{ old('serial_number') == $item->id ? 'selected':''}}>{{ $item->serial_number }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="Sensor Name">Sensor Name</label>
                    </div>
                    <select class="custom-select" id="SensorName" name="SensorName" disabled>
                        @foreach ($sensor as $item)
                        <option value="{{ $item->id }}" {{ old('sensor_name') == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="MerkSensor">Merk Sensor</label>
                    </div>
                    <select class="custom-select" id="MerkSensor" name="MerkSensor" disabled>
                        @foreach ($sensor as $item)
                            <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':''}}>{{ $item->merk_sensor }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <button type="button" class="btn btn-success float-right mb-2" data-dismiss="modal" onclick="send()">Send</button>
                    <button  class="btn btn-primary float-right mb-2 mr-2" onclick="add()" >Add</button>
                    <button  type="button" class="btn btn-danger float-right mb-2 mr-2" id="clear">Clear</button>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Sensor terpilih</span>
                    <textarea class="form-control" aria-label="With textarea" id="SensorTerpilih" disabled>{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}</textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
</td>





     <td>
        <select class="select teknisi_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="teknisi_pemasangan" name="teknisi_pemasangan" required>
            <option selected value="">{{$pemasangan_mutasi_GPS->teknisi->teknisi_name?? ''}}</option>
            @foreach ($teknisi as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>

    <td>
        <div class="input-div"><input type="number" class="input uang_transportasi-{{$pemasangan_mutasi_GPS->id}}" id="uang_transportasi" placeholder="Uang Transportasi" value="" required></i></div>
    </td>

    <td><select class="select type_visit-{{$pemasangan_mutasi_GPS->id}}" id="type_visit" name="type_visit" aria-label=".form-select-lg example" required>
    <option value=""> {{$pemasangan_mutasi_GPS->type_visit}} </option>
    <option value="Visit SLA">Visit SLA</option>
    <option value="Visit Berbayar">Visit Berbayar</option>
    </select></i></td>

    <td><textarea class="form-control note_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="note_pemasangan" name="note_pemasangan" rows="3">{{$pemasangan_mutasi_GPS->note_pemasangan}}</textarea></i></td>

    <td><select class="select status-{{$pemasangan_mutasi_GPS->id}}" id="status" name="status" aria-label=".form-select-lg example" required>
    <option value=""> {{$pemasangan_mutasi_GPS->status}} </option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
    </select></i></td>
       <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


<script>
       $(document).ready(function() {

            $(function(){
                $('.selectpicker').selectpicker();
            });

            $('select[name="SerialNumberSensor"]').on('change', function(){

                var Id = $(this).val();
                // alert(Id);
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
                // $('#modal').empty();
                $('#sensor').empty();
                $('#sensor').append('<option value="'+ sensorterpilih + '" id="equipment_terpakai_sensor"  data-toggle="modal" data-target="#exampleModal" > '+ sensorterpilih +'</option>');
            }
         }
  </script>

