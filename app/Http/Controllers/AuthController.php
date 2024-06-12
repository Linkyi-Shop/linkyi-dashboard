<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // $this->middleware(['guest', 'throttle:6,5']);
    }

    public function index()
    {
        return view('auth.login');
    }
    public function fakeLogin()
    {
        return view('auth.fakeLogin');
    }
    public function login(Request $request)
    {

        if ($request->email && $request->password) {

            $admin = Admin::whereEmail($request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {

                if ($admin->status == Admin::STATUS_ACTIVED) {

                    Auth::login($admin);

                    return redirect()->route('dashboard.index');
                } else {
                    return redirect()->route('login')->with('msg', '<b>Login gagal</b>, Akun belum aktif atau sementara dinonaktifkan oleh admin');
                }
            } else {
                return redirect()->route('login')->with('msg', '<b>Login gagal</b>, Email atau password salah');
            }
        } else {
            return redirect()->route('login')->with('msg', 'Email dan password wajib');
        }
    }
    public function actFakeLogin()
    {

        return redirect()->back()->with('msg', '<b>Login gagal</b>, Email atau password salah');
    }
}
