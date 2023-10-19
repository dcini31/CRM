<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            Company::create([
                'name' => 'Company ' . $i,
                'email' => 'company' . $i . '@example.com',
                'logo' => 'logo' . $i . '.jpg',
                'website' => 'https://www.example.com/company' . $i,
            ]);
        }
    }
}
