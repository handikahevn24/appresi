<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests;
use App\Resi;
use App\Toko;
use Carbon\Carbon;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Definisi Tanggal
        $day = Carbon::now()->format('y-m-d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('y');
        $week = Carbon::now()->format('w');

        //Laporan Harian
        $ongkir_hari_ini = Resi::where('tanggal_resi',$day);
        $jumlah_ongkir_hari_ini = $ongkir_hari_ini->sum('ongkir');
        //DB::table('users')->whereYear($year);

        //Laporan Mingguan
        $ongkir_minggu_ini = Resi::where(\DB::raw('WEEK(tanggal_resi)'),$week );
        $jumlah_ongkir_minggu_ini = $ongkir_minggu_ini->sum('ongkir');

        //Ongkir Mingguan JNE
        $ongkir_minggu_ini_jne = $ongkir_minggu_ini->where('ekpedisi','JNE');
        $total_ongkir_jne_minggu_ini = $ongkir_minggu_ini_jne->sum('ongkir');


        //Data Bulanan
        //Laporan Bulanan
        $ongkir_bulan_ini = Resi::where(\DB::raw('MONTH(tanggal_resi)'),$month);
        $jumlah_ongkir_bulan_ini = $ongkir_bulan_ini->sum('ongkir');
        
        //Data Global
        //Ongkir Global
        $ongkir_global = Resi::all();
        $jumlah_ongkir_global = $ongkir_global->count();
        $total_ongkir = $ongkir_global->sum('ongkir');

        //Ongkir Global JNE
        $ongkir_jne = Resi::where('ekpedisi','JNE');
        $total_ongkir_jne = $ongkir_jne->sum('ongkir');

        //Ongkir Global JNT
        $ongkir_jnt = Resi::where('ekpedisi','JNT');
        $total_ongkir_jnt = $ongkir_jnt->sum('ongkir');

        //Ongkir Global TIKI
        $ongkir_tiki = Resi::where('ekpedisi','TIKI');
        $total_ongkir_tiki = $ongkir_tiki->sum('ongkir');

        //Ongkir Global JNE
        $ongkir_pos = Resi::where('ekpedisi','POS');
        $total_ongkir_pos = $ongkir_pos->sum('ongkir');

        $lava = new Lavacharts;
        $chart_ongkir = $lava->DataTable();
        $sum_ongkir = Resi::select(\DB::raw('sum(ongkir)'))->get();
        $data_ongkir = Resi::select('ekpedisi as 0',\DB::raw('sum(ongkir) as `1`'))
        ->groupBy('ekpedisi')->get()->toArray();

        $chart_ongkir   ->addStringColumn("Ekpedisi")
                        ->addNumberColumn("Ongkir")
                        ->addRows($data_ongkir);
        $lava->BarChart("Ekpedisi",$chart_ongkir);

        return view('laporan.index',["lava"=>$lava], compact('week','total_ongkir_jne_minggu_ini','jumlah_ongkir_minggu_ini','jumlah_ongkir_bulan_ini','jumlah_ongkir_hari_ini','ongkir_global','jumlah_ongkir_global', 'total_ongkir','ongkir_jne','total_ongkir_jne','total_ongkir_jnt','total_ongkir_tiki','total_ongkir_pos'));

    }

    public function customTanggal(Request $request){

        if(!empty($dari)){
        $dari = $request->input($dari);
        $ke = $request->input($ke);
        $custom = Resi::whereBetween('tanggal_resi',[$dari, $ke]);
        return view('laporan.index',["lava"=>$lava], compact('dari','week','jumlah_ongkir_minggu_ini','jumlah_ongkir_bulan_ini','jumlah_ongkir_hari_ini','ongkir_global','jumlah_ongkir_global', 'total_ongkir','ongkir_jne','total_ongkir_jne','total_ongkir_jnt','total_ongkir_tiki','total_ongkir_pos'));
        }
        return redirect('laporan');
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
        //
    }

    public function ongkirHariIni(){

    }
    public function ongkirMingguIni(){

    }
    public function ongkirBulanIni(){

    }
    public function ongkirGlobal(){

    }
}
