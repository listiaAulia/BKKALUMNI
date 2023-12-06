<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Alumni;
use App\Models\Perusahaan;
use DB;

class LowonganController extends Controller
{
    function show(){
        $data['lowongan'] = DB::table('lowongan')
        ->leftJoin('alumni', 'lowongan.nis', '=', 'alumni.nis')
        ->get();
        $data['lowongan'] = DB::table('lowongan')
        ->leftJoin('perusahaan', 'lowongan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
        ->get();
  
        return view('admin.lowongan', $data);
      }

    function add(){
        $alumni = DB::table('alumni')->get();
        $perusahaan = DB::table('perusahaan')->get();
        $data =[
            'action'=>url('lowongan/create'),
            'tombol'=>'simpan',
            'lowongan'=>(object)[
                // 'nis'=>'',
                'id_perusahaan'=>'',
                'judul'=>'',
                'deskripsi'=>'',
                'tanggal'=>'',
                'status'=>'',
                'foto'=>''
            ]
            ];
            return view('admin.form_lowongan',['alumni'=>$alumni, 'perusahaan'=>$perusahaan],$data);
    }

    function create(Request $request){
        Lowongan::create([
            // 'nis'=> $request->nis,
            'id_perusahaan'=> $request->id_perusahaan,
            'judul'=> $request->judul,
            'deskripsi'=> $request->deskripsi,
            'tanggal'=> $request->tanggal,
            'status'=> $request->status,
            'foto'=>  $request->file('foto')->store('foto')
        ]);
        return redirect('lowongan');
    }
    
    function delete($id){
        Lowongan::where('id_loker',$id)->delete();
        return redirect('lowongan');
    }

    function edit($id){ 
        $data['alumni']  = DB::table('alumni')->get();
        $data['perusahaan']  = DB::table('perusahaan')->get();
        $data['lowongan'] = Lowongan::where('id_loker', $id)->first();
        $data['action'] = url('lowongan/update').'/'.$data['lowongan']->id_loker;
        $data['tombol'] = "Update";

        return view('admin.form_lowongan',$data);
    }

    function update(Request $request){
        // $data = Lowongan::where('id',$request->id)->first();
        if($request->foto == ''){
            $foto = $data->foto;
        }else{
            $foto = $request->file('foto')->store('foto');
        }
        Lowongan::where('id_loker', $request->id_loker)->update([
            // 'nis'=> $request->nis,
            'id_perusahaan'=> $request->id_perusahaan,
            'judul'=> $request->judul,
            'deskripsi'=> $request->deskripsi,
            'tanggal'=> $request->tanggal,
            'status'=> $request->status,
            'foto'=>  $request->file('foto')->store('foto')
        ]);
        return redirect('lowongan');
}
}
