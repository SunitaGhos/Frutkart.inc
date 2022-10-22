<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
     use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
       
 
        $response = $this->post('/register', [
           
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation'=>'password',
            'role'=>1
        ]);
        //$response->dump();

        $this->assertAuthenticated('web');
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
    
}
