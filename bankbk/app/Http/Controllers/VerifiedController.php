<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Verified;
use App\Models\User;


class VerifiedController extends Controller
{
    public function verifiedUser($id){
        $array = ['error'=>''];
        $verifiedUser = Verified::where('id_user',$id)->get();
       //var_dump($balanceUser);exit;
        if($verifiedUser) {
            $array['verified'] = $verifiedUser;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_verified) {
        $array = ['error'=>''];
        $verifiedUser = Verified::find($id_verified);
        $user = User::find($id);
       
        if($verifiedUser->id_user == $user->id) {
            $array['verified'] = $verifiedUser;
        
        } else {
       $array['error']='Id e usuário não batem';  }

        return $array;

    }

    public function insert(Request $request, $id){
        $array = ['error'=> ''];

        $user = User::find($id)->count();
        if($user>0){
        $validator = Validator::make($request->all(),[
 
            'front_doc' =>'required',
            'back_doc' =>'required',
            'frontuser' =>'required'
        ]);

        if(!$validator->fails()) {
            $id_user = $id;
            $front = $request->input('front_doc');
            $back = $request->input('back_doc');
            $frontUser = $request->input('frontuser');

            $newVerified = new Verified();
            $newVerified->id_user = $id_user;
            $newVerified->front_doc = $front;
            $newVerified->back_doc = $back;
            $newVerified->frontuser = $frontUser;
            $newVerified->save();
            return response()
            ->json(array(
                'success' => true, 'last_insert_id' => $newVerified->id,'objeto' => $newVerified
            ), 200);;
           
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        }
    
        return  $array['error'] = ' Verified não encontrado';
      }   
      
    }

    public function delete($id) {
        $array = ['error'=>''];
        $verifiedUser = Verified::find($id);
        if($verifiedUser){
            $array ['balance'] = 'Deletado verified';
            $verifiedUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
