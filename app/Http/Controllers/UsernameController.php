<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UsernameController extends Controller
{

    public function index()
    {

        return view('livetable.live_table');
        
    }

    public function add_form()
    {

        return view('livetable.add_form');
        
    }

    public function item_data()
    {
        $usernames = Username::orderBy('id', 'DESC')->get();
        return view('livetable.item_data')->with([
            'usernames' => $usernames
        ]);
    }

    public function store(Request $request)
    {
        $data['FirstName'] = $request->FirstName;
        Username::insert($data);
    }

    public function show($id)
    {
        $usernames = Username::findOrfail($id);
        return view('livetable.edit_form')->with([
            'usernames' => $usernames
        ]);
    }

    public function destroy($id)
    {
        $data = Username::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Username::findOrfail($id);
        $data['FirstName'] = $request->FirstName;
        $data->save(); 
    }
    












    // batas

    function add_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                'FirstName'    =>  $request->FirstName,
                'LastName'     =>  $request->LastName
            );
            $id = DB::table('usernames')->insert($data);
            if ($id > 0) {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        }
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $Username = Username::orderBy('id', 'desc')->get();
            echo json_encode($Username);
        }
    }

    function detail_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('usernames')->where('id', $request->id)->first();
            echo json_encode($data);
        }
    }

    function delete_data(Request $request)
    {
        if ($request->ajax()) {
            DB::table('usernames')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }

    function update_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                'FirstName'    =>  $request->FirstName,
                'LastName'     =>  $request->LastName
            );
            DB::table('usernames')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }

    // public function datatable(Request $request)
    // {
    //     if ($request->ajax()) {

    //         return DataTables::of(Username::all())->make(true);
    //     }
    // }
}