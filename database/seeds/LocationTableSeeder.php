<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationTableSeeder extends Seeder
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
                'city'=>'Kolkata',
                'stadium'=>'Eden Gardens',
               
            ),
            array(
                'city'=>'Chennai',
                'stadium'=>'M. A.Chidambaram Stadium',
               
            ),
            array(
                'city'=>'Ahmedabad',
                'stadium'=>'Sardar Patel Stadium',
               
            ),
            array(
                'city'=>'Kanpur',
                'stadium'=>'Green Park Stadium',
               
            ),
            array(
                'city'=>'Vadodara',
                'stadium'=>'IPCL Sports Complex Ground',
               
            ),
            array(
                'city'=>'Visakhapatnam',
                'stadium'=>'Indira Priyadarshini Stadium',
               
            ),
        );
        Location::insert($data);
    }
}
