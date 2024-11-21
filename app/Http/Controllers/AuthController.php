<?php

namespace App\Http\Controllers;

use App\Models\BatteryMonitoring;
use App\Models\DistanceMonitoring;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Jika pengguna sudah login dan memiliki role 'admin', arahkan ke halaman admin
            if (Auth::user()->role == 'admin') {
                return redirect()->route('adminpage'); // Ganti dengan route halaman admin yang sesuai
            }
            
            // Jika pengguna sudah login dan memiliki role 'user', arahkan ke halaman user
            return redirect()->route('userpage'); // Ganti dengan route halaman pengguna yang sesuai
        }
        
        // Jika pengguna belum login, tampilkan halaman login
        return view('login-page');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required', 
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'

        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Menggunakan 'remember me' 
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user(); // Dapatkan informasi pengguna yang berhasil login
            Session::put('user_role', $user->role); // Simpan hak akses pengguna dalam sesi

            // Redirect berdasarkan role
            if ($user->role == 'admin') {
                return redirect()->route('adminpage')->with('success-login', 'You can now access the admin page or reply any questions/suggestions from users');
            } elseif ($user->role == 'user') {
                return redirect()->route('userpage')->with('success-login', 'You can now access the user page or submit any questions/suggestions');
            }
        } else {
            // jika gagal login
            return redirect()->back()->withErrors(['username' => 'Username dan password yang dimasukkan tidak sesuai'])->withInput();
        }
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('sign-up-page');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input registrasi    
        $request->validate([
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'username' => 'required|string|max:20|unique:users,username',
            'password' => 'required|string|confirmed', // Ensures password matches confirmation
            'email' => 'required|string|email|max:255|unique:users,email',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|max:20'
        ]);

        // Buat user baru
        User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'role' => 'user', 
           
        ]);

        // Redirect ke halaman login setelah registrasi sukses
        return redirect()->route('register.success');
    }

        public function registerSuccess()
    {
        return view('sign-up-page-success'); // Nama file view untuk halaman sukses registrasi
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        // Menghapus session user_role
        Session::forget('user_role');

        // Redirect ke halaman login setelah logout
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }

    public function userPage()
    {
        return view('user-page');
    }


    public function adminPage()
    {
        $distanceData = DistanceMonitoring::orderBy('timestamp')->get();
        $batteryData = BatteryMonitoring::orderBy('timestamp')->get();

        // Cek nilai terbesar dari percobaan, default 0 jika tidak ada data
        $lastTrialCount = max($distanceData->max('percobaan') ?? 0, $batteryData->max('percobaan') ?? 0);

        return view('admin-page', [
            'distanceData' => $distanceData,
            'batteryData' => $batteryData,
            'lastTrialCount' => $lastTrialCount
        ]);
    }


}
