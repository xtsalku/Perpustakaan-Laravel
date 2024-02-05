<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    function index(){
        return view ('admin');
    }
    function editprof($id){
        $idd = decrypt($id);
        $perpus = DB::table('users')->where('id',$idd)->get();
        return view('editprof',['perpus' => $perpus]);
    }
    function update(Request $request){
        $user = DB::table('users')->where('id', $request->id)->first();

        $updateData = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ];

        DB::table('users')->where('id', $request->id)->update($updateData);

        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/admin');
        } elseif ($user->role == 'user') {
            return redirect('/dashboard');
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
        
    }
    function mbuku(Request $request){
        $searchTerm = $request->input('cari');

    if ($searchTerm) {
        $perpus = DB::table('tb_buku')
        ->where('judul_buku', 'like', '%' . $searchTerm . '%')
        ->orWhere('tahun', 'like', '%' . $searchTerm . '%')
        ->orWhere('kategori', 'like', '%' . $searchTerm . '%')
        ->orWhere('kode_buku', 'like', '%' . $searchTerm . '%')
        ->get();
    } else {
        // If no search term, retrieve all books
        $perpus = DB::table('tb_buku')->get();
    }

    return view('mbuku', compact('perpus', 'searchTerm'));
    }
    function add(){
        return view('addbook');
    }
    function addbook(Request $request){
        DB::table('tb_buku')->insert([
            'kode_buku'=> $request->kode_buku,
            'judul_buku'=> $request->judul_buku,
            'pengarang'=> $request->pengarang,
            'penerbit'=> $request->penerbit,
            'tahun'=> $request->tahun,
            'kategori'=> $request->kategori,
            
        ]);

        $user = Auth::user();
        $id=encrypt($user->id);
        if ($user->role == 'admin') {
            return redirect('/admin/manage-buku');
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
        
    }
    function mkaryawan(){
        $perpus = DB::table('users')->get();
        return view('mkaryawan',['perpus' => $perpus]);
        
    }
    function mkadd(){
        return view('mkadd');
    }
    function addkar(Request $request){
        DB::table('users')->insert([
       
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/admin');
        } elseif ($user->role == 'user') {
            return redirect('/dashboard');
        }elseif ($user->role == 'pegawai') {
            return redirect('/admin/manage-karyawan');
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
        
    }
    function lpinjam(Request $request){
        $searchTerm = $request->input('cari');

    // If a search term is provided, adjust the query accordingly
    if ($searchTerm) {
        $perpus = DB::table('tb_pinjam')
        ->where('judul_buku', 'like', '%' . $searchTerm . '%')
        ->orWhere('nama', 'like', '%' . $searchTerm . '%')
        ->orWhere('tahun', 'like', '%' . $searchTerm . '%')
        ->orWhere('kategori', 'like', '%' . $searchTerm . '%')
        ->orWhere('kode_buku', 'like', '%' . $searchTerm . '%')
        ->get();
    } else {
        // If no search term, retrieve all books
        $perpus = DB::table('tb_pinjam')->get();
    }

     return view('lpinjam', compact('perpus', 'searchTerm'));
    }
    function editbook($id){
        $idd = decrypt($id);
        $perpus = DB::table('tb_buku')->where('id',$idd)->get();
        return view('editbook',['perpus' => $perpus]);
    }
    function updatebook(Request $request){
        $user = DB::table('tb_buku')->where('id', $request->id)->first();

        $updateData = [
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
        
           ];
           DB::table('tb_buku')->where('id', $request->id)->update($updateData);
       $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/admin/manage-buku');
        } elseif ($user->role == 'user') {
            return redirect('/dashboard');
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
        
    }
    public function delbuku($id){
        $idd = decrypt($id);
        DB::table('tb_buku')->where('id',$idd)->delete();
        $user = Auth::user();
        $id=encrypt($user->id);
        if ($user->role == 'admin') {
            return redirect('/admin/manage-buku');
        } elseif ($user->role == 'user') {
            return redirect("/dashboard/");
        }else{
                return redirect('/login')->withErrors('Sesi Anda Berakhir');
            }
    }
}
