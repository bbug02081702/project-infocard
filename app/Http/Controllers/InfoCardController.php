<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\InfoCard;
use App\Exports\InfoCardExport;
use App\Imports\InfoCardImport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class InfoCardController extends Controller
{
    //return view index infocard
    public function index(Request $request){
        if($request->has('search')){
            $data = InfoCard::where('NameCard','LIKE', '%'.$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = InfoCard::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
            // dd($data);
        }
        return view('card.infocard',compact('data'));
    }
    
    public function show($id){
        $data = InfoCard::find($id);
        return view('card.view-infocard', compact('data'));
    }

    public function create(){
        return view('card.add-infocard');
    }

    public function store(Request $request){

      $this->validate($request,[
          'NameCard' => 'required|min:7|max:20',
          'WalletCard' => 'required|min:24',
      ]);
      $data = InfoCard::create($request->all());
    //   dd($data);
    if($request->hasFile('PhotoCard')){
            $request->file('PhotoCard')->move('photocreate/', $request->file('PhotoCard')->getClientOriginalName());
            $data->PhotoCard = $request->file('PhotoCard')->getClientOriginalName();
            $data->save();
            
    }
      return redirect()->route('infocard')->with('Thongbao','Them thanh cong');
      
    }

    public function edit($id){

        $data = InfoCard::find($id);
        // dd($data);
       return view('card.edit-infocard',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
           'NameCard' => 'required|min:4|max:28',
           'WalletCard' => 'required|min:2|max:40',
        ]);
        $data = InfoCard::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('Thongbao',' Data Berhasil Di Update');
        }
        return redirect()->route('infocard')->with('Thongbao','update thanh cong');
    }

    public function destroy($id){
        $data = InfoCard::find($id);
        $data->delete();
        return redirect()->route('infocard')->with('Thongbao','delete thanh cong');
    }

    public function exportpdf(){
        $data = InfoCard::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('card.data-infocard-pdf');
        return $pdf->download('data.pdf');
    }
    
    public function exportexcel(){
        return Excel::download(new InfoCardExport, 'InfoCardExport.xlsx');
        // return view::download(new InfoCardExport, 'InfoCardExport.xlsx');
    }


    public  function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('InfocardData', $namafile);

        Excel::import(new InfoCardImport, \public_path('/InfocardData/'.$namafile));
        return \redirect()->back();
    
    }
}
