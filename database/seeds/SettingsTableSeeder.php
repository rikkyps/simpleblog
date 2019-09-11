<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings  = [
            'title' => 'SimpleBlog',
            'tagline' => 'Simple BLog With Laravel PHP Frameword',
            'email' => 'rikky.putra14@gamil.com',
            'phone' => '+628240376552',
            'address' => 'Jl. Laswi, Majalengka',
            
        ];
        
        DB::table('settings')->insert($settings);
    }
}
