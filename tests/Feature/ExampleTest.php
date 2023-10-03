<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Implemented HTTP Test
     */

    //Making request asserting '302'
    public function testRequest()
    {
        $response = $this->get('/');
 
        $response->assertStatus(302);
    }

    //User API Test
    public function testGetUsers()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'name',
                'email',
                'email_verified_at',
                'password',
                'remember_token',
            ],
        ]);
    }

    //Session / Authentication
    public function testSession()
    {
        $response = $this->withSession(['banned' => false])->get('/');
    }
    
    //Test Exception Handling 
    public function testException(){
        $response = $this->withoutExceptionHandling()->get('/');
    }

    //Test Deprecation Handling
    public function testDeprecationHandling(){
        $response = $this->withoutDeprecationHandling()->get('/');
    
}
}