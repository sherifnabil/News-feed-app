<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Admin::create([
            'name'          =>  'super',
            'email'         =>  'super_admin@app.com',
            'is_super'      =>   true,
            'password'      =>  bcrypt('111111'),
        ]);
    }
}
