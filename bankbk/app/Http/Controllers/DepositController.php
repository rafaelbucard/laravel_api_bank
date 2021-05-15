<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\User;

class DepositController extends Controller
{
    public function depositUser($id){
        $array = ['error'=>''];
        $depositUser = Deposit::where('id_user',$id)->get();
       // var_dump($depositUser);exit;
        if($depositUser) {
            $array['deposit'] = $depositUser;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_deposit) {
        $array = ['error'=>''];
        $depositUser = Deposit::find($id_deposit);
        $user = User::find($id);
       
        if($depositUser->id_user == $user->id) {
            $array['deposit'] = $depositUser;
        
        } else {
       $array['error']='Id e usuário não batem';  }

        return $array;

    }

    public function insert(Request $request, $id){
        $array = ['error'=> ''];
    
        $validator = Validator::make($request->all(),[
 
            'amount' =>'required'
        
        ]);

        if(!$validator->fails()) {
            $id_user = $id;
            $amount = $request->input('amount');
            $created_at =  date('Y-m-d H:i:s');


            $newDeposit = new Deposit();
            $newDeposit->id_user = $id_user;
            $newDeposit->amount = $amount;
            $newDeposit->created_at = $created_at;
            $newDeposit->save();
            return response()
            ->json(array(
                'success' => true, 'last_insert_id' => $newDeposit->id,'user' => $newDeposit->id_user, 'amount'=>$newDeposit->amount
            ), 200);;
            
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        } 
    }

    public function delete($id) {
        $array = ['error'=>''];
        $depositUser = Deposit::find($id);
        if($depositUser){
            $array ['deposit'] = 'Deletado deposito';
            $depositUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
