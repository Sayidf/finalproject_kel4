<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customer = Users::all();
        $customer = DB::table('users')
        ->selectRaw('users.id, users.fullname, users.username, users.email, users.no_hp, users.role, count(reservasi.id_users) as jumlah')
        ->leftjoin('reservasi', 'reservasi.id_users', '=', 'users.id')
        ->groupBy('users.id', 'reservasi.id_users', 'users.fullname', 'users.username', 'users.email', 'users.no_hp', 'users.role')
        ->get();
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Users::find($id);
        Users::where('id',$id)->delete();
        return redirect()->route('customer.index')
                        ->with('success','Data Customer Berhasil Dihapus');
    }

    public function customerPDF()
    {
        $customer = Users::all();
        $pdf = PDF::loadView('customer.customerPDF', ['customer'=>$customer]);
        return $pdf->download('data_customer.pdf');
    }

    public function customerExcel() 
    {
        return Excel::download(new UsersExport, 'data_customer.xlsx');
    }
}
