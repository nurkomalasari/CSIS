<tr id="add_form">
    <td></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td><select class="form-control" id="company" name="company">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i></td>
    <td><select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
    <option selected>Pilih status</option>
    <option value="Internal Request">Internal Request</option>
    <option value="Internal Complain">Internal Complain</option>
    <option value="Eksternal Request">Eksternal Request</option>
    <option value="Eksternal Complain">Eksternal Complain</option>
    </select></i></td>
      <td><select class="select" id="pic" name="pic">
       @foreach ($pic as $pics)
        <option value="{{ $pic->id }}" {{ old('pic') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="vehicle" id="vehicle" aria-label=".form-select-lg example">
    <option selected>Vehicle</option>
    <option value="B-94828-YTS">B-94828-YTS</option>
    <option value="B-76267-TWS">B-76267-TWS</option>
    </select></i></td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info" value="{{ $request_complain->waktu_info}}"></i></div>
    </td>
    <td><textarea class="form-control" id="task" name="task" >{{$request_complain->task}}</textarea></i></td>


     <td><select class="select" id="platform" id="platform" aria-label=".form-select-lg example">
    <option selected>Platform</option>
    <option value="WA">WA</option>
    <option value="SMS">SMS</option>
    <option value="E-mail">E-mail</option>
    <option value="Telepon">Telepon</option>
    </select></i></td>

    <td><textarea class="form-control" id="detail_task" name="detail_task" >{{$request_complain->detail_task}}</textarea></i></td>
    <td>
        <div class="input-div"><input type="text" class="input" id="divisi" placeholder="Divisi" value="{{ $request_complain->divisi}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="respond" placeholder="Respond" value="{{ $request_complain->respond}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ $request_complain->waktu_kesepakatan}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="waktu Solve" value="{{ $request_complain->waktu_solve}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status" placeholder="status" value="{{ $request_complain->status}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="status akhir" value="{{ $request_complain->status_akhir}}"></i></div>
    </td>



</tr>
