<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('deposit')->insert([
            'id_user'=> 1,
            'amount'=> '100,00',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('deposit')->insert([
            'id_user'=> 1,
            'amount'=> '200,00',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('deposit')->insert([
            'id_user'=> 1,
            'amount'=> '200,00',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('deposit')->insert([
            'id_user'=> 2,
            'amount'=> '300,00',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('deposit')->insert([
            'id_user'=> 2,
            'amount'=> '300,00',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        

        
        DB::table('balance')->insert([
            'id_user'=> 1,
            'values'=> '300,00',
        ]);
        DB::table('balance')->insert([
            'id_user'=> 1,
            'values'=> '000,00',
        ]);
        DB::table('balance')->insert([
            'id_user'=> 2,
            'values'=> '000,00',
        ]);
        DB::table('balance')->insert([
            'id_user'=> 2,
            'values'=> '000,00',
        ]);
        DB::table('balance')->insert([
            'id_user'=> 2,
            'values'=> '100,00',
        ]);
        DB::table('balance')->insert([
            'id_user'=> 2,
            'values'=> '22,00',
        ]);


        DB::table('profitability')->insert([
            'id_deposit'=> 1,
            'amount'=> '100,00',
        ]);
        DB::table('profitability')->insert([
            'id_deposit'=> 1,
            'amount'=> '100,00',
        ]);
        DB::table('profitability')->insert([
            'id_deposit'=> 2,
            'amount'=> '100,00',
        ]);
        DB::table('profitability')->insert([
            'id_deposit'=> 2,
            'amount'=> '100,00',
        ]);
        DB::table('profitability')->insert([
            'id_deposit'=> 2,
            'amount'=> '100,00',
        ]);


        DB::table('verified')->insert([
            'id_user'=> 2,
            'front_doc'=> '00000',
            'back_doc'=> '00000',
            'front-user'=> '00000',
           
        ]);
        DB::table('verified')->insert([
            'id_user'=> 2,
            'front_doc'=> '00000',
            'back_doc'=> '00000',
            'front-user'=> '00000',
           
        ]);
        DB::table('verified')->insert([
            'id_user'=> 1,
            'front_doc'=> '00000',
            'back_doc'=> '00000',
            'front-user'=> '00000',
           
        ]);
        DB::table('verified')->insert([
            'id_user'=> 1,
            'front_doc'=> '00000',
            'back_doc'=> '00000',
            'front-user'=> '00000',
           
        ]);
        DB::table('wallet')->insert([
            'id_user'=> 1,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);
        DB::table('wallet')->insert([
            'id_user'=> 1,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);

        DB::table('wallet')->insert([
            'id_user'=> 2,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);

        DB::table('wallet')->insert([
            'id_user'=> 2,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);
        DB::table('wallet')->insert([
            'id_user'=> 1,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);
        DB::table('wallet')->insert([
            'id_user'=> 2,
            'name'=> 'danger',
            'url'=> 'https//localhost.com',

        ]);


        DB::table('withdraw')->insert([
            'id_verified'=> 0,
            'amount'=> 'danger',
            'request_date'=> date('Y-m-d H:i:s'),
            'approval'=> date('Y-m-d H:i:s')
        ]);
        DB::table('withdraw')->insert([
            'id_verified'=> 0,
            'amount'=> 'danger',
            'request_date'=> date('Y-m-d H:i:s'),
            'approval'=> date('Y-m-d H:i:s')
        ]);
        DB::table('withdraw')->insert([
            'id_verified'=> 0,
            'amount'=> 'danger',
            'request_date'=> date('Y-m-d H:i:s'),
            'approval'=> date('Y-m-d H:i:s')
        ]);
        DB::table('withdraw')->insert([
            'id_verified'=> 0,
            'amount'=> 'danger',
            'request_date'=> date('Y-m-d H:i:s'),
            'approval'=> date('Y-m-d H:i:s')
        ]);



        
        
    }
}
