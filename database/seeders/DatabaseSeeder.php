<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::table(
            'order_details',
            function (Blueprint $table) {
                $table->foreign('order_code')->references('order_code')
                    ->on('orders')->onDelete('cascade')->onUpdate('cascade');
            }
        );
        $this->call(
            [
                OrdersTableSeeder::class
            ]
        );
    }
}
