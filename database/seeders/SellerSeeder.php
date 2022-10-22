<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        
            'email' => 'seller@frutkart.com',
            'password' => Hash::make('seller123#'),
            'role'   => 1
        ]);

       
    }
}
