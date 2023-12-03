<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'khaled',
            'last_name' => 'tarek',
            'email' => 'khaledtarekahly@gmail.com',
            'password' => Hash::make('alahly1907'),
            'gender' => 'male',
            'birth_date' => Carbon::create(2000 , 2 ,11),
            'is_admin' => 1,
            'image' => 'null',
        ]);
    }
}
