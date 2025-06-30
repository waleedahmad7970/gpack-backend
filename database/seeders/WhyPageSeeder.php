<?php

namespace Database\Seeders;

use App\Models\WhyPage;
use Illuminate\Database\Seeder;

class WhyPageSeeder extends Seeder
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
                'ceo_message' => null,
                'ceo_image_url' => null,
                'team_member_ids' => null
            )
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                WhyPage::Create([
                    'ceo_message' => $dt['ceo_message'],
                    'ceo_image_url' => $dt['ceo_image_url'],
                    'team_member_ids' => $dt['team_member_ids'],
                ]);
            }
        }
    }
}
