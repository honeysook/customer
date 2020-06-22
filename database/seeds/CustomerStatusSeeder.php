<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerStatusSeeder extends Seeder
{
    const TABLE_NAME = 'CustomerStatus';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        
        DB::table(static::TABLE_NAME)
            ->insert([
                'CustomerStatusId'  => 'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Code'              => 'AC',
                'Name'              => 'Active'
            ]);

        DB::table(static::TABLE_NAME)
        ->insert([
            'CustomerStatusId'  => 'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a50',
            'Code'              => 'RE',
            'Name'              => 'Removed'
        ]);
    }
}
