<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            array(
                'name' => 'Yasir Naeem',
                'email' => 'yasir.sherwani@gmail.com',
                'password' => Hash::make('12345678'),
                'photo' => null,
                'status' => 'active'
            ),
            array(
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'photo' => null,
                'status' => 'active'
            ),
        );

        if(count($admins) > 0) {
            foreach($admins as $admin) {
                Admin::updateOrCreate([
                    'email' => $admin['email']
                ],[
                    'name' => $admin['name'],
                    'password' => $admin['password'],
                    'photo' => $admin['photo'],
                    'status' => $admin['status']
                ]);
            }
        }
    }
}
