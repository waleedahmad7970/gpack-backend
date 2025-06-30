<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
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
                'title' => 'Enabling Change',
                'subtitle' => 'Representation | Results | Equity |Institution Building',
                'banner_image_url' => null,
                'team_member_ids' => null
            )
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                HomePage::Create([
                    'title' => $dt['title'],
                    'subtitle' => $dt['subtitle'],
                    'banner_image_url' => $dt['banner_image_url'],
                    'team_member_ids' => $dt['team_member_ids'],
                ]);
            }
        }
    }
}
