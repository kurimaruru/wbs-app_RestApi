<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// 以下追記
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Wbs;
use App\Models\WbsComment;

class WbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wbs::factory()->count(5)->create();
        WbsComment::factory()->count(5)->create();
    }
}
