<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    function show(){
        $data['alumni'] = Alumni::all();
  
        return view('admin.alumni', $data);
      }

    function add(){
        $data =[
            'action'=>url('alumni/create'),
            'tombol'=>'simpan',
            'alumni'=>(object)[
                'nis'=>'',
                'password'=>'',
                'nama'=>'',
                'jk'=>'',
                'jurusan'=>'',
                'tgl_lahir'=>'',
                'alamat'=>'',
                'telepon'=>'',
                'thn_ajaran'=>'',
                'foto'=>''
            ]
            ];
            return view('admin.form_alumni',$data);
    }

    function create(Request $request){
        Alumni::create([
            'nis'=> $request->nis,
            'password'=> $request->password,
            'nama'=> $request->nama,
            'jk'=> $request->jk,
            'jurusan'=> $request->jurusan,
            'tgl_lahir'=> $request->tgl_lahir,
            'alamat'=> $request->alamat,
            'telepon'=> $request->telepon,
            'thn_ajaran'=> $request->thn_ajaran,
            'foto'=>  $request->file('foto')->store('foto')
        ]);
        return redirect('alumni');
    }
    
    function delete($id){
        Alumni::where('id',$id)->delete();
        return redirect('alumni');
    }

    function edit($id){ 
        $data['alumni'] = Alumni::where('id', $id)->first();
        $data['action'] = url('alumni/update').'/'.$data['alumni']->id;
        $data['tombol'] = "Update";

        return view('admin.form_alumni',$data);
    }

    function update(Request $request){
        $data = Alumni::where('id',$request->id)->first();
        if($request->foto == ''){
            $foto = $data->foto;
        }else{
            $foto = $request->file('foto')->store('foto');
        }
        Alumni::where('id', $request->id)->update([
            'nis'=> $request->nis,
            'password'=> $request->password,
            'nama'=> $request->nama,
            'jk'=> $request->jk,
            'jurusan'=> $request->jurusan,
            'tgl_lahir'=> $request->tgl_lahir,
            'alamat'=> $request->alamat,
            'telepon'=> $request->telepon,
            'thn_ajaran'=> $request->thn_ajaran,
            'foto'=>  $request->file('foto')->store('foto')
        ]);
        return redirect('alumni');
    }
}
