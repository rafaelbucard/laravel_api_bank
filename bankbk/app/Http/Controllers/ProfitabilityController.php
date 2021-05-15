<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Deposit;
use App\Models\Profitability;

class ProfitabilityController extends Controller
{

    public function profitabilityDeposit($id){
        $array = ['error'=>''];
        $profitabilityDeposit = Profitability::where('id_deposit',$id)->get();
       // var_dump($depositUser);exit;
        if($profitabilityDeposit) {
            $array['profitabiblity'] = $profitabilityDeposit;
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_pro) {
        $array = ['error'=>''];
        $profitabilityDeposit = Profitability::find($id_pro);
        $deposit = Deposit::find($id);
       
        if( $profitabilityDeposit->id_deposit == $deposit->id) {
            $array['deposit'] =  $profitabilityDeposit;
        
        } else {
       $array['error']='Id e usuário não batem';  }

        return $array;
    }

    public function insert(Request $request, $id){
        $array = ['error'=> ''];

        $deposit = Deposit::find($id)->count();
        if($deposit>0){
            $validator = Validator::make($request->all(),[
 
                'amount' =>'required'
            
            ]);
    
            if(!$validator->fails()) {
                $id_deposit = $id;
                $amount = $request->input('amount');
        
                $newPro = new Profitability();
                $newPro->id_deposit = $id_deposit;
                $newPro->amount = $amount;
                $newPro->save();
                return response()
                ->json(array(
                    'success' => true, 'last_insert_id' => $newPro->id,'deposito' => $newPro->id_deposit, 'amount'=>$newPro->amount
                ), 200);; 
            } else {
    
               $array['error'] = $validator->errors()->first();
               return $array;
            }
        }else {
          return  $array['error'] = 'Deposito não encontrado';
        }  
    }   
    
    public function delete($id) {
        $array = ['error'=>''];
        $pro = Profitability::find($id);
        if($pro){
            $array ['deposit'] = 'Deletado Rentabilidade';
            $pro->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }

}
