<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function getAll() {
        $array = ['error'=>''];
        $users = User::all();
        return   $array['users'] = $users;
    }

    public function show($id) {
        $array = ['error'];
        $user = User::find($id);
        
        if (is_null($user)) {
            return $array['error'] ='Id não encontrado';
        }
         return $array['user'] = $user;
    }

    public function update(Request $request, $id) {
            $array = ['error'=>''];
            $name = $request->input('name');
            $email = $request->input('email');
            $cpf = $request->input('cpf');
            $password = $request->input('password');
            $avatar ='avatar.png';
            $email_verified_at = date('Y-m-d H:i:s');
            $updated_at =  date('Y-m-d H:i:s');
            $hash = '';
            if($password){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            }
            $remember_token = $hash;
            $permission = $hash;
            $users = User::find($id);
            if($users) {
                if($name){
                    $users->name = $name;
                }
                if($email){
                    $users->email = $email;
                }
                if($password){
                    $users->password = $password;
                }
                if($cpf){
                    $users->cpf = $cpf;
                }
                if($avatar){
                    $users->avatar = $avatar;
                }
                if($email_verified_at){
                    $users->email_verified_at = $email_verified_at;
                }
                if($updated_at){
                    $users->updated_at = $updated_at;
                }
                if($password){
                    $users->password = $password;
                }
                if($remember_token){
                    $users->remember_token = $remember_token;
                }
                if($permission){
                    $users->permission = $permission;
                }

            } else{
                $array['error'] = 'Id não encontrado';
            }
            $users->name = $name;
            $users->save();
           return   $array['users'] = $users;
    }

    public function delete($id) {
        $array = ['error' =>''];
        $userDel = User::find($id);

        if (is_null($userDel)) {
            return $array['error'] ='Id não encontrado';
        }
        $userDel->delete();
        return $array['user'] = 'Deletado Com Sucesso';
    }
}
