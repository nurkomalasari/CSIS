@php
     $total = 0 ;
     $rowspan = count($data);
@endphp

<table class="table">
     <thead>
        <tr>
          <th scope="col">Company</th>
          <th scope="col">No Po</th>
          <th scope="col">Jumlah Unit Po</th>
          <th scope="col">Harga Layanan</th>
          <th scope="col">Revenue</th>
          <th scope="col">Status PO</th>
          <th scope="col">Jumlah GPS terpasang</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $item)    
          <tr>
               <td>{{ $item->company->company_name }}</td>
               <td>{{ $item->po->po_number }}</td>
               <td>{{ $item->po->jumlah_unit_po }}</td>
               <td>Rp.{{ number_format($item->po->harga_layanan) }}</td>
               <td>Rp.{{ number_format($item->po->harga_layanan * $item->po->jumlah_unit_po) }}</td>
               <td>{{ $item->po->status_po }}</td>       
               <td>{{ $item->jumlah_per_po }}</td>
               @php
               $total +=  $item->po->harga_layanan * $item->po->jumlah_unit_po;
               @endphp
          </tr> 
          @endforeach         
     </tbody>
     <tfoot>
          <tr>
               <th colspan="4">Total</th>
               <th>Rp. {{number_format($total) }}</th>
          </tr>
     </tfoot>               
</table>




{{-- <tr>
     <td>{{ $item->company->company_name }}</</td>
     <td> Baris 3, Kolom 3</td>
     <td>Baris 1, Kolom 3</td>
     <td rowspan="2"> Baris 3 & 4, Kolom 1</td>
</tr> --}}




{{-- <tr>
     @foreach ($data as $item)       
     <td>{{ $item->company->company_name }}</</td>
     <td>{{ $item->po->po_number }}</td>
     <td rowspan="0">hallo</td>
</tr>
@endforeach --}}
