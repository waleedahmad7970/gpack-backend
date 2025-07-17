<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'email' => null,
                'phone' => null,
                'address' => null,
            ),
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                Contact::Create([
                    'email' => $dt['email'],
                    'phone' => $dt['phone'],
                    'address' => $dt['address']
                ]);
            }
        }
    }
}
