@extends('layouts.v_main')
@section('title','Summary')
@section('title-table', 'Summary Customer')
@section('content')
  <?php $no=1;?>

  <div class="row">
    <div class="col-sm-4">
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Company</div>
          </div>
          <select class="form-control" id="company">
              <option style="display: none"></option>
            @foreach ($company as $item)
              <option value="{{ $item->id }}"> {{ $item->company_name}}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class="col-sm-4">
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Month</div>
        </div>
        <input type="month" class="form-control" id="bulan" value="{{ "$year-$month" }}">
      </div>
    </div>
    <button class="btn btn-primary mb-2" onclick="filter()">Filter</button>
    <button class="btn btn-success mb-2 ml-2" id="export"><i class="fas fa-file-excel"></i> Export</button>
  </div>

  <div class="row">
      <div class="col-sm-1">
        <div class="card" style="width:35rem;">
          <div class="card-body">
              <div class="table-scroll">
                  <table class="table table-sm" id="table_summary">
                      <thead class="fixedheader">
                        <tr>
                            <th width="10px">No</th>
                            <th width="80px">Company</th>
                            <th width="50px">Total GPS</th>
                            <th width="50px">Terminate Layanan</th>
                            <th width="50px">Penambahan Layanan</th>
                            <th width="30px" id="act">Act</th>
                        </tr>
                      </thead>
                      <tbody id="item_summary">
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
          <div class="card data-po">
              <div class="card-body" id="data-po"></div>
          </div>
      </div>
  </div>

  <script>

    $(document).ready(function() {
      read();
    });

    function read() {
      var Company = $('#company').val();
      var data   = new Date($('#bulan').val());
      var Month  = data.getMonth() + 1 ;
      var Year   = data.getFullYear();

      $.ajax ({
          url:"{{ url('/item_summary')}}",
          data:{
            Company : Company,
            Month   : Month,
            Year    : Year
          },
          success: function(data, status) {
            $('#table_summary').find("#item_summary").html(data);
          }
      });
    }

    function filter() {

      var Company = $('#company').val();
      var data   = new Date($('#bulan').val());
      var Month  = data.getMonth() + 1 ;
      var Year   = data.getFullYear();
      var date   = new Date(Year, Month, 0);
      var lastDay = date.getDate();

      $("#item_summary").empty();
      $("#data-po").empty();
      $.ajax({
        url:"{{ url('/filter')}}",
        data:{
          Company : Company,
          Month   : Month,
          Year    : Year,
          lastDay : lastDay
        },
        success: function(data){
          $('#table_summary').find("#item_summary").html(data);
        }

      });
      return true;
    }


    function detail(company,month,year) {

      var company = company;
      var month   = month;
      var year    = year;

      $("#list-" + company).addClass('highlighted').siblings().removeClass("highlighted");
      $("#data-po").empty();
      $.ajax ({
          url:"{{ url('/data-po')}}",
          data:{
          company : company,
          month   : month,
          year    : year
          },
          success: function(html){
              $("#data-po").empty().append(html);
          }
      });
        return true;
    }
    $('#export').click(function(){

      const monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                          ];

      var data   = new Date($('#bulan').val());
      var Month  = monthNames[data.getMonth()];
      var Year   = data.getFullYear();
      var format = 'Summary_Customer'+" "+ Month +" "+ Year +"."+'xls'
      $('#act').empty();
      $
          $('#table_summary').table2excel({
            exclude: ".excludeThisClass",
            name: "Worksheet Name",
            filename: format,
            preserveColors: true
        });
        $('#act').append("Act");

    });
  </script>

@endsection
