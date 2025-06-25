<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = array(
            array(
                'name' => 'Public Policy',
            ),
            array(
                'name' => 'Governance',
            ),
            array(
                'name' => 'Data Analysis',
            ),
            array(
                'name' => 'Monitoring & Evaluation',
            ),
            array(
                'name' => 'Statistics',
            ),
            array(
                'name' => 'Project Management',
            ),
            array(
                'name' => 'Program Management',
            ),
            array(
                'name' => 'Capacity Building',
            ),
            array(
                'name' => 'Stakeholder Engagement',
            ),
            array(
                'name' => 'Stakeholder Management',
            ),
            array(
                'name' => 'Qualitative Research',
            ),
            array(
                'name' => 'Case Studies',
            ),
            array(
                'name' => 'Field Work',
            ),
            array(
                'name' => 'Logistics',
            ),
            array(
                'name' => 'Community Engagement',
            ),
            array(
                'name' => 'Operations',
            ),
            array(
                'name' => 'Consulting',
            ),
            array(
                'name' => 'Partnership',
            ),
            array(
                'name' => 'Field Communication',
            ),
            array(
                'name' => 'Systems',
            ),
            array(
                'name' => 'Infrastructure',
            ),
            array(
                'name' => 'Data Policy',
            ),
            array(
                'name' => 'Education System Reforms',
            ),
            array(
                'name' => 'Social Policy Effectiveness',
            ),
            array(
                'name' => 'Water Rights Conflicts',
            ),
        );

        if(count($fields) > 0) {
            foreach($fields as $field) {
                Field::updateOrCreate([
                    'name' => $field['name']
                ]);
            }
        }
    }
}
