<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class tbl_area extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(DB::table('tbl_area')->count() == 0){

            DB::table('tbl_area')->insert([

                [
                    'language_id' => 1,
                    'code' => 121,
                    'name' => 'Sector-57',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'language_id' => 1,
                    'code' => 121,
                    'name' => 'Sector-58',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],

            ]);
            
        } 
    }
}
