<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
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
                'platform' => 'facebook',
                'url' => null,
                'icon' => null,
                'is_active' => 1
            ),
            array(
                'platform' => 'twitter',
                'url' => null,
                'icon' => null,
                'is_active' => 1
            ),
            array(
                'platform' => 'linkedin',
                'url' => null,
                'icon' => null,
                'is_active' => 1
            ),
            array(
                'platform' => 'youtube',
                'url' => null,
                'icon' => null,
                'is_active' => 1
            ),
            array(
                'platform' => 'instagram',
                'url' => null,
                'icon' => null,
                'is_active' => 1
            ),
        );

        if(count($data) > 0) {
            foreach($data as $dt) {
                SocialMedia::Create([
                    'platform' => $dt['platform'],
                    'url' => $dt['url'],
                    'icon' => $dt['icon'],
                    'is_active' => $dt['is_active'],
                ]);
            }
        }
    }
}
