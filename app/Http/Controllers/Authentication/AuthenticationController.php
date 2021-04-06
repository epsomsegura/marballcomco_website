<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User as U;

class AuthenticationController extends Controller
{
    // Vista para iniciar sesión
    public function loginView(){
        return View('authentication.login');
    }

    // Proceso de inicio de sesión
    public function loginPost(Request $r){
        $credentials = $r->only('email', 'password');
        $userData = U::where('email',$r->email);

        if($userData->count()==1){
            if(Hash::check($r->password,$userData->first()->password)){
                if(Auth::attempt($credentials)) {
                    $r->session()->regenerate();
                    return redirect()->intended('dashboard');
                }
                else
                    return back()->withErrors(['Error desconocido al iniciar sesión']);
            }
            else{
                return back()->withErrors(['La contraseña es incorrecta']);
            }
        }
        else{
            return back()->withErrors(['No existe el usuario en el sistema']);
        }
    }

    // Proceso para cierre de sesión
    public function logoutReq(Request $r){
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect('/login');
    }
}
