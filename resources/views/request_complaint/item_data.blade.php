<?php $no=1; ?>
@foreach ($request_complain as $request_complains)
<tr id="edit-form-{{ $request_complains->id }}">
    <td id="td-checkbox-{{ $request_complains->id }}">
            <label class="form-check-label">
                <input class="form-check-input task-select" type="checkbox" id="{{$request_complains->id}}">
                <span class="form-check-sign"></span>
            </label>
    </td>
    <td id="item-no-{{ $request_complains->id}}">
        {{ $no++ }}
    </td>
    <td id="item-company_id-{{ $request_complains->id}}">
        {{ $request_complains->companyRequest->company_name??''}}
    </td>
    <td id="item-internal_eksternal-{{ $request_complains->id }}">
        {{ $request_complains->internal_eksternal }}
    </td>
    <td id="item-pic_id-{{ $request_complains->id}}">
        {{ $request_complains->pic->pic_name?? ''}}
    </td>
    <td id="item-vehicle-{{ $request_complains->id }}">
        {{$request_complains->vehicleRequest->license_plate??''}}
    </td>
    <td id="item-waktu_info-{{ $request_complains->id }}">
        {{ $request_complains->waktu_info}}
    </td>
    @if ($request_complains->status_waktu_respon == "telat")
        <td id="item-waktu_respond-{{ $request_complains->id }}" style="color:#FF0000; ">
            {{ $request_complains->waktu_respond}}
        </td>
    @else
        <td id="item-waktu_respond-{{ $request_complains->id }}">
            {{ $request_complains->waktu_respond}}
        </td>
    @endif
    <td id="item-task-{{ $request_complains->id }}">
        {{ $request_complains->task}}
    </td>
    <td id="item-platform-{{ $request_complains->id }}">
        {{ $request_complains->platform}}
    </td>
    <td id="item-detail_task-{{ $request_complains->id }}">
        <i class="fas fa-eye" data-toggle="popover"  data-placement="bottom" data-content="{{$request_complains->detail_task }}" ></i>
    </td>
    <td id="item-divisi-{{ $request_complains->id }}">
        {{ $request_complains->divisi}}
    </td>
    <td id="item-respond-{{ $request_complains->id }}">
        {{ $request_complains->respond}}
    </td>
    <td id="item-waktu_kesepakatan-{{ $request_complains->id }}">
        {{ $request_complains->waktu_kesepakatan}}
    </td>
    <td id="item-status-{{ $request_complains->id }}">
        {{ $request_complains->status }}
    </td>
    @if ($request_complains->status_waktu_solve == "telat")
        <td id="item-waktu_respond-{{ $request_complains->id }}" style="color:#FF0000;">
            {{ $request_complains->waktu_solve}}
        </td>
    @elseif($request_complains->waktu_solve == null && $request_complains->status == "Done")
        <td id="item-waktu_respond-{{ $request_complains->id }}" style="background-color:#ff8383; color: white">
            {{ $request_complains->waktu_solve}}
        </td>
    @else
        <td id="item-waktu_solve-{{ $request_complains->id }}">
            {{ $request_complains->waktu_solve}}
        </td>
    @endif
    <td id="item-status_akhir-{{ $request_complains->id }}">
        {{ $request_complains->status_akhir }}
    </td>
    <td class="action sticky-col first-col" id="td-button-{{ $request_complains->id }}">

        <div id="button-{{ $request_complains->id }}">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-pen edit" onclick="edit({{ $request_complains->id }})"></i>
         </button>
         <button class="unstyled-button" type="submit">
            <i class="fas fa-trash delete" onclick="destroy({{ $request_complains->id }})"></i>
         </button>
        </div>
    </td>
</tr>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
@endforeach
