<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
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
                'name'=>'Himanshu',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin'),
                'status'=> '1'
            )
        );
        Admin::insert($data);
    }
}
