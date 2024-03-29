<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="company_id" required>
            <option value="" class="hidden">--Pilih Company--</option>
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" placeholder="License Plate" class="input" id="license_plate" required></td>
    <td>
        <select class="select" id="vehicle_id" required>
            <option value="" class="hidden">--Pilih Vehicle--</option>

            @foreach ($vehicleType as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="text" placeholder="Pool Name" class="input" id="pool_name" required></td>
    <td><div class="input-div"><input type="text" placeholder="Pool Location" class="input" id="pool_location" required></td>
    <td>
        <select class="select" id="status">
            <option value="" style="display: none"></option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
        </select>
    </td>
    <td class="action sticky-col first-col">
       <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
       <button class="unstyled-button" type="submit">
        <i class="fas fa-times cancel" onclick="cancel()"></i>
       </button>
    </td>

</tr>
