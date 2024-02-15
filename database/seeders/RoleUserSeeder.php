<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // define roles
        $admin = DB::table('roles')->where('name', 'User Administrator')->first();
        $mod = DB::table('roles')->where('name', 'Moderator')->first();
        $themeMgr = DB::table('roles')->where('name', 'Theme Manager')->first();

        // define users
        $jane = DB::table('users')->where('name', 'Jane UserAdmin')->first();
        $bob = DB::table('users')->where('name', 'Bob Moderator')->first();
        $susan = DB::table('users')->where('name', 'Susan ThemeAdmin')->first();

        // start seeding
        DB::table('role_user')->insert([
            'user_id' => $jane->id,
            'role_id' => $admin->id,
            'created_at' => Carbon::now(),
        ]);

        DB::table('role_user')->insert([
            'user_id' => $bob->id,
            'role_id' => $mod->id,
            'created_at' => Carbon::now(),
        ]);

        DB::table('role_user')->insert([
            'user_id' => $susan->id,
            'role_id' => $themeMgr->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
