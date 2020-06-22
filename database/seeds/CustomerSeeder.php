<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    const TABLE_NAME = 'Customer';
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
                'CustomerID'        =>  'c1e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer1',
                'CreatedDateTime'   =>  '2019-05-27'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c9e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a50',
                'Name'              =>  'TestCustomer9',
                'CreatedDateTime'   =>  '2020-01-01'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c2e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer2',
                'CreatedDateTime'   =>  '2019-05-27'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c3e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer3',
                'CreatedDateTime'   =>  '2020-01-01'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c4e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer4',
                'CreatedDateTime'   =>  '2019-05-27'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c5e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer5',
                'CreatedDateTime'   =>  '2020-01-01'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer6',
                'CreatedDateTime'   =>  '2019-05-27'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c7e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer7',
                'CreatedDateTime'   =>  '2020-01-01'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer8',
                'CreatedDateTime'   =>  '2019-05-27'
        ]);

        DB::table(static::TABLE_NAME) 
            ->insert([
                'CustomerID'        =>  'c5e0e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'CustomerStatusId'  =>  'd6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'Name'              =>  'TestCustomer0',
                'CreatedDateTime'   =>  '2019-01-01'
        ]);
    }
}
