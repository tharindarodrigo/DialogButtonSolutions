<?php

use Illuminate\Database\Seeder;

class ComapanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Company::create(['company_name' => 'Dialog']);
    }
}
