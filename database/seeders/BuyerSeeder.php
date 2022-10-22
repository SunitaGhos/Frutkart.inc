<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
        
            'email' => 'buyer@frutkart.com',
            'password' => Hash::make('buyer123#'),
            'role'   => 2
        ]);
    }
}
