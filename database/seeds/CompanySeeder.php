<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name' => 'Super Store',
            'rfc' => 'SSC680524P76',
            'address' => 'Adolfo López Mateos 81,Col. 39200, Vicente Guerrero, Ayutla de los Libres, Gro.',
            'email' => 'team@superstore.com'

        ]);
    }
}
