<?php

namespace Database\Seeders;

use App\Models\PublicationPage;
use Illuminate\Database\Seeder;

class PublicationPageSeeder extends Seeder
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
                'publication_ids' => null
            )
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                PublicationPage::Create([
                    'publication_ids' => $dt['publication_ids'],
                ]);
            }
        }
    }
}
