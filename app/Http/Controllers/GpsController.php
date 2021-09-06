<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
=======
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24

class GpsController extends Controller
{
    public function index()
    {
        return view('Gps.index');
    }
    public function add_form()
    {
        $gps = Gps::orderBy('merk', 'DESC')->get();
        return view('gps.add_form')->with([

            'gps' => $gps,
        ]);
    }

    public function item_data()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        return view('gps.item_data')->with([
            'gps' => $gps
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'merk'    =>  $request->merk,
            'type'     =>  $request->type,
            'imei'     =>  $request->imei,
            'waranty'     =>  $request->waranty,
            'po_date'     =>  $request->po_date,
            'status'     =>  $request->status,
        );
        GPS::insert($data);
    }

<<<<<<< HEAD
    public function edit_form($id)
    {

        $gps = Gps::findOrfail($id);
        return view('gps.edit_form')->with([
            'gps' => $gps,

=======
    public function show($id)
    {
        
        $gps =Gps ::findOrfail($id);
        return view('gps.edit_form')->with([
            'gps' => $gps,
            
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
        ]);
    }

    public function destroy($id)
    {
        $data = Gps::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        $data->save();
    }
<<<<<<< HEAD

    public function selected()
    {
        $gps = Gps::all();
        return view('gps.selected')->with([
            'gps' => $gps
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gps')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Gps::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Gps::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
=======
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
}
