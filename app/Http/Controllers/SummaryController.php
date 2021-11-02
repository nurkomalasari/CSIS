<?php

namespace App\Http\Controllers;
use App\Models\SummaryCustomer;
use App\Models\Company;
use App\Models\DetailCustomer;
use carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SummaryController extends Controller{

    public function index(){

        // $now    = Carbon::now();
        // $month  = $now->month;
        // $year   = $now->year;

        $company = Company::orderBy('company_name', 'DESC')->get();
        // $details = DetailCustomer::orderBy('company_id', 'DESC')->get();
        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->selectRaw('count(*) as jumlah, company_id')
        // ->get();
        return view('customer.summary.index')->with([
            'company' => $company,
            // 'data' => $data,
            // 'month' => $month,
            // 'year'  => $year
        ]);

    }

    public function filter(Request $request){   

        $company = $request->Company;
        $month   = $request->Month;
        $year    = $request->Year;

       if ($company == "") {

        $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        ->where('status_layanan', "Active")
        ->select('company_id', 
            DB::raw('count(gps_id) as total_gps'),
            DB::raw('count(tanggal_pasang) as penambahan_layanan '),
        )   
        ->get();
            
            return view('customer.summary.item_summary')->with([
                'data'  => $data,
                'month' => $month,
                'year'  => $year,
               
            ]);

       }else{
            $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
            ->where('status_layanan', "Active")
            ->select('company_id', 
                DB::raw('count(gps_id) as total_gps'),
                DB::raw('count(tanggal_pasang) as penambahan_layanan '),
            )   
            ->get();
            return view('customer.summary.item_summary')->with([
                'data' => $data,
                'month' => $month,
                'year'  => $year,
               
            ]);
        }
   }

    public function DataPo(Request $request){
       
       $company = $request->company;
       $month   = $request->month;
       $year    = $request->year;

       $data = DetailCustomer::where('company_id', $company)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year) ->where('status_layanan', "Active")
       ->groupBy('company_id', 'po_id')
       ->selectRaw('company_id')
       ->selectRaw('po_id')
       ->selectRaw('sum(harga_layanan) as total, po_id')
       ->get();


       

        return view('customer.summary.item_po')->with([
            'data' => $data,
        ]);
    }


   public function item_summary(){

        $now    = Carbon::now();
        $month  = $now->month;
        $year   = $now->year;
    

        $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        ->where('status_layanan', "Active")
        ->select('company_id', 
            DB::raw('count(gps_id) as total_gps'),
            DB::raw('count(tanggal_pasang) as penambahan_layanan '),
        )   
        ->get();

        
        return view('customer.summary.item_summary')->with([
            'data'  => $data,
            'month' => $month,
            'year'  => $year,
           
        ]);
   

       
   }





      // $data2 = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')->where('status_layanan', "In Active")
        // ->select('company_id', 
        //     DB::raw('count(tanggal_non_aktif) as total_terminate '),
        // )   
        // ->get();

        // $merge=$data1->merge($data2);


















}

































//    public function item_data(){

   


//     $data = DetailCustomer::with('company')->select([
//         DB::raw('count(*) as jumlah'),
//         DB::raw('company_id as company'),
//         DB::raw('status_po as status'),
//         DB::raw('merk as merk_gps'),
//         DB::raw('type as type_gps'),
//         DB::raw('po_number as po')
//    ])
//    ->groupBy('company')
//    ->groupBy('status')
//    ->groupBy('merk_gps')
//    ->groupBy('type_gps')
//    ->groupBy('po')
//    ->get();

//    $data = DetailCustomer::with('company')->groupBy('company_id')
//    ->selectRaw('count(*) as jumlah, company_id')
//    ->get();

//     return view('customer.summary.item_data', compact('data'));

//    }

//    public function add_form(){
//        $company = SummaryCustomer::with('company')->get();
//        return view('customer.summary.add', compact('company'));
//    }

//    public function countPo(){
    //    $data = DB::table('detail_customers')->select([
    //         DB::raw('count(*) as jumlah'),
    //         DB::raw('company_id as company'),
    //         DB::raw('status_po as status'),
    //         DB::raw('merk as merk_gps'),
    //         DB::raw('type as type_gps'),
    //         DB::raw('po_number as po')
    //    ])
    //    ->groupBy('company')
    //    ->groupBy('status')
    //    ->groupBy('merk_gps')
    //    ->groupBy('type_gps')
    //    ->groupBy('po')
    //    ->get();


        // dd(json_decode($data));

        // $i = 0;
       
        
        // $data = DetailCustomer::with('company')->where('company_id', '2')->get();
        // dd($data);
    //     $data  = DB::table('detail_customers')->select([
    //         DB::raw('count(*) as jumlah'),
    //         DB::raw('company_id as coba')
    //    ])
    //    ->groupBy('coba')
    //    ->get();

//     $data = DetailCustomer::with('company')->groupBy('company_id')
//     ->selectRaw('count(*) as jumlah, company_id')
//     ->get();


//        dd($data);
//         //  return view('livetable.index', compact('data'));
//    }
// }