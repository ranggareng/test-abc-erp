<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MasterCompany::insert([
            ['name' => 'MASS', 'code' => 'MASS'],
            ['name' => 'MBSS', 'code' => 'MBSS'],
            ['name' => 'APN', 'code' => 'APN']
        ]);
        
        \App\Models\MasterReligion::insert([
            ['name' => 'Muslim'],
            ['name' => 'Christian'],
            ['name' => 'Catholic'],
            ['name' => 'Buddhist'],
            ['name' => 'Hindu'],
            ['name' => 'Other']
        ]);

        \App\Models\MasterDepartment::insert([
            ['name' => 'Human Capital'],
            ['name' => 'ICT'],
            ['name' => 'Finance'],
            ['name' => 'Accounting'],
            ['name' => 'Tax'],
            ['name' => 'Technical'],
            ['name' => 'HSE'],
            ['name' => 'General Affair'],
            ['name' => 'CSR'],
            ['name' => 'Corporate Planning']
        ]);

        \App\Models\MasterLevel::insert([
            ['name' => 'BOC'],
            ['name' => 'Director'],
            ['name' => 'General Manager'],
            ['name' => 'Senior Manager'],
            ['name' => 'Manager'],
            ['name' => 'Senior Supervisor'],
            ['name' => 'Supervisor'],
            ['name' => 'Senior Staff'],
            ['name' => 'Staff'],
            ['name' => 'Overtime Staff'],
            ['name' => 'Overtime Non Staff']
        ]);

        \App\Models\Employee::factory(200)->create();
    }
}
