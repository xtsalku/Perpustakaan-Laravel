<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Login(Request $request){

        $request->validate(
            [
                'username'=>'required',
                'password'=>'required',
            ],[
                'username.required'=>'Username Wajib Di Isi',
                'password.required'=>'Password Wajib Di Isi',
            ]
        );
        $infologin =[
            'username'=>$request->username,
            'password'=>$request->password,

        ];
        // if(Auth::attempt($infologin)){
        //     return redirect('admin');
        // }else{
        //     return redirect('/Login')->withErrors('User atau Password Salah');
        // }
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

    
            if ($user->role == 'admin') {
                return redirect('/admin');
            } elseif ($user->role == 'user') {
                return redirect('/dashboard');
            } elseif ($user->role == 'pegawai') {
                return redirect('/admin');
            }else{
                    return redirect('/login')->withErrors('User atau Password Salah');
                }
        }
    
        // Authentication failed
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function register(Request $request){

        $request->validate(
            [
                'nama'=>'required',
                'username'=>'required',
                'password'=>'required'
            ],[
                'nama.required'=>'Nama Wajib Di Isi',
                'username.required'=>'Username Wajib Di Isi',
                'password.required'=>'Password Wajib Di Isi'
            ]
        );
        $infologin =[
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)

        ];
        $credentials = $request->only('nama','username', 'password');
    
        if ($credentials!=null) {
            // Authentication passed
                DB::table('users')->insert([
        
                    'nama'=> $request->nama,
                    'username'=> $request->username,
                    'password'=> bcrypt($request->password)
                ]);
        
                return redirect('/login');
                
            }else{
                    return redirect('/register')->withErrors('Register Gagal');
                }
        

    }
}
