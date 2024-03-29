<?php $no=1; ?>
@foreach ($GsmActive as $item)
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
        <td id="item-status_gsm-{{ $item->id}}">
            {{ $item->status_gsm }}
        </td>
        <td id="item-gsm_number-{{ $item->id}}">
            {{ $item->gsm_number }}
        </td>
        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name }}
        </td>
        <td id="item-request_date-{{ $item->id }}">
            {{ $item->request_date }}
        </td>
        <td id="item-active_date-{{ $item->id }}">
            {{ $item->active_date }}
        </td>
        <td id="item-note-{{ $item->id }}">
            {{ $item->note }}
        </td>
        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
            <button class="unstyled-button" type="submit">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
            </button>
            <button class="unstyled-button" type="submit">
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
            </button>
            </div>
        </td>
    </tr>
@endforeach

