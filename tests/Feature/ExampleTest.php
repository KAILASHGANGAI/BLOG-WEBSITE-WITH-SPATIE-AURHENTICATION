<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\blogs;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
     use RefreshDatabase;
    public function test_the_application_returns_a_successful_response(): void
    {
       $user= User::create([
           'name'=>'kailash',
           'email'=>'kailash@gmail.com',
           'phone'=>'98745698',
           'password'=>'password'
        ]);
        $user->assignRoles('admin');
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
