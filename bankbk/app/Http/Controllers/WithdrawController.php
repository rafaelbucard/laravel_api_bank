<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Verified;
use App\Models\Withdraw;
use Illuminate\Auth\Events\Validato;

class WithdrawController extends Controller
{
    public function withdrawVerified($id){
        $array = ['error'=>''];
        $withdrawVerified = Withdraw::where('id_verified',$id)->get();
       // var_dump($depositUser);exit;
        if($withdrawVerified) {
            $array['withdraw'] = $withdrawVerified;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_withdraw) {
        $array = ['error'=>''];
        $withdraw = Withdraw::find($id_withdraw);
        $verified = Verified::find($id);
      // var_dump($withdraw);
      // var_dump($verified);exit;
        if($withdraw->id_verified == $verified->id) {
            $array['withdraw'] = $withdraw;
        
        } else {
         $array['error']='Id e usuário não batem';  }

        return $array;
    }

    public function insert(Request $request, $id){
         $array = ['error'=> ''];
         $verified = Verified::find($id)->count();
        if($verified>0){   
            $validate = Validator::make($request->all(),[
 
            'amount' =>'required',
           
         ]);

             if(!$validate->fails()) {
                $id_verified = $id;
                $amount = $request->input('amount');
                $request_date = date('Y-m-d H:i:s');
                $approval = date('Y-m-d H:i:s');

                 $newWithdraw = new Withdraw();
                 $newWithdraw->id_verified = $id_verified;
                 $newWithdraw->amount = $amount;
                 $newWithdraw->request_date = $request_date;
                 $newWithdraw->approval = $approval;
                 $newWithdraw->save();
                 return response()
                  ->json(array(
                      'success' => true, 'last_insert_id' => $newWithdraw->id,'user' => $newWithdraw
               ), 200);;
           
             } else {

           $array['error'] = $validate->errors()->first();
           return $array;
        }
    }  
      
    }

    

    public function delete($id) {
        $array = ['error'=>''];
        $w = Withdraw::find($id);
        if($w){
            $array ['withdraw'] = 'Deletado withdraw';
            $w->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
