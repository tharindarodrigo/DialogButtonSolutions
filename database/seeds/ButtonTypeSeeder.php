<?php

use Illuminate\Database\Seeder;

class ButtonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('button_types')->insert([
            [
                'button_type' => 'Wash Room',
                'notification_color' => 'warning',
                'message' => 'Wash Room Button was pressed'
            ],

            [
                'button_type' => 'Tea Button',
                'notification_color' => 'info',
                'message' => 'Tea needed'
            ],

            [
                'button_type' => 'Clean',
                'notification_color' => 'warning',
                'message' => 'Janitor needed'
            ],

            [
                'button_type' => 'Feedback Good',
                'notification_color' => 'success',
                'message' => 'Good Food'
            ],

            [
                'button_type' => 'Feedback Bad',
                'notification_color' => 'danger',
                'message' => 'Bad Food'
            ],
        ]);
    }
}
