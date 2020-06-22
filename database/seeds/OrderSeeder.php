<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    const TABLE_NAME = 'Order';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e838666-9430-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>180
        ]);

        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837666-9430-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Pending',
                'OrderTotal'=>100
        ]);


        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);

        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9431-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Pending',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864fa',
                'CustomerId'  => 'c8e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864fb',
                'CustomerId'  => 'c1e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Pending',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864fc',
                'CustomerId'  => 'c2e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>10
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864fd',
                'CustomerId'  => 'c3e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9430-40ed-9ebc-3baf9c5864ff',
                'CustomerId'  => 'c4e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9432-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c5e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9433-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c6e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9434-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c7e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
        DB::table(static::TABLE_NAME)
            ->insert([
                'OrderId'  => '2e837345-9435-40ed-9ebc-3baf9c5864fe',
                'CustomerId'  => 'c1e5e46e-d34f-4d9a-a4d4-b7964b7e4a59',
                'OrderStatus'=>'Completed',
                'OrderTotal'=>100
        ]);
    }
}
