<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'first_name'          =>  'Sherif',
            'last_name'          =>  'Nabil',
            'email'         =>  'super_admin@app.com',
            'sub_plan'         =>  '',
            'password'      =>  bcrypt('111111'),
        ]);
        // $user->attachRole('super_admin');
    }
}
