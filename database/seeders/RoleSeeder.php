<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'description' => 'This is the admin privilege.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'This is the mod privilege.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'This is the manager privilege.',
            'created_at' => Carbon::now(),
        ]);
    }
}
