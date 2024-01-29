<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Publicidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class LoginController extends Controller
{
    public function showForm()
    {
        if (auth()->check()) {
            return redirect()->route('home.page');
        } else {
            $response = Http::get('http://admin.labcofasa.net/obtener-publicidades');
            $publicidades = $response->json();

            $response = response()->view('auth.login', compact('publicidades'));

            $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
            $response->header('Pragma', 'no-cache');
            $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

            return $response;
        }
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home.page');
        }

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username && $password) {
            try {
                $user = User::on('DB_CONNECTION_LABORATORIOS_COFASA')->where('email', $username)->orWhere('nombre', $username)->firstOrFail();

                if ($user->estado) {
                    if (Hash::check($password, $user->password)) {
                        Auth::login($user);

                        return redirect()->route('home.page');
                    } else {
                        $errors = ['username' => 'Credenciales incorrectas'];
                    }
                } else {
                    $errors = ['username' => 'Tu cuenta está desactivada'];
                }
            } catch (\Exception $e) {
                $errors = ['username' => 'Credenciales incorrectas'];
            }

            return redirect()->route('login.page')->withErrors($errors)->withInput();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
