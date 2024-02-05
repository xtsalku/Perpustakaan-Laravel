<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;

class PenggunaController extends Controller
{
    function pinjam(){
        $perpus = DB::table('tb_buku')->get();
        return view('pinjam',['perpus' => $perpus]);
    }
    function shwpinjam($id){
        $idd = decrypt($id);

        $perpus = DB::table('tb_buku')->where('id',$idd)->get();
        return view('shwpinjam',['perpus' => $perpus]);
    }
    function addpinjam(Request $request){
        DB::table('tb_pinjam')->insert([
            'id_user'=>$request->id_user,
            'nama'=> $request->nama,
            'kode_buku'=> $request->kode_buku,
            'judul_buku'=> $request->judul_buku,
            'pengarang'=> $request->pengarang,
            'penerbit'=> $request->penerbit,
            'tahun'=> $request->tahun,
            'kategori'=> $request->kategori,
            'tgl_pinjam'=> $request->tgl_pinjam,
            'tgl_kembali'=> $request->tgl_kembali
        ]);

        $user = Auth::user();
        $id=encrypt($user->id);
        if ($user->role == 'admin') {
            return redirect('/admin');
        } elseif ($user->role == 'user') {
            return redirect("/dashboard/jadwal-pinjam/{$id}");
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
        
    }
    public function jwlpinjam($id){
        $idd = decrypt($id);
        $perpus = DB::table('tb_pinjam')->where('id_user',$idd)->get();
        return view('jwlpinjam',['perpus' => $perpus]);
    }
    public function delete($id){
        $idd = decrypt($id);
        DB::table('tb_pinjam')->where('id',$idd)->delete();
        $user = Auth::user();
        $id=encrypt($user->id);
        if ($user->role == 'admin') {
            return redirect('/admin/list-peminjam');
        } elseif ($user->role == 'user') {
            return redirect("/dashboard/jadwal-pinjam/{$id}");
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
    }
}
