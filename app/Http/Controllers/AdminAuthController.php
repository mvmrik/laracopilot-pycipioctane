<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Static admin credentials for Bitcoin platform
    private static $adminCredentials = [
        [
            'email' => 'admin@bitcoinhub.com',
            'password' => 'admin123',
            'name' => 'Bitcoin Admin',
            'role' => 'Super Admin'
        ],
        [
            'email' => 'manager@bitcoinhub.com',
            'password' => 'manager123',
            'name' => 'Trading Manager',
            'role' => 'Manager'
        ],
        [
            'email' => 'analyst@bitcoinhub.com',
            'password' => 'analyst123',
            'name' => 'Market Analyst',
            'role' => 'Analyst'
        ]
    ];

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        foreach (self::$adminCredentials as $admin) {
            if ($admin['email'] === $email && $admin['password'] === $password) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $admin
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}