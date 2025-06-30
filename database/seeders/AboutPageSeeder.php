<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
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
                'team_member_ids' => null
            )
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                AboutPage::Create([
                    'team_member_ids' => $dt['team_member_ids'],
                ]);
            }
        }
    }
}
