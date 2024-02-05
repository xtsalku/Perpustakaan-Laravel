<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class TabelController extends Controller
{
    public function index(){
        
        return view ('index');
    }
    public function login(){
       
        return view ('login');
    }
    public function register(){
       
        return view ('register');
    }
    public function perpus(Request $request){
        // $perpus = DB::table('tb_buku')->get();
        // return view('perpus',['perpus' => $perpus]);
        $searchTerm = $request->input('cari');

    // If a search term is provided, adjust the query accordingly
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

    return view('perpus', compact('perpus', 'searchTerm'));
        
    }
    public function about(){
       
        return view ('about');
    }
    public function blog(){
       
        return view ('blog');
    }
    
}
