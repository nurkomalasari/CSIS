    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $vehicle->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <select class="select company_id-{{$vehicle->id}}" id="company_id" name="company_id">
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input license_plate-{{$vehicle->id}}" id="license_plate" value="{{ $vehicle->license_plate }}"></div>
    </td>
    <td>
        <select class="select vehicle_id-{{$vehicle->id}}" id="vehicle_id" name="vehicle_id">
            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ $item->id == $vehicle->vehicle_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_name-{{$vehicle->id}}" id="pool_name" value="{{ $vehicle->pool_name }}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input pool_location-{{$vehicle->id}}" id="pool_location" value="{{ $vehicle->pool_location }}"></div>
    </td>