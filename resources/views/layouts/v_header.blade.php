
<!DOCTYPE html>
<html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
         <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        {{-- template admin --}}
        <link rel="stylesheet" href="{{asset('template-admin')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('template-admin')}}/assets/css/ready.css">
        <link rel="stylesheet" href="{{asset('template-admin')}}/assets/css/demo.css">


        <script src="{{asset('template-admin')}}/assets/js/core/jquery.3.2.1.min.js"></script>
        <link rel="stylesheet" href="{{asset('template-admin')}}/assets/js/jquery-ui.min.css">
        <script src="{{asset('template-admin')}}/assets/js/jquery-ui.min.js"></script>

        {{-- CSS  --}}
        <link rel="stylesheet" href="{{asset('css/master.css')}}">

        {{-- FontAwesome --}}
        <script src="https://kit.fontawesome.com/3288de5ebf.js" crossorigin="anonymous"></script>

        {{-- Datatable --}}
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> --}}

        {{-- Ajax --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

       {{-- sweartalert2 --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

        {{-- charts --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://www.chartjs.org/samples/2.9.4/utils.js"></script>
          {{-- javascript Excel convert to table html --}}
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        {{-- boostrap-select --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<body>
    @include('partials.v_navbar')

    @include('partials.v_side_bar')

        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div>


