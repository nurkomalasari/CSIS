
@foreach ($pic as $item)
    <tr id="edit-form-{{ $item->id }}">


         <td id="td-checkbox-{{ $item->id }}">
            <div>
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$item->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="item-no-{{ $item->id}}" class="numbering">
            {{ $no++ }}
        </td>

        <td id="item-company_id-{{ $item->id}}">
            {{ $item->company->company_name??''}}
        </td>
        <td id="item-pic_name-{{ $item->id}}">
            {{ $item->pic_name }}
        </td>
         <td id="item-phone-{{ $item->id }}">
            {{ $item->phone }}
        </td>
          <td id="item-email-{{ $item->id }}">
            {{ $item->email }}
        </td>
          <td id="item-position-{{ $item->id }}">
            {{ $item->position }}
        </td>
        <td id="item-date_of_birth-{{ $item->id }}">
            {{ $item->date_of_birth }}
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

<script>
    var no =  {!! json_encode($no) !!};
</script>
