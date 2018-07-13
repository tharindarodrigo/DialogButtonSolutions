<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);


        factory(\App\Company::class, 10)
            ->create()
            ->each(function ($company) {
                factory(\App\Branch::class, rand(2,5))->create(['company_id' => $company->id]);
            });
        factory(\App\Branch::class,10)->create();

        $this->call(ButtonTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
