    <td></td>
    <td></td>

    <td>
        <select class="select company-{{$maintenanceGps->id}}"  id="{{$maintenanceGps->id}}" name="company">
            <option selected value="{{ $maintenanceGps->company_id}}">
                {{ $maintenanceGps->requestComplain->companyRequest->company_name}}
            </option>

            @foreach ($requestComplaint as $item)
            <option value="{{ $item->id }}">{{ $item->companyRequest->company_name }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select vehicle-{{$maintenanceGps->id}}" id="vehicle" name="vehicle-{{$maintenanceGps->id}}">
        <option selected value="{{ $maintenanceGps->vehicle_id}}">
            {{ $maintenanceGps->requestComplain->vehicle }}
        </option>

        @foreach ($requestComplaint as $item)
        <option value="{{ $item->id }}">
            {{ $item->vehicle }}
        </option>
        @endforeach

        </select>
    </td>
    <td>
        <select class="select tanggal-{{$maintenanceGps->id}}" id="tanggal" name="tanggal-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->tanggal_id }}">
                {{ $maintenanceGps->requestComplain->waktu_kesepakatan }}
            </option>

            @foreach ($requestComplaint as $item)
            <option value="{{ $item->id }}">
                {{ $item->waktu_kesepakatan }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select type_gps-{{$maintenanceGps->id}}" id="type_gps" name="type_gps-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->type_gps_id }}">
                {{ $maintenanceGps->gps->type }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->type }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select equipment_gps-{{$maintenanceGps->id}}" id="equipment_gps" name="equipment_gps-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->equipment_gps_id }}">
                {{ $maintenanceGps->gps->type }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->type }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select equipment_sensor-{{$maintenanceGps->id}}" id="equipment_sensor" name="equipment_sensor-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->equipment_sensor_id}}">
                {{ $maintenanceGps->sensor->sensor_name }}
            </option>

            @foreach ($sensor as $item)
            <option value="{{ $item->id }}">
                {{ $item->sensor_name }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="number" class="input equipment_gsm-{{$maintenanceGps->id}}" id="equipment_gsm" value="{{$maintenanceGps->equipment_gsm}}"></i>
        </div>
    </td>
    <td>
        <select class="select permasalahan-{{$maintenanceGps->id}}" id="permasalahan" name="permasalahan-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->permasalahan_id}}">
                {{ $maintenanceGps->requestComplain->detail_task }}
            </option>

            @foreach ($requestComplaint as $item)
            <option value="{{ $item->id }}">
                {{ $item->detail_task }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input ketersediaan_kendaraan-{{$maintenanceGps->id}}" id="ketersediaan_kendaraan" value="{{$maintenanceGps->ketersediaan_kendaraan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input keterangan-{{$maintenanceGps->id}}" id="keterangan" value="{{$maintenanceGps->keterangan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input hasil-{{$maintenanceGps->id}}" id="hasil" value="{{$maintenanceGps->hasil}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input biaya_transportasi-{{$maintenanceGps->id}}" id="biaya_transportasi" value="{{$maintenanceGps->biaya_transportasi}}"></i>
        </div>
    </td>
   <td>
        <select class="select teknisi-{{$maintenanceGps->id}}" id="teknisi" name="teknisi">
            <option selected value="{{$maintenanceGps->teknisi_id}}">{{$maintenanceGps->teknisiMaintenance->teknisi_name}}</option>
            @foreach ($teknisi_maintenance as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select req_by-{{$maintenanceGps->id}}" id="req_by" aria-label=".form-select-lg example">
            <option selected value="{{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}
            </option>
            <option value="{{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}
            </option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input note-{{$maintenanceGps->id}}" id="note" value="{{$maintenanceGps->note}}"></i>
        </div>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $maintenanceGps->id }})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


    <script type="text/javascript">
        $(document).ready(function() {
            // depend vehicle
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsCompany/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="vehicle-'+ id +'"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="vehicle-'+ id +'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="vehicle-'+ id +'"]').empty();
                }
            });

            // depend tanggal
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsTanggal/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="tanggal-'+ id +'"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="tanggal-'+ id +'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="tanggal-'+ id +'"]').empty();
                }
            });

            // depend permasalahan
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsPermasalahan/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="permasalahan-'+ id +'"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="permasalahan-'+ id +'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="permasalahan-'+ id +'"]').empty();
                }
            });

        });
    </script>