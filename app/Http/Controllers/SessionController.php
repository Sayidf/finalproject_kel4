<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Alert;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //
    function index()
    {
        return view('sesi/index');
    }
    function login(Request $request)
    {

        Session::flash('username', $request->username);
        Session::flash('id', $request->id);
        $request->validate([
            'username' => 'required',
            'password' => 'required',

        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password

        ];

        if (Auth::attempt($infologin)) {

            //jika autentikasi sukses
            if(Auth::user()->role == 'user'){
                toast('Berhasil Login!','success')->position('bottom-end')->width('fit-content');
                return redirect('/home');
            }
            if(Auth::user()->role == 'admin'){
                toast('Berhasil Login!','success')->position('bottom-end')->width('fit-content');
                return redirect('/administrator');
            }    
            // return redirect('/home')->with(['success' => 'Berhasil Login!']);
            // return redirect('/home')->with('success', 'Berhasil Login');
        } 
        // elseif (Auth::user()->role == 'admin') { // Role Murid
        //     return redirect('/administrator')->with('success', 'Berhasil Login Sebagai Admin');
        // } 
        else {
            return redirect('login')->with('error', 'Username dan Password anda salah');
        }
    }
    function logout()
    {
        Auth::logout();
        session()->forget('cart');
        // return redirect('/home')->with(['success' => 'Berhasil Logout!']);
        toast('Logout Berhasil!','success')->position('bottom-end')->width('fit-content');
        return redirect('/home');
    }

    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {

        Session::flash('username', $request->username);
        $request->validate([
            'fullname' => 'required|max:45',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required',
            'password' => 'required|min:8',

        ], [
            'fullname.required' => 'Nama Lengkap Wajib Diisi',
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username pernah digunakan',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan Masukan email yang valid',
            'no_hp.required' => 'No HP Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password yg diizinkan adalah 8 karakter',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ];

        Users::create($data);


        //jika autentikasi sukses

        return redirect('login')->with('success', 'Berhasil Register, Silahkan Login');
    }
}
