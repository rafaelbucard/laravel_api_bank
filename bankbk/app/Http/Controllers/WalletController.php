<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Wallet;
use App\Models\User;

class WalletController extends Controller
{
    public function walletUser($id){
        $array = ['error'=>''];
        $walletUser = Wallet::where('id_user',$id)->get();
        if($walletUser) {
            $array['wallet'] = $walletUser;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_wallet) {
        $array = ['error'=>''];
        $walletUser = Wallet::find($id_wallet);
        $user = User::find($id);
       
        if($walletUser->id_user == $user->id) {
            $array['wallet'] = $walletUser;
        
        } else {
       $array['error']='Id e usuário não batem';  }

        return $array;

    }

    public function insert(Request $request, $id){
        $array = ['error'=> ''];
        $user = User::find($id)->count();
        if($user>0){   
            $validator = Validator::make($request->all(),[
                'name' =>'required',
                'url' => 'required'
            ]);

            if(!$validator->fails()) {
                $id_user = $id;
                $name = $request->input('name');
                $url =  $request->input('url');

                $newWallet = new Wallet();
                $newWallet->id_user = $id_user;
                $newWallet->name = $name;
                $newWallet->url = $url;
                $newWallet->save();
                return response()
                ->json(array(
                    'success' => true, 'last_insert_id' => $newWallet->id,'user' => $newWallet->id_user, 'url'=>$newWallet
                ), 200);;
            
            } else {
            $array['error'] = $validator->errors()->first();
            return $array;
            }
        }  
        
    }

    

    public function delete($id) {
        $array = ['error'=>''];
        $walletUser = Wallet::find($id);
        if($walletUser){
            $array ['wallet'] = 'Deletado wallet';
            $walletUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
