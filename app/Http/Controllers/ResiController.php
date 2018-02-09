<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Charts;
use Session;
use App\Http\Requests;
use App\Resi;
use App\Toko;


class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $resi_list = Resi::orderBy('noresi', 'asc')->Paginate(10);
        $resi_all = Resi::all();
        $jumlah_resi = $resi_list->count();
        $total_ongkir = $resi_all->sum('ongkir');
        $total_resi = $resi_all->count();
        $no = $resi_list->perPage() * ($resi_list->currentPage() -1)+1;
        return view('resi.index', compact('no','resi_list', 'jumlah_resi', 'total_ongkir','total_resi'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('resi.create');
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
        Resi::create($request->all());
        Session::flash('flash_message','Data Berhasil Disimpan.');
        return redirect('resi');

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
        $resi = Resi::findOrFail($id);
        return view('resi.show', compact('resi'));
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
        $resi = Resi::findOrFail($id);
        return view('resi.edit', compact('resi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $resi = Resi::findOrFail($id);
        $resi->update($request->all());
        Session::flash('flash_message', 'Data Berhasil diupdate');     
        return redirect('resi');
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
        $resi = Resi::findOrFail($id);
        $resi->delete();
        return redirect('resi');
    }

    public function ongkir()
    {
        $ongkir_list = Resi::orderBy('id_toko', 'asc')->Paginate(10);
        $jumlah_ongkir = $ongkir_list->total();
        $total_ongkir = Resi::all()->sum('ongkir');
        $no = $ongkir_list->perPage() * ($ongkir_list->currentPage() -1)+1;
        return view('ongkir.index', compact('total_ongkir','ongkir_list','jumlah_ongkir','no'));
    }
    public function cari(Request $request)
   {
        
        $dari = $request->input('dari');
        $ke = $request->input('ke');

        if(!empty($dari)){

        
        $resi_list = Resi::whereBetween('tanggal_resi',[$dari, $ke]);
        $jumlah_ongkir = $resi_list->sum('ongkir');
        $resi_list =  $resi_list->orderBy('tanggal_resi','asc')->paginate(10);
                     $pagination = $resi_list->appends($request->except('page'));
        $no = 1;
        return view('resi.index', compact('jumlah_ongkir','no','dari',  'ke', 'subQuery', 'resi_list', 'pagination','jumlah_resi'));
 #       $kata_kunci = trim($request->input('kata_kunci'));
 #
 #       if(!empty($kata_kunci)){
 #           $ekpedisi = $request->input('ekpedisi');
 #           $id_toko = $request->input('id_toko');

        
            //QUERY
 #           $query = Resi::where('noresi', 'LIKE', '%'. $kata_kunci . '%');
 #          (!empty($ekpedisi)) ? $query->Ekpedisi($ekpedisi) : '';
 #           (!empty($id_toko)) ? $query->Toko($id_toko): '';
 #           $resi_list = $query->paginate(2);
            
            //URL LINKS PAGINATION
 #           $pagination = (!empty($ekpedisi)) ? $resi_list->appends(['ekpedisi' => '$ekpedisi']) : '';
 #           $pagination = (!empty($id_toko)) ? $resi_list->appends(['id_toko' => '$id_toko' ]) : '';
 #           $pagination = $resi_list->appends(['kata_kunci' => '$kata_kunci']);
 #           $jumlah_resi = $resi_list->total();
 #           return view('resi.index', compact('resi_list', 'kata_kunci', 'pagination', 'jumlah_resi','id_toko','ekpedisi', 'total_resi','dari',  'ke', 'subQuery'));

        }

        return redirect('resi'); 
        
    }
    public function cariOngkir(Request $request)
    {
            $id_toko = $request->input('id_toko');
            $dari = $request->input('dari');
            $ke = $request->input('ke');
            $ekpedisi = $request->input('ekpedisi');
            
            //QUERY
            $query = Resi::whereBetween('tanggal_resi',[$dari,$ke]);
            (!empty($ekpedisi)) ? $query
            ->where('ekpedisi',$ekpedisi) : '';
            (!empty($id_toko)) ? $query->Toko($id_toko): '';
            $total_ongkir = $query->sum('ongkir');
            $ongkir_list = $query->paginate(10);
            //$query = Resi::where('id_toko', 'LIKE', '%'.$id_toko.'%');
            //$ongkir_list = $query->paginate(2);
            
            // URL PAGINATION
            $pagination = (!empty($ekpedisi)) ? $ongkir_list->appends(['ekpedisi' => $ekpedisi]) : '';
            $pagination = (!empty($id_toko)) ? $ongkir_list->appends(['id_toko' => $id_toko ]) : '';
            $pagination = $ongkir_list->appends($request->except('page'));
            $jumlah_ongkir = $ongkir_list->total();

            $no = 1;
            
            return view('ongkir.index', compact('ongkir_list', 'pagination', 'jumlah_ongkir','id_toko','total_ongkir','no'));

    }
    //Cari Berdasarkan Tanggal
    public function cariTanggal(Request $request){
        $dari = $request->input($dari);
        $ke = $request->input($ke);

        $subQuery = Resi::whereBetween('tanggal_resi',[$dari, $ke])
                     ->get();
        $resi_list = $subQuery->paginate(50);
        $pagination = $resi_list->appends($request->except('page'));

        return view('resi.index', compact('dari',  'ke', 'subQuery', 'resi_list', 'pagination'));
    }
    //Fitur Import Export Excel
    public function importExport(){
        return view ('resi.excel');
    }

    public function exportExcel(){

        //$dataResi = Resi::join('toko', 'toko.id','=','resi.id_toko')->get();
        $dataResi = Resi::select('noresi','nama_toko','tanggal_resi','nama_konsumen','hp_konsumen','provinsi','alamat','ekpedisi','ongkir')
                ->join('toko', 'toko.id','=','resi.id_toko')
                ->get();
        return Excel::create('Resi '.date('Y-m-d H:i:s'), function($excel) use($dataResi) {
           $excel->sheet('Resi', function($sheet) use($dataResi) {
                $sheet->fromArray($dataResi);
            });
        })->download('xlsx');
 
    }
    
    public function importExcel(Request $request){
        if($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data as $key=>$val){
                    $resi = new Resi;
                    $id_toko = Toko::where('nama_toko',$val->nama_toko)->pluck('id')->first();
                    $resi->noresi = $val->noresi;
                    $resi->tanggal_resi = $val->tanggal_resi;
                    $resi->id_toko = $id_toko;
                    $resi->nama_konsumen = $val->nama_konsumen;
                    $resi->hp_konsumen = $val->hp_konsumen;
                    $resi->provinsi = $val->provinsi;
                    $resi->alamat = $val->alamat;
                    $resi->ekpedisi = $val->ekpedisi;
                    $resi->ongkir = $val->ongkir;
                    $resi->save();
                }
            }
        }
        return back();
    }

    public function chart(){
        $data = Resi::all();
        $chart = \Charts::database(Resi::all(),'bar', 'material')
            // Setup the chart settings
            ->title("My Cool Chart")
            ->dimensions(0, 400)
            ->labels($data->pluck('ekpedisi'))
            ->values($data->pluck('ongkir'));



        return view('test', ['chart' => $chart]);
    }

}
