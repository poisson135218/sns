<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'body' => 'これはダミーデータです。',
                'created_at' => new DateTime(),
                'user_id' => '1',
                'updated_at' => new DateTime(),
         ]);
    }
}
