
@foreach ($company as $item)
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

        <td id="item-company_name-{{ $item->id}}">
            {{ $item->company_name }}
        </td>

        <td id="item-seller_id-{{ $item->id}}">
            {{ $item->seller->seller_name??''}}
        </td>
        <td id="item-customer_code-{{ $item->id }}">
            {{ $item->customer_code }}
        </td>

        <td id="item-no_agreement_letter_id-{{ $item->id}}">

                {{ $item->no_agreement_letter_id??''}}
        </td>
        <td id="item-status-{{ $item->id }}">
                {{-- {{ $item->status}} --}}

            @if ($item->status == 'Active')
                <span class="badge badge-info">{{ $item->status }}</span>
            @elseif ($item->status == 'In Active')
                <span class="badge badge-danger">{{ $item->status }}</span>
            @endif
        </td>
         <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
            <div id="button-{{ $item->id }}">
                <button class="unstyled-button" type="submit">
                <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
                </button>
                <button class="unstyled-button" type="submit" >
                <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
                </button>
            </div>
        </td>
    </tr>
@endforeach
<script>
        // menangkap $no dari controller, di masukkan ke variabel no
        var no =  {!! json_encode($no) !!};
        // var old_no = no;
</script>


