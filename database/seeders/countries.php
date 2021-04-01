<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Country;


class countries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://restcountries.eu/rest/v2/all');
        //return $response -> json();
        //dd($response->json());
        foreach ($response->json() as $key => $value) {
            //dd($value['callingCodes']['0']);
            $countries = Country::create([
                'name' => $value['name'],
                'alpha2_code' => $value['alpha2Code'],
                'alpha3_code' => $value['alpha3Code'],
                'calling_code' => $value['callingCodes']['0'],
                'demonym' => $value['demonym'],
                'flag' => $value['flag'],
            ]);
        }
    }
}
