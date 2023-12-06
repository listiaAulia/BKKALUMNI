<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    function show(){
        $data['perusahaan'] = Perusahaan::all();
  
        return view('admin.perusahaan', $data);
      }

    function add(){
        $data =[
            'action'=>url('perusahaan/create'),
            'tombol'=>'simpan',
            'perusahaan'=>(object)[
                'nama'=>'',
                'telepon'=>'',
                'alamat'=>'',
            ]
            ];
            return view('admin.form_perusahaan',$data);
    }

    function create(Request $request){
        Perusahaan::create([
            'nama'=> $request->nama,
            'telepon'=> $request->telepon,
            'alamat'=> $request->alamat,
        ]);
        return redirect('perusahaan');
    }
    
    function delete($id){
        Perusahaan::where('id_perusahaan',$id)->delete();
        return redirect('perusahaan');
    }

    function edit($id){ 
        $data['perusahaan'] = Perusahaan::where('id_perusahaan', $id)->first();
        $data['action'] = url('perusahaan/update').'/'.$data['perusahaan']->id_perusahaan;
        $data['tombol'] = "Update";

        return view('admin.form_perusahaan',$data);
    }

    function update(Request $request){
        Perusahaan::where('id_perusahaan', $request->id_perusahaan)->update([
            'nama'=> $request->nama,
            'telepon'=> $request->telepon,
            'alamat'=> $request->alamat,
        ]);
        return redirect('perusahaan');
    }
}
