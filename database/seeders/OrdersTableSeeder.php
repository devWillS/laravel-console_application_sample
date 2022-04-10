<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DatabaseManager $manager)
    {
        $datetime = Carbon::now()->toDateTimeString();
        $manager->table('orders')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1111',
                    'order_date' => new Carbon('2021-04-10 00:00:00'),
                    'customer_name' => '大坂太郎',
                    'customer_email' => 'osaka@example.com',
                    'destination_name' => '送付先　大坂太郎',
                    'destination_zip' => '1234567',
                    'destination_prefecture' => '大阪府',
                    'destination_address' => '送付先住所1',
                    'destination_tel' => '06-0000-0000',
                    'total_quantity' => 1,
                    'total_price' => 1000,
                    'created_at' => new Carbon('2021-04-10 00:00:00'),
                    'updated_at' => new Carbon('2021-04-10 00:00:00'),
                ]
            );
        $manager->table('order_details')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1111',
                    'detail_no' => 1,
                    'item_name' => '商品1',
                    'item_price' => 1000,
                    'quantity' => 1,
                    'subtotal_price' => 1000,
                ]
            );
        $manager->table('orders')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1112',
                    'order_date' => new Carbon('2021-04-10 23:59:59'),
                    'customer_name' => '神戸花子',
                    'customer_email' => 'kobe@example.com',
                    'destination_name' => '送付先　神戸花子',
                    'destination_zip' => '1234567',
                    'destination_prefecture' => '兵庫県',
                    'destination_address' => '送付先住所2',
                    'destination_tel' => '078-0000-0000',
                    'total_quantity' => 2,
                    'total_price' => 2000,
                    'created_at' => new Carbon('2021-04-10 23:59:59'),
                    'updated_at' => new Carbon('2021-04-10 23:59:59'),
                ]
            );
        $manager->table('order_details')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1112',
                    'detail_no' => 1,
                    'item_name' => '商品1',
                    'item_price' => 1000,
                    'quantity' => 2,
                    'subtotal_price' => 2000,
                ]
            );
        $manager->table('orders')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1113',
                    'order_date' => new Carbon('2021-04-10 23:59:59'),
                    'customer_name' => '神戸花子',
                    'customer_email' => 'kobe@example.com',
                    'destination_name' => '送付先　神戸花子',
                    'destination_zip' => '1234567',
                    'destination_prefecture' => '兵庫県',
                    'destination_address' => '送付先住所2',
                    'destination_tel' => '078-0000-0000',
                    'total_quantity' => 1,
                    'total_price' => 500,
                    'created_at' => new Carbon('2021-04-10 23:59:59'),
                    'updated_at' => new Carbon('2021-04-10 23:59:59'),
                ]
            );
        $manager->table('order_details')
            ->insert(
                [
                    'order_code' => '1111-1111-1111-1113',
                    'detail_no' => 2,
                    'item_name' => '商品2',
                    'item_price' => 500,
                    'quantity' => 1,
                    'subtotal_price' => 500,
                ]
            );
    }
}
