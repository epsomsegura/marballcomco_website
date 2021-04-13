<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\Role as R;
use App\Models\User as U;

class UserController extends Controller
{
    // Profile view
    public function myProfile(){
        $data = [
            'roles'=>R::get(),
            'user'=>Auth::user()
        ];
        return View('users.myProfile',$data);
    }

    // Profile data
    public function myProfilePatch(Request $r){
        $validForm = false;
        $user = U::find(Auth::id());
        $roles = R::all();
        $rolesID = [];
        foreach($roles as $i){array_push($rolesID, $i->id);}

        // Validations
        if($r->name !== null || $r->name !== ''){
            if($r->nickname !== null || $r->nickname !== ''){
                if($r->email !== null || $r->email !== ''){
                    if(filter_var($r->email , FILTER_VALIDATE_EMAIL)){
                        if(in_array(intval($r->role_id),$rolesID)){
                            if($r->has('password')){
                                if($r->password === $r->password2) $validForm = true;
                                else return \Redirect::back()->withErrors(['error'=>'Las contraseñas no coinciden']);
                            }    
                            else $validForm = true;    
                        }
                        else return \Redirect::back()->withErrors(['error'=>'El tipo de usuario ingresado no existe en este sistema']);
                    }
                    else return \Redirect::back()->withErrors(['error'=>'Debe ingresar un email válido']);
                }
                else return \Redirect::back()->withErrors(['error'=>'El email no debe estar vacío']);
            }
            else return \Redirect::back()->withErrors(['error'=>'El nick de usuario no debe estar vacío']);
        }
        else return \Redirect::back()->withErrors(['error'=>'El nombre de usuario no debe estar vacío']);

        if($validForm){
            $user->name=$r->name;
            $user->nickname=$r->nickname;
            $user->email=$r->email;
            $user->updated_at=date('Y-m-d H:i:s');
            $user->photo = $r->photo;
            if($r->has('password')){
                $user->password = Hash::make($r->password);
            }


            DB::BeginTransaction();
            try{
                $user->save();
                DB::commit();
                return \Redirect::back()->with('success','Perfil actualizado exitosamente');
            }
            catch(\Exception $e){
                DB::rollback();
                return \Redirect::back()->withErrors(['error'=>$e->getMessage()]);
            }
        }
    }

}
