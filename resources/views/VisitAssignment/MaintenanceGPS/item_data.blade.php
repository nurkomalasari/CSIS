<?php $no=1; ?>
@foreach ($maintenanceGps as $item)
    <tr id="edit-form-{{ $item->id }}">
        <td id="td-checkbox-{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}">
            {{ $no++ }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->companyRequest->company_name ??''}}
        </td>
        <td id="item-task-{{ $item->id}}">
            {{ $item->task }}
        </td>
        <td id="item-vehicle-{{ $item->id}}">
            {{ $item->vehicleRequest->license_plate??'' }}
        </td>
        <td id="item-waktu_kesepakatan-{{ $item->id }}">
            {{ $item->waktu_kesepakatan }}
        </td>

        @if ($item->type_gps_id !=null)
            <td id="item-type_gps_id-{{ $item->id }}">
            {{$item->gpsMaintenance->type??''}}
            </td>
        @elseif ($item->type_gps_id ==null)
            <td id="item-type_gps_id-{{ $item->id }}">
                -
            </td>
        @endif

        @if ($item->equipment_gps_id !=null)
        <td id="item-equipment_gps_id-{{ $item->id }}">
            {{ $item->equipment_gps_id}}
        </td>
        @elseif ($item->equipment_gps_id ==null)
        <td id="item-equipment_gps_id-{{ $item->id }}">
            -
        </td>
        @endif

        @if ($item->equipment_sensor_id != null)
        <td id="item-equipment_sensor_id-{{ $item->id }}">
             {{ $item->equipment_sensor_id }}

        </td>
        @elseif ($item->equipment_sensor_id == null)
        <td id="item-equipment_sensor_id-{{ $item->id }}">
            -
        </td>
        @endif

        {{-- <td id="item-equipment_sensor_id-{{ $item->id }}" >

             <i class="fas fa-eye" data-toggle="popover"  data-placement="bottom" data-content="{{ $item->equipment_sensor_id_all_name }}" ></i>

            {{-- {{ $item->equipment_sensor_id_all_name }} --}}

        {{-- </td> --}}

        @if ($item->equipment_gsm !=null)
        <td id="item-equipment_gsm-{{ $item->id}}">
            {{ $item->gsm->gsm_number?? ''}}
        </td>
        @elseif ($item->equipment_gsm ==null)
         <td id="item-equipment_gsm-{{ $item->id}}">
            -
        </td>
        @endif



        @if ($item->ketersediaan_kendaraan !=null)
        <td id="item-ketersediaan_kendaraan-{{ $item->id}}">
            {{ $item->ketersediaan_kendaraan }}
        </td>
        @elseif ($item->ketersediaan_kendaraan ==null)
         <td id="item-ketersediaan_kendaraan-{{ $item->id}}">
            -
        </td>
        @endif

        @if ($item->keterangan !=null)
        <td id="item-keterangan-{{ $item->id}}">
            {{ $item->keterangan }}
        </td>
        @elseif ($item->keterangan ==null)
        <td id="item-keterangan-{{ $item->id}}">
            -
        </td>
        @endif

        @if ($item->hasil !=null)
        <td id="item-hasil-{{ $item->id}}">
            {{ $item->hasil }}
        </td>
        @elseif ($item->hasil ==null)
        <td id="item-hasil-{{ $item->id}}">
            -
        </td>
        @endif

        <td id="item-biaya_transportasi-{{ $item->id}}">
        <span>Rp. </span>{{ number_format( $item->biaya_transportasi)}}

        </td>

        @if ($item->teknisi_maintenance !=null)
        <td id="item-teknisi_maintenance-{{ $item->id}}">
            {{ $item->teknisiMaintenance->teknisi_name??'' }}
        </td>
        @elseif ($item->teknisi_maintenance ==null)
        <td id="item-teknisi_maintenance-{{ $item->id}}">
            -
        </td>
        @endif

        @if ($item->req_by !=null)
        <td id="item-req_by-{{ $item->id}}">
            {{ $item->req_by }}
        </td>
        @elseif ($item->req_by ==null)
        <td id="item-req_by-{{ $item->id}}">
            -
        </td>
        @endif

        @if ($item->note_maintenance !=null)
        <td id="item-note_maintenance-{{ $item->id}}">
            {{ $item->note_maintenance }}
        </td>
        @elseif ($item->note_maintenance ==null)
        <td id="item-note_maintenance-{{ $item->id}}">
            -
        </td>
        @endif
        <td id="item-status-{{ $item->id}}">
            {{ $item->status }}
        </td>
        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
         <button class="unstyled-button" type="submit">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
         </button>
                {{-- <button onclick="edit({{ $item->id }})">edit</button> --}}
         <button class="unstyled-button" type="submit">
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
         </button>
                {{-- <button onclick="destroy({{ $item->id }})">hapus</button> --}}
            </div>
        </td>
    </tr>
     <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
@endforeach

