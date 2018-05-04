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
                'button_type' => 'Happy',
                'notification_color' => 'success',
                'message' => 'Happy Feedback'
            ],

            [
                'button_type' => 'Neutral',
                'notification_color' => 'warning',
                'message' => 'Neutral'
            ],

            [
                'button_type' => 'Unhappy',
                'notification_color' => 'danger',
                'message' => 'Unhappy Feedback'
            ],

        ]);
    }
}
