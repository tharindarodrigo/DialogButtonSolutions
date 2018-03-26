<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'super_admin', 'guard_name'=>'web'],
            ['name'=>'admin', 'guard_name'=>'web'],
            ['name'=>'user', 'guard_name'=>'web'],
        ]);
    }
}
